@extends('dashboard-page.layouts.main')
@section('container')
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="app-content">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
            @endif
        </div>
        <div class="app-content-header d-flex align-items-center justify-content-between">
            <h1 class="app-content-headerText" style="color: black">Still Developing...</h1>
            {{-- <img src="{{ asset('assets/images/myshoppu-logo.png') }}" alt=""> --}}
        </div>
    </div>
@endsection
