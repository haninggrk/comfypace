<x-app-layout>
    <x-slot name="header">
      <a href="{{url()->previous()}}"> <button type="button" class="inline-block mr-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</button></a>

        <h2 class="font-semibold text-xl inline-block text-gray-800 leading-tight">
            {{ $class->classname }}
        </h2>
    </x-slot>
    
        
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Point Earned</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>

                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @if(auth()->user()->role==2)
              
                      @foreach($class->course->projects as $project)
                      @if($project->milestones->first() != null)
                      @if(auth()->user()->progresses->where('milestone_id','=',$project->milestones->first()->id)->first() != null)
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
             
                   
                      
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex py-2 text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-600"> {{Auth::user()->project->where('project_id','=',$project->id)->first()->status->status ?? "N/A"}} </span>
                        </td>
                      
                        <td class="px-6 py-4 whitespace-nowrap">
                         
                          <div class="text-sm text-gray-900">{{array_sum(collect($project->milestones->whereIn('id',(Auth::user()->progresses->pluck('milestone_id')->toArray())))->pluck('point')->toArray())}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
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
             
                   
                      
                       
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex py-2 text-lg leading-5 font-semibold rounded-full bg-green-100 text-green-600"> Done </span>
                        </td>
                       
                      
             
                      
                        <td class="px-6 py-4 whitespace-nowrap">
                         
                          <div class="text-sm text-gray-900">{{array_sum(collect($project->milestones->whereIn('id',(Auth::user()->progresses->pluck('milestone_id')->toArray())))->pluck('point')->toArray())}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                         
                         <a href="{{route('project.show',$project->id)}}?class={{$class->id}}"> <div class="text-sm text-blue-700">Open Project</div></a>
                        </td>
                      
                      </tr>
                      @endforeach
                      @endif
                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
                  @if(Auth()->user()->role == 1)
                  <h3 class="mt-5">Registered Student</h3>
                  <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
			<thead class="text-white">
				<tr class="bg-blue-600 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
					<th class="p-3 text-left">Name</th>
					<th class="p-3 text-left">School</th>
                    <th class="p-3 text-left">Add Point</th>
					<th class="p-3 text-left" width="110px">Actions</th>
				</tr>
				<tr class="bg-blue-600 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left">Name</th>
					<th class="p-3 text-left">School</th>
                    <th class="p-3 text-left">Add Point</th>
					<th class="p-3 text-left" width="110px">Actions</th>
				</tr>
                <tr class="bg-blue-600 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left">Name</th>
					<th class="p-3 text-left">School</th>
                    <th class="p-3 text-left">Add Point</th>
                  <th class="p-3 text-left" width="110px">Actions</th>
              </tr>
                <tr class="bg-blue-600 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left">Name</th>
					<th class="p-3 text-left">School</th>
                    <th class="p-3 text-left">Add Point</th>
                  <th class="p-3 text-left" width="110px">Actions</th>
              </tr>
			</thead>
			<tbody class="flex-1 sm:flex-none">
                
        @foreach($registeredStudent as $student)
        
				<tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
					<td class="border-grey-light border hover:bg-gray-100 p-3">{{$student->name}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$student->studentDetail->school->school}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
          <form action="{{route('point.store')}}" method="POST">
              @csrf
            <input type="hidden" name="student_id" value="{{$student->id}}">
            <div class="mb-1">
              Point: 
            <input type="number" name="point">
</div><div>
  Note: 
            <input type="text" name="note"></div>
            <button type="submit" class="mb-5 inline-block bg-indigo-500 mt-2 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">Add</button> 
          </form>
          </td>
          
         
          
					<td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">              
            <form action="{{route('classmember.destroy2')}}" method="POST">
              @csrf
            <input type="hidden" name="student_id" value="{{$student->id}}">
            <input type="hidden" name="class_id" value="{{$class->id}}">
            <button type="submit" class=" mb-5 bg-indigo-500 mt-2 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">Remove</button> 
          </form>
          </td>
        </tr>
    

        @endforeach
			</tbody>
		</table>
   
                  <div class="col-span-6 sm:col-span-2">
                    <form action="{{route('classmember.store')}}" method="POST">
                    @CSRF
                    <input type="hidden" name="class_id" value="{{$class->id}}">
                    <label for="country" class="block text-sm font-medium text-gray-700 mt-4">Register Student to {{$class->classname}}</label>
                
                    <select id="country" name="student_id" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($studentList as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                    </select>
                    <button type="submit" class=" mb-5 bg-indigo-500 mt-2 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">Add Student</button> 
                  </div>
                </form>
                @endif
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