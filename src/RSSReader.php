<?php
namespace bz0\RSSReader;

class RSSReader{
    private $parserList;
    
    public function setParser(Parser $parser){
        $this->parserList[] = $parser;
    }
    
    public function read($url){
        $xml = simplexml_load_file($url);
        if (!$xml){
            throw new Exception ('Error: Can not load xml file');
        }
        
        return $xml;
    }
    
    public function parse($url){
        //RSS1.0 2.0 ATOM 形式の違いをチェック
        $xml = $this->read($url);
        $rss = [];
        
        if (!$this->parserList){
            throw new Exception ('Error: Parser not set');
        }
        
        foreach($this->parserList as $parser){
            if ($parser->accept($xml)){
                $rss['channel'] = $parser->getChannel($xml);
                $rss['items']   = $parser->getItems($xml);
                break;
            }
        }
        
        var_dump($rss);
        
        if(!$rss){
            throw new Exception ('Error: Failed to parse rss');
        }
        
        return $rss;
    }
}