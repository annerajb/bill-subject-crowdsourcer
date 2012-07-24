<?php

require_once('ParameterCheckException.php');

class ParamCheck
{
    /**
     *
     * @param type $param
     * @param type $paramName
     * @return boolean
     */
    public static function checkParam( &$param, $paramName )
    {

        if( is_null( $param ) )
        {
            $value = print_r($param,TRUE);
            throw new ParameterCheckException("Variable '$paramName' cannot be null. Value: [{$value}] ");
        }

        return true;

    }

    public static function checkParamClass( &$param, $paramClass, $paramName )
    {
        ParamCheck::checkParam($param, $paramName);


        if( gettype($param) != 'object' )
        {
            $msg = "Variable '$paramName' is not an object.";
            throw new ParameterCheckException($msg);
        }
        if( !$param instanceof $paramClass )
        {
            $className = get_class($param);
            $msg = "Variable '$paramName' is not of appropiate type. ";
            $msg = $msg."Expected: {$paramClass}, Actual: {$className}.";
            throw new ParameterCheckException($msg);
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
        ParamCheck::checkParam($param, $paramName);

        if( !is_array( $param ) )
        {
            $paramValue = print_r($param,TRUE);
            throw new ParameterCheckException("Variable '$paramName' is not an array. Value: [{$paramValue}]");
        }

        foreach( $param as $key => $value )
        {
            if( is_null( $value ) )
            {
                $paramValue = print_r($param,TRUE);
                throw new ParameterCheckException("Element '$key' inside array '$paramName' cannot be null. Value: [{$paramValue}]");
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
        ParamCheck::checkParam($param, $paramName);

        if( empty( $param ) or $param == "null" || $param == "NULL" )
        {
            $value = print_r($param,TRUE);
            throw new ParameterCheckException("String variable '$paramName' is empty. Value: [{$value}]");
        }

        return true;

    }


    /**
     * Checks that the parameter is a positive integer or 0.
     * @param integer $param
     * @param string $paramName
     * @return type
     * @throws ParameterCheckException
     *
     */
    public static function checkPositiveIntParam( &$param, $paramName )
    {
        ParamCheck::checkParam($param, $paramName);

        if( !is_numeric($param) )
        {
            $value = print_r($param,TRUE);
            throw new ParameterCheckException("Variable '$paramName' is not an numeric value. Value: [{$value}]");
        }

        if( intval($param) < 0  )
        {
            $value = print_r($param,TRUE);
            throw new ParameterCheckException("Integer variable '$paramName' is not positive. Value: [{$value}]");

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
        ParamCheck::checkParam($param, $paramName);

        if( !is_numeric($param) )
        {
            $value = print_r($param,TRUE);
            throw new ParameterCheckException("Variable '$paramName' is not an numeric value. Value: [{$value}]");
        }

        return true;
    }

    /**
     *
     * @param type $param
     * @param type $paramName
     * @return type
     * @throws ParameterCheckException
     */
    public static function checkTimestampParam( &$param, $paramName )
    {
        ParamCheck::checkParam($param, $paramName);
        $param = trim($param);

        $regex = "/(^\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}(:\d{2}|)$)/";
        if( !preg_match($regex, $param ) )
        {
            $value = print_r($param,TRUE);
            throw new ParameterCheckException("Variable '$paramName' is not a valid timestamp. Value: [{$value}]");
        }

        return true;

    }


}

?>
