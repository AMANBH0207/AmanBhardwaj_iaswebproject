<?php
include('includes/headers.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<html lang="en">
<head>
    <style>
        .add-question-form {
            margin-top: 50px;
            display: none;
        }

        .form-container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group textarea,
        .form-group input[type="url"],
        .form-group input[type="datetime-local"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="file"] {
            margin-top: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }

        #drop-area {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        #drop-area.highlight {
            border-color: #007bff;
        }

        img {
            max-width: 100%;
            max-height: 200px;
            margin-top: 20px;
        }
    </style>
    </head>

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Number of Questions</p>
              </div>
              
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53</h3>

                <p>Easy Questions</p>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Medium Difficulty</p>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Hard Questions</p>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row --> 
        <button id="myButton" onclick="TwoFunc()" style="color:black; float:right" name="AddQue" class="btn btn-info"> + Add a Question</button>
    </form>

    <div class="add-question-form">
    <form method="POST" action="">
    <div class="form-container">
        <h2>Form Example</h2>
        <form action="process_form.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" required>
            </div>

            <div class="form-group">
                <label for="question">Question Text:</label>
                <textarea name="question" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea name="answer" rows="4" required></textarea>
            </div>

            <div id="drop-area">
        <p>Drag & Drop images here or click to browse</p>
        <input type="file" id="fileInput" style="display: none;">
    </div>
    <div id="image-preview"></div>

            <div class="form-group">
                <label for="url">URL:</label>
                <input type="url" name="url" required>
            </div>

            <div class="form-group">
            <h2>Submit Date and Time:</h2>
            <span id="currentDateTime"></span>
            </div>

            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" required>
            </div>

            <div class="form-group">
                <label for="topic">Topic:</label>
                <input type="text" name="topic" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

    </form>
    </div>
        
</div>
    </section>
    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('image-preview');

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('highlight');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('highlight');
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('highlight');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const img = new Image();
                    img.src = event.target.result;
                    imagePreview.innerHTML = '';
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        dropArea.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', () => {
            const files = fileInput.files;
            if (files.length > 0) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const img = new Image();
                    img.src = event.target.result;
                    imagePreview.innerHTML = '';
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        function updateDateTime() {
            const currentDateTimeElement = document.getElementById('currentDateTime');
            const currentDateTime = new Date();

            // Format the date and time (example: "January 1, 2023 12:00:00 AM")
            const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            const formattedDateTime = currentDateTime.toLocaleDateString('en-US', options);

            // Set the formatted date and time as the content of the <span> element
            currentDateTimeElement.textContent = formattedDateTime;
        }

        // Update the current date and time immediately and every second
        updateDateTime();
        setInterval(updateDateTime, 1000);

        function disableButton() {
            // Disable the button
            document.getElementById('myButton').disabled = true;
            
            
            
        }
        function toggleForm() {
            var form = document.querySelector('.add-question-form');
            form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
        }
        function TwoFunc(){
            disableButton();
            toggleForm();
        }

       


    </script>

    </body>
</html>
<?php
    // include("includes/AddQuestions.php");
    include('includes/footer.php');
?>