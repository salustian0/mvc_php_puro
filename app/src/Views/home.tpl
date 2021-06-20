{{include file="elements/header.tpl"}}
{{include file="modal-home.tpl"}}

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
                {{if $last_transactions}}
                {{foreach from=$last_transactions item=$lt}}
                <tr>
                    <td class="align-middle text-center">{{$lt.nome}}</td>
                    <td class="align-middle text-center">{{$lt.cpf}}</td>
                    <td class="align-middle text-center">{{$lt.endereco}}</td>
                    <td class="align-middle text-center">{{$lt.account_number}}</td>
                    <td class="align-middle text-center">{{$lt.value}}</td>
                    <td class="align-middle text-center">{{$lt.dtRegister}}</td>
                </tr>
                {{/foreach}}
                {{else}}
                <tr>
                    <td colspan="6">Nenhum dado!</td>
                </tr>
              {{/if}}
            </tbody>
        </table>
    </div>
</div>

{{include file="elements/footer.tpl"}}



