<?php

session_start();
include 'db_conn.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username)) {
		header("Location: index.php?error=username is required");
	} else if (empty($password)) {
		header("Location: index.php?error=password is required&username=$$username");
	} else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE username=:u");
		$stmt->bindParam('u', $username);
		$stmt->execute();

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['userID'];
			$user_name = $user['username'];
			$user_password = $user['password'];
			$user_last_signin = $user['last_signin'];

			if ($username === $user_name) {
				if (password_verify($password, $user_password)) {
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_name'] = $user_name;

					include_once 'update_last_signin.php';

					// $_SESSION['user_last_signin'] = $user_last_signin;
					header("Location: app.php?user=$user_name");
				} else {
					header("Location: index.php?error=password not verifyed&name=$username&password=$password&password_current=$user_password");
				}
			} else {
				header("Location: index.php?error=Incorect username or password&name=$username");
			}
		} else {
			header("Location: index.php?error=Matched with multiable users&name=$username");
		}
	}
}
