<?php
require("connection1.php")

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 5px;
        }

        .question {
            border-bottom: 1px solid #ccc;
            padding: 2px;
        }

        li{
            padding: 2px;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            color: #3498db;
        }
    </style>
</head>
<body>
    <header>
        <h1>All Questions</h1>
    </header>
    <main>
        <section id="questions">
            <?php

            // Fetch questions from the database
            $sql = "SELECT id, title,url FROM questionsanswers";
            $result = $con->query($sql);

            // Display questions
            while ($row = $result->fetch_assoc()) {
                echo '<div class="question">';
                echo "<li><a href='DisplayQuestion.php?url={$row['url']}'>{$row['title']}</a></li>";
                echo '</div>';
            }

            // Close the database connection
            $con->close();
            ?>
        </section>
    </main>
</body>
</html>
