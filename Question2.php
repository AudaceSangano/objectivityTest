<?php
   class UrlShortener {
    private $urls;
  
    public function __construct() {
      $this->urls = [];
    }
  
    public function shorten($longUrl) {
      $shortUrl = $this->generateShortUrl();
      $this->urls[$shortUrl] = $longUrl;
      return $shortUrl;
    }
  
    public function expand($shortUrl) {
      if (isset($this->urls[$shortUrl])) {
        return $this->urls[$shortUrl];
      } else {
        return null;
      }
    }
  
    private function generateShortUrl() {
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
    $shortUrl = $shortener->shorten('https://www.example.com/somekigaliguysneedsomethingsexpensive');
    echo 'Short URL: ' . $shortUrl . "<br>";

    $longUrl = $shortener->expand($shortUrl);
    echo 'Long URL: ' . $longUrl . "<br>";

  