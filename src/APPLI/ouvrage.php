<?php

$ouvrage = json_decode("localhost/API_REST/src/API/ouvrage/" . $_GET["numero"]);
ob_start();

?>

    <h1>Ouvrage : <?= $ouvrage->TitreVO ?> - <?= $ouvrage->IdType ?></h1>
    <img src="$ouvrage->image ?>" width="400px"/>
    <div>
        <?= $ouvrage->AnneePremiereParution ?>
    </div>

<?php

$content = ob_get_clean();
require_once "template.php";