<?php
namespace bz0\RSSReader\Iterator\RSS1;

class Item{
    private $title;
    private $description;
    private $link;
    
    public function __construct(ItemMember $itemMember){
        $this->title       = $itemMember->title;
        $this->description = $itemMember->description;
        $this->link        = $itemMember->link;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function getLink(){
        return $this->link;
    }
}