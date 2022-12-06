<x-app-layout>
    <x-slot name="header">
        <a href="{{ url()->previous() }}">
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
        as
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gradient-to-l from-startorange to-darkorange">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-white     uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Position
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Odd row -->
                                @foreach ($employees as $employee)
                                    <tr class="">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $employee->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $employee->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $employee->EmployeeDetail->role->position }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                            <a href="{{ route('employee.show', ['employee' => $employee]) }}"
                                                class="text-blue-500 hover:text-blue-900">Show</a> / <a
                                                href="{{ route('employee.show', ['employee' => $employee]) }}?e=true"
                                                class="text-pink-500 hover:text-pink-900"> Edit</a>
                                        </td>

                                    </tr>
                                @endforeach


                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</x-app-layout>
