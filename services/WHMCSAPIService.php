<?php

namespace WHOIS\Services;

class WHMCSAPIService
{

    public function getWHOISDetails($domainName)
    {
        return localAPI('DomainWhois', [
            'domain' => $domainName
        ]);
    }
}