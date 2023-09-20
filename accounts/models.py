from django.db import models
from django.contrib.auth.models import User
from django.utils.translation import gettext_lazy as _




# because django already includes user table in the database i have 2 choices to create a user 1. abstract a new user 2. extend from the existing one
class login(models.Model):
    # Relation One to One
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    class Meta:
        User
    

    

