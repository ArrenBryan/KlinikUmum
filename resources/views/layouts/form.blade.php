@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="text-center mb-3">@yield('header')</h1>

    @yield('content-form')
</div>
@endsection
