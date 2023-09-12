@extends('admin.layouts.master')
@section('title',__('admin/pages/pages.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/pages.title')}}</strong></h3>
        </div>
        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{route('pages.create')}}" class="btn btn-primary">
                {{__('admin/pages/pages.add.page')}}
            </a>
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
                    <th>{{__('admin/pages/pages.name')}}</th>
                    <th>{{__('admin/pages/customers.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            <img src="{{asset('storage/img/' . $page->image_path)}}" width="32" height="32" class="rounded-circle my-n1" alt="{{$page->name}}">
                        </td>

                        <td>{{ $page->name }}</td>
                        <td>
                            <a href="{{route('pages.edit',$page->id)}}">
                                <i class="align-middle" data-feather="edit-2"></i>
                            </a>
                            <a href="#" onclick="deletes({{ $page->id }})"><i class="align-middle"
                                                                              data-feather="trash"></i></a>
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


        //Delete Service Script
        function deletes(pageId) {
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
                    deletePage(pageId);
                }
            })
        }
        function deletePage(pageId) {
            // Send an AJAX request or submit a form to the delete route
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('pages.destroy', ['page' => '__pageId__']) }}'.replace('__pageId__', pageId);
            form.innerHTML = `<input type="hidden" name="_method" value="DELETE">`;
            form.innerHTML = `<input type="hidden" name="id" value="${pageId}">`;
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
            '{{__('admin/pages/pages.page.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/pages.page.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
    </script>

@endsection
