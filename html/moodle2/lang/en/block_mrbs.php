<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'block_mrbs', language 'en', branch 'MOODLE_24_STABLE'
 *
 * @package   block_mrbs
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['about_mrbs'] = 'About MRBS';
$string['accessdenied'] = 'Access Denied';
$string['accessmrbs'] = 'Schedule a Resource (Computer Room)';
$string['addarea'] = 'Add Area';
$string['addentry'] = 'Add Entry';
$string['addroom'] = 'Add Room';
$string['adminview'] = 'What is URL to your MRBS Install?';
$string['advanced_search'] = 'Advanced search';
$string['all_day'] = 'All day';
$string['area'] = 'Area';
$string['area_admin_email'] = 'Area admin email';
$string['areas'] = 'Areas';
$string['backadmin'] = 'Back to Admin';
$string['bgcolor'] = 'bgcolor';
$string['blockname'] = 'Resource Scheduling';
$string['bookingmoved'] = 'One of your bookings has been moved';
$string['bookingmovedmessage'] = 'Your {$a->name} booking has been moved from Room {$a->oldroom} to Room {$a->newroom} in {$a->area} for the lesson on {$a->date}, {$a->starttime}. The room is required for {$a->newbookingname}. WARNING: this move has been done by a computer making a calculated best guess, please check that the room is suitable before the lesson';
$string['bookingmovedshort'] = '{$a->name} moved to {$a->newroom}';
$string['bookingmoveerror'] = 'ROOM BOOKING ERROR';
$string['bookingmoveerrormessage'] = 'There has been an error moving {$a->name} (id: {$a->id})';
$string['bookingmoveerrorshort'] = 'There has been an error moving {$a->name}. The administrator has been informed.';
$string['bookingsfor'] = 'Bookings for';
$string['bookingsforpost'] = '--unused string--';
$string['booking_users'] = 'Users who can book';
$string['booking_users_help'] = 'This should be a comma-separated list of the email addresses of the users who are allowed to book this room. Leave this blank to allow all users to book this room.';
$string['both'] = 'Both';
$string['brief_description'] = 'Brief Description.';
$string['browserlang'] = 'Your browser is set to use';
$string['capacity'] = 'Capacity';
$string['charset'] = 'UTF-8';
$string['clash'] = 'Clash: {$a->oldbooking} {$a->newbooking} {$a->time} in Room: {$a->room}';
$string['clashemailbody'] = 'Due to a recent timetable import, there is a clash involving one of your bookings: On {$a->time}, {$a->oldbooking} and {$a->newbooking} are both booked into room {$a->room} Please resolve this between yourselves in advance to avoid unnecessary disruption. THIS WILL BE YOUR ONLY WARNING OF THIS CLASH. IF YOU IGNORE THIS E-MAIL YOU WILL HAVE PROBLEMS. This message has been sent automatically by the online room booking system, if you think you have recieved this in error please contact {$a->admin}';
$string['clashemailnotsent'] = 'COULDN\'T SEND EMAIL TO TEACHER OF';
$string['clashemailsent'] = 'email sent to';
$string['clashemailsub'] = 'Room Clash Alert';
$string['class'] = 'class';
$string['click_to_reserve'] = 'Click on the cell to make a reservation.';
$string['computerroom'] = 'Computer rooms only';
$string['computerrooms'] = 'Computer Rooms';
$string['config_admin'] = 'MRBS Admin';
$string['config_admin2'] = 'Name of the MRBS administrator';
$string['config_admin_email'] = 'MRBS admin email';
$string['config_admin_email2'] = 'Email address of the MRBS administrator. In order to receive MRBS email notifications, the email address must be associated with a Moodle user account.';
$string['config_area_list_format'] = 'Show area list';
$string['config_area_list_format2'] = 'Should areas be shown as a list or a drop-down select box?';
$string['config_cookie_path_override'] = 'Cookie path override';
$string['config_cookie_path_override2'] = 'If this value is set it will be used by the \'php\' session scheme to override the default behaviour of automatically determining the cookie path to use.';
$string['config_date_ddmmyy'] = '10 July';
$string['config_dateformat'] = 'Date format';
$string['config_dateformat2'] = 'Date format to be used by MRBS.';
$string['config_date_mmddyy'] = 'July 10';
$string['config_default_report_days'] = 'Report span (days)';
$string['config_default_report_days2'] = 'Default report span in days';
$string['config_default_room'] = 'Default room';
$string['config_default_room2'] = 'Define default room to start with (used by index.php). Room numbers can be determined by looking at the Edit or Delete URL for a room on the admin page.';
$string['config_default_view'] = 'Default view';
$string['config_default_view2'] = 'Define default starting view (month, week or day)';
$string['config_enable_periods'] = 'Use Periods';
$string['config_enable_periods2'] = 'Use custom periods for MRBS scheduling.  If this is set to no then MRBS will schedule using time blocks';
$string['config_entry_type'] = 'Entry type {$a}';
$string['config_entry_type2'] = 'These event types appear on the \'Add Entry\' screen. Every entry type is assigned a different color by default. Entry types are displayed in the following order: \'Entry A\', \'Entry B\', \'Entry C\', etc';
$string['config_eveningends'] = 'End Hour';
$string['config_eveningends2'] = 'End time (Hour) for the day, Periods must be disabled to use this option.';
$string['config_eveningends_min'] = 'End Minutes';
$string['config_eveningends_min2'] = 'End time (Minutes) for the day, Periods must be disabled to use this option.';
$string['config_highlight_method'] = 'Highlight method';
$string['config_highlight_method2'] = 'Choose one of the highlight methods: bgcolor, class, or hybrid.';
$string['config_javascript_cursor'] = 'Javascript cursor';
$string['config_javascript_cursor2'] = 'Change to false if clients have old browsers incompatible with JavaScript.';
$string['config_mail_admin_all'] = 'Mail admin all';
$string['config_mail_admin_all2'] = 'Send an email to admin for all changes';
$string['config_mail_admin_on_bookings'] = 'Mail admin bookings';
$string['config_mail_admin_on_bookings2'] = 'Send email to admin notifying of a new booking';
$string['config_mail_admin_on_delete'] = 'Mail admin deletes';
$string['config_mail_admin_on_delete2'] = 'Send an email to admin notifying of deletes';
$string['config_mail_area_admin_on_bookings'] = 'Mail area admin';
$string['config_mail_area_admin_on_bookings2'] = 'Send email to area admin notifying of a new booking';
$string['config_mail_booker'] = 'Mail scheduler';
$string['config_mail_booker2'] = 'Send an email to the scheduler of a new booking';
$string['config_mail_cc'] = 'Mail cc';
$string['config_mail_cc2'] = 'Set email address of the Carbon Copy field. Default is blank. Similar to mail recipients, you can define more than one recipient. All recipient emails must be associated with a Moodle user account.';
$string['config_mail_details'] = 'Mail details';
$string['config_mail_details2'] = 'Mail details';
$string['config_mail_from'] = 'Mail from';
$string['config_mail_from2'] = 'Set the email address of the From field. Default is site admin. From email must be associated with a Moodle user account.';
$string['config_mail_recipients'] = 'Mail recipients';
$string['config_mail_recipients2'] = 'Set the recipient email. You can define more than one recipient like this \'john@doe.com,scott@tiger.com\'. Recipient email(s) must be associated with a Moodle user account.';
$string['config_mail_room_admin_on_bookings'] = 'Mail room admin';
$string['config_mail_room_admin_on_bookings2'] = 'Send email to room admin notifying of a new booking';
$string['config_max_advance_days'] = 'Maximum advance booking';
$string['config_max_advance_days2'] = 'The maximum days in advance you can make a booking (-1) to disable';
$string['config_max_rep_entrys'] = 'Max. Rep Entries';
$string['config_max_rep_entrys2'] = 'Maximum repeating entrys (max needed +1)';
$string['config_monthly_view_entries_details'] = 'View monthly details';
$string['config_monthly_view_entries_details2'] = 'Entries in monthly view can be shown as start/end slot, brief description or both. Set to \'description\' for brief description, \'slot\' for time slot and \'both\' for both. Default is \'both\', but 6 entries per day are shown instead of 12.';
$string['config_morningstarts'] = 'Start Hour';
$string['config_morningstarts2'] = 'Start time (Hour) for the day, Periods must be disabled to use this option.';
$string['config_morningstarts_min'] = 'Start Minutes';
$string['config_morningstarts_min2'] = 'Start time (Minutes) for the day, Periods must be disabled to use this option.';
$string['config_new_window'] = 'Window';
$string['config_new_window2'] = 'When set to New window, the MRBS block will open in a new window. When set to Same window, the MRBS block will open inside of Moodle with the Moodle headers.';
$string['config_periods'] = 'Custom Periods';
$string['config_periods2'] = 'Define the name or description for your periods in chronological order.  One entry per line.';
$string['config_refresh_rate'] = 'Page refresh time';
$string['config_refresh_rate2'] = 'Page refresh time (in seconds). Set to 0 to disable';
$string['config_resolution'] = 'Time blocks';
$string['config_resolution2'] = 'Time blocks to be scheduled, Periods must be disabled to use this option.';
$string['config_search_count'] = 'Search results per page';
$string['config_search_count2'] = 'Results per page for searching';
$string['config_show_plus_link'] = 'Show plus link';
$string['config_show_plus_link2'] = 'Change to true to always show the (+) link';
$string['config_timeformat'] = 'Time format';
$string['config_timeformat2'] = 'Time format to be used by MRBS.';
$string['config_times_right_side'] = 'Time right side';
$string['config_times_right_side2'] = 'To display times on right side in day and week view, set to Yes';
$string['config_view_week_number'] = 'View week number';
$string['config_view_week_number2'] = 'To view weeks in the bottom (trailer.php) as week numbers (42) instead of \'first day of the week\' (13 Oct), set this to TRUE';
$string['config_weeklength'] = 'Length of week';
$string['config_weeklength2'] = 'How many days of the week should be displayed?';
$string['config_weekstarts'] = 'Start of Week';
$string['config_weekstarts2'] = 'Select the start of week.';
$string['confirmdel'] = 'Are you sure you want to delete this entry?';
$string['conflict'] = 'The new booking will conflict with the following entry(s)';
$string['createdby'] = 'Created By';
$string['cronfile'] = 'Location of session import file';
$string['cronfiledesc'] = 'If you wish to use the automatic session import feature, enter the location of the file here. The file must be able to be moved by the webserver user. By entering a location, you will enable special booking types for imported bookings';
$string['ctrl_click'] = 'Use Control-Click to select more than one room';
$string['ctrl_click_type'] = 'Use Control-Click to select more than one type';
$string['database'] = 'Database';
$string['dayafter'] = 'Go To Day After';
$string['daybefore'] = 'Go To Day Before';
$string['days'] = 'days';
$string['delarea'] = 'You must delete all rooms in this area before you can delete it<p>';
$string['deleteentry'] = 'Delete Entry';
$string['deletefollowing'] = 'This will delete the following bookings';
$string['deleteseries'] = 'Delete Series';
$string['delete_user'] = 'Delete this user';
$string['dontshowoccupied'] = 'Don\'t show occupied rooms';
$string['doublebookebody'] = 'The user {$a->user} has double booked your room, {$a->room}, at {$a->time} on {$a->date}. This clashes with your booking for {$a->oldbooking}. The user has booked the room for {$a->newbooking}. If this is not a problem, no action is required. However, if you weren\'t expecting this, please contact the user to resolve the conflict. This message has been sent automatically by the online room booking system, if you think you have recieved this in error please contact {$a->admin}';
$string['doublebookefailbody'] = 'The following message failed to send to {$a}:';
$string['doublebookefailsubject'] = 'Double Booking Notification Failure';
$string['doublebookesubject'] = 'Double Booking Notification';
$string['duration'] = 'Duration';
$string['editarea'] = 'Edit Area';
$string['editentry'] = 'Edit Entry';
$string['editingserieswarning'] = 'You are currently editing a single entry in a series, click here to edit the series instead:';
$string['editroom'] = 'Edit Room';
$string['editroomarea'] = 'Edit Area or Room Description';
$string['editseries'] = 'Edit Series';
$string['edit_user'] = 'Edit user';
$string['email_failed'] = 'Email send failed';
$string['end_date'] = 'End Time';
$string['entries_found'] = 'entries found';
$string['entry'] = 'Entry';
$string['entry_found'] = 'entry found';
$string['entryid'] = 'Entry ID';
$string['error_area'] = 'Error: area';
$string['error_room'] = 'Error: room';
$string['error_send_email'] = 'Error: Problem sending email to: {$a}';
$string['external'] = 'Non-class';
$string['failed_connect_db'] = 'Fatal Error: Failed to connect to database';
$string['failed_to_acquire'] = 'Failed to acquire exclusive database access';
$string['findroom'] = 'Find a room';
$string['finishedimport'] = 'Processing complete, time taken: {$a} seconds';
$string['for_any_questions'] = 'for any questions that are not answered here.';
$string['forciblybook'] = 'Forcibly book a room';
$string['forciblybook2'] = 'Forcibly book (automatically move other bookings)';
$string['fulldescription'] = 'Full Description:<br>&nbsp;&nbsp;(Number of people,<br>&nbsp;&nbsp;Internal/External etc)';
$string['goroom'] = 'Go';
$string['goto'] = 'goto';
$string['gotoroom'] = 'Go to';
$string['gotothismonth'] = 'Go To This Month';
$string['gotothisweek'] = 'Go To This Week';
$string['gototoday'] = 'Go To Today';
$string['help_wildcard'] = 'Note: Use the % symbol as a wildcard in any of the text boxes';
$string['highlight_line'] = 'Highlight this line';
$string['hours'] = 'hours';
$string['hybrid'] = 'hybrid';
$string['idontcare'] = 'I don\'t care, double book the room(s)';
$string['importedbooking'] = 'Imported Booking';
$string['importedbookingmoved'] = 'Imported Booking (Edited)';
$string['importlog'] = 'MRBS Import log';
$string['in'] = 'in';
$string['include'] = 'Include';
$string['internal'] = 'Class';
$string['invalid_booking'] = 'Invalid booking';
$string['invalid_entry_id'] = 'Invalid entry id.';
$string['invalid_search'] = 'Empty or invalid search string.';
$string['invalid_series_id'] = 'Invalid series id.';
$string['mail_body_changed_entry'] = 'An entry has been modified, here are the details';
$string['mail_body_del_entry'] = 'An entry has been deleted, here are the details';
$string['mail_body_new_entry'] = 'A new entry has been booked, here are the details';
$string['mail_changed_entry'] = 'An entry has been modified, here are the details';
$string['mail_deleted_entry'] = 'An entry has been deleted, here are the details';
$string['mail_new_entry'] = 'A new entry has been booked, here are the details';
$string['mail_subject'] = 'Subject';
$string['mail_subject_delete'] = 'Entry deleted for {$a->date}, {$a->room} (booked by {$a->user})';
$string['mail_subject_entry'] = 'Entry changed for {$a->date}, {$a->room} (by {$a->user})';
$string['mail_subject_newentry'] = 'Entry added for {$a->date}, {$a->room} (by {$a->user})';
$string['match_area'] = 'Match area';
$string['match_descr'] = 'Match full description';
$string['match_entry'] = 'Match brief description';
$string['match_room'] = 'Match room';
$string['match_type'] = 'Match type';
$string['mincapacity'] = 'Minimum capacity';
$string['minutes'] = 'minutes';
$string['month'] = 'Month';
$string['monthafter'] = 'Go To Month After';
$string['monthbefore'] = 'Go To Month Before';
$string['movedto'] = 'moved to';
$string['mrbs'] = 'Meeting Room Booking System';
$string['mrbs:addinstance'] = 'Add MRBS block to My Moodle page';
$string['mrbsadmin'] = 'MRBS administrator';
$string['mrbsadmin_desc'] = 'Users with this role (at the system level) can fully configure an MRBS timetable: create areas and rooms, edit other people\'s bookings, force bookings and double-book rooms';
$string['mrbs:administermrbs'] = 'Access MRBS (Read / Write / Admin)';
$string['mrbs:doublebook'] = 'Double Book Rooms';
$string['mrbs:editmrbs'] = 'Access MRBS (Read / Write)';
$string['mrbs:editmrbsunconfirmed'] = 'Only create \'unconfirmed\' bookings (overriden by \'editmrbs\')';
$string['mrbseditor'] = 'MRBS editor';
$string['mrbseditor_desc'] = 'Users with this role (at the system level) can make bookings using MRBS and edit their own bookings';
$string['mrbs:forcebook'] = 'Force Book Rooms (auto move existing bookings)';
$string['mrbs:myaddinstance'] = 'Add new MRBS block';
$string['mrbs:viewalltt'] = 'View All Users\' Timetables';
$string['mrbsviewer'] = 'MRBS viewer';
$string['mrbsviewer_desc'] = 'Users with this role (at the system level) can view the MRBS timetable, but cannot make any changes';
$string['mrbs:viewmrbs'] = 'Access MRBS (Read only)';
$string['mustlogin'] = 'You must be logged in to Moodle before you can access the MRBS calendar block';
$string['must_set_description'] = 'You must set a description';
$string['must_set_name'] = 'You must set a name';
$string['namebooker'] = 'Reservation for';
$string['newwindow'] = 'New window';
$string['noarea'] = 'No area selected';
$string['noareas'] = 'No Areas';
$string['norights'] = 'You do not have access rights to modify this item.';
$string['norooms'] = 'No rooms.';
$string['no_rooms_for_area'] = 'No rooms defined for this area';
$string['noroomsfound'] = 'Sorry, no rooms found';
$string['notallcreated'] = 'Some bookings are too far in advance - {$a->created} out of {$a->requested} bookings created';
$string['notallowedbook'] = 'You are not in the list of users allowed to book this room';
$string['not_found'] = 'not found';
$string['not_php3'] = '<H1>WARNING: This probably does not work with PHP3</H1>';
$string['no_users_create_first_admin'] = 'Create a user configured as administrator and then you can log in and create more users.';
$string['no_users_initial'] = 'No users in database, allowing initial user creation';
$string['no_user_with_email'] = 'No Moodle users found with an email address of: {$a}. All MRBS related email(s) must be associated with a Moodle user account.';
$string['of'] = 'of';
$string['pagewindow'] = 'Same window';
$string['password_twice'] = 'If you wish to change the password, please type the new password twice';
$string['period'] = 'Period';
$string['periods'] = 'periods';
$string['please_contact'] = 'Please contact';
$string['pluginname'] = 'MRBS';
$string['postbrowserlang'] = 'language.';
$string['ppreview'] = 'Print Preview';
$string['records'] = 'Records';
$string['rep_dsp'] = 'Display in report';
$string['rep_dsp_dur'] = 'Duration';
$string['rep_dsp_end'] = 'End Time';
$string['repeat_id'] = 'Repeat ID';
$string['rep_end_date'] = 'Repeat End Date';
$string['rep_for_nweekly'] = '(for n-weekly)';
$string['rep_for_weekly'] = '(for (n-)weekly)';
$string['rep_freq'] = 'Frequency';
$string['rep_num_weeks'] = 'Number of weeks';
$string['report_and_summary'] = 'Report and Summary';
$string['report_end'] = 'Report end date';
$string['report_on'] = 'Report on Meetings';
$string['report_only'] = 'Report only';
$string['report_start'] = 'Report start date';
$string['rep_rep_day'] = 'Repeat Day';
$string['rep_type'] = 'Repeat Type';
$string['rep_type_0'] = 'None';
$string['rep_type_1'] = 'Daily';
$string['rep_type_2'] = 'Weekly';
$string['rep_type_3'] = 'Monthly';
$string['rep_type_4'] = 'Yearly';
$string['rep_type_5'] = 'Monthly, corresponding day';
$string['rep_type_6'] = 'n-Weekly';
$string['requestvacate'] = 'Request that this booking be moved';
$string['requestvacatemessage'] = '{$a->user} requests that you move {$a->description} from room {$a->room}, {$a->datetime}. Please contact them to discuss this.[Give a reason]';
$string['requestvacatemessage_html'] = '{$a->user} requests that you move <a href="{$a->href}">{$a->description}</a> from room {$a->room}, {$a->datetime}. Please contact them to discuss this.<br /><br />[Give a reason]';
$string['resolution_units'] = 'Minutes';
$string['returncal'] = 'Return to calendar view';
$string['returnprev'] = 'Return to previous page';
$string['rights'] = 'Rights';
$string['room'] = 'Room';
$string['room_admin_email'] = 'Room admin email';
$string['roomchange'] = 'Mark as room change';
$string['rooms'] = 'Rooms';
$string['roomsearch'] = 'Room Search';
$string['roomsfree'] = 'Rooms free...';
$string['sched_conflict'] = 'Scheduling Conflict';
$string['search_for'] = 'Search For';
$string['search_results'] = 'Search Results for';
$string['seconds'] = 'seconds';
$string['serverpath'] = 'MRBS Installation path';
$string['show_my_entries'] = 'Click to display all my upcoming entries';
$string['slot'] = 'Slot';
$string['sort_rep'] = 'Sort Report by';
$string['sort_rep_time'] = 'Start Date/Time';
$string['specialroom'] = 'Exclude special rooms';
$string['start_date'] = 'Start Time';
$string['startedimport'] = 'File found, starting import processing...';
$string['submitquery'] = 'Run Report';
$string['sum_by_creator'] = 'Creator';
$string['sum_by_descrip'] = 'Brief description';
$string['summarize_by'] = 'Summarize by';
$string['summary_header'] = 'Summary of (Entries) Hours';
$string['summary_header_per'] = 'Summary of (Entries) Periods';
$string['summary_only'] = 'Summary only';
$string['sure'] = 'Are you sure?';
$string['system'] = 'System';
$string['teachingroom'] = 'Teaching rooms only';
$string['through'] = 'through';
$string['toofaradvance'] = 'You cannot book rooms more than {$a} days in advance';
$string['too_may_entrys'] = 'The selected options will create too many entries.<BR>Please use different options!';
$string['ttfor'] = 'Timetable for:';
$string['type'] = 'Type';
$string['typea'] = '--unused string--';
$string['unconfirmedbooking'] = 'Unconfirmed';
$string['unknown'] = 'Unknown';
$string['update_area_failed'] = 'Update area failed';
$string['update_room_failed'] = 'Update room failed';
$string['useful_n-weekly_value'] = 'useful n-weekly value.';
$string['valid_room'] = 'room.';
$string['valid_time_of_day'] = 'valid time of day.';
$string['viewday'] = 'View Day';
$string['viewmonth'] = 'View Month';
$string['viewweek'] = 'View Week';
$string['weekafter'] = 'Go To Week After';
$string['weekbefore'] = 'Go To Week Before';
$string['weeks'] = 'weeks';
$string['you_are'] = 'You are';
$string['you_have_not_entered'] = 'You have not entered a';
$string['you_have_not_selected'] = 'You have not selected a';