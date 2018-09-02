<?php
namespace bz0\RSSReader\Iterator\Channel;

class Channel{
    //required
    private $title;
    private $description;
    private $link;
    //option
    private $language;
    private $pubDate;
    private $date;
    private $url;
    private $name;
    private $copyright;
    private $managingEditor;
    private $webMaster;
    private $lastBuildDate;
    private $category;
    private $generator;
    private $docs;
    private $cloud;
    private $ttl;
    private $image;
    private $items;
    private $textinput;
    private $rating;
    private $skipHours;
    private $skipDays;
    
    public function __construct(
        $title, 
        $description,
        $link,
        ChannelOption $ChannelOption
    ){
        //必須
        $this->title       = $title;
        $this->description = $description;
        $this->link        = $link;
        
        //オプション
        $language       = $RSSChannelOption->language;
        $pubDate        = $RSSChannelOption->pubDate;
        $date           = $RSSChannelOption->date;
        $copyright      = $RSSChannelOption->copyright;
        $managingEditor = $RSSChannelOption->managingEditor;
        $webMaster      = $RSSChannelOption->webMaster;
        $lastBuildDate  = $RSSChannelOption->lastBuildDate;
        $category       = $RSSChannelOption->category;
        $generator      = $RSSChannelOption->generator;
        $docs           = $RSSChannelOption->docs;
        $cloud          = $RSSChannelOption->cloud;
        $ttl            = $RSSChannelOption->ttl;
        $image          = $RSSChannelOption->image;
        $rating         = $RSSChannelOption->rating;
        $textInput      = $RSSChannelOption->textInput;
        $skipHours      = $RSSChannelOption->skipHours;
        $skipDays       = $RSSChannelOption->skipDays;
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
    
    public function getLanguage(){
        return $this->description;
    }
    
    public function getPubDate(){
        return $this->date;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function getCopyright(){
        return $this->copyright;
    }
    
    public function getManagingEditor(){
        return $this->copyright;
    }
    
    public function getWebMaster(){
        return $this->webMaster;
    }
}