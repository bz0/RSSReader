<?php
    ini_set('display_errors', 1);
    error_reporting(-1);

    require_once(dirname(__FILE__) . "/vendor/autoload.php");

    //RSS1.0
    use bz0\RSSReader\RSSReader;
    $reader = new RSSReader();
    $url = "https://rss.itmedia.co.jp/rss/1.0/techtarget.xml";
    $rss = $reader->parse($url);

    var_dump($rss);