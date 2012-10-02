<?php
/**
 * Zikula Application Framework
 *
 * Web_Links
 *
 * @version $Id: pnuser.php 56 2009-01-26 11:02:56Z Petzi-Juist $
 * @copyright 2008 by Petzi-Juist
 * @link http://www.petzi-juist.de
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */

/**
* the main user function
*/
function Web_Links_user_main() //ready
{
    return Web_Links_user_view();
}

/**
* view
*/
function Web_Links_user_view() //ready
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    // get the categories
    $categories = pnModAPIFunc('Web_Links', 'user', 'categories');

    // The return value of the function is checked
    if (!$categories) {
        return DataUtil::formatForDisplayHTML(__('No existing categories', $dom));
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    // assign various useful template variables
    $pnRender->assign('categories', $categories);
    $pnRender->assign('numrows', pnModAPIFunc('Web_Links', 'user', 'numrows'));
    $pnRender->assign('catnum', pnModAPIFunc('Web_Links', 'user', 'catnum'));
    if (pnModGetVar('Web_Links', 'featurebox') == 1) {
        $pnRender->assign('linkbox', pnModGetVar('Web_Links', 'featurebox'));
        $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));
        $pnRender->assign('blocklast', pnModAPIFunc('Web_Links', 'user', 'lastweblinks'));
        $pnRender->assign('blockmostpop', pnModAPIFunc('Web_Links', 'user', 'mostpopularweblinks'));
    }

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_view.html');
}

function Web_Links_user_category($args)
{
    // Get parameters from whatever input we need
    $cid = (int)FormUtil::getPassedValue('cid', isset($args['cid']) ? $args['cid'] : null, 'GET');
    $orderby = FormUtil::getPassedValue('orderby', isset($args['orderby']) ? $args['orderby'] : 'titleA', 'GET');
    $startnum = (int)FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GET');

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_READ)) {
        return LogUtil::registerPermissionError();
    }

    // permission check
    if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_ADMIN)) {
        $userpermission = "admin";
    } else if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_COMMENT)) {
        $userpermission = "comment";
    }

    $category = pnModAPIFunc('Web_Links', 'user', 'category', array('cid' => $cid));

    $subcategory = pnModAPIFunc('Web_Links', 'user', 'subcategory', array('cid' => $cid));

    $weblinks = pnModAPIFunc('Web_Links', 'user', 'weblinks', array('cid' => $cid,
                                                                    'orderbysql' => pnModAPIFunc('Web_Links', 'user', 'orderbyin', array('orderby' => $orderby)),
                                                                    'startnum' => $startnum,
                                                                    'numlinks' => pnModGetVar('Web_Links', 'perpage')));

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_COMMENT)) {
        $access_comment_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_COMMENT)) {
        $access_comment_link = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_READ)) {
        $access_read_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_READ)) {
        $access_read_link = 1;
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('userpermission', $userpermission);
    $pnRender->assign('orderby', $orderby);
    $pnRender->assign('category', $category);
    $pnRender->assign('subcategory', $subcategory);
    $pnRender->assign('weblinks', $weblinks);
    $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));
    $pnRender->assign('access_comment_cat', $access_comment_cat);
    $pnRender->assign('access_comment_link', $access_comment_link);
    $pnRender->assign('access_read_cat', $access_read_cat);
    $pnRender->assign('access_read_link', $access_read_link);
    $pnRender->assign('wlpager', array('numitems' => pnModAPIFunc('Web_Links', 'user', 'countcatlinks', array('cid' => $cid)),
                                     'itemsperpage' => pnModGetVar('Web_Links', 'perpage')));

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_category.html');
}

function Web_Links_user_visit($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    // Get parameters from whatever input we need.
    $lid = (int)FormUtil::getPassedValue('lid', isset($args['lid']) ? $args['lid'] : null, 'GET');

    // The API function is called.
    $link = pnModAPIFunc('Web_Links', 'user', 'link', array('lid' => $lid));

    // The return value of the function is checked here
    if ($link == false) {
        pnSessionSetVar('statusmsg', __('Link existiert nicht...', $dom));
        return false;
    }

    // The API function is called.
    $return = pnModAPIFunc('Web_Links', 'user', 'hitcountinc', array('lid' => $lid));

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::Link', '::$lid', ACCESS_READ)) {
        pnSessionSetVar('statusmsg',__('Sorry! No authorization to access this module.', $dom));
        pnRedirect(pnModURL('Web_Links', 'user', 'view'));
        return false;
    } else {
        // Is the URL local?
        if (eregi('^http:|^ftp:|^https:', $link['url'])) {
            pnRedirect($link['url']);
        } else {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $link['url']);
        }
    }

    // Return
    return true;

}

function Web_Links_user_search($args)
{
    // Get parameters from whatever input we need
    $query = FormUtil::getPassedValue('query', isset($args['query']) ? $args['query'] : null, 'GETPOST');
    $orderby = FormUtil::getPassedValue('orderby', isset($args['orderby']) ? $args['orderby'] : 'titleA', 'GETPOST');
    $startnum = (int)FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 1, 'GETPOST');

    // permission check
    if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_ADMIN)) {
        $userpermission = "admin";
    } else if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_COMMENT)) {
        $userpermission = "comment";
    }

    $subcategory = pnModAPIFunc('Web_Links', 'user', 'searchcats', array('query' => $query));

    $weblinks = pnModAPIFunc('Web_Links', 'user', 'search_weblinks', array('query' => $query,
                                                                  'orderbysql' => pnModAPIFunc('Web_Links', 'user', 'orderbyin', array('orderby' =>$orderby)),
                                                                  'startnum' => $startnum,
                                                                  'numlinks' => pnModGetVar('Web_Links', 'linksresults')));

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_COMMENT)) {
        $access_comment_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_COMMENT)) {
        $access_comment_link = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_READ)) {
        $access_read_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_READ)) {
        $access_read_link = 1;
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('query', $query);
    $pnRender->assign('subcategory', $subcategory);
    $pnRender->assign('orderby', $orderby);
    $pnRender->assign('weblinks', $weblinks);
    $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));
    $pnRender->assign('userpermission', $userpermission);
    $pnRender->assign('access_comment_cat', $access_comment_cat);
    $pnRender->assign('access_comment_link', $access_comment_link);
    $pnRender->assign('access_read_cat', $access_read_cat);
    $pnRender->assign('access_read_link', $access_read_link);
    $pnRender->assign('wlpager', array('numlinks' => pnModAPIFunc('Web_Links', 'user', 'countsearchlinks', array('query' => $query)),
                                     'itemsperpage' => pnModGetVar('Web_Links', 'linksresults')));

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_searchresults.html');
}

function Web_Links_user_randomlink()
{
    pnRedirect(pnModURL('Web_Links', 'user', 'visit', array('lid' => pnModAPIFunc('Web_Links', 'user', 'random'))));

    return true;
}

function Web_Links_user_viewlinkdetails($args)
{
    // Get parameters from whatever input we need.
    $lid = (int)FormUtil::getPassedValue('lid', isset($args['lid']) ? $args['lid'] : null, 'GET');

    // permission check
    if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_ADMIN)) {
        $userpermission = "admin";
    } else if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_COMMENT)) {
        $userpermission = "comment";
    }

    $weblink = pnModAPIFunc('Web_Links', 'user', 'link', array('lid' => $lid));

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_COMMENT)) {
        $access_comment_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_COMMENT)) {
        $access_comment_link = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_READ)) {
        $access_read_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_READ)) {
        $access_read_link = 1;
    }

    // Create output object
    $pnRender =& new pnRender('Web_Links');

    $pnRender->assign('lid', $lid);
    $pnRender->assign('userpermission', $userpermission);
    $pnRender->assign('access_comment_cat', $access_comment_cat);
    $pnRender->assign('access_comment_link', $access_comment_link);
    $pnRender->assign('access_read_cat', $access_read_cat);
    $pnRender->assign('access_read_link', $access_read_link);
    $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));
    $pnRender->assign('weblink', $weblink);

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_details.html');
}

function Web_Links_user_newlinks($args)
{
    // Get parameters from whatever input we need.
    $newlinkshowdays = (int)FormUtil::getPassedValue('newlinkshowdays', isset($args['newlinkshowdays']) ? $args['newlinkshowdays'] : '7', 'GET');

    // permission check
    if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_ADMIN)) {
        $userpermission = "admin";
    } else if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_COMMENT)) {
        $userpermission = "comment";
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('userpermission', $userpermission);
    $pnRender->assign('newlinkshowdays', $newlinkshowdays);

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_newlinks.html');
}

function Web_Links_user_newlinksdate($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    $selectdate = (int)FormUtil::getPassedValue('selectdate', isset($args['selectdate']) ? $args['selectdate'] : null, 'GET');

    $totallinks = pnModAPIFunc('Web_Links', 'user', 'totallinks', array('selectdate' => $selectdate));

    $weblinks = pnModAPIFunc('Web_Links', 'user', 'weblinksbydate', array('selectdate' => $selectdate));

    // permission check
    if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_ADMIN)) {
        $userpermission = "admin";
    } else if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_COMMENT)) {
        $userpermission = "comment";
    }

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_COMMENT)) {
        $access_comment_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_COMMENT)) {
        $access_comment_link = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_READ)) {
        $access_read_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_READ)) {
        $access_read_link = 1;
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('userpermission', $userpermission);
    $pnRender->assign('dateview', (ml_ftime(__('%A, %B %d, %Y', $dom), $selectdate)));
    $pnRender->assign('totallinks', $totallinks);
    $pnRender->assign('weblinks', $weblinks);
    $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));
    $pnRender->assign('access_comment_cat', $access_comment_cat);
    $pnRender->assign('access_comment_link', $access_comment_link);
    $pnRender->assign('access_read_cat', $access_read_cat);
    $pnRender->assign('access_read_link', $access_read_link);

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_newlinksdate.html');
}

function Web_Links_user_mostpopular($args)
{
    $ratenum = (int)FormUtil::getPassedValue('ratenum', isset($args['ratenum']) ? $args['ratenum'] : null, 'GET');
    $ratetype = FormUtil::getPassedValue('ratetype', isset($args['ratetype']) ? $args['ratetype'] : null, 'GET');

    $mostpoplinkspercentrigger = pnModGetVar('Web_Links', 'mostpoplinkspercentrigger');
    $mostpoplinks = pnModGetVar('Web_Links', 'mostpoplinks');
    $mainvotedecimal = pnModGetVar('Web_Links', 'mainvotedecimal');


    if ($ratenum != "" && $ratetype != "") {
        if (!is_numeric($ratenum)) {
            $ratenum=5;
        }
        if ($ratetype != "percent") {
            $ratetype = "num";
        }
        $mostpoplinks = $ratenum;
        if ($ratetype == "percent") {
            $mostpoplinkspercentrigger = 1;
        }
    }
    if ($mostpoplinkspercentrigger == 1) {
        $toplinkspercent = $mostpoplinks;

        $dbconn =& pnDBGetConn(true);
        $pntable =& pnDBGetTables();

        $result =& $dbconn->Execute("SELECT COUNT(*) FROM $pntable[links_links]");
        list($totalmostpoplinks) = $result->fields;

        $mostpoplinks = $mostpoplinks / 100;
        $mostpoplinks = $totalmostpoplinks * $mostpoplinks;
        $mostpoplinks = round($mostpoplinks);
        $mostpoplinks = max(1, $mostpoplinks);
    }

    $weblinks = pnModAPIFunc('Web_Links', 'user', 'weblinksmostpop', array('mostpoplinks' => $mostpoplinks));

    // permission check
    if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_ADMIN)) {
        $userpermission = "admin";
    } else if (SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_COMMENT)) {
        $userpermission = "comment";
    }

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_COMMENT)) {
        $access_comment_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_COMMENT)) {
        $access_comment_link = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Category', '::', ACCESS_READ)) {
        $access_read_cat = 1;
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', '::$weblinks.lid', ACCESS_READ)) {
        $access_read_link = 1;
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('userpermission', $userpermission);
    $pnRender->assign('mostpoplinkspercentrigger', $mostpoplinkspercentrigger);
    $pnRender->assign('toplinkspercent', $toplinkspercent);
    $pnRender->assign('totalmostpoplinks', $totalmostpoplinks);
    $pnRender->assign('mostpoplinks', $mostpoplinks);
    $pnRender->assign('weblinks', $weblinks);
    $pnRender->assign('tb', pnModGetVar('Web_Links', 'targetblank'));
    $pnRender->assign('access_comment_cat', $access_comment_cat);
    $pnRender->assign('access_comment_link', $access_comment_link);
    $pnRender->assign('access_read_cat', $access_read_cat);
    $pnRender->assign('access_read_link', $access_read_link);

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_mostpopular.html');
}

function Web_Links_user_brokenlink($args)
{
    $lid = (int)FormUtil::getPassedValue('lid', isset($args['lid']) ? $args['lid'] : null, 'GET');

    if (pnUserLoggedIn()) {
        $ratinguser = pnUserGetVar('uname');
    } else {
        $ratinguser = pnConfigGetVar("anonymous");
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('lid', $lid);
    $pnRender->assign('ratinguser', $ratinguser);
    $pnRender->assign('anonymous', pnConfigGetVar("anonymous"));

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_brokenlink.html');
}

function Web_Links_user_modifylinkrequest($args)
{
    $lid = (int)FormUtil::getPassedValue('lid', isset($args['lid']) ? $args['lid'] : null, 'GET');

    $link = pnModAPIFunc('Web_Links', 'user', 'link', array('lid' => $lid));

    if (pnUserLoggedIn()) {
        $ratinguser = pnUserGetVar('uname');
    } else {
        $ratinguser = pnConfigGetVar("anonymous");
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('blocknow', 0);
    $pnRender->assign('blockunregmodify', pnModGetVar('Web_Links', 'blockunregmodify'));
    $pnRender->assign('link', $link);
    $pnRender->assign('ratinguser', $ratinguser);
    $pnRender->assign('anonymous', pnConfigGetVar("anonymous"));

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_modifylinkrequest.html');
}

function Web_Links_user_modifylinkrequests($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    $lid = (int)FormUtil::getPassedValue('lid', isset($args['lid']) ? $args['lid'] : null, 'POST');
    $cat = (int)FormUtil::getPassedValue('cat', isset($args['cat']) ? $args['cat'] : null, 'POST');
    $title = FormUtil::getPassedValue('title', isset($args['title']) ? $args['title'] : null, 'POST');
    $url = FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : null, 'POST');
    $description = FormUtil::getPassedValue('description', isset($args['description']) ? $args['description'] : null, 'POST');
    $modifysubmitter = FormUtil::getPassedValue('modifysubmitter', isset($args['modifysubmitter']) ? $args['modifysubmitter'] : null, 'POST');

    // Confirm authorisation code
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', __('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
        pnRedirect(pnModURL('Web_Links', 'user', 'view'));
        return true;
    }

    if (pnModGetVar('Web_Links', 'blockunregmodify') == 0 || SecurityUtil::checkPermission('Web_Links::', '::', ACCESS_COMMENT)) {
        // The API function is called.
        $return = pnModAPIFunc('Web_Links', 'user', 'modifylinkrequest', array('lid' => $lid,
                                                                               'cat' => $cat,
                                                                               'title' => $title,
                                                                               'url' => $url,
                                                                               'description' => $description,
                                                                               'modifysubmitter' => $modifysubmitter));
        // Create output object
        $pnRender = pnRender::getInstance('Web_Links');

        // Return the output that has been generated by this function
        return $pnRender->fetch('weblinks_user_modifylinkrequests.html');
    } else {
        LogUtil::registerError (__('Sorry! Only registered users can suggest link modifications.', $dom));
        return pnRedirect(pnModURL('Web_Links', 'user', 'view'));
    }
}

function Web_Links_user_brokenlinks($args)
{
    $dom = ZLanguage::getModuleDomain('Web_Links');
    $lid = (int)FormUtil::getPassedValue('lid', isset($args['lid']) ? $args['lid'] : null, 'POST');
    $modifysubmitter = FormUtil::getPassedValue('modifysubmitter', isset($args['modifysubmitter']) ? $args['modifysubmitter'] : null, 'POST');

    // Confirm authorisation code
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', __('Invalid \'authkey\':  this probably means that you pressed the \'Back\' button, or that the page \'authkey\' expired. Please refresh the page and try again.', $dom));
        pnRedirect(pnModURL('Web_Links', 'user', 'view'));
        return true;
    }

    // The API function is called.
    $return = pnModAPIFunc('Web_Links', 'user', 'brockenlink', array('lid' => $lid,
                                                                     'modifysubmitter' => $modifysubmitter));

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_brokenlinks.html');
}

function Web_Links_user_addlink()
{
    $yn = $ye = "";
    if (pnUserLoggedIn()) {
        $yn = pnUserGetVar('uname');
        $ye = pnUserGetVar('email');
    }

    if (SecurityUtil::checkPermission('Web_Links::Link', "::", ACCESS_ADD) || pnModGetVar('Web_Links', 'links_anonaddlinklock') == 0) {
        $addlink = 1;
    }

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links', false);

    $pnRender->assign('addlink', $addlink);
    $pnRender->assign('yn', $yn);
    $pnRender->assign('ye', $ye);

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_addlink.html');
}

function Web_Links_user_add($args)
{
    $newlink = FormUtil::getPassedValue('newlink', isset($args['newlink']) ? $args['newlink'] : null, 'POST');

    // Security check
    if (!SecurityUtil::checkPermission('Web_Links::Link', '::', ACCESS_ADD)) {
        return LogUtil::registerPermissionError();
    }

    // Confirm authorisation code
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('Web_Links', 'user', 'view'));
    }

    $link = pnModAPIFunc('Web_Links', 'user', 'add', array('title' => $newlink['title'],
                                                            'url' => $newlink['url'],
                                                            'cat' => $newlink['cat'],
                                                           'description' => $newlink['description'],
                                                           'nname' => $newlink['nname'],
                                                           'email' => $newlink['email']));

    // Create output object
    $pnRender = pnRender::getInstance('Web_Links');

    $pnRender->assign('submit', $link['submit']);
    $pnRender->assign('text', $link['text']);

    // Return the output that has been generated by this function
    return $pnRender->fetch('weblinks_user_add.html');
}