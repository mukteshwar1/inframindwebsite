<html>
<head>
<title>welcome</title>

<style>
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: #00FFFF;
}
</style>
<link rel="stylesheet" href="table.css">
</head>
<body>
    <h2>Health Information</h2>
    <p style="text-align:center;"><a href="search.php">Click To Check Medical Records</a></p>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>
                <th >Name</th>
                <th colspan="5">Report</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
            include("database.php");
            $sqlectquery = "select * from user_data";
            $query = mysqli_query($con,$sqlectquery);
            while($res = mysqli_fetch_array($query))
            {
                ?>
                <tr>
                <td><?php echo $res['name'];?></td>
                <td >Blood Sugar:
                <?php if($res['glucose_p']<140 && $res['glucose_p']>0)
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "Normal";
                    var rlt = msg.fontcolor("green");
                    document.write(rlt); 
                    </script>';
                }
                else if($res['glucose_p']>200)
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "Diabetes";
                    var rlt = msg.fontcolor("red");
                    document.write(rlt); 
                    </script>';
                }
                else if($res['glucose_p']>=140 && $res['glucose_p']<=199)
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "Prediabetes";
                    var rlt = msg.fontcolor("orange");
                    document.write(rlt); 
                    </script>';
                }
                else if($res['glucose_p']==0)
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "0";
                    var rlt = msg.fontcolor("red");
                    document.write(rlt); 
                    </script>';
                }
                else
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "High diabetes";
                    var rlt = msg.fontcolor("red");
                    document.write(rlt); 
                    </script>';
                    
                } ?>
                </td>
                <td>
                Bronchiectasis:
               <?php 
                if($res['resp_p']>16)
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "Present";
                    var rlt = msg.fontcolor("red");
                    document.write(rlt); 
                    </script>';
                    
                } 
                else
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "Normal";
                    var rlt = msg.fontcolor("green");
                    document.write(rlt); 
                    </script>';
                }
                ?>

                </td>
                <td>
                CHD:
                <?php
                    if($res['bp']>0 && $res['bp']<130 &&  $res['heart_rate']>0 && $res['heart_rate']<=70 &&  $res['cholesterol_p']>0 && $res['cholesterol_p']<70)
                    {
                        echo '<script type="text/JavaScript">  
                        var msg = "Present";
                        var rlt = msg.fontcolor("red");
                        document.write(rlt); 
                        </script>';
                    }
                    else if($res['bp']==0||$res['heart_rate']==0||$res['cholesterol_p']==0)
                    {
                        echo '<script type="text/JavaScript">  
                        var msg = "0";
                        var rlt = msg.fontcolor("red");
                        document.write(rlt); 
                        </script>'; 
                    }
                    else
                    {
                        echo '<script type="text/JavaScript">  
                        var msg = "Normal";
                        var rlt = msg.fontcolor("green");
                        document.write(rlt); 
                        </script>';
                    }
                ?>
                
                </td>
                <td>
                Hypoxemia:
                <?php

                if($res['oxygen']>=96 && $res['oxygen']<=98)
                    {
                        echo '<script type="text/JavaScript">  
                        var msg = "Normal";
                        var rlt = msg.fontcolor("green");
                        document.write(rlt); 
                        </script>';
                    }
                    else if($res['oxygen']!=0 && $res['oxygen']<96)
                    {
                        echo '<script type="text/JavaScript">  
                        var msg = "Present";
                        var rlt = msg.fontcolor("red");
                        document.write(rlt); 
                        </script>';
                    }
                    else if($res['oxygen']>98)
                    {
                        echo '<script type="text/JavaScript">  
                        var msg = "High";
                        var rlt = msg.fontcolor("red");
                        document.write(rlt); 
                        </script>';
                    }
                    
                    else 
                    {
                        if($res['oxygen']==0)
                        {
                        echo '<script type="text/JavaScript">  
                        var msg = "0";
                        var rlt = msg.fontcolor("red");
                        document.write(rlt); 
                        </script>';
                        }
                    }
                    
                    
                    ?>
                </td>
                <td>Asthma:
                <?php
                if($res['oxygen']>=92 && $res['oxygen']<=95 && $res['bp']>=100 && $res['bp']<=125 && $res['resp_p']>=20 && $res['resp_p']<=30)
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "Present";
                    var rlt = msg.fontcolor("red");
                    document.write(rlt); 
                    </script>';
                    
                } 
                else if($res['oxygen']==0 ||$res['resp_p']==0||$res['bp']==0 )
                    {
                        
                        
                        echo '<script type="text/JavaScript">  
                        var msg = "0";
                        var rlt = msg.fontcolor("red");
                        document.write(rlt); 
                        </script>';
                        
                    }
                else
                {
                    echo '<script type="text/JavaScript">  
                    var msg = "Normal";
                    var rlt = msg.fontcolor("green");
                    document.write(rlt); 
                    </script>';
                }
                ?></td>
                </tr>
                <?php
            }
            ?>           
            <tbody>
        </table>
    </div>
</body>
</html>
