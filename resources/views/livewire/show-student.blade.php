<div>
    <div class="mb-5"><div>
        <div class="mt-1 flex rounded-md shadow-sm">
        <div class="relative flex items-stretch flex-grow focus-within:z-10">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <!-- Heroicon name: solid/users -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
        </svg>
        </div>
        <input wire:model="search" type="text"  class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300" placeholder="Search">
        </div>
        <button type="button" wire:click="" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
        <!-- Heroicon name: solid/sort-ascending -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        
        </button>
        </div>
       </div></div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class=" bg-gradient-to-l from-startorange to-darkorange">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    School
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Email
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs  font-medium text-white uppercase tracking-wider">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $student)
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $student->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $student->studentDetail->school->school }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm ">
                       <a href="{{route('students.show',$student->id)}}" class=" text-blue-700"> See Detail</a> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-5">
        {{ $studentList->links() }}
    </div>

</div>
