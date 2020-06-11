<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;
use Goutte;


class ScraperController extends Controller
{

    public function GetData()
    {
      $crawler = Goutte::request('GET', 'http://www.mycorporateinfo.com/industry/section/F');
       // $crawler->filter('table tbody tr th')->each(function ($node) {
       //   // dump($node->text());
       //   echo "<h5>".$node->text()."</h5>";
       // });

       $crawler->filter('table tbody')->each(function ($node) {

    // $blogUrl        =  $node->find('tr', 0)->attr('href');

    // $screenshotSrc  =  $node->find('th', 0)->attr('src');

    $title2          =  $node->filter('th')->text();
    $title3          =  $node->filter('td')->text();

    // $previewUrl     =  $node->find('.blog-preview', 0)->attr('href');

    echo "<h4>".$title2."</h4>";
    echo "<h5>".$title3."</h5>";

});

// $crawler->filter('.blog')->each(function ($node) {
//   $blogUrl = $node->filter('.url')->link()->getUri();
//   $screenshotSrc = $node->filter('img')->attr('src');
//   $title = $node->filter('.blog-title')->text();
//   $previewUrl = $node->filter('.blog-preview')->attr('href');
// });
// Create DOM from URL
// Create DOM from URL or file

// $dom = HtmlDomParser::str_get_html( $str );

$dom = HtmlDomParser::file_get_html('http://www.google.com/');
$test = HtmlDomParser::file_get_html('http://www.mycorporateinfo.com/industry/section/F');

$data1 = $test->find('table tr th[1]');
foreach($data1 as $result)
{
    echo $result->plaintext . '<br />';
}

$data = $test->find('table tr td[1]');
foreach($data as $result)
{
    echo $result->plaintext . '<br />';
}


// // Find all images
// foreach($test->find('table tbody') as $element){
//   echo $element->tr . '<br>';
// }
//
//
// // Find all links
// foreach($dom->find('a') as $element){
//   echo $element->href . '<br>';
// }


       // $crawler->filter('ul li')->each(function ($node) {
       //   dump($node->text());
       // });

    }

  public function ExtractData()
  {

    $test = HtmlDomParser::file_get_html('http://www.mycorporateinfo.com/industry/section/F');

    $data1 = $test->find('table tr th[1]');
    foreach($data1 as $result)
    {
        echo $result->plaintext . '<br />';
    }

    $data = $test->find('table tr td[1]');
    foreach($data as $result)
    {
        echo $result->plaintext . '<br />';
    }

    $data2 = $test->find('table tr th[2]');
    foreach($data2 as $result)
    {
        echo $result->plaintext . '<br />';
    }

    $data21 = $test->find('table tr td[2]');
    foreach($data21 as $result)
    {
        echo $result->plaintext . '<br />';
    }

    $data3 = $test->find('table tr th[3]');
    foreach($data3 as $result)
    {
        echo $result->plaintext . '<br />';
    }

    $data31 = $test->find('table tr td[3]');
    foreach($data31 as $result)
    {
        echo $result->plaintext . '<br />';
    }

  }
}
