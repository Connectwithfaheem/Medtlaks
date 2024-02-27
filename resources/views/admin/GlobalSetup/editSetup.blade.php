@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')
        <form class="needs-validation" novalidate="" action="{{ route('updateSetup') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @foreach ($global as $setup)
        <input type="hidden" name="id" value="{{ $setup->id }}">
            <div class="card-header">
                <h4> Create New Blog</h4>
            </div>


            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Logo</div>
                    <input name="logo" type="file" class="form-control"  value="{{ old('logo', $setup->logo) }}">
                    {{-- <div class="invalid-feedback">
                         Logo is required
                    </div> --}}
                </div>
                @if (isset($setup->logo))
                    <img class="w-25 mt-2" style="border-radius: 20px" src="{{ asset('logo/' . $setup->logo) }}" alt="deactive">
                @else
                    Image Not Added Please Add Image
                @endif
            </div>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">title</div>
                    <input name="title" type="text" class="form-control" required="" value="{{ old('title', $setup->title) }}" >
                    <div class="invalid-feedback">
                       title in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Email</div>
                    <input name="email" type="email" class="form-control" required="" value="{{ old('email', $setup->email) }}">
                    <div class="invalid-feedback">
                       Email in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Phone-Number</div>
                    <input name="phone" type="number" class="form-control" required="" value="{{ old('phone', $setup->phone) }}">
                    <div class="invalid-feedback">
                       Phone in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Address</div>
                    <input name="address" type="text" class="form-control" required="" value="{{ old('address', $setup->address) }}">
                    <div class="invalid-feedback">
                       Adress in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Whatsapp</div>
                    <input name="whatsapp" type="number" class="form-control" required="" value="{{ old('whatsapp', $setup->whatsapp) }}">
                    <div class="invalid-feedback">
                        Whatsapp in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Facebook</div>
                    <input name="facebook" type="text" class="form-control" required="" value="{{ old('facebook', $setup->facebook) }}">
                    <div class="invalid-feedback">
                       Facebook in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Instagram</div>
                    <input name="instagram" type="text" class="form-control" required="" value="{{ old('instagram', $setup->instagram) }}">
                    <div class="invalid-feedback">
                       Instagram in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">LinkedIn</div>
                    <input name="linkedin" type="text" class="form-control" required="" value="{{ old('linkedin', $setup->linkedin) }}">
                    <div class="invalid-feedback">
                       LinkedIn in required
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Youtube</div>
                    <input name="youtube" type="text" class="form-control" required="" value="{{ old('youtube', $setup->youtube) }}">
                    <div class="invalid-feedback">
                       Youtube in required
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
            @endforeach
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
