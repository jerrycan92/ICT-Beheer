<div class="page-title">
    <p>
        Vragenscript<br />
        <font style="font-size: 15px;">De beste afhandeling, het snelste verder.</font>
    <p>
</div>
<div class="article">
    <p class="title-big">
    	<?
		$show['questionscript'] = $model->melden->getQuestionscriptBypoNR($_POST['poNR'], "assoc");
		?>
		<?=$show['questionscript']['probleem']?>&nbsp;<font style="font-size: 18px;"><?=$show['questionscript']['omschrijving']?></font>
    </p>
    <div class="paper">
    	<?
			$data['questions'] = $model->melden->getQuestionsBypoNR($_POST['poNR']);
			while ($show['question'] = mysql_fetch_assoc($data['questions'])) {
			?>
			<div class="field vragen" id="vraag-<?=$show['question']['vraagNR']?>">
                <label for=""><?=$show['question']['vraag']?></label><br />
                <select name="vraag[<?=$show['question']['vraagNR']?>]" class="meldenVragenAntwoorden" style="margin-left: -6px; margin-top: 10px;">
                	<option>Kiezen</option>
                    <option>Ja</option>
                    <option>Nee</option>
                </select>
                <div class="workaround" id="workaround-<?=$show['question']['vraagNR']?>-ja">
                	<?=$show['question']['ja']?>
                </div>
                <div class="workaround" id="workaround-<?=$show['question']['vraagNR']?>-nee">
                	<?=$show['question']['nee']?>
                </div>
            </div>
			<?
		}
		?>
        <div class="field next">
        	<input type="submit" name="" value="Volgende" style="float: right;" />
        </div>
        <div style="float: none; clear: both; height: 20px;"></div>
    </div>
</div>