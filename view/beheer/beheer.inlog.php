

<div class="article">
    <p class="title-big">
        Beheer systeem
    </p>
</div>

<div class="page-title">
    <p>
         <?php
			if(isset($_SESSION['restriction'])){
			
			}else{
		?> <form action="<?=defaults("BASE_SHORT")?>beheer/inlog/" method="SESSION">
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
			}
		 ?>
    <p>
</div>