// Copyright Zikula Foundation 2010 - license GNU/LGPLv3 (or at your option, any later version).
document.observe("dom:loaded",mailer_testconfig_init);function mailer_testconfig_init(){$("mailer_msgtype_text").observe("click",mailer_msgtype_onclick);$("mailer_msgtype_html").observe("click",mailer_msgtype_onclick);$("mailer_msgtype_multipart").observe("click",mailer_msgtype_onclick);mailer_msgtype_onclick()}function mailer_msgtype_onclick(){var a=$("mailer_msgtype_html");var c=$("mailer_msgtype_multipart");var b=$("mailer_html");var d=$("mailer_body_html");var e=$("mailer_altbody_div");if(a.checked){b.value=1}else{b.value=0}if(c.checked){d.show();e.show()}else{d.hide();e.hide()}};