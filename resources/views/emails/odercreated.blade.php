@component('mail::message')
# Introduction

Tổng tiền : {{$order->grand_total}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
