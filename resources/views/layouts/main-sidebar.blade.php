<!-- main-sidebar -->
<style>
/* ===== SIDEBAR STYLES - LIGHT THEME ===== */
.app-sidebar {
    background: #ffffff !important;
    box-shadow: 2px 0 15px rgba(0,0,0,0.08) !important;
    border-left: 1px solid #e8eaf0 !important;
}

/* User area at top */
.app-sidebar__user {
    background: linear-gradient(135deg, #f0f4ff, #e8eeff) !important;
    padding: 18px 16px 12px !important;
    border-bottom: 1px solid #e0e4f0;
}

.user-pro-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.user-pro-body .avatar-wrapper {
    position: relative;
    display: inline-block;
}

.user-pro-body .avatar-xl {
    width: 68px !important;
    height: 68px !important;
    border: 3px solid #c5d0ff;
    box-shadow: 0 4px 15px rgba(99,125,255,0.15);
    transition: border-color 0.3s;
}

.user-pro-body .avatar-xl:hover {
    border-color: #637dff;
}

.avatar-status.profile-status {
    width: 14px !important;
    height: 14px !important;
    border: 2px solid #fff;
    position: absolute;
    bottom: 2px;
    right: 2px;
}

.user-info {
    text-align: center;
}

.user-info h4 {
    color: #2d3555 !important;
    font-size: 15px !important;
    font-weight: 700 !important;
    margin-bottom: 3px !important;
    letter-spacing: 0.3px;
}

.user-info .institute-name {
    font-size: 11px;
    color: #7b8ab8;
    font-weight: 500;
    line-height: 1.4;
}

/* ===== SIDEBAR SEARCH ===== */
.sidebar-search-wrapper {
    padding: 6px 12px 0 12px;
    background: #f5f7ff;
    border-bottom: none;
    margin-bottom: 0;
}

.sidebar-search-box {
    display: flex;
    align-items: center;
    background: #fff;
    border: 1px solid #dce0f0;
    border-radius: 25px;
    padding: 7px 14px;
    gap: 8px;
    transition: all 0.3s ease;
}

.sidebar-search-box:focus-within {
    background: #fff;
    border-color: #637dff;
    box-shadow: 0 0 0 3px rgba(99,125,255,0.1);
}

.sidebar-search-box i {
    color: #a0aac8;
    font-size: 13px;
    flex-shrink: 0;
}

.sidebar-search-box input {
    background: transparent !important;
    border: none !important;
    outline: none !important;
    color: #3d4a6b !important;
    font-size: 12px;
    width: 100%;
    font-family: 'Tajawal', 'Segoe UI', sans-serif;
}

.sidebar-search-box input::placeholder {
    color: #b0bcd8 !important;
}

/* ===== MENU ITEMS ===== */
.side-menu {
    padding: 0 0 8px 0 !important;
}

.side-item-category {
    color: #a8b5d8 !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    letter-spacing: 1.2px !important;
    text-transform: uppercase;
    padding: 6px 18px 4px !important;
    margin-top: 0;
}

/* Main menu item */
.side-menu__item {
    display: flex !important;
    align-items: center !important;
    padding: 10px 16px !important;
    border-radius: 10px !important;
    margin: 2px 10px !important;
    transition: all 0.22s ease !important;
    position: relative;
    color: #5a6a8d !important;
    text-decoration: none !important;
    gap: 10px;
}

.side-menu__item:hover {
    background: #eef1ff !important;
    color: #3d4fcc !important;
}

.side-menu__item.active,
.slide.is-expanded > .side-menu__item {
    background: linear-gradient(135deg, #eef1ff, #e6eaff) !important;
    color: #4158d0 !important;
    border-right: 3px solid #637dff !important;
}

.side-menu__icon {
    width: 20px !important;
    height: 20px !important;
    flex-shrink: 0;
    opacity: 0.75;
    transition: opacity 0.2s;
}

.side-menu__item:hover .side-menu__icon,
.side-menu__item.active .side-menu__icon {
    opacity: 1;
}

.side-menu__label {
    font-size: 13px !important;
    font-weight: 600 !important;
    flex: 1;
    font-family: 'Tajawal', 'Segoe UI', sans-serif;
}

/* Submenu items */
.slide-menu {
    background: #f5f7ff !important;
    border-radius: 8px !important;
    margin: 2px 10px 4px !important;
    padding: 4px 0 !important;
}

.slide-menu li a.slide-item {
    display: flex !important;
    align-items: center !important;
    gap: 8px;
    padding: 8px 16px 8px 20px !important;
    font-size: 12px !important;
    font-weight: 500 !important;
    color: #6e7fa8 !important;
    border-radius: 8px !important;
    margin: 1px 6px !important;
    transition: all 0.2s ease !important;
    text-decoration: none !important;
    font-family: 'Tajawal', 'Segoe UI', sans-serif;
}

.slide-menu li a.slide-item:before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #c8d0e8;
    flex-shrink: 0;
    transition: background 0.2s;
}

.slide-menu li a.slide-item:hover {
    background: #eef1ff !important;
    color: #4158d0 !important;
}

.slide-menu li a.slide-item:hover:before {
    background: #637dff;
}

/* Chevron angle */
.angle {
    font-size: 12px !important;
    opacity: 0.5;
    transition: transform 0.3s ease;
}

.is-expanded > .side-menu__item .angle {
    transform: rotate(180deg);
}

/* Badge */
.badge.side-badge {
    border-radius: 20px;
    font-size: 9px;
    padding: 2px 6px;
}

/* Scrollbar */
.main-sidemenu::-webkit-scrollbar {
    width: 4px;
}
.main-sidemenu::-webkit-scrollbar-track {
    background: transparent;
}
.main-sidemenu::-webkit-scrollbar-thumb {
    background-color: #d0d8f0;
    border-radius: 4px;
}
.main-sidemenu::-webkit-scrollbar-thumb:hover {
    background-color: #a0b0d8;
}
.main-sidemenu {
    scrollbar-width: thin;
    scrollbar-color: #d0d8f0 transparent;
}

/* Logout item */
.side-menu__item.logout-item {
    color: #e05555 !important;
}
.side-menu__item.logout-item:hover {
    background: #fff0f0 !important;
    color: #cc3333 !important;
}

/* Important badge */
.badge-warning.side-badge {
    background: linear-gradient(135deg, #f7b731, #f0a500);
    color: #1a1a1a;
    font-weight: 700;
}
</style>
 
<aside class="app-sidebar sidebar-scroll">

    {{-- ===== USER PROFILE AREA ===== --}}
    <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
          
            <div class="user-info">
                <h4 class="mt-1">{{ Auth::user()->name ?? 'Ibrahim' }}</h4>
                <span class="institute-name font-weight-bold ">
                    <strong>المعهد العالى للهندسة والتكنولوجيا بطنطا</strong>
                </span>
            </div>
        </div>
    </div>

    {{-- ===== SEARCH BOX ===== --}}
    <div class="sidebar-search-wrapper">
        <div class="sidebar-search-box">
            <i class="fas fa-search"></i>
            <input type="search" placeholder="ابحث في القائمة...">
        </div>
    </div>
    {{-- ===== MENU ITEMS ===== --}}
    <div class="main-sidemenu" style="max-height: calc(100vh - 220px); overflow-y: auto; overflow-x: hidden; margin-top: 0 !important; padding-top: 0 !important;">
        <ul class="side-menu" style="margin-top: 0 !important; padding-top: 0 !important;">

            {{-- ===== SITE SECTION ===== --}}
            <li class="side-item side-item-category   ">الموقع</li>
            {{-- Dashboard --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M13 3v6h8V3m-8 18h8V11h-8M3 21h8v-6H3m0-2h8V3H3v10z"/>
                    </svg>
                    <span class="side-menu__label">الصفحة الرئيسية</span>
                    <span class="badge badge-success side-badge"></span>
                </a>
            </li>

            {{-- Logout --}}
            <li class="slide">
                <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
                    @csrf
                    <button type="submit" class="side-menu__item logout-item w-100 border-0 bg-transparent text-right" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                        </svg>
                        <span class="side-menu__label">تسجيل الخروج</span>
                    </button>
                </form>
            </li>

            {{-- News Item --}}
            @if(\App\Helpers\PermissionHelper::hasPermission('news.read'))
            <li class="slide">
                <a class="side-menu__item" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H4V5h16v14zM6 10h12v2H6zm0-3h12v2H6zm0 6h12v2H6z"/>
                    </svg>
                    <span class="side-menu__label">أخبار</span>
                </a>
            </li>
            @endif

            {{-- Dean Speech --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ route('dean_speech.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                    </svg>
                    <span class="side-menu__label">كلمة العميد</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('dean_speech.read'))
                        <li><a class="slide-item" href="{{ route('dean_speech.index') }}">كلمة العميد</a></li>
                    @endif
                </ul>
            </li>

            {{-- News Details --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['news.read', 'slider.read', 'faqs.read', 'scholarships.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                    </svg>
                    <span class="side-menu__label">تفاصيل الأخبار</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('news.read'))
                        <li><a class="slide-item" href="{{ route('detailsNews.index') }}">صفحة تفاصيل الأخبار</a></li>
                        <li><a class="slide-item" href="{{ route('new_elements.index') }}">عناصر الأخبار</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('institutes.read'))
                        <li><a class="slide-item" href="{{ route('unit_institutes.index') }}">عن المعهد</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('departments.read'))
                        <li><a class="slide-item" href="{{ route('videos_departments.index') }}">الفيديوهات التعريفية للأقسام</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('slider.read'))
                        <li><a class="slide-item" href="{{ route('slider.index') }}">السلايدر</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('faqs.read'))
                        <li><a class="slide-item" href="{{ route('faqs.index') }}">الأسئلة الشائعة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('scholarships.read'))
                        <li><a class="slide-item" href="{{ route('scholarships.index') }}">منح دراسية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('publishing_awards.read'))
                        <li><a class="slide-item" href="{{ route('publishing_awards.index') }}">جوائز النشر</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- ===== ADMINISTRATION SECTION ===== --}}
            <li class="side-item side-item-category">الإدارة</li>

            {{-- Management --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['management.read', 'management.create', 'institutes.read', 'academic_councils.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ route('management.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                    <span class="side-menu__label">الإدارة</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('management.read'))
                        <li><a class="slide-item" href="{{ route('management.index') }}">قائمة الإدارة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('management.create'))
                        <li><a class="slide-item" href="{{ route('management.create') }}">إضافة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('institutes.read'))
                        <li><a class="slide-item" href="{{ route('institute_board_members.index') }}">مجلس إدارة المعهد</a></li>
                        <li><a class="slide-item" href="{{ route('institutes.index') }}">بيانات المعهد</a></li>
                        <li><a class="slide-item" href="{{ route('institute_mnagements.index') }}">إدارة المعهد</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('academic_councils.read'))
                        <li><a class="slide-item" href="{{ route('academic.councils.index') }}">المجلس الأكاديمي</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Administrative Settings --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['settings.read', 'units.read', 'organization_structure.read', 'management_boards.read', 'training_courses.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58c.18-.14.23-.41.12-.61l-1.92-3.32c-.12-.22-.37-.29-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94L14.4 2.81c-.04-.24-.24-.41-.48-.41h-3.84c-.24 0-.43.17-.47.41L9.25 5.35c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58c-.18.14-.23.41-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z"/>
                    </svg>
                    <span class="side-menu__label">الإعدادات الإدارية</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('settings.read'))
                        <li><a class="slide-item" href="{{ route('setting.index') }}">الإعدادات العامة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('units.read'))
                        <li><a class="slide-item" href="{{ route('unit.index') }}">المراكز والوحدات</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('organization_structure.read'))
                        <li><a class="slide-item" href="{{ route('organization-structure.index') }}">الهيكل التنظيمي</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('unit_objectives.read'))
                        <li><a class="slide-item" href="{{ route('unit-objectives.index') }}">أهداف الوحدات</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('management_boards.read'))
                        <li><a class="slide-item" href="{{ route('management-boards.index') }}">مجلس الإدارة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('internal_permanencies.read'))
                        <li><a class="slide-item" href="{{ route('internal-permanencies.index') }}">اللائحة الداخلية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('deputy_directors.read'))
                        <li><a class="slide-item" href="{{ route('deputy-directors.index') }}">مدير ونائب الوحدة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('training_courses.read'))
                        <li><a class="slide-item" href="{{ route('training-courses.index') }}">الدورات التدريبية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('important_files.read'))
                        <li><a class="slide-item" href="{{ route('important-files.index') }}">الملفات المهمة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('lectures_decisions.read'))
                        <li><a class="slide-item" href="{{ route('lectures-decisions.index') }}">محاضرات وقرارات</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Site Management --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['articles.read', 'articles.create', 'departments.read', 'student_opinions.read', 'library_opinions.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                    </svg>
                    <span class="side-menu__label">إدارة الموقع</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('departments.read'))
                        <li><a class="slide-item" href="{{ route('departments.index') }}">البرامج التعليمية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('student_opinions.read'))
                        <li><a class="slide-item" href="{{ route('studentOpinions.index') }}">آراء الطلاب</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('library_opinions.read'))
                        <li><a class="slide-item" href="{{ route('libraryOpinions.index') }}">صورة المكتبة وآراء الطلاب</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('articles.read'))
                        <li><a class="slide-item" href="{{ route('articles.index') }}">المقالات والمشاركات</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- ===== GENERAL SETTINGS SECTION ===== --}}
            <li class="side-item side-item-category">الإعدادات العامة</li>

            {{-- General Settings --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['faculty.read', 'office_students.read', 'masteris_doctoral_theses.read', 'featured_work.read', 'activities.read', 'department_heads.read', 'department_plans.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/>
                    </svg>
                    <span class="side-menu__label">الإعدادات العامة</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('faculty.read'))
                        <li><a class="slide-item" href="{{ route('facultyMembers.index') }}">إضافة عضو هيئة تدريس</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('office_students.read'))
                        <li><a class="slide-item" href="{{ route('office_students.index') }}">إضافة طالب مكتبة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('masteris_doctoral_theses.read'))
                        <li><a class="slide-item" href="{{ route('masterisDoctoralTheses.index') }}">رسائل الدكتوراه والماجستير</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('featured_work.read'))
                        <li><a class="slide-item" href="{{ route('featured_work.index') }}">أنشطة طلابية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('activities.read'))
                        <li><a class="slide-item" href="{{ route('activities.index') }}">الأنشطة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('department_heads.read'))
                        <li><a class="slide-item" href="{{ route('department_heads.index') }}">رؤساء الأقسام</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('department_plans.read'))
                        <li><a class="slide-item" href="{{ route('department_plans.index') }}">خطط الأقسام</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Institution Settings --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['academic_years.read', 'category_management.read', 'research_projects.read', 'institute_requirements.read', 'program_requirements.read', 'roles.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <span class="side-menu__label">إعدادات المؤسسة</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('academic_years.read'))
                        <li><a class="slide-item" href="{{ route('academic_years.index') }}">السنوات الدراسية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('category_management.read'))
                        <li><a class="slide-item" href="{{ route('category_management.index') }}">بيانات الإدارة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('research_projects.read'))
                        <li><a class="slide-item" href="{{ route('research_projects.index') }}">المشاريع البحثية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('institute_requirements.read'))
                        <li><a class="slide-item" href="{{ route('institute_requirements.index') }}">متطلبات المعهد للبرامج</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('program_requirements.read'))
                        <li><a class="slide-item" href="{{ route('program_requirements.index') }}">متطلبات البرنامج</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('roles.read'))
                        <li><a class="slide-item" href="{{ route('roles.index') }}">🔐 إدارة الصلاحيات</a></li>
                        <li><a class="slide-item" href="{{ route('permissions.index') }}">🛡️ الصلاحيات الفرعية</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Quality Settings --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['quality_form.read', 'quality_item.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                    </svg>
                    <span class="side-menu__label">إعدادات الجودة</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('quality_form.read'))
                        <li><a class="slide-item" href="{{ route('quality_form.index') }}">إضافة نموذج جودة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('quality_item.read'))
                        <li><a class="slide-item" href="{{ route('quality_item.index') }}">إدارة العناصر</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Important Links --}}
            @if(\App\Helpers\PermissionHelper::hasPermission('important_links.read'))
            <li class="slide">
                <a class="side-menu__item" href="{{ route('important_link.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
                    </svg>
                    <span class="side-menu__label">روابط مهمة</span>
                    <span class="badge badge-warning side-badge">هام</span>
                </a>
            </li>
            @endif

            {{-- FAQs & Labs --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['faq_categories.read', 'faq_asked_questions.read', 'labs.read', 'scientific_trips.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z"/>
                    </svg>
                    <span class="side-menu__label">الأسئلة والمعامل</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('faq_categories.read'))
                        <li><a class="slide-item" href="{{ route('faqCategories.index') }}">أقسام الأسئلة الشائعة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('faq_asked_questions.read'))
                        <li><a class="slide-item" href="{{ route('faqAskedQuestions.index') }}">الأسئلة الشائعة</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('labs.read'))
                        <li><a class="slide-item" href="{{ route('labs.index') }}">المعامل</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('scientific_trips.read'))
                        <li><a class="slide-item" href="{{ route('scientific_trips.index') }}">الرحلات العلمية</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Student Education --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['student_projects.read', 'student_projects.create', 'student_results.read', 'schedules.read', 'study_materials.read', 'military_education.read', 'student_rights.read']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                    </svg>
                    <span class="side-menu__label">تعليم الطلاب</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('student_projects.read'))
                        <li><a class="slide-item" href="{{ route('studentProjects.index') }}">المشاريع الطلابية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('class_trainings.read'))
                        <li><a class="slide-item" href="{{ route('classTrainings.index') }}">التدريب الصيفي</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('schedules.read'))
                        <li><a class="slide-item" href="{{ route('schedules.index') }}">الجداول الدراسية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('study_materials.read'))
                        <li><a class="slide-item" href="{{ route('study_materials.index') }}">المواد الدراسية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('student_results.read'))
                        <li><a class="slide-item" href="{{ route('student-results.index') }}">نتائج الطلاب</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('military_education.read'))
                        <li><a class="slide-item" href="{{ route('military-education.index') }}">التربية العسكرية</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('student_rights.read'))
                        <li><a class="slide-item" href="{{ route('student-rights.index') }}">حقوق الطلاب</a></li>
                    @endif
                </ul>
            </li>
            @endif

            {{-- Library --}}
            @if(\App\Helpers\PermissionHelper::hasAnyPermission(['authors.read', 'authors.create', 'publishings.read', 'publishings.create']))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6c-.6-.45-1.25-.75-2-1z"/>
                    </svg>
                    <span class="side-menu__label">المكتبة</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    @if(\App\Helpers\PermissionHelper::hasPermission('authors.read'))
                        <li><a class="slide-item" href="{{ route('authors.index') }}">المؤلفون</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('publishings.read'))
                        <li><a class="slide-item" href="{{ route('publishings.index') }}">دور النشر</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('excel.upload.form'))
                        <li><a class="slide-item" href="{{ route('excel.upload.form') }}">استيراد كتب من Excel</a></li>
                    @endif
                    @if(\App\Helpers\PermissionHelper::hasPermission('excel.data'))
                        <li><a class="slide-item" href="{{ route('excel.data') }}">البيانات</a></li>
                    @endif
                </ul>
            </li>
            @endif

            <br><br>
        </ul>
        <br><br>
    </div>
</aside>
<!-- main-sidebar -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.sidebar-search-box input');
    if (!searchInput) return;

    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase().trim();
        const slideItems = document.querySelectorAll('.side-menu > .slide');
        const categoryLabels = document.querySelectorAll('.side-item-category');

        if (searchTerm === '') {
            // Reset everything when search is empty
            categoryLabels.forEach(el => el.style.removeProperty('display'));
            slideItems.forEach(slide => {
                slide.style.removeProperty('display');
                const subItemsHolder = slide.querySelector('.slide-menu');
                if (subItemsHolder) {
                    subItemsHolder.style.removeProperty('display');
                    const subItems = subItemsHolder.querySelectorAll('li');
                    subItems.forEach(sub => sub.style.removeProperty('display'));
                }
            });
            return;
        }

        // Hide categories during search to keep it clean
        categoryLabels.forEach(el => el.style.setProperty('display', 'none', 'important'));

        slideItems.forEach(slide => {
            const mainLabel = slide.querySelector('.side-menu__label');
            const mainText = mainLabel ? mainLabel.textContent.toLowerCase() : '';
            
            let showSlide = false;
            let forceExpand = false;

            const subItemsHolder = slide.querySelector('.slide-menu');
            if (subItemsHolder) {
                const subItems = subItemsHolder.querySelectorAll('li');
                let anySubMatch = false;

                subItems.forEach(subItem => {
                    const subText = subItem.textContent.toLowerCase();
                    if (subText.includes(searchTerm)) {
                        subItem.style.removeProperty('display');
                        anySubMatch = true;
                        showSlide = true;
                    } else {
                        subItem.style.setProperty('display', 'none', 'important');
                    }
                });

                if (anySubMatch) {
                    forceExpand = true;
                } else if (mainText.includes(searchTerm)) {
                    showSlide = true;
                    subItems.forEach(sub => sub.style.removeProperty('display'));
                }
            } else {
                if (mainText.includes(searchTerm)) {
                    showSlide = true;
                }
            }

            if (showSlide) {
                slide.style.removeProperty('display');
                if (forceExpand && subItemsHolder) {
                    slide.classList.add('is-expanded');
                    subItemsHolder.style.setProperty('display', 'block', 'important');
                }
            } else {
                slide.style.setProperty('display', 'none', 'important');
                if (subItemsHolder) {
                    subItemsHolder.style.removeProperty('display');
                }
            }
        });
    });
});
</script>