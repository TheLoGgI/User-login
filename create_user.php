<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>PHP Login</title>
</head>

<body class="bg-gray-700 text-white">
    <div class="container mx-auto mt-4">

        <div class="flex justify-center text-black">
            <div class="bg-gray-300 p-4 flex-grow w-full max-w-screen-sm">
                <h1 class="text-4xl font-bold mb-4">Create user</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="bg-red-200 text-red-800 py-4 px-2 rounded capitalize" role="alert">
                        <?= htmlspecialchars($_GET['error']) ?>
                    </div>
                <?php } ?>
                <form method="post" action="insert_data.php">
                    <div class="flex flex-col my-2">
                        <label for="email" class="mb-2">Email:</label>
                        <input class="px-2 py-1" type="text" id="email" name="email" value="lasse@lasse.com">
                    </div>
                    <div class="flex flex-col my-2">
                        <label for="username" class="mb-2">Username:</label>
                        <input class="px-2 py-1" type="text" id="username" name="username" value="lasse">
                    </div>
                    <div class="flex flex-col">
                        <label for="password" class="mb-2">Password:</label>
                        <input class="px-2 py-1" type="password" id="password" name="password" value="password">
                    </div>
                    <div class="flex flex-col">
                        <label for="repassword" class="mb-2">Re-password:</label>
                        <input class="px-2 py-1" type="password" id="repassword" name="repassword" value="password">
                    </div>
                    <button class="cursor-pointer w-full my-4 py-2 bg-blue-500 hover:bg-blue-800 hover:text-white" id="createUser" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill inline mr-1" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                        Create user
                    </button>
                </form>
                <a class="block text-center cursor-pointer w-auto my-4 py-2 bg-blue-700 hover:bg-blue-800 text-white hover:text-blue-200" href="index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check-fill inline mr-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    Already have a user</a>
            </div>
        </div>

    </div>

</body>

</html>