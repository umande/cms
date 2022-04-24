<?php 
    $fname = $_FILES['fileupload']['name'];
    $fsize = $_FILES['fileupload']['size'];
    $ftemp = $_FILES['fileupload']['tmp_name'];
    $er = $_FILES['fileupload']['error'];
    
    $allowed = array("jpg","jpeg","png","gif");
    $endi = strtolower($fname);
    $endi = explode(".",$endi);
    $endi = end($endi);
    // $endi = strtolower(end(explode(".",$fname)));
    $new_name = uniqid("",true);
    if(in_array($endi,$allowed)){
        if($fsize < 200000){
            if(!$er){
                
                move_uploaded_file($ftemp,'../design/img/'.$new_name.'.'.$endi);
                $photo = "$new_name.$endi";
        
            }else{
                array_push($error,"error sending");
            }
        }else{
            array_push($error,"file to rage");
        }
    
    }else{
        array_push($error,"that file is not an image");
    }

?>