<?php
/* Smarty version 3.1.36, created on 2021-06-20 20:48:17
  from '/var/www/html/Src/Views/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cfa9916bcce3_28907831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50a47760ea8b48b9fc4de20bca58bc37007c5d48' => 
    array (
      0 => '/var/www/html/Src/Views/home.tpl',
      1 => 1624222096,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:modal-home.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60cfa9916bcce3_28907831 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:modal-home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">

    <div class="col-8 m-auto">
    <button class="btn btn-info my-2" id="click-me">
        Click me
    </button>
        <div class=" alert alert-info">
            Olá, voê pode gerenciar movimentações, pessoas e contas utilizando o menu a cima</br>
            A baixo você pode acompanhar um resumo das últimas movimentações realizadas
        </div>

        <div class=" alert alert-warning">
            A baixo você pode acompanhar um resumo das últimas movimentações realizadas
        </div>
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th class="align-middle text-center">Nome</th>
                    <th class="align-middle text-center">Documento</th>
                    <th class="align-middle text-center">Endereço</th>
                    <th class="align-middle text-center">Conta</th>
                    <th class="align-middle text-center">Última movimentação</th>
                    <th class="align-middle text-center">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_smarty_tpl->tpl_vars['last_transactions']->value) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['last_transactions']->value, 'lt');
$_smarty_tpl->tpl_vars['lt']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lt']->value) {
$_smarty_tpl->tpl_vars['lt']->do_else = false;
?>
                <tr>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['lt']->value['nome'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['lt']->value['cpf'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['lt']->value['endereco'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['lt']->value['account_number'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['lt']->value['value'];?>
</td>
                    <td class="align-middle text-center"><?php echo $_smarty_tpl->tpl_vars['lt']->value['dtRegister'];?>
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

<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php }
}
