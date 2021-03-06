<?php

session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["nickname"] ) ){

}else{
    header("location: /PhotoR/Website/View/login-regis.html");
    exit();
}

?>

<!  CTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style-drag.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="icon" href="../media/Logo/Logo_small.png">
    <title>PhotoR</title>

</head>
<body >
    <!--load image from-->
 




    <nav class="navbar">
        <div class="navbar-brand" >
          <img src="../media/Logo/Logo_medium.png" width="30" height="30" class="d-inline-block align-top" alt="">
          <p id="title-logo">PhotoR</p>
        </div>
        <div class="box_user" >
            <div class="user_img" onclick="ToggleMenu()">
                <a href="" class="profile"></a>
                    <img src="../media/images/user.png" height="40" width="40" alt="">
                </a>
            </div>
        </div>
        <div class="menu"  >
            <h2><?php   echo $_SESSION["nickname"]; ?> <br> <span>Bevenuto!</span></h2>
            <ul>
                <li>
                    <i class="fa fa-user" aria-hidden="true"><a href="/PhotoR/Website/View/profile.php">Profile</a></i>
                    
                </li>
                <li>
                    <i class="fa fa-cog" aria-hidden="true"><a href="/PhotoR/Website/View/Query.php">Query</a></i> 
                </li>
                <li>
                    <i class="fas fa-sign-out-alt" aria-hidden="true"><a href="/PhotoR/Website/php/logout.php">Logout</a></i> 
                </li>

            </ul>
        </div>
        

    </nav>

    
      
    <div  id='dropzone' draggable="true" class="container drag-container">
        <div class="container__content">
        </div>
        <div class="message">
            <h3>Selezionate un'immagine da regolare</h3> <br>
            <h5>Trascinate qui un file o selezionate uno dal dispositivo. <br> (solo .jpg, .jpeg e .png )</h5>
            
            <button id="btn" class="button-choosefile" onclick="Send_File()">
            <span  class="spectrum-Button-label">
                Carica file
            </span>
                <input onchange="Read_File(this)"  type="file" id="file-upload"  accept="image/*" style="display: none;">
            </button>

        </div>
      
    </div>
<script type="text/javascript" src="../js/drag_script.js">

</script>
</body>
</html>