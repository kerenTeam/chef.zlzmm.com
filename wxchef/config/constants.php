<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

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
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class  
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
defined('randNms')             OR define('randNms', rand(100000,999999)); //长度为6位的随机数
defined('DeBug')             OR define('DeBug', 0); //1 开启Debug   0关闭

<<<<<<< HEAD
defined('IP')                  OR define('IP','http://211.149.195.183:88'); //211.149.195.183:88
defined('POSTAPI')             OR define('POSTAPI',"http://211.149.195.183:88/API/");
=======
>>>>>>> 708656b2180028a1e9857e3723f2d1c57a556fc1


// 我们的服务器
defined('IP')                  OR define('IP','http://211.149.195.183:88'); //211.149.195.183:88
defined('POSTAPI')             OR define('POSTAPI',"http://211.149.195.183:88/API/");


// 可人软件测试二的配置信息
defined('APPID')               OR define('APPID', 'wx8655702929a5ad7d'); 
defined('APPSECRET')           OR define('APPSECRET', '7071ed881808c75d1ce314155145bba0'); 
defined('MCHID')               OR define('MCHID', '1348057201'); //商户号
defined('PRIVATEKEY')          OR define('PRIVATEKEY', 'e10adc3949ba59abbe56e057f20f883e'); //私钥
// URL 基础配置验证
defined('TOKEN')               OR define('TOKEN', 'Chef'); //TOKEN

// 注意修改下面路由的appid 和域名  appid=wx8655702929a5ad7d&redirect_uri=http://www.krfer.com/WXTEST2/
defined('MENU')                OR define('MENU', '{
    "button": [
        {
            "type": "view",
            "name": "大厨点菜",
            "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx8655702929a5ad7d&redirect_uri=http://www.krfer.com/WXTEST2/index.php/home/index&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
        },
        {
            "name": "大厨到家",
            "sub_button": [
                {
                    "type": "view",
                    "name": "套餐",
                    "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx8655702929a5ad7d&redirect_uri=http://www.krfer.com/WXTEST2/index.php/home/cailan#fe7ad9a9-1bec-4929-b160-85f9a784f527&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
                },
                {
                    "type": "view",
                    "name": "宴会定制",
                    "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx8655702929a5ad7d&redirect_uri=http://www.krfer.com/WXTEST2/index.php/home/party&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
                }
            ]
        },
        {
            "name": "我的大厨",
            "sub_button": [
                {
                    "type": "view",
                    "name": "我的信息",
                    "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx8655702929a5ad7d&redirect_uri=http://www.krfer.com/WXTEST2/index.php/home/ucent&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
                },
                {
                    "type": "view",
                    "name": "app下载",
                    "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx8655702929a5ad7d&redirect_uri=http://www.krfer.com/WXTEST2/index.php/home/registgift&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
                },
                {
                     "type":"click",
                     "name":"点击测试",
                     "key":"company"
                }
                
            ] 
        }
    ]
}'); //自定义菜单














//～～～～～～～～～～～～～～～～～～～～～微信配置～～～～～～～～～～～～～～～～～～～～～～～
// defined('APPID')               OR define('APPID', 'wxa997c956cf6631b0'); 
// defined('APPSECRET')           OR define('APPSECRET', 'ee3f2a43a6c508708780dba0c5bd7393'); 
// defined('MCHID')               OR define('MCHID', '1254100101'); //商户号
// defined('PRIVATEKEY')          OR define('PRIVATEKEY', 'qwertyuiopasdfghjklzxcvbnmqwerty'); //私钥
// defined('TOKEN')               OR define('TOKEN', 'Chef'); //TOKEN
// defined('MENU')                OR define('MENU', '{
//     "button": [
//         {
//             "type": "view",
//             "name": "大厨点菜",
//             "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa997c956cf6631b0&redirect_uri=http://chef.zlzmm.com/index.php/home/index&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
//         },
//         {
//             "name": "大厨到家",
//             "sub_button": [
//                 {
//                     "type": "view",
//                     "name": "套餐",
//                     "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa997c956cf6631b0&redirect_uri=http://chef.zlzmm.com/index.php/home/cailan#fe7ad9a9-1bec-4929-b160-85f9a784f527&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
//                 },
//                 {
//                     "type": "view",
//                     "name": "宴会定制",
//                     "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa997c956cf6631b0&redirect_uri=http://chef.zlzmm.com/index.php/home/party&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
//                 }
//             ]
//         },
//         {
//             "name": "我的大厨",
//             "sub_button": [
//                 {
//                     "type": "view",
//                     "name": "我的信息",
//                     "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa997c956cf6631b0&redirect_uri=http://chef.zlzmm.com/index.php/home/ucent&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
//                 },
//                 {
//                     "type": "view",
//                     "name": "app下载",
//                     "url": "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa997c956cf6631b0&redirect_uri=http://chef.zlzmm.com/index.php/home/registgift&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"
//                 },
//                 {
//                      "type":"click",
//                      "name":"点击测试",
//                      "key":"company"
//                 }
                
//             ] 
//         }
//     ]
// }'); //自定义菜单




