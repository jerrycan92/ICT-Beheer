<?
restrictionCheckStop();
?>
<div class="article">
    <p class="title-big">
        Vragenscripts
    </p>
	
    <div class="content">
		<?
        $data['questionscripts'] = $model->melden->getQuestionscripts();
        while ($show['questionscript'] = mysql_fetch_assoc($data['questionscripts'])) {
            $questionscript['id'] = $show['questionscript']['ID_Omschrijving'];
			$questionscript['description'] = $show['questionscript']['Omschrijving'];
			
			echo $questionscript['description'] . "<br />";
			
			$data['questions'] = $model->melden->getQuestionsByIDO($questionscript['id']);
			while ($show['question'] = mysql_fetch_assoc($data['questions'])) {
				echo "&nbsp;&nbsp;&nbsp;&gt;&nbsp;" . $show['question']['Vraag'] . "<br />";	
			}
        }
        ?>
    </div>
</div>