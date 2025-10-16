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
						class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl">الصفحه الرئيسيه </span><span
						class="badge badge-success side-badge"></span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
						viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M4 6h16v2H4zm0 5h16v6H4z" opacity=".3" />
						<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm0 2v12h16V6H4zm2 3h12v6H6V9zm2 2v2h8v-2H8z" />
					</svg><span class="side-menu__label font-weight-bold text-2xl"> اخبار </span><span class="badge  side-badge ">
					</span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ route('dean_speech.index')}}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3z" opacity=".3" />
						<path d="M17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2zM12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3z" />
					</svg><span class="side-menu__label h6 font-weight-bold "> كلمة العميد </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('dean_speech.index') }}"> كلمة
							العميد </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('dean_speech.create') }}">
							الاضافه </a></li>

				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M4 6h16v2H4zm0 5h16v6H4z" opacity=".3" />
						<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm0 2v12h16V6H4zm2 3h12v6H6V9zm2 2v2h8v-2H8z" />
					</svg><span class="side-menu__label h6 font-weight-bold ">تفاصيل الأخبار</span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('detailsNews.index') }}"> صفحه
							تفاصيل الأخبار </a></li>

					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('new_elements.index') }}"> عناصر
							الأخبار </a></li>

							<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('unit_institutes.index') }}">
							عن المعهد </a></li>

				 

							 

					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('slider.index') }}">
							السلايدر </a></li>

					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('faqs.index') }}">
							الأسئلة الشائعة </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('scholarships.index') }}">
							منح دراسيه </a></li>
				</ul>
			</li>
			<li class="side-item side-item-category font-weight-bold text-2xl h6"> الاداره </li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ route('management.index') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" opacity=".3" />
						<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 7c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6 5H6v-.99c.2-.72 3.3-2.01 6-2.01s5.8 1.29 6 2v1z" />
					</svg><span class="side-menu__label h6 font-weight-bold "> الاداره </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('management.index') }}"> قائمه
						</a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('management.create') }}"> الاضافه
						</a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark"
							href="{{ route('institute_board_members.index') }}"> مجلس اداره المعهد
						</a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('institutes.index') }}"> بيانات
							المعهد
						</a>
					<li><a class="slide-item font-weight-bold text-2xl text-dark"
							href="{{ route('institute_mnagements.index') }}"> اداره المعهد
						</a></li>

					<a href="{{ route('academic.councils.index') }}">
						<li class="slide-item font-weight-bold text-2xl text-dark">
							مجلس الأكاديمي
						</li>
					</a>
						 
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href=" #"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" opacity=".3" />
						<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2zm0 3.08L9.58 9.4 7 9.27l2.5 2.44-.59 3.44L12 13.42l3.09 1.73-.59-3.44L17 9.27l-2.58.13L12 5.08z" />
					</svg><span class="side-menu__label h6 font-weight-bold "> الاعدادت الادريه </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('setting.index') }}"> الاعدادت
							العامه </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('unit.index') }}">
							المراكز و الوحدات </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('organization-structure.index') }}">
							  الهيكل التنظيمي </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('unit-objectives.index') }}">
							  أهداف الوحدات </a></li>
					 
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('management-boards.index') }}">
							  مجلس الإدارة </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('internal-permanencies.index') }}">
							     اللائحه الداخليه </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('deputy-directors.index') }}">
							     مديرونائب الوحده    </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('training-courses.index') }}">
							     الدورات التدريبية    </a></li>
					 <li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('important-files.index') }}">	الملفات المهمه   </a></li>	
					 <li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('lectures-decisions.index') }}">محاضرات وقرارات     </a></li>	

				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0z" fill="none" />
						<path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm0 2.84L18 11h-3v8h-2v-6H9v6H7v-8H4l8-5.16z" opacity=".3" />
						<path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm0 2.84L18 11h-3v8h-2v-6H9v6H7v-8H4l8-5.16z" />
					</svg><span class="side-menu__label font-weight-bold h6 "> اداره الموقع </span><i
						class="angle fe fe-chevron-down font-weight-bold h6 "></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('departments.index') }}"> البرمج
							التعلميه </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('studentOpinions.index') }} ">
							اراء الطلاب </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('libraryOpinions.index') }}">
							صوره المكتبه واراء الطلاب </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('articles.index') }}"> المقالات و
							المشاركات </a></li>
					 
				</ul>
			</li>

			<li class="side-item side-item-category"> الاعدادت العامه </li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z" opacity=".3" />
						<path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z" />
					</svg><span class="side-menu__label h6 font-weight-bold"> الاعدادت العامه </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href=" {{ route('facultyMembers.index') }}">
							اضافه عضو هيئه تدريس </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('office_students.index') }}">
							اضافه طالب مكتبه </a></li>

					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('masterisDoctoralTheses.index') }}">
							  رسائل الدكتوراه والماجستير </a></li>

					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('featured_work.index') }}">
							انشطه الطلابية </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('activities.index') }}">
							الانشطه </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="#">
							اضافه انشطه رعايه الشباب </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{  route('department_heads.index') }}">
							  رؤساء الاقسام </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('department_plans.index') }}">
							خطط الأقسام </a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3" />
						<path
							d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
					</svg><span class="side-menu__label h6 font-weight-bold "> اعدادت المؤسسة </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('academic_years.index')  }}">
							السنوات الدراسية </a></li>
				 
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('category_management.index') }}">
							بيانات الاداره </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('research_projects.index') }}">    المشاريع البحثية </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('institute_requirements.index') }}">    المتطلبات المعهد للبرامج </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('program_requirements.index') }}">    المتطلبات  البرنامج </a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" opacity=".3" />
						<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2zm0 3.08L9.58 9.4 7 9.27l2.5 2.44-.59 3.44L12 13.42l3.09 1.73-.59-3.44L17 9.27l-2.58.13L12 5.08z" />
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl"> اعدادت الجوده </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-xl text-dark" href="{{ route('quality_form.index') }}"> اضافه
							نموذج جوده </a></li>
					<li><a class="slide-item font-weight-bold text-xl text-dark" href="{{ route('quality_item.index') }}"> اداره
							العناصر </a></li>
				</ul>
			</li>
			<li class="slide">
				<a class="side-menu__item" href="{{ route('important_link.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
						class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M10.59 13.41c.41.39.41 1.03 0 1.42-.39.39-1.03.39-1.42 0a5.003 5.003 0 0 1 0-7.07l3.54-3.54a5.003 5.003 0 0 1 7.07 0 5.003 5.003 0 0 1 0 7.07l-1.49 1.49c.01-.82-.12-1.64-.4-2.42l.47-.48a2.982 2.982 0 0 0 0-4.24 2.982 2.982 0 0 0-4.24 0l-3.53 3.53a2.982 2.982 0 0 0 0 4.24zm2.82-4.24c.39-.39 1.03-.39 1.42 0a5.003 5.003 0 0 1 0 7.07l-3.54 3.54a5.003 5.003 0 0 1-7.07 0 5.003 5.003 0 0 1 0-7.07l1.49-1.49c-.01.82.12 1.64.4 2.42l-.47.48a2.982 2.982 0 0 0 0 4.24 2.982 2.982 0 0 0 4.24 0l3.53-3.53a2.982 2.982 0 0 0 0-4.24z" opacity=".3" />
						<path d="M10.59 13.41c.41.39.41 1.03 0 1.42-.39.39-1.03.39-1.42 0a5.003 5.003 0 0 1 0-7.07l3.54-3.54a5.003 5.003 0 0 1 7.07 0 5.003 5.003 0 0 1 0 7.07l-1.49 1.49c.01-.82-.12-1.64-.4-2.42l.47-.48a2.982 2.982 0 0 0 0-4.24 2.982 2.982 0 0 0-4.24 0l-3.53 3.53a2.982 2.982 0 0 0 0 4.24zm2.82-4.24c.39-.39 1.03-.39 1.42 0a5.003 5.003 0 0 1 0 7.07l-3.54 3.54a5.003 5.003 0 0 1-7.07 0 5.003 5.003 0 0 1 0-7.07l1.49-1.49c-.01.82.12 1.64.4 2.42l-.47.48a2.982 2.982 0 0 0 0 4.24 2.982 2.982 0 0 0 4.24 0l3.53-3.53a2.982 2.982 0 0 0 0-4.24z" />
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl"> روابط مهمه </span><span
						class="badge badge-warning side-badge"> هام </span></a>
			</li>
			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-6h2v6zm0-8h-2V7h2v4z" opacity=".3" />
						<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v4z" />
					</svg><span class="side-menu__label h6 font-weight-bold text-2xl"> الاسئله </span><i
						class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('faqCategories.index') }}"> اقسام
							الاسئله الشائعة </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('faqAskedQuestions.index') }}">
							الاسئله الشائعة </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('labs.index') }}">    المعامل </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('scientific_trips.index') }}">    الرحلات العلمية </a></li>
				</ul>
			</li>

			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z" opacity=".3" />
						<path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
					</svg><span class="side-menu__label font-weight-bold h6 text-dark">التعليم الطلاب</span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">

				<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('studentProjects.index') }}"> المشاريع الطلابية </a></li>

				 <li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('classTrainings.index') }}">    التدريب الصيفي </a></li>  

					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('schedules.index') }}"> الجداول  الدراسية</a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('study_materials.index') }}"> المواد الدراسية </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('student-results.index') }}"> نتائج الطلاب </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('military-education.index') }}"> التربية العسكرية </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('student-rights.index') }}"> حقوق الطلاب </a></li>
				 
					 
				</ul>
			</li>

			<li class="slide">
				<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page = '#') }}"><svg
						xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z" opacity=".3" />
						<path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
					</svg><span class="side-menu__label font-weight-bold h6 text-dark">  المكتبه </span><i class="angle fe fe-chevron-down"></i></a>
				<ul class="slide-menu">

				<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('authors.index') }}"> المؤلفين </a></li>
					<li><a class="slide-item font-weight-bold text-2xl text-dark" href="{{ route('publishings.index') }}"> دور النشر </a></li>
 
				</ul>
			</li>
			<br>
			<br>
		</ul>
		<br>
		<br>
	</div>
</aside>
<!-- main-sidebar -->