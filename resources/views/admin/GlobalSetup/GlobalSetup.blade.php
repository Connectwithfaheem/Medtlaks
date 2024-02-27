@extends('admin_layout.master')
@push('custom-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<div class="card-body">
    @section('content')
        <div class="text-right">
            <a href="{{ route('createGlobal') }}" class="btn btn-lg btn-primary m-2"><i class="fas fa-plus"></i>Add New Global
                Setup</a>
        </div>
        <div class="card-header">
            <h4>Global Setup</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>Logo</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>WhatsApp</th>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>LinkedIn</th>
                        <th>Youtube</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @if ($setup)
                        @foreach ($setup as $global)
                            <tr>
                                <td>
                                    {{ $count++ }}
                                </td>

                                <td>
                                    @if (isset($global->logo))
                                        <img class="" style="border-radius: 20px; width: 30px; height: 30px;"
                                            src="{{ asset('logo/' . $global->logo) }}" alt="deactive">
                                    @else
                                        Image Not Added Please Add Image
                                    @endif
                                </td>
                                <td>
                                    {{ $global->title }}
                                </td>
                                <td>
                                    {{ $global->email }}
                                </td>
                                <td>
                                    {{ $global->phone }}
                                </td>
                                <td>
                                    {{ $global->address }}
                                </td>
                                <td>
                                    {{ $global->whatsapp }}
                                </td>
                                <td>
                                    {{ $global->facebook }}
                                </td>
                                <td>
                                    {{ $global->instagram }}
                                </td>
                                <td>
                                    {{ $global->linkedin }}
                                </td>
                                <td>
                                    {{ $global->youtube }}
                                </td>
                                <td>
                                    <a href="{{ route('editSetup', $global->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

                                    <button type="button" class="btn btn-danger deleteBtn"data-id="{{ $global->id }}" data-toggle="modal" data-target="#DeleteSetupGlobalModel">
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
    <div class="modal fade" id="DeleteSetupGlobalModel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="mt-4 text-center">Delete Blog</h3>
                <form id="DeleteSetup">
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
                    url: 'cmsPages/' + itemId + '/update-status',
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

        $('#DeleteSetup').submit(function(e) {
            e.preventDefault();


            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('DeleteSetup') }}",
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
