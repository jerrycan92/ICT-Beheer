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
		?><table>
			<tr>
				<td>ID</td>
				<td>Identificatiecode</td>
				<td>Datum gemeld</td>
				<td>Datum Oplossing</td>
				<td>* NULL betekent nog niet opgelost</td>
			</tr>
		<?
        while ($show['incident'] = mysql_fetch_assoc($data['incident'])) {
        ?> 
				<tr>
					<td><?$show['incident']['ID_I'];?></td>
					<td><?$show['incident']['TXT_I_HC_Identificatiecode'];?></td> 
					<td><?$show['incident']['DAT_I_gemeld'];?> </td>
					<td><?$show['incident']['DAT_I_Oplossing'];?></td>
				</tr>
		<?
        }
        ?>
		</table>
    </div>
</div>