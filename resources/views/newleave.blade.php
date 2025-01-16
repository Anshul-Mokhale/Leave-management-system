@include('partials.header', ['parameterName' => "Leave Request"])

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="flex-grow flex flex-col md:ml-64">
            <!-- Navbar -->
            @include('partials.navbar', ['parameterName' => "Leave Request"])

            <div>
                <!-- Main Content Area -->
                <div class="p-6">
                    <!-- Breadcrumb and Button Section -->
                    <div>
                        @if (session('success'))
                            <div id="successMessage" class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg shadow">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div id="errorMessage" class="mb-4 p-4 text-red-800 bg-red-100 rounded-lg shadow">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <div class="bg-white shadow-lg rounded-lg border border-gray-300 p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Apply for Leave</h2>
                        <form action="{{ route('leaves.submit') }}" method="POST" enctype="multipart/form-data">
                            <!-- Leave Type Dropdown -->
                            @csrf
                            <div class="mb-4">
                                <label for="leaveType" class="block text-sm font-medium text-gray-700 mb-2">Leave
                                    Type</label>
                                <select id="leaveType" name="leaveType"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="Medical">Medical</option>
                                    <option value="Casual">Casual</option>
                                </select>
                            </div>

                            <!-- Subject Input -->
                            <div class="mb-4">
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                <input type="text" id="subject" name="subject" placeholder="Enter the subject"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required>
                            </div>

                            <!-- Full Message Input -->
                            <div class="mb-4">
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                <textarea id="message" name="message" rows="4"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Write your message here..." required></textarea>
                            </div>

                            <!-- Attachment Input -->
                            <div class="mb-4">
                                <label for="attachment"
                                    class="block text-sm font-medium text-gray-700 mb-2">Attachment</label>
                                <input type="file" id="attachment" name="attachment"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>


                            <!-- Submit Button -->
                            <div>
                                <button type="submit"
                                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tailwind CSS -->
            <script src="https://cdn.tailwindcss.com"></script>
        </div>
    </div>



    <script>
        // Automatically hide success or error messages after 5 seconds
        setTimeout(() => {
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');
            if (successMessage) successMessage.style.display = 'none';
            if (errorMessage) errorMessage.style.display = 'none';
        }, 5000);
    </script>

</body>

</html>