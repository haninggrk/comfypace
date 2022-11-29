<x-app-layout>
    <x-slot name="header">
     <a href="{{url()->previous()}}"> <button type="button" class="inline-block mr-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</button>
     </a><h2 class="font-semibold inline-block   text-xl text-gray-800 leading-tight">
            {{ __('Milestone') }}
        </h2>
    </x-slot>
    

        
    
    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
      {{-- bread --}}
      <nav class="flex mb-5 " aria-label="Breadcrumb">
        <ol role="list" class="bg-white rounded-md shadow px-6 flex space-x-4">
        <li class="flex">
        <div class="flex items-center">
        <a href="{{route('dashboard')}}" class="text-gray-400 hover:text-gray-500">
        <!-- Heroicon name: solid/home -->
        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        <span class="sr-only">Home</span>
        </a>
        </div>
        </li>
        <li class="flex">
          <div class="flex items-center">
          <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
          </svg>
            {{-- {{$project->course->course}} --}}
            {{-- {{Auth::user()->ClassMembers->where('class_id') }} --}}
            @if(Auth::user()->role == 2)
            @php
            $classRn = Auth::user()->ClassMembers->where('class_id',$milestone->project->course->classes->pluck('id')->intersect(Auth::user()->ClassMembers->pluck('class_id'))->first())->first()->class
           @endphp
            <a href="{{route('classes.show',$classRn->id)}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" >
              {{$classRn->classname}}
            </a>

            @elseif(Auth::user()->role == 1 and Auth::user()->EmployeeDetail->role->position=="Teacher")
          
            @php
            $classRn = Auth::user()->SupClasses->where('id',$milestone->project->course->classes->pluck('id')->intersect(Auth::user()
            ->SupClasses->pluck('id'))->first())->first()
           @endphp
 <a href="{{route('classes.show',$classRn->id)}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" >
  {{$classRn->classname}}
</a>
           
          </a>
          @else
          <a href="{{route('courses.show',$milestone->project->course->id)}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" >
            {{$milestone->project->course->course}}
          </a>
          @php
          $classRn = null
         @endphp
            @endif
          </div>
          </li>
      
        <li class="flex">
        <div class="flex items-center">
        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
        </svg>
        @if($classRn !=null)
        <a href="{{route('project.show',$milestone->project->id)}}?class={{$classRn->id}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$milestone->project->project_title}}</a>
        @else
        <a href="{{route('project.show',$milestone->project->id)}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$milestone->project->project_title}}</a>
        @endif
  
      </div>
        </li>
        <li class="flex">
          <div class="flex items-center">
          <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
          </svg>
          <a href="{{route('milestone.show',$milestone->id)}}" class="ml-4 text-sm font-medium text-blue-500 hover:text-blue-600">{{$milestone->milestone}}</a>
          </div>
          </li>
       
  
        </ol>
       </nav>
 {{-- bread --}}
          <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
            <div class="px-4 py-5 sm:px-6">
              <div class="flex justify-between items-center">
                <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">{{$milestone->milestone}} <span class="text-green-600">({{$milestone->point}} Point)</span></h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Resource: {{$milestone->studentmodul_url??'-'}}</p>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">{{$milestone->description ??'This milestone has no descrption' }}</p>
                </div>
                <livewire:raise-hand>

                </livewire:raise-hand>
            </div>
            </div>
         
        </div>
        <div class="video-container mt-3 overflow-hidden relative">
          <div class="absolute w-full @if(str_contains($milestone->video_url,'blockly')) z-10 top-0 bg-white @endif" style="height:60px;"></div>
          <iframe id="iframesoal"  class="video" style="" src="{{$milestone->video_url}}?modestbranding=1" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation" allowfullscreen></iframe>
          
          <div id="youtube-player"
      data-video="0s01jpQuOkM"
      data-startseconds="30"
      data-height="480"
      data-width="640">
</div>


      </div>

          
         
</body>
    </div>
    
</x-app-layout>


<div id="myModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" style="display:none" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div id="" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span id="" class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
    <div id="" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
            <!-- Heroicon name: outline/exclamation -->
            <svg  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" viewBox="0 0 20 20" fill="currentColor">
              <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add Course</h3>
            <div class="mt-2">
              <div class="bg-white sm:rounded-lg ">
                
              </div>
            
            </div>
          </div>
        </div>
      </div>
</div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Add</button>
      </form>

        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm close">Cancel</button>
      </div>
    </div>
  </div>
</div>


<style>
  .video-container {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%;
}

.video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
</style>
<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script><script>
    $("#iframesoal").contents().find("#title").remove();
</script>
