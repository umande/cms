from django.shortcuts import render,redirect
from django.http import HttpResponse
from django.contrib.auth.hashers import make_password
from django.contrib.auth.decorators import login_required
from .models import owners,Company,Customer,Vehicle,Workorder,Worker
from .addcarwash import addcarwashs,addcompany
from .addcustomer import addcustomers,addvehicle
from .addemployee import addworker
from collections import Counter
from django.db.models.functions import ExtractMonth,ExtractYear
import datetime
import calendar
from django.db.models import Q,Count,Sum

@login_required(login_url='login')
def Adminss(request):
    # graph
    customerg = Customer.objects.all().annotate(month=ExtractMonth('date')).values('month')
    ownerg = owners.objects.all().annotate(month=ExtractMonth('date')).values('month')
    customer_data = Counter()
    owner_data = Counter()
    for row in customerg:
        mm = row['month']
        mm = calendar.month_name[mm]
        customer_data[mm] += 1
    for row in ownerg:
        mm = row['month']
        mm = calendar.month_name[mm]
        owner_data[mm] += 1
    labels1, values1 = zip(*customer_data.items())
    labels2, values2 = zip(*owner_data.items())
    # map 
    mapData = owners.objects.filter(status=2).select_related('company','company__area','company__map_id').values('company__company_name','company__company_description','company__map_id__lat','company__map_id__lng')
    
    number_company = Company.objects.all().count()
    number_customer = Customer.objects.all().count()
    number_employee = Worker.objects.all().order_by('-id').select_related('owner').count()
    incresingCompany = number_company
    incresingEmployee = number_employee
    incresingCustomer = number_customer
    inc_company = (incresingCompany - 1)/100
    inc_employee = (incresingEmployee - 1)/100
    inc_customer = (incresingCustomer - 1)/100
    context = {
        'customerg_data':values1,
        'customerg_label':labels1,
        'ownerg_data':values2,
        'ownerg_label':labels2,
        'mapData':mapData,
        'N_customer':number_customer,'N_employee':number_employee,'inc_emply':inc_employee,'inc_custm':inc_customer,
        'N_compy':number_company,'inc_compy':inc_company,
    }
    return render(request, 'Admins/index.html',context)
@login_required(login_url='login')
def profile(request):
    return render(request, "Admins/profile_edit.html")
@login_required(login_url='login')
def carwash(request):
    number_workers = Worker.objects.all().values('owner_id').annotate(count=Count('owner_id')).values('count','owner_id')
    user = owners.objects.all().order_by('-id_owner').select_related('company')
    context = {'users': user,'N_of_worker':number_workers}
    return render(request, "Admins/user.html",context)
@login_required(login_url='login')
#edit carwash and owner of carwash
def editCarwash(request,pk):
    user = Company.objects.get(id=pk)
    owne = owners.objects.get(company_id=pk)
    form1 = addcompany(instance=user)
    form2 = addcarwashs(instance=owne)
    if request.method == "POST":
        try:
            form1 = addcompany(request.POST,instance=user)
            form2 = addcarwashs(request.POST,instance=owne)
            if form2.is_valid() and form1.is_valid():
                form2.save()
                form1.save()
                return redirect('users')
        except: ValueError
    context = {'form2': form2,
               'form1': form1}
    return render(request, "Admins/editcarwash.html",context)

#add carwash and owner of carwash
def addCarwash(request):
    form2 = addcarwashs()
    form1 = addcompany()
    if request.method == "POST":
        try:
            form1 = addcompany(request.POST)
            form2 = addcarwashs(request.POST)
            #get name of company
            c_name = request.POST.get('company_name')
            #save data from owner
            if form1.is_valid():
                form1.save()
            #get id from company table
            companyid = Company.objects.filter(company_name=c_name).values('id')
            compid = 0
            for n in companyid:
                compid = int(n['id'])
            if form2.is_valid():
                #assign foreign key from owner table and save
                ids = form2.save(commit=False)
                ids.company_id = compid
                ids.owner_password = make_password('Uwash@123')
                ids.save()
                return redirect('users')
        except: ValueError

    context = {'form1':form1,
               'form2':form2}
    return render(request,'Admins/addcarwash.html',context)

def delCarwash(request):
    if request.method == "POST":
        ownerid = request.POST.get('idD')
        owner_id = owners.objects.get(id_owner=ownerid)
        owner_id.delete()
        return redirect('users')
    
def actCarwash(request):
    if request.method == 'POST':
        ownerId = request.POST.get('activatId')
        getstatus = owners.objects.filter(id_owner=ownerId).values('status')
        state = 0
        for stts in getstatus:
            state = int(stts['status'])
        if state == 1:
            owners.objects.filter(id_owner=ownerId).update(status=2)
        else:
            owners.objects.filter(id_owner=ownerId).update(status=1)
           
    return redirect('users')
    
def customer(request):
    customers = Customer.objects.all().select_related('id_vehicle')
    # customers = Customer.object.all().select_related('id_booking_id')
    context = {'customers':customers}
    return render(request, "Admins/customer.html",context)

#add customer of carwash
def addCustomer(request):
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
                form1.save(commit=False)
                
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
                ids.save()
             # get customer id 
            customerid = Customer.objects.filter(id_vehicle=vehicid).order_by('-id_customer')[:1].values('id_customer')
            customid = 0
            for n in customerid:
                customid = int(n['id_customer'])
            now = datetime.now()
            now =now.strftime("%Y %m %d %h:%M:%S")
            print('am here now')
            print(now)
            work_order = Workorder(customer=customid,date_order=now)
            work_order.save()
            return redirect('customer')
        except: ValueError

    context = {'form1':form1,
               'form2':form2}
    return render(request,'Admins/addcustomer.html',context)

def editCustomer(request,pk):
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
                return redirect('customer')
        except: ValueError
    context = {'form2': form2,
               'form1': form1}
    return render(request, "Admins/editcustomer.html",context)

def delCustomer(request):
    if request.method == "POST":
        id_customer = request.POST.get('id_customer')
        customer_id = Customer.objects.get(id_customer=id_customer)
        customer_id.delete()
        return redirect('customer')
    
def user_request(request):
    return render(request, "Admins/request_user.html")

def employee(request):
    employees = Worker.objects.all().order_by('-id').select_related('owner')
    context = {'employee':employees}
    return render(request, "Admins/employee.html",context)

def editEmployee(request,pk):
    employeeId = Worker.objects.get(id=pk)
    form = addworker(instance=employeeId)
    if request.method == "POST":
        try:
            form = addworker(request.POST,instance=employeeId)
            if form.is_valid():
                form.save()
                return redirect('employee')
        except: ValueError
    context = {'form': form,}
    return render(request,'Admins/editemployee.html',context)