<?php
use Vimeo\Vimeo;
$client = new Vimeo(

    //Cliente ID
    "{5895b5c9b1f5d3cced291562cd390dee4c4f3098}", 

    //Cliente Secret
    "{4MN7UmjviyIRSiL48h9dUGr3JIFnnYKIeuVtxfmwa1f2zJT8GGbjErYHffcWUePhpLl7oLuIS8CWBhpTMINxvtwSnNoyL2K53dMbIA5iGcwmXrooy8XmxrWDUWl62uQd}",
    
    //Token 
    "{fd0c42e3724ac663722e3215967fb778}"
);

$file_name = "{/home/rodrigo/Downloads/video}";
$uri = $client->upload($file_name, array(
  "name" => "Name teste",
  "description" => "Descrição teste"
));

echo "Your video URI is: " . $uri;


$response = $client->request($uri . '?fields=transcode.status');
if ($response['body']['transcode']['status'] === 'complete') {
  print 'Your video finished transcoding.';
} elseif ($response['body']['transcode']['status'] === 'in_progress') {
  print 'Your video is still transcoding.';
} else {
  print 'Your video encountered an error during transcoding.';
}

$response = $client->request($uri . '?fields=link');
echo "Your video link is: " . $response['body']['link'];
?>