from django.urls import path 
from . import views

urlpatterns = [
    path("home/",views.user,name="user"),
    path('profile/', views.profile, name="user_Profile-u"),
    path('profile/password/', views.profile_passwordChange, name="user_Profile_passwordChange"),
    path('profile/image/', views.Company_Photo, name="companyImage"),
    path('customer/', views.customer, name="customer-u"),
    path('request/', views.user_request, name="request_user-u"),
    path('employee/', views.employee, name="employee-u"),
    path('customer/add/', views.addCustomer, name="addCustomer-u"),
    path('customer/edit/<int:pk>', views.editCustomer, name="editCustomer-u"),
    path('customer/del/', views.delCustomer, name="delCustomer-u"),
    path('customer/out/', views.user_logout, name="user_logout"),
    path('customer/state/<int:pk>', views.proses_state, name="proses_state-u"),
    path('employee/add/', views.addEmployee, name="addEmployee-u"),
    path('employee/edit/<str:pk>', views.editEmployee, name="editEmployee-u"),
    path('employee/del/', views.delEmployee, name="delEmployee-u"),
    path('employee/task/', views.employeeAddTask, name="addEmployeeTask-u"),
    path('report/<str:pk>', views.report, name="report-u"),
]