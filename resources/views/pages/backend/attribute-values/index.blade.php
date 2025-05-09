@extends('layouts.backend-layout')
@section('title', "Attribute Values")
@section('content')

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Attribute Values</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('backend.dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Attribute Values
                    </p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary modal-add-attribute-value-btn" data-bs-toggle="modal"
                        data-bs-target="#modal-add-attribute-value">Add New Attribute Value</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="ec-cat-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row justify-content-between top-information">
                                        <div class="dataTables_length" id="responsive-data-table_length">
                                            <label>Show
                                                <select id="entriesPerPage" class="form-select form-select-sm">
                                                    <option value="10">10</option>
                                                    <option value="30">30</option>
                                                    <option value="50">50</option>
                                                    <option value="75">75</option>
                                                    <option value="-1">All</option>
                                                </select> entries
                                            </label>
                                        </div>
                                        <div id="responsive-data-table_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm"
                                                    placeholder="" aria-controls="responsive-data-table"></label>
                                        </div>
                                    </div>
                                    <table id="" class="table dataTable no-footer"
                                        aria-describedby="responsive-data-table_info">
                                        <thead>
                                            <tr>
                                                <th>Attribute</th>
                                                <th>Value</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="attributeValueTableBody">
                                        </tbody>
                                    </table>
                                    <div class="row justify-content-between bottom-information" id="Pagination"></div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD ATTRIBUTE VALUE MODAL -->
    <div class="modal fade" id="modal-add-attribute-value" tabindex="-1" aria-labelledby="addAttributeValueLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="attributeValueForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addAttributeValueLabel">Add New Attribute Value</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="value" class="form-label">Value</label>
                                <input type="text" class="form-control" id="value" name="value"
                                    placeholder="Enter Attribute Value">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="attribute_id" class="form-label">Select Attribute</label>
                                <select name="attribute_id" id="attribute_id" class="form-control">
                                    @foreach($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="status" class="form-label">Select Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Attribute Value</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT ATTRIBUTE VALUE MODAL -->
    <div class="modal fade" id="modal-edit-attribute-value" tabindex="-1" aria-labelledby="editAttributeValueLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="editAttributeValueForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAttributeValueLabel">Edit Attribute Value</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editAttributeValueId" name="attribute_value_id">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="editValue" class="form-label">Value</label>
                                <input type="text" class="form-control" id="editValue" name="value">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="editAttribute_id" class="form-label">Select Attribute</label>
                                <select name="attribute_id" id="editAttribute_id" class="form-control">
                                    @foreach($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="editStatus" class="form-label">Select Status</label>
                                <select name="status" id="editStatus" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Attribute Value</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DELETE ATTRIBUTE VALUE MODAL -->
    <div class="modal fade" id="modal-delete-attribute-value" tabindex="-1" aria-labelledby="deleteAttributeValueLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteAttributeValueForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAttributeValueLabel">Delete Attribute Value</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this attribute value?</p>
                        <input type="hidden" id="attributeValueIdToDelete" name="attribute_value_id">
                        <p class="text-danger">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Attribute Value</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let currentPerPage = 10;

                function fetchAttributeValues(page = 1, perPage = 10) {
                    $.ajax({
                        url: "{{ route('backend.attribute-values.index') }}",
                        type: 'GET',
                        data: { page: page, perPage: perPage },
                        dataType: "json",
                        success: function (data) {
                            let attributeValueTableBody = $('#attributeValueTableBody');
                            attributeValueTableBody.empty();

                            data.attributeValues.data.forEach(attributeValue => {
                                attributeValueTableBody.append(`
                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                            <td>${attributeValue.attribute.name}</td>
                                                                                                                                                                                                                                                            <td>${attributeValue.value}</td>
                                                                                                                                                                                                                                                            <td>${attributeValue.status}</td>
                                                                                                                                                                                                                                                            <td>
                                                                                                                                                                                                                                                                <button class="btn btn-sm btn-warning edit-attribute-value-btn" data-id="${attributeValue.id}">Edit</button>
                                                                                                                                                                                                                                                                <button class="btn btn-sm btn-danger delete-attribute-value-btn" data-id="${attributeValue.id}">Delete</button>
                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                        `);
                            });

                            const pagination = $('#Pagination');
                            pagination.html('');

                            if (data.attributeValues.current_page > 1) {
                                pagination.append(`
                                                                                                                                                                                                                                                            <button class="btn btn-sm btn-primary" onclick="fetchAttributeValues(${data.attributeValues.current_page - 1}, ${currentPerPage})">Previous</button>
                                                                                                                                                                                                                                                        `);
                            }

                            if (data.attributeValues.current_page < data.attributeValues.last_page) {
                                pagination.append(`
                                                                                                                                                                                                                                                            <button class="btn btn-sm btn-primary" onclick="fetchAttributeValues(${data.attributeValues.current_page + 1}, ${currentPerPage})">Next</button>
                                                                                                                                                                                                                                                        `);
                            }
                        }
                    });
                }

                fetchAttributeValues();

                $('#entriesPerPage').on('change', function () {
                    currentPerPage = $(this).val();
                    fetchAttributeValues(1, currentPerPage);
                });

                $(document).on('click', '.edit-attribute-value-btn', function () {

                    let id = $(this).data('id');
                    const fetchUrl = "{{ route('backend.attribute-values.edit', ['id' => ':id']) }}".replace(':id', id);

                    $.ajax({
                        url: fetchUrl,
                        type: 'GET',
                        dataType: "json",
                        success: function (response) {
                            var data = response.attributeValue;

                            $('#editAttributeValueId').val(data.id);
                            $('#editAttribute_id').val(data.attribute_id);
                            $('#editValue').val(data.value);
                            $('#editStatus').val(data.status);
                            $('#modal-edit-attribute-value').modal('show');
                        }

                    });
                });

                $('#editAttributeValueForm').submit(function (e) {
                    e.preventDefault();

                    let formData = $(this).serialize();
                    let attributeValueId = $('#editAttributeValueId').val();



                    const fetchUrl = "{{ route('backend.attribute-values.update', ['id' => ':id']) }}".replace(':id', attributeValueId);


                    $.ajax({
                        url: fetchUrl,
                        type: 'PUT',
                        data: formData,
                        success: function (response) {
                            if (response.success) {
                                $('#modal-edit-attribute-value').modal('hide');
                                fetchAttributeValues();
                                 flasher.success(response.message);
                            }else{
                                 flasher.error(response.message);
                            }
                        }
                    });
                });

                $(document).on('click', '.delete-attribute-value-btn', function () {
                    let attributeValueId = $(this).data('id');
                    $('#attributeValueIdToDelete').val(attributeValueId);
                    $('#modal-delete-attribute-value').modal('show');
                });

                $('#deleteAttributeValueForm').submit(function (e) {
                    e.preventDefault();

                    let id = $('#attributeValueIdToDelete').val();
                    const fetchUrl = "{{ route('backend.attribute-values.destroy', ':id') }}".replace(':id', id);
                    $.ajax({
                        url: fetchUrl,
                        type: 'DELETE',
                        success: function (response) {
                            if (response.success) {
                                $('#modal-delete-attribute-value').modal('hide');
                                fetchAttributeValues();
                                flasher.success(response.message);
                            } else {
                                flasher.error(response.message);
                            }

                        }, error: function (response) {
                            if (response.responseJSON.errors) {
                                $.each(response.responseJSON.errors, function (key, value) {
                                    flasher.error(value[0]);

                                });
                            } else {
                                flasher.error('Something went wrong. Please try again later.');
                            }
                        }
                    });
                });

                $('#attributeValueForm').submit(function (e) {
                    e.preventDefault();

                    let formData = $(this).serialize();




                    $.ajax({
                        url: "{{ route('backend.attribute-values.store') }}",
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            if (response.success) {
                                $('#modal-add-attribute-value').modal('hide');
                                fetchAttributeValues();
                                flasher.success(response.message);
                            } else {
                                flasher.error(response.message);
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection