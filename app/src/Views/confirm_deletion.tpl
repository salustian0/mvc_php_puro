{{include file="elements/header.tpl"}}
<div class="container">
    <form action="{{url("{{$module}}/deletion_verification")}}" method="POST">
    <div class="m-auto my-5">
        <div class="alert alert-info">
            Deseja prosseguir com essa ação?
        </div>
        {{foreach item=$id from=$ids}}
        <input type="hidden" name="id[]" value="{{$id}}">
        {{/foreach}}
        <button class="btn btn-success" name="action" value="true">
            Sim
        </button>
        <button class="btn btn-danger" name="action" value="false">
            Não
        </button>
    </div>
    </form>
</div>
{{include file="elements/footer.tpl"}}