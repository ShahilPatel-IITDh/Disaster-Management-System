<?php
//Include database configuration file
include('dbConfig.php');

if(isset($_POST["region_id"]) && !empty($_POST["region_id"])){
    //Get all district data
    $query = $db->query("SELECT * FROM district WHERE region_id = ".$_POST['region_id']."  ORDER BY district_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display district list
    if($rowCount > 0){
        echo '<option value="">Select district</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>';
        }
    }else{
        echo '<option value="">district not available</option>';
    }
}

if(isset($_POST["district_id"]) && !empty($_POST["district_id"])){
    //Get all division data
    $query = $db->query("SELECT * FROM division WHERE district_id = ".$_POST['district_id']." ORDER BY division_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display division list
    if($rowCount > 0){
        echo '<option value="">Select division</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
        }
    }else{
        echo '<option value="">division not available</option>';
    }
}

if(isset($_POST["division_id"]) && !empty($_POST["division_id"])){
    //Get all ward data
    $query = $db->query("SELECT * FROM ward WHERE division_id = ".$_POST['division_id']." ORDER BY ward_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display ward list
    if($rowCount > 0){
        echo '<option value="">Select ward</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['ward_id'].'">'.$row['ward_name'].'</option>';
        }
    }else{
        echo '<option value="">ward not available</option>';
    }
}

if(isset($_POST["ward_id"]) && !empty($_POST["ward_id"])){
    //Get all village data
    $query = $db->query("SELECT * FROM village WHERE ward_id = ".$_POST['ward_id']." ORDER BY village_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display village list
    if($rowCount > 0){
        echo '<option value="">Select village</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['village_id'].'">'.$row['village_name'].'</option>';
        }
    }else{
        echo '<option value="">village not available</option>';
    }
}
?>