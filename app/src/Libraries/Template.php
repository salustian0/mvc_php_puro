<?php 
namespace Src\Libraries;
use Smarty;
require_once( 'src/Assets/smarty-3.1.36/libs/Smarty.class.php' );

/**
 * Class Template
 * @package Src\Libraries
 * @author Renan Salustiano
 * Classe responsável por integrar o sistema de template Smarty com a aplicação
 */
class Template extends Smarty {

    public $debug   = false;
    public $isCache = false;
    public $instance = null;


    public function __construct($instance = null){
        parent::__construct();

        $this->template_dir =    "Src/Views/";
        $this->compile_dir  =   "Src/views/compiled";
        if ( ! is_writable( $this->compile_dir ) ){
            @chmod( $this->compile_dir, 0777 );
        } 

        $this->cache_dir    = APPPATH   . "cache/";

        // delimiters
        $this->left_delimiter   = '{{';
        $this->right_delimiter  = '}}';


        $this->assign( 'TITLE'      , TITLE );
        $this->assign( 'DESCRIPTION', DESCRIPTION );
        $this->assign( 'COPYHIGHT'  , COPYHIGHT );
        $this->assign( 'CACHE_BUSTER'  , CACHE_BUSTER );
        $this->assign( 'ENVIRONMENT'  , ENVIRONMENT );
        $this->instance = $instance;
    }

    public function setDebug( $debug=true ){
        if(ENVIRONMENT !== 'development'){
            $this->debug = $debug;
        }
    }

    /**
     *  Parse a template using the Smarty engine
     *
     * This is a convenience method that combines assign() and
     * display() into one step. 
     *
     * Values to assign are passed in an associative array of
     * name => value pairs.
     *
     * If the output is to be returned as a string to the caller
     * instead of being output, pass true as the third parameter.
     *
     * @access    public
     * @param    string
     * @param    array
     * @param    bool
     * @return    string
     */
    public function view($template, $data = array(), $return = FALSE)
    {

        if ( ! $this->debug ){
            $this->error_reporting = false;
        }
        $this->error_unassigned = false;

        foreach ($data as $key => $val){
            $this->assign($key, $val);
        }

        
        if ($return == FALSE){
             $this->display($template);
        }else{
            return $this->fetch($template);
        }
    }

    public function setVar($name = null, $value){
        $this->assign($name,$value);
    }
    
    public function setJs($js = array()){
        if(isset($js) && count($js)){
                $this->assign('js',$js);
        }
    }

    public function setCss($css = array()){
        if(isset($css) && count($css)){
            foreach($css as $k => $v){
                $this->assign('css',$v);
            }
        }
    }

}