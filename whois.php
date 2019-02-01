<?php

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "common.php";
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "locale" . DIRECTORY_SEPARATOR . "en.php";
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . "WHOISController.php";

function whois_config()
{
    return [
        "name" => "WHOIS for Clients",
        "description" => "WHOIS for Client Area",
        "version" => "0.1",
        "author" => "Jigar Vyas"
    ];
}

function whois_activate()
{
    return (new \WHOIS\Controllers\WHOISController)->handleActivate();
}

function whois_deactivate()
{
    return (new \WHOIS\Controllers\WHOISController)->handleDeactivate();
}

function whois_upgrade()
{
    return true;
}

function whois_clientarea($vars)
{
    return (new \WHOIS\Controllers\WHOISController)->handleClientArea($vars);
}

function whois_output($vars)
{
    echo "HELLO ADMIN";
}