<?php
    include('../secure.php'); // Include the secure page to check if the user is logged in
include('../includes/checkRole.php');
include('../includes/getRecentLogs.php');
    
    checkUserRole('c');


$getRecentLogs = getRecentLogs();

$totalLogs = count($getRecentLogs) > 0 ? true : false;



    
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
        .log-details{
            width:350px;
            max-width: 350px;
            height: auto;
            max-height: 400px;
            background:navy;
            overflow-y: auto;
            margin:0.875rem 20px;
            border-radius: 24px;
            color:#ffffff;
            text-align: center;
        }

        .log-flex{
            display:flex;
            flex-flow: column wrap;
            justify-content: center;
            align-items: center;
        }

        .log-details {
            max-width: 90%; /* Ensure each log entry takes the full width */
            overflow-x: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; 
        }

        .log-details> code {
            text-align: center;

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
            <form id="deleteSceneForm" >
                 <input type="hidden" name="fileId" id='getCurrentWatchId'>
                <input type="hidden" name="filePath" id='getFilePath'>
                <button type="submit" class="delete" name="deleteScene">Skip</button>
            </form>
        </div>
    
        <div id='displayVideos'>
            <div class="history">
                <p>Scenes Sequence</p>
    
            </div>
           <input type="hidden" name="" id='getCurrentId'>
           <input type="hidden" name="" id='getCurrentIndex' >
           <input type="hidden" name="" id='getLastPlayed' val=''>


    
            <div id="playlistContainer" class="recordedrectangle3">
                <p style="font-size:1.2rem;font-weight:500;" id='noContent'>No video available.</p>
            </div>
    
    
        </div>


        <div id='showRecentLogs' class="log-details">
                <h4 style='text-align:center; padding-top:1rem;'>Recent logs</h4>

           <div  class="log-flex">

                <?php
                
                if($totalLogs){
                   
                     foreach ($getRecentLogs as $key => $logs) {
                        ?>
                         <div id='getLogs' class="log-details">
                            <div></div>
                            <code><?php echo $logs['event']; ?></code>
                        </div>
                        
                        <?php
                     }
                   
                  }
                         
                ?>
          
          
           </div>
        </div>
</div>
</body>





<script>

// skip button
$('#deleteSceneForm').submit(function(e){

    e.preventDefault();
    

    let getVideo = $('#localVideo')[0];

    let logFile = getVideo.currentSrc.split('/').pop();
    let getSelectedWatchId = $("#getCurrentWatchId").val();
    let getPath = $('#getFilePath').val();

     $.ajax({
                url: '../includes/deleteScene.php',
                method: 'POST',
                data:{logFile:logFile,fileId:getSelectedWatchId,filePath:getPath},
                dataType:'json',
                success: function(res) {

                    console.log(res,'get res')
                    // Handle success
                    if(res.success){
                        
                       let logsRecent = `<div id='getLogs' class="log-details">
                                                <div></div>
                                                <code>${res.logs[0].events}</code>
                                                    </div>`;


                        $('#getLogs').prepend(logsRecent);

                          Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message, 
                            showConfirmButton: false,
                            timer: 1500
                        });


                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }else{
                          Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.message, 
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Log the error message to the console
                    console.error('Error:', errorThrown);

                    // You can also access additional information like status code and status text
                    console.error('Status Code:', jqXHR.status);
                    console.error('Status Text:', jqXHR.statusText);
                }

    });

})

// if on air
$('#endBtn').click(function(){
         $.ajax({
						url: '../includes/newRecentLogs.php',
						method: 'POST',
						data: { type: 'stream', event: 'ended  a stream' },
						dataType: 'json',
						success: function (res) {
							console.log(res, 'get res');
							// Handle success
							if (res.success) {
								// let logsRecent = `<code>${res.logs[0].events}</code>`;
								let logsRecent = `<div id='getLogs' class="log-details">
                                                <div></div>
                                                <code>${res.logs[0].events}</code>
                                                    </div>`;

                            

                                $('#getLogs').prepend(logsRecent);
                            }
                        },
                        error: function (err) {
                            console.error('Error:', err);
                        },
                    });

})


$('#startBtn').on('click',function(){
    // get the src of video element
    const video =  document.getElementById('localVideo');

   const url = 'wss://websocket-7q4d.onrender.com';
   const local = 'ws://localhost:3000';
    socket = new WebSocket(local);




         
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
                const data = canvas.toDataURL('image/png');
                return data;
            };

            
            const FPS = 3;

            socket.onopen = () => {
                console.log(`Connected to ${socket}`);
                setInterval(() => {
                    socket.send(getFrame());
                }, 500 / FPS);
            };



    socket.onclose = open =>{
        console.log('socket is disconnected');
    }

   socket.onerror = open =>{
        console.log('socket found error' + error);
    }



      $.ajax({
                url: '../includes/newRecentLogs.php',
                method: 'POST',
                data:{type:'stream',event:'started  a stream'},
                dataType:'json',
                success: function(res) {

                    console.log(res,'get res')
                    // Handle success
                    if(res.success){
                        
                       let logsRecent = `<div id='getLogs' class="log-details">
                                                <div></div>
                                                <code>${res.logs[0].events}</code>
                                                    </div>`;

                        $('#getLogs').prepend(logsRecent);
                    }
                },
                error: function(err) {
                    console.error('Error:', err);
     }

    });

 

});


  function appendToScreen(data) {

    console.log(data,'get data');

        try {
            $('#streamPlaceholderImage').hide();

            console.log(data, 'get data');
            const video = document.getElementById('localVideo');
            video.src = data.filePath;
            video.setAttribute('controls',true);


        $('#getCurrentWatchId').val(data.id);
                    // push to viewer side 
         $('#getCurrentId').val(data.id);
         $('#getFilePath').val(data.filePath.split('/').pop());
         $('#getCurrentIndex').val(data.index);
         $('#getLastPlayed').val('');

            // const url = 'wss://websocket-7q4d.onrender.com';
             const local = 'ws://localhost:3000/';
                const socket = new WebSocket(local);


              socket.onopen = open =>{

                const filetoSend = {
                    event:'uploaded',
                    data:data
                }
                  
                     socket.send(JSON.stringify(filetoSend));

            let fileSplit = data.filePath.split('/');
            
                
                $.ajax({
                url: '../includes/uploadRecorded.php',
                method: 'POST',
                data:{fileTitle:data.fileTitle,filePath:data.filePath,logFile:fileSplit.pop()},
                dataType:'json',
                success: function(res) {

                    console.log(res,'get res')
                    // Handle success
                    if(res.success){
                       
                       let logsRecent = `<div id='getLogs' class="log-details">
                                                <div></div>
                                                <code>${res.logs[0].events}</code>
                                                    </div>`;

                        $('#getLogs').prepend(logsRecent);


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

          
               
                res.data.forEach((data,i) => {


                    const resData = {
                        index:i,
                        ...data
                    }

                   
                    

                    const el = `
                        <div style='cursor:pointer;' class="video-preview" onclick="appendToScreen(${JSON.stringify(resData).replace(/"/g, '&quot;')})">
                            <strong>${data.fileTitle}</strong>
                            <video data-title='${data.fileTitle}' id='${data.id}'  muted  width="100%">
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

                    console.log(res,'get res');
                    // Handle success
                    if(res.success){
                   
                         Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message, 
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result,i) =>{
                            const data = {
                            id:result.id,
                            index:i,
                            fileTitle:res.name,
                            filePath:`../ContentCreator/uploads/${res.uploaded}`
                        };


                        let logsRecent = `<div id='getLogs' class="log-details">
                                                <div></div>
                                                <code>${res.logs[0].events}</code>
                                                    </div>`;


                        $('#getLogs').prepend(logsRecent);
                        
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

                    //  stopcamera();
            

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
    socket = new WebSocket(local);


 var localVideo = document.getElementById('localVideo');
      

// localVideo.addEventListener('play', function() {
//     console.log('Video is currently playing');

//     // Send a message to the WebSocket when the video starts playing
//     socket.send(JSON.stringify({ action: 'play' }));
// });

localVideo.addEventListener('ended', function() {
   let getAllPlayList = document.querySelectorAll('.video-preview > video');

    let ctvArrList = Array.from(getAllPlayList);
    let currentId = $('#getCurrentId').val();
    let currentIndex =  Number($('#getCurrentIndex').val());
       

       console.log(currentIndex,'get array list');
       console.log(ctvArrList.length - 1,'get length list');


    if(currentIndex  <= ctvArrList.length -1){
        




    let getId = 0;

 
    ctvArrList.map((item,i) => {

            if(currentId == item.id){
                
                getId = i+1;
             
     
            }
            
    });

    
    //   console.log('get id',getId);

    let isSend = [];

      if(getId < ctvArrList.length){
          ctvArrList.filter((item,i) => i === getId).forEach(item =>{
                    localVideo.src = item.currentSrc;
                    localVideo.play();
                 
                   $('#getCurrentId').val(item.id);
                  
                    isSend.push({
                    valid:true,
                    getSrc:item.currentSrc,
                    getId:item.id,
                    gettitle:item.dataset.title
                   });
                   
            });


           if(isSend.length > 0){
               const local = 'ws://localhost:3000/';
                const socket = new WebSocket(local);


                const data = {
                    id:isSend[0].getId,
                    fileTitle:isSend[0].gettitle,
                    filePath:`../ContentCreator/uploads/${isSend[0].getSrc.split('/').pop()}`,
                };


              socket.onopen = open =>{

                const filetoSend = {
                    event:'uploaded',
                    data:data
                }
                  
                     socket.send(JSON.stringify(filetoSend));

                 let fileSplit = data.filePath.split('/');
                 
            
                
                $.ajax({
                url: '../includes/uploadRecorded.php',
                method: 'POST',
                data:{fileTitle:data.fileTitle,filePath:isSend[0].getSrc,logFile:fileSplit.pop()},
                dataType:'json',
                success: function(res) {

                    console.log(res,'get res')
                    // Handle success
                    if(res.success){
                       
                        let logsRecent = `<div id='getLogs' class="log-details">
                                                <div></div>
                                                <code>${res.logs[0].events}</code>
                                                    </div>`;


                        $('#getLogs').prepend(logsRecent);


                        //   Swal.fire({
                        //     position: 'center',
                        //     icon: 'success',
                        //     title: res.message, 
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // });
                  

                    }
                },
                error: function(err) {
                    console.error('Error:', err);
                }
            });
         }


        }












      }else{
        $('#streamPlaceholderImage').show();
        localVideo.pause();

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

}


    



                

});




</script>



</html>