@extends('layout')
  @section('content')
      <div class="profile-myimage"><img src="" alt="myimage"></div>
      <div class="profile-edit-link">[<a href="#">編集</a>]</div>
      <div class="profile-nickname">DBから拾う</div>
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
      <div class="button-green">
        <button>プロフィールを編集する</button>
      </div>
      <div class="profile">
  @endsection