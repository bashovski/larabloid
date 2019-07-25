@extends('layouts.app')

@section('content')

<!-- overriding background -->

<body
        style="background-image: linear-gradient( to top, rgba( 49,237,50, 0.5 ), rgba( 240, 77, 109, 1)),
      url(http://d35w1c74a0khau.cloudfront.net/wp-content/uploads/2019/04/exterior_2.jpg);
      background-repeat: no-repeat;
      -webkit-background-size: cover;background-size: cover;
      background-size: 100% 200%;">

</body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User settings</div>
                <div class="card-body">
                    <form method="post" action="/profile/{{ $user->id }}">
                    @csrf
                    @method('patch')

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email"
                                placeholder= "{{ auth()->user()->email }}" >

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
                                name="biography" value="{{ old('biography') ?? auth()->user()->profile->biography }}" autocomplete="biography" >

                                @if ($errors->has('biography'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('biography') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                                       name="location" value="{{ old('location') ?? auth()->user()->profile->location }}">

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm new password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>

                            <input type="file" class="col-md-4 form-control-file text-md-right" id="avatar" name="avatar">

                            @if ($errors->has('avatar'))
                                <strong>{{ $errors->first('avatar') }}</strong>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="__g__b__button">
                                    Update your user settings
                                </button>
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
