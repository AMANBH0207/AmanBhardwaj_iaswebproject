<!-- Navbar -->
<?php
session_start();
if(!isset($_SESSION['AdminLoginId'])){
    header("location: index.php");          

}
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav">
     <li class="nav-item">
      <span class="nav-link">Welcome User!</span>
     </li> 
    </ul>

    <ul class="navbar-nav">
      <li class="nav-item">
        <form method="POST">
        <button name="logout" class="btn btn-danger">Logout</button>
        </form>
      </li>
    </ul>

    <?php
      if(isset($_POST["logout"]) ) {
        session_destroy();
        header("location: index.php");

      }
    
    ?>

  </nav>
  <!-- /.navbar -->