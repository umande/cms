from django.shortcuts import render,redirect
from django.contrib.auth.hashers import check_password,make_password
from Admins.models import owners,Company,Customer,Vehicle,Worker,Workorder,Schedule
from .editcompany import addcarwashs,addcompany,companyPhoto
from Admins.addcustomer import addcustomers,addvehicle
from Admins.addemployee import addworker
from django.db.models import Q,Count,Sum
from django.db.models.functions import ExtractMonth,ExtractYear
from django.contrib import messages
import calendar
import datetime
import secrets

# report 
from django.http import FileResponse
from io import BytesIO
import os
from CMS.settings import STATIC_DIR
from fpdf import FPDF
from fpdf.fonts import FontFace

def user(request):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']
    today = datetime.datetime.now()
    graphdata = Workorder.objects.select_related('customer_id','customer_id__id_vehicle','customer_id__id_vehicle__vehicle_type').filter(status=2,customer_id__company_id_id=CmpId).annotate(year=ExtractYear('date_order')).values('year').filter(year=today.year).annotate(month=ExtractMonth('date_order')).values('month').order_by('month').annotate(count=Count('id_order'),amount=Sum('customer_id__id_vehicle__vehicle_type__amount')).values('month','count','amount')

    number_customer = Customer.objects.filter(company_id_id=CmpId).count()
    number_employee = Worker.objects.all().order_by('-id').select_related('owner').filter(owner_id__company_id=CmpId).count()
    incresingEmployee = number_employee
    incresingCustomer = number_customer
    inc_employee = (incresingEmployee - 1)/100
    inc_customer = (incresingCustomer - 1)/100
    graphdata1 = list()
    for item in graphdata:
        month = item['month']
        month = calendar.month_name[month]
        graphdata1.append(month)
    print(graphdata1)
    print(graphdata)
    recent = Workorder.objects.select_related('customer_id','worker_id','date_order','customer_id__id_vehicle','customer_id__id_vehicle__vehicle_type').filter(~Q(worker_id=None),customer_id__company_id_id=CmpId).values('status','worker_id','date_order','worker_id__worker_first_name','worker_id__worker_last_name','customer_id__id_vehicle__vehicle_owner_number','customer_id__id_vehicle__vehicle_type__types').order_by('-date_order')
    recent1 = Workorder.objects.select_related('customer_id__schedule','worker_id','date_order','customer_id__id_vehicle','customer_id__id_vehicle__vehicle_type').filter(~Q(worker_id=None),customer_id__company_id_id=CmpId).values('status','worker_id','worker_id__worker_first_name','worker_id__worker_last_name','customer_id__id_vehicle__vehicle_owner_number','customer_id__id_vehicle__vehicle_type__types')
    # print(recent1.query)
    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,
               'N_customer':number_customer,'N_employee':number_employee,'inc_emply':inc_employee,'inc_custm':inc_customer,
               'revenulb':graphdata1,'value1':graphdata,'Recent_activity':recent,}

    return render(request,'user/index.html',context)

def profile(request):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']

    user = Company.objects.get(id=CmpId)
    owne = owners.objects.get(company_id=CmpId)
    c_photo = user.company_photo
    form1 = addcompany(instance=user)
    form2 = addcarwashs(instance=owne)
    company_photo = companyPhoto()
    if request.method == "POST":
        try:
            form1 = addcompany(request.POST,instance=user)
            form2 = addcarwashs(request.POST,instance=owne)
            if form2.is_valid() and form1.is_valid():
                form2.save()
                form1.save()
                return redirect('user_Profile-u')
        except: ValueError

    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,'c_photo':c_photo,
               'form1':form1,'form2':form2,'cmpPhoto':company_photo}

    return render(request, "user/profile_edit.html",context)

def profile_passwordChange(request):
    CmpId = request.session['CmpId']
    current_psw = request.POST.get('current_password')
    new_psw = request.POST.get('new_passwword')
    user = owners.objects.get(company_id=CmpId)

    if check_password(current_psw,user.owner_password):
        owners.objects.filter(company_id=CmpId).update(owner_password=make_password(new_psw))
        messages.add_message(request,messages.SUCCESS,"Password change succesifull")
    else:
        messages.add_message(request,messages.WARNING,"Wrong password")
    return redirect('user_Profile-u')

def upload_file(f):
    with open('static/companyPhoto/'+f.name,'wb+') as destination:
        for chunk in f.chunks():
            destination.write(chunk)
    fileRename = os.path.splitext(f.name)
    file_name = fileRename[0]
    file_extension = fileRename[1]
    newFile = secrets.randbelow(3_000_000_000_000)
    os.rename('static/companyPhoto/'+f.name,'static/companyPhoto/'+str(newFile)+file_extension)
    newfile = str(newFile) + file_extension
    return newfile

def Company_Photo(request):
    id_company = request.POST.get('companyPhot')
    if request.POST:
        imageP = companyPhoto(request.POST, request.FILES)
        filenew = upload_file(request.FILES["company_photo"])
        Company.objects.filter(id=id_company).update(company_photo=filenew)
    return redirect('user_Profile-u')


def customer(request):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']
    
    # join three table from workorder to customer to vehicle 
    # customers = Workorder.objects.all().order_by('-customer_id').select_related('customer','customer__id_vehicle')
    customers_data = Workorder.objects.filter(customer_id__company_id_id=CmpId).order_by('-customer_id').select_related('customer','customer__id_vehicle')

    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,'customers':customers_data}
    return render(request, "user/customer.html",context)

#add customer
def addCustomer(request):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']

    form2 = addcustomers()
    form1 = addvehicle()
    if request.method == "POST":
        try:
            form1 = addvehicle(request.POST)
            form2 = addcustomers(request.POST)
            #get plate number
            P_number = request.POST.get('vehicle_owner_number')
            #save data from owner
            if form1.is_valid():
                form1.save()
            #get id from company table
            vehicleid = Vehicle.objects.filter(vehicle_owner_number=P_number).order_by('-id_vehicle')[:1].values('id_vehicle')
            vehicid = 0
            for n in vehicleid:
                vehicid = int(n['id_vehicle'])

            if form2.is_valid():
                #assign foreign key from vehicle table and save
                ids = form2.save(commit=False)
                ids.id_vehicle_id = vehicid
                ids.company_id_id = CmpId
                ids.save()
            # get customer id 
            customerid = Customer.objects.filter(id_vehicle=vehicid).order_by('-id_customer')[:1].values('id_customer')
            customid = 0
            for n in customerid:
                customid = int(n['id_customer'])
            work_order = Workorder(customer_id=customid)
            work_order.save()
            messages.add_message(request,messages.SUCCESS,"succesifull")
            return redirect('customer-u')
        except: ValueError

    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,'form1':form1,'form2':form2}
    return render(request,'user/addcustomer.html',context)

def editCustomer(request,pk):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']

    customer_vehicle = Customer.objects.get(id_vehicle=pk)
    id_from_vehicle = Vehicle.objects.get(id_vehicle=pk)
    form1 = addvehicle(instance=id_from_vehicle)
    form2 = addcustomers(instance=customer_vehicle)
    if request.method == "POST":
        try:
            form1 = addvehicle(request.POST,instance=id_from_vehicle)
            form2 = addcustomers(request.POST,instance=customer_vehicle)
            if form2.is_valid() and form1.is_valid():
                form2.save()
                form1.save()
                return redirect('customer-u')
        except: ValueError
    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,'form2': form2,'form1': form1}
    return render(request, "user/editcustomer.html",context)

def delCustomer(request):
    if request.method == "POST":
        id_customer = request.POST.get('id_customer')
        customer_id = Customer.objects.get(id_customer=id_customer)
        workorder_id = Workorder.objects.get(customer=id_customer)
        customer_id.delete()
        workorder_id.delete()
        return redirect('customer-u')
    
def proses_state(request,pk):
    Workorder.objects.filter(~Q(worker=None),customer_id=pk,).update(status=2)
    get_idFromWorker = Workorder.objects.filter(~Q(worker=None),customer_id=pk).values('id_order')
    order_id = 0
    for orderid in get_idFromWorker:
        order_id = orderid['id_order']
    if order_id != 0:
        Worker.objects.filter(id_schedule=order_id).update(id_schedule=0)
    return redirect('customer-u')
    
def user_request(request):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']
    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,}

    return render(request, "user/request_user.html",context)

def employee(request):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']

    employees = Worker.objects.all().order_by('-id').select_related('owner').filter(owner_id__company_id=CmpId)
    work_order = Workorder.objects.filter(customer_id__company_id_id=CmpId,worker_id=None,status=1).order_by('-customer_id').select_related('customer','customer__id_vehicle')
    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId, 'employees':employees,'workorder':work_order}

    return render(request, "user/employee.html",context)

#add worker 
def addEmployee(request):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']

    form = addworker()

    if request.method == "POST":
        try:
            form = addworker(request.POST)
            id_owner = owners.objects.filter(company = CmpId).values('id_owner')
            if form.is_valid():
                id_owner1 = 0
                for n in id_owner:
                    id_owner1 = int(n['id_owner'])
                #assign foreign key from vehicle table and save
                ids = form.save(commit=False)
                ids.owner_id = id_owner1
                ids.save()
                return redirect('employee-u')
        except: ValueError

    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,'form':form}
    return render(request,'user/addemployee.html',context)

def editEmployee(request,pk):
    if 'Fname' not in request.session:
        return redirect('login') 
    Fname = request.session['Fname']
    Sname = request.session['Sname']
    role = request.session['role']
    CmpId = request.session['CmpId']

    employeeId = Worker.objects.get(id=pk)
    form = addworker(instance=employeeId)
    if request.method == "POST":
        try:
            form = addworker(request.POST,instance=employeeId)
            if form.is_valid():
                form.save()
                return redirect('employee-u')
        except: ValueError
    context = {'Fname': Fname,'Sname': Sname,'role': role,'CmpId': CmpId,'form': form,}
    return render(request,'user/editemployee.html',context)

def delEmployee(request):
    if request.method == "POST":
        id_employee = request.POST.get('id_employee')
        employee_id = Worker.objects.get(id=id_employee)
        employee_id.delete()
        return redirect('employee-u')

def employeeAddTask(request):
    if request.method == "POST":
        employee_id = request.POST.get('id_employee')
        task_id = request.POST.get('task')
        if task_id != '0':
            Workorder.objects.filter(id_order=task_id).update(worker_id=employee_id)
            Worker.objects.filter(id=employee_id).update(id_schedule=task_id)
            shedule = Schedule(worker_id=employee_id,workorder_id=task_id)
            shedule.save()
        return redirect("employee-u")

def report(request,pk):
    if 'Fname' not in request.session:
        return redirect('login')
    CmpId = request.session['CmpId']

    compnyName = Company.objects.get(id=CmpId)

    compnyName = f"{compnyName.company_name} carwash".title()

    image = os.path.join(STATIC_DIR, 'assets/img/icon5.jpg')
   

    head = ['No.','First name', 'Second name', 'Phone','Plate number','Date','Amount']
    lines = []
    customers_data = Workorder.objects.filter(customer_id__company_id_id=CmpId).order_by('-customer_id').select_related('customer','customer__id_vehicle','customer__id_vehicle__vehicle_type')
    lines.append((head))
    no = 0
    total = 0
    dat = datetime.datetime.now()
    for customer in customers_data:
        calender_c = customer.customer.date
        calender_c1 = customer.customer.date
        calender_c2 = customer.customer.date
        calender_c = calender_c.strftime("%d/%m/%Y")
        MonthYear = calender_c1.strftime("%m/%Y")
        Year = calender_c2.strftime("%Y")

        if pk == "1":
            if calender_c != dat.strftime("%d/%m/%Y"):
                continue
        if pk == "2":
            if MonthYear != dat.strftime("%m/%Y"):
                continue
        if pk == "3":
            if Year != dat.strftime("%Y"):
                continue
        money = customer.customer.id_vehicle.vehicle_type.amount
        total += money
        money = f"{money:,}.0"
        no+=1
        No = str(no)
        PlateN = customer.customer.id_vehicle.vehicle_owner_number.upper()
        row = [No,customer.customer.customer_first_name.title(), 
               customer.customer.customer_last_name.title(), customer.customer.customer_phone,
               PlateN,calender_c,
               money]
        lines.append((row))
    total = f"{total:,}.0"
    lines.append((['','', '', '','Total','',total]))
    

    pdf = FPDF()
    pdf.add_page()
    pdf.set_line_width(0.3)
    pdf.image(image,10,8,20)
    pdf.set_font('helvetica',size=13)
    pdf.cell(17)
    pdf.cell(60,30,txt="U-wash")
    pdf.set_font('helvetica',"B",size=18)
    pdf.cell(1)
    pdf.cell(10,40,txt=compnyName)
    pdf.ln(25)
    heading_style = FontFace(size_pt=12,emphasis="BOLD",color=255,fill_color=(255,100,0))
    pdf.set_font('helvetica',size=12)
    with pdf.table(
        borders_layout="HORIZONTAL_LINES",
        cell_fill_color=(224,235,255),
        col_widths=(15,36,42,38,42,35,40,),
        headings_style=heading_style,
        line_height=7,
        text_align=("RIGHT"),
        width=175,
    ) as table:
        for data_row in lines:
            row = table.row()
            for datum in data_row:
                row.cell(datum)

    return FileResponse(BytesIO(pdf.output(dest="S")), filename="Uwash_report.pdf")

def user_logout(request):
    del request.session['Fname']
    del request.session['Sname']
    del request.session['role']
    del request.session['CmpId']
    messages.add_message(request,messages.SUCCESS,"Logged out successfully!")
    return redirect('login')

