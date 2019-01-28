@extends('layouts.app')

@section('title', 'Product list')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">

            <div class="card-header text-center">
                    <strong>PRODUCT LIST:</strong>
            </div>

            <div class="card-body clearfix"> 
                
                <div class="float-right">
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