<?php


session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["nickname"] ) ){

}else{
    header("location: /PhotoR/Website/View/login-regis.html");
    exit();
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style-editor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="icon" href="../media/Logo/Logo_small.png">
    <title>PhotoR</title>
</head>
<body>
    
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
            <h2>{Name} <br> <span>Bevenuto!</span></h2>
            <ul>
                <li>
                    <i class="fa fa-user" aria-hidden="true"><a href="/PhotoR/Website/view/profile.php">Profile</a></i>
                    
                </li>
                <li>
                    <i class="fa fa-cog" aria-hidden="true"><a href="#">Settings</a></i> 
                </li>
                <li>
                    <i class="fas fa-sign-out-alt" aria-hidden="true"><a href="/PhotoR/Website/php/logout.php">LogOut</a></i> 
                </li>

            </ul>
        </div>
        

        
        
        
        <script src="https://cdn.jsdelivr.net/gh/silvia-odwyer/pixels.js/dist/Pixels.js"></script>
    </nav>
    <div class="work_area">
        <div class="menu_lateral">
            <div class="header_text">
                <h3>Settings Filter</h3>
            </div>
            <div  class="setting_header">
                <!--text header-->

                <!---->

                <!--card filtri-->
                <div class="container_card">
                    <div class="image_card">
                    </div>
                    <div class="Descr_card">
                        gaussinano
                    </div>
                </div>

                <div class="container_card">
                    <div class="image_card">
                    </div>
                    <div class="Descr_card">
                        smoothing
                    </div>
                </div>

                <div class="container_card">
                    <div class="image_card">
                    </div>
                    <div class="Descr_card">
                        B&N
                    </div>
                </div>

                <div class="container_card">
                    <div class="image_card">
                    </div>
                    <div class="Descr_card">
                        B&N
                    </div>
                </div>
                <div class="container_card">
                    <div class="image_card">
                    </div>
                    <div class="Descr_card">
                        B&N
                    </div>
                </div>
                <!--card filtro fine-->
                
            </div>

        </div>



        <div class="tool_layer_container">
            <canvas id="canvas_image"  width="300" height="300">
            
            </canvas>
            <div class="tool-canvas">
                <div class="button_tool-canvas">
                    <button ><i style="font-size: 28px;" class="fas fa-undo fa-2x"></i></button>
                    <button ><i class="far fa-images fa-2x"></i></button>
                    <button id="download-btn"><i class="fas fa-download fa-2x"></i></button>
                    
                </div>
            

            </div>
        </div>
    </div>
    <script src="../js/drag_script.js"></script>
    <script src="../js/script_editor.js"></script>
</body>
</html>