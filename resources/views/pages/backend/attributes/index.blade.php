@extends('layouts.backend-layout')
@section('title', "Attributes")
@section('content')

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Attributes</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('backend.dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Attributes
                    </p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary modal-add-attribute-btn" data-bs-toggle="modal"
                        data-bs-target="#modal-add-attribute">Add New Attribute</button>
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
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="attributeTableBody">

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
    <!-- ADD ATTRIBUTE MODAL -->
    <div class="modal fade" id="modal-add-attribute" tabindex="-1" aria-labelledby="addAttributeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="AttributeForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addAttributeLabel">Add New Attribute</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6 mb-4">
                                <label for="attributeName" class="form-label">Attribute Name</label>
                                <input type="text" class="form-control" id="attributeName" name="name"
                                    placeholder="Enter Attribute Name">
                            </div>


                            <div class="col-md-6 mb-4">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="select">Select</option>
                                    <option value="multiselect">Multiselect</option>
                                    <option value="text">Text</option>
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
                        <button type="submit" class="btn btn-primary">Save Attribute</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT ATTRIBUTE MODAL -->
    <div class="modal fade" id="modal-edit-attribute" tabindex="-1" aria-labelledby="editAttributeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="editAttributeForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAttributeLabel">Edit Attribute</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editAttributeId" name="attribute_id">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="editAttributeName" class="form-label">Attribute Name</label>
                                <input type="text" class="form-control" id="editAttributeName" name="name">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="editType" class="form-label">Type</label>
                                <select name="type" id="editType" class="form-control">
                                    <option value="select">Select</option>
                                    <option value="multiselect">Multiselect</option>
                                    <option value="text">Text</option>
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
                        <button type="submit" class="btn btn-primary">Update Attribute</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- DELETE ATTRIBUTE MODAL -->
    <div class="modal fade" id="modal-delete-attribute" tabindex="-1" aria-labelledby="deleteAttributeLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteAttributeForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAttributeLabel">Delete Attribute</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this attribute?</p>
                        <input type="hidden" id="attributeIdToDelete" name="attribute_id">
                        <p class="text-danger">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Attribute</button>
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

                function fetchAttributes(page = 1, perPage = 10) {
                    $.ajax({
                        url: "{{ route('backend.attributes.index') }}",
                        type: 'GET',
                        data: { page: page, perPage: perPage },
                        dataType: "json",
                        success: function (data) {


                            let attributeTableBody = $('#attributeTableBody');
                            attributeTableBody.empty();

                            data.attributes.data.forEach(attribute => {
                                attributeTableBody.append(`
                                <tr>
                                    <td>${attribute.name}</td>

                                    <td>${attribute.type}</td>

                                    <td><span class="badge bg-${attribute.status === 'Active' ? 'success' : 'danger'}">${attribute.status}</span></td>

                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary edit-attribute" data-id="${attribute.id}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                                <span class="sr-only">Edit</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item delete-attribute"  data-id="${attribute.id}" href="javascript:;">Delete</a>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            `);
                            });
                            renderPagination(data.attributes);
                        }
                    });
                }

                fetchAttributes(1, currentPerPage);

                $('#entriesPerPage').change(function () {
                    currentPerPage = $(this).val();
                    fetchAttributes(1, currentPerPage);
                });

                $('#AttributeForm').submit(function (e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    $.ajax({
                        url: "{{ route('backend.attributes.store') }}",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.success) {
                                $('#modal-add-attribute').modal('hide');
                                fetchAttributes(1, currentPerPage);
                                renderPagination(data.attributes);
                                flasher.success(response.message);
                            } else {
                                flasher.error(response.message);
                            }
                        },
                        error: function (response) {
                            if (xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    flasher.error(value[0]);

                                });
                            } else {
                                flasher.error('Something went wrong. Please try again later.');
                            }
                        }
                    });
                });

                function renderPagination(data) {
                    if (data.total === 0) {
                        $('#Pagination').html(`
                                    <div class="dataTables_info" role="status" aria-live="polite">
                                        No entries found.
                                    </div>
                                `);
                        return;
                    }

                    let paginationHtml = '';
                    $.each(data.links, function (index, link) {
                        const pageUrl = new URL(link.url || '', window.location.origin);
                        const pageParam = pageUrl.searchParams.get('page');
                        const label = link.label.includes('&') ? link.label : parseInt(link.label);

                        paginationHtml += `
                                    <li class="paginate_button page-item ${link.active ? 'active' : ''} ${!link.url ? 'disabled' : ''}">
                                        <a class="page-link" href="javascript:void(0);" data-page="${pageParam}">
                                            ${label}
                                        </a>
                                    </li>`;
                    });

                    const pagination = `
                                <div class="dataTables_info" role="status" aria-live="polite">
                                    Showing ${data.from} to ${data.to} of ${data.total} entries
                                </div>
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination" id="paginationLinks">
                                        ${paginationHtml}
                                    </ul>
                                </div>`;

                    $('#Pagination').html(pagination);
                }


                $('#editAttributeForm').submit(function (e) {
                    e.preventDefault();

                    let id = $('#editAttributeId').val();
                    let formData = new FormData(this);
                    const fetchUrl = "{{ route('backend.attributes.update', ['id' => ':id']) }}".replace(':id', id);

                    $.ajax({
                        url: fetchUrl,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.success) {
                                $('#modal-edit-attribute').modal('hide');
                                fetchAttributes(1, currentPerPage);
                                flasher.success(response.message);
                            } else {
                                flasher.error(response.message);
                            }
                        },
                        error: function (response) {
                            console.log(response);

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

                $('#deleteAttributeForm').submit(function (e) {
                    e.preventDefault();

                    let id = $('#attributeIdToDelete').val();
                    const fetchUrl = "{{ route('backend.attributes.destroy', ':id') }}".replace(':id', id);

                    $.ajax({
                        url: fetchUrl,
                        type: 'DELETE',
                        success: function (response) {
                            if (response.success) {
                                flasher.success(response.message);
                                $('#modal-delete-attribute').modal('hide');
                                fetchAttributes(1, currentPerPage);
                            } else {
                                flasher.error(response.message);
                            }
                        },
                        error: function (response) {
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

                // Edit button click
                $(document).on('click', '.edit-attribute', function () {
                    let id = $(this).data('id');
                    const fetchUrl = "{{ route('backend.attributes.edit', ['id' => ':id']) }}".replace(':id', id);
                    $.ajax({
                        url: fetchUrl,
                        type: 'GET',
                        dataType: "json",
                        success: function (response) {

                            var data = response.attribute;

                            $('#editAttributeId').val(data.id);
                            $('#editAttributeName').val(data.name);

                            $('#edittype').val(data.type);
                            $('#editstatus').val(data.status);
                            $('#modal-edit-attribute').modal('show');
                        }
                    });
                });

                // Delete button click
                $(document).on('click', '.delete-attribute', function () {
                    let id = $(this).data('id');
                    $('#attributeIdToDelete').val(id);
                    $('#modal-delete-attribute').modal('show');
                });
            });
        </script>
    @endpush
@endsection