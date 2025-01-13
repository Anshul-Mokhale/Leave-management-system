@include('admin.partials.header')
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-grow flex flex-col">
            <!-- Navbar -->
           @include('admin.partials.navbar')

            <!-- Main Content Area -->
            <main class="flex-grow p-6 bg-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Example cards -->
                    <div class="p-4 bg-white rounded-lg shadow">
                        <h2 class="text-lg font-semibold">Card Title 1</h2>
                        <p class="text-gray-600 mt-2">Content goes here.</p>
                    </div>
                    <div class="p-4 bg-white rounded-lg shadow">
                        <h2 class="text-lg font-semibold">Card Title 2</h2>
                        <p class="text-gray-600 mt-2">Content goes here.</p>
                    </div>
                    <div class="p-4 bg-white rounded-lg shadow">
                        <h2 class="text-lg font-semibold">Card Title 3</h2>
                        <p class="text-gray-600 mt-2">Content goes here.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
