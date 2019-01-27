@extends('layouts.app')

@section('title', 'Shops list')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header text-center">
                <strong>Hello User, please select the shop you will be working with</strong>
            </div>

            <div class="card-body"> 
                <form action="">

                    <div class="form-group row">
                        <label for="shop" class="col-sm-4 col-form-label text-md-right">Shop list:</label>

                        <div class="col-md-6">
                            <select name="shop" id="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                                <option selected disabled>Chose shop...</option>
                                <option value="">Shop 1</option>
                            </select>

                            @if ($errors->has('shop'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('shop') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Pick!
                            </button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>

        </div>
    </div>
</div>
@endsection