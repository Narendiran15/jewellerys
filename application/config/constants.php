<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  or define('DIR_WRITE_MODE', 0755);


/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
/*
|--------------------------------------------------------------------------
| Table Constants
|--------------------------------------------------------------------------
|
*/
define('ADMIN_PATH',                        'admin');
define('TBL_PREF',                        'fc_');
define('ADMIN',                        TBL_PREF . 'admin');
define('COMPANY',                    TBL_PREF . 'company');
define('OFFICE',                    TBL_PREF . 'office');
define('IATA',                        TBL_PREF . 'iata');
define('USERS',                        TBL_PREF . 'users');
define('ADMIN_SETTINGS',            TBL_PREF . 'admin_settings');
define('CMS',                        TBL_PREF . 'cms');
define('EMAIL',                        TBL_PREF . 'email');
define('CONTACTUS',                    TBL_PREF . 'contactus');
define('FILESUPLOADS',                TBL_PREF . 'fileuploads');
define('CATEGORY',                    TBL_PREF . 'category');
define('NEWSLETTER',                TBL_PREF . 'newsletter');
define('BANNER',                    TBL_PREF . 'banner');
define('NEWS',                        TBL_PREF . 'news');
define('SERVICES',                    TBL_PREF . 'service');
define('CONTACT_ENQUIRY',           TBL_PREF . 'contact_enquiry');
define('FEES',                        TBL_PREF . 'fees');
define('COUNTRY',                    TBL_PREF . 'country');
define('FOOTER',                    TBL_PREF . 'footer');
define('INVOICE',                    TBL_PREF . 'invoice');
define('HEARS',                        TBL_PREF . 'hears');
define('BRANCH_CONTACT',            TBL_PREF . 'branch_contact');
define('ADVERTISING',                TBL_PREF . 'advertising');
define('MEMBER_NEWS',                TBL_PREF . 'member_news');
define('REFERRALS',                    TBL_PREF . 'referral');
define('MAILING_LIST',                TBL_PREF . 'mailing_list');
define('SUMMITS',                    TBL_PREF . 'summits');
define('GALLERY',                    TBL_PREF . 'gallery');
define('REFERENCES',                TBL_PREF . 'references');
define('ASSIGN_SUMMITS',            TBL_PREF . 'assign_summits');
define('QUESTIONS',                    TBL_PREF . 'questions');
define('CRON_TAB',                    TBL_PREF . 'cron_tab');
define('INVOICE_PAYMENT',                    TBL_PREF . 'invoice_payment');
define('POST',                    TBL_PREF . 'post');
define('APPLICATION',                    TBL_PREF . 'application');

define('RAZOR_KEY', 'rzp_test_7f5zO0jnzVOSE6');
define('RAZOR_SECRET_KEY', 'A947hrzG8Lp72C0XpPVylAGp');


/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
