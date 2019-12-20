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
					<img id="crazy" style = "display:inline-block; margin-right:5px;" src="stickers/vip.png" alt="vip" width=100 height=100>
					<img id="crying" style = "display:inline-block; margin-right:5px;" src="stickers/bae.png" alt="bae" width=100 height=100>
					<img id="sharp" style = "display:inline-block; margin-right:5px;" src="stickers/love.png" alt="love" width=100 height=100>
					<!--img id="un" style = "display:inline-block; margin-right:5px;" src="stickers/un.png" alt="un" width=100 height=100-->
				</div>
				<div style="margin-bottom: 15px">
					<video id="video" autoplay></video><br/>
				</div>
				<div style="margin-bottom: 15px">
					<button class="btn profile_buttons outline" id="snap">Capture</button>
					<br>
					<select id="stickers" style="font-size: 20px;height: 40px;">
						<option value="none">none</option>
						<option value="vip">vip</option>
						<option value="bae">bae</option>
						<option value="love">love</option>
						<!--option value="un">Kim Jon Un</option-->
					</select>
					<br>
					<button class="btn profile_buttons outline" id="apply">Apply</button>
					<button class="btn profile_buttons blue" id="save" name="img">Upload</button>
				</div>
				<div style="margin-bottom: 15px">
						<canvas id="edit" width=416 height=300></canvas>
				</div>
		</div>
				
				<br>
			</div>
		<div>
	</div> 
	<script>
		
		const video = document.getElementById('video');
		const canvas = document.getElementById('edit');
		const snap = document.getElementById('snap');
		const apply = document.getElementById('apply');
		const crazy = document.getElementById('crazy');
		const crying = document.getElementById('crying');
		const sharp = document.getElementById('sharp');
		const un = document.getElementById('un');
		feed();
		var context = canvas.getContext('2d');
		snap.addEventListener("click", function () {
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
				context.drawImage(crazy, 20, 20, 80, 80);
			else if (x == "love")
				context.drawImage(crying, 80, 20, 80, 80);
			else if (x == "bae")
				context.drawImage(sharp, 20, 80, 80, 80);
			// else if (x == "un")
			// 	context.drawImage(un, 80, 80, 80, 80);
			else
				context.drawImage(video, 0, 0, 416, 300);
		})
		var save = document.getElementById("save");
		save.addEventListener("click", function () {
			var data = "img=" + canvas.toDataURL();
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					alert("success");
					location.reload();
				}
			};
			xhttp.open("POST", "upload2.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(data);
		});
	</script>
	</body>
</html>
