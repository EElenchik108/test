<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Test</title>    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">	
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar">
  
    <div class="leftmenu">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>      
        <li class="nav-item">
          <a class="nav-link" href="/form">Registration form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user">Users</a>
        </li>      
      </ul>      
    </div>

    <div class="rightmenu">
      <?php if(isset($_SESSION['user'])) :?>
        <ul class="nav">
          <li class="item"><p style="color:#2560F6">You are logged in as, <?= $_SESSION['user'] ?> </p></li>          
          <form action="index.php" method="POST" id="output">
            <a class="btn" href="/user/output" style="padding: 5px 15px; color: #ffffff">Output</a>
          </form>          
        </ul>
      <?php else: ?> 
        <ul class="nav">
          <li class="item">
            <a class="nav-link" href="/form" style="color:#0175EC">Registration / Entrance</a>
          </li>
        </ul>
      <?php endif ?>
    </div>  
  
</nav>