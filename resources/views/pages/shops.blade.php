@extends('layouts.app')

@section('title', 'Shops')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header text-center">
                <strong>Hello User, please select the shop you will be working with</strong>
            </div>

            <div class="card-body"> 
                <form action="{{ route('shop.pick') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="shop" class="col-sm-4 col-form-label text-md-right">Shop list:</label>

                        <div class="col-md-6">
                            <select name="shop" id="shop" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                @if ($shops->count())
                                    <option selected disabled>Chose shop...</option>
                                    @foreach ($shops as $shop)
                                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                    @endforeach
                                @else
                                    <option selected disabled>0 Shop in system. Please, contact Admin</option>
                                @endif
                            </select>
                            
                            @include('errors')
                            
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