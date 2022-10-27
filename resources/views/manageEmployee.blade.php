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


    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{route('employee.store')}}" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200">
                    <div class="p-10 bg-white rounded-xl">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Login Details</h3>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Password</label>
                            <div class="mt-1">
                                <input type="text" name="password" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <h3 class="text-lg mt-2 leading-6 font-medium text-gray-900">Employee Details</h3>
                        <div>
                            @csrf
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Position</label>
                            <div class="mt-1">
                                <select name="position" id="email"
                                        class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @foreach($positionList as $position)
                                        <option value="{{$position->id}}">{{$position->position}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Gender</label>
                            <div class="mt-1">
                                <select name="gender" id="email"
                                        class="p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option>Male</option>
                                    <option>Female</option>

                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">NIK</label>
                            <div class="mt-1">
                                <input type="text" name="NIK" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Phone</label>
                            <div class="mt-1">
                                <input type="text" name="Phone" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">City</label>
                            <div class="mt-1">
                                <input type="text" name="city" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Province</label>
                            <div class="mt-1">
                                <input type="text" name="province" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mt-2 text-gray-700">Education</label>
                            <div class="mt-1">
                                <input type="text" name="education" id="email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            </div>
                        </div>

                        </fieldset>
                        <button type="submit"
                                class=" mb-5 bg-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 mt-5 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">
                            Add Employee
                        </button>
            </form>

        </div>
    </div>
    </div>
    </div>
    </div>

</x-app-layout>


