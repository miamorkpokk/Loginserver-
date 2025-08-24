<?php
// This script receives POST data from the frontend and extracts the 'username' field.

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data. If Content-Type: application/json, use file_get_contents
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // If JSON decode failed, fall back to $_POST (form-data or x-www-form-urlencoded)
    if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
        $username = isset($data['username']) ? $data['username'] : null;
    } else {
        $username = isset($_POST['username']) ? $_POST['username'] : null;
    }

    if ($username) {
        echo "Username extracted: " . htmlspecialchars($username);
    } else {
        echo "Username not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>
