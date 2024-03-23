<?php
     include("functions.php");
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Management Blog</title>
    <script src="../portal_files/jquery.min.js.download"></script>
    <script src="../portal_files/popper.min.js.download"></script>
    <script src="../portal_files/bootstrap.min.js.download"></script>
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #999;
            background-image: url("./images/blog.webp");
            background-repeat: no-repeat;
            background-size: cover;
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

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .blog-post {
            margin-bottom: 30px;
        }

        .blog-post h2 {
            color: #333;
        }

        .blog-post p {
            color: #666;
        }

        .blog-post .date {
            color: #999;
            font-size: 14px;
        }

        .write-blog-form {
            margin-top: 30px;
        }

        .write-blog-form textarea,
        .write-blog-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .write-blog-form textarea {
            height: 200px;
        }

        .write-blog-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .write-blog-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <header>
        <h1>AgriWiseHub</h1>
    </header>

    <div class="container">
        <section class="blog-posts">
            <div class="blog-post">
                <!-- Your blog posts will be displayed here -->
            </div>
        </section>

        <section class="write-blog-form">
            <h2>Write a Blog Post</h2>
            
            <form name="my-form" action="blog.php" method="post">
                <input type="text" name="title" placeholder="Title">
                <textarea name="content" placeholder="Your blog post content..."></textarea>
                <button type="submit" class="btn btn-primary" style="color:white" name="register" value="Register">Submit</button>
            </form>
        </section>
    </div>

</body>

</html>

<?php
// Include the database connection file
include("./Includes/db.php");

// Check if the form is submitted
if (isset($_POST['register'])) {
    // Retrieve and sanitize form data
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con, $_POST['content']);

    // Query to retrieve farmer's name based on farmer_id
   $ans=getFarmerUsername();
  
    $farmer_name = mysqli_real_escape_string($con,$ans);

    // Prepare the SQL query to insert blog post
    $query = "INSERT INTO blogs (title, blog_data, farmer_name) 
              VALUES ('$title', '$content', '$farmer_name')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Success message
        echo "Blog posted successfully!";
    } else {
        // Error message
        echo "Error: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
