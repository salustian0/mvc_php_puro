<?php

function url($url = null){
    return "http://localhost/{$url}";
}
function _pre($arg){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}
function redirect($url = null){
    return header('Location: '.url($url));
}
function validate($indexes = array(),$data = array()){
    foreach ($indexes as $k => $v){
        if(!isset($data[$v]) || empty($data[$v])){
            return false;
        }
    }
    return true;
}
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