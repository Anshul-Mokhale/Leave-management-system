<header class="sticky top-0 bg-white shadow z-10">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <button class="md:hidden text-gray-700" onclick="toggleSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <h1 class="text-xl font-bold">Dashboard</h1>
        <div class="flex items-center space-x-4">
            <a href="/logout" class="bg-red-500 text-white px-3 py-2 flex items-center space-x-2">
                <i class="bx bx-power-off"></i> <!-- Icon -->
                <span>Logout</span> <!-- Text -->
            </a>
        </div>
    </div>
</header>