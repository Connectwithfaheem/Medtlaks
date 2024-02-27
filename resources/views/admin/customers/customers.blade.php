@extends('admin_layout.master')
@push('custom-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<div class="card-body">
    @section('content')
    <h1>user</h1>
    <div class="container m-3"></div>

    @if (session()->has('message'))
    <div class="container m-2">
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    @endif
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                 {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                     {{ $user->email }}
                                                </td>


                                                <td>
                                                     {{ Crypt::decrypt($user->password) }}</td>
                                                <td>
                                                        <div class="form-group">
                                                            <label class="custom-switch mt-2">
                                                                <input type="checkbox" name="custom-switch-checkbox"
                                                                    id="statusCheckbox_{{ $user->id }}" data-item-id="{{ $user->id }}"
                                                                    @if ($user->status) checked @endif
                                                                    class="custom-switch-input">
                                                                <span class="custom-switch-indicator"></span>
                                                            </label>
                                                        </div>
                                                    <button type="button" class="btn btn-danger deleteBtn" data-id="{{ $user->id }}"
                                                        data-toggle="modal" data-target="#DeleteUsersModel">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>



                                                </td>
                                            </tr>
                                         @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    @endsection
     {{-- delete Blog Modal   --}}
    <div class="modal fade" id="DeleteUsersModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="mt-4 text-center">Delete Blog</h3>
                <form id="DeleteUsers">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 class="text-center">Are you Sure ?<br> </h4>
                            <p class="text-center">your not able to recover record </p>
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
                url: 'Customers/' + itemId + '/update-status',
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
  {{-- delete recorde   --}}
<script>
    $('.deleteBtn').click(function() {
        var id = $(this).attr('data-id');
        $('#delete_id').val(id);
    });

    $('#DeleteUsers').submit(function(e) {
        e.preventDefault();


        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('DeleteUsers') }}",
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
