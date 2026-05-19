@extends('master')
@section('content')
  <main>

    <!-- PAGE HERO -->
    <section class="page-hero">
      <div class="container">
        <div class="page-hero-content">
          <h1>باقات وأسعار لازورد</h1>
          <p>اختر الباقة التي تناسب احتياجات عيادتك — ابدأ صغيراً وتوسع بلا حدود.</p>
        </div>
      </div>
    </section>

    <!-- PRICING CARDS -->
    <section class="pricing-section">
      <div class="container">
        <h2 class="section-title">اختر الباقة المناسبة</h2>
        <p class="section-subtitle">جميع الباقات تشمل الوصول الكامل إلى منصة لازورد الرقمية، مع دعم متخصص وتدريب غير
          محدود.</p>
        <div class="pricing-grid">

          @foreach($plans as $plan)
            <div class="pricing-card {{ $plan['popular'] ? 'pricing-popular' : '' }}">
              <div class="pricing-badge {{ $plan['popular'] ? 'popular' : '' }}">{{ $plan['badge'] }}</div>
              <h3>{{ $plan['name'] }}</h3>
              <div class="pricing-price">
                <span class="price-amount">{{ $plan['price'] }}</span>
                <span class="price-period">{{ $plan['period'] }}</span>
              </div>
              <p class="pricing-desc">{{ $plan['description'] }}</p>
              <ul class="pricing-features">
                @foreach($plan['features'] as $feature)
                  <li class="{{ $feature['available'] ? '' : 'disabled' }}">
                    <span>{{ $feature['available'] ? '✓' : '✗' }}</span>
                    {{ $feature['text'] }}
                  </li>
                @endforeach
              </ul>
              <a href="{{ $plan['button_url'] }}" class="{{ $plan['button_class'] }} pricing-btn">
                {{ $plan['button_text'] }}
              </a>
            </div>
          @endforeach

        </div>
      </div>
    </section>

    <!-- CONTACT FORM -->
    <section class="contact" id="contact">
      <div class="container contact-container">
        <div class="contact-info">
          <h2>تواصل معنا</h2>
          <p>قم بتطوير ممارساتك مع لازورد — الشريك الرقمي المتكامل الوحيد وقم بتحسين تجربة المريض والحلول السريرية ونمو
            الأعمال.</p>
          <p class="contact-start"><strong>ابدأ اليوم عن طريق ملء النموذج.</strong></p>
          <p class="contact-legal">من خلال تقديم النموذج أعلاه، أوافق على شروط الاستخدام وسياسة الخصوصية الخاصة بشركة
            لازورد. يوافق على تلقي الاتصال بي من قبل شركة لازورد عبر رسالة نصية باستخدام معلومات الاتصال المقدمة. قد تم
            تطبيق أسعار الرسائل والبيانات ويمكنني الرد بـ STOP لإلغاء الاشتراك في أي وقت.</p>
        </div>

        {{-- رسالة النجاح --}}
        @if(session('success'))
          <div style="background: #d1fae5; color: #065f46; padding: 16px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-weight: bold;">
            ✅ {{ session('success') }}
          </div>
        @endif

        {{-- رسائل الأخطاء العامة --}}
        @if($errors->any())
          <div style="background: #fee2e2; color: #991b1b; padding: 16px; border-radius: 8px; margin-bottom: 20px;">
            <strong>⚠️ يرجى تصحيح الأخطاء التالية:</strong>
            <ul style="margin-top: 8px; padding-right: 20px;">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="contact-form" id="contactForm2" action="{{ route('lazord.contact.submit') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group">
              <label for="firstName">الاسم الأول:</label>
              <input type="text" id="firstName" name="firstName" placeholder="الاسم" value="{{ old('firstName') }}" />
              @error('firstName')
                <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="lastName">اسم العائلة:</label>
              <input type="text" id="lastName" name="lastName" placeholder="اسم العائلة" value="{{ old('lastName') }}" />
              @error('lastName')
                <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="email">عنوان البريد الإلكتروني:</label>
              <input type="email" id="email" name="email" placeholder="عنوان البريد الإلكتروني" value="{{ old('email') }}" />
              @error('email')
                <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="phone">رقم الهاتف:</label>
              <input type="tel" id="phone" name="phone" placeholder="رقم الهاتف" value="{{ old('phone') }}" />
              @error('phone')
                <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="clinic">اسم العيادة:</label>
              <input type="text" id="clinic" name="clinic" placeholder="اسم العيادة" value="{{ old('clinic') }}" />
              @error('clinic')
                <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="role">دورك في العيادة:</label>
              <select id="role" name="role" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;">
                <option value="">-- اختر دورك --</option>
                <option value="طبيب أسنان" {{ old('role') == 'طبيب أسنان' ? 'selected' : '' }}>طبيب أسنان</option>
                <option value="مساعد طبيب أسنان" {{ old('role') == 'مساعد طبيب أسنان' ? 'selected' : '' }}>مساعد طبيب أسنان</option>
                <option value="مدير العيادة" {{ old('role') == 'مدير العيادة' ? 'selected' : '' }}>مدير العيادة</option>
                <option value="فني مختبر" {{ old('role') == 'فني مختبر' ? 'selected' : '' }}>فني مختبر</option>
                <option value="موظف استقبال" {{ old('role') == 'موظف استقبال' ? 'selected' : '' }}>موظف استقبال</option>
                <option value="طالب/متدرب" {{ old('role') == 'طالب/متدرب' ? 'selected' : '' }}>طالب/متدرب</option>
                <option value="مالك/شريك" {{ old('role') == 'مالك/شريك' ? 'selected' : '' }}>مالك/شريك</option>
                <option value="أخرى" {{ old('role') == 'أخرى' ? 'selected' : '' }}>أخرى</option>
              </select>
              @error('role')
                <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
              @enderror
            </div>
          </div>

          {{-- وصف العمل المطلوب --}}
          <div class="form-group" style="margin-bottom: 20px;">
            <label for="description">وصف العمل المطلوب:</label>
            <textarea id="description" name="description" rows="4" placeholder="مثال: تاج زركونيا للسن الأمامي، أو طقم أسنان كامل للفك العلوي..." style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif; resize: vertical;">{{ old('description') }}</textarea>
            @error('description')
              <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
            @enderror
          </div>

          {{-- رفع صورة الحالة --}}
          <div class="form-group" style="margin-bottom: 20px;">
            <label for="image">رفع صورة الحالة (اختياري):</label>
            <input type="file" id="image" name="image" accept="image/*" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;" />
            <small style="color: #64748b; display: block; margin-top: 4px;">الصيغ المسموحة: JPG, PNG, JPEG - الحد الأقصى: 2MB</small>
            @error('image')
              <span style="color: #dc2626; font-size: 13px; display: block; margin-top: 4px;">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit" class="btn-submit">إرسال الطلب</button>
        </form>
      </div>
    </section>

  </main>
@stop
