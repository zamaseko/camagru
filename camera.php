<?php
session_start();
	include_once("head.php");
	$use = $_SESSION['vkey'];
?>
<html>
	<body>
		<div style="text-align:center">
			<div>
				<div>
					<img id="vip" style = "display:inline-block; margin-right:5px;" src="vip.png" alt="vip" width=100 height=100>
					<img id="bae" style = "display:inline-block; margin-right:5px;" src="stickers/bae.png" alt="bae" width=100 height=100>
					<img id="love" style = "display:inline-block; margin-right:5px;" src="stickers/love.png" alt="love" width=100 height=100>
				</div>
				<div style="margin-bottom: 15px">
					<video id="video" autoplay></video><br/>
				</div>
				<div style="margin-bottom: 15px">
					<button class="btn profile_buttons outline" id="shoot" capture="camera">Capture</button>
					<br>
					<select id="stickers" style="font-size: 20px;height: 40px;">
						<option value="none">none</option>
						<option value="vip">vip</option>
						<option value="bae">bae</option>
						<option value="love">love</option>
					</select>
					<br>
					<button class="btn profile_buttons outline" id="apply">Apply</button>
					<button class="btn profile_buttons blue" id="save" name="img">Upload</button>
				</div>
				<div style="margin-bottom: 15px">
						<canvas id="canvas" width=416 height=300></canvas>
				</div>
		</div>
				
				<br>
			</div>
		<div>
	</div> 
	<script>
		
		const video = document.getElementById('video');
		const canvas = document.getElementById('canvas');
		const shoot = document.getElementById('shoot');
		const apply = document.getElementById('apply');
		const vip = document.getElementById('vip');
		const bae = document.getElementById('bae');
		const love = document.getElementById('love');
		feed();
		var context = canvas.getContext('2d');
		shoot.addEventListener("click", function () {
			context.drawImage(video, 0, 0, 416, 300);
		});
		function feed() {
			var constrains = {
				video: { width: 416, height: 300 }
			};
			navigator.mediaDevices.getUserMedia(constrains).then(stream => {
				video.srcObject = stream;
			});
		}
		apply.addEventListener("click", function() {
			var x = document.getElementById('stickers').value;
			if (x == "vip")
				context.drawImage(vip, 20, 20, 80, 80);
			else if (x == "love")
				context.drawImage(bae, 80, 20, 80, 80);
			else if (x == "bae")
				context.drawImage(love, 20, 80, 80, 80);
			else
				context.drawImage(video, 0, 0, 416, 300);
		})
		var save = document.getElementById("save");
		 save.addEventListener("click", function () {
	 //var element = document.getElementById( 'picture' );
    	var img = canvas.toDataURL( 'image/png' );
    	save.setAttribute('value', img);
//	var data = "img=" + canvas.toDataURL();
	//	var xhttp = new XMLHttpRequest();
	//	xhttp.onreadystatechange = function () {
	//		if (this.readyState == 4 && this.status == 200) {
	//			alert("success");
	//		location.reload();
			}
			};
			xhttp.open("POST", "upload.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(data);
		});
	</script>
	</body>
</html>
