<?php
namespace bz0\RSSReader\Iterator\RSS1;
class Channels implements \IteratorAggregate{
    private $rssChannels;
    public function __construct(){
        $this->rssChannels = new \ArrayObject();
    }
    public function add(Channel $rssChannel){
        $this->rssChannels = $rssChannel;
    }
    public function getIterator(){
        return $this->rssChannels->getIterator();
    }
}