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
		?>
        <table>
			<tr>
				<th style="width: 40px; text-align: left;">ID</th>
				<th style="width: 200px; text-align: left;">Identificatiecode</th>
				<th style="width: 200px; text-align: left;">Datum gemeld</th>
				<th style="width: 200px; text-align: left;">Datum Oplossing</th>
			</tr>
			<?
            while ($show['incident'] = mysql_fetch_assoc($data['incident'])) {
            ?> 
                <tr style="font-weight: normal;">
                    <td><?=$show['incident']['ID_I'];?></td>
                    <td><?=$show['incident']['TXT_I_HC_Identificatiecode'];?></td> 
                    <td><?=$show['incident']['DAT_I_gemeld'];?> </td>
                    <td>
						<?
                        if (!$show['incident']['DAT_I_Oplossing']) {
							?>Nog niet opgelost<?
						} else {
							echo $show['incident']['DAT_I_Oplossing'];	
						}
						?>    
                    </td>
					<td><a href="<?=defaults("BASE_SHORT")?>incidentmanagement/edit/<?=$show['incident']['ID_I']?>/">Bewerken</a>
                </tr>
            <?
            }
            ?>
		</table>
    </div>
</div>