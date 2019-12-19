
		// const video = document.getElementById('video');
		// const canvas = document.getElementById('canvas');
		// const snap = document.getElementById('image_saver');
		// const apply = document.getElementById('x');
		// const crazy = document.getElementById('love');
		// const crying = document.getElementById('bae');
		// const sharp = document.getElementById('vip');
		// // const un = document.getElementById('un');
		// feed();
		// var context = canvas.getContext('2d');
		// snap.addEventListener("click", function () {
		// 	context.drawImage(video, 0, 0, 416, 300);
		// });
		// function feed() {
		// 	var constrains = {
		// 		video: { width: 416, height: 300 }
		// 	};
		// 	navigator.mediaDevices.getUserMedia(constrains).then(stream => {
		// 		video.srcObject = stream;
		// 	});
		// }
		// apply.addEventListener("click", function() {
		// // 	var x = document.getElementById('stickers').value;
		// // 	if (x == "crazy")
		// // 		context.drawImage(crazy, 20, 20, 80, 80);
		// // 	else if (x == "crying")
		// // 		context.drawImage(crying, 80, 20, 80, 80);
		// // 	else if (x == "sharp")
		// // 		context.drawImage(sharp, 20, 80, 80, 80);
		// // 	else if (x == "un")
		// // 		context.drawImage(un, 80, 80, 80, 80);
		// // 	else
		// 	context.drawImage(video, 0, 0, 416, 300);
		// })
		// var save = document.getElementById("image_saver");
		// save.addEventListener("click", function () {
		// 	var data = "img=" + canvas.toDataURL();
		// 	var xhttp = new XMLHttpRequest();
		// 	xhttp.onreadystatechange = function () {
		// 		if (this.readyState == 4 && this.status == 200) {
		// 			alert("success");
		// 			location.reload();
		// 		}
		// 	};
		// 	xhttp.open("POST", "upload.php", true);
		// 	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// 	xhttp.send(data);
		// });

var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

let constraintObj = {
    audio : false,
    video : true
}
//handle older browsers that might implement getUserMedia differently
if ( navigator.mediaDevices === undefined ) {
    navigator.mediaDevices = {};
    navigator.mediaDevices.getUserMedia = function( constraintObj ) {
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia 
        || navigator.mozGetUserMedia || navigator.oGetUserMedia || navigator.msGetUserMedia;
        if ( !getUserMedia ) {
            return Promise.reject( new Error( 'getUserMedia is not implemented in this browser' ) );
        }
        return new Promise( function( resolve, reject ) {
            getUserMedia.call( navigator, constraintObj, resolve, reject );
        } );
    }
} else {
    navigator.mediaDevices.enumerateDevices();
}

navigator.mediaDevices.getUserMedia( constraintObj ).then( function( mediaStreamObj ) {
//connecting the meadia stream to the video element
var video = document.querySelector( 'video' );
if ( 'srcObject' in video ) {
     //newer versions
     video.srcObject = mediaStreamObj;
} else {
     //old versions
     video.src = window.URL.createObjectURL( mediaStreamObj );
}

//auto show in the video element what is being shown in the video stream
video.onloadedmetadata = function ( ev ) {
     video.play();
};

} ).catch( function( err ) {
    console.log( err.name, err.message );
} );


//funtion to draw an image on the canvas once picture is taken
function snap() {
    var but = document.getElementById( 'image_saver' );
    but.setAttribute( 'type', 'submit' );
    canvas.width = video.clientWidth;
    canvas.height = video.clientHeight;
    context.drawImage( video, 0, 0, canvas.width, canvas.height);
}

//function that enable a draws a sticker onto the canvas
function draw( x, dx, dy ) {
    var image = document.getElementById(x);
    context.drawImage(image, canvas.width - dx, canvas.height - dy, 70, 70);
}

//function creates the image
function finalImage() {
    var element = document.getElementById( 'picture' );
    var img = canvas.toDataURL( 'uploads/png' );
    element.setAttribute('value', img);
}

/*                          Old Work                                        */ 
 const saveButton = document.getElementById('image_saver'); //save button

saveButton.addEventListener('click', function() {
                image = canvas.toDataURL('uploads/png');
                document.getElementById('hidden_data').value = image;
 });
