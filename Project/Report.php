<?php  
 $connect = mysqli_connect("localhost", "root", "", "project1");  
 $sql = "SELECT * FROM assign";

 
   
 $result = mysqli_query($connect, $sql);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Employee Assign Report</title>  
           <style>
    body {
            background-color:powderblue;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            align-items: center;
            min-height: 100vh;
        }
        
         h1 {
            color: #2003B0;
        }

    fieldset {
        margin: 0 auto;
        width: 60%;
        background-color: #00FFFF;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    input {
        margin: 5px 0;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #d1d1d1;
    }

    th, td {
        border: 1px solid #d1d1d1;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f1f1f1;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e3f2fd;
    }

    #activity-form {
        text-align: center;
    }

    .form-table {
        margin: 0 auto;
    }

    

    .table-container {
        margin: 20px auto;
        text-align: center;
    }
</style>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container">  
                <h1>Employee Assign Report</h1><br /> 
                <fieldset>                
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Eid</th>  
                               <th>Tid</th>
                               
                               <th>Assign Date</th>
                               <th>Remark</th> 
                              
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["Eid"];?></td>  
                               <td><?php echo $row["Tid"]; ?></td> 
                               <td><?php echo $row["Date_assign"]; ?></td>  
                               <td><?php echo $row["Remarks"]; ?></td>
                               
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table> 
                     </fieldset> 
                </div>  
           </div>  
           <br />  
      </body>  
 </html>