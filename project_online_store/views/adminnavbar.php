<?php 
  $url = $_SERVER['REQUEST_URI'];
  if(substr($url,-6)!="/login" && substr($url,-12)!="/login?error"){
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
  }
  $online = $_REQUEST['ONLINE'];
  $USER = null;
  if($online){
    $USER = $_REQUEST['USER'];
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php 
    if($online){
  ?>
      <div>
         <a class="navbar-brand col-3" href="listitems">AdminPanel</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">   
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="additem">Add Item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listitems">List Items</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $USER->email; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="logout">Logout</a>
            </div>
          </li>
        </ul>
      </div>
  <?php 
    }
  ?>
</nav>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>