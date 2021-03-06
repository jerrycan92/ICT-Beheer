<div class="page-title">
    <p>
        Vragenscript<br />
        <font style="font-size: 15px;">De beste afhandeling, het snelste verder.</font>
    <p>
</div>
<div class="article">
	<?
	// Indien rapport opsturen
	if ($_POST['send']) {
		?>
        <p class="title-big">
			Rapport opsturen
        </p>
        <div class="paper">
        	<p>
				<?
				// Velden controlleren
                $workaround = $_POST['choosenWorkaround'];
                $hardwareID = $_POST['TXT_HC_Identificatiecode'];
                
                $error = false;
                if (!$model->fieldChecks ($workaround, "isFilled, isNumber")) {
                    $error = true;
                    ?>Er is geen correcte workaround.<br /><?
                }
                if (!$model->fieldChecks ($hardwareID, "isFilled, doesExists", "Hardware_Componenten", "TXT_HC_Identificatiecode")) {
                    $error = true;
                    ?>Het Identificatienummer van het Hardware Component is niet correct ingevuld.<br /><?
                }
                
                if ($error == false) {
					//Opslaan indien geen fouten
                    $model->doQuery("INSERT INTO Incidenten 
                                        (TXT_I_HC_Identificatiecode, DAT_I_gemeld, FID_I_W) VALUES 
                                        ('" . mysql_real_escape_string($hardwareID) . "',
										'" . date("Y-m-d H:i:s") . "',
                                        '" . mysql_real_escape_string($workaround) . "')")
                    ?>
                    Uw incident is succesvol gemeld. We zullen er zo spoedig mogelijk naar kijken.<br />
                    <br />
          			(Workaround nummer: <?=$workaround?><br />
                    Tijd: <?=date("Y-m-d H:i:s")?><br />
            		Hardware ID: <?=$hardwareID?>)
                    <?
                } else {
                    ?><a href="javascript: history.go(-1)">Klik hier</a> om terug te gaan.<?	
                }
                
                ?>
            </p>
        </div>
        <?
	} else {
		?>
        <p class="title-big">
			<?
			// Titel
            $show['questionscript'] = $model->melden->getQuestionscriptByIDO($_POST['ID_Omschrijving'], "assoc");
			if ($show['questionscript']['ID_HS'] == 0) {
				echo "Programma's";
			} else {
				$show['hardwaresoort'] = $model->hardware->getHardwareSoortByID($show['questionscript']['ID_HS'], "assoc");
				echo ucfirst($show['hardwaresoort']['TXT_HS_Naam']);
			}
			?>&nbsp;<font style="font-size: 18px;"><?=$show['questionscript']['Omschrijving']?></font>
        </p>
        <div class="paper">
            <?
			// Vragenscript weergeven
			$data['questions'] = $model->melden->getQuestionsByIDO($_POST['ID_Omschrijving']);
			while ($show['question'] = mysql_fetch_assoc($data['questions'])) {
                ?>
                <div class="field vragen" id="vraag-<?=$show['question']['ID_Vraag']?>">
                    <label for=""><?=$show['question']['Vraag']?></label><br />
                    <select name="vraag[<?=$show['question']['ID_Vraag']?>]" class="meldenVragenAntwoorden" style="margin-left: -6px; margin-top: 10px;">
                        <option>Kiezen</option>
                        <option>Ja</option>
                        <option>Nee</option>
                    </select>
                    <?
                    if (!is_numeric($show['question']['Ja'])) {
                        $ID_W = str_replace("W", "", $show['question']['Ja']);
                    }
                    ?>
                    <div class="workaround <?=$ID_W?>" id="workaround-<?=$show['question']['ID_Vraag']?>-ja">
                        <?
                        if (!is_numeric($show['question']['Ja'])) {
							// Workaround
                            $show['workaround'] = $model->melden->getWorkaroundByID_W($ID_W, "assoc");
                            ?>
                            <?=ucfirst($show['workaround']['TXT_W_Omschrijving'])?>.<br />
                            Workaround: <?=ucfirst($show['workaround']['TXT_W'])?>.
                            <?
                        } else {
							// Volgende vraag
                            echo $show['question']['Ja'];
                        }
                        ?>
                    </div>
                    
                    <?
                    $ID_W = "";
                    if (!is_numeric($show['question']['Nee'])) {
                        $ID_W = str_replace("W", "", $show['question']['Nee']);
                    }
                    ?>
                    <div class="workaround <?=$ID_W?>" id="workaround-<?=$show['question']['ID_Vraag']?>-nee">
                        <?
                        if (!is_numeric($show['question']['Nee'])) {
							// Workaround
                            $show['workaround'] = $model->melden->getWorkaroundByID_W($ID_W, "assoc");
                            ?>
                            <?=ucfirst($show['workaround']['TXT_W_Omschrijving'])?>.<br />
                            Workaround: <?=ucfirst($show['workaround']['TXT_W'])?>.
                            <?
                        } else {
							// Volgende vraag
                            echo $show['question']['Nee'];
                        }
                        ?>
                    </div>
                </div>
                <?
            }
            ?>
            <!-- Formulier -->
            <form method="post" action="<?=defaults("BASE_SHORT")?>melden/vragen/">
                <div class="field next">
                    <input type="hidden" name="choosenWorkaround" value="" />
                    <label for="TXT_HC_Identificatiecode">Identificatienummer Hardware Component</label><br />
                    <select name="TXT_HC_Identificatiecode" style="margin-left: -6px; margin-top: 10px;">
                        <?
                        $data['hardwareIDs'] = $model->hardware->getHardwareIDs();
                        ?>
                        <option value="----">----</option>
                        <?
                        while ($show['hardwareID'] = mysql_fetch_assoc($data['hardwareIDs'])) {
                            ?>
                            <option value="<?=$show['hardwareID']['TXT_HC_Identificatiecode']?>"><?=$show['hardwareID']['TXT_HC_Identificatiecode']?></option>
                            <?
                        }
                        ?>
                    </select>
                    <input type="submit" name="send" value="Stuur rapport" style="float: right; margin-top: 5px;" />
                </div>
            </form>
            <div style="float: none; clear: both; height: 20px;"></div>
        </div>
        <?
	}
	?>
</div>