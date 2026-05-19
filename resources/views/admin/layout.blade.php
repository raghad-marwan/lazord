<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لوحة تحكم الإدارة - لازورد</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Cairo', 'Tajawal', sans-serif; background: #f1f5f9; }

        .admin-layout { display: flex; min-height: 100vh; }

        .sidebar {
            width: 250px;
            background: #1e293b;
            color: white;
            padding: 20px;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar .logo {
            font-size: 24px;
            font-weight: 800;
            color: #0d9488;
            text-decoration: none;
            display: block;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #334155;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 4px;
            transition: all 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background: #0d9488;
            color: white;
        }

        .main-content {
            margin-right: 250px;
            flex: 1;
            padding: 20px;
        }

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

        .btn-logout {
            background: #ef4444;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        {{-- Sidebar --}}
        <aside class="sidebar">
            <a href="{{ route('lazord.admin.dashboard') }}" class="logo">لازورد</a>

            <nav>
                <a href="#stats">📊 الإحصائيات</a>
                <a href="#orders">📦 الطلبات</a>
                <a href="#materials">🧪 المواد الخام</a>
                <a href="#clients">👥 العملاء</a>
                <a href="#reviews">⭐ التقييمات</a>
                <a href="#questions">💬 الأسئلة</a>
                <a href="#contacts">📧 التواصل</a>
            </nav>

            <form action="{{ route('lazord.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">🚪 تسجيل الخروج</button>
            </form>
        </aside>

        {{-- المحتوى --}}
        <main class="main-content">
            @yield('admin-content')
        </main>
    </div>
</body>
</html>
