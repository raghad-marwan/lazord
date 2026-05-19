@extends('admin.layout')
@section('admin-content')

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 16px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-weight: bold;">
            ✅ {{ session('success') }}
        </div>
    @endif

    <!-- STATS -->
    <section id="stats">
        <h2 style="margin-bottom: 20px;">📊 الإحصائيات</h2>
        <div class="stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 20px;">
            <div class="stat-card" style="border-right: 4px solid #0d9488;">
                <span class="stat-num">{{ $usersCount }}</span>
                <span class="stat-label">👥 عيادة</span>
            </div>
            <div class="stat-card" style="border-right: 4px solid #f59e0b;">
                <span class="stat-num">{{ $pendingOrders }}</span>
                <span class="stat-label">⏳ طلبات جديدة</span>
            </div>
            <div class="stat-card" style="border-right: 4px solid #3b82f6;">
                <span class="stat-num">{{ $completedOrders }}</span>
                <span class="stat-label">✅ مكتملة</span>
            </div>
            <div class="stat-card" style="border-right: 4px solid #ef4444;">
                <span class="stat-num">{{ $lowMaterials->count() }}</span>
                <span class="stat-label">⚠️ مواد منخفضة</span>
            </div>
        </div>
        <div class="stats-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
            <div class="stat-card" style="border-right: 4px solid #8b5cf6;">
                <span class="stat-num">{{ number_format($avgRating, 1) }} ⭐</span>
                <span class="stat-label">متوسط التقييم</span>
            </div>
            <div class="stat-card" style="border-right: 4px solid #10b981;">
                <span class="stat-num">${{ number_format($totalMaterialsValue, 0) }}</span>
                <span class="stat-label">💰 قيمة المخزون</span>
            </div>
            <div class="stat-card" style="border-right: 4px solid #6366f1;">
                <span class="stat-num">{{ $questionsCount }}</span>
                <span class="stat-label">💬 أسئلة بدون رد</span>
            </div>
        </div>
    </section>

    <!-- ORDERS -->
    <section id="orders" style="margin-bottom: 40px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2>📦 الطلبات ({{ $ordersCount }})</h2>
            <div style="display: flex; gap: 8px;">
                <span style="background: #fef3c7; color: #92400e; padding: 4px 12px; border-radius: 20px; font-size: 12px;">⏳ {{ $pendingOrders }} جديد</span>
                <span style="background: #d1fae5; color: #065f46; padding: 4px 12px; border-radius: 20px; font-size: 12px;">✅ {{ $completedOrders }} مكتمل</span>
            </div>
        </div>

        <div style="background: white; border-radius: 16px; overflow-x: auto; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            <table style="width: 100%; border-collapse: collapse; min-width: 1200px;">
                <thead>
                    <tr style="background: #1e293b; color: white;">
                        <th style="padding: 14px; text-align: right;">#</th>
                        <th style="padding: 14px; text-align: right;">العميل</th>
                        <th style="padding: 14px; text-align: right;">العيادة</th>
                        <th style="padding: 14px; text-align: right;">الدور</th>
                        <th style="padding: 14px; text-align: right;">هاتف</th>
                        <th style="padding: 14px; text-align: right;">وصف العمل</th>
                        <th style="padding: 14px; text-align: right;">الصورة</th>
                        <th style="padding: 14px; text-align: right;">الحالة</th>
                        <th style="padding: 14px; text-align: right;">التاريخ</th>
                        <th style="padding: 14px; text-align: right;">تحديث</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        <tr style="border-bottom: 1px solid #e2e8f0;">
                            <td style="padding: 12px; font-weight: 600;">#{{ $order->id }}</td>
                            <td style="padding: 12px;">{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td style="padding: 12px;">{{ $order->clinic }}</td>
                            <td style="padding: 12px;">{{ $order->role }}</td>
                            <td style="padding: 12px; direction: ltr; text-align: right;">{{ $order->phone }}</td>
                            <td style="padding: 12px; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $order->description }}">{{ $order->description ?? '-' }}</td>
                            <td style="padding: 12px; text-align: center;">
                                @if($order->image)
                                    <a href="{{ asset('storage/' . $order->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $order->image) }}" style="width: 45px; height: 45px; border-radius: 8px; object-fit: cover;" />
                                    </a>
                                @else
                                    <span style="color: #94a3b8;">-</span>
                                @endif
                            </td>
                            <td style="padding: 12px;">
                                <span style="padding: 4px 12px; border-radius: 20px; font-size: 12px;
                                    @if($order->status === 'pending') background: #fef3c7; color: #92400e;
                                    @elseif($order->status === 'processing') background: #dbeafe; color: #1e40af;
                                    @elseif($order->status === 'completed') background: #d1fae5; color: #065f46;
                                    @else background: #fee2e2; color: #991b1b;
                                    @endif">
                                    @if($order->status === 'pending') ⏳ قيد الانتظار
                                    @elseif($order->status === 'processing') 🔄 قيد المعالجة
                                    @elseif($order->status === 'completed') ✅ مكتمل
                                    @else ❌ ملغي
                                    @endif
                                </span>
                            </td>
                            <td style="padding: 12px; font-size: 13px; color: #64748b;">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td style="padding: 12px;">
                                <form action="{{ route('lazord.admin.order.status', $order->id) }}" method="POST" style="display: flex; gap: 4px;">
                                    @csrf
                                    <select name="status" style="padding: 6px; border-radius: 6px; border: 1px solid #e2e8f0; font-size: 12px;">
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>قيد المعالجة</option>
                                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>مكتمل</option>
                                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>ملغي</option>
                                    </select>
                                    <button type="submit" style="background: #0d9488; color: white; border: none; padding: 6px 10px; border-radius: 6px; cursor: pointer; font-size: 12px;">✓</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- MATERIALS -->
    <section id="materials" style="margin-bottom: 40px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2>🧪 المواد الخام</h2>
            <span style="color: #64748b;">💰 قيمة المخزون: ${{ number_format($totalMaterialsValue, 0) }}</span>
        </div>

        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #1e293b; color: white;">
                        <th style="padding: 14px; text-align: right;">المادة</th>
                        <th style="padding: 14px; text-align: center;">الكمية</th>
                        <th style="padding: 14px; text-align: center;">الحد الأدنى</th>
                        <th style="padding: 14px; text-align: center;">السعر</th>
                        <th style="padding: 14px; text-align: center;">القيمة الإجمالية</th>
                        <th style="padding: 14px; text-align: center;">الوحدة</th>
                        <th style="padding: 14px; text-align: center;">الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materials as $material)
                        <tr style="border-bottom: 1px solid #e2e8f0;">
                            <td style="padding: 14px; font-weight: 600;">{{ $material->name }}</td>
                            <td style="padding: 14px; text-align: center; font-weight: 600;
                                @if($material->quantity <= $material->min_quantity) color: #dc2626;
                                @elseif($material->quantity <= $material->min_quantity * 2) color: #f59e0b;
                                @else color: #065f46;
                                @endif">
                                {{ $material->quantity }}
                            </td>
                            <td style="padding: 14px; text-align: center; color: #64748b;">{{ $material->min_quantity }}</td>
                            <td style="padding: 14px; text-align: center;">${{ number_format($material->price, 2) }}</td>
                            <td style="padding: 14px; text-align: center; font-weight: 600;">${{ number_format($material->quantity * $material->price, 0) }}</td>
                            <td style="padding: 14px; text-align: center; color: #64748b;">{{ $material->unit }}</td>
                            <td style="padding: 14px; text-align: center;">
                                @if($material->quantity <= $material->min_quantity)
                                    <span style="background: #fee2e2; color: #991b1b; padding: 4px 12px; border-radius: 20px; font-size: 12px;">⚠️ منخفض</span>
                                @elseif($material->quantity <= $material->min_quantity * 2)
                                    <span style="background: #fef3c7; color: #92400e; padding: 4px 12px; border-radius: 20px; font-size: 12px;">⚡ منخفض</span>
                                @else
                                    <span style="background: #d1fae5; color: #065f46; padding: 4px 12px; border-radius: 20px; font-size: 12px;">✅ متوفر</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- CLIENTS -->
    <section id="clients" style="margin-bottom: 40px;">
        <h2 style="margin-bottom: 20px;">👥 العملاء (العيادات المسجلة)</h2>
        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #1e293b; color: white;">
                        <th style="padding: 14px; text-align: right;">#</th>
                        <th style="padding: 14px; text-align: right;">الاسم</th>
                        <th style="padding: 14px; text-align: right;">الإيميل</th>
                        <th style="padding: 14px; text-align: center;">تاريخ التسجيل</th>
                        <th style="padding: 14px; text-align: center;">عدد الطلبات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentUsers as $user)
                        <tr style="border-bottom: 1px solid #e2e8f0;">
                            <td style="padding: 12px; font-weight: 600;">#{{ $user->id }}</td>
                            <td style="padding: 12px;">{{ $user->name }}</td>
                            <td style="padding: 12px;">{{ $user->email }}</td>
                            <td style="padding: 12px; text-align: center;">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td style="padding: 12px; text-align: center;">
                                <span style="background: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 20px; font-size: 14px; font-weight: 600;">
                                    {{ $user->orders->count() ?? 0 }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- REVIEWS -->
    <section id="reviews" style="margin-bottom: 40px;">
        <h2 style="margin-bottom: 20px;">⭐ آراء العملاء ({{ $reviewsCount }})</h2>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            @if(isset($recentReviews) && $recentReviews->isNotEmpty())
                @foreach($recentReviews as $review)
                    <div style="background: white; padding: 24px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <strong>{{ $review->user->name ?? 'مستخدم' }}</strong>
                            <span style="color: #f59e0b; font-size: 18px;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating) ★ @else ☆ @endif
                                @endfor
                            </span>
                        </div>
                        <p style="color: #64748b; margin-bottom: 8px;">{{ $review->comment ?? 'بدون تعليق' }}</p>
                        <small style="color: #94a3b8;">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            @else
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #64748b;">
                    <p>لا يوجد تقييمات بعد</p>
                </div>
            @endif
        </div>
    </section>

    <!-- QUESTIONS -->
    <section id="questions" style="margin-bottom: 40px;">
        <h2 style="margin-bottom: 20px;">💬 الأسئلة الواردة ({{ $questionsCount }} بدون رد)</h2>
        <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            @if(isset($recentQuestions) && $recentQuestions->isNotEmpty())
                @foreach($recentQuestions as $q)
                    <div style="padding: 16px 0; border-bottom: 1px solid #e2e8f0;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                            <div>
                                <strong>{{ $q->user->name ?? 'مستخدم' }}</strong>
                                <small style="color: #94a3b8; margin-right: 8px;">{{ $q->user->email ?? '' }}</small>
                            </div>
                            <small style="color: #94a3b8;">{{ $q->created_at->diffForHumans() }}</small>
                        </div>
                        <p style="margin-bottom: 12px; background: #f8fafc; padding: 12px; border-radius: 8px;">❓ {{ $q->question }}</p>

                        @if($q->answer)
                            <div style="background: #d1fae5; padding: 12px; border-radius: 8px;">
                                <p style="color: #065f46;">✅ {{ $q->answer }}</p>
                                <small style="color: #64748b;">تم الرد {{ $q->answered_at->diffForHumans() }}</small>
                            </div>
                        @else
                            <form action="{{ route('lazord.admin.answer', $q->id) }}" method="POST">
                                @csrf
                                <div style="display: flex; gap: 8px;">
                                    <input type="text" name="answer" placeholder="اكتب الرد..." style="flex: 1; padding: 10px; border: 1px solid #e2e8f0; border-radius: 8px; font-family: 'Cairo', sans-serif;" />
                                    <button type="submit" style="background: #0d9488; color: white; border: none; padding: 10px 16px; border-radius: 8px; cursor: pointer; white-space: nowrap;">📤 إرسال الرد</button>
                                </div>
                            </form>
                        @endif
                    </div>
                @endforeach
            @else
                <p style="color: #64748b; text-align: center; padding: 20px;">لا يوجد أسئلة واردة</p>
            @endif
        </div>
    </section>

    <!-- CONTACTS -->
    <section id="contacts" style="margin-bottom: 40px;">
        <h2 style="margin-bottom: 20px;">📧 رسائل التواصل</h2>
        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
            @if(isset($recentContacts) && $recentContacts->isNotEmpty())
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #1e293b; color: white;">
                            <th style="padding: 14px; text-align: right;">#</th>
                            <th style="padding: 14px; text-align: right;">الاسم</th>
                            <th style="padding: 14px; text-align: right;">الإيميل</th>
                            <th style="padding: 14px; text-align: right;">الهاتف</th>
                            <th style="padding: 14px; text-align: right;">العيادة</th>
                            <th style="padding: 14px; text-align: right;">الدور</th>
                            <th style="padding: 14px; text-align: right;">التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentContacts as $contact)
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="padding: 12px;">#{{ $contact->id }}</td>
                                <td style="padding: 12px; font-weight: 600;">{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                <td style="padding: 12px;">{{ $contact->email }}</td>
                                <td style="padding: 12px; direction: ltr; text-align: right;">{{ $contact->phone }}</td>
                                <td style="padding: 12px;">{{ $contact->clinic }}</td>
                                <td style="padding: 12px;">{{ $contact->role }}</td>
                                <td style="padding: 12px; color: #64748b;">{{ $contact->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="color: #64748b; text-align: center; padding: 40px;">لا يوجد رسائل تواصل</p>
            @endif
        </div>
    </section>

@stop
