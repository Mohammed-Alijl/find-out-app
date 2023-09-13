@extends('admin.layouts.master')
@section('title',__('admin/pages/customers.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/customers.title')}}</strong></h3>
        </div>
        @can('add_customer')
        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{route('customers.create')}}" class="btn btn-primary">
                {{__('admin/pages/customers.add.customer')}}
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
                    <th>{{__('admin/pages/customers.name')}}</th>
                    <th>{{__('admin/pages/customers.email')}}</th>
                    <th>{{__('admin/pages/customers.mobile.number')}}</th>
                    <th>{{__('admin/pages/customers.zone')}}</th>
                    <th>{{__('admin/pages/customers.city')}}</th>
                    <th>{{__('admin/pages/customers.platform')}}</th>
                    <th>{{__('admin/pages/customers.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $rowNumber = 1;
                @endphp
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$rowNumber++}}</td>

                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->mobile_number }}</td>
                        <td>{{ $customer->zone->name }}</td>
                        <td>{{ $customer->city->name }}</td>
                        <td>{{ $customer->platform }}</td>
                        <td>
                            @can('edit_customer')
                            <a href="{{route('customers.edit',$customer->id)}}">
                                <i class="align-middle" data-feather="edit-2"></i>
                            </a>
                            @endcan
                            @can('delete_customer')
                            <a href="#" onclick="deletes({{ $customer->id }})"><i class="align-middle"
                                                                              data-feather="trash"></i></a>
                                @endcan
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
        function deletes(customerId) {
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
                    deleteCity(customerId);
                }
            })
        }
        function deleteCity(customerId) {
            // Send an AJAX request or submit a form to the delete route
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('customers.destroy', ['customer' => '__customerId__']) }}'.replace('__customerId__', customerId);
            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">`;
            form.innerHTML = `<input type="hidden" name="id" value="${customerId}">`;
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
            '{{__('admin/pages/customers.customer.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/customers.customer.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
    </script>

@endsection
