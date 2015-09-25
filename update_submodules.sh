#!/bin/bash

source "update_functions.sh"

#El tercer paràmetre només es posa si el repositori és nostre per poder-hi escriure
# Moodle
gitcheckout "html/moodle2" "master" "git@github.com:projectestac/agora_moodle2.git"
gitcheckout "html/moodle2/auth/googleoauth2" "master" "git@github.com:projectestac/moodle-auth_googleoauth2.git"
gitcheckout "html/moodle2/blocks/rgrade" "master" "https://github.com/imartel/Rgrade.git"
gitcheckout "html/moodle2/course/format/simple" "master" "git@github.com:projectestac/moodle-format_simple.git"
gitcheckout "html/moodle2/filter/wiris" "master" "git@github.com:projectestac/moodle-filter_wiris.git"
gitcheckout "html/moodle2/langpacks" "master" "git@github.com:projectestac/moodle-langpacks.git"
gitcheckout "html/moodle2/lib/editor/atto/plugins/fontsize" "master" "https://github.com/andrewnicols/moodle-atto_fontsize.git"
gitcheckout "html/moodle2/lib/editor/atto/plugins/fontfamily" "master" "git@github.com:projectestac/moodle-atto_fontfamily.git"
gitcheckout "html/moodle2/lib/editor/atto/plugins/wiris" "master" "git@github.com:projectestac/moodle-atto_wiris.git"
gitcheckout "html/moodle2/local/agora" "master" "git@github.com:projectestac/moodle-local_agora.git"
gitcheckout "html/moodle2/local/agora/mailer" "master" "git@github.com:projectestac/mailer.git"
gitcheckout "html/moodle2/local/bigdata" "master" "git@github.com:projectestac/moodle-local_bigdata.git"
gitcheckout "html/moodle2/local/oauth" "master" "git@github.com:projectestac/moodle-local_oauth.git"
gitcheckout "html/moodle2/local/mobile" "MOODLE_28_STABLE" "https://github.com/jleyva/moodle-local_mobile.git"
gitcheckout "html/moodle2/mod/choicegroup" "master" "git@github.com:projectestac/moodle-mod_choicegroup.git"
gitcheckout "html/moodle2/mod/geogebra" "master" "git@github.com:projectestac/moodle-mod_geogebra.git"
gitcheckout "html/moodle2/mod/hotpot" "master" "https://github.com/gbateson/moodle-mod_hotpot.git"
gitcheckout "html/moodle2/mod/jclic" "master" "git@github.com:projectestac/moodle-mod_jclic.git"
gitcheckout "html/moodle2/mod/journal" "MOODLE_28_STABLE" "https://github.com/dmonllao/moodle-mod_journal.git"
gitcheckout "html/moodle2/mod/questionnaire" "MOODLE_28_STABLE" "git@github.com:projectestac/moodle-mod_questionnaire.git"
gitcheckout "html/moodle2/mod/qv" "master" "git@github.com:projectestac/moodle-mod_qv.git"
gitcheckout "html/moodle2/question/format/hotpot" "master" "git@github.com:projectestac/moodle-mod_hotpot.git"
gitcheckout "html/moodle2/question/type/ddimageortext" "master" "https://github.com/moodleou/moodle-qtype_ddimageortext.git"
gitcheckout "html/moodle2/question/type/ddmarker" "master" "https://github.com/moodleou/moodle-qtype_ddmarker.git"
gitcheckout "html/moodle2/question/type/ddwtos" "master" "https://github.com/moodleou/moodle-qtype_ddwtos.git"
gitcheckout "html/moodle2/question/type/gapselect" "master" "https://github.com/moodleou/moodle-qtype_gapselect.git"
gitcheckout "html/moodle2/question/type/essaywiris" "master" "git@github.com:projectestac/moodle-qtype_essaywiris.git"
gitcheckout "html/moodle2/question/type/matchwiris" "master" "git@github.com:projectestac/moodle-qtype_matchwiris.git"
gitcheckout "html/moodle2/question/type/multianswerwiris" "master" "git@github.com:projectestac/moodle-qtype_multianswerwiris.git"
gitcheckout "html/moodle2/question/type/multichoicewiris" "master" "git@github.com:projectestac/moodle-qtype_multichoicewiris.git"
gitcheckout "html/moodle2/question/type/shortanswerwiris" "master" "git@github.com:projectestac/moodle-qtype_shortanswerwiris.git"
gitcheckout "html/moodle2/question/type/truefalsewiris" "master" "git@github.com:projectestac/moodle-qtype_truefalsewiris.git"
gitcheckout "html/moodle2/question/type/wq" "master" "git@github.com:projectestac/moodle-qtype_wq.git"
gitcheckout "html/moodle2/report/coursequotas" "master" "git@github.com:projectestac/moodle-report_coursequotas.git"
gitcheckout "html/moodle2/theme/xtec2" "master" "git@github.com:projectestac/moodle-theme_xtec2.git"

# Wordpress
gitcheckout "html/wordpress" "master" "git@github.com:projectestac/agora_nodes.git"
gitcheckout "html/wordpress/wp-content/mu-plugins/common" "master" "git@github.com:projectestac/wordpress-mu-common.git"
gitcheckout "html/wordpress/wp-content/plugins/blogger-importer" "master" "git@github.com:projectestac/wordpress-blogger-importer.git"
gitcheckout "html/wordpress/wp-content/plugins/google-analyticator" "master" "git@github.com:projectestac/wordpress-google-analyticator.git"
gitcheckout "html/wordpress/wp-content/plugins/google-calendar-events" "master" "git@github.com:projectestac/wordpress-gce.git"
gitcheckout "html/wordpress/wp-content/plugins/raw-html" "master" "git@github.com:projectestac/wordpress-raw-html.git"
gitcheckout "html/wordpress/wp-content/plugins/slideshow-jquery-image-gallery" "master" "git@github.com:projectestac/wordpress-slideshow-jig.git"
gitcheckout "html/wordpress/wp-content/plugins/tinymce-advanced" "master" "git@github.com:projectestac/wordpress-tinymce-advanced.git"
gitcheckout "html/wordpress/wp-content/plugins/wordpress-importer" "master" "git@github.com:projectestac/wordpress-importer.git"
gitcheckout "html/wordpress/wp-content/plugins/wordpress-php-info" "master" "git@github.com:projectestac/wordpress-php-info.git"
gitcheckout "html/wordpress/wp-content/plugins/wordpress-social-login" "master" "git@github.com:projectestac/wordpress-social-login.git"
gitcheckout "html/wordpress/wp-content/plugins/xtec-mail/lib" "master" "git@github.com:projectestac/mailer.git"
gitcheckout "html/wordpress/wp-includes/xtec" "master" "git@github.com:projectestac/wordpress-xtec.git"

# Intranet
gitcheckout "html/zikula2/modules/IWagendas" "master" "git@github.com:intraweb-modules13/IWagendas.git"
gitcheckout "html/zikula2/modules/IWdocmanager" "master" "git@github.com:intraweb-modules13/IWdocmanager.git"
gitcheckout "html/zikula2/modules/IWgroups" "master" "git@github.com:intraweb-modules13/IWgroups.git"
gitcheckout "html/zikula2/modules/XtecMailer/includes/mailer" "master" "git@github.com:projectestac/mailer.git"

# Portal
gitcheckout "html/portal/modules/XtecMailer/includes/mailer" "master" "git@github.com:projectestac/mailer.git"

# General
gitcheckout "html/testlib" "master" "git@github.com:projectestac/testlib_PHP.git"

