<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo 'Dodge Showroom - ' . $title; ?></title>

	<?php foreach($styles as $style): ?>
		<link rel="stylesheet" href="<?php echo base_url('assets/styles/'.$style) ?>" type="text/css">
	<?php endforeach;?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,600,700,900&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body>
