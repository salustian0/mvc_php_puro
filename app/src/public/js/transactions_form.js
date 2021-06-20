$(document).ready(function(){
    const $slc_pessoa = $("#slc_pessoa");
    const $slc_account = $('#slc_account');
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
                    $slc_account.empty();

                    for(let key in result){
                        let current = result[key];
                        let selected = (typeof selected_account !== "undefined" && parseInt(selected_account) === parseInt(current.id)) ? "selected" : "";
                        $slc_account.append(`<option  ${selected} value='${current.id}'>${current.account_number} - Saldo: ${current.value}</option>`)
                    }
                }
            }
        })
    }
})