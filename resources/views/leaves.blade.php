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
                                    placeholder="Search Leaves..." />
                            </div>

                            <!-- Table Container with Scrollable Data -->
                            <div class="overflow-x-auto">
                                <div class="max-h-[400px] overflow-y-auto">
                                    <!-- Table with dynamic width adjustment -->
                                    <table class="min-w-full table-auto">
                                        <thead class="bg-gray-200 sticky top-0">
                                            <tr>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">ID</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Leave Type</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Subject</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Status</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Created At</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Updated At</th>
                                                <th class="px-4 py-2 text-left text-sm text-gray-600">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userTableBody">
                                            <!-- Table data will be inserted here -->
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    var currentPage = 1;
                    var totalPages = 1;
                    var perPage = 10;
                    var searchTerm = '';

                    // Function to load data from the server
                    function loadData() {
                        $.ajax({
                            url: "{{ route('leaves.data') }}", // Route to fetch leaves data
                            type: "GET",
                            data: {
                                page: currentPage,
                                per_page: perPage,
                                search: searchTerm
                            },
                            success: function (response) {
                                totalPages = response.last_page; // Set total pages from the response
                                updateTable(response.data);
                                updatePagination();
                            }
                        });
                    }

                    // Function to update the table with leaves data
                    function updateTable(leaves) {
                        var tableBody = $('#userTableBody');
                        tableBody.empty(); // Clear previous data

                        leaves.forEach(function (leave) {
                            var createdAt = new Date(leave.created_at).toLocaleString(); // Format created_at
                            var updatedAt = new Date(leave.updated_at).toLocaleString(); // Format updated_at

                            var row = '<tr class="hover:bg-gray-100">';
                            row += '<td class="px-4 py-2">' + leave.id + '</td>'; // ID
                            row += '<td class="px-4 py-2">' + leave.leave_type + '</td>'; // Leave Type
                            row += '<td class="px-4 py-2">' + leave.subject + '</td>'; // Subject
                            row += '<td class="px-4 py-2">' + leave.status + '</td>'; // Status
                            row += '<td class="px-4 py-2">' + createdAt + '</td>'; // Created At
                            row += '<td class="px-4 py-2">' + updatedAt + '</td>'; // Updated At
                            row += '<td><a href="/leaves/' + leave.id + '" class="text-indigo-600 hover:text-indigo-900">view</a></td>';
                            row += '</tr>';

                            tableBody.append(row);
                        });
                    }

                    // Function to update pagination controls
                    function updatePagination() {
                        $('#pageInfo').text('Page ' + currentPage + ' of ' + totalPages);
                        $('#prevPage').prop('disabled', currentPage === 1);
                        $('#nextPage').prop('disabled', currentPage === totalPages);
                    }

                    // Search functionality
                    $('#searchInput').on('input', function () {
                        searchTerm = $(this).val();
                        currentPage = 1; // Reset to first page when searching
                        loadData();
                    });

                    // Next page button click
                    $('#nextPage').click(function () {
                        if (currentPage < totalPages) {
                            currentPage++;
                            loadData();
                        }
                    });

                    // Previous page button click
                    $('#prevPage').click(function () {
                        if (currentPage > 1) {
                            currentPage--;
                            loadData();
                        }
                    });

                    // Initial load
                    loadData();
                });
            </script>

</body>

</html>