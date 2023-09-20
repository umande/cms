from django.urls import path
from . import views

urlpatterns = [
    path("",views.login_user,name="login"),
    path('register/', views.register_View, name="register"),
    path('', views.logout_user, name="logout"),
]