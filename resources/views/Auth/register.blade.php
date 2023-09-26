@extends('layout')
@section('content')
<div class="register login">
  <div class="register-body">
    <div class="midasi login-header">ユーザー登録画面</div>
    <div class="register-form">
      <div class="register-inner login-form-top">
        <div class="login-form_top">メールアドレスを入力してください</div>
        <input type="email" class="form">
      </div>
      <div class="register-inner login-form-top">
        <div class="login-form-top">メールアドレスを入力してください</div>
        <input type="email" class="form">
      </div>
      <div class="register-inner login-form-top">
        <div class="login-form-top">パスワードを入力してください</div>
        <input type="password" class="form">
      </div>
      <div class="register-inner login-form-top">
        <div class="login-form-top">パスワードをもう一度入力してください</div>
        <input type="password" class="form">
      </div>
    </div>
  </div>
  <div class="login-btn-space">
    <div class="return">戻る</div>
    <div><a href="" class="btn-green">OK</a></div>
  </div>
</div>


@endsection