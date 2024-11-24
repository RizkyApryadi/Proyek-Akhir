<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore and review your favorite movies on our Movie Review App.">
    <title>Welcome to Movie Review App</title>

    <!-- Tailwind CSS CDN for modern and responsive design -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-6">

        <!-- Header Section -->
        <header class="text-center mb-10">
            <h1 class="text-5xl font-bold text-indigo-600 mb-2">Welcome to the Movie Review App</h1>
            <p class="text-lg text-gray-600">Explore the world of films and share your reviews!</p>
        </header>

        <!-- Main Content Section -->
        <main class="space-y-6">
            <div class="flex flex-col items-center space-y-4">
                <a href="{{ route('genres.index') }}" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 bg-indigo-600 text-white text-lg font-medium py-3 rounded-lg text-center transition transform hover:bg-indigo-700 hover:scale-105">
                    Go to Genre List
                </a>

                <a href="{{ route('films.index') }}" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 bg-blue-600 text-white text-lg font-medium py-3 rounded-lg text-center transition transform hover:bg-blue-700 hover:scale-105">
                    Go to Film List
                </a>

                <a href="{{ route('films.create') }}" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 bg-green-600 text-white text-lg font-medium py-3 rounded-lg text-center transition transform hover:bg-green-700 hover:scale-105">
                    Add a New Film
                </a>
            </div>
        </main>

        <!-- Footer Section -->
        <footer class="text-center mt-10">
            <p class="text-gray-600">&copy; {{ date('Y') }} Movie Review App. All rights reserved.</p>
        </footer>

    </div>

    <!-- Optional: Add JavaScript libraries like jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
