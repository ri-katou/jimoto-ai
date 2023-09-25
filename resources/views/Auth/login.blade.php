@extends('layout')
@section('content')
<div class="login">
  <div class="login_body">
    <div class="midasi login-header">ログイン</div>
    <div class="login-form">
      <div class="form-inner">
        <div class="login-form-top">メールアドレスを入力してください</div>
        <input type=" email" class="form">
      </div>
      <div class="form-inner">
        <div class="login-form-top">パスワードを入力してください</div>
        <input type="password" class="form">
      </div>
    </div>
    <div class="login-botan">
      <div class="return">戻る</div>
      <div><a href="" class="btn-green">OK</a></div>
    </div>
  </div>
  <div class="login-link">
    <div class="link"><a href="">パスワードを忘れた場合はこちら</a></div>
    <div class="link"><a href="">新規登録はこちら</a></div>
  </div>
</div>


@endsection