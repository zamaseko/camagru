<?php
session_start();
include "head.php";
$use = $_SESSION['vkey'];
?>
<html>
<head>
<title>Webcam</title>
<meta charset='utf-8'>
</head>
<body>
<style>
.program
{
	font-style: oblique;
}
	#camera{ 
	display: none;
	}
</style>
<div class="contentarea">
<h1 class="program">
camagru Webcam
</h1>
	<div style="text-align:center">
  <div>
	<img id="vip" style = "display:inline-block; margin-right:5px;" src="vip.png" alt="vip" width=100 height=100>
	<img id="bae" style = "display:inline-block; margin-right:5px;" src="stickers/bae.png" alt="bae" width=100 height=100>
	<img id="love" style = "display:inline-block; margin-right:5px;" src="stickers/love.png" alt="love" width=100 height=100>
  	</div>
	<div class="camera">
    	<video id="video" autoplay>Video stream not available.</video><br>
	</div>
	<div style="margin-bottom: 15px">
    	<button id="shoot">Capture</button><br>
		<select id="stickers" style="font-size: 20px;height: 40px;">
			<option value="none">none</option>
			<option value="vip">vip</option>
			<option value="bae">bae</option>
			<option value="love">love</option>
		</select><br>
		<button class="btn profile_buttons outline" id="apply">Apply</button>
		<button class="btn profile_buttons blue" id="save" name="img">Upload</button>
 	 </div>
	<div style="margin-bottom: 15px">
	<canvas id="canvas" width=500 height=400></canvas>
   </div>
</div>
<script>
(function() {
  // The width and height of the captured photo. We will set the
  // width to the value defined here, but the height will be
  // calculated based on the aspect ratio of the input stream.

	width = 500;
	height = 400;
  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  var streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  var video = null;
  var canvas = null;
  var photo = null;
  var startbutton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    shoot = document.getElementById('shoot');
	apply = document.getElementById('apply');
	vip = document.getElementById('vip');
	bae = document.getElementById('bae');
	love = document.getElementById('love');	

    navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function(stream) {
      video.srcObject = stream;
      video.play();
    })
    .catch(function(err) {
      console.log("An error occurred: " + err);
    });

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
      
        // Firefox currently has a bug where the height can't be read from
        // the video, so we will make assumptions if this happens.
      
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    shoot.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);
    
    clearphoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }
  
  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
	    var context = canvas.getContext('2d');
		
    if (width && height) {
      canvas.width = 500;
      canvas.height = 400;
      context.drawImage(video, 0, 0, 500, 400);
	else
	var x = document.getElementById('stickers').value;
	if(x == "vip")
      context.drawImage(vip, 20, 20, 80, 80);
      context.drawImage(video, 20, 20, 80, 80);
      context.drawImage(video, 20, 20, 80, 80);
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
    } else {
      clearphoto();
    }
  }
	function save(){
	 var element = document.getElementById( 'shoot' );
    var img = canvas.toDataURL( 'image/png' );
    element.setAttribute('value', img);
}
  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
})();
</script>
</body>
</html>
