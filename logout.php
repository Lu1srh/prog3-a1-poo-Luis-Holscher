<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();
Sessao::destruir();
header('Location: login.php?sucesso=Logout realizado com sucesso!');
exit;
?>
