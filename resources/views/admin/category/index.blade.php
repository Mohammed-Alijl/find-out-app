@extends('admin.layouts.master')
@section('title',__('admin/pages/categories.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/categories.title')}}</strong></h3>
        </div>
        <div class="col-auto ms-auto text-end mt-n1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                {{__('admin/pages/categories.add.category')}}
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
                    <th>{{__('admin/pages/categories.name')}}</th>
                    <th>{{__('admin/pages/categories.type')}}</th>
                    <th>{{__('admin/pages/categories.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $rowNumber = 1;
                @endphp
                @foreach($categories as $category)
                    <tr>
                        <td>{{$rowNumber++}}</td>

                        <td>
                            <a href="{{route('categories.show',$category->id)}}">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>{{ $category->categoryType->name }}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit"
                               data-id="{{ $category->id }}"
                               data-name_ar="{{ $category->getTranslation('name','ar') }}"
                               data-name_en="{{ $category->getTranslation('name','en') }}"
                               data-category_type_id="{{ $category->category_type_id }}"
                            >
                                <i class="align-middle" data-feather="edit-2"></i>
                            </a>
                            <a href="#" onclick="deletes({{ $category->id }})"><i class="align-middle"
                                                                                  data-feather="trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Category Form -->
    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="{{route('categories.store')}}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="staticBackdropLabel">{{__('admin/pages/categories.add.category')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Name Arabic-->
                        <div class="mb-3">
                            <label class="form-label" for="name">{{__('admin/pages/categories.name_ar')}} <span
                                    style="color: red">*</span></label>
                            <input id="name" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/categories.name')}}" autocomplete="off" name="name_ar"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/categories.name.invalid')}}
                            </div>
                        </div>

                        <!-- Name English-->
                        <div class="mb-3">
                            <label class="form-label" for="name">{{__('admin/pages/categories.name_en')}} <span
                                    style="color: red">*</span></label>
                            <input id="name" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/categories.name')}}" autocomplete="off" name="name_en"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/categories.name.invalid')}}
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="mb-3">
                            <label class="form-label" for="categoryTypeInputAdd">{{__('admin/pages/categories.type')}}
                                <span
                                    style="color: red">*</span></label>
                            <select id="categoryTypeInputAdd" class="form-control" name="category_type_id" required>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- Submit & Close buttons -->
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__('admin/pages/categories.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('admin/pages/categories.add')}}</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Edit Category Form -->
    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="categories/update" method="post" class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="staticBackdropLabel">{{__('admin/pages/categories.edit.category')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="" id="edit_category_id" name="id">

                        <!-- Name Arabic-->
                        <div class="mb-3">
                            <label class="form-label" for="edit_name_ar">{{__('admin/pages/categories.name_ar')}} <span
                                    style="color: red">*</span></label>
                            <input id="edit_name_ar" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/categories.name')}}" autocomplete="off" name="name_ar"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/categories.name.invalid')}}
                            </div>
                        </div>

                        <!-- Name English-->
                        <div class="mb-3">
                            <label class="form-label" for="edit_name_en">{{__('admin/pages/categories.name_en')}} <span
                                    style="color: red">*</span></label>
                            <input id="edit_name_en" type="text" class="form-control" maxlength="50"
                                   placeholder="{{__('admin/pages/categories.name')}}" autocomplete="off" name="name_en"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/categories.name.invalid')}}
                            </div>
                        </div>
                        <!-- Type -->
                        <div class="mb-3">
                            <label class="form-label" for="categoryTypeInputEdit">{{__('admin/pages/categories.type')}}
                                <span
                                    style="color: red">*</span></label>
                            <select id="categoryTypeInputEdit" class="form-control" name="category_type_id" required>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <!-- Submit & Close buttons -->
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{__('admin/pages/categories.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('admin/pages/categories.edit')}}</button>
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

        //Delete Category Script
        function deletes(categoryId) {
            Swal.fire({
                title: '{{__('admin/pages/categories.are.you.sure')}}',
                text: "{{__('admin/pages/categories.not.able.revert')}}",
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{__('admin/pages/categories.delete')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteCategory(categoryId);
                }
            })
        }

        function deleteCategory(categoryId) {
            // Send an AJAX request or submit a form to the delete route
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('categories.destroy', ['category' => '__categoryId__']) }}'.replace('__categoryId__', categoryId);
            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">`;
            form.innerHTML = `<input type="hidden" name="id" value="${categoryId}">`;
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
                var category_type_id = button.data('category_type_id');
                var modal = $(this);
                modal.find('.modal-body #edit_name_ar').val(name_ar);
                modal.find('.modal-body #edit_name_en').val(name_en);
                modal.find('.modal-body #edit_category_id').val(id);
                // new Choices(document.querySelector('#categoryTypeInputEdit'));
                modal.find('.modal-body #categoryTypeInputEdit').val(category_type_id);
            });
        });

        new Choices(document.querySelector('#categoryTypeInputAdd'));

        @if(\Illuminate\Support\Facades\Session::has('delete-success'))
        Swal.fire(
            '{{__('admin/pages/categories.deleted')}}',
            '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('add-success'))
        Swal.fire(
            '{{__('admin/pages/categories.category.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/categories.category.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('delete-failed'))
        Swal.fire({
            title: '{{__('admin/pages/categories.category.cannot.delete')}}',
            text: '{{\Illuminate\Support\Facades\Session::get('delete-failed')}}',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '{{__('admin/pages/categories.ok')}}'
        })
        @endif
    </script>

@endsection
