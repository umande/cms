from django.urls import path 
from . import views

urlpatterns = [
    path("",views.login,name="login-w"),
    path("register/",views.register,name="register-w"),
    path("home/",views.home,name="home-w"),
    path("washing-point/",views.service,name="washing-w"),
    path("about/",views.about,name="about-w"),
    path("contant/",views.contact,name="contact-w"),
]