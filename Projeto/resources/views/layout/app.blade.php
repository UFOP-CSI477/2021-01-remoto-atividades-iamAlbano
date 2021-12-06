@include('basic.header')

@if(session('msg'))
@include('alerts.message_success')
@endif

@if(session('danger'))
@include('alerts.message_danger')
@endif

@if(session('danger'))
@include('alerts.message_danger')
@endif

@yield('content')

@include('basic.footer')

