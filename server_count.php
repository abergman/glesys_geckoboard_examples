<?php
include('config.php');

$i = 0;
$context = stream_context_create(array(
    'http' => array(
        'header'  => array("Authorization: Basic " . base64_encode("$username:$password"),
			"Content-Type: application/json"
			)
    )
));

$data = json_decode(file_get_contents('https://api.glesys.com/server/list',false,$context));


foreach($data->response->servers as $server){
	$i++;
}


$output = 	array(
			'item' => array(
					array('value'=>$i,'text'=>"Servers in app")
			)
		);

echo json_encode($output);
