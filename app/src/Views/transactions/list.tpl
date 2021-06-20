{{include file="elements/header.tpl"}}

<div class="container-fluid p-2">
<form action="{{url("{{$module}}/submit")}}" method="POST">
  <div class="card text-center">
  <div class="card-header">

    <h3 clas="float-left">Transações</h3>
    <hr>
        <a href="{{url("{{$module}}/form")}}" class="btn btn-success">
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
                {{if $listing}}
                {{foreach from=$listing item=$l}}
                <tr>
                    <td class="align-middle text-center">{{$l.nome}}</td>
                    <td class="align-middle text-center">{{$l.account_number}}</td>
                    <td class="align-middle text-center">{{$l.operation}}</td>
                    <td class="align-middle text-center">
                        {{if $l.operation === "deposito"}}
                            <span class="text-success">{{$l.value}}</span>
                            {{else}}
                           <span class="text-danger">-{{$l.value}}</span>
                        {{/if}}
                    </td>
                    <td class="align-middle text-center">{{$l.dtRegister}}</td>
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
  <div class="card-footer d-flex justify-content-center align-items-center">
      {{$pagination}}
  </div>
</div>
</form>
</div>

{{include file="elements/footer.tpl"}}



