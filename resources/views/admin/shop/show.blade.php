@extends('layouts.app')

@section('title', 'Shop list')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header text-center">
                    <strong>SHOP LIST:</strong>
            </div>

            <div class="card-body clearfix"> 
                
                <div class="float-right">
                    <a href="{{ route('admin.shop.create') }}" class="btn btn-success">Create New Shop</a>
                </div>

                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Created By</th>
                        <th>Edited By</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @include('admin.shop._list')
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('admin.add-ons.dataTable')
@endsection