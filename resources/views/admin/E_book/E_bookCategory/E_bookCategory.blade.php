@extends('admin_layout.master')
@push('custom-style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
@endpush
<div class="card-body">
    @section('content')
    <div class="text-right">
        <a href="{{ route('AddE_bookCategory') }}" class="btn btn-lg btn-primary m-2"><i class="fas fa-plus"></i> Create Categories</a>
    </div>
        <div class="card-header">
            <h4>E-book Category</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Category</th>
                            <th>Created at</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @if($category)
                        @foreach ($category as $categories)
                        <tr>
                            <td>
                                {{ $count++ }}
                            </td>
                            <td>
                                {{ $categories->category }}
                            </td>
                            <td>
                                {{ $categories->created_at }}
                            </td>
                            <td>
                                <div class="form-group">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" id="statusCheckbox_{{ $categories->id }}" data-item-id="{{ $categories->id }}" @if($categories->status) checked @endif name="custom-switch-checkbox" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                   </label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('E_bookCategoryEdit', $categories->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                <button
                                data-id="{{ $categories->id }}"
                                data-toggle="modal" data-target="#EBookCategoryDeleteModel"  class="btn btn-danger deleteBtn" id="deleteButton"><i class="fas fa-trash"></i> Delete</button>

                            </td>
                        </tr>
                        @endforeach


                            @else
                            <td>Not Found</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
             {{-- -- delete Blog Modal   --}}
             <div class="modal fade" id="EBookCategoryDeleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                            <h3 class="mt-4 text-center">Delete category</h3>
                        <form id="EBookCategoryDelete">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <h4 class="text-center">Are you Sure ?<br> </h4>
                                    <p class="text-center"><b>Note:</b> you can not recover the record </p>
                                    <input type="hidden" name="id" id="delete_id">

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No
                                    thanks</button>
                                <button type="submit" class="btn btn-danger ">Yes Delete it !!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>


<!-- Include SweetAlert CSS and JS files -->



<script src="{{ asset('/dist/assets/js/jquery.js') }}"></script>





@push('custom-script')
<script src="{{ asset('/dist/assets/modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('/dist/assets/js/page/modules-sweetalert.js') }}"></script>
    {{--  delete recorde   --}}
    <script>
        $('.deleteBtn').click(function() {
            var id = $(this).attr('data-id');
            $('#delete_id').val(id);
        });

        $('#EBookCategoryDelete').submit(function(e) {
            e.preventDefault();


            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('EBookCategoryDelete') }}",
                type: 'POST',
                data: formData,
                success: function(data) {
                    if (data.success == true) {

                        location.reload();

                    } else {

                        alert(data.msg);
                    }
                }
            });

        });
    </script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').on('change', function() {
            const itemId = $(this).data('item-id');
            const isActive = $(this).prop('checked') ? 1 : 0;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/E_bookCategory/' + itemId + '/updateE_bookStatus',
                type: 'POST',
                data: {
                    status: isActive
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>
@endpush
