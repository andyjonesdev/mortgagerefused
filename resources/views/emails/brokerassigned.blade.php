<x-mail::message>
# To {{$user['name']}},

You have been assigned a new enquiry.

<div class="enquiry_item">
<br>Name: <b>{{$enquiry['first_name']}} {{$enquiry['surname']}}</b>
<br>Email: <b>{{$enquiry['email']}}</b>
</div>

<x-mail::button :url="'https://mortgagerefused.com/login'">
Log in to website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
