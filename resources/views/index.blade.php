@extends('master')
@section('content')
 <main>

    <!-- HERO -->
    <section class="hero" id="home">
      <div class="hero-container">
        <div class="hero-image-wrap">
          <img src="{{asset('assets/images/hero-lab.jpg')}}" alt="مختبر الأسنان" class="hero-img" />
        </div>
        <div class="hero-content">
          <h1>مختبر الأسنان الرقمي<br />مع التواصل في الوقت<br />الحقيقي</h1>
          <p>نحن نعمل على تمكين الآلاف من عيادات طب الأسنان من خلال تدفقات عمل مبتكرة لتعزيز رعاية المرضى وإحداث ثورة في
            طريقة تقديم طلباتهم والتعاون في العمل المختبري.</p>
          <div class="hero-btns">
            <a href="{{ route( 'lazord.pricing') }}" class="btn-primary">ابدأ الآن!</a>
            <a href="{{ route( 'lazord.why-lazord') }}" class="btn-secondary">شاهد الفيديو</a>
          </div>
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

    <!-- WORKFLOW -->
    <section class="workflow">
      <div class="container workflow-container">
        <div class="workflow-image">
          <img src="{{asset('assets/images/workflow.jpg')}}" alt="سير العمل" />
        </div>
        <div class="workflow-content">
          <h2>قم بتحويل ممارساتك باستخدام سير عمل رقمي مثبت</h2>
          <p class="workflow-sub">استمتع بمستوى من التحكم لم يكن ممكناً من قبل.</p>
          <ul class="workflow-list">
            @foreach($steps as $step)
              <li><span class="check">✓</span> {{ $step }}</li>
            @endforeach
            <li>
              <span class="check">✓</span>
              <a href="{{ route( 'lazord.why-lazord') }}" class="link-green">
                كيف يتم مقارنة لازورد مع مختبرات الأسنان الأخرى
              </a>
            </li>
          </ul>
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

  </main>
@stop
