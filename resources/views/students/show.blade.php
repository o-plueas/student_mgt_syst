<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Student Status --}}
                    <p>
                        <strong>Status:</strong>
                        <span class="{{ $student->status ? 'text-green-600' : 'text-red-600' }} font-semibold">
                            {{ $student->status ? 'Active' : 'Inactive' }}
                        </span>
                    </p>

                    {{--  Student Name --}}
                    <h3 class="text-2xl font-bold mb-4">
                        {{ $student->first_name }} {{ $student->last_name }}
                    </h3>

                    {{--  Student Information --}}
                    <div class="space-y-3">
                        <p><strong>Admission No:</strong> {{ $student->admission_no ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{ $student->email ?? 'N/A' }}</p>
                        <p><strong>Card Pin:</strong> {{ $student->rpin ?? 'N/A' }}</p>
                        <p><strong>Class:</strong> {{ $student->classes->name ?? 'N/A' }}</p>
                        <p><strong>Class Arm:</strong> {{ $student->class_arm->name ?? 'N/A' }}</p>
                        <p><strong>Term:</strong> {{ $student->term->name ?? 'N/A' }}</p>
                        <p><strong>Session:</strong> {{ $student->academicsessions->name ?? 'N/A' }}</p>
                    </div>

                    {{--  Action Buttons --}}
                    <div class="mt-6 flex space-x-3">
                        <a href="{{ route('students.index') }}" 
                           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                            Back to List
                        </a>

                        <a href="{{ route('students.edit', $student->id) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Edit
                        </a>

                        @if($student->status)
                            <form action="{{ route('students.deactivate', $student->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to deactivate this student?')">
                                @csrf
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                    Deactivate
                                </button>
                            </form>
                        @else
                            <form action="{{ route('students.activate', $student->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to activate this student?')">
                                @csrf
                                <button type="submit" 
                                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                    Activate
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
