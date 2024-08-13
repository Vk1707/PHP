<!DOCTYPE html>
<html>
<head>
    <title>Multiple Image Upload</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["images"])) {
    $targetDir = "Cantilever Umbrella/"; 

    foreach ($_FILES["images"]["name"] as $key => $name) {
        $tmpFilePath = $_FILES["images"]["tmp_name"][$key];

        if ($tmpFilePath != "") {
            $newFileName = strtoupper(basename($name));

            $targetFilePath = $targetDir . $newFileName;

            if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
                echo "File {$newFileName} uploaded successfully.<br>";
            } else {
                echo "Error uploading file {$newFileName}.<br>";
            }
        }
    }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple accept="image/*">
    <input type="submit" value="Upload">
</form>

</body>
</html>
