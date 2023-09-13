@extends('admin.layouts.master')
@section('title','Dashboard')

@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>{{__('admin/pages/dashboard.welcome')}} <strong>{{auth('admin')->user()->name}}</strong> {{__('admin/pages/dashboard.dashboard')}} 👋</h3>
        </div>
    </div>
@endsection
@section('content')
    <img src="https://images.unsplash.com/photo-1599658880436-c61792e70672?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" width="70%">
@endsection
