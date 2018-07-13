<?php
require_once 'include/mysql.php';
$id = $_GET['id'] ?? null;

if ($id === null) {
	return;
}

$stmt = $conn->prepare('SELECT * FROM pictures WHERE id = ?');
$stmt->bind_param('i', $id);

if (!$stmt->execute()) {
	return;
}

$result = $stmt->get_result();
$img = $result->fetch_object();

header('Content-type: ' . $img->filetype);
echo $img->filedata;
