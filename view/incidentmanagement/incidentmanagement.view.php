<?
restrictionCheckStop();
?>
<div class="article">
    <p class="title-big">
        Incidenten
    </p>
	
    <div class="content">
		<?
        $data['incident'] = $model->incidentmanagement->getIncidents();
        while ($show['incident'] = mysql_fetch_assoc($data['incident'])) {
            echo $show['incident']['ID_I'] . "&nbsp;" . $show['incident']['TXT_I_HC_Identificatiecode'] . "<br />";
        }
        ?>
    </div>
</div>