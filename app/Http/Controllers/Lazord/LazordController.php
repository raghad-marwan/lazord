<?php

namespace App\Http\Controllers\Lazord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Question;
use App\Models\Review;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LazordController extends Controller
{
    // دالة خاصة للإحصائيات
    private function getStats()
    {
        return [
            ['number' => '1.5M+', 'label' => 'تم تسليم الابتسامات السعيدة'],
            ['number' => '$30K', 'label' => 'تم الحفظ مقدماً'],
            ['number' => '50K+', 'label' => 'تقييمات حالة 5 نجوم']
        ];
    }

    // دالة خاصة للميزات
    private function getFeatures()
    {
        return [
            ['icon' => '🔬', 'title' => 'سير العمل التعاوني', 'description' => 'احصل على مراجعة المسح في الوقت الفعلي واعتمد تصاميم الأسنان المعقدة ثلاثية الأبعاد للإعداد النهائي في عملك المختبري.'],
            ['icon' => '🦷', 'title' => 'المنتجات المبتكرة', 'description' => 'قم بتقديم خدمات تغير قواعد اللعبة مثل التيجان لمدة 5 أيام، وأطقم الأسنان ذات الموعد المباشرة، والأجزاء الجزئية المباشرة.'],
            ['icon' => '💻', 'title' => 'مختبر رقمي بالكامل', 'description' => 'يمكنك الوصول إلى فنيين ذوي المستوى العالمي الذين يستجيبون بأحدث تقنيات طب الأسنان وأوقات التسليم الرائدة في الصناعة.'],
            ['icon' => '📋', 'title' => 'الخبرة عند الطلب', 'description' => 'يمكنك الوصول إلى خبرائنا السريريين للحصول على إرشادات ودعم متخصصين عبر الهاتف أو البريد الإلكتروني خلال دقائق.']
        ];
    }

    // دالة خاصة للنتائج
    private function getResults()
    {
        return [
            ['image' => 'result-1.jpg', 'title' => 'تطوير مهارات كل عضو من الموظفين', 'description' => 'احمل كل عضو من أعضاء فريقك بثقة على سير عمل رقمي — استفد من التدريب غير المحدود لفريقك كلما دعت الحاجة.'],
            ['image' => 'result-2.jpg', 'title' => 'تحسين تجربة المريض', 'description' => 'ارفع مستوى رعاية المريض من خلال ابتكارات مثل أطقم الأسنان ذات الموعد المباشرة، والأجزاء الجزئية المباشرة، والمسح الضوئي الترميمي.'],
            ['image' => 'result-3.jpg', 'title' => 'زيادة القدرة على التنبؤ بالعلاج', 'description' => 'استخدم أدوات المسح المتقدمة — تصور التصاميم الرقمية والموافقة عليها، وتعزيز قبول الحالة، وتقديم نتائج ناجحة للمرضى.']
        ];
    }


    private function getFaqs()
{
    return [
        [
            'question' => 'ما هو لازورد',
            'answer' => 'لازورد هو مختبر الأسنان الرقمي الرائد الذي يتيح لعيادات طب الأسنان التواصل الفوري مع المختبر وتتبع الحالات وإتمام الطلبات بشكل رقمي بالكامل.'
        ],
        [
            'question' => 'ما هي فوائد طب الأسنان الرقمي',
            'answer' => 'يوفر طب الأسنان الرقمي دقة أعلى في التصاميم، وأوقات تسليم أسرع، وتحسين التواصل بين العيادة والمختبر، وتجربة أفضل للمريض.'
        ],
        [
            'question' => 'ما هي مختبر الأسنان الرقمي',
            'answer' => 'مختبر الأسنان الرقمي هو مرفق متخصص يستخدم أحدث التقنيات الرقمية مثل طباعة ثلاثية الأبعاد والتصميم الحاسوبي لإنتاج ترميمات أسنان عالية الجودة.'
        ],
        [
            'question' => 'ما هي سير العمل المبتكرة التي تقدمها لازورد',
            'answer' => 'تقدم لازورد سير عمل رقمية متكاملة تشمل المسح الضوئي، والتصميم الرقمي، والموافقة عبر الإنترنت، وتتبع الحالات في الوقت الفعلي.'
        ],
        [
    'question' => 'ما هي منتجات مختبر الأسنان التي تقدمها لازورد',
    'answer' => 'تقدم لازورد مجموعة واسعة من المنتجات تشمل تيجان الزركونيا، وحلول رعاية الأسنان الشاملة، وأطقم الأسنان ذات الموعد الثاني، وأجهزة علاج انقطاع التنفس، وتقويم الأسنان الشفاف، والواليات الليلية المطبوعة بتقنية ثلاثية الأبعاد.'
  ],
  [
    'question' => 'كيف يتم مقارنة لازورد مع مختبرات الأسنان الأخرى',
    'answer' => 'تتميز لازورد بتقديم نظام رقمي متكامل، وسرعة تسليم لا مثيل لها، ودعم متخصص على مدار الساعة، مع أسعار تنافسية مقارنة بالمختبرات التقليدية.'
  ]];
}

    public function index()
    {
        $stats = $this->getStats();
        $features = $this->getFeatures();
        $results = $this->getResults();
        $steps = [
            'المسح الضوئي بدقة وثقة',
            'اطلب العمل المختبري باستخدام الوصفات الطبية الرقمية',
            'الموافقة على التصاميم الرقمية قبل التصنيع',
            'تتبع الحالات في الوقت الفعلي',
            'تسليم العلاج للمريض في أيام'
        ];

        return view('index', compact('stats', 'features', 'results', 'steps'));
    }

    public function services()
    {
        $products = [
            ['image' => 'product-1.jpg', 'title' => 'أجزاء مباشرة إلى النهاية'],
            ['image' => 'product-2.jpg', 'title' => 'حلول رعاية الأسنان الشاملة'],
            ['image' => 'product-3.jpg', 'title' => 'طقم الأسنان ذو الموعد الثاني'],
            ['image' => 'product-4.jpg', 'title' => 'تيجان الزركونيا لمدة 5 أيام'],
            ['image' => 'product-5.jpg', 'title' => 'أجهزة علاج انقطاع التنفس أثناء النوم'],
            ['image' => 'product-6.jpg', 'title' => 'تقويم الأسنان الشفاف'],
            ['image' => 'product-7.jpg', 'title' => 'واليات ليلية مطبوعة بتقنية ثلاثية الأبعاد']
        ];

        $stats = $this->getStats();
        return view('lab-services', compact('products', 'stats'));
    }

    public function pricing()
    {
        $plans = [

            [
                'badge' => 'مبتدئ',
                'name' => 'الباقة الأساسية',
                'price' => 'مجاناً',
                'period' => 'للبدء',
                'description' => 'مثالية للعيادات التي تبدأ رحلتها في طب الأسنان الرقمي.',
                'features' => [
                    ['available' => true, 'text' => 'الوصول إلى منصة لازورد'],
                    ['available' => true, 'text' => 'طلب حتى 5 حالات شهرياً'],
                    ['available' => true, 'text' => 'دعم عبر البريد الإلكتروني'],
                    ['available' => true, 'text' => 'تتبع الحالات الأساسي'],
                    ['available' => false, 'text' => 'الموافقة الرقمية قبل التصنيع'],
                    ['available' => false, 'text' => 'أولوية في التسليم']
                ],

                'popular' => false,
                'button_text' => 'ابدأ مجاناً',
                'button_url' => '#contact',
                'button_class' => 'btn-outline'
            ],

            [
                'badge' => 'الأكثر شيوعاً',
                'name' => 'الباقة الاحترافية',
                'price' => '$299',
                'period' => '/ شهرياً',
                'description' => 'للعيادات المتنامية التي تسعى لتقديم خدمة متميزة ومتسقة.',
                'features' => [
                    ['available' => true, 'text' => 'الوصول الكامل إلى منصة لازورد'],
                    ['available' => true, 'text' => 'طلبات غير محدودة'],
                    ['available' => true, 'text' => 'دعم هاتفي ومباشر'],
                    ['available' => true, 'text' => 'الموافقة الرقمية قبل التصنيع'],
                    ['available' => true, 'text' => 'تتبع الحالات في الوقت الفعلي'],
                    ['available' => true, 'text' => 'تدريب مخصص للفريق']
                ],

                'popular' => true,
                'button_text' => 'ابدأ الآن',
                'button_url' => '#contact',
                'button_class' => 'btn-primary'
            ],

            [
                'badge' => 'مؤسسي',
                'name' => 'باقة المؤسسات',
                'price' => 'مخصص',
                'period' => 'حسب الاحتياج',
                'description' => 'حلول مخصصة لشبكات العيادات والمجموعات الصحية الكبيرة.',
                'features' => [
                    ['available' => true, 'text' => 'كل مميزات الباقة الاحترافية'],
                    ['available' => true, 'text' => 'مدير حساب مخصص'],
                    ['available' => true, 'text' => 'تكامل مع أنظمة العيادة'],
                    ['available' => true, 'text' => 'تقارير وإحصاءات متقدمة'],
                    ['available' => true, 'text' => 'أولوية قصوى في التسليم'],
                    ['available' => true, 'text' => 'دعم 24/7 على مدار الساعة']
                ],

                'popular' => false,
                'button_text' => 'تواصل معنا',
                'button_url' => '#contact',
                'button_class' => 'btn-outline'
            ]
        ];

        return view('pricing', compact('plans'));
    }

    public function solutions()
    {
        $steps = [
            'المسح الضوئي بدقة وثقة',
            'اطلب العمل المختبري باستخدام الوصفات الطبية الرقمية',
            'الموافقة على التصاميم الرقمية قبل التصنيع',
            'تتبع الحالات في الوقت الفعلي',
            'تسليم العلاج للمريض في أيام'
        ];

        $blog_main = [
            'image' => 'blog-smile.jpg',
            'title' => 'دراسة حالة: 10 وحدات لتحويل ابتسامة الزركونيا'
        ];

        $blog_side = [
            ['image' => 'blog-lab.jpg', 'title' => 'داخل معمل لازورد للمستقبل'],
            ['image' => 'blog-work.jpg', 'title' => 'كيف يعمل لازورد']
        ];

        return view('solutions', compact('steps', 'blog_main', 'blog_side'));
    }

    public function whylazord()
    {
        return view('why-lazord', [
            'stats' => $this->getStats(),
            'features' => $this->getFeatures(),
            'results' => $this->getResults(),
            'faqs' => $this->getFaqs()
        ]);
    }

    public function learn()
    {
        $blog_main = [
            'image' => 'blog-smile.jpg',
            'title' => 'دراسة حالة: 10 وحدات لتحويل ابتسامة الزركونيا'
        ];

        $blog_side = [
            ['image' => 'blog-lab.jpg', 'title' => 'داخل معمل لازورد للمستقبل'],
            ['image' => 'blog-work.jpg', 'title' => 'كيف يعمل لازورد']
        ];

        $articles = [
            [
                'image' => 'result-1.jpg',
                'title' => 'دليل المسح الضوئي الرقمي للمبتدئين',
                'description' => 'تعرف على كيفية البدء في المسح الضوئي الرقمي وتحقيق أفضل النتائج لمرضاك منذ اليوم الأول.'
            ],
            [
                'image' => 'result-2.jpg',
                'title' => 'كيف تحسّن قبول العلاج بالتصاميم الرقمية',
                'description' => 'استخدم التصاميم الرقمية ثلاثية الأبعاد لإقناع المرضى بخطط العلاج وزيادة نسبة القبول.'
            ],
            [
                'image' => 'result-3.jpg',
                'title' => 'مستقبل طب الأسنان: توجهات 2025',
                'description' => 'اكتشف أحدث التوجهات والتقنيات التي ستشكل مستقبل طب الأسنان في السنوات القادمة.'
            ]
        ];

        $faqs = $this->getFaqs();

        return view('learn', compact('blog_main', 'blog_side', 'articles', 'faqs'));
    }

    public function login()
    {
        return view('login');
    }



    public function dashboard()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->get();
        $questions = Question::where('user_id', $user->id)->latest()->get();

        return view('dashboard', compact('user', 'orders', 'questions'));
    }

    public function adminDashboard()
    {
        $usersCount = User::count();
        $ordersCount = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $questionsCount = Question::whereNull('answer')->count();
        $reviewsCount = Review::count();
        $avgRating = Review::avg('rating') ?? 0;

        $recentOrders = Order::with('user')->latest()->take(10)->get();
        $recentUsers = User::latest()->take(10)->get();
        $recentQuestions = Question::with('user')->whereNull('answer')->latest()->get();
        $recentReviews = Review::with('user')->latest()->take(5)->get();

        $materials = Material::all();
        $lowMaterials = Material::whereColumn('quantity', '<=', 'min_quantity')->get();
        $totalMaterialsValue = Material::sum(DB::raw('quantity * price'));

        return view('admin.dashboard', compact(
            'usersCount',
            'ordersCount',
            'pendingOrders',
            'completedOrders',
            'questionsCount',
            'reviewsCount',
            'avgRating',
            'recentOrders',
            'recentUsers',
            'recentQuestions',
            'recentReviews',
            'materials',
            'lowMaterials',
            'totalMaterialsValue'
        ));
    }





    public function loginSubmit(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    // Admin
    if ($validated['email'] === 'admin@lazord.com') {
        $user = User::where('email', 'admin@lazord.com')->first();

        if ($user && password_verify($validated['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('lazord.admin.dashboard');
        }
        return back()->withErrors(['email' => 'بيانات المدير غير صحيحة']);
    }

    // Doctor
    $user = User::firstOrCreate(
        ['email' => $validated['email']],
        [
            'password' => bcrypt($validated['password']),
            'name' => explode('@', $validated['email'])[0],
            'role' => 'doctor'  // ✅ مستخدم جديد = doctor
        ]
    );

    Auth::login($user);
    return redirect()->route('lazord.dashboard');
}


    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'clinic' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // رفع الصورة
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('orders', 'public');
        }

        // البحث عن المستخدم أو إنشائه
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            [
                'password' => bcrypt('password123'),
                'name' => $validated['firstName'] . ' ' . $validated['lastName']
            ]
        );

        // إنشاء الطلب
        Order::create([
            'user_id' => $user->id,
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'clinic' => $validated['clinic'],
            'role' => $validated['role'],
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'status' => 'pending'
        ]);

        // تسجيل الدخول
        Auth::login($user);

        // التوجيه للـ Dashboard
        return redirect()->route('lazord.dashboard')->with('success', 'تم إرسال طلبك بنجاح! سنتواصل معك قريباً.');
    }


    public function askQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required|string|min:5|max:1000'
        ]);

        Question::create([
            'user_id' => Auth::id(),
            'question' => $request->question
        ]);

        return back()->with('success', 'تم إرسال سؤالك بنجاح! سنرد عليك قريباً.');
    }

    public function answerQuestion(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required|string|min:2'
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'answer' => $request->answer,
            'answered_at' => now()
        ]);

        return back()->with('success', 'تم إرسال الرد بنجاح!');
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return back()->with('success', 'تم تحديث حالة الطلب #' . $id . ' إلى ' . $request->status);
    }

    public function submitOrder(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'clinic_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'description' => 'required|string|min:10|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('orders', 'public');
        }

        $user = Auth::user();

        Order::create([
            'user_id' => $user->id,
            'first_name' => $validated['owner_name'],
            'last_name' => '',
            'email' => $user->email,
            'phone' => $validated['contact_number'],
            'clinic' => $validated['clinic_name'],
            'role' => 'طبيب أسنان',
            'description' => $validated['description'],
            'image' => $imagePath,
            'status' => 'pending'
        ]);

        return redirect()->route('lazord.dashboard')->with('success', 'تم إرسال طلبك بنجاح! سنتواصل معك قريباً.');
    }

    // دالة حفظ التقييم
    public function submitReview(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500'
        ]);

        $user = Auth::user();

        Review::create([
            'user_id' => $user->id,
            'order_id' => $request->order_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'شكراً لك! تم حفظ تقييمك بنجاح ⭐');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('lazord.index');
    }
}
