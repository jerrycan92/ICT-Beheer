<?
//restrictionCheckStop();
?>
<div class="article">
    <p class="title-big">
        Incidenten Beheer
    </p>
</div>

<p>
    <?
    $data['incident'] = $model->incidentmanagement->getIncidents();
    while ($show['incident'] = mysql_fetch_assoc($data['incident'])) {
        echo $show['incident']['ID_I'] . "&nbsp;" . $show['incident']['TXT_I_HC_Identificatiecode'] . "<br />";
    }
    ?>
</p>