from django.shortcuts import render,redirect
from django.http import HttpResponse
from .forms import RegisterForm
from Admins.models import owners
from django.contrib.auth import login, authenticate, logout
from django.contrib.auth.hashers import check_password
from django.contrib.auth.forms import AuthenticationForm
from django.contrib import messages
from django.core.exceptions import ObjectDoesNotExist

def login_user(request):
    if request.method == "POST":
        form = AuthenticationForm(request, data=request.POST)
        if form.is_valid():
            username = form.cleaned_data.get('username')
            password = form.cleaned_data.get('password')
            user = authenticate(username=username, password=password)
            if user is not None:
                login(request, user)
                return redirect("Admins")
            else:
                messages.error(request,"invalid usernameor password")
        else:
            uname = form.cleaned_data.get('username')
            psw = form.cleaned_data.get('password')
            try:
                user = owners.objects.get(owner_email=uname)
                if user.status == "1":
                    messages.error(request,"your account is inactive contact admin inorder to activate habibujumanne80@gmail.com")
                    return redirect('user')
                if check_password(psw,user.owner_password):
                    request.session['Fname'] = user.owner_first_name
                    request.session['Sname'] = user.owner_second_name
                    request.session['role'] = user.role
                    request.session['CmpId'] = user.company_id
                    return redirect('user')
                else:
                    messages.error(request,"invalid username or password")
            except ObjectDoesNotExist:
                messages.error(request,"invalid username or password")
    form = AuthenticationForm()
    return render(request,'accounts/login.html',context={'login_form':form})

# Our register view
def register_View(request):
    form = RegisterForm()
    if request.method == "POST":
        form = RegisterForm(request.POST)
        if form.is_valid():
            form.save() # save passed data
            return redirect("/")
    return render(request, "accounts/register.html", {"register_form": form})

def logout_user(request):
    # logout(request)
    messages.add_message(request,messages.INFO,"Logged out successfully!")
    return redirect("login")