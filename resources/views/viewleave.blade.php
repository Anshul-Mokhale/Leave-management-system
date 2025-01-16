@include('partials.header', ['parameterName' => "Leave Details"])

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="flex-grow flex flex-col md:ml-64 overflow-y-auto">
            <!-- Navbar -->
            @include('partials.navbar', ['parameterName' => "Leave Details"])

            <!-- Main Content Area -->
            <div class="p-6 bg-white shadow-md rounded-md">
                <!-- Section Title -->
                <h2 class="text-xl font-bold mb-4">Leave Details</h2>

                <!-- Leave Data -->
                <div class="border border-gray-300 rounded-md p-4 bg-gray-50">
                    <!-- Subject and Status -->
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Subject: {{ $leave->subject }}</h3>
                        <span
                            class="text-sm px-2 py-1 rounded 
                            {{ $leave->status === 'approved' ? 'bg-green-100 text-green-700' : ($leave->status === 'processing' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                            {{ $leave->status }}
                        </span>
                    </div>

                    <!-- Content -->
                    <p class="text-gray-700 mt-2">

                    <pre class="whitespace-pre-wrap break-words">{{ $leave->message }}</pre>
                    </p>


                    <!-- Attachment -->
                    @if ($leave->attachment)
                        <div class="mt-4">
                            <span class="font-semibold">Attachment:</span>
                            <a href="{{ asset('storage/' . $leave->attachment) }}" target="_blank"
                                class="text-blue-500 underline">View Attachment</a>
                        </div>
                    @endif

                    <!-- Buttons -->
                    <div class="mt-4 flex gap-4">
                        <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this leave?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- FullCalendar Setup -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    </div>


    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</body>