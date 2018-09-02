<?php
namespace bz0\RSSReader\Parser;
use bz0\RSSReader\Iterator\RSS1\Items;
use bz0\RSSReader\Iterator\RSS1\Channel;
use bz0\RSSReader\Iterator\RSS1\Channels;
use bz0\RSSReader\Iterator\RSS1\ChannelMember;
use bz0\RSSReader\Iterator\RSS1\ItemMember;
use bz0\RSSReader\Iterator\RSS1\Item;

class RSS1Parser implements Parser{
    private $items;
    private $channels;
    private $channelMember;
    private $xml;
    const NAMESPACE = 'http://purl.org/dc/elements/1.1/';
    
    public function __construct(){
        $this->items         = new Items();
        $this->channels      = new Channels();
        $this->channelMember = new ChannelMember();
    }
    
    public function getChannel($xml){
        //required
        if (isset($xml->channel->title)){
            $this->channelMember->title = $xml->channel->title;
        }

        if (isset($xml->channel->description)){
            $this->channelMember->description = $xml->channel->description;
        }
        
        if (isset($xml->channel->description)){
            $this->channelMember->link = $xml->channel->link;
        }

        //options
        if ($xml->channel->children(self::NAMESPACE) !== null){
            $this->channelMember->options = (array)$xml->channel->children(self::NAMESPACE);
        }
        
        $this->channels->add(new Channel($this->channelMember));
        
        return $this->channels;
    }
    
    public function getItems($xml){
        foreach($xml->item as $item){
            $itemMember = new ItemMember();
            if (isset($item->title)){
                $itemMember->title = $item->title;
            }

            if (isset($item->description)){
                $itemMember->description = $item->description;
            }

            if (isset($item->link)){
                $itemMember->link = $item->link;
            }

            if ($item->children(self::NAMESPACE) !== null){
                $itemMember->options = (array)$item->children(self::NAMESPACE);
            }
            
            $this->items->add(new Item($itemMember));
        }
        
        return $this->items;
    }
    
    public function accept($xml){
        if(isset($xml->channel) &&
           isset($xml->item)){
            return true;   
        }
        
        return false;
    }
}