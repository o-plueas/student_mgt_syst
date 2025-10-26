<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🧾 {{ __('Student Report Card') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-8">

            <!-- Header Info -->
            <div class="mb-6 border-b border-gray-200 pb-4">
                <h1 class="text-center text-2xl font-bold text-gray-800 mb-4">
                    Student Report Card
                </h1>

                <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
                    <p><strong>Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</p>
                    <p><strong>Admission No:</strong> {{ $student->admission_no }}</p>
                    <p><strong>Class:</strong> {{ $student->classes->name ?? 'N/A' }}</p>
                    <p><strong>Arm:</strong> {{ $student->class_arm->name ?? 'N/A' }}</p>
                    <p><strong>Term:</strong> {{ $term_id }}</p>
                    <p><strong>Session:</strong> {{ $session_id }}</p>
                    <p><strong>Total Score:</strong> {{ $total_score }}</p>
                    <p><strong>Average Score:</strong> {{ $average_score }}</p>
                </div>
            </div>

            <!-- Subject Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-3 py-2 text-left">Subject</th>
                            <th class="border px-3 py-2 text-center">CA Score</th>
                            <th class="border px-3 py-2 text-center">Exam Score</th>
                            <th class="border px-3 py-2 text-center">Total</th>
                            <th class="border px-3 py-2 text-center">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjects as $res)
                            <tr>
                                <td class="border px-3 py-2">
                                    {{ $res->subject->subject_name ?? 'N/A' }}
                                </td>
                                <td class="border px-3 py-2 text-center">
                                    {{ $res->ca_score ?? 0 }}
                                </td>
                                <td class="border px-3 py-2 text-center">
                                    {{ $res->exam_score ?? 0 }}
                                </td>
                                <td class="border px-3 py-2 text-center">
                                    {{ $res->total ?? 0 }}
                                </td>
                                <td class="border px-3 py-2 text-center">
                                    {{ $res->grade ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">
                                    No results found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="mt-6 text-center">
                <p class="text-gray-700 font-semibold">Overall Total: {{ $total_score }}</p>
                <p class="text-gray-700 font-semibold">Overall Average: {{ $average_score }}</p>
            </div>

            <!-- Print Button -->
            <div class="mt-8 text-center">
                <button onclick="window.print()" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    🖨️ Print Report Card
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
