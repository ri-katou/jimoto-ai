@extends('layout')
@section('content')
    <div class="profile">
        <form action="{{ route('profile.edit') }}" method="POST">
            @csrf
            <div class="profile-container">
                <div class="profile-image">
                    <div class=" profile-icon">
                        <img src="{{ isset(\App\User_detail::select('icon_image')->where('user_id',Auth::id())->first()->icon_image )? \App\User_detail::select('icon_image')->where('user_id',Auth::id())->first()->icon_image : 'https://jimotoai2023.s3.ap-northeast-1.amazonaws.com/jimotoaiprofile/cgj35n6IhyLz3mbaMJ3kt0EfsRtP1yuIJhDDJ9XP.jpg'}}" alt="myimage" class="profile-icon-img">
                    </div>
                    <div class="profile-img-edit link">
                        <form action="{{route('edit.image')}}" method="POST" enctype="multipart/form-data" id="profile-img-edit-form">
                            @csrf
                        <label>
                            <span class="file-btn">
                                [画像の編集]
                                <input type="file" name="image" class="profile-img-edit-input" style="display:none" accept="image/*">
                                <input type="hidden" name="old_image" accept="image/*" value="{{ \App\User_detail::select('icon_image')->where('user_id',Auth::id())->first()->icon_image }}">
                            </span>
                        </label>
                    </form>
                    </div>
                </div>
                <div class="profile-nickname">{{ $user->name }}</div>
            </div>
            <div class="profile-edit-center-content">
                @csrf
                <div class="profile-edit-nickname">
                    <div class="profile-edit-nickname-title underline-green">現在のニックネーム</div>
                    <div class="profile-edit-now-nickname container">
                        <div class="profile-edit-nickname-output">{{ $user->name }}</div>
                        <div>
                            <strong class="link edit-btn">
                                [編集する]
                            </strong>
                        </div>
                    </div>

                    <div class="hidden">
                        <input type="text" class="profile-edit-nickname-input form" name="nickname"
                            value="{{ old('nickname', $user->name) }}">
                    </div>
                    @if ($errors->any())
                        <div class="error-message">
                            <ul>
                                @error('nickname')
                                    <li>{{ $message }}</li>
                                @enderror
                            </ul>
                        </div>
                    @endif
                    <div class="profile-email">
                        <div class="profile-email-title underline-green">メールアドレス</div>
                        <div class="profile-edit-now-email container">
                            <div class="profile-edit-email-output">
                                {{ $user->email }}
                            </div>
                            <div><strong class="link edit-btn">
                                    [編集する]
                                </strong></div>
                        </div>
                        <div class="hidden">
                            <input type="text" class="profile-edit-email-input form" name="email"
                                value="{{ old('email', $user->email) }}">
                        </div>
                        @if ($errors->any())
                            <div class="error-message">
                                <ul>
                                    @error('email')
                                        <li>{{ $message }}</li>
                                    @enderror
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="profile-usereria">
                        <div class="profile-useereria-title underline-green">あなたのエリア</div>
                        <div class="profile-edit-now-eria container">
                            <div class="profile-eria-output">
                                {{ $municipalitie['municipalities_name'] }}
                            </div>
                            <select class="profile-edit-eria-change" name="eria">
                                @foreach ($aria_list as $item)
                                    @if ($item->municipalities_name === $municipalitie['municipalities_name'])
                                        <option value="{{ $item->id }}" selected="selected">
                                            {{ $item->municipalities_name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->municipalities_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="profile-botom-btn">
                    <input type="submit" class="btn-green" value="OK">
                </div>
            </div>
        </form>
    </div>
@endsection
