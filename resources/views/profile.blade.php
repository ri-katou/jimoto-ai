@extends('layout')
@section('content')
    <div class="profile">
        <div class="profile-container">
            <div class="profile-image">
                <div class=" profile-icon"><img src="" alt="myimage"></div>
                <div class="profile-edit-link">[<a href="#" class="link">画像の編集</a>]</div>
            </div>
            <div class="profile-nickname">{{$user->name}}</div>
        </div>
        <div class="profile-center-content">
            <div class="profile-email">
                <div class="profile-email-title underline-green">メールアドレス</div>
                <div class="profile-email-output">
                    {{$user->email}}
                </div>
            </div>
            <div class="profile-usereria">
                <div class="profile-useereria-title underline-green">あなたのエリア</div>
                <div class="profile-eria-output">
                      {{$municipalitie}}
                </div>
            </div>
        </div>
        <div class="profile-botom-btn">
            <a href="{{route('profile.edit')}}" class="btn-green">
                プロフィールを編集する
            </a>
            <div class="link"><a href="{{ route('user.delete') }}">退会する</a></div>
        </div>
    </div>
@endsection
