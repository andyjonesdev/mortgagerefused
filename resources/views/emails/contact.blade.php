<x-mail::message>
# To Mortgage Refused,

A new enquiry through the contact form has been submitted.

Name: <b>{{$name}}</b>
<br>Email: <b>{{$email}}</b>
<br>Message:<br>{{$message}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
