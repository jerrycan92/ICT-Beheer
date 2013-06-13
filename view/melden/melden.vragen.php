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
                <?
				if (!is_numeric($show['question']['ja'])) {
					$ID_W = str_replace("W", "", $show['question']['ja']);
				}
				?>
                <div class="workaround <?=$ID_W?>" id="workaround-<?=$show['question']['vraagNR']?>-ja">
					<?
					if (!is_numeric($show['question']['ja'])) {
						$show['workaround'] = $model->melden->getWorkaroundByID_W($ID_W, "assoc");
						?>
                        <?=ucfirst($show['workaround']['TXT_W_Omschrijving'])?>.<br />
                        Workaround: <?=ucfirst($show['workaround']['TXT_W'])?>.
                        <?
					} else {
						?>
                        <?=$show['question']['ja']?>
                        <?
					}
					?>
                </div>
                
                <?
				$ID_W = "";
				if (!is_numeric($show['question']['nee'])) {
					$ID_W = str_replace("W", "", $show['question']['nee']);
				}
				?>
                <div class="workaround <?=$ID_W?>" id="workaround-<?=$show['question']['vraagNR']?>-nee">
                	<?
					if (!is_numeric($show['question']['nee'])) {
						$show['workaround'] = $model->melden->getWorkaroundByID_W($ID_W, "assoc");
						?>
                        <?=ucfirst($show['workaround']['TXT_W_Omschrijving'])?>.<br />
                        Workaround: <?=ucfirst($show['workaround']['TXT_W'])?>.
                        <?
					} else {
						?>
                        <?=$show['question']['nee']?>
                        <?
					}
					?>
                </div>
            </div>
			<?
		}
		?>
        <div class="field next">
        	<input type="hidden" name="choosenWorkaround" value="" />
        	<input type="submit" name="next" value="Volgende" style="float: right;" />
        </div>
        <div style="float: none; clear: both; height: 20px;"></div>
    </div>
</div>