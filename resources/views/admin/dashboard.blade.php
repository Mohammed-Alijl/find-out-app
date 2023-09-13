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
    <img src="{{asset('img/photos/dashboard.svg')}}" width="55%">
@endsection
