@extends('admin.layouts.master')
@section('title',__('admin/pages/socials.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/socials.title')}}</strong></h3>
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
    <div class="card">
        <div class="card-body">
            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('admin/pages/socials.name')}}</th>
                    <th>{{__('admin/pages/socials.link')}}</th>
                    <th>{{__('admin/pages/socials.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $rowNumber = 1;
                @endphp
                @foreach($socialMedias as $socialMedia)
                    <tr>
                        <td>{{$rowNumber++}}</td>

                        <td>{{ $socialMedia->name }}</td>
                        <td>{{ $socialMedia->link }}</td>
                        <td>
                            @can('edit_social')
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit"
                               data-id="{{ $socialMedia->id }}"
                               data-link="{{ $socialMedia->link }}"
                               data-name="{{ $socialMedia->name }}"
                            >
                                <i class="align-middle" data-feather="edit-2"></i>
                            </a>
                                @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Edit City Form -->
    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="socials/update" method="post" class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{__('admin/pages/socials.edit.social.link')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="" id="id" name="id">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label" for="name">{{__('admin/pages/socials.name')}}</label>
                            <input id="name" type="text" class="form-control"
                                   placeholder="{{__('admin/pages/socials.name')}}" autocomplete="off" disabled>
                        </div>

                        <!-- Link -->
                        <div class="mb-3">
                            <label class="form-label" for="link">{{__('admin/pages/socials.link')}} <span
                                    style="color: red">*</span></label>
                            <input id="link" type="url" class="form-control"
                                   placeholder="{{__('admin/pages/socials.link')}}" autocomplete="off" name="link"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/socials.link.invalid')}}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- Submit & Close buttons -->
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__('admin/pages/cities.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('admin/pages/cities.edit')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{URL::asset('js/datatables.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });

        //Bootstrap Form Validation
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


        //Put Values In The Edit Inputs
        $(document).ready(function () {
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var name = button.data('name');
                var link = button.data('link');
                var modal = $(this);
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #link').val(link);
                modal.find('.modal-body #id').val(id);
            });
        });

        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/socials.edited')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
    </script>

@endsection
