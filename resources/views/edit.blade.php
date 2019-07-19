@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User settings</div>
                <div class="card-body">
                    <form method="POST" action="">
                    @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="{{ auth()->user()->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="biography" class="col-md-4 col-form-label text-md-right">Bio</label>

                            <div class="col-md-6">
                                <input id="biography" type="biography" class="form-control{{ $errors->has('biography') ? ' is-invalid' : '' }}"
                                name=biography" value="{{ old('biography') }}" autocomplete="biography">

                                @if ($errors->has('biography'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('biography') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                    </form>

                    <signature-element class="col-md-6 offset-md-5 pl-2 pt-4"></signature-element> <!-- vue component -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
