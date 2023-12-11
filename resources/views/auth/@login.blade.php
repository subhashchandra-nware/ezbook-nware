@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-header">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{-- @dd($message) --}}
                        {{-- {{ gettype($message) }} --}}
                        @if ($message == 0)
                        <ul>
                            @foreach ($message->all() as $msg)
                                <li><strong>{{ $msg }}</strong></li>
                            @endforeach
                        </ul>
                        @else
                        <strong>{{ $message }}</strong>
                        @endif
                    </div>
                    @elseif ($message = Session::get('fail'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @if (is_object($message))
                        <ul>
                            @foreach ($message->all() as $msg)
                                <li><strong>{{ $msg }}</strong></li>
                            @endforeach
                        </ul>
                        @else
                        <strong>{{ $message }}</strong>
                        @endif
                    </div>
                    @elseif ($message = Session::get('failed'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @if (is_object($message))
                        <ul>
                            @foreach ($message->all() as $msg)
                                <li><strong>{{ $msg }}</strong></li>
                            @endforeach
                        </ul>
                        @else
                        <strong>{{ $message }}</strong>
                        @endif
                    </div>
                    @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @if (is_object($message))
                        <ul>
                            @foreach ($message->all() as $msg)
                                <li><strong>{{ $msg }}</strong></li>
                            @endforeach
                        </ul>
                        @else
                        <strong>{{ $message }}</strong>
                        @endif
                    </div>
                    {{-- @dd($errors) --}}
                    @elseif ($message = Session::get('alert'))
                    <div class="alert alert-primary alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @if (is_object($message))
                        <ul>
                            @foreach ($message->all() as $msg)
                                <li><strong>{{ $msg }}</strong></li>
                            @endforeach
                        </ul>
                        @else
                        <strong>{{ $message }}</strong>
                        @endif

                    </div>
                    @elseif ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @if (is_object($message))
                        <ul>
                            @foreach ($message->all() as $msg)
                                <li><strong>{{ $msg }}</strong></li>
                            @endforeach
                        </ul>
                        @else
                        <strong>{{ $message }}</strong>
                        @endif
                    </div>
                @endif

            </div>

                <div class="card-body">















                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
@endsection
