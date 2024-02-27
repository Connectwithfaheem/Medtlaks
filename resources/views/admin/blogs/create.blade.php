@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')

        <form class="needs-validation" novalidate="" action="{{ route('BlogStore') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4> Create New Blog</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Blog title</div>
                    <input name="title" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Blog title in required
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Select Category</div>
                    <select name="category_id[]" class="form-control select2" multiple="" required="">
                        @if ($categories)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="invalid-feedback">
                        Select at least one category.
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Custom Url</div>
                    <input name="custom_url"type="text" id="custom_url_input" class="form-control" required="">
                    <div class="invalid-feedback">
                        Add Custom Url.
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Meta Keyword (Separate Meta Keyword with commas)</div>
                    <textarea name="meta_keyword" class="form-control" maxlength="150"></textarea>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Meta Description</div>
                    <textarea name="meta_description" class="form-control" maxlength="150" required=""></textarea>
                    <div class="invalid-feedback">
                        Add Short Description
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Thumbnail (Size:840X400)</div>
                    <input name="thumbnail" class="form-control" type="file"  required="">
                    <div class="invalid-feedback">
                        Select Thumbnail
                    </div>
                </div>


                <div class="form-group ">
                    <div class="section-title mt-0">Status</div>
                    <select name="status" class="form-control selectric"  id="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="form-group ">
                    <div class="section-title mt-0">Written by</div>
                    <select name="written_by" class="form-control selectric"  id="">
                        <option>Select Writer</option>
                        @if(isset($admin) && count($admin)> 0)
                        @foreach ($admin as $writer)
                         <option value="{{ $writer->id }}">{{ $writer->user_name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group ">
                    <div class="section-title mt-0">Content</div>
                    <textarea name="content" class="summernote"></textarea>
                    <div class="invalid-feedback">

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
