<?php

require_once('src/util/KLogger.php');
require_once 'src/util/Object.php';
require_once 'Smarty.class.php';



abstract class Page extends Object
{

    /**
     *
     * @var KLogger
     */
    protected $log;

    private $view;
    private $smarty;

    private $scripts;
    private $bottomScripts;

    private $currentDir;

    public function __construct($view)
    {
        $this->currentDir = dirname(__FILE__);
        $this->log = new KLogger ( $this->currentDir.'/../../log/bill-subject.log' );

        $this->view = $this->currentDir."/../../view/templates/{$view}";
        $this->smarty = new Smarty();

        $this->smarty->compile_dir = $smarty->compile_dir = $this->currentDir.'/../../view/templates_c';

    }

    protected function Set($name, $value)
    {
        $this->smarty->assign($name, $value);
    }

    private function Display()
    {
        $scriptString = "";
        if(is_array($this->scripts) )
        {
            foreach( $this->scripts as $script )
            {
                $scriptString .= $script;
            }
            $this->smarty->assign('_scripts',$scriptString );
        }

        $scriptString = "";
        if(is_array($this->bottomScripts) )
        {
            foreach( $this->bottomScripts as $script )
            {
                $scriptString .= $script;
            }
            $this->smarty->assign('_bottomScripts',$scriptString );
        }

        $this->smarty->display($this->view);
    }


    public function AddScript($src)
    {
        $this->scripts[] = "<script type=\"text/javascript\" src=\"{$src}\" ></script>\n";
    }

    public function AddScriptText($text)
    {
        $this->scripts[] = "<script type=\"text/javascript\">{$text}</script>\n";
    }


    public function AddBottomScript($src)
    {
        $this->bottomScripts[] = "<script type=\"text/javascript\" src=\"{$src}\" ></script>\n";
    }

    public function AddBottomScriptText($text)
    {
        $this->bottomScripts[] = "<script type=\"text/javascript\">{$text}</script>\n";
    }

    abstract protected function LocalHandle($request);

    public function Handle($request)
    {
        try
        {
            $this->LocalHandle($request);
            $this->Display();
        }
        catch(Exception $e)
        {
            $this->LogFatal($e->__toString());
            $this->LogFatal(print_r($request, true));
            include_once($this->currentDir."/../../view/templates/error.tpl.php");
            exit;
        }

    }




}


?>