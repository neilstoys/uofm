<html>
<form action="post-to-get.php" method="post">
<label for="nam">Name</label>
<input type="text" name="name" id="name" placeholder="Name"><br/>
<input type="submit" name="login" value="Press" >
</form>
</html>
<?php
header("Location: show.php?sending=".urlencode($_POST["name"]));
?>



