<?php

/**
 * Zikula Application Framework
 *
 * @package	XTEC advMailer
 * @author	Francesc Bassas i Bullich
 * @license	GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
 * The main administration function
 *
 * @author Francesc Bassas i Bullich
 * @return string output
 */
function advMailer_admin_main()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // create a new output object
    $render = & pnRender::getInstance('advMailer', false);

    return $render->fetch('advmailer_admin_main.htm');
}

/**
 * This is a standard function to modify the configuration parameters of the module
 * @author Francesc Bassas i Bullich
 * @return string HTML string
 */
function advMailer_admin_modifyconfig()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // create a new output object
    $render = pnRender::getInstance('advMailer', false);

    // assign the module contenttypes
    $render->assign('contenttypes', pnModFunc('advMailer', 'admin', 'getContentTypes'));
    
    // assign all module vars
    $render->assign(pnModGetVar('advMailer'));

    // @aginard: force replyAddress to be site admin mail
    $render->assign('replyAddress', pnConfigGetVar('adminmail'));

    // @aginard: configuration params will be hidden to all users but xtecadmin
    if (pnUserLoggedIn()) {
        $loggedInUserID  = SessionUtil::getVar('uid');
        $xtecadminUserID = pnUserGetIDFromName('xtecadmin');

        if ($loggedInUserID == $xtecadminUserID) {
            $render->assign('showextraparams', 1);
        }
        else {
            $render->assign('showextraparams', 0);
        }
    }
    else {
        $render->assign('showextraparams', 0);
    }


    return $render->fetch('advmailer_admin_modifyconfig.htm');
}

/**
 * This is a standard function to update the configuration parameters of the
 * module given the information passed back by the modification form
 * @author Francesc Bassas i Bullich
 * @return bool true if update successful
 */
function advMailer_admin_updateconfig()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // confirm our forms authorisation key
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('advMailer','admin','main'));
    }

    // set our new module variable values
    $enabled = FormUtil::getPassedValue('enabled', '', 'POST');
    pnModSetVar('advMailer', 'enabled', $enabled);
    $idApp = FormUtil::getPassedValue('idApp', '', 'POST');
    pnModSetVar('advMailer', 'idApp', $idApp);
    $replyAddress = FormUtil::getPassedValue('replyAddress', '', 'POST');
    pnModSetVar('advMailer', 'replyAddress', $replyAddress);
    $sender = FormUtil::getPassedValue('sender', '', 'POST');
    pnModSetVar('advMailer', 'sender', $sender);
    $environment = FormUtil::getPassedValue('environment', '', 'POST');
    pnModSetVar('advMailer', 'environment', $environment);
    $contenttype = FormUtil::getPassedValue('contenttype', '', 'POST');
    pnModSetVar('advMailer', 'contenttype', $contenttype);
    $log = FormUtil::getPassedValue('log', '', 'POST');
    pnModSetVar('advMailer', 'log', $log);
    $debug = FormUtil::getPassedValue('debug', '', 'POST');
    pnModSetVar('advMailer', 'debug', $debug);
    $logpath = FormUtil::getPassedValue('logpath', '', 'POST');
    pnModSetVar('advMailer', 'logpath', $logpath);
    
    // the module configuration has been updated successfuly
    LogUtil::registerStatus (__('Done! Module configuration updated.', $dom));

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('advMailer', 'admin', 'main'));
}

/**
 * This function displays a form to send a test mail
 * @author Francesc Bassas i Bullich
 * @return string HTML string
 */
function advMailer_admin_testconfig()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // create a new output object
    $pnRender = & pnRender::getInstance('advMailer', false);

    // Return the output that has been generated by this function
    return $pnRender->fetch('advmailer_admin_testconfig.htm');
}

/**
 * This function processes the results of the test form
 * @author Francesc Bassas i Bullich
 * @param  string args['toname'] name to the recipient
 * @param  string args['toaddress'] the address of the recipient
 * @param  string args['subject'] message subject
 * @param  string args['body'] message body
 * @param  int args['html'] HTML flag
 * @return bool true if successful, false otherwise
 */
function advMailer_admin_sendmessage($args)
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    $toaddress = (string)FormUtil::getPassedValue('toaddress', isset($args['toaddress']) ? $args['toaddress'] : null, 'POST');
    $subject = (string)FormUtil::getPassedValue('subject', isset($args['subject']) ? $args['subject'] : null, 'POST');
    $body = (string)FormUtil::getPassedValue('body', isset($args['body']) ? $args['body'] : null, 'POST');
    $html = (bool)FormUtil::getPassedValue('html', isset($args['html']) ? $args['html'] : false, 'POST');

    // confirm our forms authorisation key
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError(pnModURL('advMailer','admin','main'));
    }

    $result = pnModAPIFunc('Mailer',
                           'user',
                           'sendmessage',
                           array('toaddress' => $toaddress,
                           'subject' => $subject,
                           'body' => $body,
                           'html' => $html));

    // check our result and return the correct error code
    if ($result === true) {
        // Success
        LogUtil::registerStatus(__('Done! Message sent.'));
    } elseif ($result === false) {
        // Failiure
        LogUtil::registerError(__f('Error! Could not send message. %s', ''));
    } else {
        // Failiure with error
        LogUtil::registerError(__f('Error! Could not send message. %s', $result));
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('advMailer', 'admin', 'main'));
}

/**
 * Gets the possible values for content type
 * @author Francesc Bassas i Bullich
 * @return Array possible values of content types 
 */
function advMailer_admin_getContentTypes()
{
	return array(1 => 'text/plain', 2 => 'text/html');
}
