@extends('layout')
@section('content')
<div class="register login">
  <div class="register_body">
    <div class="midasi">ユーザー登録画面</div>
    <div class="register-form">
      <div>
        <div>メールアドレスを入力してください</div>
        <input type="email" class="form">
      </div>
      <div>
        <div>メールアドレスを入力してください</div>
        <input type="email" class="form">
      </div>
      <div>
        <div>パスワードを入力してください</div>
        <input type="password" class="form">
      </div>
      <div>
        <div>パスワードをもう一度入力してください</div>
        <input type="password" class="form">
      </div>
    </div>
  </div>
  <div class="login-link">
    <div class="link"><a href="">登録済の方はこちら!</a></div>
    <div>OK</div>
  </div>
</div>


@endsection