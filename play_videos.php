<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Video</title>
    <style>

.popup {
  display: none;
  position: absolute;
  top: 300px;
  left: 100px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
}

.options {
  display: flex;
  flex-direction: row;
}

.option {
  width: 50px;
  height: 50px;
  background-color: #ccc;
  border-radius: 50%;
  margin: 5px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}



        .video-card {
            position: relative; /* Set position to relative */
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden; /* Ensure consistent image size */
        }

        .video-card img {
            width: 100%; /* Ensure images fill the container */
            height: auto; /* Maintain aspect ratio */
            display: block; /* Remove extra space below images */
            max-height: 200px; /* Limit image height for consistency */
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

        .logo-overlay img {
            max-width: 80%; /* Adjust max-width of the logo as needed */
            max-height: 80%; /* Adjust max-height of the logo as needed */
        }

        .column {
            float: right;
            width: 30%; /* Adjust width as needed */
            padding: 10px;
        }

        /* Hide the other videos column on smaller screens */
        @media screen and (max-width: 600px) {
            .column {
                display: none;
            }
        }


        .profile-pic {
            width: 60px; /* Adjust the width as needed */
            height: 60px; /* Adjust the height as needed */
            border-radius: 50%; /* Create round borders */
            margin-bottom: 10px; /* Adjust margin as needed */
            border: 2px solid #fff; /* Add border */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Add shadow */
        }

        .search-container {
            text-align: center;
            margin-top: 20px;
        }

        .search-container input[type=text] {
            padding: 10px;
            margin: 5px;
            width: 50%;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .search-container input[type=submit] {
            padding: 10px 20px;
            margin: 5px;
            background-color: #0073e6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container input[type=submit]:hover {
            background-color: #005bab;
        }

        .teleprompter {
            background-color: #f8f8f8;
            padding: 20px;
            margin-top: 20px;
            overflow: auto; /* Enable scrolling if content overflows */
            max-height: 200px; /* Set max height to prevent excessive scrolling */
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
    </style>
</head>
<body>

<!-- Search bar -->
<div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" placeholder="Search Username..." name="query">
        <input type="submit" value="Search">
    </form>
</div>

<?php
// Function to get all video files in the upload folder
function getVideoFiles() {
    $directory = "upload/";
    $videoFiles = array();
    // Get all files in the directory
    $files = scandir($directory);
    // Loop through each file and add video files to the array
    foreach ($files as $file) {
        if (!in_array($file, array(".", "..")) && pathinfo($file, PATHINFO_EXTENSION) == "mp4") {
            $videoFiles[] = $file;
        }
    }
    return $videoFiles;
}

// Display the video player for the requested video
if(isset($_GET['video'])) {
    $videoFilename = $_GET['video'];
    echo "<div class='video-card' id='mainVideoCard'>";
    echo "<div class='logo-overlay'><img src='logo.jpg' alt='Logo'></div>";
    echo "<video id='mainVideoPlayer' width='320' height='240' controls>";
    // Display the video name
   
    echo "<source src='upload/$videoFilename' type='video/mp4'>";
    echo "Your browser does not support the video tag.";
    echo "</video>";
    echo "<p>$videoFilename</p>";
    echo "</div>";
   
  
} else {
    // If no video filename is provided, display an error message
    echo "Error: Video not found.";
}

// Function to get all video files in the upload folder
function getAllVideos() {
    $uploadFolder = "upload/";
    $videos = array();
    // Check if the upload folder exists
    if (is_dir($uploadFolder)) {
        // Open the directory
        if ($dirHandle = opendir($uploadFolder)) {
            // Read all files in the directory
            while (($file = readdir($dirHandle)) !== false) {
                // Check if the file is a video file (assuming .mp4 extension)
                if (pathinfo($file, PATHINFO_EXTENSION) == "mp4") {
                    $videos[] = $file;
                }
            }
            // Close the directory handle
            closedir($dirHandle);
        }
    }
    return $videos;
}

// Get all videos in the upload folder
$allVideos = getAllVideos();
echo "<h2>More videos by this artist</h2>";
echo "<div style='text-align: center; margin-top: 20px;'>";
echo "<button onclick='visitCreator()'>Visit this content creator</button>";
echo "</div>";
echo "<img src='send messages icon.jpg' alt='Send Messages Icon' style=' height: 40px; width: 40px;'>"; // Icon position adjusted
// Display all videos in a horizontal row wrapped inside a container with a background color
echo "<div style='background-color: #f3f3f3; padding: 20px;'>"; // Change background color as needed
echo "<div style='display: flex; flex-wrap: wrap;'>";
foreach ($allVideos as $videoFile) {
    echo "<div class='video-card' style='margin-right: 10px;'>";
    echo "<video width='320' height='240' controls>";
    echo "<source src='upload/$videoFile' type='video/mp4'>";
    echo "Your browser does not support the video tag.";
    echo "</video>";
    echo "</div>";
}
echo "</div>";
echo "</div>";
// Display additional videos in a column on the most right part of the page
echo "<div class='column'>";
echo "<h2 >Premium : </h2>";
$otherVideos = getVideoFiles();
foreach ($otherVideos as $videoFile) {
    echo "<div class='video-card' onclick='playMainVideo(\"$videoFile\")'>";
    echo "<div class='logo-overlay'><img src='logo.jpg' alt='Logo'></div>";
    echo "<video width='320' height='240' controls>";
    echo "<source src='upload/$videoFile' type='video/mp4'>";
    echo "Your browser does not support the video tag.";
    echo "</video>";
    echo "</div>";
}
echo "</div>";
?>


<script>
    // Your existing playMainVideo function
    function playMainVideo(videoFile) {
        var mainVideoPlayer = document.getElementById('mainVideoPlayer');
        mainVideoPlayer.src = 'upload/' + videoFile;
        mainVideoPlayer.play();
    }

    // Show popup when video is clicked to play
    document.addEventListener("DOMContentLoaded", function() {
        var mainVideoPlayer = document.getElementById('mainVideoPlayer');
        mainVideoPlayer.addEventListener('play', function() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";
        });
    });

    // Your existing JavaScript functions
</script>

<!-- <div class="video-card" id="mainVideoCard" style="position:absolute;top:70px;left:500px;">
    <div class="logo-overlay"><img src="logo.jpg" alt="Logo"></div>
    <video id="mainVideoPlayer" width="320" height="240" controls>
        <source src="upload/main-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<!-- <div class="video-card" id="mainVideoCard" style="position:absolute;top:70px;left:600px;">
    <div class="logo-overlay"><img src="logo.jpg" alt="Logo"></div>
    <video id="mainVideoPlayer" width="320" height="240" controls>
        <source src="upload/main-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div> --> -->
<img src="123.png" alt="">
<!-- <div class="video-card" id="mainVideoCard" style="position:absolute;top:70px;left:1000px;">
    <div class="logo-overlay"><img src="logo.jpg" alt="Logo"></div>
    <video id="mainVideoPlayer" width="320" height="240" controls>
        <source src="upload/main-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video> -->
</div>
<!-- <h1 style="position:absolute;top:50px;left:500px;color:white;">More videos by this artist</h1> -->
<button style="position:absolute;top:200px;left:400px;">Next</button>
<img src="logo.jpg" alt="" style="position:absolute;top:0px;left:20px;" height="40" width="40">
<h1  style="position:absolute;top:-23px;left:60px;">YT</h1>
<p style="position:absolute;top:50px;left:1000px;color:white;">Ask to advertise on this page</p>
<img src="123.png" alt="">
<!-- <img src="under water gmail.gif" alt="" style="position:absolute;top:600px;left:0px;color:white;"> -->


<!-- Profile pictures for chat -->
<div style="position:absolute;top:1000px;left:50px;">
        <img src="upload/justin bieber.jpg" alt="Profile Picture" class="profile-pic" style="position:absolute;top:260px;left:20px;">
        <p style="position:absolute;top:260px;left:100px;">Justin Bieber</p>
        <button style="position:absolute;top:350px;left:98px;">view</button>
    </div>
    <hr><br><br><br><br><br><br><br><br><br>
    <fieldset>
        <p>Products:Sell yours here</p>
        <img src="" alt="">

        <img src="upload/kairo forbes aka daughter 6.png" alt="Profile Picture" class="profile-pic" style="position:absolute;top:260px;left:200px;">
        
    </fieldset>
    <div style="position:absolute;top:200px;left:100px;">
    <a href="not get blocked/testing/New folder/login.php" id="profile-link">
    <img src="upload/123.png" alt="Profile Picture" class="profile-pic" style="position:absolute;top:260px;left:60px;">
    </a>
        
        
    </div>
    <div style="position:absolute;top:100px;left:256px;" >
        <img src="upload/202.png" alt="Profile Picture" class="profile-pic" id="profile-link" >
        
    </div>


    <script>
        document.getElementById("profile-link").addEventListener("click", function(event) {
  event.preventDefault();
  var popup = document.getElementById("popup");
  popup.style.display = "block";
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

<div id="popup" class="popup">
  <div class="options">
    <div class="option" onclick="chatWithUser()">Chat</div>
    <div class="option" onclick="viewProfileContent()">Vist Content creator</div>
    <div class="option" onclick="viewProfileContent()">Ask to <br>Delete video</div>
    <div class="option" onclick="viewProfileContent()">Like</div>
    <div class="option" onclick="viewProfileContent()">Comment</div>
    <div class="option" onclick="viewProfileContent()">Delete video</div>
    <div class="option" onclick="viewProfileContent()">support</div>
    <div class="option" onclick="viewProfileContent()">pay 2 view</div>
  </div>

</div>
<button id="pay-button" style="position:absolute;top:300px;left:700px;">Pay</button>
<button style="position:absolute;top:800px;left:1000px;">Pay</button>
<button style="position:absolute;top:1278px;left:1110px;background-color:yellow;">Monetize your video</button><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<img src="comments.png" alt="" style="position:absolute;top:2900px;left:50px;background-color:yellow;">
<div id="pay-popup" class="popup">
  <div class="options">
    
    <div class="option" onclick="payAndWatch()">Pay & Watch</div>
  </div>
</div>

<script>
    document.getElementById("pay-button").addEventListener("click", function() {
  var payPopup = document.getElementById("pay-popup");
  payPopup.style.display = "block";
});

function copyLink() {
  // Code to handle copying the link
  alert("Link copied!");
}

function payAndWatch() {
  // Code to handle payment and watching
  alert("Redirecting to payment page...");
  // You can redirect the user to the payment page here
}

</script>
<img src="upload/kairo forbes aka daughter 6.png" alt="Profile Picture" class="profile-pic" style="position:absolute;top:1250px;left:200px;">
<img src="products/mini camera.R175.R10.1.b.jpg" alt="" style="position:absolute;top:1600px;left:90px;" height="200" width="200">
<img src="products/ipad mini 3.jpg" alt="" style="position:absolute;top:1600px;left:300px;" height="200" width="200">
<img src="upload/1223.png" alt="Profile Picture" class="profile-pic" style="position:absolute;top:1600px;left:200px;">
<a href="https://cubist-windlass.000webhostapp.com/upload.html"  style="position:absolute;top:1475px;left:200px;">
    <input type="submit" value="sell my product">
</a>
<!-- <button>sell my product</button> -->
<button style="position:absolute;top:1600px;left:170px;">vist</button>
<button style="position:absolute;top:1650px;left:170px;">report</button>
<button style="position:absolute;top:1700px;left:170px;">chat</button>
<button style="position:absolute;top:1750px;left:170px;">buy</button>
<h1 style="position:absolute;top:1550px;left:50px;color:pink">Is Selling </h1>
<img src="send messages icon.jpg" alt="" style="position:absolute;top:10px;left:1300px;color:pink" height="50" width="50">
<button style="position:absolute;top:10px;left:110px;color:pink" height="50" width="50">upload your video</button>
<!-- <h1 style="position:absolute;top:7px;left:800px;color:pink" height="50" width="50">Videos</h1> -->
<h1 style="position:absolute;top:1250px;left:1250px;color:pink" height="50" width="50">Videos</h1>
<br><br><br>
<fieldset>
    <h1>Justin Bieber:Posts</h1>
    <p>Name: Justin Bieber</p>
    <p>Age: 24</p>
    <p>Religion: Catholic</p>
    <p>Posts:120</p>
    <img src="upload/justin bieber.jpg" alt="" style="border-radius:50%;" height="100" width="100"><br><br>
    <img src="upload/justin bieber.jpg" alt="">
    <img src="upload/justin bieber 2.jpg" alt="">
    <img src="upload/justin bieber 3.jpg" alt="">
    <img src="upload/justin bieber 4.jpg" alt="" height="100" width="100">

    
</fieldset>


<marquee direction="up" scrollamount="2" height="50%" width="50%" style="font-size: 30px;position:absolute;top:30px;left:400px;" >
Oh-ooh-whoa-oh-oh-oh-oh
Oh-ooh-whoa-oh-oh-oh-oh
Oh-ooh-whoa-oh, oh-oh-oh-oh
You know you love me (yo), I know you care (uh-huh)
Just shout whenever (yo), and I'll be there (uh-huh)
You are my love (yo), you are my heart (uh-huh)
And we will never, ever, ever be apart (yo, uh-huh)
Are we an item? (Yo) girl, quit playin' (uh-huh)
"We're just friends" (yo), what are you sayin'? (Uh-huh)
Said, "There's another" (yo), and looked right in my eyes (uh-huh)
My first love broke my heart for the first time, and I was like (yo, uh-huh)
"Baby, baby, baby, oh"
Like, "Baby, baby, baby, no"
Like, "Baby, baby, baby, oh"
I thought you'd always be mine, mine
"Baby, baby, baby, oh"
Like, "Baby, baby, baby, no"
Like, "Baby, baby, baby, oh"
I thought you'd always be mine, mine
Oh, for you, I would've done whatever (uh-huh)
And I just can't believe we ain't together (yo, uh-huh)
And I wanna play it cool (yo), but I'm losin' you (uh-huh)
I'll buy you anything (yo), I'll buy you any ring (uh-huh)
And I'm in pieces (yo), baby, fix me (uh-huh)
And just shake me 'til you wake me from this bad dream (yo, uh-huh)
I'm goin' down (oh), down, down, down (uh-huh)
And I just can't believe, my first love won't be around, and I'm like</marquee>
<img src="upload/justin bieber 2.jpg" alt="" style="position:absolute;top:70px;left:1120px;" height='200' width='200'>
<h2 style="position:absolute;top:270px;left:1160px;" height='200' width='200'>Justin Bieber</h2>
<h3 style="position:absolute;top:298px;left:1160px;" height='200' width='200'>BabyFtLudrious</h3>
<img src="1234.png" alt="" style="position:absolute;top:298px;left:1160px;" >
<img src="shout out.jpg" alt="" style="position:absolute;top:298px;left:1160px;" height="50" width="50">
</body>
</html>
