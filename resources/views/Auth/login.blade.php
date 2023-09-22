@extends('layout')
@section('content')
<div class="login">
  <div class="login_body">
    <div class="midasi">ログイン</div>
    <div class="login_form">
      <div>
        <label>メールアドレスを入力してください</label>
        <input type="email" class="login_email">
      </div>
      <div>
        <div>パスワードを入力してください</div>
        <input type="password" class="login_pass">
      </div>
    </div>
    <div class="login_botan">
      <div class="return">戻る</div>
      <div>OK</div>
    </div>
  </div>
  <div class="login_link">
    <div class="link"><a href="">パスワードを忘れた場合はこちら</a></div>
    <div class="link"><a href="">新規登録はこちら</a></div>
  </div>
</div>


@endsection