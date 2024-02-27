@extends('admin_layout.master')
@push('custom-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<div class="card-body">
    @section('content')
        <div class="text-right">
            <a href="{{ route('CreateSpecialTest') }}" class="btn btn-lg btn-primary m-2"><i class="fas fa-plus"></i> Create Post</a>
        </div>
        <div class="card-header">
            <h4>All Blogs</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>Specail Title</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @if ($Special)
                        @foreach ($Special as $blog)
                            <tr>
                                <td>
                                 {{ $count++ }}
                                </td>
                                <td>
                                    {{ \Illuminate\Support\Str::limit($blog->title, 20) . '...' }}
                                </td>

                                <td>
                                    {{ $blog->created_at }}
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                id="statusCheckbox_{{ $blog->id }}" data-item-id="{{ $blog->id }}"
                                                @if ($blog->status) checked @endif
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <a href="
                                    {{ route('EditSpecialTest', $blog->id) }}
                                    " class="btn btn-primary"><i
                                            class="fas fa-edit"></i> Edit</a>

                                    <button type="button" class="btn btn-danger deleteBtn"
                                    data-id="{{ $blog->id }}"
                                        data-toggle="modal" data-target="#SpecialTestDeleteModel">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

        </div>






    @endsection
    {{-- -- delete Blog Modal   --}}
    <div class="modal fade" id="SpecialTestDeleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="mt-4 text-center">Delete Blog</h3>
                <form id="SpecialTestDelete">
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




<script src="{{ asset('/dist/assets/js/jquery.js') }}"></script>




@push('custom-script')
<script src="{{ asset('/dist/assets/modules/sweetalert/sweetalert.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('/dist/assets/js/page/modules-sweetalert.js') }}"></script>
<script src="{{ asset('/dist/assets/js/scripts.js') }}"></script>
<script src="{{ asset('/dist/assets/js/custom.js') }}"></script>
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
                url: 'SpecialTest/' + itemId + '/SpecialTestStatus',
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
{{--  delete recorde   --}}
<script>
    $('.deleteBtn').click(function() {
        var id = $(this).attr('data-id');
        $('#delete_id').val(id);
    });

    $('#SpecialTestDelete').submit(function(e) {
        e.preventDefault();


        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('SpecialTestDelete') }}",
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
@endpush
