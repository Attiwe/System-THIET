<!-- main-sidebar -->
<style>
.main-sidemenu::-webkit-scrollbar {
    width: 6px;
}
.main-sidemenu::-webkit-scrollbar-track {
    background: transparent;
}
.main-sidemenu::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 3px;
}
.main-sidemenu::-webkit-scrollbar-thumb:hover {
    background-color: #999;
}
.main-sidemenu {
    scrollbar-width: thin;
    scrollbar-color: #ccc transparent;
}
</style>
<div class="app-sidebar__overlay  " data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll  ">
	<div class="app-sidebar__user clearfix">
		<div class="dropdown user-pro-body">
			<div class="">
				<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('include/logo/logo.webp')}}">
				<span class="avatar-status profile-status bg-green"></span>
			</div>
			<div class="user-info font-weight-bold text-2xl">
				<h4 class="mt-2">{{ Auth::user()->name ?? 'Ibrahim' }}</h4>
				<span class="text-muted text-2xl font-weight-bold text-primary "> <strong class="text-primary">المعهد العالى
						للهندسة والتكنولوجيا بطنطا</strong></span>
			</div>
		</div>
	</div>
	<div class="main-sidemenu" style="max-height: calc(100vh - 200px); overflow-y: auto; overflow-x: hidden; scrollbar-width: thin; scrollbar-color: #ccc transparent;">
		<ul class="side-menu  ">
			<li class="side-item side-item-category"> الموقع </li>
			<li class="slide">
				<a class="side-menu__item" href="{{ route('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M13 3v6h8V3m-8 18h8V11h-8M3 21h8v-6H3m0-2h8V3H3v10z"/>
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl">الصفحه الرئيسيه </span><span
						class="badge badge-success side-badge"></span></a>
			</li>
			<li class="slide">
				<form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
					@csrf
					<button type="submit" class="side-menu__item w-100 text-right border-0 bg-transparent" style="cursor: pointer;">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
						</svg>
						<span class="side-menu__label h6 font-weight-bold text-2xl">تسجيل الخروج</span>
					</button>
				</form>
			</li>
			@if(\App\Helpers\PermissionHelper::hasPermission('news.read'))
			<li class="slide">
				<a class="side-menu__item" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
						viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H4V5h16v14zM6 10h12v2H6zm0-3h12v2H6zm0 6h12v2H6z"/>
					</svg><span class="side-menu__label font-weight-bold text-2xl"> اخبار </span><span class="badge  side-badge ">
					</span></a>
			</li>
			@endif
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ route('dean_speech.index')}}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
					</svg><span class="side-menu__label h6 font-weight-bold "> كلمة العميد </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('dean_speech.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('dean_speech.index') }}"> كلمة
								العميد </a></li>
					@endif
					<!-- @if(\App\Helpers\PermissionHelper::hasPermission('dean_speech.create'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('dean_speech.create') }}">
								الاضافه </a></li>
					@endif -->
				</ul>
			</li>
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['news.read', 'slider.read', 'faqs.read', 'scholarships.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
					</svg><span class="side-menu__label h6 font-weight-bold ">تفاصيل الأخبار</span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('news.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('detailsNews.index') }}"> صفحه
								تفاصيل الأخبار </a></li>
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('new_elements.index') }}"> عناصر
								الأخبار </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('institutes.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('unit_institutes.index') }}">
								عن المعهد </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('departments.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('videos_departments.index') }}">
								الفيديوهات التعريفيه  للاقسام </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('slider.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('slider.index') }}">
								السلايدر </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('faqs.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('faqs.index') }}">
								الأسئلة الشائعة </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('scholarships.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('scholarships.index') }}">
								منح دراسيه </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('publishing_awards.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('publishing_awards.index') }}">
								جوائز النشر </a></li>
					@endif
				</ul>
			</li>
			@endif
			<li class="side-item side-item-category font-weight-bold text-2xl h6"> الاداره </li>
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['management.read', 'management.create', 'institutes.read', 'academic_councils.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ route('management.index') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
					</svg><span class="side-menu__label h6 font-weight-bold "> الاداره </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('management.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('management.index') }}"> قائمه
							</a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('management.create'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('management.create') }}"> الاضافه
							</a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('institutes.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark"
								href="{{ route('institute_board_members.index') }}"> مجلس اداره المعهد
							</a></li>
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('institutes.index') }}"> بيانات
								المعهد
							</a>
						<li><a class="slide-item font-weight-bold text-2xl text-dark"
								href="{{ route('institute_mnagements.index') }}"> اداره المعهد
							</a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('academic_councils.read'))
						<a href="{{ route('academic.councils.index') }}">
							<li class="slide-item font-weight-bold text-2xl text-dark">
								مجلس الأكاديمي
							</li>
						</a>
					@endif
				</ul>
			</li>
			@endif
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['settings.read', 'units.read', 'organization_structure.read', 'management_boards.read', 'training_courses.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href=" #"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58c.18-.14.23-.41.12-.61l-1.92-3.32c-.12-.22-.37-.29-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94L14.4 2.81c-.04-.24-.24-.41-.48-.41h-3.84c-.24 0-.43.17-.47.41L9.25 5.35c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58c-.18.14-.23.41-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z"/>
					</svg><span class="side-menu__label h6 font-weight-bold "> الاعدادت الادريه </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('settings.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('setting.index') }}"> الاعدادت
								العامه </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('units.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('unit.index') }}">
								المراكز و الوحدات </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('organization_structure.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('organization-structure.index') }}">
								  الهيكل التنظيمي </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('unit_objectives.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('unit-objectives.index') }}">
								  أهداف الوحدات </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('management_boards.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('management-boards.index') }}">
								  مجلس الإدارة </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('internal_permanencies.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('internal-permanencies.index') }}">
								     اللائحه الداخليه </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('deputy_directors.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('deputy-directors.index') }}">
								     مديرونائب الوحده    </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('training_courses.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('training-courses.index') }}">
								     الدورات التدريبية    </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('important_files.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('important-files.index') }}">	الملفات المهمه   </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('lectures_decisions.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('lectures-decisions.index') }}">محاضرات وقرارات     </a></li>
					@endif
				</ul>
			</li>
			@endif
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['articles.read', 'articles.create', 'departments.read', 'student_opinions.read', 'library_opinions.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0z" fill="none" />
						<path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
					</svg><span class="side-menu__label font-weight-bold h6 "> اداره الموقع </span><i
						class="angle fe fe-chevron-down font-weight-bold h6 "></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('departments.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('departments.index') }}"> البرمج
								التعلميه </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('student_opinions.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('studentOpinions.index') }} ">
								اراء الطلاب </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('library_opinions.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('libraryOpinions.index') }}">
								صوره المكتبه واراء الطلاب </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('articles.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('articles.index') }}"> المقالات و
								المشاركات </a></li>
					@endif
				</ul>
			</li>
			@endif

			<li class="side-item side-item-category"> الاعدادت العامه </li>
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['faculty.read', 'office_students.read', 'masteris_doctoral_theses.read', 'featured_work.read', 'activities.read', 'department_heads.read', 'department_plans.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z"/>
					</svg><span class="side-menu__label h6 font-weight-bold"> الاعدادت العامه </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('faculty.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href=" {{ route('facultyMembers.index') }}">
								اضافه عضو هيئه تدريس </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('office_students.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('office_students.index') }}">
								اضافه طالب مكتبه </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('masteris_doctoral_theses.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('masterisDoctoralTheses.index') }}">
								  رسائل الدكتوراه والماجستير </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('featured_work.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('featured_work.index') }}">
								انشطه الطلابية </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('activities.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('activities.index') }}">
								الانشطه </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('department_heads.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('department_heads.index') }}">
								  رؤساء الاقسام </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('department_plans.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('department_plans.index') }}">
								خطط الأقسام </a></li>
					@endif
				</ul>
			</li>
			@endif
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['academic_years.read', 'category_management.read', 'research_projects.read', 'institute_requirements.read', 'program_requirements.read', 'roles.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
					</svg><span class="side-menu__label h6 font-weight-bold "> اعدادت المؤسسة </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('academic_years.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('academic_years.index')  }}">
								السنوات الدراسية </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('category_management.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('category_management.index') }}">
								بيانات الاداره </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('research_projects.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('research_projects.index') }}">    المشاريع البحثية </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('institute_requirements.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('institute_requirements.index') }}">    المتطلبات المعهد للبرامج </a></li>
					@endif

					@if(\App\Helpers\PermissionHelper::hasPermission('program_requirements.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('program_requirements.index') }}">    المتطلبات  البرنامج </a></li>
					@endif

					@if(\App\Helpers\PermissionHelper::hasPermission('roles.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('roles.index') }}">
								🔐 إدارة الصلاحيات </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('roles.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('permissions.index') }}">
								🛡️ الصلاحيات الفرعية </a></li>
					@endif
					 
					 
				</ul>
			</li>
			@endif
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['quality_form.read', 'quality_item.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl"> اعدادت الجوده </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('quality_form.read'))
						<li><a class="slide-item font-weight-bold text-xl text-dark" href="{{ route('quality_form.index') }}"> اضافه
								نموذج جوده </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('quality_item.read'))
						<li><a class="slide-item font-weight-bold text-xl text-dark" href="{{ route('quality_item.index') }}"> اداره
								العناصر </a></li>
					@endif
				</ul>
			</li>
			@endif
			@if(\App\Helpers\PermissionHelper::hasPermission('important_links.read'))
			<li class="slide">
				<a class="side-menu__item" href="{{ route('important_link.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl"> روابط مهمه </span><span
						class="badge badge-warning side-badge"> هام </span></a>
			</li>
			@endif
			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['faq_categories.read', 'faq_asked_questions.read', 'labs.read', 'scientific_trips.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z"/>
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl"> الاسئله </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('faq_categories.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('faqCategories.index') }}"> اقسام
								الاسئله الشائعة </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('faq_asked_questions.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('faqAskedQuestions.index') }}">
								الاسئله الشائعة </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('labs.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('labs.index') }}">    المعامل </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('scientific_trips.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('scientific_trips.index') }}">    الرحلات العلمية </a></li>
					@endif
				</ul>
			</li>
			@endif

			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['student_projects.read', 'student_projects.create', 'student_results.read', 'schedules.read', 'study_materials.read', 'military_education.read', 'student_rights.read']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" fill="currentColor">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
					</svg><span class="side-menu__label font-weight-bold h6 text-dark">التعليم الطلاب</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('student_projects.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('studentProjects.index') }}"> المشاريع الطلابية </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('class_trainings.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('classTrainings.index') }}">    التدريب الصيفي </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('schedules.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('schedules.index') }}"> الجداول  الدراسية</a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('study_materials.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('study_materials.index') }}"> المواد الدراسية </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('student_results.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('student-results.index') }}"> نتائج الطلاب </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('military_education.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('military-education.index') }}"> التربية العسكرية </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('student_rights.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('student-rights.index') }}"> حقوق الطلاب </a></li>
					@endif
				</ul>
			</li>
			@endif

			@if(\App\Helpers\PermissionHelper::hasAnyPermission(['authors.read', 'authors.create', 'publishings.read', 'publishings.create']))
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z" opacity=".3" />
						<path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
					</svg><span class="side-menu__label font-weight-bold h6 text-dark">  المكتبه </span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					@if(\App\Helpers\PermissionHelper::hasPermission('authors.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('authors.index') }}"> المؤلفين </a></li>
					@endif
					@if(\App\Helpers\PermissionHelper::hasPermission('publishings.read'))
						<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('publishings.index') }}"> دور النشر </a></li>
					@endif
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('imported-books.index') }}"> استيراد كتب من Excel </a></li>
				</ul>
			</li>
			@endif


			
			<br>
			<br>
		</ul>
		<br>
		<br>
	</div>
</aside>
<!-- main-sidebar -->