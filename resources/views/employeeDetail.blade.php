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
         <form id="editForm" method="POST" action="{{route('employee.update',$employee)}}">
          {{ method_field('PATCH') }}
          @CSRF

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
              <h3 class="text-lg leading-6 font-medium text-gray-900"><b>Edit</b> Employee Information</h3>
                    <input type="hidden" value="{{$employee->EmployeeDetail->id}}" name="id">
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and role.</p>
                    </div>
                    <div class="col-span-1 text-right ">
                      <a href="{{route('employee.show',$employee)}}">
                      <button type="button"
                      class="inline-block m-auto w-auto  items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                  Cancel
              </button>
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
                            <input type="text" value="{{$employee->EmployeeDetail->photo}}" name="photo" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block max-w-2xl sm:text-sm border-gray-300 rounded-md" >
               
                    </dd>
                  </div>
              
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Full name</dt>
                  <dd class="mt-1 text-sm text-gray-900">
                    <input type="text" value="{{$employee->name}}" name="name" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" >
</dd>
                </div>
            
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Role</dt>
                  <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->employee_position->position}}</dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Email address</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->email}}" name="email" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" >
                  </dd>
                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">NIK</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->NIK}}" name="NIK" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->phone}}" name="phone" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Birthdate</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="date" value="{{$employee->EmployeeDetail->birthdate}}" name="birthdate" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->Adress}}" name="address" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">City</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->city}}" name="city" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Province</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->province}}" name="province" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Country</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->country}}" name="country" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Education</dt>
                    <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->education}}" name="education" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  </div>
                  
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Note</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->note01}}" name="note01" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->note02}}" name="note02" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->note03}}" name="note03" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>

                </div>
                <div class="sm:col-span-1">
                  <dt class="text-sm font-medium text-gray-500">Social Media</dt>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->sosmed01}}" name="sosmed01" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->sosmed02}}" name="sosmed02" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>
                  <dd class="mt-1 text-sm text-gray-900"><input type="text" value="{{$employee->EmployeeDetail->sosmed03}}" name="sosmed03" id="email" class="shadow-sm max-w-2xl focus:ring-indigo-500 focus:border-indigo-500 block sm:text-sm border-gray-300 rounded-md" ></dd>

                </div>
                
            
              </dl>
            </div>
          </div>
          @else
         </form>
 <!-- View -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <div class="grid grid-cols-2">
            <div class="col-span-1">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Employee Information</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and role.</p>
            </div>
            <div class="col-span-1 text-right ">
              <a href="{{route('employee.show',$employee)}}?e=true">
                <button type="button"
                class="inline-block m-auto w-auto  items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Edit
        </button>
      </a>
                      </div>
        </div>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
      <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Photo</dt>
            <dd class="mt-1 text-sm text-gray-900">
                <img class="aspect-square w-48" src="{{$employee->employeeDetail->photo ?? "https://icon-library.com/images/anonymous-avatar-icon/anonymous-avatar-icon-25.jpg"}}">
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500"></dt>
            <dd class="mt-1 text-sm text-gray-900">
            </dd>
          </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Full name</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$employee->name}}</dd>
        </div>
    
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Role</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->employee_position->position}}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Email address</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$employee->email}}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">NIK</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->NIK}}</dd>
        </div>
        <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Phone</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->phone}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Birthdate</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->birthdate}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Address</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->Adress}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">City</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->city}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Province</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->province}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Coumtry</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->province}}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Education</dt>
            <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->education}}</dd>
          </div>
          
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Note</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->note01}}<br> {{$employee->EmployeeDetail->note02}}<br> {{$employee->EmployeeDetail->note03}}</dd>
        </div>
        <div class="sm:col-span-1">
          <dt class="text-sm font-medium text-gray-500">Social Media</dt>
          <dd class="mt-1 text-sm text-gray-900">{{$employee->EmployeeDetail->sosmed01}}<br> {{$employee->EmployeeDetail->sosmed02}}<br> {{$employee->EmployeeDetail->sosmed03}}</dd>
        </div>

    
      </dl>
    </div>
  </div>
  
@endif
    </div>

</x-app-layout>


