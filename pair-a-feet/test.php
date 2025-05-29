
<?php 
	include 'action/config.php';
	include 'action/helper.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
  <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
</head>
<body>
	
                                <div class="produt-variants-size">
                                    <label>Size</label>
                                    <select class="form-control-select" name="ps_id" id="byprice">
                                      <?php 
                                        $p_id = $value->p_id;
                                        $data4 = $db->query("SELECT * FROM `price`");
                                        while($value4 = $data4->fetch_object()){
                                       ?>
                                        <option value="<?=$value4->ps_id;?>" title="M"><?=$value4->name;?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                    <div id="aprice">
                                        
                                    </div>




      <script>
    $(document).ready(function(){
    $('#byprice').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxDatasd.php',
                data:'ps_id='+countryID,
                success:function(html){
                    $('#aprice').html(html);
                }
            }); 
        }else{
            $('#subcategory').html('<option value="">Select category first</option>');
        }
    });

});
</script>

</body>
</html>