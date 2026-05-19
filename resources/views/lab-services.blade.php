@extends('master')
@section('content')
  <main>

    <!-- PAGE HERO -->
    <section class="page-hero">
      <div class="container">
        <div class="page-hero-content">
          <h1>خدمات المختبرات الرقمية</h1>
          <p>منتجات مبتكرة وخدمات متكاملة لعيادتك — مصممة لتحقيق نتائج استثنائية لكل مريض.</p>
          <a href="{{ route( 'lazord.pricing') }}" class="btn-primary">استكشف الباقات</a>
        </div>
      </div>
    </section>

    <!-- PRODUCTS -->
    <section class="products">
      <div class="container">
        <h2 class="section-title">أطلق العنان للابتكار الرائد في السوق مع مختبر طب الأسنان الخاص بنا</h2>
        <p class="section-subtitle">لا يمكن تحقيق ترميمات متسقة وملاءمة إلا من خلال التواصل القوي. في لازورد، قمنا
          بتطوير طرق مبتكرة للتعاون مع أطباء الأسنان لدينا باستخدام قوة التكنولوجيا لإعادة تعريف ما هو ممكن لكل مريض.
        </p>
        <div class="products-grid">
          @foreach($products as $product)
            <div class="product-card">
              <img src="{{ asset('assets/images/' . $product['image']) }}" alt="{{ $product['title'] }}" />
              <p>{{ $product['title'] }}</p>
            </div>
          @endforeach
        </div>
        
      </div>
    </section>

    <!-- SCANNING SOLUTIONS -->
    <section class="scanning">
      <div class="container">
        <h2 class="section-title">حلول طب الأسنان الترميمية لتناسب احتياجاتك</h2>
        <div class="scanning-grid">
          <div class="scanning-card dark">
            <h3>هل أنت جديد في مجال المسح الضوئي؟</h3>
            <p>تقديم نتائج موثوقة للمرضى باستخدام التكنولوجيا والأدوات المبتكرة التي تمنحك التحكم النهائي</p>
            <ul>
              <li><span class="check-icon">✓</span> المسح الضوئي 3Shape TRIOS السنجي</li>
              <li><span class="check-icon">✓</span> سير العمل الكامل الموجه</li>
              <li><span class="check-icon">✓</span> دعفات القبول لتقديم الأسنان بأكثر من ذلك</li>
              <li><span class="check-icon">✓</span> سجلات تصميم لإضافة الطباعة الإنتهائية إلى المهمة</li>
            </ul>
            <a href="{{ route( 'lazord.pricing') }}" class="btn-green">تسجيل الآن</a>
          </div>
          <div class="scanning-card light">
            <h3>هل تقوم بالمسح الضوئي بالفعل؟</h3>
            <p>قم بتنمية ممارستك من خلال الانتقال إلى سير العمل الرقمي باستخدام مجموعة أدوات طب الأسنان الرقمية المبنية
              لدينا</p>
            <ul>
              <li><span class="check-icon">✓</span> المسح الضوئي 3Shape TIROS السنجي</li>
              <li><span class="check-icon">✓</span> تدفقات المسح الضوئي الموجهة</li>
              <li><span class="check-icon">✓</span> مراجعات الأسنان الضوئي الخاصة بلغة</li>
              <li><span class="check-icon">✓</span> تدريب وتأقلم غير محدود</li>
            </ul>
            <a href="{{ route( 'lazord.pricing') }}" class="btn-dark">احصل على كل الفوائح المسح الضوئي الخاص بك</a>
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

  </main>
@stop
