<?php
include("myparam.inc.php");
// Connexion à la base de données Oracle
$conn = oci_connect(MYUSER, MYPASS, MYHOST);

if (!$conn) {
    $error_message = oci_error();
    trigger_error(htmlentities($error_message['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    //echo "Connexion établie avec succès à la base de données Oracle.<br>";
}
?>
