<?php
session_start();
if (!session_is_registered('autorizzato')) {
  echo "<h1>Area riservata - accesso negato</h1>";
  die;
}
?>