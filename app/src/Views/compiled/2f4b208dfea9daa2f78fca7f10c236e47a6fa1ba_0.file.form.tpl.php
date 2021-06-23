<?php
/* Smarty version 3.1.36, created on 2021-06-23 13:57:02
  from '/var/www/html/Src/Views/accounts/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60d33daeef7396_87672641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f4b208dfea9daa2f78fca7f10c236e47a6fa1ba' => 
    array (
      0 => '/var/www/html/Src/Views/accounts/form.tpl',
      1 => 1624456516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60d33daeef7396_87672641 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
 <form class="validate-form"  action="<?php echo url('accounts/submit');?>
" method="post">
 <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['id'];?>
">
    <div class="col-6 m-auto">
        <div class="form-group">
            <label>Pessoa:</label>
            <select class="form-control required" name="idPessoaFk">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pessoas']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                    <option <?php if ($_smarty_tpl->tpl_vars['_data']->value && count($_smarty_tpl->tpl_vars['_data']->value) && $_smarty_tpl->tpl_vars['_data']->value['idPessoaFk'] === $_smarty_tpl->tpl_vars['p']->value['id'] || $_smarty_tpl->tpl_vars['selected_pessoa']->value === $_smarty_tpl->tpl_vars['p']->value['id']) {?>selected<?php }?>  value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['nome'];?>
 - <?php echo $_smarty_tpl->tpl_vars['p']->value['cpf'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="form-group">
            <label>Número da conta:</label>
            <input class="form-control required"  type="text" name="account_number" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['account_number'];?>
">
        </div>
        <div class="d-flex justify-content-center align-items-center p-5">
            <button  type="submit" class="btn btn-success" name="action" value="save">
                Salvar
            </button>
        </div>
    </div>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php }
}
