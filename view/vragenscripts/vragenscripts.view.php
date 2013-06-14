<?
restrictionCheckStop();
?>
<div class="article">
    <p class="title-big">
        Vragenscripts
    </p>
	
    <div class="content">
		<?
        $data['vragenscripts'] = $model->melden->getQuestionscripts();
        while ($show['vragenscript'] = mysql_fetch_assoc($data['incident'])) {
            echo $show['incident']['ID_I'] . "&nbsp;" . $show['incident']['TXT_I_HC_Identificatiecode'] . "<br />";
        }
        ?>
    </div>
</div>