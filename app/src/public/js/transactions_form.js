$(document).ready(function(){
    const $slc_pessoa = $("#slc_pessoa");
    const $slc_account = $('#slc_account');
    const $account_content = $('#account-content');
    const $no_account = $('#no-account');
    const $value = $("#value");
    const $op = $('#operation');
    const $action = $('#action');



    if($slc_pessoa.length){
        $slc_pessoa.on("change",function(){
            changeAccounts();
        });
    }
    //Exeutando ao carregar a página para pegas as contas do primeiro item
    changeAccounts();

    function changeAccounts(){
        let current_id = $slc_pessoa.val();
        $.ajax({
            url: MODULE_URL+"/ajx_get_accounts",
            data:{"idPessoaFk": current_id},
            method: 'GET',
            dataType: 'json',
            success: function(result){
                if(result !== false){
                    $account_content.show();
                    $no_account.hide();
                    $no_account.find("a").attr('href','#');
                    $slc_account.empty();
                    $op.removeAttr('disabled');
                    $value.removeAttr('disabled');
                    $action.removeAttr('disabled');

                    for(let key in result){
                        let current = result[key];
                        let selected = (typeof selected_account !== "undefined" && parseInt(selected_account) === parseInt(current.id)) ? "selected" : "";
                        $slc_account.append(`<option  ${selected} value='${current.id}'>${current.account_number} - Saldo: ${current.value}</option>`)
                    }
                }else
                {
                    $account_content.hide();
                    $no_account.show();
                    $op.attr('disabled',true);
                    $value.attr('disabled',true);
                    $action.attr('disabled',true);
                    $no_account.find("a").attr('href',`${BASE_URL}accounts/form?pessoa=${current_id}`);
                }
            }
        })
    }
})