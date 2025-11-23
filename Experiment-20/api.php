<?php
header("Content-Type: application/json");

require "db.php";


$sql = "SELECT posts.id, posts.title, posts.content, posts.created_at, users.username 
        FROM posts 
        JOIN users ON posts.author_id = users.id
        ORDER BY posts.id DESC";

$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row; 
}

echo json_encode([
    "status" => "success",
    "count"  => count($data),
    "data"   => $data
], JSON_PRETTY_PRINT);
?>
