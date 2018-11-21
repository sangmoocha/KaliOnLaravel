@extends('layouts.app')

@section('content')
<div class="content auth-img">
    <div class="box">
        <div class="top-right links">
            <a href="{{ url('/') }}"><i class="fas fa-times fa-2x"></i></a>
        </div>       
        <div class="header">
            <h4>{{ __('비밀번호 찾기') }}</h4>
        </div>
        <div class="body">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            placeholder="이메일 주소를 입력하세요." 
                            name="email"  
                            value="{{ old('email') }}" 
                            required autofocus>
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">보내기</button>
                    </div>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
               
            </form>
        </div>
        <div class="footer">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
