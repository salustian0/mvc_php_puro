<?php
/**
 * @author Renan Salustiano
 */


/**
 * @param null $url
 * @return string
 * Método responsável por retornar a url, aceitando paramêtro de url ex url(users/logim)
 */
function url($url = null){
    return "http://localhost/{$url}";
}

/**
 * @param $arg
 * Método responsável por debugar variaveis, objetos etc
 */
function _pre($arg){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

/**
 * @param null $url
 * Redirecionamento com a url padrão no inicio
 */
function redirect($url = null){
    return header('Location: '.url($url));
}

/**
 * @param array $indexes
 * @param array $data
 * @return bool
 * Método responsável por validar campos obrigatórios
 */
function validate($indexes = array(),$data = array()){
    foreach ($indexes as $k => $v){
        if(!isset($data[$v]) || empty($data[$v])){
            return false;
        }
    }
    return true;
}

/**
 * @param array $data
 * Método responsável por registrar dados da requisição em uma sessão para retornar para a View
 */
function record_request_data($data = array()){
    $_SESSION['last_request_data'] = $data;
}

/**
 * Mensagem para a view
 * @param null $type
 * @param null $message
 */
function set_message($type = null,$message = null){
    $_SESSION["message"][] = array(
      "type" => $type,
      "text" => $message
    );
}

/**
 * Criação de paginação
 * @param int $countRegisters
 * @param int $per_page
 * @param int $active_page
 * @return false|string
 */
function makePaginationView($countRegisters = 0, $per_page = 0,$active_page = 0){
    $count_pages = ceil($countRegisters / $per_page);
    if($count_pages <= 1) return false;
    $pagination = '  <ul class="pagination" data-max-page="'.$count_pages.'">';

    for($i = 0; $i < $count_pages; $i++){
        $pagination.= '<li class="page-item '.($i==$active_page ? "active" : "").'"><a data-index="'.$i.'" class="page-link default-link" href="?page='.($i +1 ).'">'.($i+1).'</a></li>';
    }


    $pagination.=' </ul>';

    return $pagination  ;
}