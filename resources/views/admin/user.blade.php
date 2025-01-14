@include('admin.partials.header', ['parameterName' => "user management"])
<style>
    .table-container {
        overflow-x: scroll; /* Enables horizontal scrolling */
    }
</style>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-grow flex flex-col">
            <!-- Navbar -->
            @include('admin.partials.navbar', ['parameterName' => "users"])

            <!-- Users Table -->
            <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-300">
                <!-- Wrapper div for the horizontal scrolling table -->
                <div class="table-container w-full"> <!-- This ensures scrolling inside the table -->
                    <table id="leavesTable" class="min-w-full table-auto bg-white border-collapse text-gray-700">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">ID</th>
                                <th class="px-4 py-3 text-left">Name</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <th class="px-4 py-3 text-left">Phone</th>
                                <th class="px-4 py-3 text-left">Age</th>
                                <th class="px-4 py-3 text-left">Designation</th>
                                <th class="px-4 py-3 text-left">Job ID</th>
                                <th class="px-4 py-3 text-left">Gender</th>
                                <th class="px-4 py-3 text-left">Created At</th>
                                <th class="px-4 py-3 text-left">Updated At</th>
                                <th class="px-4 py-3 text-left">Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaves as $leave)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 text-left">{{ $leave->id }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->name }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->email }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->phone }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->age }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->designation }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->job_id }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->gender }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->created_at }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->updated_at }}</td>
                                    <td class="px-4 py-3 text-left">{{ $leave->is_admin ? 'Yes' : 'No' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- jQuery and DataTables Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#leavesTable').DataTable({
                paging: true, // Enable pagination
                searching: true, // Enable search functionality
                pageLength: 10, // Number of rows per page
                lengthChange: true, // Allow the user to change number of rows per page
                info: true, // Display the number of entries
                autoWidth: false, // Disable auto width adjustment for columns
                responsive: true, // Make the table responsive
            });
        });
    </script>
</body>
</html>
