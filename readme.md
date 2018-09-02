# RSSReader

RSS1.0,RSS2.0,ATOMに対応したRSSリーダーライブラリです。

```
$url = "xxx.xml";
$reader = new RSSReader();
$reader->setParser(new RSS1Parser());
$reader->parse($url);
```