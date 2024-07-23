<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fileUrl'])) {
        $fileUrl = $_POST['fileUrl'];

        // Validate URL
        if (filter_var($fileUrl, FILTER_VALIDATE_URL) === FALSE) {
            echo 'Invalid URL';
            exit;
        }

        // Get file content
        $fileContent = file_get_contents($fileUrl);
        if ($fileContent === FALSE) {
            echo 'Failed to download file';
            exit;
        }

        // Get file name from URL
        $fileName = basename($fileUrl);
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $fileName;

        // Save file to server
        if (file_put_contents($dest_path, $fileContent) !== FALSE) {
            echo 'File is successfully uploaded.';
        } else {
            echo 'There was some error saving the file to upload directory. Please make sure the upload directory is writable by the web server.';
        }
    } else {
        echo 'No URL provided.';
    }
}
?>
