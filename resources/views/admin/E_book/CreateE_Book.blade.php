@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')
        <form class="needs-validation" novalidate="" action="{{ route('E_BookStore') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4> Create New Blog</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0"> title</div>
                    <input name="title" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Title in required
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Select Category</div>
                    <select name="category_id" class="form-control" required="">
                        @if (isset($categories) && count($categories) > 0)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="invalid-feedback">
                        Please Select at least one category.
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Thumbnail (Size:840X400)</div>
                    <input name="thumbnail" class="form-control" type="file" required="">
                    <div class="invalid-feedback">
                        Please Select Thumbnail
                    </div>
                </div>
                <div class="card-group">

                    <div class="section-title mt-0">Add Google Drive Link</div>
                    <input name="googleDrive" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Google Drive Link in required
                    </div>

                </div>
                <div class="form-group ">
                    <div class="section-title mt-0">Status</div>
                    <select name="status" class="form-control selectric" id="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
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
