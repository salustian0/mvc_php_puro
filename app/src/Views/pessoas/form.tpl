{{include file="elements/header.tpl"}}

<div class="container-fluid">
 <form class="validate-form"  action="{{url("{{$module}}/submit")}}" method="post">
 <input type="hidden" name="id" value="{{$_data.id}}">
    <div class="col-6 m-auto">
        <div class="form-group">
            <label>Nome:</label>
            <input class="form-control required"  type="text" name="nome" value="{{$_data.nome}}">
        </div>
        <div class="form-group">
            <label>Documento:</label>
            <input class="form-control required"  id="docNumber" type="text" name="cpf" value="{{$_data.cpf}}">
        </div>
        <div class="form-group">
            <label>Endereço:</label>
            <input class="form-control required"  type="text" name="endereco" value="{{$_data.endereco}}">
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



