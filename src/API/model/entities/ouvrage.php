<?php

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

function getOuvrages()
{
    global $conn;
    $query = "SELECT O.IdOuvrage, O.TitreVO, O.TitreTraduit, O.AnneePremiereParution, S.NomS, T.NomT
              FROM Ouvrage O
              INNER JOIN Type T ON O.IdType = T.IdType
              INNER JOIN Style S ON O.IdStyle = S.IdStyle";
    $response = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    /* for ($i = 0; $i < count($response); $i++){
        $response[$i]["image"] = URL . "../../media/img/ouvrage.jpg" . $response[$i]["image"];
    } */

    sendJSON($response);

}

function getOuvrageByNameType($nomT)
{
    global $conn;
    $query = "SELECT O.IdOuvrage, O.TitreVO, O.TitreTraduit, O.AnneePremiereParution, T.NomT
              FROM Ouvrage O
              INNER JOIN Type T ON O.IdType = T.IdType
              WHERE T.NomT = '$nomT'";
    $response = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    sendJSON($response);
}

function getOuvrageByNameStyle($nomS)
{
    global $conn;
    $query = "SELECT O.IdOuvrage, O.TitreVO, O.TitreTraduit, O.AnneePremiereParution, S.NomS
              FROM Ouvrage O
              INNER JOIN Style S ON O.IdStyle = S.IdStyle
              WHERE S.NomS = '$nomS'";
    $response = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    sendJSON($response);
}

function getOuvrageById($idOuvrage)
{
    global $conn;
    $query = "SELECT IdOuvrage, TitreVO, TitreTraduit, AnneePremiereParution
              FROM Ouvrage
              WHERE IdOuvrage = '$idOuvrage';";
    $response = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    sendJSON($response);
}

function sendJSON($infos)
{
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}