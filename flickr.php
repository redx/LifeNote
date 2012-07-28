<?php
$doc = new DOMDocument();
@$doc->loadHTMLFile("http://www.flickr.com/explore/interesting/7days/");
$xpath = new DOMXpath($doc);
if($xpath){
   $url = $xpath->query("//td[@class='Photo']/span/a/@href");

   @$doc->loadHTMLFile("http://www.flickr.com".$url->item(0)->nodeValue);
   $xpath = new DOMXpath($doc);

   if($xpath){
      $url = $xpath->query("//div[@class='photo-div']/img/@src");
      $im = @imagecreatefromjpeg($url->item(0)->nodeValue);
      if($im){
         header('content-type: image/jpeg');
         imagejpeg($im);
      }else{
         echo "error";
   }
}
?>