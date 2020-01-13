<?php
//session_start();
	include "head.php";
	$use = $_SESSION['vkey'];
?>
<html>
	<body>
		<div style="text-align:center">
			<div>
				<div>
					<img id="vip" style = "display:inline-block; margin-right:5px;" src="vip.png" alt="vip" width=100 height=100>
					<img id="bae" style = "display:inline-block; margin-right:5px;" src="bae.png" alt="bae" width=100 height=100>
					<img id="love" style = "display:inline-block; margin-right:5px;" src="love.png" alt="love" width=100 height=100>
				</div>
				<div style="margin-bottom: 15px">
					<video id="video" autoplay></video><br/>
				</div>
				<div style="margin-bottom: 15px">
					<button class="btn profile_buttons outline" id="shoot" capture="camera">Shoot</button>
					<br>
					<select id="stickers" style="font-size: 20px;height: 40px;">
						<option value="none">none</option>
						<option value="vip">vip</option>
						<option value="bae">bae</option>
						<option value="love">love</option>
					</select>
					<br>
					<button class="btn profile_buttons outline" id="apply">apply</button>
					<button class="btn profile_buttons blue" id="upload" name="img">upload</button>
				</div>
				<div style="margin-bottom: 15px">
						<canvas id="smile" width=416 height=300></canvas>
				</div>
		</div>
				
				<br>
			</div>
		<div>
	</div> 
	<script>
	
	const video = document.getElementById("video");
	const canvas = document.getElementById("smile");
	const shoot = document.getElementById("shoot");
	const apply = document.getElementById("apply");
	const upload = document.getElementById("upload");
	const vip = document.getElementById("vip");
	const bae = document.getElementById("bae");
	const love = document.getElementById("love");

	activateCam();
		
	var context = canvas.getContext('2d');
	shoot.addEventListener("click", function () {
		context.drawImage(video, 0, 0, 500, 400);
	});
	
	function activateCam() {
		var constrains = {
		video: { width: 500, height: 400}
	};
		navigator.mediaDevices.getUserMedia(constrains).then(stream => {
		video.srcObject = stream;
	});
	}
	
	apply.addEventListener("click", function() {
		var x = document.getElementById("stickers").value;
		if (x == "vip") 
			context.drawImage(vip, 20, 20, 80, 80);
		else if (x == "bae")
			context.drawImage(bae, 20, 20, 80, 80);
		else if (x == "love")
			context.drawImage(love, 20, 20, 80, 80);
		else
			context.drawImage(video, 0, 0, 500, 400);
	});

	
	upload.addEventListener("click", function() {	
		var data = "img=" + canvas.toDataURL();		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
					alert("Picture Uploaded");
					location.reload();
				}
			};
			
			xhttp.open("POST", "upload.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(data);
	
	});
	</script>
	</body>
</html>
