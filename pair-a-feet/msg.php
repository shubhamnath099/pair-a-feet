<?php
if ( !empty( $_SESSION[ 'errormsg' ] ) ) {
	$errormsg = $_SESSION[ 'errormsg' ];
	$errorValue = $_SESSION[ 'errorValue' ];
	?>
	<div class="col-md-12 col-md-offset-2">

		<div class="alert alert-<?= $errorValue; ?> alert-dismissible show" > 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
			<?= $errormsg; ?>
		</div>
	</div>
	<?php
	unset( $_SESSION[ 'errormsg' ] );
	unset( $_SESSION[ 'errorValue' ] );
} else {
	unset( $_SESSION[ 'errormsg' ] );
	unset( $_SESSION[ 'errorValue' ] );
}
?>
<script>
	$( document ).ready( function () {
		$( 'div#shopweb' ).delay( 7200 ).slideUp();
	} );
</script>