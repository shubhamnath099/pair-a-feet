<?php 

require_once 'config/config.php';
require_once 'config/helper.php';



if (isset($_POST['p_id'])){

	$p_id = $_POST['p_id'];

	$data3 = $db->query("SELECT * FROM product WHERE p_id = '$p_id'");
	echo "";
	while ($value3= $data3->fetch_object()) {
		
		$sprice = $value3->sprice;
		

		echo "<div class='col-md-4'> <div class='form-group'><label>Salary</label><input type='number' value='$sprice' class='form-control input1'  name='salary' readonly=''> </div> </div>";
	
	}
                                


}

 ?>