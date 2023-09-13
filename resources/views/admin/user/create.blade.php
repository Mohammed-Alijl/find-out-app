@extends('admin.layouts.master')
@section('title',__('admin/pages/users.add.title'))
@section('page-header')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{__('admin/pages/users.title')}}</strong> / {{__('admin/pages/users.add.user')}}
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
                <h5 class="card-title">{{__('admin/pages/users.add.title')}}</h5>
                <h6 class="card-subtitle text-muted">{{__('admin/pages/users.add.description')}}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('users.store')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="name">{{__('admin/pages/users.name')}} <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="{{__('admin/pages/users.name')}}" autocomplete="off" required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/users.name.invalid')}}
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="email">{{__('admin/pages/users.email')}} <span style="color:red">*</span></label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="{{__('admin/pages/users.email')}}" required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/users.email.invalid')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="username">{{__('admin/pages/users.username')}} <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="username" id="username"
                                   placeholder="{{__('admin/pages/users.username')}}" required>
                            <div class="invalid-feedback invalid-username">
                                {{__('admin/pages/users.username.invalid')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="mobile_number"
                                   class="form-label">{{__('admin/pages/users.mobile.number')}} <span style="color:red">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">-</span>
                                <input type="text" class="form-control" id="mobileNumberInput"
                                       aria-describedby="inputGroupPrepend" name="mobile_number" autocomplete="off"
                                       placeholder="{{__('admin/pages/users.mobile.number')}}"
                                       required maxlength="15" pattern=".{8,15}"
                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                <div class="invalid-feedback mobile-invalidFeedback">
                                    {{__('admin/pages/customers.mobile_number.invalid')}}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="inputPassword">{{__('admin/pages/customers.password')}} <span style="color:red">*</span></label>
                            <input type="password" class="form-control" name="password" id="inputPassword"
                                   placeholder="{{__('admin/pages/customers.password')}}" autocomplete="off" required
                                   minlength="8">
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.password.invalid')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="inputPasswordConfirm">{{__('admin/pages/customers.password.confirm')}} <span style="color:red">*</span></label>
                            <input type="password" class="form-control" id="inputPasswordConfirm"
                                   name="password_confirmation"
                                   placeholder="{{__('admin/pages/customers.password.confirm')}}" autocomplete="off"
                                   required>
                            <div class="invalid-feedback">
                                {{__('admin/pages/customers.password.confirm.invalid')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label"
                                   for="inputPasswordConfirm">{{__('admin/pages/users.profile.image')}}</label>
                            <input type="file" name="image" class="form-control" id="image" accept="image/png,image/jpg,image/jpeg,image/svg">
                            <div class="invalid-feedback">
                                {{__('admin/pages/users.image.invalid')}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputRole">{{__('admin/pages/users.role')}} <span style="color:red">*</span></label>
                            <select name="role_id" id="inputRole" class="form-control choices-single" required>
                                <option selected disabled value="">{{__('admin/pages/users.choose')}}</option>
                                @foreach($roles as $role)
                                    @if($role->name == 'Admin')
                                        @continue
                                    @endif
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{__('admin/pages/users.role.invalid')}}
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                            class="btn btn-primary">{{__('admin/pages/customers.add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        new Choices(document.querySelector("#inputRole"));

        //Bootstrap Form Validation
        (function () {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity() || !validateEmail() || !validateMobile() || !validateUsername()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    }, false);
                });
        })();


        //Validate Email if used
        document.querySelector('#email').addEventListener('input', validateEmail);

        function validateEmail() {
            return new Promise((resolve, reject) => {
            let emailIn = document.querySelector('#email');
            let invalidFeedback = emailIn.nextElementSibling; // Get the next sibling, which is the .invalid-feedback element

            $.ajax({
                url: '{{route('user-check-email')}}',
                method: 'POST',
                data: {
                    email: emailIn.value
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (!response.exists) {
                        emailIn.setCustomValidity("");
                        emailIn.classList.remove('is-invalid');
                        invalidFeedback.textContent = '{{__('admin/pages/customers.email.invalid')}}';
                        resolve(true);
                    } else {
                        emailIn.setCustomValidity("{{__('admin/pages/customers.email.in.used')}}");
                        emailIn.classList.add('is-invalid');
                        invalidFeedback.textContent = "{{__('admin/pages/customers.email.in.used')}}";
                        resolve(false);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error checking email availability');
                }

            });
            });
        }

        //Validate Email if used
        document.querySelector('#mobileNumberInput').addEventListener('input', validateMobile);
        function validateMobile() {
            return new Promise((resolve, reject) => {
                let mobileIn = document.querySelector('#mobileNumberInput');
                let invalidFeedback = document.querySelector('.mobile-invalidFeedback');

                $.ajax({
                    url: '{{route('user-check-mobile-number')}}',
                    method: 'POST',
                    data: {
                        mobile_number: mobileIn.value
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (!response.exists) {
                            mobileIn.setCustomValidity("");
                            mobileIn.classList.remove('is-invalid');
                            invalidFeedback.textContent = '{{__('admin/pages/customers.mobile_number.invalid')}}';
                            resolve(true); // Resolve the promise with true
                        } else {
                            mobileIn.setCustomValidity("{{__('admin/pages/customers.mobile_number.in.used')}}");
                            mobileIn.classList.add('is-invalid');
                            invalidFeedback.textContent = "{{__('admin/pages/customers.mobile_number.in.used')}}";
                            resolve(false); // Resolve the promise with false
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error checking mobile number availability');
                        reject(error); // Reject the promise in case of an error
                    }
                });
            });
        }


        document.querySelector('#username').addEventListener('input', validateUsername);
        function validateUsername() {
            return new Promise((resolve, reject) => {
                let usernameIn = document.querySelector('#username');
                let invalidFeedback = document.querySelector('.invalid-username');

                $.ajax({
                    url: '{{route('user-check-username')}}',
                    method: 'POST',
                    data: {
                        username: usernameIn.value
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (!response.exists) {
                            usernameIn.setCustomValidity("");
                            usernameIn.classList.remove('is-invalid');
                            invalidFeedback.textContent = '{{__('admin/pages/users.username.invalid')}}';
                            resolve(true); // Resolve the promise with true
                        } else {
                            usernameIn.setCustomValidity("{{__('admin/pages/users.username.in.used')}}");
                            usernameIn.classList.add('is-invalid');
                            invalidFeedback.textContent = "{{__('admin/pages/users.username.in.used')}}";
                            resolve(false); // Resolve the promise with false
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error checking username availability');
                        reject(error); // Reject the promise in case of an error
                    }
                });
            });
        }



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
                const isPasswordValid = passwordInput.value.length >= 8;
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

