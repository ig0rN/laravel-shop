@extends('layouts.app')

@section('title', 'Shop Parts')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header text-center">
                <strong>SHOP PARTS:</strong>
            </div>

            <div class="card-body"> 
                <div class="form-group row text-center">
                    <div class="col-md-6 offset-3">
                        <a href="{{ route('category') }}">Category</a><br>
                        <a href="{{ route('product') }}">Product</a><br> 
                        <a>Sale</a><br> {{--  route('')sale --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection