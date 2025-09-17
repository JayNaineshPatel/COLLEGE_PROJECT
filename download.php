<?php
if (isset($_GET['file'])) {
    $file_name = basename($_GET['file']);
    $file_path = "uploads/" . $file_name;

    if (file_exists($file_path)) {
        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    } else {
        die("Error: File not found.");
    }
} else {
    die("Error: No file specified.");
}
