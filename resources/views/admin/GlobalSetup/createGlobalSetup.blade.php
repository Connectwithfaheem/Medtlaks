@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')
        <form class="needs-validation" novalidate="" action="{{ route('createSetup') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4> Create New Blog</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Logo</div>
                    <input name="logo" type="file" class="form-control">
                    <div class="invalid-feedback">
                         Logo is required
                    </div>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">title</div>
                    <input name="title" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                       title in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Email</div>
                    <input name="email" type="email" class="form-control" required="">
                    <div class="invalid-feedback">
                       Email in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Phone-Number</div>
                    <input name="phone" type="number" class="form-control" required="">
                    <div class="invalid-feedback">
                       Phone in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Address</div>
                    <input name="address" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                       Adress in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Whatsapp</div>
                    <input name="whatsapp" type="number" class="form-control" required="">
                    <div class="invalid-feedback">
                       Whatsapp in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Facebook</div>
                    <input name="facebook" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                       Facebook in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Instagram</div>
                    <input name="instagram" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                       Instagram in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">LinkedIn</div>
                    <input name="linkedin" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                       LinkedIn in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Youtube</div>
                    <input name="youtube" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                       Youtube in required
                    </div>
                </div>
            </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
        </form>
    @endsection


</div>





@push('custom-script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var customUrlInput = document.getElementById("custom_url_input");

            customUrlInput.addEventListener("input", function() {
                var inputValue = customUrlInput.value;
                var lowercasedValue = inputValue.toLowerCase();
                var sanitizedValue = lowercasedValue.replace(/ +(?=[^a-z0-9-])|(?<=[^a-z0-9-]) +/g, "");
                sanitizedValue = sanitizedValue.replace(/[^a-zA-Z0-9-]/g, "-");
                customUrlInput.value = sanitizedValue;
            });
        });
    </script>
@endpush
