<?php 
// Include the database config file 
include 'action/config.php';
 
if(!empty($_POST["ps_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM price WHERE ps_id = ".$_POST['ps_id'].""; 
    $result = $db->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){  
            echo 'Rs <input type="text" name="price" class="mprice" value="'.$row['price'].'" readonly>
'; 
        } 
    }else{ 
        echo '<option value="">Not available</option>'; 
    } 
}elseif(!empty($_POST["sc_id"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM subject WHERE sc_id = ".$_POST['sc_id'].""; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Subject</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['sb_id'].'">'.$row['name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Subject not available</option>'; 
    } 
}elseif(!empty($_POST["sb_id"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM modules WHERE sb_id = ".$_POST['sb_id'].""; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select modules</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['md_id'].'">'.$row['name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">modules not available</option>'; 
    } 
}  
?>