<?php
/* Smarty version 3.1.36, created on 2021-06-20 20:30:20
  from '/var/www/html/Src/Views/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cfa55ce48359_83033882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27b8f44064a1a82352cf14d6586e9b113c55f3e4' => 
    array (
      0 => '/var/www/html/Src/Views/404.tpl',
      1 => 1624220934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60cfa55ce48359_83033882 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
    <h3>Página não encontrada!</h3><br>
    <a href="<?php echo url('home/index');?>
">Retornar a página principal</a>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php }
}
