<?php
namespace bz0\RSSReader\Iterator\RSS1;

class Items implements \IteratorAggregate{
    private $items;
    public function __construct(){
        $this->rssItems = new \ArrayObject();
    }
    public function add(Item $item){
        $this->rssItems[] = $item;
    }
    public function getIterator(){
        return $this->items->getIterator();
    }
}