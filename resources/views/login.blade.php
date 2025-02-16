<html>
<head>
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm">
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8">Masuk</h1>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" placeholder="Nomor telepon (WhatsApp)">
            </div>
            <div class="mb-4 relative">
                <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Kata sandi">
                <i class="fas fa-eye absolute right-3 top-3 text-gray-400"></i>
            </div>
            <div class="flex items-center justify-between mb-6">
                <a class="inline-block align-baseline font-semibold text-sm text-orange-500 hover:text-orange-800" href="#">
                    Lupa kata sandi?
                </a>
            </div>
            <div class="mb-6">
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-3 px-4 rounded w-full focus:outline-none focus:shadow-outline" type="button">
                    Masuk
                </button>
            </div>
            <div class="text-center">
                <p class="text-gray-600 text-sm">Belum punya akun? <a href="#" class="text-orange-500 font-semibold">Daftar</a></p>
            </div>
        </form>
    </div>
</body>
</html>