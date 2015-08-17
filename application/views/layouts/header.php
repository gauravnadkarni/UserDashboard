<!doctype html>
<html lang="en">
	<head>
		<title><?= $layout_title;?></title>
		<?php $this->layout->addInclude("resources/scripts/jquery.js",true)
				->addInclude("resources/styles/style.css",true);?>
		<?= $this->layout->getIncludes()?>
	</head>
	<body>
	<h1>Hello Boys</h1>