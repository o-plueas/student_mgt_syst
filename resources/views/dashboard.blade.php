<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel Dashboard') }}</title>

    <!-- Fonts (optional) -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Chart.js CDN (for charts) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Vite (Tailwind etc.) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* small custom adjustments to better match the screenshot */
        .card-shadow { box-shadow: 0 6px 18px rgba(15, 23, 42, 0.06); }
        .progress-track { background: #f3f4f6; border-radius: 9999px; height: 8px; overflow: hidden; }
        .progress-fill { height: 8px; border-radius: 9999px; }
        .donut-center { font-size: 0.9rem; font-weight: 600; color: #111827; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">

        <!-- Sidebar (include as Blade partial) -->
        @include('layouts.navigation')

        <!-- Main content area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="flex items-center justify-between bg-white border-b px-6 py-3">
                <div class="flex items-center gap-4">
                    <button id="sidebar-toggle" class="p-2 rounded-md hover:bg-gray-100 md:hidden">
                        <!-- hamburger -->
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <div class="text-lg font-semibold text-gray-800">Minimal Dashboard</div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden sm:block">
                        <input type="text" placeholder="Search..." class="px-3 py-2 rounded-md border border-gray-200 focus:ring-0" />
                    </div>

                    <button class="p-2 rounded-md hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"></path>
                        </svg>
                    </button>

                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <div class="text-sm font-medium text-gray-800">{{ Auth::user()->name ?? 'Admin' }}</div>
                            <div class="text-xs text-gray-500">{{ Auth::user()->email ?? 'admin@example.com' }}</div>
                        </div>
                        <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="w-10 h-10 rounded-full object-cover"/>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="p-6 overflow-y-auto">
                <!-- Stats row -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-xl p-4 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-400">NEW ACCOUNTS</div>
                                <div class="text-2xl font-semibold text-gray-800">2,234</div>
                                <div class="text-sm text-green-500 mt-1">+9% vs last week</div>
                            </div>
                            <div class="bg-indigo-50 p-3 rounded-lg">
                                <!-- icon -->
                                <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 7v4a1 1 0 001 1h3M21 7v4a1 1 0 01-1 1h-3M3 7a4 4 0 014-4h10a4 4 0 014 4M3 11a4 4 0 004 4h10a4 4 0 004-4"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-400">TASKS COMPLETION</div>
                                <div class="text-2xl font-semibold text-gray-800">71%</div>
                                <div class="text-sm text-red-500 mt-1">-4% vs last week</div>
                            </div>
                            <div class="bg-rose-50 p-3 rounded-lg">
                                <svg class="w-7 h-7 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-400">COMPANY VALUE</div>
                                <div class="text-2xl font-semibold text-gray-800">$1.45M</div>
                                <div class="text-sm text-green-500 mt-1">+3.4%</div>
                            </div>
                            <div class="bg-yellow-50 p-3 rounded-lg">
                                <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 11V6a1 1 0 112 0v5a1 1 0 11-2 0zM12 20a8 8 0 100-16 8 8 0 000 16z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-400">NEW USERS</div>
                                <div class="text-2xl font-semibold text-gray-800">+34</div>
                                <div class="text-sm text-green-500 mt-1">+2% vs last week</div>
                            </div>
                            <div class="bg-green-50 p-3 rounded-lg">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main dashboard grid -->
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                    <!-- Left: Traffic chart -->
                    <div class="xl:col-span-2 bg-white rounded-xl p-6 card-shadow">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Traffic Sources</h3>
                                <p class="text-sm text-gray-500">Overview of visits, conversions and growth</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <button class="px-3 py-1 border rounded-md text-sm text-gray-600">Last 7d</button>
                                <button class="px-3 py-1 border rounded-md text-sm text-gray-600">Last 30d</button>
                            </div>
                        </div>

                        <div class="mt-4">
                            <canvas id="trafficChart" height="120"></canvas>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-indigo-500 rounded-full"></div>
                                <div>
                                    <div class="text-sm text-gray-500">Direct</div>
                                    <div class="text-lg font-semibold text-gray-800">45%</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div>
                                    <div class="text-sm text-gray-500">Referral</div>
                                    <div class="text-lg font-semibold text-gray-800">25%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Income donut & KPIs -->
                    <div class="bg-white rounded-xl p-6 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">Income</h4>
                                <p class="text-sm text-gray-500">Percent of target</p>
                            </div>
                            <div class="text-right">
                                <div class="text-xl font-bold text-indigo-600">$31,564</div>
                                <div class="text-sm text-gray-500">Total revenue</div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center gap-6">
                            <div class="w-36 h-36 relative">
                                <canvas id="donutChart"></canvas>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="donut-center">75%</div>
                                </div>
                            </div>

                            <div class="flex-1">
                                <div class="mb-4">
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-500">Income Target</div>
                                        <div class="text-sm font-semibold text-gray-800">32%</div>
                                    </div>
                                    <div class="progress-track mt-2">
                                        <div class="progress-fill bg-indigo-500 w-1/3" style="width:32%"></div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-500">Spending Target</div>
                                        <div class="text-sm font-semibold text-gray-800">54%</div>
                                    </div>
                                    <div class="progress-track mt-2">
                                        <div class="progress-fill bg-green-500 w-1/2" style="width:54%"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-500">Total Tasks</div>
                                        <div class="text-sm font-semibold text-gray-800">89%</div>
                                    </div>
                                    <div class="progress-track mt-2">
                                        <div class="progress-fill bg-rose-500 w-4/5" style="width:89%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 border-t pt-4">
                            <div class="text-sm text-gray-500">This dashboard provides a quick overview of the key metrics</div>
                        </div>
                    </div>
                </div>

                <!-- Bottom widgets: table or KPI blocks -->
                <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl p-4 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-400">Revenue</div>
                                <div class="text-lg font-semibold text-gray-800">$5,456</div>
                            </div>
                            <div class="text-sm text-green-500">+18%</div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-400">Costs</div>
                                <div class="text-lg font-semibold text-gray-800">$4,764</div>
                            </div>
                            <div class="text-sm text-red-500">-5%</div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 card-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs text-gray-400">Expenses</div>
                                <div class="text-lg font-semibold text-gray-800">$1.5M</div>
                            </div>
                            <div class="text-sm text-green-500">+1.5%</div>
                        </div>
                    </div>
                </div>

                <!-- Slot for page-specific content -->
                <div class="mt-6">
                    {{ $slot ?? '' }}
                </div>
            </main>
        </div>
    </div>

    <!-- Chart initialization -->
    <script>
        // Traffic chart (bar + line combination)
        const ctx = document.getElementById('trafficChart').getContext('2d');
        const trafficChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
                datasets: [
                    {
                        type: 'bar',
                        label: 'Visitors',
                        data: [120, 180, 150, 220, 170, 190, 240],
                        backgroundColor: 'rgba(99,102,241,0.9)',
                        borderRadius: 6,
                        barThickness: 18
                    },
                    {
                        type: 'line',
                        label: 'Conversion',
                        data: [30, 45, 40, 60, 50, 55, 70],
                        borderColor: 'rgba(34,197,94,1)',
                        backgroundColor: 'transparent',
                        tension: 0.35,
                        pointRadius: 3
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: '#f3f4f6' } }
                }
            }
        });

        // Donut chart
        const dtx = document.getElementById('donutChart').getContext('2d');
        const donut = new Chart(dtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed','Remaining'],
                datasets: [{
                    data: [75, 25],
                    backgroundColor: ['#6366f1', '#e5e7eb'],
                    hoverOffset: 6,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } }
            }
        });

        // Sidebar toggle for mobile
        const sidebar = document.querySelector('aside');
        document.getElementById('sidebar-toggle').addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>
