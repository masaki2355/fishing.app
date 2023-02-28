@extends('layouts.app')

@section('content')
<body class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
<style>
    .login{
        background-image: url(data:image/jpeg;base64,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); 
        background-size: cover;
    }
</style>