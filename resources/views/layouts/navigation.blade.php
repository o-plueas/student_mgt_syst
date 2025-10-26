<aside class="w-64 bg-white border-r border-gray-200 flex flex-col flex-shrink-0 h-screen sticky top-0">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b bg-indigo-600">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <x-application-logo class="block h-8 w-auto fill-current text-white" />
            <span class="text-white font-bold text-lg">{{ config('app.name', 'Laravel') }}</span>
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center space-x-2 py-2 px-3 rounded-lg transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>{{ __('Dashboard') }}</span>
        </x-nav-link>

        <hr class="my-2 border-gray-200">

        <!-- Subject Section -->
        <div class="nav-section">
            <div class="toggle-section flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer transition-colors duration-200 hover:bg-gray-100" data-target="subject-links">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="font-medium">Subject</span>
                </div>
                <svg class="w-4 h-4 transition-transform transform toggle-icon" data-target="subject-links" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            <div id="subject-links" class="section-links space-y-1 ml-7 mt-1">
                <x-nav-link :href="route('subjects.create')" :active="request()->routeIs('subjects.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Create Subjects') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('subjects.index')" :active="request()->routeIs('subjects.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Subjects') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('subject_teachers.create')" :active="request()->routeIs('subject_teachers.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Allocate Subjects') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('subject_teachers.index')" :active="request()->routeIs('subject_teachers.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Allocation') }}</span>
                </x-nav-link>
            </div>
        </div>

        <hr class="my-2 border-gray-200">

        <!-- Configurations Section -->
        <div class="nav-section">
            <div class="toggle-section flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer transition-colors duration-200 hover:bg-gray-100" data-target="configurations-links">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="font-medium">Configurations</span>
                </div>
                <svg class="w-4 h-4 transition-transform transform toggle-icon" data-target="configurations-links" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            <div id="configurations-links" class="section-links space-y-1 ml-7 mt-1">
                <x-nav-link :href="route('academic_sessions.create')" :active="request()->routeIs('academic_sessions.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add Sessions') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('academic_sessions.index')" :active="request()->routeIs('academic_sessions.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Sessions') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('terms.create')" :active="request()->routeIs('terms.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add Term') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('terms.index')" :active="request()->routeIs('terms.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Term') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('classes.create')" :active="request()->routeIs('classes.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add Class') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('classes.index')" :active="request()->routeIs('classes.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Class') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('classarms.create')" :active="request()->routeIs('classarms.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add Class Arm') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('classarms.index')" :active="request()->routeIs('classarms.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Class Arms') }}</span>
                </x-nav-link>
            </div>
        </div>

        <hr class="my-2 border-gray-200">

        <!-- Users Section -->
        <div class="nav-section">
            <div class="toggle-section flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer transition-colors duration-200 hover:bg-gray-100" data-target="users-links">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                    </svg>
                    <span class="font-medium">Users</span>
                </div>
                <svg class="w-4 h-4 transition-transform transform toggle-icon" data-target="users-links" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            <div id="users-links" class="section-links space-y-1 ml-7 mt-1">
                <x-nav-link :href="route('staff.create')" :active="request()->routeIs('staff.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add Staff') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('staff.index')" :active="request()->routeIs('staff.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Staff') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Students') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('students.create')" :active="request()->routeIs('students.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add Students') }}</span>
                </x-nav-link>

                  <x-nav-link :href="route('students.excelUpload')" :active="request()->routeIs('students.excelUpload')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Upload Students') }}</span>
                </x-nav-link>

                 
            </div>
        </div>

        <hr class="my-2 border-gray-200">

        <!-- Results Section -->
        <div class="nav-section">
            <div class="toggle-section flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer transition-colors duration-200 hover:bg-gray-100" data-target="results-links">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="font-medium">Results</span>
                </div>
                <svg class="w-4 h-4 transition-transform transform toggle-icon" data-target="results-links" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            <div id="results-links" class="section-links space-y-1 ml-7 mt-1">
                <x-nav-link :href="route('student_results.create')" :active="request()->routeIs('student_results.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add Single Result') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('student_results.index')" :active="request()->routeIs('student_results.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Result') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('student_results.masterresult')" :active="request()->routeIs('students.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View Master Result') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('student_results.teacher.uploadResult')" :active="request()->routeIs('student_results.teacher.uploadResult')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <span>{{ __('Upload Result') }}</span>
                </x-nav-link>
            </div>
        </div>

        <hr class="my-2 border-gray-200">

        <!-- Roles & Permissions Section -->
        <div class="nav-section">
            <div class="toggle-section flex items-center justify-between py-2 px-3 rounded-lg cursor-pointer transition-colors duration-200 hover:bg-gray-100" data-target="roles-permissions-links">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span class="font-medium">Roles & Permissions</span>
                </div>
                <svg class="w-4 h-4 transition-transform transform toggle-icon" data-target="roles-permissions-links" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            <div id="roles-permissions-links" class="section-links space-y-1 ml-7 mt-1">
                <x-nav-link :href="route('roles_permissions.create')" :active="request()->routeIs('roles_permissions.create')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>{{ __('Add roles & permissions') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('roles_permissions.index')" :active="request()->routeIs('roles_permissions.index')" class="flex items-center space-x-2 py-2 px-3 rounded-lg text-sm transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>{{ __('View roles & permissions') }}</span>
                </x-nav-link>
            </div>
        </div>
    </nav>

    <!-- User Info & Logout -->
    <div class="border-t p-4 bg-gray-50">
        <div class="mb-3">
            <div class="font-medium text-gray-800">{{ Auth::user()->name }}</div>
            <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="w-full flex items-center justify-between px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-600 bg-white hover:bg-gray-50 focus:outline-none transition-colors duration-200">
                    <span>{{ __('Account') }}</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </x-slot>
<x-slot name="content">
                <x-dropdown-link  class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ __('Register User') }}</span>
                </x-dropdown-link>
            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ __('Profile') }}</span>
                </x-dropdown-link>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center space-x-2 text-red-600 hover:text-red-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>{{ __('Log Out') }}</span>
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</aside>

<script>
// Initialize sidebar functionality
function initializeSidebar() {
    // Initialize sections - collapse all by default
    const sections = document.querySelectorAll('.section-links');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Remove any existing event listeners by using event delegation
    document.removeEventListener('click', handleToggleClick);
    document.addEventListener('click', handleToggleClick);
}

// Handle toggle clicks
function handleToggleClick(e) {
    if (e.target.closest('.toggle-section')) {
        const toggle = e.target.closest('.toggle-section');
        const targetId = toggle.getAttribute('data-target');
        const targetSection = document.getElementById(targetId);
        const icon = toggle.querySelector('.toggle-icon');
        
        if (targetSection && icon) {
            // Toggle the section
            if (targetSection.style.display === 'none') {
                targetSection.style.display = 'block';
                icon.style.transform = 'rotate(180deg)';
            } else {
                targetSection.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            }
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeSidebar();
});

// Re-initialize if needed (for dynamic content)
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeSidebar);
} else {
    initializeSidebar();
}
</script>

<style>
.toggle-section {
    user-select: none;
    transition: all 0.3s ease;
    font-weight: 600;
    color: #374151;
}

.toggle-section:hover {
    color: #3b82f6;
    background-color: #f9fafb;
}

.section-links {
    transition: all 0.3s ease-in-out;
    border-left: 2px solid #e5e7eb;
    padding-left: 0.5rem;
}

.toggle-icon {
    transition: transform 0.3s ease;
}

.nav-section {
    margin-bottom: 0.5rem;
}

/* Prevent width expansion */
aside {
    flex-shrink: 0;
    min-width: 16rem;
    max-width: 16rem;
    width: 16rem;
}

/* Ensure smooth transitions */
.section-links {
    transition: max-height 0.3s ease, opacity 0.3s ease;
}

/* Active link styling */
.bg-indigo-600 .text-white {
    color: white;
}

/* Custom scrollbar for sidebar */
aside nav {
    scrollbar-width: thin;
    scrollbar-color: #c5c5c5 #f1f1f1;
}

aside nav::-webkit-scrollbar {
    width: 4px;
}

aside nav::-webkit-scrollbar-track {
    background: #f1f1f1;
}

aside nav::-webkit-scrollbar-thumb {
    background: #c5c5c5;
    border-radius: 2px;
}

aside nav::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>