from django.shortcuts import render,redirect
from django.contrib.auth.hashers import check_password,make_password
from Admins.models import owners,Company,Customer,Vehicle,Worker,Workorder,Schedule,Carbrand,Booking,Payment
from Admins.addcustomer import addcustomers,addvehicle
from Admins.addemployee import addworker
from .reguser import registerCustomer,loginCustomer,customerRequest,imagePay
from django.db.models import Q,Count,Sum,F
from django.db.models.functions import ExtractMonth,ExtractYear
from django.contrib import messages
import json
import os
import random
import calendar
import datetime 
import secrets

def login(request):
    form = loginCustomer()
    if request.method == "POST":
        try:
            uname = request.POST.get('customer_email')
            psw = request.POST.get('customer_password')
            user = Customer.objects.get(customer_email=uname)
            if check_password(psw,user.customer_password):
                request.session['usname'] = user.customer_email
                request.session['userFname'] = user.customer_first_name
                request.session['userId'] = user.id_customer
                return redirect('home-w')
            else:
                messages.error(request,"invalid username or password")
        except: ValueError
    context = {'form':form}
    return render(request, "web/index.html",context)

def register(request):
    form = registerCustomer()
    if request.method == "POST":
        pwd = request.POST.get('customer_password')
        try:
            form = registerCustomer(request.POST)
            if form.is_valid():
                ids = form.save(commit=False)
                ids.customer_password = make_password(pwd)
                form.save()
                return redirect('login-w')
        except: ValueError
    context = {'form':form}
    return render(request, "web/register.html",context)

def home(request):
    if 'usname' not in request.session:
        return redirect('login-w') 
    Fname = request.session['usname']
    companyData = owners.objects.filter(status=2).select_related('company','company__area').values('owner_first_name','company__company_name','company__company_photo','company__company_description','company__area_id__distric')
    numberCompony = owners.objects.filter(status=2).select_related('company').count()
    numberWorker = Worker.objects.all().count()
    context = {'companyDat':companyData,'numberCompany':numberCompony,'numberWorker':numberWorker}
    return render(request, "web/home.html",context)

def service(request):
    if 'usname' not in request.session:
        return redirect('login-w')
    userId = request.session['userId']
    form =  customerRequest()
    imageP = imagePay()
    Fname = request.session['usname']
    carbrand = Carbrand.objects.all()
    mapData = owners.objects.filter(status=2).select_related('company','company__area','company__map_id').values(cmpName = F('company__company_name'),Dsc = F('company__company_description'),lat = F('company__map_id__lat'),lng = F('company__map_id__lng'))
    if request.method == "POST":
        form = customerRequest(request.POST)
        models = request.POST.get('vehicle_model')
        company = request.POST.get('company')
        vehicle = request.POST.get('vehicle_type')
        service = request.POST.get('service')
        extra = request.POST.get('extra')
        date_t = request.POST.get('date_t')
        detail = request.POST.get('detail')
        pNumber = request.POST.get('vehicle_number')
        companyName = Company.objects.get(company_name=company)
        if form.is_valid():
            dat = form.save(commit=False)
            dat.date_booking
            dat.date_booking = date_t 
            dat.service_booking = service
            dat.vehicle_type = vehicle
            dat.vehicle_model = models
            dat.extra = extra
            dat.detail = detail
            dat.vehicle_number = pNumber
            dat.id_company = companyName.id
            dat.customer_id = userId
            form.save()
            return redirect('washing-w')
    myOrder = Booking.objects.filter(customer_id=userId)
    user = Customer.objects.get(id_customer=userId)
    context = {'mapData': mapData,'carBrand':carbrand,'form':form,'myOrder':myOrder,'namePhone':user,'imageP':imageP}
    return render(request, "web/washingpoint.html",context)

def upload_file(f):
    with open('static/upload/'+f.name,'wb+') as destination:
        for chunk in f.chunks():
            destination.write(chunk)
    fileRename = os.path.splitext(f.name)
    file_name = fileRename[0]
    file_extension = fileRename[1]
    newFile = secrets.randbelow(3_000_000_000_000)
    os.rename('static/upload/'+f.name,'static/upload/'+str(newFile)+file_extension)
    newfile = str(newFile) + file_extension
    return newfile

def payment(request):
    idp = request.POST.get('paymentId')
    if request.POST:
        imageP = imagePay(request.POST, request.FILES)
        filenew = upload_file(request.FILES["image"])
        Payment.objects.filter(id_payment=idp).update(image=filenew)
        Booking.objects.filter(amount=idp).update(status=3)
    return redirect('washing-w')

def about(request):
    if 'usname' not in request.session:
        return redirect('login-w') 
    Fname = request.session['usname']
    numberCompony = owners.objects.filter(status=2).select_related('company').count()
    numberWorker = Worker.objects.all().count()
    context = {'numberCompany':numberCompony,'numberWorker':numberWorker}
    return render(request, "web/about.html",context)

def contact(request):
    if 'usname' not in request.session:
        return redirect('login-w') 
    Fname = request.session['usname']
    return render(request, "web/contact.html")

# def userRequest(request):

#     return redirect('washing-w')

def web_logout(request):
    del request.session['usname']
    del request.session['userFname']
    del request.session['userId']
    messages.add_message(request,messages.SUCCESS,"Logged out successfully!")
    return redirect('login-w')


