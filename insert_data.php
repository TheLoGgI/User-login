<?php

include 'db_conn.php';

if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];


    if (empty($username) && empty($email)) {
        header("Location: create_user.php?error=username or password not set");
    } else if (empty($password) && empty($repassword)) {
        header("Location: create_user.php?error=password or repassword is not set");
    } else if ($repassword != $password) {
        header("Location: create_user.php?error=password and repassword is not equivalent");
    }

    $hasedPassword = password_hash($password, PASSWORD_BCRYPT);

    // insert a single publisher
    $stmt = $conn->prepare("INSERT INTO `users`(`username`, `password`, `email`) VALUES (:n, :p, :e)");
    $stmt->bindParam('n', $username);
    $stmt->bindParam('p', $hasedPassword);
    $stmt->bindParam('e', $email);

    try {
        $PDOResponse = $stmt->execute();
        if ($PDOResponse) {
            header("Location: index.php?succes=User created");
        }
    } catch (PDOException $e) {
        header("Location: create_user.php?error=User already exits, try another username or email");
    }
}
