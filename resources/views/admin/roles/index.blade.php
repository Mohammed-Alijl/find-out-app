@extends('admin.layouts.master')
@section('title',__('admin/pages/roles.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/roles.title')}}</strong></h3>
        </div>
        @can('add_role')
            <div class="col-auto ms-auto text-end mt-n1">
                <a href="{{route('roles.create')}}" class="btn btn-primary">{{__('admin/pages/roles.add.role')}}</a>
            </div>
        @endcan
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('admin/pages/roles.role.name')}}</th>
                    <th>{{__('admin/pages/roles.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$rowNumber++}}</td>

                        <td>
                            @can('view_role')
                                <a href="{{ route('roles.show', $role->id) }}">
                                    {{ $role->name}}
                                </a>
                            @else
                                {{ $role->name}}
                            @endcan
                        </td>
                        <td>
                            @if($role->name != 'Admin')
                                @can('edit_role')
                                    <a href="{{route('roles.edit',$role->id)}}"><i class="align-middle"
                                                                                   data-feather="edit-2"></i></a>
                                @endcan
                                @can('delete_role')
                                    <a href="#" onclick="deletes({{ $role->id }})"><i class="align-middle"
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
    </script>
    <script>
        function deletes(roleId) {
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
                    // Perform the delete operation here
                    deleteRole(roleId);
                }
            })
        }

        function deleteRole(roleId) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('roles.destroy', ['role' => '__roleId__']) }}'.replace('__roleId__', roleId);
            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">`;
            form.innerHTML = `<input type="hidden" name="id" value="${roleId}">`;
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
    </script>
    @if(\Illuminate\Support\Facades\Session::has('delete-success'))
        <script>
            Swal.fire(
                '{{__('admin/pages/customers.deleted')}}',
                '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
                'success'
            )
        </script>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('add-success'))
        <script>
            Swal.fire(
                '{{__('admin/pages/roles.role.add')}}',
                '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
                'success'
            )
        </script>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        <script>
            Swal.fire(
                '{{__('admin/pages/roles.role.edit')}}',
                '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
                'success'
            )
        </script>
    @endif
@endsection
