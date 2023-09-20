from django.contrib import admin
from django.urls import path,include

urlpatterns = [
    # path('admin/', admin.site.urls),
    path('', include('accounts.urls')),
    path('admins/', include('Admins.urls')),
    path('u/', include('user.urls')),
    path('web/', include('web.urls')),
]
