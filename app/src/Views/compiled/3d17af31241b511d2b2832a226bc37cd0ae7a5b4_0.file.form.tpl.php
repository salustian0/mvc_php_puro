<?php
/* Smarty version 3.1.36, created on 2021-06-20 20:09:46
  from '/var/www/html/Src/Views/pessoas/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cfa08a061831_24617052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d17af31241b511d2b2832a226bc37cd0ae7a5b4' => 
    array (
      0 => '/var/www/html/Src/Views/pessoas/form.tpl',
      1 => 1624219784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60cfa08a061831_24617052 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
 <form class="validate-form"  action="<?php echo url(((string)$_smarty_tpl->tpl_vars['module']->value)."/submit");?>
" method="post">
 <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['id'];?>
">
    <div class="col-6 m-auto">
        <div class="form-group">
            <label>Nome:</label>
            <input class="form-control required"  type="text" name="nome" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['nome'];?>
">
        </div>
        <div class="form-group">
            <label>Documento:</label>
            <input class="form-control required"  id="docNumber" type="text" name="cpf" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['cpf'];?>
">
        </div>
        <div class="form-group">
            <label>Endereço:</label>
            <input class="form-control required"  type="text" name="endereco" value="<?php echo $_smarty_tpl->tpl_vars['_data']->value['endereco'];?>
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
