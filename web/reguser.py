from django.forms import ModelForm,TextInput,EmailInput,DateInput,PasswordInput,Select,HiddenInput
from Admins.models  import Customer,Vehicle,Workorder,Booking,Payment

class registerCustomer(ModelForm):
    class Meta:
        model = Customer
        fields = ['customer_first_name','customer_second_name','customer_last_name','customer_email','sex','customer_phone','customer_address','customer_password']
        labels = {
            'customer_first_name':'First name',
            'customer_second_name':'Second name',
            'customer_last_name':'Last name',
            'sex':'Sex',
            'customer_phone':'Phone',
            'customer_address':'Place',
            'customer_password':'Password',
            'customer_email':'Email',
        }
        widgets = {
            'customer_first_name': TextInput(attrs={
            'class': "input100",
            'placeholder': 'eg. habibu',
            'label' :'first name'
            }),
            'customer_second_name': TextInput(attrs={
            'class': "input100",
            'placeholder': 'eg. jumanne',
            'label' :'second name'
            }),
            'customer_last_name': TextInput(attrs={
            'class': "input100",
            'placeholder': 'eg. muhangwa',
            'label' :'last name'
            }),
            'customer_email': EmailInput(attrs={
            'class': "input100",
            'placeholder': 'habibu@gmail.com'
            }),
            'customer_phone': TextInput(attrs={
            'class': "input100",
            'placeholder': '0752xxxxxx',
            'id':'newPhn',
            }),
            'sex': Select(attrs={
            'class':'input100'
            }),
            'customer_address': TextInput(attrs={
            'class': "input100",
            'placeholder': 'place'
            }),
            'customer_password': PasswordInput(attrs={
            'class': "input100",
            'placeholder': 'Password',
            'id':'newPassword',
            'style':'font-size: 6px',
            }),
        }

class loginCustomer(ModelForm):
    class Meta:
        model = Customer
        fields = ['customer_email','customer_password']
        labels = {
            'customer_password':'Password',
            'customer_email':'Email',
        }
        widgets = {
            'customer_email': EmailInput(attrs={
            'class': "input100",
            'placeholder': 'eg. habibu@gmail.com'
            }),
            'customer_password': PasswordInput(attrs={
            'class': "input100",
            'placeholder': 'Password',
            'id':'newPassword',
            'style':'font-size: 6px',
            }),
        }

class customerRequest(ModelForm):
    class Meta:
        model = Booking
        # fields = ['date_booking','service_booking','vehicle_type','vehicle_number','vehicle_model','extra','detail','amount','id_company','customer_id']
        fields = ['vehicle_number']
        labels = {
            # 'date_booking':'Date',
            # 'service_booking':'Service',
            'vehicle_number':'Plate Number',
            # 'vehicle_model':'Model',
            # 'extra':'Extra',
            # 'detail':'Detail',
            # 'amount':'Amount',
            # 'id_company':'Company',
            # 'customer_id':'customer Id',
        }
        widgets = {
            'vehicle_number': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'Plate Number',
            'style':'color: black'
            }),
            'detail': TextInput(attrs={
            'class': "form-control",
            'placeholder': 'more',
            'cols' :'25'
            })
        }

class imagePay(ModelForm):
    class Meta:
        model = Payment
        fields = ['image']
        widgets = {
            'image': HiddenInput(attrs={
            'id': "image2",
            'name':'pay_image',
            'accept': '.jpg, .jpeg, .png',
            'type': 'file'
            })
        }