@extends('layout')
@section('content')
<div class="register login">
  <div class="register-body">
    <div class="midasi register-check-header">以下の内容でお間違えないですか？</div>
  </div>
  <form action="{{route('register')}}" method="post">
    @csrf
    <div class="register-check-body">
      <div class="register-check-nickname register-check">
        <div class="register-check-space">
          <div class="underline-green register-check-part">ニックネーム</div>
        </div>
        <div class="register-check-point">{{$nickname}}</div>
      </div>
      <div class="register-check-email register-check">
        <div class="register-check-space">
          <div class="underline-green register-check-part">メールアドレス</div>
        </div>
        <div class="register-check-point">{{$email}}</div>
      </div>
    </div>
    <input type="hidden" name="name" value="{{$nickname}}">
    <input type="hidden" name="email" value="{{$email}}">
    <input type="hidden" name="password" value="{{$pass}}">



    <div class="login-btn-space">
      <div class="return">戻る</div>
      <div><input type="submit" class="btn-green" value="OK"></div>
    </div>
  </form>
</div>


@endsection