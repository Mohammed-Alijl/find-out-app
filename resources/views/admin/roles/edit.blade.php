@extends('admin.layouts.master')
@section('title',__('admin/pages/roles.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/roles.title')}}</strong> / {{__('admin/pages/roles.edit')}}</h3>
        </div>
    </div>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <form action="{{route('roles.update',$role->id)}}" method="post" class="needs-validation" novalidate id="myForm">
        @csrf
        @method('put')
        <div class="row">
            <input class="form-control form-control-lg mb-3" type="text"
                   placeholder="{{__('admin/pages/roles.role.name')}}" name="name" required autocomplete="off"
                   value="{{$role->name}}">
        </div>
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
                                        <input type="checkbox" id="{{ $model . $method }}" name="permission[]" value="{{ $method . '_' . $model }}"
                                               {{ in_array($method . '_' . $model , $rolePermissions) ? 'checked': '' }}>
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
        <button type="submit" class="btn btn-primary">{{__('admin/pages/roles.edit')}}</button>
    </form>
@endsection

@section('scripts')
    <script>
        (function () {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>
@endsection
