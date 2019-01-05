<?php

require_once 'config/config.php';
require_once 'config/modules/hg-api.php';

$hg = new HG_API(HG_API_KEY);
$dolar = $hg->dolar_quotation();


if ( $hg->is_error() == false ){
	$variation = ( $dolar['variation'] < 0  ) ? 'danger' : 'info';
}	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dolar exchange rate</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
				<div class="col-12">
					<p>Dolar exchange rate</p>
					<?php 
					if($hg->is_error() == false):?> 

						<p>USD</p> <span class="badge badge pill badge-<?php echo($variation); ?>"><?php echo $dolar['buy'];?></span>
					
					<?php else: ?> 
					
						<p>USD</p> <span class="badge badge pill badge-danger">Error</span>

					<?php endif; ?>
					
				</div>
		</div>
	</div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>	
</body>
</html>