<?
restrictionCheckStop();
?>
<div class="article">
    <p class="title-big">
        Incident: <?=$controller->segments(3)?>
    </p>
	<?
	
	?>
    <div class="content">
		<form action="<?=defaults("BASE_SHORT")?>incidentmanagement/edit/<?=$controller->segments(3)?>/" method="POST" >
			<table>
				<tr>
					<td>Klik op opgelost als het incident is verholpen:</td>
					<td><input type="button" name="opgelost" value="Opgelost" /></td>
				</tr>
				<tr></tr>
				<tr>
					<td>Verander identificatiecode</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="txt" name="idcode" /></td>
					<td><input type="button" name="idcodeop" value="verzend"</td>
				</tr>
			</table>
		</form>	
    </div>
</div>