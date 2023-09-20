from django.forms import ModelForm,TextInput,EmailInput,DateInput,PasswordInput,Select
from .models  import Customer,Vehicle,Workorder

class addcustomers(ModelForm):
    class Meta:
        model = Customer
        fields = ['customer_first_name','customer_second_name','customer_last_name','sex','customer_phone','customer_address']
        labels = {
            'customer_first_name':'First name',
            'customer_second_name':'Second name',
            'customer_last_name':'Last name',
            'sex':'Sex',
            'customer_phone':'Phone',
            'customer_address':'Place',
        }
        widgets = {
            'customer_first_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. habibu',
            'label' :'first name'
            }),
            'customer_second_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. jumanne',
            'label' :'first name'
            }),
            'customer_last_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. muhangwa',
            'label' :'first name'
            }),
            'customer_phone': TextInput(attrs={
            'class': "form-control",
            'placeholder': '0752xxxxxx',
            'label' :'Phone',
            }),
            'sex': Select(attrs={
            'class':'form-select'
            }),
            'customer_address': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'place'
            }),
        }

class addvehicle(ModelForm):
    class Meta:
        model = Vehicle
        fields = ['vehicle_owner_number','vehicle_brand','vehicle_type']
        labels = {
            'vehicle_owner_number':'Plate Number',
            'vehicle_brand':'Car Brand',
            'vehicle_type':'Car Type',
        }
        widgets = {
            'vehicle_owner_number': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. T 231 NDS',
            }),
            'vehicle_brand': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. TOYOTA',
            }),
            'vehicle_type': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. SPORT CAR',
            }),
        }

