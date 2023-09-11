@extends('admin.layouts.master')
@section('title',__('admin/pages/services.edit.service'))
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
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->
    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>

@endsection
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>
                <strong>{{__('admin/pages/services.title')}}</strong>
                / {{__('admin/pages/services.edit.service')}}
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
    <form action="{{route('services.update',$service->id)}}" method="post" enctype="multipart/form-data"
          class="needs-validation" novalidate>
        @csrf
        @method('put')
        <br>
        <div class="col-md-12">
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#service-info" data-bs-toggle="tab"
                                            role="tab"> {{__('admin/pages/services.service_info')}}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#service-zones" data-bs-toggle="tab"
                                            role="tab"> {{__('admin/pages/services.service_zones_cities')}}</a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="service-info" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><i class="align-middle me-2"
                                                          data-feather="info"></i>{{__('admin/pages/services.service_info')}}
                                </h5>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="name_en">{{__('admin/pages/services.name_en')}} <span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="name_en" name="name_en"
                                               value="{{$service->getTranslation('name','en')}}"
                                               placeholder="{{__('admin/pages/services.name')}}" autocomplete="off"
                                               required>
                                        <div class="invalid-feedback">
                                            {{__('admin/pages/services.name.invalid')}}
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="name_ar">{{__('admin/pages/services.name_ar')}} <span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar"
                                               value="{{$service->getTranslation('name','ar')}}"
                                               placeholder="{{__('admin/pages/services.name')}}" autocomplete="off"
                                               required>
                                        <div class="invalid-feedback">
                                            {{__('admin/pages/services.name.invalid')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-6 col-md-12">
                                        <label class="form-label"
                                               for="details">{{__('admin/pages/services.details')}}</label>
                                        <textarea class="form-control" name="details" id="details"
                                                  style="width: 100%; height: 100%">{{$service->details}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="facebook_link">{{__('admin/pages/services.facebook_link')}}</label>
                                        <input type="url" class="form-control" id="facebook_link" name="facebook_link"
                                               value="{{$service->facebook_link}}"
                                               placeholder="{{__('admin/pages/services.facebook_link')}}"
                                               autocomplete="off">
                                        <div class="invalid-feedback">
                                            {{__('admin/pages/services.link.invalid')}}
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="instagram_link">{{__('admin/pages/services.instagram_link')}}</label>
                                        <input type="url" class="form-control" id="instagram_link"
                                               name="instagram_link" value="{{$service->instagram_link}}"
                                               placeholder="{{__('admin/pages/services.instagram_link')}}"
                                               autocomplete="off">
                                        <div class="invalid-feedback">
                                            {{__('admin/pages/services.link.invalid')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="twitter_link">{{__('admin/pages/services.twitter_link')}}</label>
                                        <input type="url" class="form-control" id="twitter_link" name="twitter_link"
                                               value="{{$service->twitter_link}}"
                                               placeholder="{{__('admin/pages/services.twitter_link')}}"
                                               autocomplete="off">
                                        <div class="invalid-feedback">
                                            {{__('admin/pages/services.link.invalid')}}
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="fixing_place">{{__('admin/pages/services.fixing_place')}}</label>
                                        <select id="fixing_place" class="form-control choices-single"
                                                name="fixing_place">
                                            <option
                                                value="0" {{!$service->fixing_place ? 'selected' : ''}}>{{__('admin/pages/services.false')}}</option>
                                            <option
                                                value="1" {{$service->fixing_place ? 'selected' : ''}}>{{__('admin/pages/services.true')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="inputCategory">{{__('admin/pages/services.parent_category')}}</label>
                                        <select id="inputCategory" class="form-control choices-single"
                                                name="category_id"
                                                required>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id}}" {{$category->id == $service->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="inputSubCategory">{{__('admin/pages/services.sub_category')}}</label>
                                        <select id="inputSubCategory" class="form-control choices-single"
                                                name="sub_category_id">
                                            @isset($service->sub_category_id)
                                                <option
                                                    value="{{$service->sub_category_id}}">{{$service->subCategory->name}}</option>
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="start_at">{{__('admin/pages/services.start_at')}}</label>
                                        <input type="text" id="start_at" class="form-control start_at" name="start_at"
                                               placeholder="{{__('admin/pages/services.set.time')}}"
                                               value="{{$service->start_at}}"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"
                                               for="end_at">{{__('admin/pages/services.end_at')}}</label>
                                        <input type="text" id="end_at" class="form-control end_at" name="end_at"
                                               placeholder="{{__('admin/pages/services.set.time')}}"
                                               value="{{$service->end_at}}"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="file-loading">
                            <input id="input-pd" name="images[]" type="file" multiple>
                        </div>
                    </div>
                    <div class="tab-pane" id="service-zones" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><i
                                        class="align-middle me-2 fas fa-fw fa-percentage"></i>{{__('admin/pages/services.zones&services')}}
                                </h5>
                            </div>
                            <div class="card-body" id="zone-container">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <button class="btn btn-primary"
                                                id="add-zone">{{__('admin/pages/services.add.zone')}}</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"
                                               for="inputZone">{{__('admin/pages/services.zone')}} <span
                                                style="color:red">*</span></label>
                                        <select id="inputZone" class="form-control choices-single" name="zone_id[]"
                                                required>
                                            @foreach($zones as $zone)
                                                <option
                                                    value="{{$zone->id}}" {{$zone->id ==  $service->cities->first()->zone->id ? 'selected' : ''}}>{{$zone->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"
                                               for="inputCity">{{__('admin/pages/services.city')}} <span
                                                style="color:red">*</span></label>
                                        <select id="inputCity" class="form-control choices-single" name="city_id[]"
                                                required>
                                            <option value="{{$service->cities->first()->id}}"
                                                    selected>{{$service->cities->first()->name}}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"
                                               for="inputMobileNumber">{{__('admin/pages/services.mobile_number')}}
                                            <span style="color:red">*</span></label>
                                        <input type="text" id="inputMobileNumber" class="form-control"
                                               name="mobile_number[]" pattern="[0-9]{8,15}" maxlength="15"
                                               value="{{$service->cities->first()->pivot->mobile_number}}"
                                               required
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                               autocomplete="off">
                                        <div class="invalid-feedback">
                                            {{__('admin/pages/services.mobile_number.invalid')}}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @foreach($service->cities as $index => $city)
                                    <div class="row">
                                        @if ($loop->first)
                                            @continue
                                        @endif
                                        <div class="mb-3 col-md-3">
                                            <label for="inputZone_{{$city->zone->id}}" class="form-label">{{__('admin/pages/services.zone')}} <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="inputZone_{{$city->zone->id}}" name="zone_id[]">
                                                @foreach($zones as $zone)
                                                    <option
                                                        value="{{$zone->id}}" {{$zone->id ==  $city->zone->id ? 'selected' : ''}}>{{$zone->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="" class="form-label">{{__('admin/pages/services.city')}} <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" id="" name="city_id[]">
                                                @foreach($city->zone->cities as $zoneCity)
                                                    <option
                                                        value="{{$zoneCity->id}}" {{$city->id == $zoneCity->id ? 'selected' : ''}}>{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for=""
                                                   class="form-label">{{__('admin/pages/services.mobile_number')}} <span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="inputMobileNumber" class="form-control"
                                                   name="mobile_number[]" pattern="[0-9]{8,15}" maxlength="15"
                                                   value="{{$city->pivot->mobile_number}}"
                                                   required
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                   autocomplete="off">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <button class="btn btn-danger delete-zone" type="button"
                                                    style="margin-top: 28px;"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-square btn-primary">{{__('admin/pages/services.submit')}}</button>
    </form>

    <script>
        $("#input-pd").fileinput({
            // minFileCount: 1,
            overwriteInitial: true,
            initialPreview: [
                @foreach($service->images as $image)
                    "{{ asset('storage/img/' . $image->path) }}",
                @endforeach
            ],
            initialPreviewConfig: [
                    @foreach($service->images as $image)
                {
                    caption: '{{ $image->path }}',
                },
                @endforeach
            ],
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',
            initialPreviewShowDelete: false,
        });
    </script>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Choices(document.querySelector("#inputCategory"));
            let subCategory = new Choices(document.querySelector("#inputSubCategory"));

            function updateCategoryOptions(categoryId) {
                if (categoryId) {
                    $.ajax({
                        url: "{{ URL::to('admin/sub-categories') }}/" + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var categoryOptions = [];
                            $.each(data, function (key, value) {
                                categoryOptions.push({value: key, label: value});
                            });
                            subCategory.setChoices(categoryOptions, 'value', 'label', true);
                        },
                    });
                } else {
                    subCategory.clearChoices();
                }
            }

            $('#inputCategory').on('change', function () {
                var categoryId = $(this).val();
                updateCategoryOptions(categoryId);

                subCategory.clearStore();
            });

            var defaultCategoryId = $('#inputCategory').val();
            updateCategoryOptions(defaultCategoryId);
        });

        //Use Flatpicker Plugin for Start At Input
        flatpickr(".start_at", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
        //Use Flatpicker Plugin for End At Input
        flatpickr(".end_at", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        @foreach($service->zones as $zone)
        @if ($loop->first)
        @continue
        @endif
        new Choices(document.getElementById("inputZone_{{$zone->id}}"));
        @endforeach

        {{--        $("#input-b3").fileinput({--}}
        {{--            // minFileCount: 1,--}}
        {{--            overwriteInitial: true,--}}
        {{--            initialPreview: [--}}
        {{--                @foreach($service->images as $image)--}}
        {{--                    "{{ URL::asset('storage/img/services/' . $image->name) }}",--}}
        {{--                @endforeach--}}
        {{--                "http://localhost/laravel/out-find/public/storage/img/admins/default.png"--}}
        {{--            ],--}}
        {{--            initialPreviewConfig: [--}}
        {{--                    @foreach($service->images as $image)--}}
        {{--                {--}}
        {{--                    caption: '{{ $image->name }}',--}}
        {{--                },--}}
        {{--                @endforeach--}}
        {{--            ],--}}
        {{--            initialPreviewAsData: true,--}}
        {{--            initialPreviewFileType: 'image',--}}
        {{--            initialPreviewShowDelete: false,--}}
        {{--        });--}}
    </script>
    <script>
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

        document.addEventListener("DOMContentLoaded", function () {
            new Choices(document.querySelector("#inputZone"));
            var citySelect = new Choices(document.querySelector("#inputCity"), {
                removeItemButton: true,
            });

            // Ajax function to update the city options
            function updateCityOptions(zoneId) {
                if (zoneId) {
                    $.ajax({
                        url: "{{ URL::to('admin/zone-cities') }}/" + zoneId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var cityOptions = []; // Array to hold the city options
                            $.each(data, function (key, value) {
                                cityOptions.push({value: key, label: value}); // Add each city as an object to the array
                            });
                            citySelect.setChoices(cityOptions, 'value', 'label', true); // Set all city options at once
                        },
                    });
                } else {
                    citySelect.clearChoices(); // Clear the choices when no state is selected
                }
            }

            // Call the updateCityOptions function when the state selection changes
            $('#inputZone').on('change', function () {
                var zoneId = $(this).val();
                updateCityOptions(zoneId);

                // Clear the selected city when the state changes
                citySelect.clearStore();
            });

            // Call the updateCityOptions function initially to populate cities based on the default state selection
            var defaultzoneId = $('#inputZone').val();
            updateCityOptions(defaultzoneId);
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.getElementById("zone-container");
            const addButton = document.getElementById("add-zone");
            var rowsNumber = 1;

            addButton.addEventListener("click", function (event) {
                event.preventDefault();
                const newRow = createZoneRow();
                container.appendChild(newRow);
                const scriptElement = document.createElement("script");
                scriptElement.innerHTML = `
                let inputZone_${rowsNumber} = new Choices(document.querySelector("#inputZone${rowsNumber}"));
                `;
                document.body.appendChild(scriptElement);
                rowsNumber++;
            });

            container.addEventListener("click", function (event) {
                if (event.target && event.target.classList.contains("delete-zone")) {
                    const rowToDelete = event.target.closest(".row");
                    rowToDelete.remove();
                }
            });

            function createZoneRow() {
                const row = document.createElement("div");
                row.classList.add("row");

                const column1 = createColumn(["mb-3", "col-md-3"], "{{__('admin/pages/services.zone')}}", 'zone', rowsNumber);
                const column2 = createColumn(["mb-3", "col-md-3"], "{{__('admin/pages/services.city')}}", 'city', rowsNumber);
                const column3 = createColumn(["mb-3", "col-md-3"], "{{__('admin/pages/services.mobile_number')}}", 'mobile-number', rowsNumber);

                row.appendChild(column1);
                row.appendChild(column2);
                row.appendChild(column3);

                const deleteButton = document.createElement("button");
                deleteButton.classList.add("btn", "btn-danger", "delete-zone");
                deleteButton.type = "button";
                deleteButton.innerHTML = '<i class="fas fa-times"></i>';
                let buttonContainer = document.createElement('div');
                buttonContainer.classList.add("mb-3", "col-md-3");
                buttonContainer.appendChild(document.createElement('br'))
                buttonContainer.appendChild(deleteButton);
                row.appendChild(buttonContainer);

                const initialZoneSelect = row.querySelector(`#inputZone${rowsNumber}`);
                updateCityOptions(initialZoneSelect.value, row);
                return row;
            }

            function createColumn(classes, labelText, inputType, rowNumber) {
                const column = document.createElement("div");
                column.classList.add(...classes);

                // Label
                const label = document.createElement("label");
                label.classList.add("form-label");
                label.textContent = labelText;
                let starRequired = document.createElement('span');
                starRequired.textContent = " *";
                starRequired.style.cssText = 'color:red';
                label.appendChild(starRequired);
                column.appendChild(label);

                // Input
                if (inputType === 'zone') {
                    let selectZone = document.createElement('select');
                    selectZone.className = "form-control";
                    selectZone.name = "zone_id[]";
                    selectZone.required = true;
                    selectZone.id = `inputZone${rowNumber}`;
                    @foreach($zones as $zone)
                    var zoneOption = document.createElement('option');
                    zoneOption.value = "{{$zone->id}}";
                    zoneOption.appendChild(document.createTextNode("{{$zone->name}}"));
                    selectZone.appendChild(zoneOption);
                    @endforeach
                    selectZone.addEventListener("change", function () {
                        var zoneId = $(this).val();
                        updateCityOptions(zoneId, selectZone);
                    });
                    column.appendChild(selectZone);
                } else if (inputType === 'city') {
                    let selectCity = document.createElement('select');
                    selectCity.className = "form-control";
                    selectCity.name = "city_id[]";
                    selectCity.required = true;
                    selectCity.id = `inputCity${rowNumber}`;
                    selectCity.classList.add('inputCity');
                    column.appendChild(selectCity);
                } else if (inputType === 'mobile-number') {
                    let mobileNumberInput = document.createElement('input');
                    mobileNumberInput.className = "form-control";
                    mobileNumberInput.name = "mobile_number[]";
                    mobileNumberInput.required = true;
                    mobileNumberInput.maxLength = 15;
                    mobileNumberInput.placeholder = "{{__('admin/pages/services.mobile_number')}}";
                    mobileNumberInput.addEventListener("input", function () {
                        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
                    });
                    column.appendChild(mobileNumberInput);
                }

                return column;
            }
        });

        function updateCityOptions(zoneId, selectElement) {
            const row = selectElement.closest('.row');
            const citySelect = row.querySelector(".inputCity");
            // citySelect.clearStore();
            if (zoneId) {
                $.ajax({
                    url: "{{ URL::to('admin/zone-cities') }}/" + zoneId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        citySelect.innerHTML = '';
                        $.each(data, function (key, value) {
                            var option = document.createElement('option');
                            option.value = key;
                            option.textContent = value;
                            citySelect.appendChild(option);
                        });
                    },
                });
            } else {
                citySelect.empty(); // Clear the choices when no state is selected
            }
        }


    </script>

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
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->
    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>

@endsection

