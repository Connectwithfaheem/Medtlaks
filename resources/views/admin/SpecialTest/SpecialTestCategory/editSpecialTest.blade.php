@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')

        <form class="needs-validation" novalidate="" action="{{ route('SpecialCategoryUpdate') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $categories->id }}">
            <div class="card-header">
                <h4> Update Category</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Edit Special Test Category</div>
                    <input name="category" type="text" class="form-control" required=""
                        value="{{ $categories->category }}">
                    <div class="invalid-feedback">
                        Add Special Test Category Field is Required !!
                    </div>
                    @error('category')
                        <div
                            style="width: 100%;
                    margin-top: 0.25rem;
                    font-size: 80%;
                    color: #dc3545;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="section-title mt-0">Status</div>
                    <select name="status" class="form-control selectric" id="">
                        <option value="1" @if ($categories->status == 1) selected @endif>Active</option>
                        <option value="0" @if ($categories->status == 0) selected @endif>Inactive</option>
                    </select>
                </div>

            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Submit</button>
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
