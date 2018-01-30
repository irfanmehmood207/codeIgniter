<!DOCTYPE html>
<html lang="en">
<head>
  <title>User List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
			function myFunction() 
			{		
 					var input, filter, table, tr,stuId , firstName, lastName, email, i;
  					input = document.getElementById("myInput");
  					filter = input.value.toUpperCase();
  					table = document.getElementById("myTable");
  					tr = table.getElementsByTagName("tr");
    				  
  					for (i = 1; i < tr.length; i++) 
  	  				{
  						stuId = tr[i].getElementsByTagName("td")[0];
  						firstName = tr[i].getElementsByTagName("td")[1];
  						lastName = 	tr[i].getElementsByTagName("td")[2];
  						email 	= 	tr[i].getElementsByTagName("td")[3];
      					if (stuId.innerHTML.toUpperCase().indexOf(filter) > -1  || firstName.innerHTML.toUpperCase().indexOf(filter) > -1  || lastName.innerHTML.toUpperCase().indexOf(filter) > -1 ) 
          				{
        					tr[i].style.display = "";
      					} 
  						else 
  	  					{
        				tr[i].style.display = "none";
      					}
  					}
			}
  </script>
  <style>
    #pagenation-link a
    {
    	margin-left : 5px;
    	margin-right : 5px;
    
    }
     #pagenation-link a:hover
    {
    	background-color : grey;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>User List</h2>
        <p>The Table Showing Data Of User Fetching From DataBase:</p>   
        <br>
        <div align="left">
		   <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search for names..">
       </div>
       <br> <br>
       <table class="table table-hover" id="myTable">
           <tr>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Lame</th>
              <th>Email</th>
           </tr>
           <?php 
          foreach ($results as $data)
            {
             ?>
           <tr>
              <td><b><?php echo $data->id; ?></b></td>
              <td><?php echo $data->first_name;?></td>
              <td><?php echo $data->last_name;?></td>
              <td><?php echo $data->email;?></td>
              <td><a href="http://localhost/task1/ci/Index.php/index/deleteUserRecord/<?php echo $haveUserId = $data->id?>" onclick="return confirm('Are you sure you want to delete?');">Delete Record</a></td>
			  <td><a href="http://localhost/task1/ci/Index.php/index/viewOfUpdateUserRecord/<?php echo $haveUserId = $data->id?>" onclick="return confirm('Are you sure you want to update?');">Update Record</a></td>
           </tr>
        <?php 
          }
    ?>
  </table>
  <div class="panel-heading">
				<a href="http://localhost/task1/ci/Index.php/index/export_All_User_Data_In_Csv_File" class="btn btn-success pull-right"> <span class="glyphicon glyphicon-download-alt"> Download</span>
					Record</a>
			</div>

  <div id="pagenation-link">
    <?php echo $links; ?> 
  </div>
</div>
</body>
</html>
