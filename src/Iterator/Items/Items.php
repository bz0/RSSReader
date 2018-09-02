<?php
namespace bz0\RSSReader\Iterator\Items;

class Items implements IteratorAggregate{
    private $rssItems;
    public function __construct(){
        $this->rssItems = new ArrayObject();
    }
    public function add(RSSItem $rssItem){
        $this->rssItems[] = $rssItem;
    }
    public function getIterator(){
        return $this->rssItems->getIterator();
    }
}