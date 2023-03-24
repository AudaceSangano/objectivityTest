<?php
   class UrlShortener {
    private $urls;
  
    public function __construct() {
      $this->urls = [];
    }
  
    public function shortening($longUrl) {
      $shortUrl = $this->generatingShortUrl();
      $this->urls[$shortUrl] = $longUrl;
      return $shortUrl;
    }
  
    public function expanding($shortUrl) {
      if (isset($this->urls[$shortUrl])) {
        return $this->urls[$shortUrl];
      } else {
        return null;
      }
    }
  
    private function generatingShortUrl() {
      $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $shortUrl = '';
      for ($i = 0; $i < 6; $i++) {
        $randIndex = rand(0, strlen($chars) - 1);
        $shortUrl .= $chars[$randIndex];
      }
      return $shortUrl;
    }
  }

    $shortener = new UrlShortener();
    $shortUrl = $shortener->shortening('https://www.example.com/somekigaliguysneedsomethingsexpensive');
    echo 'Short URL: ' . $shortUrl . "<br>";

    $longUrl = $shortener->expanding($shortUrl);
    echo 'Long URL: ' . $longUrl . "<br>";

  