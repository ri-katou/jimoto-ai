@extends('layout')
@section('content')
<div class="register login">
  <!-- @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $message)
      <li>{{ $message }}</li>
      @endforeach
    </ul>
  </div>
  @endif -->


  <form action="{{route('register.check')}}" method="post">
    @csrf
    <div class="register-body">
      <div class="midasi login-header yu-sei underline-green">ユーザー登録画面</div>
      <div class="register-form">
        <div class="register-inner login-form-to">
          <div class="register-part">ニックネームを入力してください。<font color="red">(必須)<font color="def"></div>
          @if ($errors->any())
          <div class="error-message">
            <ul>
              @error('name')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
          <input type="nickname" class="form" name="name" placeholder="群馬太郎" value="{{ old('name') }}">
        </div>
        <div class="register-inner login-form-to">
          <div class="register-part">メールアドレスを入力してください。<font color="red">(必須)<font color="def"></div>
          @if ($errors->any())
          <div class="error-message">
            <ul>
              @error('email')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
          <input type="email" class="form" name="email"  placeholder="jimotoai@gunma.jp" value="{{ old('email') }}">
        </div>
        <div class="register-inner login-form-to">
          <div class="register-part">パスワードを入力してください。<font color="red">(必須)<font color="def"></div>
          @if ($errors->any())
          <div class="error-message">
            <ul>
              @error('password')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
          <input type="password" class="form" name="password">
        </div>
        <div class="register-inner login-form-to">
          <div class="register-part">確認のため、パスワードをもう一度入力してください。<font color="red">(必須)<font color="def"></div>
          @if ($errors->any())
          <div class="error-message">
            <ul>
              @error('password')
              <li>{{ $message }}</li>
              @enderror
            </ul>
          </div>
          @endif
          <input type="password" class="form" name="password_confirmation">
        </div>
      </div>
    </div>
    <div class="login-btn-space">
      <div class="return">戻る</div>
      <div><input type="submit" class="btn-green" value="OK"></div>
    </div>
  </form>
</div>


@endsection