<?php
include "head.php"; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Camera</title>
    <!--link rel="stylesheet" type="text/css" href="./CSS/camera.css" />
    <link rel="stylesheet" type="text/css" href="./CSS/header.css" /-->
  </head>
  <body>
    <div class="navbar"></div>

    <div class="top-container">
      <!-- <form method="post" action="cam_processer.php">  </form>-->
      <video id="video" height="500" width="500" autoplay>video not available</video>
      <br />
      <div class="stickers">
        <a href="#" id="save_stickers" class="btn btn-light">save sticker</a>
      
              <img
                src="stickers/love.png"
                id="x"
                style="height: 80px; width: 80px;"
                onclick="draw('x', 500, 300);"
              /> 

            <img
              src="stickers/bae.png"
              id="x"
              style="height: 80px; width: 80px;"
              onclick="draw('x', 500, 300);"
            />
            <img
              src="stickers/vip.png"
              id="x"
              style="height: 80px; width: 80px;"
              onclick="draw('x', 500, 300);"
            >
      </div>
      <br />
    <div>
      <button id="photo-button" class="btn btn-dark"onclick="snap();" >Take Photo</button>
       <canvas id="canvas" height="500" width="500"></canvas>
      <button id="clear-button" class="btn btn-light">Clear</button>
      <form action="upload.php" method="POST">
        <input type="hidden" id="hidden_data" name="hidden_id" />
        <input type="submit" class="btn btn-dark" id="image_saver" name="image_saver" value="Save"/>
        <input type="hidden" id="sticker" name="addsticker" />
        <input type="submit" class="btn btn-dark" id="sticker_saver" name="sticker_saver" value="Save sticker"/>
      </form>
    </div>

    <div class="btom-container">
      <div id="photos"></div>
    </div>

    <script src="js/Camera.js"></script>
  </body>
</html>
