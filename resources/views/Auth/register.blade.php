@extends('layout')
@section('content')
<div class="register login">
  <form action="{{route('register.check')}}" method="post">
    @csrf
    <div class="register-body">
      <div class="midasi login-header">ユーザー登録画面</div>
      <div class="register-form">
        <div class="register-inner login-form-top">
          <div class="login-form_top">ニックネームを入力してください</div>
          <input type="nickname" class="form" name="name" value="{{ old('name') }}">
        </div>
        <div class="register-inner login-form-top">
          <div class="login-form-top">メールアドレスを入力してください</div>
          <input type="email" class="form" name="email" value="{{ old('email') }}">
        </div>
        <div class="register-inner login-form-top">
          <div class="login-form-top">パスワードを入力してください</div>
          <input type="password" class="form" name="password">
        </div>
        <div class="register-inner login-form-top">
          <div class="login-form-top">パスワードをもう一度入力してください</div>
          <input type="password" class="form" name="password_confirmation">
        </div>
      </div>
    </div>
    <div class="login-btn-space">
      <div class="return">戻る</div>
      <div><input type="submit" class="btn-green" value="OK"></div>
    </div>
  </form>
</div>


@endsection