
<?php


session_start();
if(isset($_SESSION["user_id"]) && isset($_SESSION["nickname"] ) ){
  $user_id  = $_SESSION["user_id"];
  $database = new Manager_DB($hostname_db,$user_db,$password_db,$dbname); 
  $database->
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
    <link rel="stylesheet" type="text/css" href="../css/style-profiles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="icon" href="../media/Logo/Logo_small.png">
    <title>PhotoR</title>



</head>
<body>
<div class="hidden-xs col-sm-1 nav-activity">
        <a class="activity-link clearfix water active" data-ua-event=
        "Virb,Click,Activity virb_activities_water,water" href=
        "/en-US/activities/water/"><span class="icon-wrap"><svg viewbox=
        "0 0 46.9 46.9" xmlns="http://www.w3.org/2000/svg">
        <circle cx="349.1" cy="67.1" fill="#FBD236" r="23.4"></circle>
        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-miterlimit=
        "10" stroke-width="1.5">
            <path d="M340.6 68.8l3.6 1-.6 3.4" stroke-linecap="square"></path>
            <path d="M349.2 77.7l-.1-21.2" stroke-linecap="round"></path>
            <path d="M351.7 58.2l-2.6 2.7-2.7-2.2M346.4 75.3l2.7-2.7 2.6 2.2"
            stroke-linecap="square"></path>
            <path d="M339.8 72.4l18.5-10.5" stroke-linecap="round"></path>
            <path d="M358.1 65l-3.6-1 .6-3.4" stroke-linecap="square"></path>
            <path d="M340 61.2l17.9 11.5" stroke-linecap="round"></path>
            <path d="M354.9 73.9l-.7-3.6 3.3-1.1M343.6 60.2l.7 3.6-3.3 1.1"
            stroke-linecap="square"></path>
        </g>
        <circle cx="23.4" cy="23.4" fill="#FBD236" r="23.4"></circle>
        <path d=
        "M31.5 32.5H16.2l-3.7-3.2c-.1-.1 0-.3.1-.3l23.1-1c.1 0 .2.2.1.3l-4.2 4.2h-.1zM22 26.6l-6 .4c-.1 0-.1-.1-.1-.2L22 15.9c0-.1.1 0 .1 0L22 26.6c0-.1 0 0 0 0zm1.3-15.4s-.1 0 0 0l-9.7 17c0 .1 0 .2.1.2l9.4-.6c.1 0 .1-.1.1-.1l.1-16.4c.1-.1.1-.1 0-.1zM24.3 27.6l6.4-.2c.1 0 .2-.1.1-.3l-6.3-10.5c-.1-.2-.3-.1-.3.1l-.1 10.7c0 .2.1.3.2.2z"
        fill="#fff"></path>
        <path d="M23.1-19.1h2" fill="none" stroke="#fff" stroke-linecap="round"
        stroke-miterlimit="10"></path></svg></span><span class=
        "activity-title">water</span><span class=
        "activity-listings">Wakeboarding, Surfing, Windsurfing, Kayaking,
        Rafting, Diving, Boating and Fishing</span></a><a class=
        "activity-link clearfix snow" data-ua-event=
        "Virb,Click,Activity virb_activities_water,snow" href=
        "/en-US/activities/snow/"><span class="icon-wrap"><svg viewbox=
        "0 0 46.9 46.9" xmlns="http://www.w3.org/2000/svg">
        <circle cx="349.1" cy="67.1" fill="#FBD236" r="23.4"></circle>
        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-miterlimit=
        "10" stroke-width="1.5">
            <path d="M340.6 68.8l3.6 1-.6 3.4" stroke-linecap="square"></path>
            <path d="M349.2 77.7l-.1-21.2" stroke-linecap="round"></path>
            <path d="M351.7 58.2l-2.6 2.7-2.7-2.2M346.4 75.3l2.7-2.7 2.6 2.2"
            stroke-linecap="square"></path>
            <path d="M339.8 72.4l18.5-10.5" stroke-linecap="round"></path>
            <path d="M358.1 65l-3.6-1 .6-3.4" stroke-linecap="square"></path>
            <path d="M340 61.2l17.9 11.5" stroke-linecap="round"></path>
            <path d="M354.9 73.9l-.7-3.6 3.3-1.1M343.6 60.2l.7 3.6-3.3 1.1"
            stroke-linecap="square"></path>
        </g>
        <circle cx="23.4" cy="23.4" fill="#FBD236" r="23.4"></circle>
        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-miterlimit=
        "10" stroke-width="1.5">
            <path d="M15 25.1l3.6 1-.6 3.4" stroke-linecap="square"></path>
            <path d="M23.5 34.1l-.1-21.3" stroke-linecap="round"></path>
            <path d="M26.1 14.6l-2.7 2.6-2.6-2.2M20.8 31.6l2.6-2.7 2.7 2.2"
            stroke-linecap="square"></path>
            <path d="M14.2 28.7l18.5-10.5" stroke-linecap="round"></path>
            <path d="M32.4 21.4l-3.6-1 .6-3.5" stroke-linecap="square"></path>
            <path d="M14.3 17.5L32.2 29" stroke-linecap="round"></path>
            <path d="M29.3 30.2l-.8-3.6 3.3-1M17.9 16.5l.8 3.7-3.3 1"
            stroke-linecap="square"></path>
        </g></svg></span><span class="activity-title">snow</span><span class=
        "activity-listings">Skiing, snowboarding and
        snowmobiling</span></a><a class=
        "activity-link clearfix sports-+-outdoor" data-ua-event=
        "Virb,Click,Activity virb_activities_water,sports + outdoor" href=
        "/en-US/activities/outdoor/"><span class="icon-wrap">
        <!--?xml version="1.0" encoding="utf-8"?-->
        <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) --><svg id="Layer_1"
        version="1.1" viewbox="0 0 1200 900" x="0px" xmlns=
        "http://www.w3.org/2000/svg" y="0px">
        <circle cx="6849.1" cy="1287.6" fill="#FBD236" r="449"></circle>
        <g>
            <path d=" M6686,1320.3l69.1,19.2l-11.5,65.2" fill="none" stroke=
            "#FFFFFF" stroke-linecap="square" stroke-linejoin="round"
            stroke-miterlimit="10" stroke-width="1.5"></path>
            <path d=" M6851.1,1491l-1.9-406.8" fill="none" stroke="#FFFFFF"
            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit=
            "10" stroke-width="1.5"></path>
            <path d=
            " M6899,1116.8l-49.9,51.8l-51.8-42.2 M6797.3,1445l51.8-51.8l49.9,42.2"
            fill="none" stroke="#FFFFFF" stroke-linecap="square"
            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5">
            </path>
            <path d=" M6670.7,1389.3l355-201.5" fill="none" stroke="#FFFFFF"
            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit=
            "10" stroke-width="1.5"></path>
            <path d=" M7021.9,1247.3l-69.1-19.2l11.5-65.2" fill="none" stroke=
            "#FFFFFF" stroke-linecap="square" stroke-linejoin="round"
            stroke-miterlimit="10" stroke-width="1.5"></path>
            <path d=" M6674.5,1174.4l343.5,220.7" fill="none" stroke="#FFFFFF"
            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit=
            "10" stroke-width="1.5"></path>
            <path d=
            " M6960.4,1418.1L6947,1349l63.3-21.1 M6743.6,1155.2l13.4,69.1l-63.3,21.1"
            fill="none" stroke="#FFFFFF" stroke-linecap="square"
            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5">
            </path>
        </g>
        <circle cx="599" cy="449" fill="#FBD236" r="449"></circle>
        <g>
            <path d=
            "M599,535.4L474.3,358.8c-1.9-3.8-5.8-3.8-7.7,0L341.9,535.4c-1.9,3.8,0,7.7,3.8,7.7h251.4 C599,543.1,602.9,537.3,599,535.4z"
            fill="#FFFFFF"></path>
            <path d=
            "M875.4,535.4l-96.2-137.5c-2.1,5.8-8,14.7-22.8,14.7c-21.1,0-55.7-51.8-72.9-51.8 c-17.3,0-32.6,26.9-53.7,24.9c-19.2,0-9.6-23-24.9-23l67.2-94c1.3-3.9,7.9-6,13.2-5.2l-1.7-2.5c-1.9-3.8-5.8-3.8-7.7,0l-119,167 c-1.9,1.9-1.9,3.8,0,5.8l74.8,105.5c0,1.9,1.9,3.8,3.8,3.8h236C875.4,543.1,877.3,539.2,875.4,535.4z"
            fill="#FFFFFF"></path>
        </g>
        <path d=
        "M679.6,278.3l178.5,251.4H639.3l-69.1-97.9L679.6,278.3 M679.6,259.1c-1.9,0-3.8,0-5.8,1.9L556.8,426 c-1.9,1.9-1.9,5.8,0,7.7l74.8,103.6c1.9,1.9,3.8,1.9,5.8,1.9h232.2c5.8,0,9.6-5.8,5.8-11.5l-190-268.7 C683.5,261,681.6,259.1,679.6,259.1L679.6,259.1z"
        fill="#FFFFFF"></path></svg></span><span class="activity-title">sports
        + outdoor</span><span class="activity-listings">From everyday to
        extreme</span></a><a class="activity-link clearfix sky" data-ua-event=
        "Virb,Click,Activity virb_activities_water,sky" href=
        "/en-US/activities/sky/"><span class="icon-wrap"><svg viewbox=
        "0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <circle cx="1488.7" cy="286.1" fill="#FBD236" r="99.8"></circle>
        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-miterlimit=
        "10" stroke-width="1.5">
            <path d="M1452.5 293.4l15.3 4.3-2.6 14.5" stroke-linecap="square">
            </path>
            <path d="M1489.1 331.3l-.4-90.4" stroke-linecap="round"></path>
            <path d=
            "M1499.8 248.2l-11.1 11.5-11.5-9.4M1477.2 321.1l11.5-11.5 11.1 9.4"
            stroke-linecap="square"></path>
            <path d="M1449 308.7l78.9-44.7" stroke-linecap="round"></path>
            <path d="M1527.1 277.2l-15.4-4.3 2.6-14.5" stroke-linecap="square">
            </path>
            <path d="M1449.9 261l76.3 49" stroke-linecap="round"></path>
            <path d="M1513.4 315.1l-3-15.3 14.1-4.7M1465.2 256.7l3 15.4-14 4.7"
            stroke-linecap="square"></path>
        </g>
        <circle cx="100" cy="99.7" fill="#FBD234" r="99.7"></circle>
        <path d=
        "M147.2 133.5l-15.7-18.7c1.2-1.4 2.5-3.1 3.9-5.2l-.2-2.9-2.9-.2c-1.9 1.3-3.5 2.5-4.8 3.6l-6.1-7.2c1.4-1.6 3-3.5 4.7-5.9l.1-3.2-3.2.1c-2.2 1.6-4 3-5.5 4.3l-3.1-3.8s18.1-16.9 15.8-24.9l-.2-.2c-8-2.3-24.9 15.8-24.9 15.8l-3.3-2.8c1.3-1.5 2.7-3.3 4.3-5.5l.1-3.2-3.2.1c-2.3 1.7-4.3 3.2-5.8 4.6L90 72.5c1.1-1.3 2.3-2.8 3.5-4.7l-.2-2.9-2.9-.2c-2.1 1.4-3.8 2.7-5.1 3.9L66.2 52.5s-6.2-2.2-4.9 4.2c1.6 3 29.7 40.4 29.7 40.4l.2 2.1s-8.3 5.3-21.7 23c-3-1.9-13.8-10.5-16.4-7.2-.8 1.1-1.4 2.2 1.9 6.2s6.7 8 6.7 8l.4 3.2-1 2.7s-1.2 2.2.2 3.5c1.3 1.3 3.5.1 3.5.1l2.7-1 3.2.4s3.9 3.4 8 6.7c4 3.3 5.1 2.7 6.2 1.9 3.3-2.6-5.4-13.4-7.2-16.4 17.7-13.4 23-21.7 23-21.7l2.1.2s37.5 28.1 40.4 29.8c6.1 1.1 4-5.1 4-5.1z"
        fill="#fff"></path></svg></span><span class=
        "activity-title">sky</span><span class="activity-listings">Skydiving,
        Extreme Sports and RC/Drone</span></a><a class=
        "activity-link clearfix hunting" data-ua-event=
        "Virb,Click,Activity virb_activities_water,hunting" href=
        "/en-US/activities/hunting/"><span class="icon-wrap"><svg viewbox=
        "0 0 46.9 46.9" xmlns="http://www.w3.org/2000/svg">
        <circle cx="23.4" cy="23.4" fill="#FBD236" r="23.4"></circle>
        <path d=
        "M19.5 30.9c.9-.8 1.6-2.2 1.9-4.1 0-.2-.1-.4-.2-.4-5-2.5-5.8-3.9-5-9.8 0-.2-.1-.4-.3-.4l-4.2-1.5c.1-.2.1-.5.2-.7.5 0 1.1 0 1.6.1 4.5 1.4 5.9.3 5.6-4.3 0-.3.3-.6.4-1h.7c.2 1.2.4 2.3.6 3.5 0 .2.2.4.5.3.8-.1 1.7-.2 2.6-.4.1.2.1.4.2.5-3 1.5-6.7 2.5-6.6 6.9 0 1.9 1 3.3 2.9 4.4.2.1.5 0 .6-.3.2-1.2.5-2.4.7-3.5 0-.2 0-.3-.2-.4-.7-.4-1.4-.7-2.1-1.1 0-.2.1-.3.1-.5 1.4 0 2.3 1.2 4-.1 2.3-1.8 1.5-1.1 2-4.4.1-.1.4-.1.4 0 .2.4-.1 2.5 0 3.2 0 .2.2.3.4.3 1 0 2.2-.1 3.1 0v.7c-.6.1-1.5.1-2.1.2-2 .2-3.3.5-4.2 2.4-1.1 2.5-.9 4.2 1.7 5.1 1.7.6 3.4.4 5.1 1.1.5.2.7.9.7 1.4 0 .5-.3 1.4-.8 1.4-5-.1-5.1 3.3-5.8 6.3-.1.3-.4.4-.6.2-.6-.5-1.7-1.3-2.5-2.2-1.1-1.2-1.5-1.9-1.7-2.3.1-.3.1-.5.3-.6z"
        fill="#fff"></path></svg></span><span class=
        "activity-title">hunting</span><span class="activity-listings">Hunting,
        fishing and dogs</span></a><a class=
        "activity-link clearfix motor-sports" data-ua-event=
        "Virb,Click,Activity virb_activities_water,motor sports" href=
        "/en-US/activities/motor/"><span class="icon-wrap"><svg viewbox=
        "0 0 46.9 46.9" xmlns="http://www.w3.org/2000/svg">
        <circle cx="349.1" cy="67.1" fill="#FBD236" r="23.4"></circle>
        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-miterlimit=
        "10" stroke-width="1.5">
            <path d="M340.6 68.8l3.6 1-.6 3.4" stroke-linecap="square"></path>
            <path d="M349.2 77.7l-.1-21.2" stroke-linecap="round"></path>
            <path d="M351.7 58.2l-2.6 2.7-2.7-2.2M346.4 75.3l2.7-2.7 2.6 2.2"
            stroke-linecap="square"></path>
            <path d="M339.8 72.4l18.5-10.5" stroke-linecap="round"></path>
            <path d="M358.1 65l-3.6-1 .6-3.4" stroke-linecap="square"></path>
            <path d="M340 61.2l17.9 11.5" stroke-linecap="round"></path>
            <path d="M354.9 73.9l-.7-3.6 3.3-1.1M343.6 60.2l.7 3.6-3.3 1.1"
            stroke-linecap="square"></path>
        </g>
        <circle cx="23.4" cy="23.5" fill="#FBD236" r="23.4"></circle>
        <path d=
        "M33.3 22.4c-1-.1-1.9 0-2.7.3L29.5 21c.7-.3 1.5-.5 2.4-.5 1.3 0 2.5.4 3.6 1.1.2.2.5.2.7 0 .3-.2.3-.7 0-1-1.2-.9-2.7-1.4-4.3-1.4-.6 0-1.2.1-1.7.2l-.9-1.7c-.2-.4-.5-.6-.9-.6H27l-.9-1.4-2.7-1c-.3-.1-.6 0-.7.3l-.2.5c0 .1 0 .1.1.2l2.7 1.1 2.4 3.6-1.9.6c-.4.1-.8.1-1.2-.1-1.4-.8-4.5-2.4-6.2-2.5-1.8-.1-7.1.3-8.6.4-.2 0-.2.2-.2.3l.4.6c.1.1.2.2.4.2l7.3.8-1.3 2c-.9-.5-2-.6-3.2-.4-2.1.4-3.8 2.2-4 4.3-.3 3 2 5.5 4.9 5.5 2.2 0 4.1-1.4 4.7-3.4l4.3.9c.4.1.8 0 1.2-.2.1-.1.3-.2.3-.4l3.7-7.4 1.1 1.6c-1.5 1.1-2.3 2.9-1.9 5 .4 1.9 1.9 3.5 3.9 3.9 3.4.6 6.3-2.1 5.9-5.4 0-2.2-1.8-4-4-4.3zm-19 8.7c-2.2 0-4-1.9-3.8-4.2.2-1.6 1.4-2.9 2.9-3.3.9-.2 1.7-.1 2.4.2l-1.7 2.6c-.2.3-.3.8-.1 1.1.1.2.3.3.5.4l3.3.7c-.5 1.4-1.9 2.5-3.5 2.5zm3.8-3.7l-2.5-.5c-.1 0-.2-.2-.1-.3l1.4-2.1c.7.7 1.2 1.8 1.2 2.9zm1.2.3v-.4c0-1.5-.7-2.9-1.8-3.8l1.3-2 4.3 6.4c.2.3-.1.6-.4.5l-3.4-.7zM31.7 31c-1.4-.3-2.5-1.4-2.8-2.8-.4-1.6.3-3.1 1.4-3.9l1.8 2.8c.2.3.5.4.8.2.3-.2.4-.5.2-.8l-1.8-2.7c.7-.3 1.5-.3 2.4 0 1.3.4 2.4 1.5 2.6 2.9.5 2.6-1.9 4.9-4.6 4.3z"
        fill="#fff"></path></svg></span><span class="activity-title">motor
        sports</span><span class="activity-listings">Motocross, touring,
        automotive, motorcycle and aviation</span></a>
    </div>

<table>
<php>


</table>




    
</body>
</html>