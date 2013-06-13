<div class="article">
    <p class="title-big">
        Inloggen
    </p>
    
	<div class="content">
		<?
        if ($_SESSION['restriction']) {
            $_SESSION["restriction"] = 0;
			?>
            U wordt nu uitgelogd.
            <meta http-equiv="refresh" content="1;url=<?=defaults("HOME")?>" />
            <?
        } else {
            if (isset($_POST["password"])) {
                $show['password'] = $model->user->getPasswordByUsername($_POST['username'], "assoc");
                if(md5($_POST["password"]) == $show['password']['Wachtwoord']) {
                    $_SESSION["restriction"] = 1;
                    ?>
                    U bent ingelogd.
                    <meta http-equiv="refresh" content="1;url=<?=defaults("HOME")?>" />
                    <?
                }
            } else {
                ?> 
                <form action="<?=defaults("BASE_SHORT")?>beheer/inlog/" method="POST">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" size="10" name="username" style="margin-top: 5px; margin-bottom: 10px;" />
                    <label for="password">Wachtwoord</label>
                    <input type="password" size="10" name="password" style="margin-top: 5px; margin-bottom: 5px;" />
                    <input type="submit" name="button" value="Log in" style="float: right;" />
                </form>
                <?
            }
        }
        ?>
    </div>
</div>