<x-mail::message>

Dear {{ $user['name'] }},

# Your new broker account is now active. Please log in using the button below.

Your credentials are:<br>
Email: {{ $user['email']}}<br>
Password: {{ $password}}

<x-mail::button :url="'https://mortgagerefused.com/login'">
Log in to Mortgage Refused
</x-mail::button>

Thank you,<br>
The Team @ Mortgage Refused
</x-mail::message>
