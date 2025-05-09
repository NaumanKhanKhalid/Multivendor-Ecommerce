@extends('layouts.backend-layout')
@section('title', "Categories")
@section('content')


    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Main Category</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('backend.dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Main Category
                    </p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary modal-add-category-btn" data-bs-toggle="modal"
                        data-bs-target="#modal-add-category">Add New
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
                                                <th>Sub Categories</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="categoryTableBody">

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
    <!-- ADD CATEGORY MODAL -->
    <div class="modal fade" id="modal-add-category" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="categoryForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryLabel">Add New Category</h5>
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
                                                    <input type='file' id="thumbUpload01" name="category_image"
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
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="name"
                                    placeholder="Enter Category Name">
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
    <div class="modal fade" id="modal-edit-category" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="editCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="categoryId" id="categoryId" name="category_id">
                        <div class="row">
                            <div class="d-flex justify-content-center mb-4 ec-vendor-uploads">
                                <div class="ec-vendor-img-upload">
                                    <div class="ec-vendor-main-img">
                                        <div class="thumb-upload-set colo-md-12">
                                            <div class="thumb-upload">
                                                <div class="thumb-edit">
                                                    <input type='file' id="thumbUpload01" name="category_image"
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
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control categoryName" id="categoryName" name="name">
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
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DELETE CATEGORY MODAL -->
    <div class="modal fade" id="modal-delete-category" tabindex="-1" aria-labelledby="deleteCategoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteCategoryForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCategoryLabel">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this category?</p>
                        <input type="hidden" id="categoryIdToDelete" name="category_id">
                        <!-- Hidden field for category ID -->
                        <p class="text-danger">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Category</button>
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
                    <h5 class="modal-title">Category Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalCategoryImage" src="" alt="Category Image" class="img-fluid" />
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

                function fetchCategories(page = 1, perPage = 10) {
                    $.ajax({
                        url: "{{ route('backend.categories.index') }}?page=" + page + "&per_page=" + perPage,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            let html = '';
                            $.each(data.data, function (index, category) {
                                html += addCategoryRow(category);
                            });
                            $('#categoryTableBody').html(html);
                            renderPagination(data);
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
                    if (page) fetchCategories(page, currentPerPage);
                });

                $('#entriesPerPage').on('change', function () {
                    currentPerPage = $(this).val();
                    fetchCategories(1, currentPerPage);
                });

                $('#categoryForm').on('submit', function (e) {
                    e.preventDefault();

                    let formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('backend.categories.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.success) {
                                $('#modal-add-category').modal('hide');
                                $('#categoryForm')[0].reset();
                                const imageSrc = 'assets/img/products/vender-upload-preview.jpg';
                                $('#addimagePreview').attr('src', imageSrc);

                                fetchCategories(1, currentPerPage);

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

                fetchCategories(1, currentPerPage);

                function addCategoryRow(category) {
                    let subcategoriesHtml = '';
                    if (category.subcategories && category.subcategories.length > 0) {
                        category.subcategories.forEach(function (sub) {
                            subcategoriesHtml += `<span class="ec-sub-cat-tag me-1">${sub.name}</span>`;
                        });
                    }

                    return `
                                                    <tr>
                                                         <td>
                <a href="javascript:void(0);" class="view-image" data-image="/${category.category_image}">
                    <img src="/${category.category_image}" alt="Category Image" width="50" />
                </a>
            </td>
                                                        <td>${category.name}</td>
                                                        <td> <span class="ec-sub-cat-count" title="Total Sub Categories">${category.subcategories?.length ?? 0}</span> ${subcategoriesHtml}</td>

                                                        <td><span class="badge bg-${category.status === 'Active' ? 'success' : 'danger'}">${category.status}</span></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-outline-primary edit-category-btn" data-id="${category.id}">
                                                                    Edit
                                                                </button>
                                                                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                                                    <span class="sr-only">Edit</span>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item delete-category-btn"  data-id="${category.id}" href="javascript:;">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>`;
                }

                $(document).on('click', '.edit-category-btn', function () {

                    const categoryId = $(this).data('id');
                    const fetchUrl = "{{ route('backend.categories.edit', ['id' => ':id']) }}".replace(':id', categoryId);



                    $.ajax({
                        url: fetchUrl,
                        type: 'GET',
                        success: function (category) {
                            $('.categoryId').val(category.id);
                            $('.categoryName').val(category.name);
                            $('.slug').val(category.slug);
                            $('.status').val(category.status);

                            console.log('Category Cover Image:', category.category_image);

                            const imageSrc = "/" + category.category_image || 'assets/img/products/vender-upload-preview.jpg';
                            $('#imagePreview').attr('src', imageSrc);



                            $('#modal-edit-category').modal('show');
                        },
                        error: function () {
                            flasher.error('Failed to load category data.');
                        }
                    });
                });

                $('#editCategoryForm').on('submit', function (e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('backend.categories.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            console.log(response);
                            if (response.success) {

                                fetchCategories(1, currentPerPage);
                                $('#modal-edit-category').modal('hide');
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

                $(document).on('click', '.delete-category-btn', function () {
                    const categoryId = $(this).data('id');

                    $('#categoryIdToDelete').val(categoryId);
                    $('#modal-delete-category').modal('show');
                });

                $('#deleteCategoryForm').on('submit', function (e) {
                    e.preventDefault();

                    const categoryId = $('#categoryIdToDelete').val();
                    const fetchUrl = "{{ route('backend.categories.destroy', ':id') }}".replace(':id', categoryId);

                    $.ajax({
                        url: fetchUrl,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                $('#modal-delete-category').modal('hide');
                                flasher.success(response.message);
                                fetchCategories(1, currentPerPage);
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
                    $('#modalCategoryImage').attr('src', imageUrl);
                    $('#viewImageModal').modal('show');
                });

            });

        </script>
    @endpush

@endsection