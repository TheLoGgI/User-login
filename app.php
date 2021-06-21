<?php
session_start();
include 'db_conn.php';


$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
// echo "<p class='text-bold'>{$stmt->rowCount()}</p>";
$users = $stmt->fetchAll();



if (isset($_SESSION['user_name']) && isset($_SESSION['user_id'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <title>PHP Login</title>
    </head>

    <body>
        <div class="container mx-auto mt-4">
            <section class="flex justify-center mt-4">
                <div class="flex p-4 flex-grow w-full max-w-screen-xl justify-between">
                    <h2 class="inline-block text-3xl font-bold">User Logged in as
                        <span class="text-blue-500 capitalize">
                            <?php echo $_SESSION['user_name']; ?>
                        </span>
                    </h2>
                    <a class="cursor-pointer py-2 px-4 bg-red-600 hover:bg-red-400" href="logout.php">Logout</a>
                </div>
            </section>


            <section class="flex justify-center mt-4">
                <div class="flex p-4 flex-grow w-full max-w-screen-xl justify-between">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="text-blue-600 text-left">
                                <th>UserID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Last visited</th>
                                <th>User created</th>
                            </tr>
                        </thead>

                        <?php
                        foreach ($users as $row) {
                        echo "<tr class='hover:bg-gray-400 py-4'>
                        <td>{$row['userID']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['password']}</td>
                        <td>{$row['last_signin']}</td>
                        <td>{$row['created']}</td>
                    </tr>";
                        }
                        ?>

                    </table>
                </div>
            </section>
        </div>

    </body>

    </html>
<?php  } else {
    header("Location: index.php");
}
?>