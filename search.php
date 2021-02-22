<html>
<head>
    <title>search</title>
    <link rel="stylesheet" href="table.css">
    

</head>
<body>
<div style="height:80px;border-radius:20px; padding:5px; 
border: 2px solid #73AD21; width: 25%;background-color: black;">
<br>
    <form action="" method="post" autocomplate="off">
    <lable style="color:white;">Search Medical Record:</lable><br>
    <input type="text" name="uname" placeholder="enter username" required>
    <input type="submit" name="smt" value="Submit"> <a href="code.php" style="width: 30%;color:black; background-color:white;">Back</a>
    </form>
</div>
<h2>Medical Record</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="6">Medical records</th>
            
        </tr>
        </thead>
        <tbody>

         <?php
            include "database.php";
            
            if(isset($_POST['smt']))
            {
                
                $name = $_POST['uname'];
                $q = "SELECT `glucose_p`, `resp_p`, `bp`, `heart_rate`, `cholesterol_p`, `oxygen` FROM `user_data` where name='$name'";
                $query = mysqli_query($con,$q);
                if($res = mysqli_fetch_array($query))
                {
                 ?>

                 <tr>
                 <td><b>Name:  </b><?php echo $name; ?></td>
                    <td><b>Glucose:  </b><?php echo $res['glucose_p']; ?> mg/dL</td>
                    <td><b>Respiration:  </b><?php echo $res['resp_p'];?></td>
                    <td><b>BP:  </b><?php echo $res['bp'];?></td>
                    <td><b>Heart rate:  </b><?php echo $res['heart_rate'];?></td>
                    <td><b>Cholesterol:  </b><?php echo $res['cholesterol_p'];?></td>
                    <td><b>Oxygen:  </b><?php echo $res['oxygen'];?>%</td>
                 </tr>

                <?php
                }  
                else
                {
                    ?>
                    <script>
                    alert("Username Not Prasent Plase Check Username");
                    </script>
                    <?php
                }
            }
           
            ?>
        <tbody>
    </table>
</div>
</body>
</html>