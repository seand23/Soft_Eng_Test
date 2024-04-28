<?php 
require_once '../lib/products/general.php';

$tc1 = new General();
$tc2 = new General();

$tc1->setImageURL("/images/logo.jpg");
$tc1->setProductName("2 Piece");
$tc1->setPrice(99.99);
$tc1->setBrandName("Nike");
$tc1->setColors("Red");
$tc1->setSize("Large");

$tc2->setImageURL("/images/logo.jpg");
$tc2->setProductName("3 Piece");
$tc2->setPrice(199.99);
$tc2->setBrandName("Hugo Boss");
$tc2->setColors("Black");
$tc2->setSize("Medium");

$tc1->displaySuits();
$tc2->displaySuits();