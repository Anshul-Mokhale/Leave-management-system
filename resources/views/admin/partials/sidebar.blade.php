<aside id="sidebar"
    class="sidebar fixed inset-y-0 left-0 z-40 w-64 bg-gradient-to-b from-gray-800 to-gray-900 text-white transform -translate-x-full md:translate-x-0 md:fixed md:flex-shrink-0 transition-transform duration-300 overflow-hidden">
    <div class="p-4 text-2xl font-bold text-center border-b border-gray-700">
        <span class="text-blue-400">Admin</span> Panel
    </div>
    <nav class="mt-4">
        <ul>
            <li class="hover:bg-blue-500 hover:text-white transition-colors">
                @php
                    $dashboardUrl = auth()->user()->is_admin == 1 ? '/admin/dashboard' : '/user/dashboard';
                    $admin = auth()->user()->is_admin;
                @endphp
                <a href="{{$dashboardUrl}}"
                    class=" {{ request()->is('admin/dashboard') ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white' }} block py-3 px-5 flex items-center space-x-3">
                    <i class='bx bxs-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li
                class="{{ request()->is('admin/user') ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white' }} transition-colors">
                <a href="/admin/user" class="block py-3 px-5 rounded-lg flex items-center space-x-3">
                    <i class='bx bx-user'></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="hover:bg-blue-500 hover:text-white transition-colors">
                <a href="#" class="block py-3 px-5 rounded-lg flex items-center space-x-3">
                    <i class='bx bx-envelope'></i>
                    <span>Leaves</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>

<!-- Overlay for offcanvas sidebar -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden" onclick="toggleSidebar()">
</div>

<!-- Sidebar Toggle Script -->
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