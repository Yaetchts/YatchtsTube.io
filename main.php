<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Video Sharing Website</title>
    <link rel="stylesheet" href="static/css/styles.css"> <!-- Link to your CSS stylesheet -->
    <style>
        /* Add your CSS styles here */
        

        .video-card img {
    width: 100%; /* Ensure images fill the container */
    height: auto; /* Maintain aspect ratio */
    max-height: 200px; /* Limit image height for consistency */
}
        .video-card a {
    display: inline-block; /* Change display property */
    text-align: center;
    margin-top: 10px;
    background-color: #0073e6; /* Streamable blue */
    color: #fff; /* White text color */
    text-decoration: none; /* Remove underline */
    padding: 10px; /* Add padding for better appearance */
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s; /* Smooth transition on hover */
}


        .video-card a:hover {
            background-color: #005bab; /* Darker blue on hover */
        }

        .black-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px; /* Adjust height as needed */
            background-color: #000; /* Black background color */
            z-index: 1000; /* Ensure it's above other content */
            color: #fff; /* White text color */
            padding: 10px; /* Add padding for better appearance */
            box-sizing: border-box; /* Include padding in width calculation */
        }

        /* CSS for the content below the black background */
       .content {
    display: flex; /* Use flexbox */
    flex-wrap: wrap; /* Allow items to wrap to the next row */
    justify-content: space-around; /* Align items with space around */
}

        /* CSS for the white-greyish div with logo */
        .logo-section {
            background-color: #f3f3f3; /* White-greyish background color */
            padding: 20px;
        }

        .logo-section img {
            max-width: 50px; /* Adjust max-width of logo as needed */
            vertical-align: middle; /* Align the logo vertically */
        }

        .support-image {
            max-width: 200px; /* Adjust max-width of support image as needed */
            position: absolute;
            left: 600px;
        }

        /* CSS for the upload button */
        #uploadButton {
            display: block;
            margin: 20px auto; /* Center the button */
            padding: 10px 20px; /* Add padding for better appearance */
            background-color: #0073e6; /* Streamable blue */
            color: #fff; /* White text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition on hover */
            text-decoration: none; /* Remove underline */
        }

        #uploadButton:hover {
            background-color: #005bab; /* Darker blue on hover */
        }

        /* CSS for the upload form container */
        .upload-form-container {
    display: none; /* Hide the form by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 1000; /* Ensure the form is on top of other content */
    display: flex; /* Use flexbox */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
}

        /* CSS for the upload form */
        .upload-form {
    background-color: #fff; /* White background for the form */
    padding: 10px; /* Reduced padding for smaller size */
    border-radius: 10px;
    width: 300px; /* Adjusted width for smaller size */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
}
        .upload-form h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333; /* Dark text color */
        }

        .upload-form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #555; /* Lighter text color */
}
        .upload-form h1 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 20px; /* Reduced font size for smaller heading */
    color: #333; /* Dark text color */
}

.upload-form input[type="text"],
.upload-form input[type="file"] {
    width: calc(100% - 20px); /* Adjust width to account for padding */
    padding: 5px; /* Reduced padding for smaller size */
    margin-bottom: 10px; /* Reduced margin for smaller size */
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px;
}


.upload-form button {
    display: block;
    width: calc(100% - 20px); /* Adjust width to account for padding */
    padding: 10px; /* Reduced padding for smaller size */
    margin: 0 auto; /* Center the button */
    background-color: #0073e6; /* Streamable blue */
    color: #fff; /* White text color */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.upload-form button:hover {
    background-color: #005bab; /* Darker blue on hover */
}

        .video-card {
    width: 20%; /* Adjust width to display five images per row */
    margin: 10px; /* Add margin between video cards */
    position: relative; /* Ensure proper positioning of overlay */
    display: inline-block; /* Display video cards side by side */
}


        .video-card .logo {
    position: absolute; /* Position the logo relative to its container */
    top: 10px; /* Adjust top position as needed */
    left: 10px; /* Adjust left position as needed */
    z-index: 1; /* Ensure the logo is above the image */
    max-width: 100px; /* Adjust max-width of logo as needed */
}
        .logo-overlay img {
            max-width: 80%; /* Adjust max-width of the logo as needed */
            max-height: 80%; /* Adjust max-height of the logo as needed */
        }

        .logo-overlay {
    position: absolute; /* Position the logo overlay absolutely */
    top: 10px; /* Adjust top position as needed */
    left: 10px; /* Adjust left position as needed */
    width: 50px; /* Adjust width as needed */
    height: 50px; /* Adjust height as needed */
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    border-radius: 5px; /* Rounded corners */
    display: flex; /* Use flexbox to center the logo vertically and horizontally */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
}
        input[type="search"] {
            width: calc(50% - 20px); /* Adjust width to account for padding */
            padding: 10px;
            margin-top: 10px;
            margin-left: 10px; /* Add left margin */
            border: 1px solid #fff; /* White border */
            border-radius: 5px; /* Rounded corners */
            box-sizing: border-box; /* Include padding in width calculation */
            position:fixed;
            left:500px;
        }
    </style>
</head>
<body>
    <!-- Black background div -->
    <div class="black-background">

        <h3>Yachts Tube</h3>
        <input type="search" placeholder="Search...or Enter a name or username">
    </div><br><br><br>

    <!-- White-greyish div with logo -->
    <div class="logo-section">
        <img src="logo.jpg" alt="Logo">
        <!-- <img src="support-specific.jpg" alt="Support Someone Specific" class="support-image" style="position:absolute;top:190px;" > -->
    </div>
    <h1>No sign up<br>Simply upload a video</h1>
    <button id="uploadButton">Upload</button>

    <!-- Popup Form Container -->
    <div id="uploadFormContainer" class="upload-form-container">
        <!-- Popup Form for Video Details -->
        
        <div class="upload-form">
        <button id="closeButton">X</button> <!-- Close button -->
            
            <form action="" method="POST" enctype="multipart/form-data">
    <h1>Upload video</h1>
    <p id="countdown">Form will expire in 120 seconds...</p> <!-- Countdown timer -->
    <label for="name">Name/username:</label>
    <input type="text" id="name" name="name" required>
    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" required>
    <label for="profilePic">Profile Picture:</label>
    <input type="file" id="profilePic" name="profilePic" accept="image/*" required>
    <!-- Add the following line for the additional profile picture label -->
    <label for="yourPP">Your Profile Picture:</label>
    <!-- Add the following input field to allow users to select their profile picture -->
    <input type="file" id="yourPP" name="yourPP" accept="image/*" required>
    <label for="videoTitle">Video Title:</label>
    <input type="text" id="videoTitle" name="videoTitle" required>
    <label for="visibility">Video Visible for Period of Time:</label>
    <input type="text" id="visibility" name="visibility" placeholder="e.g., 24 hours" required>
    <label for="visibility">Editing Password(For editing your video after post):</label>
    <input type="text" id="visibility" name="visibility" placeholder="e.g. 12345sam" required>
    <label for="video">Upload Video:</label>
    <input type="file" id="video" name="video" accept="video/*" required>
    <button type="submit">Submit</button>
</form>


        </div>
    </div>
    <h2 style="position:absolute;top:630px;left:40px;border-radius: 50%;">Samuel Kidima</h2>
    <p style="position:absolute;top:900px;left:150px;border-radius: 50%;">At the mall</p>
    
    <img src="123.png" alt="" height="60" width="60" style="position:absolute;top:900px;left:40px;border-radius: 50%;">
    <img src="upload button.jpg" alt="" height="60" width="60" style="position:absolute;top:600px;left:40px;border-radius: 50%;">
    <img src="deandre9.png" alt="" height="60" width="60" style="position:absolute;top:620px;left:300px;border-radius: 50%;">
    <img src="justin bieber.jpg" alt="" height="60" width="60" style="position:absolute;top:1470px;left:340px;border-radius: 50%;">
    <!-- Navigation Bar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Get the upload button, close button, form container, and countdown display
    var uploadButton = document.getElementById('uploadButton');
    var closeButton = document.getElementById('closeButton');
    var uploadFormContainer = document.getElementById('uploadFormContainer');
    var countdownDisplay = document.getElementById('countdown');

    // Function to start countdown
    function startCountdown() {
        // Start countdown
        var countdown = 120;
        var countdownInterval = setInterval(function() {
            countdown--;
            countdownDisplay.textContent = 'Form will expire in ' + countdown + ' seconds...';
            if (countdown <= 0) {
                clearInterval(countdownInterval); // Stop the countdown
                uploadFormContainer.style.display = 'none'; // Hide the form
            }
        }, 1000); // Update every second
    }

    // Function to close the form
    function closeForm() {
        uploadFormContainer.style.display = 'none'; // Hide the form
    }

    // Event listener for the upload button
    uploadButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of the button
        uploadFormContainer.style.display = 'block'; // Show the form
        startCountdown(); // Start the countdown when the form is displayed
    });

    // Event listener for the close button
    closeButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of the button
        closeForm(); // Close the form
    });
});

    </script>
    <nav>

            <h1>Your Video Sharing Website</h1>
            <ul>
        <a href="index.php"><img src="home_icon.png" alt="Home" height="20" width="20"> Home</a> </li>
        <a href="upload.php"><img src="upload button.jpg" alt="Upload Video" height="20" width="20"> Upload Video</a> </li>
        <a href="not get blocked/testing/new folder/login.php"><img src="send messages icon.jpg" alt="View Messages" height="20" width="20"> View Messages</a> </li>
        <!-- Add more navigation links with appropriate images -->
            </ul>
        </div>
    </nav>
\
    <!-- Main Content Area -->
    <fieldset style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
    <legend>Recent posts by your closest friends </legend>
    <?php
    // Directory where images are stored
    $directory = "upload/";

    // Get all files in the directory
    $files = scandir($directory);

    // Loop through each file and display images
    foreach ($files as $file) {
        if (!in_array($file, array(".", ".."))) {
            // Check if the file is an image
            if (pathinfo($file, PATHINFO_EXTENSION) == "jpg" || 
                pathinfo($file, PATHINFO_EXTENSION) == "jpeg" || 
                pathinfo($file, PATHINFO_EXTENSION) == "png" || 
                pathinfo($file, PATHINFO_EXTENSION) == "gif") {
                // Display the image with predefined width and height
                echo "<img src='$directory$file' alt='Uploaded Image' style='width: 100px; height: 100px;'>";
            }
        }
    }
    ?>
</fieldset>

    <h2>uploaded Videos</h2>
    <!-- Display uploaded videos and images dynamically -->
    
    <?php
// Directory where images and videos are stored
$directory = "upload/";

// Get all files in the directory
$files = scandir($directory);

// Loop through each file and display it
foreach ($files as $file) {
    if (!in_array($file, array(".", ".."))) {
        // Check if the file is an image
        if (pathinfo($file, PATHINFO_EXTENSION) == "jpg" || 
            pathinfo($file, PATHINFO_EXTENSION) == "jpeg" || 
            pathinfo($file, PATHINFO_EXTENSION) == "png" || 
            pathinfo($file, PATHINFO_EXTENSION) == "gif") {
            // Construct the filename of the associated video
            $videoName = pathinfo($file, PATHINFO_FILENAME) . '.mp4';
            // Extract profile picture name
            $profilePicName = pathinfo($file, PATHINFO_FILENAME) . '_pp.jpg';
            
            echo "<div class='video-card'>";
            // Display profile picture above the video
            echo "<img src='$directory$profilePicName' alt='Profile Picture'>";
            echo "<img src='$directory$file' alt='Video Thumbnail'>";
            // Add a play button with a link to the associated video
            echo "<a href='play_videos.php?video=$videoName'>Play</a>";
            echo "</div>";
        }
    }
}
?>



<!-- JavaScript for Popup Form -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the upload button and form container
        var uploadButton = document.getElementById('uploadButton');
        var uploadFormContainer = document.getElementById('uploadFormContainer');
        var countdownDisplay = document.getElementById('countdown'); // Countdown display

        // Function to start countdown
        function startCountdown() {
            // Start countdown
            var countdown = 120;
            var countdownInterval = setInterval(function() {
                countdown--;
                countdownDisplay.textContent = 'Form will close in ' + countdown + ' seconds...';
                if (countdown <= 0) {
                    clearInterval(countdownInterval); // Stop the countdown
                    uploadFormContainer.style.display = 'none'; // Hide the form
                }
            }, 1000); // Update every second
        }

        // Display the form container as a popup when the upload button is clicked
        uploadButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default behavior of the button
            uploadFormContainer.style.display = 'block';
            startCountdown(); // Start the countdown when the form is displayed
        });
    });
</script>



<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $profilePic = $_FILES['profilePic']['name']; // Get the name of the uploaded profile picture
    $yourPP = $_FILES['yourPP']['name']; // Get the name of the uploaded "Your Profile Picture"
    $videoTitle = $_POST['videoTitle'];
    $visibility = $_POST['visibility'];
    $video = $_FILES['video']['name']; // Get the name of the uploaded video

    // Move uploaded files to the "upload" folder
    move_uploaded_file($_FILES['profilePic']['tmp_name'], 'upload/' . $profilePic);
    move_uploaded_file($_FILES['yourPP']['tmp_name'], 'upload/' . $yourPP); // Save "Your Profile Picture"
    move_uploaded_file($_FILES['video']['tmp_name'], 'upload/' . $video);
}
?>


<!-- <img src="send messages icon.jpg" alt="" height="100" width="100" style="position:absolute;top:70px;left:1200px;"> -->
<a href="not get blocked/testing/new folder/login.php" style="position:absolute;top:110px;left:1200px;">
    <input type="submit" value="Login">
</a>

<a href="not get blocked/testing/new folder/sign up form.php" style="position:absolute;top:110px;left:1290px;">
    <input type="submit" value="Sign up">

</a>

<!-- <h1 style="position:absolute;top:110px;left:1300px;">Upload</h1> -->
<h2 style="position:absolute;top:150px;left:1300px;">Chat</h2>
<img src="upload button.jpg" alt="" style="position:absolute;top:180px;left:676px;" height="100" width="100">


<script>
    // Get all video players
    var videoPlayers = document.querySelectorAll('.video-player');

    // Add event listener to each video player
    videoPlayers.forEach(function(player) {
        player.addEventListener('play', function(event) {
            // When the video starts playing, display the code 1 list above the video
            var options = event.target.nextElementSibling;
            options.style.display = 'block';
        });
    });

    function chatWithUser() {
        // Code to handle chat functionality
        alert("Chat functionality is not implemented yet.");
    }

    function viewProfileContent() {
        // Code to handle viewing profile content
        alert("View profile content functionality is not implemented yet.");
    }
</script>


</body>
</html>
