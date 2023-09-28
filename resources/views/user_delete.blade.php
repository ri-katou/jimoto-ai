@extends('layout')
@section('content')

<div class="profile">
  <div class="profile-container">
      <div class="profile-image">
          <div class="profile-myimage profile-icon"><img src="" alt="myimage"></div>
      </div>
      <div class="profile-nickname">DBから拾う</div>
  </div>
  <div class="profile-email">
      <div class="profile-email-title underline-green">メールアドレス</div>
      <div class="profile-email-output">
          email@mail.com
      </div>
  </div>
  <div class="profile-usereria">
      <div class="profile-useereria-title underline-green">あなたのエリア</div>
      <div class="profile-eria-output">
          渋川市
      </div>
  </div>
  <div class="profile-botom-container">
    <form action=""></form>
    <input type="submit" class="btn-green" value="退会する">
    <div class="return">戻る</div>
</div>
</div>

@endsection