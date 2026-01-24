<?php
include 'config.php';

$id = $_GET['id'] ?? 0;
$field = $_GET['field'] ?? 'image1';

if (!in_array($field, ['image1', 'image2'])) {
    die('Invalid field');
}

$mime_field = str_replace('image', 'mime', $field);

$sql = "SELECT $field, $mime_field FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image_data = $row[$field];
    $mime = $row[$mime_field];
    
    $mime = $row[$mime_field] ?: 'image/jpeg'; // default to jpeg if empty
    
    if ($image_data) {
        header("Content-Type: $mime");
        echo $image_data;
    } else {
        // Default image or error
        header('Content-Type: image/png');
        readfile('images/no-image.png'); // Assuming you have a default image
    }
} else {
    http_response_code(404);
}
?>