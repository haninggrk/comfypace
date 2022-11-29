<x-app-layout>



    @php
        $items = ['https://i0.wp.com/calmatters.org/wp-content/uploads/2021/08/class-size.jpg?fit=2266%2C1322&ssl=1', 'https://s3-ap-south-1.amazonaws.com/blogmindler/bloglive/wp-content/uploads/2022/03/29171405/blog-4-770x385.png', 'https://media.istockphoto.com/vectors/classroom-nobody-school-classroom-interior-with-teachers-desk-and-vector-id1130490883?k=20&m=1130490883&s=612x612&w=0&h=l_ZzLt51AARql4IhXhyjwNf_svNTxsnkRxpt6OOmerY='];
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class="flex mb-5 " aria-label="Breadcrumb">
                <ol role="list" class="bg-white rounded-md shadow px-6 flex space-x-4">
                    <li class="flex">
                        <div class="flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-600">
                                <!-- Heroicon name: solid/home -->
                                <svg class="flex-shrink-0 py-3 w-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">Home</span>
                            </a>
                        </div>
                    </li>




                </ol>
            </nav>
            <h3 class="text-3xl mb-5">Select Class</h3>
            {{-- <button id="myBtn"  class=" mb-5 bg-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center ju  ify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">Add Class</button>  --}}
            <ul role="list"
                class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @if (Auth::user()->role == 2)
                    @foreach ($classList as $classMember)
                        <li class="relative">
                            <div class="bg-white p-4 rounded-md shadow-md">
                                @php
                                    $random = $items[fmod(4, 3)];
                                @endphp
                                <div
                                    class="group block w-full aspect-video rounded-lg bg-gray-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                                    <a class="hover:opacity-75 "
                                        href="{{ route('classes.show', $classMember->class->id) }}">
                                        <img src="{{ $random }}" alt=""
                                            class="object-contain pointer-events-none ">
                                    </a>
                                </div>
                                <div class="grid grid-cols-2 items-center mt-2  max-w-full">
                                    <div class="break-all col-span-2 min-w-0">
                                        <p
                                            class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-blue-500 truncate pointer-events-none">
                                            {{ $classMember->class->classname }}</p>
                                        <p class="block text-sm font-medium text-gray-800 pointer-events-none">
                                            {{ $classMember->class->supervisor->name }}</p>
                                    </div>

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
                @elseif(Auth::user()->role == 1 && Auth::user()->EmployeeDetail->position_id < 3)
                    @foreach ($classList as $class)
                        <li class="relative">
                            <div class="bg-white p-4 rounded-md shadow-md">
                                @php
                                    $random = $items[fmod(4, 3)];
                                @endphp
                                <div
                                    class="group block w-full aspect-video rounded-lg bg-gray-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                                    
                                    <a class="hover:opacity-75 " href="{{ route('classes.show', $class->id) }}">
                                        <img src="{{ $random }}" alt=""
                                            class="object-contain pointer-events-none ">
                                    </a>
                                </div>
                                <div class="grid grid-cols-2 items-center mt-2  max-w-full">
                                    <div class="break-all col-span-2 min-w-0">
                                        <p
                                            class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-blue-500 truncate pointer-events-none">
                                            {{ $class->classname }}</p>
                                        <p class="block text-sm font-medium text-gray-800 pointer-events-none">
                                            {{ $class->supervisor->name }}</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    @foreach ($classList as $class)
                        <li class="relative">
                            <div class="bg-white p-4 rounded-md shadow-md">
                                <div class="text-center mb-2 text-white rounded-sm bg-blue-500"> {{ $class->course->course }}</div>
                                @php
                                    $random = $items[fmod(4, 3)];
                                @endphp
                                <div
                                    class="group block w-full aspect-video rounded-lg bg-gray-200 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                                    <a class="hover:opacity-75 " href="{{ route('classes.show', $class->id) }}">
                                        <img src="{{ $random }}" alt=""
                                            class="object-contain pointer-events-none ">
                                    </a>
                                </div>
                                <div class="grid grid-cols-2 items-center mt-2  max-w-full">
                                    <div class="break-all col-span-2 min-w-0">
                                        <p
                                            class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-blue-500 truncate pointer-events-none">
                                            {{ $class->classname }}</p>
                                        <p class="block text-sm font-medium text-gray-800 pointer-events-none">
                                            {{ $class->supervisor->name }}</p>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif


                <!-- More files... -->
            </ul>


        </div>
        </body>
    </div>

</x-app-layout>
