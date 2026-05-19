@extends('master')
@section('content')
  <main>
    <section class="login-section">
      <div class="login-card">
        <a href="{{ route('lazord.index') }}" class="logo login-logo">لازورد</a>
        <h1>تسجيل الدخول</h1>
        <p class="login-sub">أدخل بياناتك للوصول إلى حسابك</p>

        {{-- عرض الأخطاء إذا وجدت --}}
        @if($errors->any())
          <div class="alert alert-error">
            @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        @endif

        <form class="login-form" id="loginForm2" action="{{ route('lazord.login.submit') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="loginEmail">البريد الإلكتروني</label>
            <input type="email" id="loginEmail" name="email" placeholder="mufid@gamil.com" value="{{ old('email') }}" />
          </div>
          <div class="form-group">
            <label for="loginPassword">كلمة المرور</label>
            <input type="password" id="loginPassword" name="password" placeholder="••••••••" />
          </div>
          <div class="login-remember">
            <label class="checkbox-label">
              <input type="checkbox" id="remember" name="remember" />
              <span>تذكرني</span>
            </label>
            <a href="#" class="forgot-link">نسيت كلمة المرور؟</a>
          </div>
          <button type="submit" class="btn-submit login-submit">تسجيل الدخول</button>
        </form>

        <p class="login-register">ليس لديك حساب؟ <a href="{{ route('lazord.pricing') }}" class="link-green">سجّل الآن مجاناً</a></p>
      </div>
    </section>
  </main>
@stop
