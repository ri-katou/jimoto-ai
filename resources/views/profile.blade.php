@extends('layout')
@section('content')
    <div class="profile">
        <div class="profile-container">
            <div class="profile-image">
                <div class=" profile-icon">
                        <img src="{{ $user_detail[0]->icon_image ?: 'https://jimotoai2023.s3.ap-northeast-1.amazonaws.com/jimotoaiprofile/cgj35n6IhyLz3mbaMJ3kt0EfsRtP1yuIJhDDJ9XP.jpg'}}" alt="myimage" class="profile-icon-img">
                </div>
                <div class="profile-img-edit link">
                    <form action="{{route('edit.image')}}" method="POST" enctype="multipart/form-data" id="profile-img-edit-form">
                        @csrf
                    <label>
                        <span class="file-btn">
                            [画像の編集]
                            <input type="file" name="image" class="profile-img-edit-input" style="display:none" accept="image/*">
                            <input type="hidden" name="old_image" accept="image/*" value="{{ $user_detail[0]->icon_image}}">
                        </span>
                    </label>
                </form>
                </div>
            </div>
            <div class="profile-nickname">{{ $user->name }}</div>
        </div>
        <div class="profile-center-content">
            <div class="profile-email">
                <div class="profile-email-title underline-green">メールアドレス</div>
                <div class="profile-email-output">
                    {{ $user->email }}
                </div>
            </div>
            <div class="profile-usereria">
                <div class="profile-useereria-title underline-green">あなたのエリア</div>
                <div class="profile-eria-output">
                    {{ $user_detail[0]['municipalities_name'] }}
                </div>
            </div>
        </div>
        <div class="profile-botom-btn">
            <a href="{{ route('profile.edit') }}" class="btn-green">
                プロフィールを編集する
            </a>
            <div class="link"><a href="{{ route('user.delete') }}">退会する</a></div>
        </div>
    </div>
@endsection
