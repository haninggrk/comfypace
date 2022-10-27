<x-app-layout>
    <x-slot name="header">
      <a href="{{url()->previous()}}"> <button type="button" class="inline-block mr-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back</button></a>

        <h2 class="font-semibold text-xl inline-block text-gray-800 leading-tight">
            {{ Auth::user()->name }}
        </h2>
    </x-slot>
    
        
   @php
       $items = Array('https://i0.wp.com/calmatters.org/wp-content/uploads/2021/08/class-size.jpg?fit=2266%2C1322&ssl=1','https://s3-ap-south-1.amazonaws.com/blogmindler/bloglive/wp-content/uploads/2022/03/29171405/blog-4-770x385.png','https://news.iium.edu.my/wp-content/uploads/2022/01/blended-learning-c sifyme-1.jpg');
   @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-3xl mb-5">Select Class</h3>         
             {{-- <button id="myBtn"  class=" mb-5 bg-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">Add Class</button>  --}}
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
              @if(Auth::user()->role == 2)
                @foreach ($classList as $classMember)
                <li class="relative">
                  <div class="bg-white p-4 rounded-md shadow-md">
                  @php
                  $random = $items[fmod(4,3)];
                  @endphp
                    <div class="group block w-full aspect-video rounded-lg bg-gray-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                      <a class="hover:opacity-75 " href="{{route('classes.show',$classMember->class->id)}}">
                      <img src="{{$random}}" alt="" class="object-contain pointer-events-none ">
                      </a>
                  </div>
                  <div class="grid grid-cols-2 items-center mt-2  max-w-full">
                  <div class="break-all col-span-2 min-w-0"><p class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-orange-500 truncate pointer-events-none">{{$classMember->class->classname}}</p>
                  <p class="block text-sm font-medium text-gray-800 pointer-events-none">{{$classMember->class->supervisor->name}}</p></div>
             
                  </div>
                </div>
                </li>
                {{-- <li class="relative">
                  <a href="{{route('classes.show',$classMember->class->id)}}"><div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="https://i0.wp.com/calmatters.org/wp-content/uploads/2021/08/class-size.jpg?fit=2266%2C1322&ssl=1" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    
                    <button type="button" class="absolute inset-0 focus:outline-none">
                      <span class="sr-only"></span>
                    </button>
                  </div></a>
                  <a href=""><p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{$classMember->class->classname}}</p></a>
                  <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{$classMember->class->supervisor->name}}</p>
                </li> --}}
                @endforeach
              @elseif(Auth::user()->role == 1)
              @foreach ($classList as $class)
                <li class="relative">
                  <a href="{{route('classes.show',$class->id)}}"><div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="https://i0.wp.com/calmatters.org/wp-content/uploads/2021/08/class-size.jpg?fit=2266%2C1322&ssl=1" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                  
                    <button type="button" class="absolute inset-0 focus:outline-none">
                      <span class="sr-only"></span>
                    </button>
                  </div></a>
                  <a href=""><p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{$class->classname}}</p></a>
                  <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{$class->supervisor->name}}</p>
                </li>
                @endforeach
                @endif
                
              
                <!-- More files... -->
              </ul>
              
              
        </div>
</body>
    </div>
    
</x-app-layout>


