@extends('admin.layouts.master')
@section('title',__('admin/pages/customers.edit.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/customers.title')}}</strong> / {{__('admin/pages/customers.edit.title')}}
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
                <h5 class="card-title">{{__('admin/pages/customers.edit.title')}}</h5>
                <h6 class="card-subtitle text-muted">{{__('admin/pages/customers.edit.description')}}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('customers.update',$customer->id)}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="name">{{__('admin/pages/customers.name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}"
                                   placeholder="{{__('admin/pages/customers.name')}}" autocomplete="off" required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.name.invalid')}}
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="email">{{__('admin/pages/customers.email')}}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$customer->email}}"
                                   placeholder="{{__('admin/pages/customers.email')}}" required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.email.invalid')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="mobile_number"
                                   class="form-label">{{__('admin/pages/customers.mobile.number')}}</label>
                            <div class="input-group">
                                <span class="input-group-text">-</span>
                                <input type="text" class="form-control" id="mobileNumberInput" value="{{$customer->mobile_number}}"
                                       aria-describedby="inputGroupPrepend" name="mobile_number" autocomplete="off"
                                       placeholder="{{__('admin/pages/customers.mobile.number')}}"
                                       required maxlength="15" pattern=".{8,15}"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                <div class="invalid-feedback mobile-invalidFeedback">
                                    {{__('admin/pages/customers.mobile_number.invalid')}}
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="inputPlatform">{{__('admin/pages/customers.platform')}}</label>
                            <select id="inputPlatform" class="form-control" name="platform" required>
                                <option value="android" {{$customer->platform == 'android' ? 'selected' : ''}}>{{__('admin/pages/customers.android')}}</option>
                                <option value="ios" {{$customer->platform == 'ios' ? 'selected' : ''}}>{{__('admin/pages/customers.ios')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="inputPassword">{{__('admin/pages/customers.password')}}</label>
                            <input type="password" class="form-control" name="password" id="inputPassword"
                                   placeholder="{{__('admin/pages/customers.password')}}" autocomplete="off"
                                   minlength="8">
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.password.invalid')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="inputPasswordConfirm">{{__('admin/pages/customers.password.confirm')}}</label>
                            <input type="password" class="form-control" id="inputPasswordConfirm"
                                   name="password_confirmation"
                                   placeholder="{{__('admin/pages/customers.password.confirm')}}" autocomplete="off"
                                   >
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.password.confirm.invalid')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputZone">{{__('admin/pages/customers.zone')}}</label>
                            <select id="inputZone" class="form-control choices-single" name="zone_id" required>
                                @foreach($zones as $zone)
                                    <option value="{{$zone->id}}" {{$customer->zone->id == $zone->id ? 'selected' : ''}}>{{$zone->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.zone.invalid')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputCity">{{__('admin/pages/customers.city')}}</label>
                            <select id="inputCity" name="city_id" class="form-control" required>
                                <option value="{{$customer->city->id}}">{{$customer->city->name}}</option>
                            </select>
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.city.invalid')}}
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                            class="btn btn-primary">{{__('admin/pages/customers.edit')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Choices(document.querySelector("#inputPlatform"));
            new Choices(document.querySelector("#inputZone"));
            // Choices.js
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


        //Validate Password Confirmation
        document.addEventListener("DOMContentLoaded", function () {
            // Get the form element
            const form = document.forms[0];

            // Get password input and confirm password input
            const passwordInput = document.getElementById("inputPassword");
            const confirmPasswordInput = document.getElementById("inputPasswordConfirm");

            // Event listener for password input change
            passwordInput.addEventListener("input", function () {
                validatePassword();
                validateConfirmPassword();
            });

            // Event listener for confirm password input change
            confirmPasswordInput.addEventListener("input", validateConfirmPassword);

            // Event listener for form submission
            form.addEventListener("submit", function (event) {
                validatePassword();
                validateConfirmPassword();

                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            });

            // Function to validate the password
            function validatePassword() {
                const isPasswordValid = passwordInput.value.length >= 8 || passwordInput.value.length === 0;
                passwordInput.classList.toggle("is-valid", isPasswordValid);
                passwordInput.classList.toggle("is-invalid", !isPasswordValid);
            }

            // Function to validate the confirm password
            function validateConfirmPassword() {
                const doPasswordsMatch = confirmPasswordInput.value === passwordInput.value;
                confirmPasswordInput.classList.toggle("is-valid", doPasswordsMatch);
                confirmPasswordInput.classList.toggle("is-invalid", !doPasswordsMatch);
                confirmPasswordInput.setCustomValidity(doPasswordsMatch ? "" : "Passwords do not match");
            }
        });
    </script>
@endsection

