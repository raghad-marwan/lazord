@extends('master')
@section('content')
  <main>

    <!-- PAGE HERO -->
    <section class="page-hero">
      <div class="container">
        <div class="page-hero-content">
          <h1>لماذا تختار لازورد؟</h1>
          <p>نحن نقود ثورة طب الأسنان الرقمي بتقديم تجربة مختبرية لا مثيل لها — مبنية على التكنولوجيا والثقة والتواصل
            الحقيقي.</p>
          <a href="{{ route( 'lazord.pricing') }}" class="btn-primary">ابدأ الآن</a>
        </div>
      </div>
    </section>

    <!-- STATS -->
    <section class="stats">
      <div class="container">
        <h2 class="section-title">الآلاف من الممارسات تثق في لازورد في أعمالها المخبرية</h2>
        <div class="stats-grid">
          @foreach($stats as $stat)
            <div class="stat-card">
              <span class="stat-num">{{ $stat['number'] }}</span>
              <span class="stat-label">{{ $stat['label'] }}</span>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- FEATURES -->
    <section class="features">
      <div class="container">
        <h2 class="section-title">تعزيز مستقبل طب الأسنان الرقمي</h2>
        <p class="section-subtitle">لا يمكن تحقيق ترميمات متسقة وملاءمة إلا من خلال التواصل القوي. في لازورد، قمنا
          بتطوير طرق مبتكرة للتعاون مع أطباء الأسنان لدينا باستخدام قوة التكنولوجيا.</p>
        <div class="features-grid">
          @foreach($features as $feature)
            <div class="feature-card">
              <div class="feature-icon">
                <div class="icon-fallback">{{ $feature['icon'] }}</div>
              </div>
              <h3>{{ $feature['title'] }}</h3>
              <p>{{ $feature['description'] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- RESULTS -->
    <section class="results">
      <div class="container">
        <h2 class="section-title">تحقيق نتائج أفضل لممارستك ومرضاك</h2>
        <div class="results-grid">
          @foreach($results as $result)
            <div class="result-card">
              <img src="{{ asset('assets/images/' . $result['image']) }}" alt="{{ $result['title'] }}" />
              <h3>{{ $result['title'] }}</h3>
              <p>{{ $result['description'] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="faq">
      <div class="container faq-container">
        <h2 class="faq-title">الأسئلة الشائعة حول لازورد</h2>
        <div class="faq-list">
          @foreach($faqs as $faq)
            <div class="faq-item">
              <button class="faq-btn" aria-expanded="false">
                <span>{{ $faq['question'] }}</span>
                <span class="faq-arrow">›</span>
              </button>
              <div class="faq-answer">
                <p>{{ $faq['answer'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

  </main>
@stop
