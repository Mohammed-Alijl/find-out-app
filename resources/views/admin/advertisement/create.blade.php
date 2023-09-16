@extends('admin.layouts.master')
@section('title',__('admin/pages/advertisements.add.title'))
@section('css')
    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
          crossorigin="anonymous">
    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
    <!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
    <!-- the jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- buffer.min.js and filetype.min.js are necessary in the order listed for advanced mime type parsing and more correct
         preview. This is a feature available since v5.5.0 and is needed if you want to ensure file mime type is parsed
         correctly even if the local file's extension is named incorrectly. This will ensure more correct preview of the
         selected file (note: this will involve a small processing overhead in scanning of file contents locally). If you
         do not load these scripts then the mime type parsing will largely be derived using the extension in the filename
         and some basic file content parsing signatures. -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js"
            type="text/javascript"></script>
    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js"
            type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js"
            type="text/javascript"></script>
    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <!-- the main fileinput plugin script JS file -->

@endsection
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/advertisements.title')}}</strong> / {{__('admin/pages/advertisements.add.advertisement')}}
            </h3>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__('admin/pages/advertisements.add.title')}}</h5>
                <h6 class="card-subtitle text-muted">{{__('admin/pages/advertisements.add.description')}}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('advertisements.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="name_ar">{{__('admin/pages/advertisements.name_ar')}} <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" maxlength="255"
                                   placeholder="{{__('admin/pages/advertisements.name_ar')}}" autocomplete="off" required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/advertisements.name.invalid')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="name_en">{{__('admin/pages/advertisements.name_en')}} <span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="name_en" name="name_en" maxlength="255"
                                   placeholder="{{__('admin/pages/advertisements.name_en')}}" autocomplete="off" required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/advertisements.name.invalid')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="category_type">{{__('admin/pages/advertisements.category_type')}} <span style="color: red">*</span></label>
                            <select id="category_type" class="form-control" name="category_type_id" required>
                                    <option value="" selected disabled>Choose...</option>
                                @foreach($categoryTypes as $categoryType)
                                    <option value="{{$categoryType->id}}">{{$categoryType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="service">{{__('admin/pages/advertisements.service')}} <span style="color: red">*</span></label>
                            <select id="service" class="form-control" name="service_id" required>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputDisplayPlace">{{__('admin/pages/advertisements.display_place')}} <span style="color: red">*</span></label>
                            <select id="inputDisplayPlace" class="form-control" name="display_place" required>
                                    <option value="main" selected>{{__('admin/pages/advertisements.main.page')}}</option>
                                    <option value="city">{{__('admin/pages/advertisements.city.page')}}</option>
                                    <option value="both">{{__('admin/pages/advertisements.both.page')}}</option>
                            </select>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <div class="mb-3 col-md-6" id="cityContainer" style="display: none">
                            <label class="form-label" for="inputCity">{{__('admin/pages/advertisements.city')}} <span style="color: red">*</span></label>
                            <select id="inputCity" name="city_id" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input id="input-b3" name="images[]" type="file" class="file" multiple required
                           data-show-upload="false" data-show-caption="true"
                           data-msg-placeholder="Select images for upload...">
                    <br>
                    <button type="submit"
                            class="btn btn-primary">{{__('admin/pages/customers.add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Choices(document.querySelector("#category_type"));
            new Choices(document.querySelector("#inputCity"));
            // Choices.js
            var serviceSelect = new Choices(document.querySelector("#service"), {
                removeItemButton: true,
            });

            function updateServiceOptions(categoryTypeId) {
                if (categoryTypeId) {
                    $.ajax({
                        url: "{{ URL::to('admin/category-type-services') }}/" + categoryTypeId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var cityOptions = [];
                            $.each(data, function (key, value) {
                                cityOptions.push({value: key, label: value});
                            });
                            serviceSelect.setChoices(cityOptions, 'value', 'label', true);
                        },
                    });
                } else {
                    serviceSelect.clearChoices();
                }
            }

            $('#category_type').on('change', function () {
                var categoryTypeId = $(this).val();
                updateServiceOptions(categoryTypeId);

                serviceSelect.clearStore();
            });

            var defaultcategoryTypeId = $('#inputZone').val();
            updateServiceOptions(defaultcategoryTypeId);
        });

        document.getElementById('inputDisplayPlace').addEventListener('change',function(){
            if(this.value === 'city' || this.value === 'both'){
                document.getElementById('cityContainer').style.cssText = 'display: block';
                document.getElementById('inputCity').required = true;
            }else{
                document.getElementById('cityContainer').style.cssText = 'display: none';
                document.getElementById('inputCity').required = false;
                document.getElementById('inputCity').value = '';
            }
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

        $("#input-b3").fileinput({
            minFileCount: 1,
            theme: 'fas',
            allowedFileExtensions: ["jpg", "jpeg", "png", "svg"],
            showUpload: false,
            browseOnZoneClick: true,
        });


    </script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>

@endsection

