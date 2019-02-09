@extends('layouts.app')

@section('title', 'Product list')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">

            <div class="card-header clearfix text-center">
                <div class="float-left">
                    <a href="{{ route('shop') }}">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
                <strong>PRODUCT LIST:</strong>
            </div>

            <div class="card-body"> 
                
                <div class="text-right mb-2">
                    <a href="{{ route('product.create') }}" class="btn btn-success">Create New Product</a>
                </div>

                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Created By</th>
                        <th>Edited By</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @include('pages.product._list')
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('add-ons.dataTable')
@endsection