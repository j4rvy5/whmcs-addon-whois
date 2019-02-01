<?php

namespace WHOIS\Controllers;

use WHOIS\Services\WHMCSAPIService;

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'services' . DIRECTORY_SEPARATOR . 'WHMCSAPIService.php';

class WHOISController
{

    private function getWHOISDetails($domainName)
    {
        return (new WHMCSAPIService())->getWHOISDetails($domainName);
    }

    public function handleActivate()
    {
        return [
            'status' => 'success',
            'description' => MESSAGES_WHOIS['activate']['success']
        ];
    }

    public function handleDeactivate()
    {
        return [
            'status' => 'success',
            'description' => MESSAGES_WHOIS['deactivate']['success']
        ];
    }

    public function handleClientArea($vars)
    {


        $moduleLink = $vars['modulelink'];
        $breadCrumb = [$moduleLink => BRAND_NAME_WHOIS];
        $requireLogin = false;

        $templateFile = 'templates/layout';

        $variables = [];
        $variables['moduleLink'] = $moduleLink;
        $variables['templateName'] = 'clientArea';

        if (!empty($_POST['domainName'])) {
            $domainName = filter_input(INPUT_POST, 'domainName', FILTER_DEFAULT);

            $variables['domainName'] = $domainName;

            $whoisData = $this->getWHOISDetails($domainName);

            if (is_null($whoisData['status'])) {

                $variables['whoisData'] = MESSAGES_WHOIS['whois_data_not_found'];
            } else {
                $variables['whoisData'] = $whoisData;
            }
        }

        return [
            'pagetitle' => BRAND_NAME_WHOIS,
            'breadcrumb' => $breadCrumb,
            'templatefile' => $templateFile,
            'requirelogin' => $requireLogin, # accepts true/false
            'forcessl' => false, # accepts true/false
            'vars' => $variables
        ];
    }
}