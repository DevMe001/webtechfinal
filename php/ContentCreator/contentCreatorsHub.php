<?php
    include('../secure.php'); // Include the secure page to check if the user is logged in
    include('../includes/checkRole.php');
    checkUserRole('c');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="icon" type="image/x-icon" href="../../style/images/samcis_logo.png" sizes="16x16">
    <title>SLUexposé CCh</title>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.2/socket.io.js"></script>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-form@4.3.0/dist/jquery.form.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../../style/scriptC.js"></script>
    
    <style>
        .hidden{
            display:none;
        }
       [id*="-error"] {
        color:#ff3333  !important;
        text-transform: none !important;
        }
        .wrapper{
            width:100%;
            max-width: 90rem;
            margin-inline:auto;
        }
    </style>
</head>
<body>
    <?php
        include('../includes/headerHub.php');
    ?>
<div class='wrapper'>
    
    <div style="overflow-y:auto;" class="upload-container">
        <div class="upload">
            <!-- File Upload -->
            <div class="contentTitle">Register content</div><br>
            <label for="videoUpload">Upload File:</label>
            <form id='uploadFormData'  enctype="multipart/form-data" novalidate>
                <input style="width:100%;" type="text" name="fileTitle" placeholder="Enter File Title" required>
                <label style="padding:0.5rem 1rem;background:#ffffff;color:#000;cursor:pointer; margin-block:1rem;" for='videoUpload'>Upload File</label>
                <input style='display:none;' type="file" name="videoFile" id="videoUpload" accept="video/*" onchange="previewVideo(event,'videoUpload')" required>
                <label id="videoUpload-error" class="error hidden" >This field is required.</label>
                <p id='showFilePath'></p>
                <button style="margin-block:1rem;" class="uploadvideo" type="submit">Submit</button>
            </form><br>
            <label for="videoLabel" class='hidden'>Preview:</label>
            <video id="videoPreview" controls style="display:none;"></video>
        </div>
    </div>

    <div class="livestream">
        <div class="livestream2">Livestream</div>
        <div id='onAir' class="onAir cursor-pointer">ON AIR</div>
        <br>
        <div class="recordedrectangle2">
            <video id="localVideo" autoplay playsinline controls  style="width: 700px; height: 393.75px;"></video>
            <!-- Add the image element for stream placeholder -->
            <img id="streamPlaceholderImage" class="hidden" src="../../style/images/schedule.png" alt="Stream Placeholder">
        </div>
    </div>

    <div class="controls">
        <div class="button-container">
            <!-- Camera Buttons -->
            <button class="startcamera" id="startBtn">Start Camera</button>
            <button class="endcamera" onclick="stopcamera()" id="endBtn">End Camera</button>
        </div>

    <div class="reminder">
        <?php include('../includes/time.php'); ?>
            <h3>STAY ON THIS PAGE WHEN THE STREAM IS ABOUT TO BEGIN</h3>
        </div>
    
        <div class="deletescene">
            <div class="contentTitle">Skip Video</div>
            <form id="deleteSceneForm" action="../includes/deleteScene.php" method="POST">
                <button type="submit" class="delete" name="deleteScene">Skip</button>
            </form>
        </div>
    
        <div id='displayVideos'>
            <div class="history">
                <p>Scenes Sequence</p>
    
            </div>
    
    
            <div id="playlistContainer" class="recordedrectangle3">
                <p style="font-size:1.2rem;font-weight:500;" id='noContent'>No video available.</p>
            </div>
    
    
        </div>
</div>
</body>





<script>
// if on air


$('#startBtn').on('click',function(){
    // get the src of video element
    const video =  document.getElementById('localVideo');

   const url = 'wss://websocket-7q4d.onrender.com';
   const local = 'ws://localhost:3000';
    socket = new WebSocket(url);




         
     navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

        // Capture audio and video streams
            navigator.mediaDevices.getUserMedia({
                video: {
                    width: 426,
                    height: 240
                },
                    audio: true
            })
            .then((stream) => {
                video.srcObject = stream

                


            })
            .catch(error => console.error('Error accessing camera:', error));


        // Returns a frame encoded in base64
            const getFrame = () => {
                const canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0);
                const data = canvas.toDataURL('video/webm');
                return data;
            };

            
            const FPS = 3;

            socket.onopen = () => {
                console.log(`Connected to ${socket}`);
                setInterval(() => {
                    socket.send(getFrame());
                }, 100 / FPS);
            };



    socket.onclose = open =>{
        console.log('socket is disconnected');
    }

   socket.onerror = open =>{
        console.log('socket found error' + error);
    }



 

});


  function appendToScreen(data) {
        try {
            $('#streamPlaceholderImage').hide();

            console.log(data, 'get data');
            const video = document.getElementById('localVideo');
            video.src = data.filePath;
            video.setAttribute('controls',true);

                    // push to viewer side 

            const url = 'wss://websocket-7q4d.onrender.com';
             const local = 'ws://localhost:3000/';
                const socket = new WebSocket(url);


              socket.onopen = open =>{

                const filetoSend = {
                    event:'uploaded',
                    data:data
                }
                  
                     socket.send(JSON.stringify(filetoSend));

                
                $.ajax({
                url: '../includes/uploadRecorded.php',
                method: 'POST',
                data:{fileTitle:data.fileTitle,filePath:data.filePath},
                dataType:'json',
                success: function(res) {

                    console.log(res,'get res')
                    // Handle success
                    if(res.success){
                        console.log(res)
                          Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message, 
                            showConfirmButton: false,
                            timer: 1500
                        });
                  

                    }
                },
                error: function(err) {
                    console.error('Error:', err);
                }
            });



              }

        } catch (error) {
            console.error('Error parsing JSON:', error);
        }
}



$(document).ready(function() {
    $.ajax({
        url: '../includes/displayVideos.php',
        method: 'GET',
        dataType: 'json',
        success: function(res) {
            console.log(res, 'get response');

            if (res.data.length > 0) {

                $('#noContent').hide();
               
                res.data.forEach(data => {

                   

                    const el = `
                        <div style='cursor:pointer;' class="video-preview" onclick="appendToScreen(${JSON.stringify(data).replace(/"/g, '&quot;')})">
                            <strong>${data.fileTitle}</strong>
                            <video  muted  width="100%">
                                <source src="${data.filePath}" type="video/mp4">
                                Your browser does not support the video tag
                            </video>
                        </div>`;

                    

               
            
                    $('#playlistContainer').append(el);
                  
                });

                    stopcamera();

                   $('#playlistContainer').show();
                     $('#streamPlaceholderImage').hide();
            }
        },
        error: function(err) {
            console.error('Error:', err);
        }
    });

    $('#uploadFormData').validate({
        rules: {
            // Define your validation rules here
            fileTitle:{
                required:true
            },
            videoUpload: {
                required: true,
            },
        },
        messages: {
            fileTitle:{
                required:'File name is not empty.'
            },
           videoUpload: {
                required: 'Please upload a valid file.',
                accept: 'Only MP4, AVI, MKV, MOV, and WMV files are allowed.',
            },
            // Define your validation messages here
        }
    });




      
    $('#uploadFormData').submit(function(e) {
        e.preventDefault();

        const check = $('#uploadFormData').valid();

        if (check) {
             const formData = new FormData(this);
            $.ajax({
                url: '../includes/upload.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType:'json',
                success: function(res) {

                    console.log(res,'get res')
                    // Handle success
                    if(res.success){
                   
                         Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message, 
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) =>{
                            const data = {
                            fileTitle:res.name,
                            filePath:`../ContentCreator/uploads/${res.uploaded}`
                        };
                        
                        const el = `
                        <div style='cursor:pointer;' class="video-preview" onclick="appendToScreen(${JSON.stringify(data).replace(/"/g, '&quot;')})">
                            <strong>${data.fileTitle}</strong>
                            <video controls width="100%">
                                <source src="${data.filePath}" type="video/mp4">
                                Your browser does not support the video tag
                            </video>
                        </div>`;

                     $('#playlistContainer').prepend(el);

                      
                     appendToScreen(data);

                     stopcamera();
            

                     $('#playlistContainer').show();
                     $('#streamPlaceholderImage').hide();
                        

                });

                   
                        


                    }else{

                        console.log(res.message);
                          $("#videoUpload-error").show();
                          $("#videoUpload-error").text(res.message)

                    }
                },
                error: function(err) {
                    console.error('Error:', err);
                }
            });
        }
    });
  
});



   const url = 'wss://websocket-7q4d.onrender.com';
   const local = 'ws://localhost:3000';
    socket = new WebSocket(url);


 var localVideo = document.getElementById('localVideo');
      

localVideo.addEventListener('play', function() {
    console.log('Video is currently playing');

    // Send a message to the WebSocket when the video starts playing
    socket.send(JSON.stringify({ action: 'play' }));
});

localVideo.addEventListener('pause', function() {
    console.log('Video is currently paused');

    // Send a message to the WebSocket when the video is paused
    socket.send(JSON.stringify({ action: 'pause' }));
});

    



</script>



</html>