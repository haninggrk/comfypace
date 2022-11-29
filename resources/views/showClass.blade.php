<x-app-layout>
    <x-slot name="header">
      <a href="{{url()->previous()}}"> <button type="button" class="inline-block mr-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</button></a>

        <h2 class="font-semibold text-xl inline-block text-gray-800 leading-tight">
            {{ $class->classname }}
        </h2>
    </x-slot>
    
        
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            
                <a href="{{route('classes.show',$class->id)}}" class="ml-4 text-sm font-medium text-blue-500 hover:text-blue-600" >
                  {{$class->classname}}
                </a>
    
                @elseif(Auth::user()->role == 1)
                <a href="{{route('classes.show',$class->id)}}" class="ml-4 text-sm font-medium text-blue-500 hover:text-blue-600" >
                  {{$class->classname}}
                </a>
              </a>
    
                @endif
              </div>
              </li>
          

      
            </ol>
           </nav>
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <h3 class="text-3xl mb-5 mt-5">Project/Modul List</h3>

                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class=" bg-gradient-to-l from-startorange to-darkorange">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Modul / Project</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Progress</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Point Earned</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Action</th>

                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @if(auth()->user()->role==2)  
              
                      @foreach($class->course->projects as $project)
                      @if($project->milestones->first() != null)
                      @if(auth()->user()->progresses->where('milestone_id','=',$project->milestones->first()->id)->first() != null)
                      <tr class="
                      @if($loop->even)
                      bg-gray-50
                      @endif
                      ">
                        <td class="px-6 py-4  whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">{{$project->project_title}}</div>
                              <div class="text-sm text-gray-500">{{$project->description}}</div>
                            </div>
                          </div>
                        </td>
             
                   
                      
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                          <span class="px-2 inline-flex py-2 text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-600"> {{Auth::user()->project->where('project_id','=',$project->id)->first()->status->status ?? "N/A"}} </span>
                        </td>
                      
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                         
                          <div class="text-sm text-gray-900">{{array_sum(collect($project->milestones->whereIn('id',(Auth::user()->progresses->pluck('milestone_id')->toArray())))->pluck('point')->toArray())}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                         @if(Auth::user()->project->where('project_id','=',$project->id)->first())
                          @if(Auth::user()->project->where('project_id','=',$project->id)->first()->status->status == "Ended")
                         <span> <div class="text-sm text-gray-800">Project not avaliable</div></span>
                         @else
                         <a href="{{route('project.show',$project->id)}}"> <div class="text-sm text-blue-700">Open Project</div></a>
                         @endif
                         @else
                         <a href="{{route('project.show',$project->id)}}"> <div class="text-sm text-blue-700">Open Project</div></a>
                         @endif
                        </td>
                      
                      </tr>
                      @endif
                      @endif
                      @endforeach
                      @elseif(auth()->user()->role== 1)
                      @foreach($class->course->projects as $project)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">{{$project->project_title}}</div>
                              <div class="text-sm text-gray-500">{{$project->description}}</div>
                            </div>
                          </div>
                        </td>
             
                   
                      
                       
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                          @if($project->milestones->sortByDesc('order_number')->first()->studentProgresses != null)
                          <span class="px-2 inline-flex py-2 text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-600"> </span>
                          @else
                          <span class="px-2 inline-flex py-2 text-lg leading-5 font-semibold rounded-full bg-gray-100 text-gray-600">Not Opened</span>
                          @endif
                        </td>
                       
                      
             
                      
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                         
                          <div class="text-sm text-gray-900">{{array_sum(collect($project->milestones->whereIn('id',(Auth::user()->progresses->pluck('milestone_id')->toArray())))->pluck('point')->toArray())}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                         
                         <a href="{{route('project.show',$project->id)}}?class={{$class->id}}"> <div class="text-sm text-blue-700">Open Project</div></a>
                        </td>
                      
                      </tr>
                      @endforeach
                      @endif
                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
                 <div class="mt-5">
                  <!--
 This example requires Tailwind CSS v2.0+ 
 
 This example requires some changes to your config:
 
 ```
 // tailwind.config.js
 module.exports = {
 // ...
 plugins: [
 // ...
 require('@tailwindcss/forms'),
 ],
 }
 ```
-->
<div>
</div>
@if(Auth::user()->role==1)
<h3 class="text-3xl mb-5 mt-10">Registered Student</h3>
<div class="">
  @php($i = $class->id)
  <livewire:show-student-progress :id=$i />
  
  @if(Auth::user()->EmployeeDetail->position_id == 3)
  <div class="mt-5">
  <form method="POST" action="{{route('classmember.store')}}  ">
  <label for="location" class="block text-sm font-medium text-gray-700">Add Student</label>
  @csrf
  <input type="hidden" value="{{$class->id}}" name="class_id">
  <select id="location" name="student_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
    @foreach ($studentList as $student)
        <option value="{{$student->id}}">{{$student->name}}</option>
    @endforeach
  </select>
 </div>
 @endif
 <x-jet-button class="mt-2">
  ADD
 </x-jet-button>
</div>
@endif
 
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</body>
    </div>
    
</x-app-layout>


<style>
  html,
  body {
    height: 100%;
  }

  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
</style>