<?php 

namespace NR\Youtube;

function getVideo($id) {
	if ($id) {
	    $data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=id%2Csnippet&id=$id&key=AIzaSyBKwl6q3Gewt3VXCaeu-cRKTbjAoqYSapo");
	    $data = json_decode($data);
	    return $data->items[0]->snippet;
	}
}