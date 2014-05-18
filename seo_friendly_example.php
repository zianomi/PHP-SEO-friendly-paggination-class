<?php
require 'PagginatorClass.php';
$total_record = 800;


$pg = new Pagging;
$pg->link('http://zia.localhost/pagging/seo_friendly_example.php');

$pg->recordsPerPage(20);

$pager = $pg->Pagger($total_record);


$sql = "SELECT title FROM table " . $pg->limit();

echo $sql;

echo '<br /><br /><br /><br /><br />';

echo $pager;

echo '<br />';
echo $pg->PageDropDown();

echo '<br />';

echo $pg->JumpMenu();
