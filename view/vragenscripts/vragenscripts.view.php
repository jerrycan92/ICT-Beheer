<?
restrictionCheckStop();
?>
<div class="article">
    <p class="title-big">
        Vragenscripts
    </p>
	
    <div class="paper">
    	<div class="adminControls"><img src="<?=defaults("BASE_SHORT")?>images/icons/document-add.png" width="20" height="20" /></div>
        <p style="font-size: 14px;">
			<?
            $data['questionscripts'] = $model->melden->getQuestionscripts();
            while ($show['questionscript'] = mysql_fetch_assoc($data['questionscripts'])) {
                $questionscript['id'] = $show['questionscript']['ID_Omschrijving'];
                $questionscript['description'] = $show['questionscript']['Omschrijving'];
                ?>
				<font style="font-size: 20px;"><?=$questionscript['description']?>&nbsp;&nbsp;</font><img src="<?=defaults("BASE_SHORT")?>images/icons/edit.png" width="15" height="15" />&nbsp;<img src="<?=defaults("BASE_SHORT")?>images/icons/cross.png" width="15" height="15" /><br />
                <?
                $data['questions'] = $model->melden->getQuestionsByIDO($questionscript['id']);
                while ($show['question'] = mysql_fetch_assoc($data['questions'])) {
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=defaults("BASE_SHORT")?>images/icons/cross.png" width="10" height="10" />&nbsp;<img src="<?=defaults("BASE_SHORT")?>images/icons/edit.png" width="10" height="10" />&nbsp;<?=$show['question']['Vraag']?><br />
                    <?
                }
				
				?>
                <br />
                <?
            }
            ?>
        </p>
    </div>
</div>