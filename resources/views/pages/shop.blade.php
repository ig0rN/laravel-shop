@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header text-center">
                <strong>SHOP PARTS:</strong>
            </div>

            <div class="card-body"> 
                <div class="form-group row text-center">
                    <div class="col-md-6 offset-3">
                        <a href="{{ route('category') }}">Category</a><br>
                        <a>Product</a><br> {{-- route('') product --}}
                        <a>Sale</a><br> {{--  route('')sale --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection