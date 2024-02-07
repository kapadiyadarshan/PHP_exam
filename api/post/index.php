<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: POST");

    include("../../config/config.php");

    $res = array();
    $config = new config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST["name"];
        $release_year = $_POST["release_year"];
        $imdb = $_POST["imdb"];
        $duration = $_POST["duration"];

        $result = $config->insert($name,$release_year,$imdb,$duration);

        $res["msg"] = $result ? "Successful Inserted..." : "Failed...";

        http_response_code($result ? 201 : 403);
    }
    else
    {
        $res["msg"] = "Only post method is allowed...";
    }

    echo json_encode($res);
?>