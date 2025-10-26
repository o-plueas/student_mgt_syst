<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>

 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
               <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">

                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Student List</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">S/N</th>

                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Admission No</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Full Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">User ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Card Pin</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Class</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Class Arm</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Term</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Session</th>
                                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase">Action</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($students as $student)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->admission_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->user_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->rpin }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->classes->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->class_arm->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->term->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->academicsessions->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <a href="{{ route('students.show', $student->id) }}" 
                                           class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-md hover:bg-blue-700 transition">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($students->isEmpty())
                    <p class="text-center py-6 text-gray-500">No students found.</p>
                @endif
            </div>
        </div>
    </div>
</div>

</x-app-layout>
