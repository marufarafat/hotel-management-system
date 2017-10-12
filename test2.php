<?php

if ($_FILES['userfile']) {
    echo "<pre>";
    var_dump($_FILES['userfile']);
    echo "</pre>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
  Send these files:<br />
  <input name="userfile" type="file" /><br />
  <input type="submit" value="Send files" />
</form>

<select value="B">
  <option value="A">Apple</option>
  <option value="B">Banana</option>
  <option value="C">Cranberry</option>
</select>