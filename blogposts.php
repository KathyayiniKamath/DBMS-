<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Management Blog</title>
<style>
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #999;
            background-image: url("images/blogpost.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            color:black;
            align-items: center;
            justify-content: center;
           margin: 10px;
        }

        header {
            background-color: transparent;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }
        .card{
            width:100%;
            height:100%;
            background-color: white;
            margin-left: 10%;
            border-radius: 5%;
            margin: 10px 10px 10px 10px;
        }
        </style>
        <body>

<header>
    <h1>AgriWiseHub</h1>
</header>
<div class="card">
<?php
// Include the database connection file
include("./Includes/db.php");

// Query to select all blog posts
$query = "SELECT title, blog_data,farmer_name FROM blogs";
$result = mysqli_query($con, $query);

// Check if there are any blog posts
if (mysqli_num_rows($result) > 0) {
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Display blog title and content
       
        echo "<h2 style=margin-left:50px;font-size:35px;color:green;margin-top:50px>" . $row['title'] . "</h2>";
        echo "<p style=margin-left:50px>" . $row['blog_data'] . "</p>";
        echo "<h4 style=margin-left:50px;color:red>Farmer name:  " . $row['farmer_name'] . "</h4>";
        echo "<br>";
        echo "<hr>"; // Add a horizontal line between blog posts
    }
} else {
    // If no blog posts are found
    echo "No blog posts found.";
}

// Close the database connection
mysqli_close($con);
?>
</div>