<?php

/**
 * Include file for system operations
 *
 * @package     main
 * @since       0.1
 * @author		MekDrop <github@mekdrop.name>
 */
require_once 'func.func.php';

$fields = &$objBipConfigManager->getSystemConfigTypes();

if (auto_access_denied())
    return;

if (@$_POST['action'] == 'save') {
    foreach ($fields as $fname => $ftype) {
        switch ($ftype) {
            case 'bool':
                $objBipConfigManager->vars[$fname] = isset($_POST[$fname]);
                break;
            default:
                $objBipConfigManager->vars[$fname] = $_POST[$fname];
                break;
        }
    }
    $objBipConfigManager->save();
}


show_form($fields, $objBipConfigManager->vars);
