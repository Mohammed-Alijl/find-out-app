@extends('admin.layouts.master')
@section('title',__('admin/pages/roles.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
                <h3><strong>{{__('admin/pages/roles.title')}}</strong> / {{__('admin/pages/roles.show')}}</h3>
        </div>
    </div>
@endsection
@section('content')
    @foreach($models as $index => $model)
        @if($index % 4 === 0)
            <div class="row">
                @endif
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header" style="background: #21beb5">
                            <h5 class="card-title mb-0"
                                style="color: white">{{__('admin/pages/roles.' . $model)}}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach($methods as $method)
                                @if($model == 'advertisement_request' && $method == 'edit')
                                    <li class="list-group-item">-</li>
                                    @continue
                                @elseif($model == 'social' && ($method == 'add' || $method == 'delete'))
                                    <li class="list-group-item">-</li>
                                    @continue
                                @elseif($model == 'contact' && ($method == 'add' || $method == 'edit'))
                                    <li class="list-group-item">-</li>
                                    @continue
                                @endif
                                <li class="list-group-item">
                                    <input type="checkbox" id="{{ $model . $method }}" name="permission[]"
                                            {{ in_array($method . '_' . $model , $rolePermissions) ? 'checked': '' }} disabled>
                                    <label
                                        for="{{ $model . $method }}"> {{__("admin/pages/roles.$method")}}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if($index % 4 === 3 || $index === count($models) - 1)
            </div>
        @endif
    @endforeach

@endsection
