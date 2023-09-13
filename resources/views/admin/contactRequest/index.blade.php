@extends('admin.layouts.master')
@section('title',__('admin/pages/contactRequests.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/contactRequests.title')}}</strong></h3>
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
                    <th>{{__('admin/pages/contactRequests.name')}}</th>
                    <th>{{__('admin/pages/contactRequests.email')}}</th>
                    <th>{{__('admin/pages/contactRequests.msgTitle')}}</th>
                    <th style="width: 450px;">{{__('admin/pages/contactRequests.message')}}</th>
                    <th>{{__('admin/pages/contactRequests.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $rowNumber = 1;
                @endphp
                @foreach($contactRequests as $contactRequest)
                    <tr>
                        <td>{{$rowNumber++}}</td>

                        <td>{{ $contactRequest->name }}</td>
                        <td>{{ $contactRequest->email }}</td>
                        <td>{{ $contactRequest->title }}</td>
                        <td>{{ $contactRequest->message }}</td>
                        <td>
                            @can('delete_contact')
                            <a href="#" onclick="deletes({{ $contactRequest->id }})"><i class="align-middle"
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

        //Delete Contact Request Script
        function deletes(contactRequestId) {
            Swal.fire({
                title: '{{__('admin/pages/cities.are.you.sure')}}',
                text: "{{__('admin/pages/cities.not.able.revert')}}",
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{__('admin/pages/cities.delete')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteContactRequest(contactRequestId);
                }
            })
        }
        function deleteContactRequest(contactRequestId) {
            // Send an AJAX request or submit a form to the delete route
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('contacts.destroy', ['contact' => '__contactRequestId__']) }}'.replace('__contactRequestId__', contactRequestId);
            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">`;
            form.innerHTML = `<input type="hidden" name="id" value="${contactRequestId}">`;
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
            '{{__('admin/pages/cities.deleted')}}',
            '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
            'success'
        )
        @endif

    </script>

@endsection
