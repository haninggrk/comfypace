<x-app-layout>
    <x-slot name="header">
        <a href="{{url()->previous()}}">
            <button type="button"
                    class="inline-block mr-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </button>
        </a>

        <h2 class="font-semibold inline-block text-xl text-gray-800 leading-tight">
            {{ __('Manage Employee') }}
        </h2>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto">
         <!-- If Edit -->
         @if(request()->e)
         <form id="editForm" method="POST" action="{{route('students.update',$student)}}">
          {{ method_field('PATCH') }}
          @CSRF

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 bg-gradient-to-l from-startorange to-darkorange">
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
              <h3 class="text-lg leading-6 font-medium text-white"><b>Edit</b> Student Information</h3>
                    <input type="hidden" value="{{$student->StudentDetail->id}}" name="id">
              <p class="mt-1 max-w-2xl text-sm text-gray-50">Personal details and project.</p>
                    </div>
                    <div class="col-span-1 text-right ">
                      <a href="{{route('students.show',$student)}}">
                      <x-jet-button type="button"
                      class="">
                  Cancel
                      </x-jet-button>
            </a>
                        <input type="submit" form="editForm" value="Save"
                        class="inline-block m-auto w-auto  items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                 
              
                              </div>
                </div>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
              <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Photo URL</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                            <input type="text" value="{{$student->StudentDetail->photo}}" name="photo" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block max-w-2xl sm:text-sm border-gray-300 rounded-md" >
               
                    </dd>
                  </div>
              
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Full name</dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    <input type="text" value="{{$student->name}}" name="name" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" >
</dd>
                </div>
            
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Role</dt>
                  <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->employee_position}}</dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Email address</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->email}}" name="email" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" >
                  </dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">NIK</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->NIK}}" name="NIK" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->phone}}" name="phone" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Birthdate</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="date" value="{{$student->StudentDetail->birthdate}}" name="birthdate" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->Adress}}" name="address" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">City</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->city}}" name="city" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Province</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->province}}" name="province" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Country</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->country}}" name="country" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Education</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->education}}" name="education" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Note</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->note01}}" name="note01" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->note02}}" name="note02" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->note03}}" name="note03" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>

                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Social Media</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->sosmed01}}" name="sosmed01" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->sosmed02}}" name="sosmed02" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$student->StudentDetail->sosmed03}}" name="sosmed03" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>

                </div>
                
            
              </dl>
            </div>
          </div>
          @else
         </form>
 <!-- View -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 bg-gradient-to-l from-startorange to-darkorange">
        <div class="grid grid-cols-2">
            <div class="col-span-1">
      <h3 class="text-lg leading-6 font-medium text-white">Student Information</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-50">Personal details and project.</p>
            </div>
            <div class="col-span-1 text-right ">
              <a href="{{route('students.show',$student)}}?e=true">
                <x-jet-button type="button"
                class="">
            Edit
                </x-jet-button>
      </a>
                      </div>
        </div>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
      <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Photo</dt>
            <dd class="mt-1 text-sm text-gray-900">
                <img class="aspect-square w-48" src="{{$student->StudentDetail->photo ?? "https://icon-library.com/images/anonymous-avatar-icon/anonymous-avatar-icon-25.jpg"}}">
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500"></dt>
            <dd class="mt-1 text-sm text-gray-900">
            </dd>
          </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Full name</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$student->name}}</dd>
        </div>
    

        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Email address</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$student->email}}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">NIK</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->NIK}}</dd>
        </div>
        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Phone</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->phone}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Birthdate</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->birthdate}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Address</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->Adress}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">City</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->city}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Province</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->province}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Coumtry</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->province}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Education</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->education}}</dd>
          </div>
          
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Note</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->note01}}<br> {{$student->StudentDetail->note02}}<br> {{$student->StudentDetail->note03}}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Social Media</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$student->StudentDetail->sosmed01}}<br> {{$student->StudentDetail->sosmed02}}<br> {{$student->StudentDetail->sosmed03}}</dd>
        </div>

    
      </dl>
    </div>
  </div>
  
@endif
<h3 class="text-3xl mt-20">{{$student->name}}'s Project</h3>
<ul role="list"
class="grid mt-5 grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
@if($student->projects->first())
@foreach ($student->projects as $project)
    <li class="relative">
        <div class="bg-white p-4 rounded-md shadow-md">
  
            <a class="hover:opacity-75 " href="{{ route('submission.show', $project->id) }}">

                <div
                    class="group block w-full aspect-video rounded-lg bg-gray-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="https://www.westfield.ma.edu/PersonalPages/draker/edcom/final/sp20/sectionb/A/scratch.png" alt="" class=" object-fill pointer-events-none ">
                </div>
            </a>

            <div class="grid grid-cols-2 items-center mt-2  max-w-full">
                <div class="break-all col-span-2 min-w-0">
                    <p
                        class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-blue-500 truncate pointer-events-none">
                        {{ $project->submission_title }}</p>
                    <p class="block text-sm font-medium text-gray-800 pointer-events-none">
                        {{ $project->student->name }}</p>
                </div>

            </div>
        </div>
    </li>
  
@endforeach
@else
<h3 class="">No Project Found</h3>
@endif

<!-- More files... -->
</ul>

    </div>

</x-app-layout>


