<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>لازورد — مختبر الأسنان الرقمي</title>
  <link rel="stylesheet" href="{{asset('assets/style.css')}}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700;800&display=swap"
    rel="stylesheet" />
    <style>
    .stat-num {
        color: #0f172a !important;
        font-weight: 800 !important;
        font-size: 28px !important;
    }

    .stat-label {
        color: #475569 !important;
        font-weight: 600 !important;
    }

    .stat-card {
        background: white !important;
        padding: 24px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
</style>
</head>

<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="nav-container">
      <a href="{{ route( 'lazord.index') }}" class="logo">لازورد</a>
      <nav class="nav-links">
        <a href="{{ route( 'lazord.why-lazord') }}">لماذا لازورد</a>
        <a href="{{ route( 'lazord.lab-services') }}">خدمات المختبرات</a>
        <a href="{{ route( 'lazord.solutions') }}">الحلول</a>
        <a href="{{ route( 'lazord.pricing') }}">التسعير</a>
        <a href="{{ route( 'lazord.learn') }}">التعلم</a>
      </nav>
      <div class="nav-actions">
        <span class="phone">هاتف: +(970)0594866148</span>
        <a href="login" class="btn-login">تسجيل الدخول</a>
        <a href="pricing" class="btn-cta">ابدأ الآن</a>
      </div>
      <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="القائمة">
        <span></span><span></span><span></span>
      </button>
    </div>
    <div class="mobile-menu" id="mobileMenu">
      <a href="{{route( 'lazord.why-lazord')}}">لماذا لازورد</a>
      <a href=" {{ route( 'lazord.lab-services') }} ">خدمات المختبرات</a>
      <a href="  {{ route( 'lazord.solutions') }}">الحلول</a>
      <a href="{{ route( 'lazord.pricing') }}">التسعير</a>
      <a href="{{ route( 'lazord.learn') }}">التعلم</a>
      <a href="{{ route( 'lazord.pricing') }}" class="btn-cta mobile-cta">ابدأ الآن</a>
    </div>
  </header>

 @yield('content')

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container footer-container">
      <div class="footer-cta">
        <h3>هل مازلت تأخذ الانطباعات الجسدية؟</h3>
        <p>نقدم لك كل ما تحتاجه لبدء ذلك في طب الأسنان الرقمي محلياً — بما في ذلك الماسح الضوئي داخل الفم.</p>
        <a href="pricing.html" class="btn-cta-footer">ابدأ</a>
      </div>
      <div class="footer-links">
        <div class="footer-col">
          <h4>لازورد</h4>
          <ul>
            <li><a href="{{ route( 'lazord.why-lazord') }}">لماذا لازورد</a></li>
            <li><a href=" {{ route( 'lazord.lab-services') }}">خدمات المختبرات</a></li>
            <li><a href="#">وظائف</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>منتجات</h4>
          <ul>
            <li><a href=" {{ route( 'lazord.lab-services') }}">منتجات</a></li>
            <li><a href=" {{ route( 'lazord.lab-services') }}">أطقم والمسح</a></li>
            <li><a href=" {{ route( 'lazord.lab-services') }}">حلول رعاية الأسنان</a></li>
            <li><a href=" {{ route( 'lazord.lab-services') }}">أدوات رقمية</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>ممارسات</h4>
          <ul>

            <li><a href="{{ route( 'lazord.solutions') }}">الحلول</a></li>
            <li><a href="{{route( 'lazord.why-lazord')}}">لماذا لازورد</a></li>
            <li><a href="{{ route( 'lazord.pricing') }}">التسعير</a></li>
            <li><a href="{{ route( 'lazord.login') }}">تسجيل الدخول</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>موارد</h4>
          <ul>
            <li><a href="{{ route( 'lazord.learn') }}">التعلم</a></li>
            <li><a href="{{ route( 'lazord.learn') }}">دراسات الحالة</a></li>
            <li><a href="{{ route( 'lazord.learn') }}">مدونة</a></li>
            <li><a href="{{ route( 'lazord.pricing') }}">تواصل معنا</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <p>© 2024 لازورد — جميع الحقوق محفوظة</p>
        <div class="footer-legal"><a href="#">سياسة الخصوصية</a><a href="#">شروط الاستخدام</a><a
            href="pricing.html">تواصل معنا</a></div>
      </div>
    </div>
  </footer>

  <script src="{{asset('assets/script.js')}}"></script>
</body>

</html>
