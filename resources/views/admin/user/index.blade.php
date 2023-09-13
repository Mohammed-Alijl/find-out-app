@extends('admin.layouts.master')
@section('title',__('admin/pages/users.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/users.title')}}</strong></h3>
        </div>
        @can('add_user')
        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{route('users.create')}}" class="btn btn-primary">
                {{__('admin/pages/users.add.user')}}
            </a>
        </div>
            @endcan
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
                    <th>{{__('admin/pages/users.name')}}</th>
                    <th>{{__('admin/pages/users.username')}}</th>
                    <th>{{__('admin/pages/users.email')}}</th>
                    <th>{{__('admin/pages/users.mobile.number')}}</th>
                    <th>{{__('admin/pages/users.role.name')}}</th>
                    <th>{{__('admin/pages/users.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <img src="{{asset('storage/img/' . $user->image)}}" width="32" height="32" class="rounded-circle my-n1" alt="{{$user->name}}">
                        </td>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile_number }}</td>
                        <td>{{ $user->roles->first()->name }}</td>
                        <td>
                            @if($user->roles->pluck('name','name')->first() != 'Admin')
                            @can('edit_user')
                            <a href="{{route('users.edit',$user->id)}}">
                                <i class="align-middle" data-feather="edit-2"></i>
                            </a>
                            @endcan
                            @can('delete_user')
                            <a href="#" onclick="deletes({{ $user->id }})"><i class="align-middle"
                                                                              data-feather="trash"></i></a>
                                @endcan
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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


        //Delete Customer Script
        function deletes(userId) {
            Swal.fire({
                title: '{{__('admin/pages/customers.are.you.sure')}}',
                text: "{{__('admin/pages/customers.not.able.revert')}}",
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{__('admin/pages/customers.delete')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteCity(userId);
                }
            })
        }
        function deleteCity(userId) {
            // Send an AJAX request or submit a form to the delete route
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('users.destroy', ['user' => '__userId__']) }}'.replace('__userId__', userId);
            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">`;
            form.innerHTML = `<input type="hidden" name="id" value="${userId}">`;
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


        @if(\Illuminate\Support\Facades\Session::has('delete-success'))
        Swal.fire(
            '{{__('admin/pages/customers.deleted')}}',
            '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('add-success'))
        Swal.fire(
            '{{__('admin/pages/users.user.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/users.user.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
    </script>

@endsection
