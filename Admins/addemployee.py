from django.forms import ModelForm,TextInput,EmailInput,DateInput,PasswordInput,Select
from .models  import Customer,Vehicle,Worker

class addworker(ModelForm):
    class Meta:
        model = Worker
        fields = ['worker_first_name','worker_second_name','worker_last_name','sex','worker_phone','worker_address','worker_date_of_bath','worker_email']
        labels = {
            'worker_first_name':'First name',
            'worker_second_name':'Second name',
            'worker_last_name':'Last name',
            'sex':'Sex',
            'worker_phone':'Phone',
            'worker_address':'Place',
            'worker_date_of_bath':'Date of birth',
            'worker_email':'Email',
            }
        widgets = {
            'worker_first_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. habibu',
            'label' :'first name'
            }),
            'worker_second_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. jumanne',
            'label' :'first name'
            }),
            'worker_last_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. muhangwa',
            'label' :'first name'
            }),
            'worker_phone': TextInput(attrs={
            'class': "form-control",
            'placeholder': '0752xxxxxx',
            'label' :'Phone',
            }),
            'sex': Select(attrs={
            'class':'form-select'
            }),
            'worker_address': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'place'
            }),
            'worker_email': EmailInput(attrs={
            'class': "form-control",
            'placeholder': 'habibu@gmail.com'
            }),
            'worker_date_of_bath': DateInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. 9/27/1967',
            'onfocus':"this.type='date'"
            }),
        }

