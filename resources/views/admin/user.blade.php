@include('admin.partials.header', ['parameterName' => "user management"])
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<body class="bg-gray-100">
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-full lg:w-64 h-auto lg:h-full">
            @include('admin.partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-grow flex flex-col">
            <!-- Navbar -->
            <div class="bg-white shadow-md w-full">
                @include('admin.partials.navbar', ['parameterName' => "users"])
            </div>

            <!-- Users Table -->
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
                                    <!-- Table data will be inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div id="pagination" class="mt-4 flex justify-between items-center">
                        <button id="prevPage" class="px-4 py-2 bg-indigo-500 text-white rounded-lg disabled:opacity-50"
                            disabled>Previous</button>
                        <span id="pageInfo" class="text-sm text-gray-600">Page 1 of 1</span>
                        <button id="nextPage" class="px-4 py-2 bg-indigo-500 text-white rounded-lg">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- jQuery -->
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
                    url: "{{ route('admin.users.data') }}", // Route to fetch data
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

            // Function to update the table
            function updateTable(users) {
                var tableBody = $('#userTableBody');
                tableBody.empty(); // Clear previous data

                users.forEach(function (user) {
                    var createdAt = new Date(user.created_at).toLocaleString(); // Format the created_at date
                    var updatedAt = new Date(user.updated_at).toLocaleString(); // Format the updated_at date

                    var row = '<tr class="hover:bg-gray-100">';
                    row += '<td class="px-4 py-2">' + user.id + '</td>';
                    row += '<td class="px-4 py-2">' + user.name + '</td>';
                    row += '<td class="px-4 py-2">' + user.email + '</td>';
                    row += '<td class="px-4 py-2">' + createdAt + '</td>'; // Display formatted date
                    row += '<td class="px-4 py-2">' + updatedAt + '</td>'; // Display formatted date
                    row += '<td> <a href="/admin/users/' + user.id + '/edit" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></a> </td>';
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
                searchTerm = $(this).val().toLowerCase();
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