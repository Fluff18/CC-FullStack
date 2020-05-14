<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("test.xml");

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    #$z=$x->item($i)->getElementsByTagName('url');
    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        $hint = $hint.$y->item(0)->childNodes->item(0)->nodeValue;
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>