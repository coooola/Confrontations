<?php

$hostname='pgsql.olympe.in'; 
$login='0xwok5bn';
$passwd='al18sonsea'; 
$base='0xwok5bn'; 
try
{
	$BDD = new PDO('pgsql:host=pgsql.olympe.in;dbname=0xwok5bn;', '0xwok5bn', 'al18sonsea');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



?>
