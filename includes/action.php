<?php
function onClickButton($button_name, $url) {
    if (isset($_POST[$button_name])) {
      redirect($url);
  }
}

function isButtonReadyClick($button_name) {
  if (isset($_POST[$button_name])) {
    return true;
  }
  return false;
}

?>
