<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Video Sharing Website</title>
    <link rel="stylesheet" href="static/css/styles.css"> <!-- Link to your CSS stylesheet -->
    <style>
        /* Add your CSS styles here */
        .video-card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        .video-card img {
            width: 100%;
            height: auto;
        }
        .video-card a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $videoName = $_FILES['video']['name'];
    $imageName = $_FILES['image']['name'];

    // Move uploaded files to the "upload" folder
    move_uploaded_file($_FILES['video']['tmp_name'], 'upload/' . $videoName);
    move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $imageName);

    // Rename the video file to include the base name of the image file
    $videoExtension = pathinfo($videoName, PATHINFO_EXTENSION);
    $imageBaseName = pathinfo($imageName, PATHINFO_FILENAME);
    $newVideoName = 'upload/' . $imageBaseName . '.' . $videoExtension;
    rename('upload/' . $videoName, $newVideoName);

    // Display success message
    echo "Video and image uploaded successfully!";
}
?>
<!-- Display the form for uploading video and image -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="video">Upload Video:</label>
    <input type="file" id="video" name="video" accept="video/*" required><br>
    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required><br>
    <button type="submit">Submit</button>
</form>

<!-- Display uploaded videos and images dynamically -->
<div class="video-grid">
    <?php
    // Directory where images and videos are stored
    $directory = "upload/";

    // Get all files in the directory
    $files = scandir($directory);

    // Loop through each file and display it
    foreach ($files as $file) {
        if (!in_array($file, array(".", ".."))) {
            // Check if the file is an image
            if (pathinfo($file, PATHINFO_EXTENSION) == "jpg" || pathinfo($file, PATHINFO_EXTENSION) == "jpeg" || pathinfo($file, PATHINFO_EXTENSION) == "png" || pathinfo($file, PATHINFO_EXTENSION) == "gif") {
                // Construct the filename of the associated video
                $videoName = pathinfo($file, PATHINFO_FILENAME) . '.mp4';
                echo "<div class='video-card'>";
                echo "<img src='$directory$file' alt='Video Thumbnail'>";
                // Add a play button with a link to the associated video
                echo "<a href='$directory$videoName' target='_blank'>Play</a>";
                echo "</div>";
            }
        }
    }
    ?>
</div>

</body>
</html>
