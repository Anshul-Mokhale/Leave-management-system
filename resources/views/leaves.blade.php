@include('partials.header', ['parameterName' => "Dashboard"])

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="flex-grow flex flex-col md:ml-64">
            <!-- Navbar -->
            @include('partials.navbar', ['parameterName' => "Dashboard"])

            <div>
                <!-- Main Content Area -->
                <div class="p-6">
                    <!-- Breadcrumb and Button Section -->
                    <div class="flex justify-between items-center mb-4">
                        <!-- Breadcrumb -->
                        <nav class="flex items-center space-x-2 text-gray-600" aria-label="Breadcrumb">
                            <a href="#" class="text-gray-600 hover:text-gray-800">Home</a>
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                            <a href="#" class="text-gray-600 hover:text-gray-800">Leaves</a>
                        </nav>

                        <!-- New Request Button -->
                        <a href="/user/leaves/new-request"
                            class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            New Request
                        </a>
                    </div>
                    <div class="p-4 flex-grow bg-gray-50">
                        <div class="bg-white shadow-lg rounded-lg border border-gray-300 p-6">
                            <div class="relative">
                                <!-- Search Input -->
                                <input type="text" id="searchInput"
                                    class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Search Users..." />
                            </div>

                            <!-- Table Container with Scrollable Data -->
                            <div class="overflow-x-auto">
                                <div class="max-h-[400px] overflow-y-auto">
                                    <!-- Table with dynamic width adjustment -->
                                    <table class="min-w-full table-auto">
                                        <thead class="bg-gray-200 sticky top-0">
                                            <tr>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">ID</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Name</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Email</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Created At</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Updated At</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody">
                                            <!-- Demo Data -->
                                            <tr>
                                                <td class="px-4 py-2 text-gray-700">1</td>
                                                <td class="px-4 py-2 text-gray-700">John Doe</td>
                                                <td class="px-4 py-2 text-gray-700">johndoe@example.com</td>
                                                <td class="px-4 py-2 text-gray-700">2023-01-01</td>
                                                <td class="px-4 py-2 text-gray-700">2023-01-10</td>
                                                <td class="px-4 py-2 text-gray-700">
                                                    <button class="text-blue-500 hover:underline">Edit</button>
                                                    <button class="text-red-500 hover:underline ml-2">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-gray-700">2</td>
                                                <td class="px-4 py-2 text-gray-700">Jane Smith</td>
                                                <td class="px-4 py-2 text-gray-700">janesmith@example.com</td>
                                                <td class="px-4 py-2 text-gray-700">2023-02-15</td>
                                                <td class="px-4 py-2 text-gray-700">2023-02-20</td>
                                                <td class="px-4 py-2 text-gray-700">
                                                    <button class="text-blue-500 hover:underline">Edit</button>
                                                    <button class="text-red-500 hover:underline ml-2">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div id="pagination" class="mt-4 flex justify-between items-center">
                                <button id="prevPage"
                                    class="px-4 py-2 bg-indigo-500 text-white rounded-lg disabled:opacity-50"
                                    disabled>Previous</button>
                                <span id="pageInfo" class="text-sm text-gray-600">Page 1 of 1</span>
                                <button id="nextPage"
                                    class="px-4 py-2 bg-indigo-500 text-white rounded-lg">Next</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Tailwind CSS -->
            <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>