@extends('layouts.backend-layout')
@section('title', "Sub Categories")
@section('content')


    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Sub Category</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('backend.dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Sub Category
                    </p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary modal-add-category-btn" data-bs-toggle="modal"
                        data-bs-target="#modal-add-sub-category">Add New
                    </button>
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
                                                <th>Thumb</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="subcategoryTableBody">

                                        </tbody>
                                    </table>
                                    <div class="row justify-content-between bottom-information" id="Pagination">

                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD SUB CATEGORY MODAL -->
    <div class="modal fade" id="modal-add-sub-category" tabindex="-1" aria-labelledby="addSubCategoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="SubCategoryForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addSubCategoryLabel">Add New Sub Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">


                        <div class="row">
                            <div class="d-flex justify-content-center mb-4 ec-vendor-uploads">
                                <div class="ec-vendor-img-upload">
                                    <div class="ec-vendor-main-img">
                                        <div class="thumb-upload-set colo-md-12">
                                            <div class="thumb-upload">
                                                <div class="thumb-edit">
                                                    <input type='file' id="thumbUpload01" name="subcategory_image"
                                                        class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img src="assets/img/icons/edit.svg"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="thumb-preview ec-preview">
                                                    <div class="image-thumb-preview">
                                                        <img id="addimagePreview"
                                                            class="image-thumb-preview ec-image-preview"
                                                            src="{{ asset('backend/assets/img/products/vender-upload-preview.jpg') }}"
                                                            alt="edit" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="category_id" class="form-label">Select Main Categroy</label>


                                <select name="category_id" id="category_id" class="form-control">

                                </select>

                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="subCategoryName" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control" id="subCategoryName" name="name"
                                    placeholder="Enter SubCategory Name">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    placeholder="Auto-generate if empty">
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
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT CATEGORY MODAL -->
    <div class="modal fade" id="modal-edit-sub-category" tabindex="-1" aria-labelledby="editSubCategoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="editSubCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSubCategoryLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="subCategoryId" id="subCategoryId" name="sub_category_id">
                        <div class="row">
                            <div class="d-flex justify-content-center mb-4 ec-vendor-uploads">
                                <div class="ec-vendor-img-upload">
                                    <div class="ec-vendor-main-img">
                                        <div class="thumb-upload-set colo-md-12">
                                            <div class="thumb-upload">
                                                <div class="thumb-edit">
                                                    <input type='file' id="thumbUpload01" name="subcategory_image"
                                                        class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img src="assets/img/icons/edit.svg"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="thumb-preview ec-preview">
                                                    <div class="image-thumb-preview">
                                                        <img id="imagePreview" class="image-thumb-preview ec-image-preview"
                                                            src="" alt="edit" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 mb-4">
                                <label for="edit_category_id" class="form-label">Select Main Category</label>
                                <select name="category_id" id="edit_category_id" class="form-control">
                                    <!-- Categories will be populated here -->
                                </select>
                            </div>
                            

                            <div class="col-md-6 mb-4">
                                <label for="subCategoryName" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control subCategoryName" id="subCategoryName" name="name">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="status" class="form-label">Select Status</label>
                                <select name="status" id="status" class="form-control status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DELETE CATEGORY MODAL -->
    <div class="modal fade" id="modal-delete-sub-category" tabindex="-1" aria-labelledby="deleteSubCategoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteSubCategoryForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteSubCategoryLabel">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this category?</p>
                        <input type="hidden" id="subCategoryIdToDelete" name="category_id">
                        <p class="text-danger">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- VIEW IMAGE MODAL -->
    <div class="modal fade" id="viewImageModal" tabindex="-1" aria-labelledby="viewImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sub Category Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalSubCategoryImage" src="" alt="Category Image" class="img-fluid" />
                </div>
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

                function fetchSubCategories(page = 1, perPage = 10) {
                    $.ajax({
                        url: "{{ route('sub.categories.index') }}?page=" + page + "&per_page=" + perPage,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {

                            let categoryOptions = '';
                            $.each(data.categories, function (index, category) {
                                categoryOptions += `<option value="${category.id}">${category.name}</option>`;
                            });
                            $('#category_id').html(categoryOptions); // Populate dropdown

                            let html = '';
                            $.each(data.subCategories.data, function (index, sub_category) {
                                html += addSubCategoryRow(sub_category);
                            });
                            $('#subcategoryTableBody').html(html);
                            renderPagination(data.subCategories);
                        }
                    });
                }

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

                $(document).on('click', '.page-link', function () {
                    const page = $(this).data('page');
                    if (page) fetchSubCategories(page, currentPerPage);
                });

                $('#entriesPerPage').on('change', function () {
                    currentPerPage = $(this).val();
                    fetchSubCategories(1, currentPerPage);
                });

                $('#SubCategoryForm').on('submit', function (e) {
                    e.preventDefault();

                    let formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('sub.categories.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.success) {
                                $('#modal-add-sub-category').modal('hide');
                                $('#SubCategoryForm')[0].reset();
                                const imageSrc = 'assets/img/products/vender-upload-preview.jpg';
                                $('#addimagePreview').attr('src', imageSrc);

                                fetchSubCategories(1, currentPerPage);

                                flasher.success(response.message);
                            } else {
                                flasher.error(response.message);
                            }
                        },
                        error: function (xhr) {
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

                fetchSubCategories(1, currentPerPage);

                function addSubCategoryRow(subcategory) {

                    return `
                                                                    <tr>
                                                                         <td>
                                <a href="javascript:void(0);" class="view-image" data-image="/${subcategory.subcategory_image}">
                                    <img src="/${subcategory.subcategory_image}" alt="Category Image" width="50" />
                                </a>
                            </td>
                                                                        <td>${subcategory.name}</td>
                                                                        <td> ${subcategory.category.name}</td>

                                                                        <td><span class="badge bg-${subcategory.status === 'Active' ? 'success' : 'danger'}">${subcategory.status}</span></td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <button type="button" class="btn btn-outline-primary edit-sub-category-btn" data-id="${subcategory.id}">
                                                                                    Edit
                                                                                </button>
                                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                                                                    <span class="sr-only">Edit</span>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item delete-sub-category-btn"  data-id="${subcategory.id}" href="javascript:;">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>`;
                }

                $(document).on('click', '.edit-sub-category-btn', function () {
                    const subCategoryId = $(this).data('id');
                    const fetchUrl = "{{ route('sub.categories.edit', ['id' => ':id']) }}".replace(':id', subCategoryId);

                    // Make the AJAX request to fetch subcategory data and categories
                    $.ajax({
                        url: fetchUrl,
                        type: 'GET',
                        success: function (response) {
                            const subcategory = response.sub_category;
                            const categories = response.categories;

                            // Populate the form fields with the retrieved subcategory data
                            $('.subCategoryId').val(subcategory.id);
                            $('.subCategoryName').val(subcategory.name);
                            $('.slug').val(subcategory.slug);
                            $('.status').val(subcategory.status);

                            // Set the image preview
                            const imageSrc = subcategory.subcategory_image ? '/' + subcategory.subcategory_image : 'assets/img/products/vender-upload-preview.jpg';
                            $('#imagePreview').attr('src', imageSrc);

                            // Populate the category dropdown and set the current category as selected
                            let categoryOptions = '';
                            $.each(categories, function (index, category) {
                                const selected = category.id === subcategory.category_id ? 'selected' : ''; // Preselect current category
                                categoryOptions += `<option value="${category.id}" ${selected}>${category.name}</option>`;
                            });
                            $('#edit_category_id').html(categoryOptions); // Populate category dropdown

                            // Show the modal
                            $('#modal-edit-sub-category').modal('show');
                        },
                        error: function () {
                            flasher.error('Failed to load category data.');
                        }
                    });
                });

                $('#editSubCategoryForm').on('submit', function (e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('sub.categories.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.success) {

                                fetchSubCategories(1, currentPerPage);
                                $('#modal-edit-sub-category').modal('hide');
                                flasher.success(response.message);
                            } else {
                                flasher.error(response.message);
                            }
                        },
                        error: function (xhr) {
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

                $(document).on('click', '.delete-sub-category-btn', function () {
                    const subCategoryId = $(this).data('id');

                    $('#subCategoryIdToDelete').val(subCategoryId);
                    $('#modal-delete-sub-category').modal('show');
                });

                $('#deleteCategoryForm').on('submit', function (e) {
                    e.preventDefault();

                    const subCategoryId = $('#subCategoryIdToDelete').val();
                    const fetchUrl = "{{ route('sub.categories.destroy', ':id') }}".replace(':id', subCategoryId);

                    $.ajax({
                        url: fetchUrl,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                $('#modal-delete-sub-category').modal('hide');
                                flasher.success(response.message);
                                fetchSubCategories(1, currentPerPage);
                            } else {
                                flasher.error(response.message || 'Failed to delete category.');
                            }
                        },
                        error: function (xhr) {
                            if (xhr.responseJSON?.errors) {
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    flasher.error(value[0]);
                                });
                            } else {
                                flasher.error('An unexpected error occurred.');
                            }
                        }
                    });
                });

                $(document).on('click', '.view-image', function () {
                    const imageUrl = $(this).data('image');
                    $('#modalSubCategoryImage').attr('src', imageUrl);
                    $('#viewImageModal').modal('show');
                });

            });

        </script>
    @endpush

@endsection