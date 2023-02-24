<?php
  $error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

  if (!$error) {
    $error = 'Ooops! An unknown error happened.';
  }
?>
<!DOCTYPE html>
<html>
  <body> <p class="error"><?php echo $error; ?></p> </body>
</html>
