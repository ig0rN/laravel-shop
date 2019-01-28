@extends('layouts.app')

@section('title', 'Update Category')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header clearfix text-center">
                <div class="float-left">
                    <a href="{{ route('category') }}">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
                Edit Category
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('category.update', ['category' => $category->id]) }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 offset-3">
                            <label for="name" class="form-label">Category name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category->name }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-6 offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
@endsection
