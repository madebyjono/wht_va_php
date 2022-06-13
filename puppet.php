<?php

require 'vendor/autoload.php';

use Nesk\Puphpeteer\Puppeteer;

$puppeteer = new Puppeteer;
$browser = $puppeteer->launch();

$page = $browser->newPage();
$page->goto('https://ett.hasil.gov.my/va?lang=EN');
$page->click("#btn_introTeruskan");
$page->waitForTimeout(3000);
$page->select("#sl_jenisPengenalan", "5");
$page->type("#noPengenalan", "PT255340011");
$page->type("input#Nama", "Made by Jono LLP");

$captcha = $page->querySelector(".BDC_CaptchaImageDiv");
$captcha->screenshot(['path' => 'captcha.png']);

$page->screenshot(['path' => 'screenshot.png']);
$browser->close();
