@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <form method="POST" action="{{ route('password.email') }}"> --}}
                    <form method="POST" action="#">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{-- <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button> --}}
                                <input type="button" class="btn btn-primary" value="パスワード再設定ＵＲＬを送信" 
                                    onclick="disabled=true;
                                            document.getElementById('reset-message').innerHTML='<div class=\'alert alert-success\'>メール機能は未実装のため、パスワードの再設定はご利用いただけません。</div>';">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="margin-top:16px" id="reset-message"></div>
        </div>
    </div>
</div>
@endsection
