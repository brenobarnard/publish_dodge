<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Error</title>

<link rel="stylesheet" href="<?php echo base_url('assets/styles/errors/error.css');?>">
<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,600,700,900&display=swap" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

</head>
<body>
	<div class="error-page container">
		<i class="icon ion-md-outlet"></i>
		<h1>Oops!!</h1>
		<h2><?php echo $heading; ?></h1>
		<p><?php echo $message; ?></p>
		<a class="icon ion-md-arrow-back back-icon" href="javascript:history.back()"></a>
	</div>
</body>
</html>