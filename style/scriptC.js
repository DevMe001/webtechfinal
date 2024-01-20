/*===========FOR CONTENT CREATOR===========*/

// Define the desired start time (8:00 PM) and end time (18:00 PM)
let desiredStartHour = 8;
let desiredStartMinutes = 0;
let desiredEndHour = 18;
let desiredEndMinutes = 0;// Function to submit the sorting form on change
// document.getElementById('sortOrder').addEventListener('change', function () {
//     document.getElementById('sortForm').submit();
// });

// Function to submit the filtering form on change
// document.getElementById('roleFilter').addEventListener('change', function () {
//     document.getElementById('filterForm').submit();
// });


//FOR STREAM CONTROLS
// Array to store video URLs
let videoQueue = [];

// Function to start a new stream when "startstream" is clicked
function startNewStream() {
    const currentHour = new Date().getHours();

    // Check if the current time is within the desired streaming hours (e.g., between 8 AM and 6 PM)
    if (currentHour >= 8 && currentHour < 18) {
        // Change the color of onAir to red
        document.querySelector('.onAir').style.backgroundColor = 'red';

        // Fetch the list of videos from the server
        fetch('../includes/getVideoList.php')
            .then(response => {
                console.log('Server response:', response); // Log the server response
                return response.json();
            })
            .then(data => {
                console.log('Video list:', data); // Log the fetched video list

                // Populate the videoQueue array with video URLs
                videoQueue = data;

                // Play the first video in the queue when the user clicks the "Start Stream" button
                document.getElementById('startBtn').addEventListener('click', playNextVideo);
            })
            .catch(error => {
                console.error('Error fetching video list:', error);
            });
    } else {
        console.log('Stream cannot be started at the current time.');
    }
}


// Function to start the stream based on the current time
function startStreamAutomatically() {
    const currentHour = new Date().getHours();
    const currentMinutes = new Date().getMinutes();

    // Check if the current time is within the allowed time range
    if (
        (currentHour > desiredStartHour || (currentHour === desiredStartHour && currentMinutes >= desiredStartMinutes)) &&
        (currentHour < desiredEndHour || (currentHour === desiredEndHour && currentMinutes < desiredEndMinutes))
    ) {
        // Change the color of onAir to red
        document.querySelector('.onAir').style.backgroundColor = 'red';

        // Fetch the list of videos from the server
        fetch('../includes/getVideoList.php')
            .then(response => {
                console.log('Server response:', response); // Log the server response
                return response.json();
            })
            .then(data => {
                console.log('Video list:', data); // Log the fetched video list

                // Populate the videoQueue array with video URLs
                videoQueue = data;

                // Play the first video in the queue
                playNextVideo();

                // Hide the placeholder image
                document.getElementById('streamPlaceholderImage').style.display = 'none';
            })
            .catch(error => {
                console.error('Error fetching video list:', error);
            });

        // Stop checking for the start time once the stream has started
        clearInterval(startStreamInterval);
    } else {
        // Display the placeholder image and a message if it's not within the allowed time range
        // document.getElementById('streamPlaceholderImage').style.display = 'block';
        console.log('Stream cannot be started at the current time.');
    }
}

// Check the start time every minute (adjust the interval as needed)
const startStreamInterval = setInterval(() => {
    console.log('setInterval called at:', new Date());
    startStreamAutomatically();
}, 1000); // 60000 milliseconds = 1 minute

// Function to play the next video in the queue
function playNextVideo() {
    console.log('Video queue:', videoQueue); // Log the video queue

    const localVideo = document.getElementById('localVideo');

    // Check if there are videos in the queue
    if (videoQueue.length > 0) {
        const videoUrl = videoQueue.shift(); // Get the URL of the next video
        localVideo.src = videoUrl; // Set the source of the video element
        localVideo.play(); // Play the video

        // Call playNextVideo recursively when the video ends
        localVideo.addEventListener('ended', playNextVideo);
    } else {
        // No more videos in the queue, stop the stream
        stopStream();
    }
}

// Function to stop the video when "endstream" is clicked
function stopStream() {
    // Change the color of onAir to gray
    document.querySelector('.onAir').style.backgroundColor = 'gray';

    // Pause the video
    const localVideo = document.getElementById('localVideo');
    const schedule = document.getElementById('streamPlaceholderImage');

    localVideo.pause();

    // Hide the video element
    localVideo.style.display = 'none';

    // Remove the event listener
    localVideo.removeEventListener('ended', playNextVideo);

    // Set the placeholder image source and display it
    schedule.src = '../../style/images/schedule.png';
    schedule.style.marginTop = '-4px';
    schedule.style.display = 'block';
}

function startStream() {
    document.querySelector(".startstream").disabled = true;
    document.querySelector(".endstream").disabled = false;
}
function endStream() {
    document.querySelector(".startstream").disabled = false;
    document.querySelector(".endstream").disabled = true;
}

// Function to start camera
function camera() {
    navigator.mediaDevices.getUserMedia({ video: true, audio: true })
        .then(function (stream) {
            var localVideo = document.getElementById('localVideo');
            localVideo.srcObject = stream;
            document.getElementById('streamPlaceholderImage').style.display = 'none';
        })
        .catch(function (error) {
            console.error('Error accessing user media:', error);
        });
}

// Function to stop the livestream
function stopcamera() {
	var localVideo = document.getElementById('localVideo');

	// Check if srcObject is set
	if (localVideo.srcObject) {
		var stream = localVideo.srcObject;
		var tracks = stream.getTracks();

		tracks.forEach(function (track) {
			track.stop();
		});

		localVideo.srcObject = null;

		document.getElementById('streamPlaceholderImage').style.display = 'none';
	} else {
		console.error('No video stream to stop.');
	}

   const url = 'wss://websocket-7q4d.onrender.com';
   
   const local = 'ws://localhost:3000';
   socket = new WebSocket(local);

     const filetoSend = {
				event: 'disconnected',
				data: {
					fileTitle: '',
					filePath: '',
				},
			};

    socket.onopen = open =>{
        socket.send(JSON.stringify(filetoSend));
    }


     

}


//FOR UPLOADING VIDEO
function uploadVideo() {
    const input = document.getElementById('videoUpload');
    const file = input.files[0];

    if (file) {
        const formData = new FormData();
        formData.append('video', file);

        fetch('YOUR_UPLOAD_ENDPOINT', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Upload successful:', data);
            // You can handle the response from the server here
        })
        .catch(error => {
            alert('Error uploading video:', error);
        });
    } else {
        alert('No video selected for upload.');
    }
}

function previewVideo(event) {
    
    document.getElementById('videoUpload').classList.remove('hidden');
    
    const input = event.target;
    const videoPreview = document.getElementById('videoPreview');
     
    
    const file = input.files[0];

    if (file) {
        const objectURL = URL.createObjectURL(file);
        videoPreview.src = objectURL;
        videoPreview.style.display = 'block';
    }
}

/*===========FOR STREAMING TO VIEWER===========*/
// const videoElement = document.getElementById('localVideo');
// const streamIdentifier = videoElement.getAttribute('data-stream');

// Establish a WebSocket connection
// const socket = io.connect('http://localhost:3000');

// Listen for video stream updates dynamically
// socket.on('streamVideo', (streamData, index) => {
//     const videoElement = document.getElementById(`localVideo${index}`);
//     if (videoElement) {
//         videoElement.src = `data:video/mp4;base64,${streamData}`;
//     }
// });