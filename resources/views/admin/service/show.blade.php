@extends('admin.layouts.master')
@section('title',__('admin/pages/services.show.service'))
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
                                           for="name_en">{{__('admin/pages/services.name_en')}}</label>
                                    <input type="text" class="form-control" id="name_en" name="name_en" disabled
                                           value="{{$service->getTranslation('name','en')}}"
                                           placeholder="{{__('admin/pages/services.name')}}" autocomplete="off"
                                           required>
                                    <div class="invalid-feedback">
                                        {{__('admin/pages/services.name.invalid')}}
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"
                                           for="name_ar">{{__('admin/pages/services.name_ar')}}</label>
                                    <input type="text" class="form-control" id="name_ar" name="name_ar" disabled
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
                                    <textarea class="form-control" name="details" id="details" disabled
                                              style="width: 100%; height: 100%">{{$service->details}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"
                                           for="facebook_link">{{__('admin/pages/services.facebook_link')}}</label>
                                    <input type="url" class="form-control" id="facebook_link" name="facebook_link"
                                           disabled
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
                                           name="instagram_link" value="{{$service->instagram_link}}" disabled
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
                                           disabled
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
                                    <select id="fixing_place" class="form-control choices-single" disabled
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
                                    <select id="inputCategory" class="form-control choices-single" disabled
                                            name="category_id"
                                            required>
                                        <option>{{$service->category->name}}</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"
                                           for="inputSubCategory">{{__('admin/pages/services.sub_category')}}</label>
                                    <select id="inputSubCategory" class="form-control choices-single" disabled
                                            name="sub_category_id">
                                        @isset($service->sub_category_id)
                                            <option>{{$service->subCategory->name}}</option>
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"
                                           for="start_at">{{__('admin/pages/services.start_at')}}</label>
                                    <input type="text" id="start_at" class="form-control start_at" name="start_at"
                                           placeholder="{{__('admin/pages/services.set.time')}}" disabled
                                           value="{{$service->start_at}}"/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"
                                           for="end_at">{{__('admin/pages/services.end_at')}}</label>
                                    <input type="text" id="end_at" class="form-control end_at" name="end_at"
                                           placeholder="{{__('admin/pages/services.set.time')}}" disabled
                                           value="{{$service->end_at}}"/>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="file-loading">
                        <input id="input-pd" name="images[]" type="file" multiple disabled>
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
                            @foreach($service->cities as $city)
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"
                                               for="inputZone">{{__('admin/pages/services.zone')}}</label>
                                        <select id="inputZone" class="form-control choices-single" name="zone_id[]" disabled>
                                            <option>{{$city->zone->name}}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"
                                               for="inputCity">{{__('admin/pages/services.city')}}</label>
                                        <select id="inputCity" class="form-control choices-single" name="city_id[]" disabled
                                                required>
                                            <option selected>{{$city->name}}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"
                                               for="inputMobileNumber">{{__('admin/pages/services.mobile_number')}}
                                        </label>
                                        <input type="text" id="inputMobileNumber" class="form-control"
                                               name="mobile_number[]" pattern="[0-9]{8,15}" maxlength="15" disabled
                                               value="{{$city->pivot->mobile_number}}"
                                               required
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                               autocomplete="off">
                                        <div class="invalid-feedback">
                                            {{__('admin/pages/services.mobile_number.invalid')}}
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#input-pd").fileinput({
            // minFileCount: 1,
            overwriteInitial: false,
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

