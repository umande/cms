from django.db import models
from django.core.validators import RegexValidator
from datetime import datetime
class Area(models.Model):
    id = models.AutoField(primary_key=True)
    distric = models.CharField(max_length=200)
    class Meta:
        db_table = 'areas'

    def __str__(self):
        return self.distric

class Map(models.Model):
    id = models.AutoField(primary_key=True)
    lat = models.CharField(max_length=100)
    lng = models.CharField(max_length=100)
    class Meta:
        db_table = 'map'

    def __str__(self):
        return self.lat


class Company(models.Model):
    id = models.AutoField(primary_key=True)
    company_name = models.CharField(max_length=200)
    company_certificate = models.CharField(max_length=200)
    company_photo = models.CharField(max_length=200)
    company_description = models.TextField(max_length=200)
    area = models.ForeignKey(Area,on_delete=models.DO_NOTHING)
    map_id = models.ForeignKey(Map,on_delete=models.DO_NOTHING,default=1)

    class Meta:
        db_table = 'company'
    
    def __str__(self):
        return self.company_name

class Payment(models.Model):
    id_payment = models.AutoField(primary_key=True)
    amount = models.IntegerField()
    date_payment = models.DateField(auto_now=True)
    image = models.CharField(max_length=200)

class Booking(models.Model):
    id_booking = models.AutoField(primary_key=True)
    date_booking = models.CharField(max_length=200)
    service_booking = models.CharField(max_length=200)
    vehicle_type = models.CharField(max_length=200)
    vehicle_number = models.CharField(max_length=100)
    vehicle_model = models.CharField(max_length=200)
    extra = models.CharField(max_length=200)
    detail = models.CharField(max_length=200)
    amount = models.IntegerField()
    id_company = models.IntegerField()
    customer_id = models.IntegerField()
    status = models.IntegerField(default=1)

    class Meta:
        db_table = 'booking'

    def __str__(self):
        return self.vehicle_type

class Carbrand(models.Model):
    id = models.AutoField(primary_key=True)
    brand = models.CharField(max_length=200)

    class Meta:
        db_table = 'carbrand'

    def __str__(self):
        return self.brand

class Typeofvehicle(models.Model):
    id = models.AutoField(primary_key=True)
    types = models.CharField(max_length=200)
    amount = models.IntegerField()

    class Meta:
        db_table = 'typeofvehicle'
    def __str__(self):
        return f'{self.types} = Tshs {self.amount}'

class Vehicle(models.Model):
    id_vehicle = models.AutoField(primary_key=True)
    vehicle_owner_number = models.CharField(max_length=100)
    vehicle_brand = models.ForeignKey(Carbrand,on_delete=models.DO_NOTHING)
    vehicle_type = models.ForeignKey(Typeofvehicle,on_delete=models.DO_NOTHING)

    class Meta:
        db_table = 'vehicle'
    
    def __str__(self):
        return self.vehicle_owner_number

class Customer(models.Model):
    gender_choice = [
        ('male','Male'),
        ('female','Female'),
    ]
    id_customer = models.AutoField(primary_key=True)
    customer_first_name = models.CharField(max_length=100)
    # customer_first_name = models.CharField(max_length=100, validators=[RegexValidator('[+-/%~`!@#$^&*)(_:;\'|}\"/.,<>=]',inverse_match=True)])
    customer_second_name = models.CharField(max_length=100)
    customer_last_name = models.CharField(max_length=100)
    customer_email = models.CharField(max_length=100)
    customer_phone = models.CharField(max_length=100)
    customer_address = models.CharField(max_length=100)
    sex = models.CharField(max_length=6,choices = gender_choice)
    customer_password = models.CharField(max_length=200)
    id_vehicle = models.ForeignKey(Vehicle,on_delete=models.CASCADE)
    id_booking = models.ForeignKey(Booking,on_delete=models.DO_NOTHING)
    company_id = models.ForeignKey(Company,on_delete=models.DO_NOTHING,default=0)
    date = models.DateTimeField(blank=True, default=datetime.now)

    class Meta:
        db_table = 'customer'

    def __str__(self):
        return self.customer_first_name



class owners(models.Model):
    gender_choice = [
        ('male','Male'),
        ('female','Female'),
    ]
    id_owner = models.AutoField(primary_key=True)
    owner_first_name = models.CharField(max_length=200)
    owner_second_name = models.CharField(max_length=200)
    owner_last_name = models.CharField(max_length=200)
    sex = models.CharField(max_length=200)
    owner_email = models.CharField(max_length=200)
    owner_phone = models.CharField(max_length=200)
    owner_address = models.CharField(max_length=200)
    owner_password = models.CharField(max_length=200,default="1234")
    sex = models.CharField(max_length=6,choices = gender_choice)
    role =  models.CharField(max_length=200,default="1")
    status =  models.CharField(max_length=200,default="1")
    company =  models.ForeignKey(Company,on_delete=models.CASCADE)
    image = models.CharField(max_length=200)
    date = models.DateTimeField(blank=True, default=datetime.now)
 
    class Meta:
        db_table = 'owner'

    def __str__(self):
        return self.owner_first_name

class Worker(models.Model):
    gender_choice = [
        ('male','Male'),
        ('female','Female'),
    ]
    id = models.AutoField(primary_key=True)
    worker_first_name = models.CharField(max_length=100)
    worker_second_name = models.CharField(max_length=100)
    worker_last_name = models.CharField(max_length=100)
    worker_address = models.CharField(max_length=100)
    worker_email = models.CharField(max_length=100)
    worker_date_of_bath = models.CharField(max_length=200)
    worker_phone = models.CharField(max_length=20)
    sex = models.CharField(max_length=6,choices = gender_choice)
    id_schedule = models.IntegerField(default=0)
    owner = models.ForeignKey(owners,on_delete=models.DO_NOTHING)
    date = models.DateTimeField(blank=True, default=datetime.now)

    class Meta:
        db_table = 'worker'

    def __str__(self):
        return self.worker_first_name
    

class Workorder(models.Model):
    id_order = models.AutoField(primary_key=True)
    worker = models.ForeignKey(Worker,on_delete=models.DO_NOTHING,null=True)
    booking = models.ForeignKey(Booking,on_delete=models.DO_NOTHING,null=True)
    customer = models.ForeignKey(Customer,on_delete=models.DO_NOTHING,null=True)
    area = models.ForeignKey(Area,on_delete=models.DO_NOTHING,null=True)
    date_order = models.DateTimeField(auto_now_add=True)
    type_order = models.CharField(max_length=200,default="offline")
    status = models.IntegerField(default=1)

    class Meta:
        db_table = 'workorder'

    def __str__(self):
        return self.id_worker
    
class Schedule(models.Model):
    id_schedule = models.AutoField(primary_key=True)
    worker_id = models.IntegerField(default=0)
    workorder_id = models.IntegerField(default=0)
    created = models.DateTimeField(auto_now_add=True)
    class Meta:
        db_table = 'schedule'

    def __str__(self):
        return self.worker_id