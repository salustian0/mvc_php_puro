{{include file="elements/header.tpl"}}

<div class="container-fluid">
 <form class="validate-form"  action="{{url('accounts/submit')}}" method="post">
 <input type="hidden" name="id" value="{{$_data.id}}">
    <div class="col-6 m-auto">
        <div class="form-group">
            <label>Pessoa:</label>
            <select class="form-control required" name="idPessoaFk">
                {{foreach item=$p from=$pessoas}}
                    <option {{if $_data && count($_data) && $_data.idPessoaFk === $p.id || $selected_pessoa === $p.id}}selected{{/if}}  value="{{$p.id}}">{{$p.nome}} - {{$p.cpf}}</option>
                {{/foreach}}
            </select>
        </div>
        <div class="form-group">
            <label>Número da conta:</label>
            <input class="form-control required"  type="text" name="account_number" value="{{$_data.account_number}}">
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



