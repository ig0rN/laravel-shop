@extends('layouts.app')

@section('title', 'Create Sale')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header">
                Create Sale
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('sale.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="discount" class="form-label">Discount in %</label>
                            <input id="discount" type="integer" min=0 class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" value="{{ old('discount') }}">

                            @if ($errors->has('discount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('discount') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="end_date_srb" class="form-label">End Date</label>
                            <input id="end_date_srb" type="text" class="form-control date{{ $errors->has('end_date_srb') ? ' is-invalid' : '' }}" name="end_date_srb" value="{{ old('end_date_srb') }}">

                            @if ($errors->has('end_date_srb'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('end_date_srb') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-3">
                            <label for="product_id" class="form-label">Products</label>
                            <select name="product_id[]" id="product_id" class="form-control{{ $errors->has('product_id') ? ' is-invalid' : '' }}" multiple>
                                <option selected disabled>Pick products...</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-muted">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>

                            @if ($errors->has('product_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('product_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @include('errors')
                    
                    <div class="form-group row">
                        <div class="col-md-6 offset-3 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
@endsection

@section('scripts')
    @include('add-ons.datepicker')
@endsection