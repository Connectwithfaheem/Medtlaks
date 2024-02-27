@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')
        <form class="needs-validation" novalidate="" action="{{ route('BlogUpdate') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $blogs->id }}">
            <div class="card-header">
                <h4> Create New Blog</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="section-title mt-0">Blog title</div>
                    <input name="title" value="{{ $blogs->title }}" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Blog title in required
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Select Category</div>
                    @php
                        $cate_ids = $blogs->category_id ?? '';
                        $cate_ids = explode(',', $cate_ids);
                    @endphp
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="category_id[]" class="form-control select2" multiple="">
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (isset($cate_ids) && $cate_ids != '' && in_array($category->id, $cate_ids)) selected @endif>{{ $category->category }}</option>
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
                    <div class="section-title mt-0">Custom Url</div>
                    <input name="custom_url"type="text" id="custom_url_input" value="{{ $blogs->custom_url }}"
                        class="form-control" required="">
                    <div class="invalid-feedback">
                        Please add Custom Url.
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Meta Keyword (Separate Meta Keyword with commas)</div>
                    <textarea name="meta_keyword" class="form-control">{{ $blogs->meta_keyword }}</textarea>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Meta Description</div>
                    <textarea name="meta_description" class="form-control" required="">{{ $blogs->meta_description }}</textarea>
                    <div class="invalid-feedback">
                        Please add Short Description
                    </div>
                </div>
                <div class="form-group">
                    <div class="section-title mt-0">Thumbnail (Size: 840X400)</div>
                    <input name="thumbnail" class="form-control" type="file" @if(!isset($blogs->thumbnail)) required="" @endif>
                    <div class="invalid-feedback">
                        Please Select Thumbnail
                    </div>
                    @if (isset($blogs->thumbnail))
                        <img class="w-25 mt-2" style="border-radius: 20px" src="{{ asset('image/' . $blogs->thumbnail) }}" alt="deactive">
                    @else
                        Image Not Added Please Add Image
                    @endif
                </div>

                <div class="form-group ">
                    <div class="section-title mt-0">Status</div>
                    <select name="status" class="form-control selectric" id="">
                        <option value="1" @if($blogs->status == 1) selected @endif>Active</option>
                        <option value="0" @if($blogs->status == 0) selected @endif>Inactive</option>
                    </select>
                </div>
                <div class="form-group ">
                    <div class="section-title mt-0">Written by</div>
                    <select name="written_by" class="form-control selectric"  id="">
                        <option>Select Writer</option>
                        @if(isset($admin) && count($admin)> 0)
                        @foreach ($admin as $writer)
                         <option value="{{ $writer->id }}" @if($blogs->written_by == $writer->id) selected @endif>{{ $writer->user_name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group ">
                    <div class="section-title mt-0">Content</div>
                    <textarea name="content" class="summernote">{!! $blogs->content !!}</textarea>
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
