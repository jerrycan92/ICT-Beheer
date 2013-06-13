
<div class="article">
    <p class="title-big">
        Beheer systeem
    </p>
</div>

<div class="page-title">
    <p>
         <?php
		if(isset($_SESSION['restriction'])){
			echo " Welkom " . $ . " bent ingelogd, u kunt nu bovenaan nieuwe menu's selecteren."
		}else{
			if(isset($_POST["password"])){
				if(md5($_POST["password"]) == 1)//SQL SHIT{
						$_SESSION["restriction"] = 1
					}
			}else{
			?> <form action="<?=defaults("BASE_SHORT")?>beheer/inlog/" method="POST">
				<table>
					<tr>
						<td>Gebruikersnaam</td>
						<td><input type="txt" size="10" name="username" />
					</tr>
					<tr>
						<td>Wachtwoord</td>
						<td><input type="password" size="10" name="password" />
					</tr>
					<tr>
						<td></td>
						<td><input type="button" name="button" />Log in</td>
					</tr>
				</table>
			</form>
			<?
			}
		 ?>
    <p>
</div>