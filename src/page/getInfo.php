<?php
//print_r($_GET);
  $latitude=$_GET["latitude"];
  $longitude=$_GET["longitude"];
  $email=$_GET["email"];
?>
<div class="row " >
    <div class="col-md-3">
        <img src="<?=$_GET["large"]["path"];?>" class="img-thumbnail" alt="" srcset="">
    </div>
    <div  class="col-md-6">
        <?php echo $_GET["titre"]." ".$_GET["prenom"]." ".$_GET["nom"]."<br />".$_GET["tel"]."<br />".$_GET["date"]."<br />".$_GET["email"]."<br />";?> 
    </div>

    <div class="col-md-3"  > 
        <label for="lat" >Latitude</label>
        <input  class="form-control" type="text" name="lat" id="lat" disabled="disabled">
         <label for="lon" >Longitude</label>
        <input  class="form-control" type="text" name="lon" id="lon" disabled="disabled">
    </div> 
</div>

<div class="row" >
    <div id="carte" style="width: 600px; height: 400px;margin-top:10px"></div>
</div>

<script type="text/javascript">
  $(function() {
    $("#carte").googleMap({
      coords: [<?=$latitude?>, <?=$longitude?>], 
      type: "TERRAIN" 
    })
    $("#carte").addMarker({
      coords: [<?=$latitude?>, <?=$longitude?>], 
      id: 'mark', 
      icon: 'asset/img/map/gmap_pin_orange.png', 
      title: '<?=$email?>',
      draggable: true,
    	success: function(e) {
    	    $("#lat").val(e.lat);
    	    $("#lon").attr("value",e.lon);
    	}	
    });
  })
</script>