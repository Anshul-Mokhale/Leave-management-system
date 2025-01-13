<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 min-h-screen">

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8  my-10 shadow-2xl w-full max-w-md mx-4 md:mx-0 overflow-auto h-auto md:h-[85vh]">
            <h1 class="text-3xl font-extrabold text-center text-gray-700 mb-8">Login to you Account</h1>
   <!-- Display Validation Errors -->
   @if ($errors->any())
   <div class="bg-red-500 text-white p-4 rounded-md mb-4">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
            <form method="POST" action="/login" class="space-y-6">
                @csrf
 
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Enter your email" required>
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md text-lg font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Login
                </button>
                <div>
                    <a href="/sign-up" class="w-full text-center bg-indigo-600 text-white py-3 px-4 rounded-md text-lg font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 block">Register</a>
                </div>
                
            </form>
        </div>
    </div>

</body>
</html>
