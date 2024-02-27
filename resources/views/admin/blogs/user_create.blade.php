@extends('admin_layout.master')
@push('custom-style')
@endpush
<div class="card-body">
    @section('content')
    <div>
        <a class="btn btn-outline-primary m-2" href="{{ url('blog/category') }}"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <form class="needs-validation" novalidate="" action="{{ route('userStore') }}" method="post" >
        @csrf
        <div class="card-header">
            <h4> Create New Writer</h4>
        </div>
        <div class="card-body ">
                <div class="form-group col-12">
                    <div class="section-title mt-0">Posted By</div>
                    <input name="user_name" type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Category Field is Required !!
                    </div>
                    @error('category')
                    <div style="width: 100%;
                    margin-top: 0.25rem;
                    font-size: 80%;
                    color: #dc3545;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <div class="section-title mt-0">Link</div>
                    <input name="url"type="text" class="form-control" required="">
                    <div class="invalid-feedback">
                        Please add link                   </div>
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
