<form method="post" action="<?=defaults("BASE_SHORT")?>melden/vragen/">
    <div class="article" style="margin-top: 100px;">
        <p class="title-big" style="font-size: 60px; line-height: 30px;">
           Probleem?<br />
           <font style="font-size: 20px;">Selecteer het probleem dat u heeft.</font>
        </p>
        <select name="poNR" style="margin-left: 10px; width: 520px; height: 66px;" class="big" >
        	<?
			$actualProblem = "";
    		$data['questionscripts'] = $model->melden->getQuestionscripts();
			while ($show['questionscript'] = mysql_fetch_assoc($data['questionscripts'])) {
				if (!$acutalProblem || $actualProblem != $show['questionscript']['probleem']) {
					?>
                    <option disabled="disabled"><?=$show['questionscript']['probleem']?></option>
                    <?
					$actualProblem = $show['questionscript']['probleem'];	
				}
				?><option value="<?=$show['questionscript']['poNR']?>"><?=$show['questionscript']['omschrijving']?></option><?
			}
			?>
        </select>
        <input type="submit" class="big" name="giveQuestions" value="Vragenscript" style="margin-top: -3px;" />
    </div>
</form>