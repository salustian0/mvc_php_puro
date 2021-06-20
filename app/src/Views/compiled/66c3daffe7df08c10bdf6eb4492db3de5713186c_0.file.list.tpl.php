<?php
/* Smarty version 3.1.36, created on 2021-06-20 20:07:25
  from '/var/www/html/Src/Views/pessoas/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cf9ffdd81967_08271974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66c3daffe7df08c10bdf6eb4492db3de5713186c' => 
    array (
      0 => '/var/www/html/Src/Views/pessoas/list.tpl',
      1 => 1624219642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60cf9ffdd81967_08271974 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid p-2">
<form action="<?php echo url(((string)$_smarty_tpl->tpl_vars['module']->value)."/submit");?>
" method="POST">
  <div class="card text-center">
  <div class="card-header">

    <h3 clas="float-left">Pessoas</h3>
    <hr>
        <a href="<?php echo url(((string)$_smarty_tpl->tpl_vars['module']->value)."/form");?>
" class="btn btn-success">
            Novo
        </a>
        <button class="btn btn-info" type="submit" name="action" value="form">
            Editar
        </button>
        <button class="btn btn-danger" type="submit" name="action" value="deletion_verification">
            Deletar
        </button>
  </div>
  <div class="card-body">
    <h5 class="card-title">Listagem de pessoas</h5>
    <p class="card-text">Nesse módulo você pode criar, modificar e excluir pessoas</p>
    <div class="col-8 m-auto">
           <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th class="align-middle text-center">@</th>
                    <th class="align-middle text-center">Nome</th>
                    <th class="align-middle text-center">Documento</th>
                    <th class="align-middle text-center">Endereço</th>
                    <th class="align-middle text-center">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_smarty_tpl->tpl_vars['listing']->value) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listing']->value, 'l');
$_smarty_tpl->tpl_vars['l']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->do_else = false;
?>
                <tr>
                    <td class="align-middle text-center">
                        <input type="checkbox" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
">
                    </td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['l']->value['nome'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['l']->value['cpf'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['l']->value['endereco'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['l']->value['dtRegister'];?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                <tr>
                    <td colspan="6">Nenhum dado!</td>
                </tr>
              <?php }?>
            </tbody>
        </table>
    </div>
  </div>
  <div class="card-footer d-flex justify-content-center align-items-center">
      <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

  </div>
</div>
</form>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php }
}
