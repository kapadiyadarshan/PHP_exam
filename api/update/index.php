<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: PUT, PATCH");

    include("../../config/config.php");

    $res = array();
    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == "PUT" || $_SERVER['REQUEST_METHOD'] == "PATCH") {

        $data = file_get_contents("php://input");
        $record = array();
        parse_str($data,$record); 

        $id = $record['id'];
        $name = $record['name'];
        $release_year = $record['release_year'];
        $imdb = $record['imdb'];
        $duration =$record["duration"];

        $result = $config->update($id,$name,$release_year,$imdb,$duration);

        $res['msg'] = $result ? "Update successfully..." : "Updation failled...";

    }
    else {
        $res['msg'] = "Only PUT or PATCH method is allowed...";
    }

    echo json_encode($res);

?>