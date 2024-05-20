<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdfFile'])) {
    $uploadDir = './uploads/';
    $uploadFile = $uploadDir . basename($_FILES['pdfFile']['name']);
    $allowedMimeTypes = ['application/pdf'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    // Validate file type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $_FILES['pdfFile']['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedMimeTypes)) {
        header("Location: /?message=Error: Only PDF files are allowed.&status=danger");
        exit();
    }

    // Validate file size
    if ($_FILES['pdfFile']['size'] > $maxFileSize) {
        header("Location: /?message=Error: File size exceeds the maximum limit of 5MB.&status=danger");
        exit();
    }

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadFile)) {
        // Security scan using ClamAV
        $clamavScan = shell_exec("clamscan --infected --remove " . escapeshellarg($uploadFile));
        if (strpos($clamavScan, "Infected files: 0") === false) {
            unlink($uploadFile); // Remove the infected file
            header("Location: /?message=Error: The file is infected and has been removed.&status=danger");
            exit();
        }

        $outputDir = 'output/';
        $outputFile = $outputDir . pathinfo($uploadFile, PATHINFO_FILENAME) . '.html';

        // Ensure the output directory exists
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        // Convert PDF to HTML using pdf2htmlEX
        $command = "pdf2htmlEX --dest-dir " . escapeshellarg($outputDir) . " " . escapeshellarg($uploadFile);
        exec($command, $output, $returnVar);

        if ($returnVar == 0) {
            header("Location: /?message=Conversion successful. <a href='$outputFile'>View HTML</a>&status=success");
            exit();
        } else {
            header("Location: /?message=Conversion failed. Error code: $returnVar&status=danger");
            exit();
        }
    } else {
        header("Location: /?message=File upload failed.&status=danger");
        exit();
    }
} else {
    header("Location: /?message=No file uploaded.&status=danger");
    exit();
}
?>
