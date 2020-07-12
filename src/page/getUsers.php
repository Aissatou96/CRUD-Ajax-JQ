<?php
    session_start();
    include_once "../db/config-connect.php";
    global $con;   
    $tabId=$tab=[];
 
    if($_GET[ID]>0){
      $tabId=array($_GET[ID]);
      $tab=array(CHAMP=>ID);
    }
    if(!isset($_SESSION[PAS])){
      $_SESSION[PAS]=$_GET[NB_ELT]; 
    }

    if($_GET[PAGE] == 1){
        $_SESSION[PAGE]=0;
    }

    $_SESSION[PAGE]++;
    $tab[PAS]=$_SESSION[PAS];
    $tab[NB_ELT]=$_GET[NB_ELT];
    $tab[PAGE]=$_SESSION[PAGE];

    $req = getPrepSel('users',$tab,$_GET[ID]);
   // $tab["req"]=$req;
  
    if($_SESSION[PAS] != $_GET[NB_ELT]){
        $_SESSION[PAS]=$_GET[NB_ELT];
    }   
    $res=select($req,$con,$tabId);
    
    if(count($res)>=1){
      foreach ($res as $key => $value) {
        $t=array(CHAMP=>"user");
        $req = getPrepSel('images',$t);
        $imgs=select($req,$con,array($value[ID]));
        foreach ($imgs as $img) {
            $res[$key][$img['type']]=$img;
        }
      } 
    }

    $tab["value"]=$res;
    $tab[NB_ELT]=count($res);
    $tab["type"]=$_GET[ID];

    echo json_encode($tab);
 ?>