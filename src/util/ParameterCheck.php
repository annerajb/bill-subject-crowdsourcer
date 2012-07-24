<?php
/*
  Copyright (c) 2011 Hewlett-Packard Development Company, LP
  All Rights Reserved. Unpublished rights reserved under the copyright laws
  of the United States. The software contained on this media is proprietary
  to and embodies the confidential technology of  Hewlett-Packard. Possession,
  use, duplication or dissemination of the software and  media is authorized
  only pursuant to a valid written license from Hewlett-Packard.
 */

/**
 * @author Javier L. Matías-Cabrera <javier.matias@hp.com>
 * @todo Give this class and methods a more proper name since they can also be
 * used for things other than the parameters.
 */

require_once('common/logger.php');

class ParameterCheck extends Object
{
    /**
     *
     * @param type $param
     * @param type $paramName
     * @return boolean
     */
    public static function checkParam( &$param, $paramName )
    {
        HP_trace("Checking variable $paramName, value: $param", __FUNCTION__, DEBUG3);

        if( is_null( $param ) )
        {
            $value = print_r($param,TRUE);
            throw new Exception("Variable '$paramName' cannot be null. Value: [{$value}] ");
        }

        return true;

    }

    /**
     * Verifies that the parameter is a non null array and that
     * none of its elements are null.
     * @param array $param
     * @param string $paramName
     * @return boolean
     */
    public static function checkArrayNotNull( &$param, $paramName )
    {
        ParameterCheck::checkParam($param, $paramName);

        if( !is_array( $param ) )
        {
            $paramValue = print_r($param,TRUE);
            throw new Exception("Variable '$paramName' is not an array. Value: [{$paramValue}]");
        }

        foreach( $param as $key => $value )
        {
            if( is_null( $value ) )
            {
                $paramValue = print_r($param,TRUE);
                throw new Exception("Element '$key' inside array '$paramName' cannot be null. Value: [{$paramValue}]");
            }
        }

        return true;
    }

    /**
     * Verifies that the string parameter is not empty nor null.
     * @param string $param
     * @param string $paramName
     * @return boolean
     */
    public static function checkStringParam( &$param, $paramName )
    {
        ParameterCheck::checkParam($param, $paramName);

        if( empty( $param ) or $param == "null" || $param == "NULL" )
        {
            $value = print_r($param,TRUE);
            throw new Exception("String variable '$paramName' is empty. Value: [{$value}]");
        }

        return true;

    }


    /**
     * Checks that the parameter is a positive integer or 0.
     * @param integer $param
     * @param string $paramName
     * @return type
     * @throws Exception
     *
     */
    public static function checkPositiveIntParam( &$param, $paramName )
    {
        ParameterCheck::checkParam($param, $paramName);

        if( !is_numeric($param) )
        {
            $value = print_r($param,TRUE);
            throw new Exception("Variable '$paramName' is not an numeric value. Value: [{$value}]");
        }

        if( intval($param) < 0  )
        {
            $value = print_r($param,TRUE);
            throw new Exception("Integer variable '$paramName' is not positive. Value: [{$value}]");

        }

        return true;
    }

    /**
     *
     * @param type $param
     * @param type $paramName
     * @return type
     */
    public static function checkIntParam( &$param, $paramName )
    {
        ParameterCheck::checkParam($param, $paramName);

        if( !is_numeric($param) )
        {
            $value = print_r($param,TRUE);
            throw new Exception("Variable '$paramName' is not an numeric value. Value: [{$value}]");
        }

        return true;
    }

    /**
     *
     * @param type $param
     * @param type $paramName
     * @return type
     * @throws Exception
     */
    public static function checkTimestampParam( &$param, $paramName )
    {
        ParameterCheck::checkParam($param, $paramName);
        $param = trim($param);

        $regex = "/(^\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}(:\d{2}|)$)/";
        if( !preg_match($regex, $param ) )
        {
            $value = print_r($param,TRUE);
            throw new Exception("Variable '$paramName' is not a valid timestamp. Value: [{$value}]");
        }

        return true;

    }


}

?>
