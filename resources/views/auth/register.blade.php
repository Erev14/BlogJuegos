@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="is-three-quarters">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="field">
                            <label for="name" class="label">{{ __('Name') }}</label>

                            <div class="is-half control">
                                <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help is-danger" role="alert">
                                    <strong class="help is-danger">{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                            <div class="is-half control">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help is-danger" role="alert">
                                    <strong class="help is-danger">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="password" class="label">{{ __('Password') }}</label>

                            <div class="is-half control">
                                <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help is-danger" role="alert">
                                    <strong class="help is-danger">{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                            <div class="is-half control">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="field">
                            <div class="is-half control">
                                <button type="submit" class="button is-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection