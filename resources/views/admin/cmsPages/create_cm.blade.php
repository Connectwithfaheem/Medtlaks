@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')

    <form class="needs-validation" novalidate="" action="{{ route('cmsPagesStore') }}" method="post" >
        @csrf
        <div class="card-header">
            <h4> Create New Category</h4>
        </div>
        <div class="card-body d-flex">
            <div class="form-group col-6">
                <div class="section-title mt-0">Pages Type</div>
                <select name="cmsPages" class="form-control selectric"  id="">
                    <option value="1">Terms & Conditions</option>
                    <option value="0">Privacy Policy</option>
                </select>
            </div>
        </div>
                <div class="form-group col-6">
                    <div class="section-title mt-0">Status</div>
                    <select name="status" class="form-control selectric"  id="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="form-group m-4">
                    <div class="section-title mt-0">Content</div>
                    <textarea name="content" class="summernote"></textarea>
                    <div class="invalid-feedback">

                    </div>
                </div>
            </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
        </form>
    @endsection


</div>





@push('custom-script')
@endpush
