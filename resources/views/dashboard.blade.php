@extends('master')
@section('content')
<main>

    {{-- HERO --}}
    <section class="page-hero">
        <div class="container">
            <div class="page-hero-content">
                <h1>لوحة التحكم</h1>
                <p>مرحباً د. {{ Auth::user()->name }}! هذه لوحة التحكم الخاصة بك.</p>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <section style="padding: 40px 0;">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-num">{{ $orders->count() }}</span>
                    <span class="stat-label">📋 إجمالي الطلبات</span>
                </div>
                <div class="stat-card">
                    <span class="stat-num">{{ $orders->where('status', 'pending')->count() }}</span>
                    <span class="stat-label">⏳ قيد الانتظار</span>
                </div>
                <div class="stat-card">
                    <span class="stat-num">{{ $orders->where('status', 'processing')->count() }}</span>
                    <span class="stat-label">🔄 قيد المعالجة</span>
                </div>
                <div class="stat-card">
                    <span class="stat-num">{{ $orders->where('status', 'completed')->count() }}</span>
                    <span class="stat-label">✅ مكتملة</span>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 40px 0; background: #f8fafc;">
        <div class="container">

            @if(session('success'))
                <div style="background: #d1fae5; color: #065f46; padding: 16px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-weight: bold;">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">

                {{-- نموذج طلب جديد --}}
                <div style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                    <h3 style="margin-bottom: 20px;">📝 طلب جديد</h3>

                    <form action="{{ route('lazord.order.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div style="margin-bottom: 16px;">
                            <label for="owner_name">اسم مالك العيادة:</label>
                            <input type="text" id="owner_name" name="owner_name"
                                   value="{{ old('owner_name', Auth::user()->name) }}"
                                   placeholder="الاسم الكامل"
                                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;" />
                            @error('owner_name')
                                <span style="color: #dc2626; font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="clinic_name">اسم العيادة:</label>
                            <input type="text" id="clinic_name" name="clinic_name"
                                   value="{{ old('clinic_name') }}"
                                   placeholder="اسم العيادة"
                                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;" />
                            @error('clinic_name')
                                <span style="color: #dc2626; font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="contact_number">رقم التواصل:</label>
                            <input type="text" id="contact_number" name="contact_number"
                                   value="{{ old('contact_number') }}"
                                   placeholder="05xxxxxxxx"
                                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;" />
                            @error('contact_number')
                                <span style="color: #dc2626; font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="description">وصف العمل المطلوب:</label>
                            <textarea id="description" name="description" rows="3"
                                      placeholder="مثال: تاج زركونيا للسن الأمامي..."
                                      style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;">{{ old('description') }}</textarea>
                            @error('description')
                                <span style="color: #dc2626; font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="image">رفع صورة الحالة:</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                   style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;" />
                            @error('image')
                                <span style="color: #dc2626; font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" style="width: 100%; background: #0d9488; color: white; border: none; padding: 12px; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; font-family: 'Cairo', sans-serif;">
                            📤 إرسال الطلب
                        </button>
                    </form>
                </div>

                {{-- اسأل فريق لازورد --}}
                <div style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                    <h3 style="margin-bottom: 20px;">💬 اسأل فريق لازورد</h3>

                    <form action="{{ route('lazord.ask.question') }}" method="POST">
                        @csrf
                        <textarea name="question" rows="3" placeholder="اكتب سؤالك هنا..."
                                  style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;"></textarea>
                        @error('question')
                            <span style="color: #dc2626; font-size: 13px;">{{ $message }}</span>
                        @enderror
                        <button type="submit" style="margin-top: 12px; background: #0d9488; color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; font-family: 'Cairo', sans-serif;">
                            إرسال السؤال
                        </button>
                    </form>

                    @if($questions->isNotEmpty())
                        <div style="margin-top: 20px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                            <h4 style="margin-bottom: 12px;">📋 أسئلتي السابقة</h4>
                            @foreach($questions->take(3) as $q)
                                <div style="padding: 10px 0; border-bottom: 1px solid #f1f5f9;">
                                    <p style="font-weight: 600; font-size: 14px;">❓ {{ $q->question }}</p>
                                    @if($q->answer)
                                        <p style="color: #0d9488; font-size: 13px;">✅ {{ $q->answer }}</p>
                                    @else
                                        <p style="color: #f59e0b; font-size: 13px;">⏳ بانتظار الرد</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

            {{-- طلباتي --}}
            <div style="background: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                <h3 style="margin-bottom: 20px;">📦 طلباتي</h3>

                @if($orders->isEmpty())
                    <p style="color: #64748b; text-align: center; padding: 40px;">لا يوجد طلبات بعد</p>
                @else
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background: #f8fafc;">
                                    <th style="padding: 12px; text-align: right;">#</th>
                                    <th style="padding: 12px; text-align: right;">المالك</th>
                                    <th style="padding: 12px; text-align: right;">العيادة</th>
                                    <th style="padding: 12px; text-align: right;">رقم التواصل</th>
                                    <th style="padding: 12px; text-align: right;">وصف العمل</th>
                                    <th style="padding: 12px; text-align: right;">الصورة</th>
                                    <th style="padding: 12px; text-align: right;">الحالة</th>
                                    <th style="padding: 12px; text-align: right;">التقييم</th>
                                    <th style="padding: 12px; text-align: right;">التاريخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr style="border-bottom: 1px solid #e2e8f0;">
                                        <td style="padding: 12px;">#{{ $order->id }}</td>
                                        <td style="padding: 12px;">{{ $order->owner_name ?? $order->first_name . ' ' . $order->last_name }}</td>
                                        <td style="padding: 12px;">{{ $order->clinic_name ?? $order->clinic }}</td>
                                        <td style="padding: 12px;">{{ $order->contact_number ?? $order->phone }}</td>
                                        <td style="padding: 12px; max-width: 200px;">{{ $order->description ?? '-' }}</td>
                                        <td style="padding: 12px;">
                                            @if($order->image)
                                                <a href="{{ asset('storage/' . $order->image) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $order->image) }}" style="width: 50px; height: 50px; border-radius: 8px; object-fit: cover;" />
                                                </a>
                                            @else
                                                <span style="color: #94a3b8;">-</span>
                                            @endif
                                        </td>
                                        <td style="padding: 12px;">
                                            @if($order->status === 'pending')
                                                <span style="background: #fef3c7; color: #92400e; padding: 4px 12px; border-radius: 20px; font-size: 12px;">⏳ قيد الانتظار</span>
                                            @elseif($order->status === 'processing')
                                                <span style="background: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 20px; font-size: 12px;">🔄 قيد المعالجة</span>
                                            @elseif($order->status === 'completed')
                                                <span style="background: #d1fae5; color: #065f46; padding: 4px 12px; border-radius: 20px; font-size: 12px;">✅ مكتمل</span>
                                            @elseif($order->status === 'cancelled')
                                                <span style="background: #fee2e2; color: #991b1b; padding: 4px 12px; border-radius: 20px; font-size: 12px;">❌ ملغي</span>
                                            @endif
                                        </td>
                                        <td style="padding: 12px; text-align: center;">
                                            @if($order->status === 'completed')
                                                @php $review = $order->review; @endphp
                                                @if($review)
                                                    <span style="color: #f59e0b; font-size: 16px;">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $review->rating) ★ @else ☆ @endif
                                                        @endfor
                                                    </span>
                                                @else
                                                    <button onclick="openReview({{ $order->id }})"
                                                            style="background: #f59e0b; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 12px;">
                                                        ⭐ تقييم
                                                    </button>
                                                @endif
                                            @else
                                                <span style="color: #94a3b8;">-</span>
                                            @endif
                                        </td>
                                        <td style="padding: 12px; color: #64748b;">{{ $order->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </section>

    {{-- نافذة التقييم المنبثقة --}}
    <div id="reviewModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: white; padding: 30px; border-radius: 16px; width: 400px; text-align: center; max-width: 90%;">
            <h3 style="margin-bottom: 20px;">⭐ تقييم الخدمة</h3>

            <form action="{{ route('lazord.submit.review') }}" method="POST">
                @csrf
                <input type="hidden" name="order_id" id="reviewOrderId" />

                <div style="font-size: 36px; margin-bottom: 20px; color: #f59e0b;" id="stars">
                    <span onclick="setRating(1)" style="cursor: pointer;">★</span>
                    <span onclick="setRating(2)" style="cursor: pointer;">★</span>
                    <span onclick="setRating(3)" style="cursor: pointer;">★</span>
                    <span onclick="setRating(4)" style="cursor: pointer;">★</span>
                    <span onclick="setRating(5)" style="cursor: pointer;">★</span>
                </div>
                <input type="hidden" name="rating" id="ratingValue" value="5" />

                <textarea name="comment" rows="3" placeholder="تعليقك (اختياري)"
                          style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; margin-bottom: 16px; font-family: 'Cairo', sans-serif;"></textarea>

                <button type="submit" style="background: #0d9488; color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; width: 100%; font-family: 'Cairo', sans-serif; font-size: 16px;">
                    إرسال التقييم
                </button>
                <button type="button" onclick="closeReview()" style="background: #e2e8f0; color: #64748b; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; width: 100%; margin-top: 8px; font-family: 'Cairo', sans-serif;">
                    إلغاء
                </button>
            </form>
        </div>
    </div>

    <script>
        function openReview(orderId) {
            document.getElementById('reviewOrderId').value = orderId;
            document.getElementById('reviewModal').style.display = 'flex';
        }

        function closeReview() {
            document.getElementById('reviewModal').style.display = 'none';
        }

        function setRating(rating) {
            document.getElementById('ratingValue').value = rating;
            let stars = document.getElementById('stars').children;
            for (let i = 0; i < stars.length; i++) {
                stars[i].innerHTML = (i < rating) ? '★' : '☆';
            }
        }
    </script>

</main>
@stop
