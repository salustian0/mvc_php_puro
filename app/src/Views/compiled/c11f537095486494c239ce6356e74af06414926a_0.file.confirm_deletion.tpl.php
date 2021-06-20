<?php
/* Smarty version 3.1.36, created on 2021-06-20 15:16:53
  from '/var/www/html/Src/Views/confirm_deletion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cf5be57de3f4_83499726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c11f537095486494c239ce6356e74af06414926a' => 
    array (
      0 => '/var/www/html/Src/Views/confirm_deletion.tpl',
      1 => 1624202212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60cf5be57de3f4_83499726 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <form action="<?php echo url(((string)$_smarty_tpl->tpl_vars['module']->value)."/deletion_verification");?>
" method="POST">
    <div class="m-auto my-5">
        <div class="alert alert-info">
            Deseja prosseguir com essa ação?
        </div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ids']->value, 'id');
$_smarty_tpl->tpl_vars['id']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value) {
$_smarty_tpl->tpl_vars['id']->do_else = false;
?>
        <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <button class="btn btn-success" name="action" value="true">
            Sim
        </button>
        <button class="btn btn-danger" name="action" value="false">
            Não
        </button>
    </div>
    </form>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
