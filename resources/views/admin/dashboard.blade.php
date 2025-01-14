@include('admin.partials.header', ['parameterName' => "Dashboard"])
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-grow flex flex-col">
            <!-- Navbar -->
            @include('admin.partials.navbar',['parameterName' => "Dashboard"])

            <!-- Main Content Area -->
            <div class="p-6">
                <!-- Calendar Container -->
                <div 
                    id="calendar-container" 
                    class="mx-auto bg-white p-4 rounded shadow max-w-xl lg:max-w-xl h-96 overflow-y-auto"
                    aria-label="Calendar">
                    <div id="calendar"></div>
                </div>
            </div>

            <!-- FullCalendar Setup -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" />
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    // Initialize FullCalendar
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        height: '100%', // Utilize full height of the container
                        contentHeight: 'auto', // Dynamically adjust content height
                        visibleRange: function(currentDate) {
                            var startDate = currentDate.clone().startOf('month');
                            var endDate = startDate.clone().add(5, 'weeks'); // Show 5 weeks
                            return { start: startDate, end: endDate };
                        },
                    });

                    calendar.render();
                });
            </script>
        </div>
    </div>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
