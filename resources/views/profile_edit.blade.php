@extends('layout')
@section('content')
    <div class="profile">
        <div class="profile-container">
            <div class="profile-image">
                <div class="profile-myimage profile-icon"><img src="" alt="myimage"></div>
                <div class="profile-edit-link">[<a href="#" class="link">編集</a>]</div>
            </div>
            <div class="profile-nickname">DBから拾う</div>
        </div>
        <div class="profile-edit-content">
          <form action="{{route('profile.edit')}}"></form>
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

        </div>
        <div class="profile-botom-container">
            <a href="#" class="btn-green">
                編集する
            </a>
            <div class="link profile-user-delete">退会する</div>
        </div>
    @endsection
