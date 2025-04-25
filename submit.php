<?php

include 'db.php';

if(isset($_POST['mood'])) {
    $mood = $_POST['mood'];
    $stmt = $conn->prepare("INSERT INTO moods (mood) VALUES (?)");
    $stmt->bind_param("s", $mood);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: index.html");
exit();
?>