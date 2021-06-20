{{include file="elements/header.tpl"}}

<div class="container-fluid">
 <form class="validate-form"  action="{{url("{{$module}}/submit")}}" method="post">
 <input type="hidden" name="id" value="{{$_data.id}}">
    <div class="col-6 m-auto">
        <div class="form-group">
            <label>Pessoa:</label>
            <select class="form-control required" name="idPessoaFk" id="slc_pessoa">
                {{foreach item=$p from=$pessoas}}
                    <option {{if $selected_pessoa && $selected_pessoa === $p.id}}selected{{/if}}  value="{{$p.id}}">{{$p.nome}} - {{$p.cpf}}</option>
                {{/foreach}}
            </select>
        </div>
        <div class="form-group">
            <label>Contas:</label>
            <select class="form-control required" name="idAccountFk" id="slc_account"></select>
        </div>

        <div class="form-group">
            <label>Valor:</label>
            <input name="value" class="form-control required"  type="text" name="account_number" value="{{$_data.value}}">
        </div>
        <div class="form-group">
            <label>Operação:</label>
            <select name="operation" class="form-control">
                <option value="deposito">Depósito</option>
                <option value="retirada">Retirada</option>
            </select>
        </div>

        <div class="d-flex justify-content-center align-items-center p-5">
            <button  type="submit" class="btn btn-success" name="action" value="save">
                Salvar
            </button>
        </div>
    </div>
    </form>
</div>

{{include file="elements/footer.tpl"}}



