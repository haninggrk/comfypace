<x-app-layout>
    <x-slot name="header">
      <a href="{{url()->previous()}}"> <button type="button" class="inline-block mr-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</button></a>

        <h2 class="font-semibold text-xl inline-block text-gray-800 leading-tight">
            {{ __($course->course) }}
        </h2>
    </x-slot>


    @php
    $items = Array('https://i0.wp.com/calmatters.org/wp-content/uploads/2021/08/class-size.jpg?fit=2266%2C1322&ssl=1','https://s3-ap-south-1.amazonaws.com/blogmindler/bloglive/wp-content/uploads/2022/03/29171405/blog-4-770x385.png','https://media.istockphoto.com/vectors/classroom-nobody-school-classroom-interior-with-teachers-desk-and-vector-id1130490883?k=20&m=1130490883&s=612x612&w=0&h=l_ZzLt51AARql4IhXhyjwNf_svNTxsnkRxpt6OOmerY=');
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex items-center justify-between">
            <span class=" text-3xl font-medium mb-5" style="justify-self: start">Class List</span>
  
            <x-jet-button id="myBtn"  class="ml-5 mb-5 py-2 md:p-2 text-md md:text-md">+ Add Class</x-jet-button>
            </div>
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($classList as $class)

                {{-- <li class="relative">
                 <a href="{{route('classes.show',$class->id)}}">
                  <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="https://i0.wp.com/calmatters.org/wp-content/uploads/2021/08/class-size.jpg?fit=2266%2C1322&ssl=1" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    <button type="button" class="absolute inset-0 focus:outline-none">
                      <span class="sr-only"></span>
                    </button>
                  </div>
                </a>
                  <a href=""><p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{$class->classname}}</p></a>
                  <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{$class->supervisor->name}}</p>
                </li> --}}


                <li class="relative">
                  <div class="bg-white p-4 rounded-md shadow-md">
                  @php
                  $random = $items[fmod($class->id,3)];
                  @endphp
                    <div class="group block w-full aspect-video rounded-lg bg-gray-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                      <a class="hover:opacity-75 " href="{{route('classes.show',$class->id)}}">
                      <img src="{{$class->img ?? $random}}" alt="" class="object-contain pointer-events-none ">
                      </a>
                  </div>
                  <div class="grid grid-cols-2 items-center mt-2  max-w-full">
                  <div class="break-all col-span-2 min-w-0"><p class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-blue-500 truncate pointer-events-none">{{$class->classname}}</p>
                  <p class="block text-sm font-medium text-gray-800 pointer-events-none">{{$class->supervisor->name}}</p></div>
             
                  </div>
                </div>
                </li>

                @endforeach

                <!-- More files... -->
              </ul>
              <div class="flex items-center mt-16 justify-between">
                <span class=" text-3xl font-medium mb-5" style="justify-self: start">Modul/Project List</span>
      
                <x-jet-button id="myBtn2"  class="ml-5 mb-5 py-2 md:p-2 text-md md:text-md">+ Add Modul / Project</x-jet-button>
                </div>
              <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($projectList as $project)
                {{-- <li class="relative">
                  <a href="{{route('project.show',$project->id)}}"><div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="{{$project->image ?? "https://www.sragenkab.go.id/assets/images/image-not-available-.jpg"}}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    <button type="button" class="absolute inset-0 focus:outline-none">
                      <span class="sr-only"></span>
                    </button>
                  </div>
                  <a href=""><p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{$project->project_title}}</p></a>
                  <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{$project->description}}</p>
                </li> --}}


                <li class="relative">
                  <div class="bg-white p-4 rounded-md shadow-md">
                    <div class="group block w-full aspect-video rounded-lg bg-gray-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                      <a class="hover:opacity-75 " href="{{route('project.show',$project->id)}}">
                      <img src="{{$project->img ?? 'https://www.seekpng.com/png/detail/906-9060628_project-manager-animation.png'}}" alt="" class="object-contain pointer-events-none ">
                      </a>
                  </div>
                  <div class="grid grid-cols-2 items-center mt-2  max-w-full">
                  <div class="break-all col-span-2 min-w-0"><p class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-blue-500 truncate pointer-events-none">{{$project->project_title}}</p>
             
                  </div>
                </div>
                </li>

                @endforeach

                <!-- More files... -->
              </ul>

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
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add Class to {{$course->course}}</h3>
            <div class="mt-2">
              <div class="bg-white sm:rounded-lg ">
                <div class="">
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{route('classes.store')}}" method="POST">
                      @csrf
                      <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-6">
                          <label for="last-name" class="block text-sm font-medium text-gray-700">Class Name</label>
                          <input type="text" name="classname" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                          <label for="last-name" class="block text-sm font-medium text-gray-700">Start Date</label>
                          <input type="date" name="startdate" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                          <label for="email-address" class="block text-sm font-medium text-gray-700">End Date</label>
                          <input type="date" name="enddate" id="email-address"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                          <label for="email-address" class="block text-sm font-medium text-gray-700">Description</label>
                          <input type="text" name="description" id="email-address"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                          <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                          <input value="{{$course->course}}" readonly type="text" name="age_requirement" placeholder="Ex: 7-16 Tahun" id="email-address"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          <input value="{{$course->id}}" name="course" readonly type="hidden" name="age_requirement" placeholder="Ex: 7-16 Tahun" id="email-address"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <label for="country" class="block text-sm font-medium text-gray-700">Location</label>
                          <select id="country" name="location" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($locationList as $location )
                                <option value="{{$location->id}}">{{$location->location}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                          <label for="country" class="block text-sm font-medium text-gray-700">Supervisor</label>
                          <select id="country" name="supervisor" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($supervisorList as $supervisor )
                                <option value="{{$supervisor->user_id}}">{{$supervisor->user->name}}</option>
                            @endforeach
                          </select>

                        </div>
                        <div class="col-span-6 sm:col-span-2">
                          <label for="country" class="block text-sm font-medium text-gray-700">Class Type</label>
                          <select id="country" name="classtype" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($classtypeList as $classtype )
                                <option value="{{$classtype->id}}">{{$classtype->classtype}}</option>
                            @endforeach
                          </select>
                        </div>

                          </div>
                        </div>

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




    </div>
  </div>
</div>




<div id="myModal2" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" style="display:none" role="dialog" aria-modal="true">
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
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add Modul/Project</h3>
            <div class="mt-2">
              <div class="bg-white sm:rounded-lg ">
                <div class="">
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{route('project.store')}}" method="POST">
                      @csrf
                      <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-6">
                          <label for="last-name" class="block text-sm font-medium text-gray-700">Project Title</label>
                          <input type="text" name="projecttitle" id="last-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                          <label for="last-name" class="block text-sm font-medium text-gray-700">Description</label>
                          <input type="text" name="description" id="last-name"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                          <label for="last-name" class="block text-sm font-medium text-gray-700">Image URL</label>
                          <input type="text" name="img" id="last-name"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                          <label for="email-address" class="block text-sm font-medium text-gray-700">Teach Modul (link)</label>
                          <input type="text" name="teachmodul" id="email-address"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                          <label for="email-address" class="block text-sm font-medium text-gray-700">Example (link)</label>
                          <input type="text" name="example"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                          <label for="email-address" class="block text-sm font-medium text-gray-700">Application (link)</label>
                          <input type="text" name="application" id="email-address"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                          <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                          <input value="{{$course->course}}" readonly type="text" name="age_requirement" placeholder="Ex: 7-16 Tahun" id="email-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          <input value="{{$course->id}}" name="course" readonly type="hidden" name="age_requirement" placeholder="Ex: 7-16 Tahun" id="email-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                        </div>


                          </div>
                        </div>

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





<script>
  // Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");


// Get the button that opens the modal
var addBtn = document.getElementById("myBtn");
var addBtn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];

// When the user clicks on the button, open the modal
addBtn.onclick = function() {
  modal.style.display = "block";

}
addBtn2.onclick = function() {
  modal2.style.display = "block";

}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    modal2.style.display = "none";
  }
}

</script>
