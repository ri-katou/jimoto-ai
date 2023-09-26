@extends('layout')
@section('content')
  <div>以下の内容でお間違いないですか</div>

  <div class="profile-edit-content">
    <form action="{{route('profile.edit')}}">
      @csrf
      <div class="profile-edit-nickname">
          <div class="profile-edit-nickname-title underline-green">現在のニックネーム</div>
          <div class="profile-edit-now-nickname container">
              <div class="profile-edit-nickname-output">群馬　太郎</div>
              <div>[
                  <a href="#" class="link">
                      編集する
                  </a>]
              </div>
          </div>
          <input type="text" class="profile-edit-nickname-input form" name="nickname">
      </div>
      <div class="profile-email">
          <div class="profile-email-title underline-green">メールアドレス</div>
          <div class="profile-edit-now-email container">
              <div class="profile-email-output">
                  email@mail.com
              </div>
              <div>[<a href="#" class="link">
                      編集する
                  </a>]</div>
          </div>
          <input type="text" class="profile-edit-email-input form" name="email">
      </div>
      <div class="profile-usereria">
          <div class="profile-useereria-title underline-green">あなたのエリア</div>
          <div class="profile-edit-now-eria container">
              <div class="profile-eria-output">
                  渋川市
              </div>
              <input type="radio" name="eria">
          </div>
      </div>
  </form>
  </div>
@endsection