@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="is-three-quarters">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-content">
                    @if (session('status'))
                    <div class="notification is-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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
                            <div class="controle">
                                <button type="submit" class="button is-link">
                                    {{ __('Send Password Reset Link') }}
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