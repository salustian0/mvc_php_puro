<?php
/* Smarty version 3.1.36, created on 2021-06-23 14:36:00
  from '/var/www/html/Src/Views/transactions/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60d346d0516e50_82430708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29d273911375e1a1ff7621e802558c9df6174432' => 
    array (
      0 => '/var/www/html/Src/Views/transactions/form.tpl',
      1 => 1624458957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60d346d0516e50_82430708 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
 <form class="validate-form"  action="<?php echo url(((string)$_smarty_tpl->tpl_vars['module']->value)."/submit");?>
" method="post">
 <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['id'];?>
">
    <div class="col-6 m-auto">
        <div class="form-group">
            <label>Pessoa:</label>
            <select class="form-control required" name="idPessoaFk" id="slc_pessoa">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pessoas']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                    <option <?php if ($_smarty_tpl->tpl_vars['selected_pessoa']->value && $_smarty_tpl->tpl_vars['selected_pessoa']->value === $_smarty_tpl->tpl_vars['p']->value['id']) {?>selected<?php }?>  value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['nome'];?>
 - <?php echo $_smarty_tpl->tpl_vars['p']->value['cpf'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="form-group">
            <div id="account-content" style="display: none">
            <label>Contas:</label>
            <select class="form-control required" name="idAccountFk" id="slc_account"></select>
            </div>
            <div id="no-account" class="p-2 text-center" style="display: none">
                <p class="text-warning">Essa pessoa ainda não possui uma conta registrada<br>
                <a href="#">Você pode cadastrar uma conta clicando aqui!</a>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label>Valor:</label>
            <input id="value" name="value" class="form-control required"  type="text" name="account_number" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['value'];?>
">
        </div>
        <div class="form-group">
            <label>Operação:</label>
            <select id="operation" name="operation" class="form-control">
                <!-- Retornando a operação que foi enviada caso haja erros na requisição
                    -> Resolvido após a entrega
                -->
                <option <?php if ($_smarty_tpl->tpl_vars['_data']->value['operation'] === "deposito") {?> selected <?php }?> value="deposito">Depósito</option>
                <option <?php if ($_smarty_tpl->tpl_vars['_data']->value['operation'] === "retirada") {?> selected <?php }?> value="retirada">Retirada</option>
            </select>
        </div>

        <div class="d-flex justify-content-center align-items-center p-5">
            <button id="action" type="submit" class="btn btn-success" name="action" value="save">
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
