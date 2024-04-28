<?php
require_once '../lib/checkout.php';

$tc1 = new Checkout();
$tc2 = new Checkout();

$tc1->setTotalPrice(99.99);
$tc1->setDatePurchase(date("Y-m-d H:i:s"));
$tc1->setUserID(123);

$tc2->setTotalPrice(199.99);
$tc2->setDatePurchase(date("Y-m-d H:i:s"));
$tc2->setUserID(456);

$tc1->displayOrderDetails();
$tc2->displayOrderDetails();
