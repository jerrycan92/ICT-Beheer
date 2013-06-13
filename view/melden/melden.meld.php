<form method="post" action="<?=defaults("BASE_SHORT")?>melden/vragen/">
    <div class="article" style="margin-top: 100px;">
        <p class="title-big" style="font-size: 60px; line-height: 30px;">
           Probleem?<br />
           <font style="font-size: 20px;">Selecteer het probleem dat u heeft.</font>
        </p>
        <select name="ID_Omschrijving" style="margin-left: 10px; width: 520px; height: 66px;" class="big" >
        	<?
			$actualProblem = "";
    		$data['questionscripts'] = $model->melden->getQuestionscripts();
			while ($show['questionscript'] = mysql_fetch_assoc($data['questionscripts'])) {
				if ($actualProblem != $show['questionscript']['ID_HS']) {
					if ($show['questionscript']['ID_HS'] == 0) {
						?><option disabled="disabled">Programma's</option><?
					} else {
						$show['hardwaresoort'] = $model->hardware->getHardwareSoortByID($show['questionscript']['ID_HS'], "assoc");
						$actualProblem = $show['questionscript']['ID_HS'];
						?>
						<option disabled="disabled"><?=ucfirst($show['hardwaresoort']['TXT_HS_Naam'])?></option>
						<?
					}
				}
				?><option value="<?=$show['questionscript']['ID_Omschrijving']?>"><?=$show['questionscript']['Omschrijving']?></option><?
			}
			?>
        </select>
        <input type="submit" class="big" name="giveQuestions" value="Vragenscript" style="margin-top: -3px;" />
    </div>
</form>