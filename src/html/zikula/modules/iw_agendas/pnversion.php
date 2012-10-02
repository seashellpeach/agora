<?php
 /**
 * Load the module version information
 *
 * @author		Albert PÃ©rez Monfort (aperezm@xtec.cat)
 * @return		The version information
 */
$dom = ZLanguage::getModuleDomain('iw_agendas');
$modversion['name'] = 'iw_agendas';
$modversion['version'] = '2.0';
$modversion['description'] = __('Allow create and use shared agendas', $dom);
$modversion['displayname']    = __('Agendas', $dom);
$modversion['url'] = __('iw_agendas', $dom);
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Toni Ginard Lladó i Albert Pérez Monfort';
$modversion['contact'] = 'aginard @xtec.cat i aperezm@xtec.es';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('iw_agendas::' => '::');
$modversion['dependencies'] = array(array('modname' => 'iw_main',
											'minversion' => '1.1',
											'maxversion' => '',
											'status' => PNMODULE_DEPENDENCY_REQUIRED));
