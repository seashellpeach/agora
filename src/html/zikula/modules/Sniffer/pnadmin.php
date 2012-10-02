<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnadmin.php 4 2009-11-09 12:38:09Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Sniffer
 */

/**
 * the main administration function
 *
 * This function is the default function, and is called whenever the
 * module is called without defining arguments.
 * As such it can be used for a number of things, but most commonly
 * it either just shows the module menu and returns or calls whatever
 * the module designer feels should be the default function (often this
 * is the view() function)
 *
 * @author       The Zikula Development Team
 * @return       output       The main module admin page.
 */
function Sniffer_admin_main()
{
    // Security check
    if (!SecurityUtil::checkPermission( 'Sniffer::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // get the object
    // Note: we're calling a technically private API function but since we're
    // in the module that's defined the API then this seems ok (ish...).
    $browserinfo = pnModAPIFunc('Sniffer', 'user', 'get');

    // Create output object
    $pnRender = & pnRender::getInstance('Sniffer', false);

    // assign the object
    // Note: we assign the object by reference to avoid duplication in memory
    $pnRender->assign_by_ref('browserinfo', $browserinfo);

    // Return the output that has been generated by this function
    return $pnRender->fetch('sniffer_admin_main.htm');
}
