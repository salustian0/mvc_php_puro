<?php
/* Smarty version 3.1.36, created on 2021-06-20 21:06:26
  from '/var/www/html/Src/Views/modal-home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60cfadd2d1f3c7_94630785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30704483a3fdaee648b6f2d4e0070c45f8250ee4' => 
    array (
      0 => '/var/www/html/Src/Views/modal-home.tpl',
      1 => 1624223186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60cfadd2d1f3c7_94630785 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modal-home" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bem vindo(a) ao meu projeto =)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>/Hello World/</h2><br>
                Olá, nesse projeto eu optei por nao utilizar frameworks PHP já que a vaga é para um programador PHP
                eu quis mostrar ao máximo o que eu sei dessa linguagem, portanto criei meu próprio micro framework
                para este teste, ele utiliza o padrão MVC e também conta com url amigável.<br><br>
                No arquivo nginx.conf adicionei a diretiva de reescrita de url, como sou mais familiarizado com servidores
                apache ainda não conseguir remover a permissão de acesso direto aos arquivos.<br>
                Bom esse é meu projeto, use com sabedoria =)
            </div>
            <div class="modal-footer">
                <span class="text-info">Click fora dessa janela para fecha-la</span>
            </div>
        </div>
    </div>
</div><?php }
}
