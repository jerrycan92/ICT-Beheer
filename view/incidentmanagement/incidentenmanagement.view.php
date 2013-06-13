<?
restrictionCheckStop();
?>
<div class="article">
    <p class="title-big">
        Incidenten Beheer
    </p>
</div>

<div class="page-title">
    <p>
		<?
        while ($show['incident'] = $model->user->getRowFromIncidents()) {
			echo $show['incident']['ID_I'];
			echo $show['incident']['TXT_I_HC_Identificatie'];
			echo $show['incident']['DAT_I_gemeld'];
			echo $show['incident']['DAT_I_Oplossing'];
			echo $show['incident']['FID_I_W'];
		}
		?>
    <p>
</div>