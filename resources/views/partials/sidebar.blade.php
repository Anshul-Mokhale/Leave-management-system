<aside id="sidebar" class="sidebar fixed inset-y-0 left-0 z-40 w-64 bg-gradient-to-b from-gray-800 to-gray-900 text-white transform -translate-x-full md:translate-x-0 md:relative md:flex-shrink-0 transition-transform duration-300">
    <div class="p-4 text-2xl font-bold text-center border-b border-gray-700">
        <span class="text-blue-400">Admin</span> Panel
    </div>
    <nav class="mt-4">
        <ul>
            <li class="hover:bg-blue-500 hover:text-white transition-colors">
                <a href="#" class="block py-3 px-5 rounded-lg flex items-center space-x-3">
                    <i class='bx bxs-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- <li class="hover:bg-blue-500 hover:text-white transition-colors">
                <a href="#" class="block py-3 px-5 rounded-lg flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 16h14m-7-8h7m-7-4h7" />
                    </svg>
                    <span>Users</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:text-white transition-colors">
                <a href="#" class="block py-3 px-5 rounded-lg flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-3l-3 3m0-3V4m8 16H8a2 2 0 01-2-2v-4a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2z" />
                    </svg>
                    <span>Settings</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:text-white transition-colors">
                <a href="#" class="block py-3 px-5 rounded-lg flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l4-16M16 8H8m8 8H8" />
                    </svg>
                    <span>Reports</span>
                </a>
            </li> --}}
        </ul>
    </nav>
</aside>

<!-- Overlay for offcanvas sidebar -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden" onclick="toggleSidebar()"></div>