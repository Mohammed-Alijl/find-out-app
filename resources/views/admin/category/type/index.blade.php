@extends('admin.layouts.master')
@section('title',__('admin/pages/types.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/types.title')}}</strong></h3>
        </div>
        <div class="col-auto ms-auto text-end mt-n1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                {{__('admin/pages/types.add.type')}}
            </button>
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
                    <th>{{__('admin/pages/types.name')}}</th>
                    <th>{{__('admin/pages/types.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $rowNumber = 1;
                @endphp
                @foreach($types as $type)
                    <tr>
                        <td>{{$rowNumber++}}</td>

                        <td>{{ $type->name }}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit"
                               data-id="{{ $type->id }}"
                               data-name_ar="{{ $type->getTranslation('name','ar') }}"
                               data-name_en="{{ $type->getTranslation('name','en') }}"
                            >
                                <i class="align-middle" data-feather="edit-2"></i>
                            </a>
                            <a href="#" onclick="deletes({{ $type->id }})"><i class="align-middle"
                                                                              data-feather="trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Category Type Form -->
    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="{{route('types.store')}}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{__('admin/pages/types.add.type')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Name Arabic-->
                        <div class="mb-3">
                            <label class="form-label" for="name">{{__('admin/pages/types.name_ar')}} <span
                                    style="color: red">*</span></label>
                            <input id="name" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/types.name')}}" autocomplete="off" name="name_ar"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/types.name.invalid')}}
                            </div>
                        </div>

                        <!-- Name English-->
                        <div class="mb-3">
                            <label class="form-label" for="name">{{__('admin/pages/types.name_en')}} <span
                                    style="color: red">*</span></label>
                            <input id="name" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/types.name')}}" autocomplete="off" name="name_en"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/types.name.invalid')}}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- Submit & Close buttons -->
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__('admin/pages/types.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('admin/pages/types.add')}}</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Edit Category Type Form -->
    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="types/update" method="post" class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{__('admin/pages/types.edit.category.type')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="" id="edit_type_id" name="id">

                        <!-- Name Arabic-->
                        <div class="mb-3">
                            <label class="form-label" for="edit_name_ar">{{__('admin/pages/types.name_ar')}} <span
                                    style="color: red">*</span></label>
                            <input id="edit_name_ar" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/types.name')}}" autocomplete="off" name="name_ar"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/types.name.invalid')}}
                            </div>
                        </div>

                        <!-- Name English-->
                        <div class="mb-3">
                            <label class="form-label" for="edit_name_en">{{__('admin/pages/types.name_en')}} <span
                                    style="color: red">*</span></label>
                            <input id="edit_name_en" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/types.name')}}" autocomplete="off" name="name_en"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/types.name.invalid')}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- Submit & Close buttons -->
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__('admin/pages/types.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('admin/pages/types.edit')}}</button>
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

        //Delete Category Type Script
        function deletes(typeId) {
            Swal.fire({
                title: '{{__('admin/pages/types.are.you.sure')}}',
                text: "{{__('admin/pages/types.not.able.revert')}}",
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{__('admin/pages/types.delete')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteCategoryType(typeId);
                }
            })
        }
        function deleteCategoryType(typeId) {
            // Send an AJAX request or submit a form to the delete route
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('types.destroy', ['type' => '__typeId__']) }}'.replace('__typeId__', typeId);
            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">`;
            form.innerHTML = `<input type="hidden" name="id" value="${typeId}">`;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;

            form.appendChild(csrfInput);
            form.innerHTML += `<input type="hidden" name="_method" value="DELETE">`;

            document.body.appendChild(form);
            form.submit();
        }

        //Put Values In The Edit Inputs
        $(document).ready(function () {
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var name_ar = button.data('name_ar');
                var name_en = button.data('name_en');
                var modal = $(this);
                modal.find('.modal-body #edit_name_ar').val(name_ar);
                modal.find('.modal-body #edit_name_en').val(name_en);
                modal.find('.modal-body #edit_type_id').val(id);
            });
        });


        @if(\Illuminate\Support\Facades\Session::has('delete-success'))
        Swal.fire(
            '{{__('admin/pages/types.deleted')}}',
            '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('add-success'))
        Swal.fire(
            '{{__('admin/pages/types.category.type.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/types.category.type.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('delete-failed'))
        Swal.fire({
            title: '{{__('admin/pages/types.category.type.cannot.delete')}}',
            text: '{{\Illuminate\Support\Facades\Session::get('delete-failed')}}',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '{{__('admin/pages/types.ok')}}'
        })
        @endif
    </script>

@endsection
