{{include file="elements/header.tpl"}}

<div class="container-fluid p-2">
<form action="{{url("{{$module}}/submit")}}" method="POST">
  <div class="card text-center">
  <div class="card-header">

    <h3 clas="float-left">Contas</h3>
    <hr>
        <a href="{{url("{{$module}}/form")}}" class="btn btn-success">
            Novo
        </a>
        <button class="btn btn-info" type="submit" name="action" value="form">
            Editar
        </button>
        <button class="btn btn-danger" type="submit" name="action" value="deletion_verification">
            Deletar
        </button>
  </div>
  <div class="card-body">
    <h5 class="card-title">Listagem de contas</h5>
    <p class="card-text">A baixo você pode visualizar, criar, modificar e excluir contas</p>
    <div class="col-8 m-auto">
           <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th class="align-middle text-center">@</th>
                    <th class="align-middle text-center">Nome</th>
                    <th class="align-middle text-center">Documento</th>
                    <th class="align-middle text-center">Conta</th>
                    <th class="align-middle text-center">Saldo em conta</th>
                    <th class="align-middle text-center">Data</th>
                </tr>
            </thead>
            <tbody>
                {{if $listing}}
                {{foreach from=$listing item=$l}}
                <tr>
                    <td class="align-middle text-center">
                        <input type="checkbox" name="id[]" value="{{$l.id}}">
                    </td>
                    <td class="align-middle text-center">{{$l.nome}}</td>
                    <td class="align-middle text-center">{{$l.cpf}}</td>
                    <td class="align-middle text-center">{{$l.account_number}}</td>
                    <td class="align-middle text-center">
                        {{if (int)$l.value === 0}}
                         <span class="text-danger">
                            conta sem saldo<br>
                            <a href="{{url("transactions/form?pessoa={{$l.idPessoaFk}}&account={{$l.id}}")}}">Realizar um depósito</a>
                         </span>
                         {{else}}
                         <span class="text-success">{{$l.value}}</span>
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



