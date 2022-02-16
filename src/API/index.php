<?php

include "db_connect.php";
$request_method = $_SERVER["REQUEST_METHOD"];

require_once "model/entities/ouvrage.php";



try {
    if (!empty($_GET["demande"])) {
        $url = explode("/", filter_var($_GET["demande"], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case "ouvrages":
                if (empty($url[1])) {
                    getOuvrages();
                } else {
                    getOuvrageByNameType($url[1]); # getOuvrageByNameStyle($url[1]);
                }
                break;
            case "ouvrage":
                if (!empty($url[1])) {
                    getOuvrageById($url[1]);
                } else {
                    throw new Exception("You have not entered the correct Reader number.");
                }
                break;
            default :
                throw new Exception("The request is not valid, check the URL.");
        }
    } else {
        throw new Exception("Data recovery problem.");
    }
} catch (Exception $e) {
    $erreur = ["message" => $e->getMessage(), "code" => $e->getCode()];
    print_r($erreur);
}