<?php 

namespace NR\Vimeo;

function getVideo($id) {
	if ($id) {
	    $data = file_get_contents("http://vimeo.com/api/v2/video/$id.json");
	    $data = json_decode($data);
	    return $data[0];
	}
}