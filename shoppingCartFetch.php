<?php
   
    include("connection.php");
    /* Getting the device data */
    $sql ="SELECT *  FROM ShoppingCart";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $phone= array();
        while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
            $phone[]=$row;
        }
    }else{
        echo "0 results";  
    }    
    $conn->close();

    echo '<div class="row">';
    echo '<div class="col-sm-2"></div>';
    echo '<div class="col-sm-8 forSL"><h4>In your shopping cart</h4></div>';
    echo '<div class="col-sm-2"></div>';
    echo '</div>';
    echo '<div class="container-fluid">';
    echo '<div class="row">';
    for($i=0;$i<count($phone);++$i){
         
     echo '<div class="col-sm-3 device">';
     /* Piazzamento imagine */
     echo '<div class="thumbnail" style="height:170px;">'; 
     $img = $sl[0]['ImageName'];
     echo '<img src="Images/' . $img . '">';
     echo '</div>';
     /* Mostra Nome */
     echo '<div>'; 
     echo '<p>'.$sl[0]['Nome'] .'</p>';
     echo '</div>';
    
    /* View button */
        
         echo '<form action="'.$phone[$i]['Template'].'" method="get">';
         echo '<input type="hidden" name="product" value="'.$sl[0]['Nome'].'" />'; 
         echo '<button style="color:red;">View</button>';
         echo '</form>';
    echo '</div>';
    }
    echo '</div>';
    echo '</div>';  
?>