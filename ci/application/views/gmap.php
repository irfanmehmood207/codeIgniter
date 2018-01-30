<!DOCTYPE html>
<html>
  <head>
    <style>
      #map, #pano 
       {
      	float: left;
        height: 300px;
        width: 50%;
       }
        input[type=text],input[type=email], select, textarea
       {
         width: 100%;
         padding: 12px;
         border: 1px solid #ccc;
         border-radius: 4px;
         box-sizing: border-box;
         margin-top: 6px;
         margin-bottom: 16px;
         resize: vertical;
       }
        input[type=submit] 
       {
         background-color: #4CAF50;
         color: white;
         padding: 12px 20px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
       }
        input[type=submit]:hover 
       {
         background-color: #45a049;
       }
        .container 
       {
       	
         
       }
    </style>
    <script>
     function initialize() 
     {
       //setting coordinates
        var fenway = 
            {
              lat: 33.711558, 
              lng: 73.061050
            };
        var map = new google.maps.Map(document.getElementById('map'), {
          center: fenway,
          zoom: 13
        });
        var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
              position: fenway,
              pov: {
                heading: 34,
                pitch: 10
              }
        });
        map.setStreetView(panorama);
     }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8IH2VEvA7thQc-ilWGFt9gCqZlRqEemI&callback=initialize">
    </script>
       
  </head>
  <body>
    <div id="map"></div>
    <div id="pano"></div>
    <p>.....................................................................................................................</p>
    <p>.....................................................................................................................</p>
    <div class="container">
      <form action="http://localhost/task1/ci/Index.php/index/email" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" pattern="^[A-Za-z ]+$" title="Use Alphabetic Letters Only" name="firstname" placeholder="Your name..">
    
        <label for="lname">Last Name</label>
        <input type="text" id="lname" pattern="^[A-Za-z ]+$" title="Use Alphabetic Letters Only" name="lastname" placeholder="Your last name..">
    
        <label for="email"> Email</label>
        <input type="email" id="email" name="email" placeholder="abc@example.com">
    
    
        <label for="subject">Message</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:150px"></textarea>
    
        <input type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>