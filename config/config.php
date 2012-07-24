<?php


define('WEB_ROOT',dirname(__FILE__).'/../');
set_include_path(get_include_path().':'.WEB_ROOT);
set_include_path(get_include_path().':/usr/share/php/smarty');

DEFINE('CONFIG_INI_PATH',WEB_ROOT.'/config/config.ini');

function getAppConfig()
{
    $generalConfig = parse_ini_file(CONFIG_INI_PATH, TRUE);
    $environmentConfigFile = dirname(__FILE__).'/'.$generalConfig['general']['environment'].'.ini';
    return parse_ini_file($environmentConfigFile, TRUE);
}
?>