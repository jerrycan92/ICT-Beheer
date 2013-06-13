

<div class="article">
    <p class="title-big">
        Beheer systeem
    </p>
</div>

<div class="page-title">
    <p>
    	<?
		if (isset($_SESSION['restriction'])) {
			echo "Welkom bent ingelogd, u kunt nu bovenaan nieuwe menu's selecteren.";
		} else {
			?> 
			<form action="<?=defaults("BASE_SHORT")?>beheer/inlog/" method="POST">
				<table>
					<tr>
						<td>Gebruikersnaam</td>
						<td><input type="txt" size="10" name="username">
					</tr>
					<tr>
						<td>Wachtwoord</td>
						<td><input type="password" size="10" name="password">
					</tr>
				</table>
			</form>
       		<?
		}
		?>
    <p>
</div>