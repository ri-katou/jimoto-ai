@extends('layout')
@section('content')
    <div class="profile">
        <form action="{{ route('profile.edit') }}" method="POST">
            <div class="profile-container">
                <div class="profile-image">
                    <div class="profile-myimage profile-icon"><img src="" alt="myimage"></div>
                    <div class="profile-edit-link">[<a href="#" class="link">編集</a>]</div>
                </div>
                <div class="profile-nickname">{{$user->name}}</div>
            </div>
            <div class="profile-edit-center-content">
                @csrf
                <div class="profile-edit-nickname">
                    <div class="profile-edit-nickname-title underline-green">現在のニックネーム</div>
                    <div class="profile-edit-now-nickname container">
                        <div class="profile-edit-nickname-output">{{$user->name}}</div>
                        <div>[
                            <strong class="link edit-btn">
                                編集する
                            </strong>]
                        </div>
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
                    {{-- <div class="hidden"> --}}
                    <input type="text" class="profile-edit-nickname-input form" name="nickname"
                        value="{{ old('nickname') }}">
                    {{-- </div> --}}
                    <div class="profile-email">
                        <div class="profile-email-title underline-green">メールアドレス</div>
                        <div class="profile-edit-now-email container">
                            <div class="profile-edit-email-output">
                                {{$user->email}}
                            </div>
                            <div>[<strong class="link edit-btn">
                                    編集する
                                </strong>]</div>
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
                        {{-- <div class="hidden"> --}}
                        <input type="text" class="profile-edit-email-input form" name="email"
                            value="{{ old('email') }}">
                        {{-- </div> --}}
                    </div>
                    <div class="profile-usereria">
                        <div class="profile-useereria-title underline-green">あなたのエリア</div>
                        <div class="profile-edit-now-eria container">
                            <div class="profile-eria-output">
                                {{$municipalitie}}
                            </div>
                            <select name="eria">
                                <option value="県央">県央</option>
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
