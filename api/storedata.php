<?php
if (!isset($_POST['action'])) {
    http_response_code(405);
    include_once('../error/405.php');
}

header('Content-Type: application/json');
$data = [
    "column" => $_POST['column'],
    "content" => $_POST['content'],
];

echo json_encode($data);