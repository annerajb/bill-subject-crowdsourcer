<?php

/* Finally, A light, permissions-checking logging class.
 *
 * Author	: Kenneth Katzgrau < katzgrau@gmail.com >
 * Date	: July 26, 2008
 * Comments	: Originally written for use with wpSearch
 * Website	: http://codefury.net
 * Version	: 1.0
 *
 * Usage:
 *		$log = new KLogger ( "log.txt" , KLogger::INFO );
 *		$log->LogInfo("Returned a million search results");	//Prints to the log file
 *		$log->LogFATAL("Oh dear.");				//Prints to the log file
 *		$log->LogDebug("x = 5");					//Prints nothing due to priority setting
*/

class KLogger
{

        const DEBUG3 	= 1;	// Most Verbose
        const DEBUG2    = 2;
        const DEBUG1    = 3;
        const INFO 	= 4;	// ...
        const WARN 	= 5;	// ...
        const ERROR 	= 6;	// ...
        const FATAL 	= 7;	// Least Verbose
        const OFF 	= 8;	// Nothing at all.

        const LOG_OPEN 		= 1;
        const OPEN_FAILED 	= 2;
        const LOG_CLOSED 	= 3;

        /* Public members: Not so much of an example of encapsulation, but that's okay. */
        public $Log_Status 	= KLogger::LOG_CLOSED;
        public $DateFormat	= "Y-m-d H:i:s";
        public $MessageQueue;

        private $log_file;
        private $logFileMaxSize = 5000000; // 1 MB
        public $priority = KLogger::DEBUG3;

        private $file_handle;

        private $process;

        public function __construct( $filepath , $priority = "" )
        {
                if ( $priority == KLogger::OFF ) return;

                $this->log_file = $filepath;
                $this->MessageQueue = array();

                if( $priority )
                {
                   $this->priority = $priority;
                }

                $this->process = getmypid();


                if ( file_exists( $this->log_file ) )
                {
                        if ( !is_writable($this->log_file) )
                        {
                                $this->Log_Status = KLogger::OPEN_FAILED;
                                $this->MessageQueue[] = "The file exists, but could not be opened for writing. Check that appropriate permissions have been set.";
                                return;
                        }

                        // if the file is too big, create a new one and store the old one
                        if( filesize($this->log_file) > $this->logFileMaxSize )
                        {
                            $logDir = dirname($this->log_file);
                            $logFileName = basename($this->log_file);

                            $files = glob("{$logDir}/{$logFileName}*");
                            $fileCount = 1;
                            foreach( $files as $outputLine )
                            {
                                // make a backup of the file
                                if( preg_match('/\d+$/', $outputLine, $matches) )
                                {
                                    $fileCount = $fileCount+1;
                                }
                            }
                            rename("{$logDir}/{$logFileName}","{$logDir}/{$logFileName}.{$fileCount}");
                        }

                }

                $this->file_handle = fopen( $this->log_file , "a" );
                if ( $this->file_handle )
                {
                        $this->Log_Status = KLogger::LOG_OPEN;
                        $this->MessageQueue[] = "The log file was opened successfully.";
                }
                else
                {
                        $this->Log_Status = KLogger::OPEN_FAILED;
                        $this->MessageQueue[] = "The file could not be opened. Check permissions.";
                        die("Log file '{$this->log_file}' could not be opened. Check permissions.");
                }

                return;
        }

        public function __destruct()
        {
                if ( $this->file_handle )
                        fclose( $this->file_handle );
        }

        public function LogInfo($line)
        {
                $this->Log( $line , KLogger::INFO );
        }

        public function LogDebug1($line)
        {
                $this->Log( $line , KLogger::DEBUG1  );
        }

        public function LogDebug2($line)
        {
                $this->Log( $line , KLogger::DEBUG2  );
        }
        public function LogDebug3($line)
        {
                $this->Log( $line , KLogger::DEBUG3 );
        }

        public function LogWarn($line)
        {
                $this->Log( $line , KLogger::WARN  );
        }

        public function LogError($line)
        {
                $this->Log( $line , KLogger::ERROR );
        }

        public function LogFatal($line)
        {
                $this->Log( $line , KLogger::FATAL);
        }



        public function Log($line, $priority, $className = "")
        {
            if ( $this->priority <= $priority )
            {

                $status = $this->getTimeLine( $priority );

                if( $className )
                {
                    $output = "{$status}[{$className}]  {$line}\n";
                }
                else
                {
                    $output = "{$status} {$line}\n";
                }
                $this->WriteFreeFormLine ($output);
            }
        }

        public function WriteFreeFormLine( $line )
        {
                if ( $this->Log_Status == KLogger::LOG_OPEN && $this->priority != KLogger::OFF )
                {
                    if (fwrite( $this->file_handle , $line ) === false) {
                        $this->MessageQueue[] = "The file could not be written to. Check that appropriate permissions have been set.";
                    }
                }
        }

        public function SetProcessNum($process)
        {
            $this->process = $process;
        }

        private function getTimeLine( $level )
        {
                $time = date( $this->DateFormat );

                switch( $level )
                {
                        case KLogger::INFO:
                                return "$time [{$this->process}] [INFO]:   ";
                        case KLogger::WARN:
                                return "$time [{$this->process}] [WARN]:   ";
                        case KLogger::DEBUG1:
                                return "$time [{$this->process}] [DEBUG1]: ";
                        case KLogger::DEBUG2:
                                return "$time [{$this->process}] [DEBUG2]: ";
                        case KLogger::DEBUG3:
                                return "$time [{$this->process}] [DEBUG3]: ";
                        case KLogger::ERROR:
                                return "$time [{$this->process}] [ERROR]:  ";
                        case KLogger::FATAL:
                                return "$time [{$this->process}] [FATAL]:  ";
                        default:
                                return "$time [{$this->process}] [LOG]:    ";
                }
        }

}

define('TRACEOFF',KLogger::OFF);
define('INFO',  KLogger::INFO);
define('DEBUG', KLogger::DEBUG1);
define('DEBUG1',KLogger::DEBUG1);
define('DEBUG2',KLogger::DEBUG2);
define('DEBUG3',KLogger::DEBUG3);
define('WARN',KLogger::WARN);



?>