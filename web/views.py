from django.shortcuts import render,redirect
from django.contrib.auth.hashers import check_password,make_password
from Admins.models import owners,Company,Customer,Vehicle,Worker,Workorder,Schedule
from Admins.addcustomer import addcustomers,addvehicle
from Admins.addemployee import addworker
from django.db.models import Q,Count,Sum
from django.db.models.functions import ExtractMonth,ExtractYear
from django.contrib import messages
import json
import calendar
import datetime

def login(request):
    return render(request, "web/index.html")

def register(request):
    return render(request, "web/register.html")

def home(request):
    companyData = owners.objects.filter(status=2).select_related('company','company__area').values('owner_first_name','company__company_name','company__company_description','company__area_id__distric')
    numberCompony = owners.objects.filter(status=2).select_related('company').count()
    numberWorker = Worker.objects.all().count()
    context = {'companyDat':companyData,'numberCompany':numberCompony,'numberWorker':numberWorker}
    return render(request, "web/home.html",context)

def service(request):
    mapData = owners.objects.filter(status=2).select_related('company','company__area','company__map_id').values('company__company_name','company__company_description','company__map_id__lat','company__map_id__lng')
    context = {'mapData':mapData}
    return render(request, "web/washingpoint.html",context)

def about(request):
    numberCompony = owners.objects.filter(status=2).select_related('company').count()
    numberWorker = Worker.objects.all().count()
    context = {'numberCompany':numberCompony,'numberWorker':numberWorker}
    return render(request, "web/about.html",context)

def contact(request):
    return render(request, "web/contact.html")