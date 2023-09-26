@extends('layout')
@section('content')
<div class="register login">
  <div class="register-body">
    <div class="midasi register-check-header">以下の内容でお間違えないですか</div>
  </div>

  <div class="register-check-body">
    <div class="register-check-nickname register-check">
      <div class="register-check-space">
        <div class="underline-green register-check-part">ニックネーム</div>
      </div>
      <div class="register-check-point">前のページの入力内容</div>
    </div>
    <div class="register-check-email register-check">
      <div class="register-check-space">
        <div class="underline-green register-check-part">メールアドレス</div>
      </div>
      <div class="register-check-point">前のページの入力内容</div>
    </div>
    <div class="register-check-password register-check">
      <div class="register-check-space">
        <div class="underline-green register-check-part">パスワード</div>
      </div>
      <div class="register-check-point">前のページの入力内容</div>
    </div>
  </div>

  <div class="login-btn-space">
    <div class="return">戻る</div>
    <div><a href="" class="btn-green">OK</a></div>
  </div>
</div>


@endsection