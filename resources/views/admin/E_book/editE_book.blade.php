@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')
        <form class="needs-validation" novalidate="" action="{{ route('E_BookUpdate') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $eBook->id }}">
            <div class="card-header">
                <h4> Create New Blog</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0"> title</div>
                    <input name="title" value="{{ $eBook->title }}" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Blog title in required
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Select Category</div>
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $eBook->category_id ? 'selected' : '' }}>{{ $category->category }}
                                </option>
                            @endforeach
                        @else
                            <option disabled>Categories Not Found</option>
                        @endif
                    </select>
                    <div class="invalid-feedback">
                        Please Select at least one category.
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Thumbnail (Size: 840X400)</div>
                    <input name="thumbnail" class="form-control" type="file"
                        @if (!isset($eBook->thumbnail)) required="" @endif>
                    <div class="invalid-feedback">
                        Please Select Thumbnail
                    </div>
                    @if (isset($eBook->thumbnail))
                        <img class="w-25 mt-2" style="border-radius: 20px" src="{{ asset('E_bookThumbnail/' . $eBook->thumbnail) }}"
                            alt="deactive">
                    @else
                        Image Not Added Please Add Image
                    @endif
                </div>

                <div class="card-group">
                    <div class="section-title mt-0">Google Drive Link</div>
                    <input name="googleDrive" type="text" class="form-control" required=""
                        value="{{ old('googleDrive', $eBook->drive) }}">
                    <div class="invalid-feedback">
                        Facebook in required
                    </div>
                </div>



                <div class="form-group ">
                    <div class="section-title mt-0">Status</div>
                    <select name="status" class="form-control selectric" id="">
                        <option value="1" @if ($eBook->status == 1) selected @endif>Active</option>
                        <option value="0" @if ($eBook->status == 0) selected @endif>Inactive</option>
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
