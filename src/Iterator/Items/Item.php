<?php
namespace bz0\RSSReader\Iterator\Items;

class Item{
    private $title;
    private $description;
    private $link;
    private $date;
    
    public function __construct($title, $description, $link, $date){
        $this->title       = $title;
        $this->description = $description;
        $this->link        = $link;
        $this->date        = $date;
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
    
    public function getDate(){
        return $this->date;
    }
}