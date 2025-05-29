<?php
if ( !empty( $_SESSION[ 'errormsg1' ] ) ) {
	$errormsg = $_SESSION[ 'errormsg1' ];
	$errorValue = $_SESSION[ 'errorValue1' ];
	?>
	<div class="col-md-12 ">

		<div class="alert alert-<?= $errorValue; ?> alert-dismissible show" > 
			<a href="cart.php" type="button" class="close"><span aria-hidden="true">View Cart</span></a> 
			<?= $errormsg; ?>
		</div>
	</div>
	<?php
	unset( $_SESSION[ 'errormsg1' ] );
	unset( $_SESSION[ 'errorValue1' ] );
} else {
	unset( $_SESSION[ 'errormsg1' ] );
	unset( $_SESSION[ 'errorValue1' ] );
}
?>
<script>
	$( document ).ready( function () {
		$( 'div#shopweb' ).delay( 7200 ).slideUp();
	} );
</script>