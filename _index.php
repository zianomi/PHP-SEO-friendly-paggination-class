<?php
require 'PagginatorClass.php';
$total_record = 800;


$pg = new Pagging;
$pg->link('http://zia.localhost/pagging/_index.php');

$pg->recordsPerPage(20);
$pg->equalTo('=');
$pg->questionMark('?');
$pg->Endsign('&');
$pager = $pg->Pagger($total_record);


$sql = "SELECT title FROM table " . $pg->startCount() . ", ". $pg->endCount();

echo $sql;

echo '<br /><br /><br /><br /><br />';

echo $pager;

echo '<br />';
echo $pg->PageDropDown();

echo '<br />';

echo $pg->JumpMenu();
