<?php
// Database Connection
$host = '127.0.0.1'; // Use localhost for a local server
$user = 'root'; // Default XAMPP username
$pass = ''; // Default XAMPP password is empty
$db = 'seteval'; // Database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Allowed values for radio inputs
$allowed_values = ['1', '2', '3', '4', '5', 'N/A'];

// Retrieve and sanitize dynamic responses from POST
$responses = [];
if (isset($_POST['responses']) && is_array($_POST['responses'])) {
    foreach ($_POST['responses'] as $key => $value) {
        $responses[$key] = in_array($value, $allowed_values) ? $value : 'N/A';
    }
} else {
    die('No responses received.');
}

// Handle open-ended questions
$q_open1 = isset($_POST['comments']['open1']) ? htmlspecialchars($_POST['comments']['open1'], ENT_QUOTES) : '';
$q_open2 = isset($_POST['comments']['open2']) ? htmlspecialchars($_POST['comments']['open2'], ENT_QUOTES) : '';

// Generate dynamic SQL query
$question_count = count($responses); // Number of questions
$response_placeholders = implode(',', array_fill(0, $question_count, '?')); // Generate placeholders (?, ?, ?...)
$fields = implode(',', array_map(fn($i) => 'q' . $i, range(1, $question_count))); // Generate fields (q1, q2, q3...)

$sql = "INSERT INTO response ($fields, q_open1, q_open2) VALUES ($response_placeholders, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
}

// Bind dynamic parameters
$bind_types = str_repeat('s', $question_count + 2); // 's' for strings (all responses and open-ended answers)
$bind_values = array_merge(array_values($responses), [$q_open1, $q_open2]); // Combine responses and open-ended questions
$stmt->bind_param($bind_types, ...$bind_values);

// Execute and provide feedback
if ($stmt->execute()) {
    echo "Response was successfully recorded.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
