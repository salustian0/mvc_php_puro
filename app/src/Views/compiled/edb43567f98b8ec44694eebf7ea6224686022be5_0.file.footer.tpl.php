<?php
/* Smarty version 3.1.36, created on 2021-06-23 13:53:22
  from '/var/www/html/Src/Views/elements/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60d33cd241b121_34507712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edb43567f98b8ec44694eebf7ea6224686022be5' => 
    array (
      0 => '/var/www/html/Src/Views/elements/footer.tpl',
      1 => 1624456342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d33cd241b121_34507712 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"><?php echo '</script'; ?>
>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo url("src/public/js/jquery.js");?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo url("src/public/js/masked_input.js");?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
const MODULE_URL = '<?php echo url($_smarty_tpl->tpl_vars['module']->value);?>
';
const BASE_URL = '<?php echo url();?>
';


    <?php if ($_smarty_tpl->tpl_vars['js_const']->value && count($_smarty_tpl->tpl_vars['js_const']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_const']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
            const <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
;
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }
echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['js']->value && count($_smarty_tpl->tpl_vars['js']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo url("src/public/js/".((string)$_smarty_tpl->tpl_vars['v']->value));?>
"><?php echo '</script'; ?>
>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
<footer class="col-12 bg-dark text-center py-2 text-light position-fixed" style="height: 50px; bottom:0; z-index:999">
    <p>Desenvolvido por Renan Salustiano &copy - 2021</p>
</footer>
</body>
</html><?php }
}
