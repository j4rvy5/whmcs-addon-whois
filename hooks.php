<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "common.php";

use WHMCS\View\Menu\Item as MenuItem;

add_hook('ClientAreaPrimaryNavbar', 1, function (MenuItem $primaryNavbar) {
    logModuleCall('whois', 'ClientAreaPrimaryNavbar', [], null, null, null);
    $newMenu = $primaryNavbar->addChild(
        BRAND_NAME_WHOIS,
        array(
            'name' => BRAND_NAME_WHOIS . " lookup",
            'uri' => 'index.php?m=whois',
            'order' => 99
        )
    );

});