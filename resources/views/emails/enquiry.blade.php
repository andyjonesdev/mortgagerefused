<x-mail::message>

A new enquiry has been submitted through the website.

<div class="enquiry_item">
<br>Name: <b>{{$enquiry['first_name']}} {{$enquiry['surname']}}</b>
<br>Mobile: <b>{{$enquiry['mobile']}}</b>
<br>Email: <b>{{$enquiry['email']}}</b>
<br>Other info: <b>{{$enquiry['other_info']}}</b>
</div>

<br>
<div class="enquiry_item2">
<br>Purpose: <b>{{$enquiry['purpose']}}</b>
<br>Price/value of property: <b>£{{$value}}</b>
<br>Would like to borrow: <b>£{{$borrow}}</b>
<br>Bankruptcy or IVA: <b>{{$enquiry['bankruptcy']}}</b>
<br>Debt management plan: <b>{{$enquiry['debt']}}</b>
<br>CCJ - defaults: <b>{{$enquiry['ccj']}}</b>
<br>Missed mortgage payments: <b>{{$enquiry['missed']}}</b>
<br>Employment status: <b>{{$enquiry['status']}}</b>
<br>Trading in the last 12 months: <b>{{$enquiry['trading_12_months']}}</b>
<br>Call back requested: <b>{{$enquiry['callback']}}</b>
</div>

</x-mail::message>
