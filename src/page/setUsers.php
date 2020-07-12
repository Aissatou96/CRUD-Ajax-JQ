<?php
    include_once "../db/config-connect.php";
    global $con;
    $tab_img=$data=[];
    $prepUser = getPrepIns('users'); 
    $prepImg = getPrepIns('images');
    foreach ($_POST as $usr) {
        $imgs = array_pop($usr);
        $id_user=setReq($con,$prepUser,$usr); 
        $usr['id']=$id_user;
        foreach ($imgs as  $type => $img){
            $tab_img=[];
            $tab_img["user"]=$id_user;
            $tab_img["path"]=$img;
            $tab_img["type"]=$type; 
            $id_img=setReq($con,$prepImg,$tab_img);
            $tab_img['id']=$id_img;
            $usr[$type]=$tab_img;
        } 
        $data[]=$usr;
    } 
    
    echo json_encode($data);
?>
