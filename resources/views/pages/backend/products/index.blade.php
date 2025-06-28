@extends('layouts.backend-layout')
@section('title', "Products")
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Product</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('backend.dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Product
                    </p>
                </div>
                <div>
                    <a href="{{ route('backend.products.create') }}" class="btn btn-primary"> Add Porduct</a>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="ec-cat-list card card-default">
                        <div class="card-body"'>
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
                                            <label>Search:<input type="search" id="searchInput" class="form-control form-control-sm"
                                                    placeholder="" aria-controls="responsive-data-table"></label>
                                        </div>
                                    </div>
                                    <div id="product-list-container">
                                        @include('pages.backend.products.product_list')
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            
            function loadProducts(url) {
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        per_page: $('#entriesPerPage').val()
                    },
                    success: function (data) {
                        $('#product-list-container').html(data);
                    },
                    error: function () {
                        alert('Failed to load data.');
                    }
                });
            }

            $('#entriesPerPage').on('change', function () {
                let url = "{{ route('backend.products.index') }}";
                loadProducts(url);
            });

            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();
                let url = $(this).attr('href');
                loadProducts(url);
            });
        });
    </script>


@endsection