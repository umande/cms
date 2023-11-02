from django.urls import path 
from . import views

from django.conf import settings
from django.conf.urls.static import static
from django.contrib.staticfiles.urls import staticfiles_urlpatterns

urlpatterns = [
    path("",views.login,name="login-w"),
    path("register/",views.register,name="register-w"),
    path("home/",views.home,name="home-w"),
    path("washing-point/",views.service,name="washing-w"),
    path("washing-point/pay/",views.payment,name="toPay"),
    path("about/",views.about,name="about-w"),
    path("contant/",views.contact,name="contact-w"),
    path("logout/",views.web_logout,name="logout-w"),
]
if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root = settings.MEDIA_ROOT)
    urlpatterns += staticfiles_urlpatterns()