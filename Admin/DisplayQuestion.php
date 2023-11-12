<?php

require("connection1.php");



// Get the URL parameter
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    // Fetch the question from the database based on the provided URL
    $sql = "SELECT * FROM questionsanswers WHERE url = '$url'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageData = base64_encode($row['image']);
        ?>



        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title><?php echo $row['title']; ?></title>
            <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            color: #333;
            overflow-x: hidden;
        }

        header {
            background: #1E90FF;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #1E90FF;
        }

        h3 {
            color: #555;
        }

        p {
            text-align: justify;
            line-height: 1.6;
        }

        .answer {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .subjects, .topics {
            margin-top: 20px;
            font-style: italic;
            color: #777;
        }

        /* New styles for navigation arrows */
        .navigation-arrows {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .arrow {
            cursor: pointer;
            padding: 10px 20px;
            background-color: #1E90FF;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .arrow:hover {
            background-color: #0066CC;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #1E90FF;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
        </head>
        <body>
            <h1><?php echo $row['title']; ?></h1>
            <h3>Question: <?php echo $row['question']; ?></h3>
            <p>Answer: <?php echo $row['answer']; ?></p>
            
            <?php if (!empty($imageData)): 
            echo "<img style='height: 360px; width:480px' src='data:image/jpeg;base64,$imageData'>"
            ?><?php endif; ?>
            <p>Subject: <?php echo $row['subject']; ?></p>
            <span>Topic: <?php echo $row['topic']; ?></span>
            <!-- Display other question details as needed -->
            <div class="navigation-arrows">
        <div class="arrow" onclick="goBack()">← Previous</div>
        <div class="arrow" onclick="goForward()">Next →</div>
    </div>
                <script>
                       function goBack() {
            // Implement logic to navigate to the previous post
            alert("Go to the previous post");
        }

        function goForward() {
            // Implement logic to navigate to the next post
            alert("Go to the next post");
        }
                </script>
        </body>
        </html>
        <?php
    } else {
        echo "Question not found";
    }
} else {
    echo "Invalid URL";
}

$con->close();
?>
