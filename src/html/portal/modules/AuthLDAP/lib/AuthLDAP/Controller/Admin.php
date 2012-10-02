<?php

class AuthLDAP_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    /**
     * The main administration function
     * This function is the default function, and is called whenever the
     * module is initiated without defining arguments.  As such it can
     * be used for a number of things, but most commonly it either just
     * shows the module menu and returns or calls whatever the module
     * designer feels should be the default function (often this is the
     * view() function)
     * @author Mike Goldfinger <MikeGoldfinger@linuxmail.org>
     * @link http://authldap.ch.vu
     * @return string HTML ouptput
     */
    public function main() {
        // security check
        if (!SecurityUtil::checkPermission('AuthLDAP::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // return the output that has been generated by this function
        return $this->view->fetch('authldap_admin_main.tpl');
    }

    /**
     * This is a standard function to modify the configuration parameters of the
     * module
     * @author Mike Goldfinger <MikeGoldfinger@linuxmail.org>
     * @link http://authldap.ch.vu
     * @return string HTML ouptput
     * @todo change group list to dropdown
     */
    public function modifyconfig() {
        // security check
        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $encryptionTypes = array('none' => __('none'),
            'sha1' => 'sha1',
            'md5' => 'md5',
            'sha64bit' => 'sha64bit');
        
        // assign module vars
        return $this->view->assign('AuthLDAP', modUtil::getVar($this->name))
                        ->assign('encryptionTypes', $encryptionTypes)
                        ->fetch('authldap_admin_modifyconfig.tpl');
    }

    /**
     * This is a standard function that is called with the results of the
     * form supplied by template_admin_new() to create a new item
     * @author Mike Goldfinger <MikeGoldfinger@linuxmail.org>
     * @link http://authldap.ch.vu
     * @param 'authldap_pnldap' the authentication type
     * @param 'authldap_serveradr' the ip address of the ldap server
     * @param 'basedn' base container in directory
     * @param 'authldap_bindas' user to bind to directory as if required
     * @param 'authldap_bindpass' password of user to bind as
     * @param 'authldap_searchdn' search container
     * @param 'authldap_searchattr' search the User using tis Attribute
     * @return bool true if item created, false otherwise
     */
    public function updateconfig($args) {
        $authldap_pnldap = FormUtil::getPassedValue('authldap_pnldap', isset($args['authldap_pnldap']) ? $args['authldap_pnldap'] : null, 'POST');
        $authldap_serveradr = FormUtil::getPassedValue('authldap_serveradr', isset($args['authldap_serveradr']) ? $args['authldap_serveradr'] : null, 'POST');
        $authldap_protocol = FormUtil::getPassedValue('authldap_protocol', isset($args['authldap_protocol']) ? $args['authldap_protocol'] : null, 'POST');
        $authldap_basedn = FormUtil::getPassedValue('authldap_basedn', isset($args['authldap_basedn']) ? $args['authldap_basedn'] : null, 'POST');
        $authldap_bindas = FormUtil::getPassedValue('authldap_bindas', isset($args['authldap_bindas']) ? $args['authldap_bindas'] : null, 'POST');
        $authldap_bindpass = FormUtil::getPassedValue('authldap_bindpass', isset($args['authldap_bindpass']) ? $args['authldap_bindpass'] : null, 'POST');
        $authldap_searchdn = FormUtil::getPassedValue('authldap_searchdn', isset($args['authldap_searchdn']) ? $args['authldap_searchdn'] : null, 'POST');
        $authldap_searchattr = FormUtil::getPassedValue('authldap_searchattr', isset($args['authldap_searchattr']) ? $args['authldap_searchattr'] : null, 'POST');
        $authldap_hash_method = FormUtil::getPassedValue('authldap_hash_method', isset($args['authldap_hash_method']) ? $args['authldap_hash_method'] : null, 'POST');

        if (!SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        // Update module variables.
        $this->setVar('authldap_pnldap', $authldap_pnldap)
                ->setVar('authldap_serveradr', $authldap_serveradr)
                ->setVar('authldap_protocol', $authldap_protocol)
                ->setVar('authldap_basedn', $authldap_basedn)
                ->setVar('authldap_bindas', $authldap_bindas)
                ->setVar('authldap_bindpass', $authldap_bindpass)
                ->setVar('authldap_searchdn', $authldap_searchdn)
                ->setVar('authldap_searchattr', $authldap_searchattr)
                ->setVar('authldap_hash_method', $authldap_hash_method);


        // the module configuration has been updated successfuly
        LogUtil::registerStatus($this->__('Done! Module configuration updated.'));

        // This function generated no output, and so now it is complete we redirect
        // the user to an appropriate page for them to carry on their work
        LogUtil::registerStatus($this->__('El registre s\'ha editat correctament'));
        return System::redirect(ModUtil::url('AuthLDAP', 'admin', 'main'));
    }

}