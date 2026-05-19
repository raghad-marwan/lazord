@extends('master')
@section('content')
  <main>

    <!-- PAGE HERO -->
    <section class="page-hero">
      <div class="container">
        <div class="page-hero-content">
          <h1>مركز التعلم والموارد</h1>
          <p>دراسات حالة، مقالات، وإرشادات متخصصة لمساعدتك في الاستفادة القصوى من طب الأسنان الرقمي.</p>
        </div>
      </div>
    </section>

    <!-- BLOG / RESOURCES -->
    <section class="blog" style="padding-top: 60px;">
      <div class="container">
        <h2 class="section-title" style="margin-bottom:0.5rem;">مستقبل طب الأسنان</h2>
        <p class="blog-intro">تعرف على المزيد حول مستقبل طب الأسنان وكيف يشكله لازورد.</p>
        <div class="blog-grid">
          {{-- المنشور الرئيسي --}}
          <div class="blog-main">
            <img src="{{ asset('assets/images/' . $blog_main['image']) }}" alt="{{ $blog_main['title'] }}" />
            <p class="blog-label">{{ $blog_main['title'] }}</p>
          </div>
          {{-- المنشورات الجانبية --}}
          <div class="blog-side">
            @foreach($blog_side as $side)
              <div class="blog-thumb">
                <img src="{{ asset('assets/images/' . $side['image']) }}" alt="{{ $side['title'] }}" />
                <p>{{ $side['title'] }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <!-- MORE ARTICLES -->
    <section class="results" style="background: var(--white);">
      <div class="container">
        <h2 class="section-title">مقالات وموارد إضافية</h2>
        <div class="results-grid">
          @foreach($articles as $article)
            <div class="result-card">
              <img src="{{ asset('assets/images/' . $article['image']) }}" alt="{{ $article['title'] }}" />
              <h3>{{ $article['title'] }}</h3>
              <p>{{ $article['description'] }}</p>
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
