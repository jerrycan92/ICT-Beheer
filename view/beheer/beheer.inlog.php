<div class="article">
    <p class="title-big">
        Beheer systeem
    </p>
</div>

<div class="page-title">
    <p>
        <?
		if ($_SESSION['restriction']) {
			echo "U word nu uitgelogd.";
			$_SESSION["restriction"] = 0;
		} else {
			if (isset($_POST["password"])) {
				$show['password'] = $model->user->getPasswordByUsername($_POST['username'], "assoc");
				if(md5($_POST["password"]) == $show['password']['Wachtwoord']) {
					$_SESSION["restriction"] = 1;
					echo "U bent ingelogd.";
				}
			} else {
				?> 
                <form action="<?=defaults("BASE_SHORT")?>beheer/inlog/" method="POST">
                    <table>
                        <tr>
                            <td>Gebruikersnaam</td>
                            <td><input type="text" size="10" name="username" />
                        </tr>
                        <tr>
                            <td>Wachtwoord</td>
                            <td><input type="password" size="10" name="password" />
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="button" value="Log in" /></td>
                        </tr>
                    </table>
                </form>
                <?
			}
		}
		?>
    <p>
</div>