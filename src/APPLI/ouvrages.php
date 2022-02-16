<?php

$ouvrages = json_decode("localhost/API_REST/src/API/ouvrages");
ob_start();

?>

    <table class="table">
        <tr>
            <td>IdOuvrage :</td>
            <td>TitreVO :</td>
            <td>TitreTraduit :</td>
            <td>AnneePremiereParution :</td>
            <td>NomS :</td>
            <td>NomT :</td>
        </tr>

        <?php foreach ($ouvrages as $ouvrage) : ?>

            <tr>
                <td><?= $ouvrage->IdOuvrage ?></td>
                <td><?= $ouvrage->TitreVO ?></a></td>
                <td><?= $ouvrage->TitreTraduit ?></a></td>
                <td><?= $ouvrage->AnneePremiereParution ?></td>
                <td><?= $ouvrage->NomS ?></a></td>
                <td><?= $ouvrage->NomT ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

<?php

$content = ob_get_clean();
require_once "template.php";