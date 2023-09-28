@extends('layout')
@section('content')

  <div class="profile-edit-content">
    <div>以下の内容でお間違いないですか</div>
    <form action="{{route('profile.edit')}}" method="POST">
      @csrf
      <div class="profile-edit-nickname">
          <div class="profile-edit-nickname-title underline-green">ニックネーム</div>
          <div class="profile-edit-check-nickname container">
              <div class="profile-edit-nickname-output">{{$input->nickname}}</div>
          </div>
          <input type="hidden" value="{{$input->nickname}}" name="nickname">
      </div>
      <div class="profile-email">
          <div class="profile-email-title underline-green">メールアドレス</div>
          <div class="profile-edit-now-email container">
              <div class="profile-email-output">
                  {{$input->email}}
              </div>
              <input type="hidden" value="{{$input->email}}" name="email">
          </div>
      </div>
      <div class="profile-usereria">
          <div class="profile-useereria-title underline-green">あなたのエリア</div>
          <div class="profile-edit-now-eria container">
              <div class="profile-eria-output">
                  {{$input->eria}}
              </div>
              <input type="hidden" value="{{$input->eria}}" name="eria">
          </div>
      </div>
      <div class="profile-botom-container">
        <input type="submit" class="btn-green" value="変更する">
        <div class="return">戻る</div>
    </div>
  </form>
  </div>
@endsection