<?php
namespace bz0\RSSReader\Parser;

interface Parser{
    public function getChannel($xml);
    public function getItems($xml);
    public function accept($xml);
}