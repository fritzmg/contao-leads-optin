<?php

/**
 * The leads optin extension allows you to store leads with double optin function.
 *
 * PHP version 5
 *
 * @package    LeadsOptin
 * @author     Christopher Bölter <kontakt@boelter.eu>
 * @copyright  Christopher Bölter 2017
 * @license    LGPL.
 * @filesource
 */

namespace Boelter\LeadsOptin\Dca;

/**
 * Provides several function for the module datacontainer
 *
 * @package Boelter\LeadsOptin\Dca
 */
class Module
{

    /**
     * Get all notifications for the optin success notification.
     *
     * @return array
     */
    public function getNotifications()
    {
        $notificationOptions = array();
        $database            = \Database::getInstance();
        $notifications       = $database->execute(
            "SELECT id,title FROM tl_nc_notification WHERE type='leads_optin_success_notification' ORDER BY title"
        );

        while ($notifications->next()) {
            $notificationOptions[$notifications->id] = $notifications->title;
        }

        return $notificationOptions;
    }
}
