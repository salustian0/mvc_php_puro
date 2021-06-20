<?php
/* Smarty version 3.1.36, created on 2021-06-20 21:04:39
  from '/var/www/html/Src/Views/elements/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cfad67c846f7_47377868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d4f42862a603096feedbb1dc784f362e67d3e7f' => 
    array (
      0 => '/var/www/html/Src/Views/elements/header.tpl',
      1 => 1624223079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60cfad67c846f7_47377868 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body style="padding-bottom: 50px">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo url();?>
">
                <img src="<?php echo url('src/public/img/php-logo.png');?>
" class="img-fluid" style="width: 100px;height:60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo url();?>
">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url("pessoas");?>
">Pessoas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url("accounts");?>
">Contas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url("transactions");?>
">Movimentação</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php if ($_smarty_tpl->tpl_vars['_messages']->value && count($_smarty_tpl->tpl_vars['_messages']->value)) {?>
<div class="container">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_messages']->value, 'm');
$_smarty_tpl->tpl_vars['m']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->do_else = false;
?>
        <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['m']->value['type'];?>
 my-2">
            <?php echo $_smarty_tpl->tpl_vars['m']->value['text'];?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
}
