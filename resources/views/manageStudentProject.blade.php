<x-app-layout>


    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul role="list"
                class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                @if($studentProjects)
                @foreach ($studentProjects as $project)
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
                                        class=" break-all  block text-md sm:text-sm md:text-xl font-medium text-orange-500 truncate pointer-events-none">
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
    </div>
    </div>
    </div>
    </div>

</x-app-layout>
