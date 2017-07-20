<?php
include_once getObject('especificacao');

$especificacao=new Especificacao();

?>
<form name="Cadastro de Especficacao" method="POST" enctype="multipart/form-data">
    <?php $especificacao->form();?>
</form>
