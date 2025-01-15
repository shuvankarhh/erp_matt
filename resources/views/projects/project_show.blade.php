@extends('layouts.vertical', ['title' => 'File Manager', 'sub_title' => 'Apps', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
<style>
.active {
    background-color: rgb(45, 240, 185) !important; /* To override Tailwind if needed */
    color: rgb(95, 95, 95) !important; /* Ensure the text color matches your requirement */
}
</style>
<div class="flex">
	<div id="default-offcanvas" class="lg:block hidden top-0 left-0 transform h-full min-w-[16rem] me-6 card rounded-none lg:rounded-md fc-offcanvas-open:translate-x-0 lg:z-0 z-50 fixed lg:static lg:translate-x-0 -translate-x-full transition-all duration-300" tabindex="-1">
		<div class="p-5">
			<div class="relative">
				<a href="javascript:void(0)" data-fc-type="dropdown" data-fc-placement="bottom" type="button" class="btn inline-flex justify-center items-center bg-primary text-white w-full">
					Menu 
				</a>
			</div>
			<div class="space-y-2 mt-4 ">

				<a href="javascript:void(0);" onclick="changeMenu('overview')" class="flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 active" id="overview">
					<i data-feather="home" class="me-3.5 w-4"></i>
					<span>Overview</span>
				</a>

				<a href="javascript:void(0);" onclick="changeMenu('estimate')" class="flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" id="estimate">
					<i data-feather="file-text" class="me-3.5 w-4"></i>
					<span>Estimate</span>
				</a>

				<a href="javascript:void(0);" onclick="changeMenu('onsiteWorks')" class="flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" id="onsiteWorks">
					<i data-feather="download" class="me-3.5 w-4"></i>
					<span>Onsite Works</span>
				</a>

				<a href="javascript:void(0);" onclick="changeMenu('weather')"  class="flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" id="weather">
					<i data-feather="music" class="me-3.5 w-4"></i>
					<span>Weather</span>
				</a>

				<a href="javascript:void(0);" onclick="changeMenu('media')"  class="flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" id="media">
					<i data-feather="image" class="me-3.5 w-4"></i>
					<span>Media</span>
				</a>

				<a href="javascript:void(0);" onclick="changeMenu('notes')"  class="flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" id="notes">
					<i data-feather="video" class="me-3.5 w-4"></i>
					<span>Notes</span>
				</a>

				<a href="javascript:void(0);" onclick="changeMenu('timeline')"  class="flex items-center py-2 px-4 text-sm rounded text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" id="timeline">
					<i data-feather="clock" class="me-3.5 w-4"></i>
					<span>Timeline</span>
				</a>

			</div>

		</div>
	</div>

	<div class="w-full subWindow">

        <div class="overview subWindowShowPart  " id="">
            @include('projects.overview')
        </div>

        <div class="estimate subWindowShowPart hidden" id="">
            @include('projects.estimate')
        </div>
		<div class="onsiteWorks subWindowShowPart hidden" id="">
            @include('projects.onsiteWorks')
        </div>
		<div class="weather subWindowShowPart hidden" id="">
            @include('projects.weather')
        </div>
		<div class="media subWindowShowPart hidden" id="">
            @include('projects.media')
        </div>
		<div class="notes subWindowShowPart hidden" id="">
            @include('projects.notes')
        </div>
		<div class="timeline subWindowShowPart hidden" id="">
            @include('projects.timeline')
        </div>
	</div>
</div>


<script>
	
document.addEventListener('DOMContentLoaded', function () {
    var menuToggleBtn = document.querySelector('#button-toggle-menu');
    if (menuToggleBtn) {
        menuToggleBtn.click();
    }
});


function changeMenu(value){

    const allClass = document.getElementById('default-offcanvas');
    const allActiveClass = allClass.querySelector('.active');
    if (allActiveClass) {
        allActiveClass.classList.remove('active');
    }

	const classValue = value;
    const selectedClass = allClass.querySelector(`#${classValue}`);

    if (selectedClass) {
        selectedClass.classList.add('active');

		const subWindow = document.querySelector('.subWindow');

		const visibleElements = subWindow.querySelectorAll('.subWindowShowPart:not(.hidden)');
		visibleElements.forEach(element => {
			element.classList.add('hidden');
		});
		const selectedSubWindow = subWindow.querySelector(`.${classValue}`);
		if(selectedSubWindow){
			selectedSubWindow.classList.remove('hidden');
		}
    }


}


</script>
@endsection