<x-app-layout>
    <x-slot name="header">


        <h2 class="font-semibold text-xl inline-block text-gray-800 leading-tight">
            {{ Auth::user()->name }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class="flex mb-5 " aria-label="Breadcrumb">
                <ol role="list" class="bg-white rounded-md shadow px-6 flex space-x-4">
                <li class="flex">
                <div class="flex items-center">
                <a href="{{route('reward.index')}}" class="text-gray-400 hover:text-gray-500">
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
                
                    <a href="" class="ml-4 text-sm font-medium text-blue-500 hover:text-blue-600" >
                        Shopping Cart
                    </a>
        
                    @elseif(Auth::user()->role == 1)
                    <a href="" class="ml-4 text-sm font-medium text-blue-500 hover:text-blue-600" >
                      Shopping Cart

                  </a>
        
                    @endif
                  </div>
                  </li>
              
    
          
                </ol>
               </nav>
            <section class="bg-gray-50 relative w-full h-64 rounded-md"
                     style="background-image: url('https://fotografika.rama-adi.dev/assets/img/19052022-header-photo.jpeg'); background-size: cover; background-position: center">
                <div class="h-full w-full absolute bg-gray-900 opacity-80 top-0 left-0 rounded-md"></div>
                <div class="h-full w-full absolute top-0 left-0 p-8 flex flex-col justify-end">
                    <h1 class="text-gray-100 text-4xl font-bold">Check your reward transaction</h1>
                    <p class="text-gray-100">@if(Auth::user()->role == 2)
                        You have some rewards waiting for you
                        @elseif(Auth::user()->role == 1)
                            Add rewards for your student to encourage learning!
                        @endif</p>
                </div>
            </section>
            

           
            {{-- <button id="myBtn"  class=" mb-5 bg-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">Add Class</button>  --}}


            <div class="flex flex-col mt-5">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class=" bg-gradient-to-l from-startorange to-darkorange">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Reward Image</th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Reward Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                            @if(Auth::user()->role == 1)
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Academic</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Student Name</th>

                            @endif
                            
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Cancel</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Odd row -->
                          @if(Auth::user()->role == 2)
                          @foreach(Auth::user()->RewardTransaction as $reward)
                          <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reward->reward->reward}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$reward->reward->price}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">@if($reward->status_id == 0)On Progress @else Done @endif</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              <form method="POST" name="delete{{$reward->id}}" action="{{route('transaction.destroy',$reward->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="point" value="{{$reward->reward->price}}">
                                <input type="hidden" name="student" value="{{auth::user()->id}}">
                                <input type="hidden" name="id" value="{{$reward->id}}">
                                <input type="submit" href="" class="text-indigo-600 hover:text-indigo-900" value="Cancel">
                              </form>
                            </td>
                          </tr>
                          @endforeach
                          @endif
                          @if(Auth::user()->role == 1)
                          @foreach($transactionList as $reward)
                          <tr class="@if($loop->even)bg-white @else bg-gray-100 @endif">
                            <td><img class="h-15 w-15" src="{{$reward->reward->img}}"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$reward->reward->reward}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$reward->reward->price}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">@if($reward->status_id == 0)On Progress @else Done @endif</td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$reward->student->StudentDetail->school->school}}</td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$reward->student->name}}</td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              Confirm
                            </td>
                          </tr>
                          @endforeach
                          @endif
              
                       
              
                          <!-- More people... -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        
        </body>
    </div>

</x-app-layout>


<div id="myModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" style="display: none"
     role="dialog" aria-modal="true">
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
        <div id=""
             class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path
                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add rewardList</h3>
                        <div class="mt-2">
                            <div class="bg-white sm:rounded-lg ">
                                <div class="">
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <form action="{{route('reward.store')}}" method="POST">
                                            @csrf
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for="first-name"
                                                           class="block text-sm font-medium text-gray-700">Reward
                                                        Name</label>
                                                    <input type="text" name="reward" id="first-name"
                                                           autocomplete="given-name"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for="last-name"
                                                           class="block text-sm font-medium text-gray-700">Price</label>
                                                    <input type="number" name="price" id="last-name"
                                                           autocomplete="family-name"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for="email-address"
                                                           class="block text-sm font-medium text-gray-700">Stock</label>
                                                    <input type="number" name="stock" id="email-address"
                                                           
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="first-name"
                                                           class="block text-sm font-medium text-gray-700">Image
                                                        Link</label>
                                                    <input type="text" name="img" id="first-name"
                                                           autocomplete="given-name"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
                <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Add
                </button>
                </form>

                <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm close">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");


    // Get the button that opens the modal
    var addBtn = document.getElementById("myBtn");
    var editBtn = document.getElementById("editBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    addBtn.onclick = function () {
        modal.style.display = "block";

    }


    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
