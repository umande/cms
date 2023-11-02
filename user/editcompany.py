from django.forms import ModelForm,TextInput,EmailInput,Textarea,PasswordInput,Select,HiddenInput
from Admins.models  import owners,Company

class addcarwashs(ModelForm):
    class Meta:
        model = owners
        fields = ['owner_first_name','owner_second_name','owner_last_name','owner_email','owner_phone','owner_address']
        labels = {
            'owner_first_name':'First name',
            'owner_second_name':'Second name',
            'owner_last_name':'Last name',
            'sex':'Sex',
            'owner_email':'Email',
            'owner_phone':'Phone',
            'owner_address':'Address',
        }
        widgets = {
            'owner_first_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. habibu',
            'label' :'first name'
            }),
            'owner_second_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. jumanne',
            'label' :'first name'
            }),
            'owner_last_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. muhangwa',
            'label' :'first name'
            }),
            'owner_email': EmailInput(attrs={
            'class': "form-control",
            'placeholder': 'habibu@gmail.com'
            }),
            'owner_phone': TextInput(attrs={
            'class': "form-control",
            'placeholder': '0752xxxxxx'
            }),
            'sex': Select(attrs={
            'class':'form-select'
            }),
            'owner_address': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'place'
            }),
        }

class addcompany(ModelForm):
    class Meta:
        model = Company
        fields = ['company_name','company_description','area']
        labels = {
            'company_name':'Company Name',
            'company_description':'Description',
            'area':'Place',
        }
        widgets = {
            'company_name': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'eg. grand',
            }),
            'company_description': Textarea(attrs={
            'class': "form-control",
            'style': 'height: 100px',
            'placeholder': 'eg. explain about company',
            }),
            'area': Select(attrs={
            'class':'form-select'
            }),
        }

class companyPhoto(ModelForm):
    class Meta:
        model = Company
        fields = ['company_photo']
        widgets = {
            'company_photo': HiddenInput(attrs={
            'id': "Cimage1",
            'name':'Cimage2',
            'accept': '.jpg, .jpeg, .png',
            # 'type': 'hidden',
            'onclick':"(this.type='file')"
            })
        }