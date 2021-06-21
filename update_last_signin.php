<?php

$userID = $_SESSION['user_id'];

$stmt = $conn->prepare("UPDATE users SET last_signin = CURRENT_TIMESTAMP WHERE userID = :u");
$stmt->bindParam('u', $userID);
$stmt->execute();