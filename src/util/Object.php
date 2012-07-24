<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('src/util/KLogger.php');

/**
 * Description of Object
 *
 * @author matiasca
 */
abstract class Object {

    /**
     *
     * @var KLogger
     */
    protected $log;
    protected $className;

    const logLevel = KLogger::DEBUG3;

    protected function __construct($logger = NULL)
    {
        if( $logger !== NULL )
        {
            $this->log = $logger;
        }

        $this->className = get_called_class();
    }

    public function LogInfo($line)
    {
            $this->Log( $line , KLogger::INFO, $this->log  );
    }

    public function LogDebug1($line)
    {
            $this->Log( $line , KLogger::DEBUG1, $this->log  );
    }

    public function LogDebug2($line)
    {
            $this->Log( $line , KLogger::DEBUG2, $this->log  );
    }
    public function LogDebug3($line)
    {
            $this->Log( $line , KLogger::DEBUG3, $this->log  );
    }

    public function LogWarn($line)
    {
            $this->Log( $line , KLogger::WARN, $this->log  );
    }

    public function LogError($line)
    {
            $this->Log( $line , KLogger::ERROR, $this->log  );
    }

    public function LogFatal($line)
    {
            $this->Log( $line , KLogger::FATAL, $this->log );
    }

    /**
     *
     * @param type $line
     * @param type $priority
     * @param KLogger $log
     */
    protected function Log($line, $priority, $log)
    {
        if(! $this->className )
        {
            $this->className = get_class($this);
        }
        $className = $this->className;

        if ( $className::logLevel <= $priority )
        {
            $log->Log($line, $priority, $className);

        }
    }

}

?>
