<?php
//echo CURPAGE;
function chkAuth() { // to check user authenticate
	if ( !empty( $_SESSION[ SESSVAR ] ) ) {
		if ( $_SESSION[ SESSVAR ] != session_id() && $_SESSION[ 'logintype' ] != 'Admin' ) {
			$_SESSION[ 'errormsg' ] = 'Invalid page access.';
			$_SESSION[ 'errorValue' ] = 'danger';
			header( 'Location:  index.php' );
			exit;
		}
	} else {
		$_SESSION[ 'errormsg' ] = 'Invalid page access.';
		$_SESSION[ 'errorValue' ] = 'danger';
		header( 'Location: index.php' );
		exit;
	}
}

function chkLogin() { // to check user authenticate
	if ( !empty( $_SESSION[ SESSVAR ] ) ) {
		if ( $_SESSION[ SESSVAR ] == session_id() && $_SESSION[ 'logintype' ] == 'Admin' ) {
			//$_SESSION[ 'errormsg' ] = 'Invalid page access.';
			//$_SESSION[ 'errorValue' ] = 'danger';
			header( 'Location: dashboard' );
			exit;
		}
	}
}
//echo $_SESSION[ SESSVAR ];
switch ( CURPAGE ) {
	case "index.php":
	case "home.php":
	case "login.php":
		$pageTitle = ' Admin';
		$pageKewords = 'admin, Home, vidyarthi';
		chkLogin();
		break;
		
	case "dashboard.php":
		$pageTitle = ' Dashboard';
		$pageKewords = 'admin, Home, HR Managemen';
		chkAuth();
		break;

    case "slider.php":
    case "adduser.php":
    case "testimonials.php":
    case "seo.php":
    case "banneradd.php":
    case "gallery.php":
    case "information.php":
    case "addtestimonial.php":
    case "partner.php":
 
    case "sms.php":
    case "catagory.php":
    case "subcategory.php":
    case "product.php":
    case "funzone.php":
    case "salephone.php":
    case "viewallsale.php":
    case "profile.php":
    case "salephone.php":
    case "viewallsale.php":
    case "receipt.php":
    case "productimage.php":
    case "unit.php":
    case "price.php":
    case "blog.php":
    case "invoice.php":
    case "order.php":




    case "addservice.php":


		$pageTitle = ' admin  | INDIAN Sciencetific Mart';
		$pageKewords = 'admin, Home, HR Management';
		chkAuth();
		break;
	
	case "blank.php":
		$pageTitle = ' admin  | Under Construction';
		$pageKewords = 'admin, Home, HR Management';
		chkAuth();
		break;
	case "404.php":
		$pageTitle = ' admin  | 404! Error';
		$pageKewords = 'consultant, shop, HR Management';
		//chkAuth();	
	default:
		header( "Location: ../404.php" );
}

// setting data