<?php
namespace bz0\RSSReader\Parser;
class RSS1Parser implements Parser{
    private $rssItems;
    private $rssChannels;
    private $rssChannelOption;
    private $xml;
    const NAMESPACE = 'http://purl.org/dc/elements/1.1/';
    
    public function __construct(){
        $this->rssItems         = new RSSItems();
        $this->rssChannels      = new RSSChannels();
        $this->rssChannelOption = new RSSChannelOption();
    }
    
    public function getChannel($xml){
        $title = "";
        if (isset($xml->channel->title)){
            $title = $xml->channel->title;
        }
        
        $description = "";
        if (isset($xml->channel->description)){
            $description = $xml->channel->description;
        }
        
        $link = "";
        if (isset($xml->channel->description)){
            $link = $xml->channel->link;
        }
        
        if (isset($xml->channel->language)){
            $this->rssChannelOption->language = $xml->channel->language;
        }
        
        if (isset($xml->channel->date)){
            $this->rssChannelOption->pubDate = $xml->channel->date;
        }
        
        $this->rssChannels->add(new RSSChannel(
            $title,
            $description,
            $link,
            $this->rssChannelOption
        ));
        
        return $this->rssChannels;
    }
    
    public function getItems($xml){
        foreach($xml->item as $item){
            $title = "";
            if (isset($item->title)){
                $title = $item->title;
            }
            
            $description = "";
            if (isset($item->description)){
                $description = $item->description;
            }
            
            $link = "";
            if (isset($item->link)){
                $link = $item->link;
            }
            
            $date = "";
            if (isset($item->children(self::NAMESPACE)->date)){
                $date = $item->children(self::NAMESPACE)->date;
            }else if (isset($item->date)){
                $date = $item->date;
            }
            
            $language = "";
            if (isset($item->children(self::NAMESPACE)->language)){
                $language = $item->children(self::NAMESPACE)->language;
            }else if (isset($item->language)){
                $language = $item->language;
            }
            
            $this->rssItems->add(new RSSItem(
                $title,
                $description,
                $link,
                $date
            ));
        }
        
        return $this->rssItems;
    }
    
    public function accept($xml){
        if(isset($xml->channel) &&
           isset($xml->item)){
            return true;   
        }
        
        return false;
    }
}