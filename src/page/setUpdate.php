<?php
    include_once "../db/config-connect.php";
    global $con;
    $status = 1;
    $data=[];
    $fichier = $message ="";
   
    if(isset($_FILES['file'])){ 
        $info = getimagesize($_FILES['file']['tmp_name']);        
        if(($info['mime'] =='image/jpeg') || ($info['mime'] =='image/png') ||($info['mime'] =='image/gif') ){
            
            $img_name= array("thumbnail"=>48,"medium"=>72,"large"=>128);
            
            $file = $_FILES['file'];
            $type=explode("/", $file['type']);  
            if($file['error']===0){
                $new="asset/img/".$_POST['id']."/";       
                $path = getPath($new);
                $data['table'] = $_POST['table'];
                $data['champ'] ="path";
                if(!is_dir($path)){
                    mkdir($path,0700);
                }

                $rep =$_POST['id']."/";
                $status = uploadFile($file,$rep,$img_name);
                
                if($status != 0){
                    $r=[];
                    foreach ($img_name as $nom => $taille) {
                        $data['val'] =$new.$nom.".".$type[1];
                        if($nom == "thumbnail"){
                            $fichier=$data['val'];
                        }
                        $prepUser=getPrepUp($data,"user",array("type"));
                        $r['id'] =$_POST['id'];
                        $r['type'] =$nom;
                        $id_user=setReq($con,$prepUser,$r);
                    }  
                }
            }        
        }else{
            $status = 0;
            $message = "Erreur de fichier";
        }   
    }else{
        $prepUser=getPrepUp($_POST);
        $d['id']=$_POST['id'];
        $id_user=setReq($con,$prepUser,$d);
    }
   
    $tab['status']= $status;
    $tab['message']= $message;
    $tab['path']= $fichier;
    echo json_encode($tab);
   
 ?>