<?php
/* Smarty version 3.1.36, created on 2021-06-20 19:03:36
  from '/var/www/html/Src/Views/transactions/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cf9108e81172_46647704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90f983e988a13cb1b627f083fdc758ebec646eb4' => 
    array (
      0 => '/var/www/html/Src/Views/transactions/list.tpl',
      1 => 1624215816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60cf9108e81172_46647704 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid p-2">
<form action="<?php echo url(((string)$_smarty_tpl->tpl_vars['module']->value)."/submit");?>
" method="POST">
  <div class="card text-center">
  <div class="card-header">

    <h3 clas="float-left">Transações</h3>
    <hr>
        <a href="<?php echo url(((string)$_smarty_tpl->tpl_vars['module']->value)."/form");?>
" class="btn btn-success">
            Novo
        </a>
  </div>
  <div class="card-body">
    <h5 class="card-title">Listagem de movimentações</h5>
    <p class="card-text">Nesse módulo você pode visualizar e realizar movimentações bancárias</p>
    <div class="col-8 m-auto">
           <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th class="align-middle text-center">Nome</th>
                    <th class="align-middle text-center">Conta</th>
                    <th class="align-middle text-center">Operação</th>
                    <th class="align-middle text-center">Valor</th>
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
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['l']->value['nome'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['l']->value['account_number'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['l']->value['operation'];?>
</td>
                    <td class="align-middle text-center">
                        <?php if ($_smarty_tpl->tpl_vars['l']->value['operation'] === "deposito") {?>
                            <span class="text-success"><?php echo $_smarty_tpl->tpl_vars['l']->value['value'];?>
</span>
                            <?php } else { ?>
                           <span class="text-danger">-<?php echo $_smarty_tpl->tpl_vars['l']->value['value'];?>
</span>
                        <?php }?>
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
