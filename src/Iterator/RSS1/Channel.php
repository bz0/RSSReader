<?php
namespace bz0\RSSReader\Iterator\RSS1;

class Channel{
    //必須
    private $title;
    private $description;
    private $link;
    private $items;

    //image要素があるときだけ必須
    private $image;

    public function __construct(
        ChannelMember $channelMember
    ){
        $this->title       = $channelMember->title;
        $this->description = $channelMember->description;
        $this->link        = $channelMember->link;
        $this->items       = $channelMember->items;
        $this->image       = $channelMember->image;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function getLink(){
        return $this->description;
    }

    public function getItems(){
        return $this->items;
    }

    public function getImage(){
        return $this->image;
    }
}