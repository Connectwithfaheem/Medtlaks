@extends('admin_layout.master')
@push('custom-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

<div class="card-body">
    @section('content')
        <div class="text-right">
        </div>
        <div class="card-header">
            <h4>All Enquiry</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Massege</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @if ($enquiries)
                        @foreach ($enquiries as $enquiry)
                            <tr>
                                <td>
                                    {{ $count++ }}
                                </td>
                                <td>{{ $enquiry->name }}</td>
                                <td>{{ $enquiry->email }}</td>
                                <td>{{ $enquiry->subject }}</td>
                                <td>
                                    <a href="#" class="descButton" data-id="{{ $enquiry->id }}"
                                        data-desc="{{ $enquiry->massage }}" data-toggle="modal"
                                        data-target="#showDescModel">Clients Says</a>
                                </td>

                                <td>
                                    {{-- <a href="{{ route('DeleteEnquiry', $enquiry->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a> --}}

                                    <button data-id="{{ $enquiry->id }}" data-toggle="modal"
                                        data-target="#deleteEnquiryModel" class="btn btn-danger deleteBtn"
                                        id="deleteButton"><i class="fas fa-trash"></i> Delete</button>

                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    @endsection
    <div class="modal fade" id="showDescModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Client Message</h1>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <div id="showdesc">

                            <div>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- -- delete Blog Modal   --}}
    <div class="modal fade" id="deleteEnquiryModel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h3 class="mt-4 text-center">Delete category</h3>
                <form id="DeleteEnquiry">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 class="text-center">Are you Sure ?<br> </h4>
                            <p class="text-center"><b>Note:</b> you can not recover the record </p>
                            <input type="hidden" name="id" id="delete_id">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">No
                            thanks</button>
                        <button type="submit" class="btn btn-danger ">Yes Delete it !!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert@1"></script>

<script src="{{ asset('/dist/assets/js/jquery.js') }}"></script>


@push('custom-script')
    {{--  delete recorde   --}}
    <script>
        $(document).ready(function() {
            $('.deleteBtn').click(function() {
                var id = $(this).attr('data-id');
                $('#delete_id').val(id);
            });

            $('#DeleteEnquiry').submit(function(e) {
                e.preventDefault();


                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('DeleteEnquiry') }}",
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

        });
        $('.descButton').click(function() {
            var id = $(this).attr('data-id');
            var desc = $(this).attr('data-desc');
            $("#showdesc").text(desc);
        });
    </script>
    {{-- <script>
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
                url: 'enquiry/' + itemId + '/update-status',
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

</script> --}}
@endpush
