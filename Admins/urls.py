from django.urls import path 
from . import views

urlpatterns = [
    path("home/",views.Adminss,name="Admins"),
    path('profile/', views.profile, name="user_Profile"),
    path('carwash/', views.carwash, name="users"),
    path('customer/', views.customer, name="customer"),
    path('request/', views.user_request, name="request_user"),
    path('employee/', views.employee, name="employee"),
    path('employee/edit/<str:pk>', views.editEmployee, name="editEmployee"),
    path('carwash/add/', views.addCarwash, name="addCarwash"),
    path('carwash/edit/<str:pk>', views.editCarwash, name="editCarwash"),
    path('carwash/del/', views.delCarwash, name="delCarwash"),
    path('carwash/a/', views.actCarwash, name="actCarwash"),
    path('customer/add/', views.addCustomer, name="addCustomer"),
    path('customer/edit/<str:pk>', views.editCustomer, name="editCustomer"),
    path('customer/del/', views.delCustomer, name="delCustomer"),
]