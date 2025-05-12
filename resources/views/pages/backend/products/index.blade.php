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

        </div> <!-- End Content -->
    </div>
@endsection