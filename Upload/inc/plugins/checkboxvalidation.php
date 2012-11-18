<?php
/*
/¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯\
|     » Copyright Notice «      |
|¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯| 
| » Checkbox Validation         |
|   1.1 © 2012                  |
| » Released free of charge     |
| » You may edit or modify      |
|   this plugin, however you    |
|   may not redistribute it.    |
| » This notice must stay       |
|   intact for legal use.       |
|  » For support, please visit  |
|    http://vernier.me          |
/¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯\
|    » Checkbox Validation «    |
|         » 1.1 © 2012 «        |
\_______________________________/
*/

// Disallow direct Initialization for extra security.
if(!defined("IN_MYBB"))
{
    die("You Cannot Access This File Directly. Please Make Sure IN_MYBB Is Defined.");
}

// Hooks
$plugins->add_hook('newreply_end', 'checkboxvalidation_newreply_end');
$plugins->add_hook('newthread_end', 'checkboxvalidation_newthread_end');
$plugins->add_hook('private_send_end', 'checkboxvalidation_private_send_end');
$plugins->add_hook('member_register_end', 'checkboxvalidation_member_register_end');
$plugins->add_hook('datahandler_post_validate_post', 'checkboxvalidation_datahandler_post_validate_post');
$plugins->add_hook('datahandler_post_validate_thread', 'checkboxvalidation_datahandler_post_validate_thread');
$plugins->add_hook('datahandler_pm_validate', 'checkboxvalidation_datahandler_pm_validate');
$plugins->add_hook('datahandler_user_validate', 'checkboxvalidation_datahandler_user_validate');
$plugins->add_hook('showthread_end', 'checkboxvalidation_showthread_end');

// Information
function checkboxvalidation_info()
{
    global $lang;
    $lang->load('checkboxvalidation');
return array(
        "name"  => "Checkbox Validation",
        "description"=> $lang->info_desc,
        "website"        => "http://vernier.me",
        "author"        => "Vernier",
        "authorsite"    => "http://vernier.me",
        "version"        => "1.1",
        "guid"             => "5c35b281bd371b49088609790145de53",
        "compatibility" => "16*"
    );
}

// Check if installed
function checkboxvalidation_is_installed()
{
global $db;
    $query = $db->query("SELECT gid FROM ".TABLE_PREFIX."settinggroups WHERE name='checkboxvalidation'");
    $gid = $db->fetch_field($query, "gid");
    if($gid)
    {
        return true;
    }
    return false;
}

// Install
function checkboxvalidation_install() {
global $db, $mybb, $templates, $lang, $templates;

$lang->load('checkboxvalidation');

$checkboxvalidation_group = array(
        'gid'    => 'NULL',
        'name'  => 'checkboxvalidation',
        'title'      => 'Checkbox Validation',
        'description'    => $lang->settings_group_desc,
        'disporder'    => "1",
        'isdefault'  => "0",
    );
$db->insert_query('settinggroups', $checkboxvalidation_group);
 $gid = $db->insert_id();

$checkboxvalidation_setting_1 = array(
        'sid'            => 'NULL',
        'name'        => 'checkboxvalidation_enable',
        'title'            => $lang->global_enable,
        'description'    => $lang->global_enable_desc,
        'optionscode'    => 'onoff',
        'value'        => '1',
        'disporder'        => 1,
        'gid'            => intval($gid),
    );
$checkboxvalidation_setting_2 = array(
        'sid'            => 'NULL',
        'name'        => 'checkboxvalidation_enablewhere_newthread',
        'title'            => $lang->thread_enable,
        'description'    => $lang->thread_enable_desc,
        'optionscode'    => 'yesno',
        'value'        => '1',
        'disporder'        => 2,
        'gid'            => intval($gid),
    );
$checkboxvalidation_setting_3 = array(
        'sid'            => 'NULL',
        'name'        => 'checkboxvalidation_enablewhere_newreply',
        'title'            => $lang->reply_enable,
        'description'    => $lang->reply_enable_desc,
        'optionscode'    => 'yesno',
        'value'        => '1',
        'disporder'        => 3,
        'gid'            => intval($gid),
    );
$checkboxvalidation_setting_4 = array(
        'sid'            => 'NULL',
        'name'        => 'checkboxvalidation_enablewhere_private',
        'title'            => $lang->private_enable,
        'description'    => $lang->private_enable_desc,
        'optionscode'    => 'yesno',
        'value'        => '1',
        'disporder'        => 4,
        'gid'            => intval($gid),
    );
$checkboxvalidation_setting_5 = array(
        'sid'            => 'NULL',
        'name'        => 'checkboxvalidation_enablewhere_register',
        'title'            => $lang->register_enable,
        'description'    => $lang->register_enable_desc,
        'optionscode'    => 'yesno',
        'value'        => '1',
        'disporder'        => 5,
        'gid'            => intval($gid),
    );
$checkboxvalidation_setting_6 = array(
        'sid'            => 'NULL',
        'name'        => 'checkboxvalidation_disablefor',
        'title'            => $lang->disablefor,
        'description'    => $lang->disablefor_desc,
        'optionscode'    => 'text',
        'value'        => '0',
        'disporder'        => 6,
        'gid'            => intval($gid),
    );
$checkboxvalidation_setting_7 = array(
        'sid'            => 'NULL',
        'name'        => 'checkboxvalidation_cookies',
        'title'            => $lang->enteronce,
        'description'    => $lang->enteronce_desc,
        'optionscode'    => 'yesno',
        'value'        => '1',
        'disporder'        => 7,
        'gid'            => intval($gid),
    );
$db->insert_query('settings', $checkboxvalidation_setting_1);
$db->insert_query('settings', $checkboxvalidation_setting_2);
$db->insert_query('settings', $checkboxvalidation_setting_3);
$db->insert_query('settings', $checkboxvalidation_setting_4);
$db->insert_query('settings', $checkboxvalidation_setting_5);
$db->insert_query('settings', $checkboxvalidation_setting_6);
$db->insert_query('settings', $checkboxvalidation_setting_7);
  rebuild_settings();

  require_once MYBB_ROOT.'inc/adminfunctions_templates.php';
  $new_templates = array();
  
  $new_templates['checkboxvalidation_buttons'] = '<table border="0"  style="text-align:center;">
  <tr>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
  </tr>
  <tr>
    <td><input name="rand_code" type="radio" value="1" /></td>
    <td><input name="rand_code" type="radio" value="2" /></td>
    <td><input name="rand_code" type="radio" value="3" /></td>
    <td><input name="rand_code" type="radio" value="4" /></td>
    <td><input name="rand_code" type="radio" value="5" /></td>
    <td><input name="rand_code" type="radio" value="6" /></td>
    <td><input name="rand_code" type="radio" value="7" /></td>
    <td><input name="rand_code" type="radio" value="8" /></td>
    <td><input name="rand_code" type="radio" value="9" /></td>
    <td><input name="rand_code" type="radio" value="10" /></td>
  </tr>
</table>';

$new_templates['checkboxvalidation_global'] = '<tr>
<td class="trow1" width="20%">{$lang->select_number}{$checkboxvalidationrand}</td>
<td class="trow2">{$checkboxvalidationbuttons}</td>
</tr>';

$new_templates['checkboxvalidation_register'] = '<br />
<fieldset class="trow2">
<legend><strong>{$lang->select_number}{$checkboxvalidationrand}</strong></legend>
<table cellspacing="0" cellpadding="">
<tr>
<td><span class="smalltext">{$lang->select_the_number}{$checkboxvalidationrand}{$lang->from_list}</span></td>
<td rowspan="2" align="center"><br /><span style="color: red;" class="smalltext"></span>
</td>
</tr>
<tr>
<td class="trow2">{$checkboxvalidationbuttons}</td>
</tr>
</table>
</fieldset>';

foreach($new_templates as $title => $template)
  {
    $new_template = array(
      'title'   => $db->escape_string($title),
      'template'  => $db->escape_string($template),
      'sid'   => '-1',
      'version' => '140',
      'dateline'  => TIME_NOW
    );
    
    $db->insert_query('templates', $new_template);
  }
  find_replace_templatesets("newreply", "#".preg_quote('{$loginbox}')."#i", '{$loginbox}
{$checkboxvalidation}');
  find_replace_templatesets("newthread", "#".preg_quote('{$loginbox}')."#i", '{$loginbox}
{$checkboxvalidation}');
  find_replace_templatesets("private_send", "#".preg_quote('{$posticons}')."#i", '{$checkboxvalidation}
{$posticons}');
  find_replace_templatesets("member_register", "#".preg_quote('{$regimage}')."#i", '{$regimage}
{$checkboxvalidation}');
  find_replace_templatesets("showthread_quickreply", "#".preg_quote('{$captcha}')."#i", '{$captcha}
<!--checkboxvalidation-->');
}
// Activate
function checkboxvalidation_activate(){  

}

// Deactivate
function checkboxvalidation_deactivate()
{

}

// Uninstall
function checkboxvalidation_uninstall()
{
      global $db, $templates, $theme;
 $db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name IN ('checkboxvalidation_enable')");
 $db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name IN ('checkboxvalidation_buttontype')");
    $db->query("DELETE FROM ".TABLE_PREFIX."settinggroups WHERE name='checkboxvalidation'");
rebuild_settings();

$delete_templates = array(
    'checkboxvalidation_buttons',
    'checkboxvalidation_global',
    'checkboxvalidation_register'
  );
  
  foreach($delete_templates as $template)
  {
    $db->delete_query('templates', "title='{$template}'");
  }
    require_once MYBB_ROOT.'inc/adminfunctions_templates.php';
  find_replace_templatesets("newreply", "#".preg_quote('{$checkboxvalidation}')."#i", '');
  find_replace_templatesets("newthread", "#".preg_quote('{$checkboxvalidation}')."#i", '');
  find_replace_templatesets("private_send", "#".preg_quote('{$checkboxvalidation}')."#i", '');
  find_replace_templatesets("member_register", "#".preg_quote('{$checkboxvalidation}')."#i", '');
  find_replace_templatesets("showthread_quickreply", "#".preg_quote('<!--checkboxvalidation-->')."#i", '');
}

// Start New Reply
function checkboxvalidation_newreply_end(){
global $mybb, $lang, $templates, $checkboxvalidationbuttons, $checkboxvalidationrand, $checkboxvalidation;

if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_newreply'] == 1) && (!isset($_COOKIE["checkboxvalidation"]) || ($mybb->user['usergroup'] == 1) || ($mybb->user['usergroup'] == 5) || ($mybb->user['usergroup'] == 7) || ($mybb->settings['checkboxvalidation_cookies'] == 0)))
{
    $lang->load('checkboxvalidation');
$groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

$usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}

if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
session_start();
$str = rand(1, 10);
    $_SESSION['rand_code'] = $str;
    eval("\$checkboxvalidationbuttons = \"".$templates->get("checkboxvalidation_buttons")."\";");
    eval("\$checkboxvalidationrand = \"".$_SESSION['rand_code']."\";");
    if ($mybb->settings['checkboxvalidation_enablewhere_newreply'] == 1)
        {
    eval("\$checkboxvalidation = \"".$templates->get("checkboxvalidation_global")."\";");
    }
}
}
else
{
    return false;
}
}

function checkboxvalidation_datahandler_post_validate_post(&$dh)
{
    global $mybb, $lang;
    if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_newreply'] == 1) && (!isset($_COOKIE["checkboxvalidation"]) || ($mybb->user['usergroup'] == 1) || ($mybb->user['usergroup'] == 5) || ($mybb->user['usergroup'] == 7) || ($mybb->settings['checkboxvalidation_cookies'] == 0)))
        {
            $lang->load('checkboxvalidation');
            $groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

$usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}

if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
    session_start();

    if($mybb->input['rand_code'] != $_SESSION['rand_code'] || !$_SESSION['rand_code']){

    $dh->set_error($lang->incorrect_number_error);
    }

    if (($mybb->input['rand_code'] == $_SESSION['rand_code']) && ($mybb->user['usergroup'] != 1) && ($mybb->user['usergroup'] != 5) && ($mybb->user['usergroup'] != 7) && ($mybb->settings['checkboxvalidation_cookies'] == 1)){
        setcookie("checkboxvalidation", "/", time()+31536000);
}
}
}
else
{
    return false;
}
}
// End New Reply

// Start New Thread
function checkboxvalidation_newthread_end(){
global $mybb, $lang, $templates, $checkboxvalidationbuttons, $checkboxvalidationrand, $checkboxvalidation;

if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_newthread'] == 1) && (!isset($_COOKIE["checkboxvalidation"]) || ($mybb->user['usergroup'] == 1) || ($mybb->user['usergroup'] == 5) || ($mybb->user['usergroup'] == 7) || ($mybb->settings['checkboxvalidation_cookies'] == 0)))
        {
            $lang->load('checkboxvalidation');
$groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

$usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}
if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
session_start();

$str = rand(1, 10);
    $_SESSION['rand_code'] = $str;
    eval("\$checkboxvalidationbuttons = \"".$templates->get("checkboxvalidation_buttons")."\";");
    eval("\$checkboxvalidationrand = \"".$_SESSION['rand_code']."\";");
    if ($mybb->settings['checkboxvalidation_enablewhere_newthread'] == 1)
        {
    eval("\$checkboxvalidation = \"".$templates->get("checkboxvalidation_global")."\";");
    }
}
}
else
{
    return false;
}
}

function checkboxvalidation_showthread_end()
{
global $mybb, $lang, $templates, $checkboxvalidation, $checkboxvalidationrand, $checkboxvalidationbuttons, $quickreply;

if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_newreply'] == 1) && (!isset($_COOKIE["checkboxvalidation"]) || ($mybb->user['usergroup'] == 1) || ($mybb->user['usergroup'] == 5) || ($mybb->user['usergroup'] == 7) || ($mybb->settings['checkboxvalidation_cookies'] == 0)))
        {
            $lang->load('checkboxvalidation');
$groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

$usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}
if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
session_start();
$str = rand(1, 10);
    $_SESSION['rand_code'] = $str;
    eval("\$checkboxvalidationbuttons = \"".$templates->get("checkboxvalidation_buttons")."\";");
    eval("\$checkboxvalidationrand = \"".$_SESSION['rand_code']."\";");
    if ($mybb->settings['checkboxvalidation_enablewhere_newreply'] == 1)
        {
    eval("\$checkboxvalidation = \"".$templates->get("checkboxvalidation_global")."\";");
    }
    $quickreply = str_replace('<!--checkboxvalidation-->', $checkboxvalidation, $quickreply);
}
}
else
{
    return false;
}
}
function checkboxvalidation_datahandler_post_validate_thread(&$dh)
{
    global $mybb, $lang;
    if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_newthread'] == 1) && (!isset($_COOKIE["checkboxvalidation"]) || ($mybb->user['usergroup'] == 1) || ($mybb->user['usergroup'] == 5) || ($mybb->user['usergroup'] == 7) || ($mybb->settings['checkboxvalidation_cookies'] == 0)))
        {
            $lang->load('checkboxvalidation');
            $groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

            $usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}

if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
    session_start();

    if($mybb->input['rand_code'] != $_SESSION['rand_code'] || !$_SESSION['rand_code']){

    $dh->set_error($lang->incorrect_number_error);
    }
    if (($mybb->input['rand_code'] == $_SESSION['rand_code']) && ($mybb->user['usergroup'] != 1) && ($mybb->user['usergroup'] != 5) && ($mybb->user['usergroup'] != 7) && ($mybb->settings['checkboxvalidation_cookies'] == 1)){
        setcookie("checkboxvalidation", "/", time()+31536000);
}
}
}
else
{
    return false;
}
}
// End New Thread

// Start New Private Message
function checkboxvalidation_private_send_end(){
global $mybb, $lang, $templates, $checkboxvalidationbuttons, $checkboxvalidationrand, $checkboxvalidation;

if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_private'] == 1) && (!isset($_COOKIE["checkboxvalidation"]) || ($mybb->user['usergroup'] == 1) || ($mybb->user['usergroup'] == 5) || ($mybb->user['usergroup'] == 7) || ($mybb->settings['checkboxvalidation_cookies'] == 0)))
        {
            $lang->load('checkboxvalidation');
            $groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

$usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}

if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
session_start();

$str = rand(1, 10);
    $_SESSION['rand_code'] = $str;
    eval("\$checkboxvalidationbuttons = \"".$templates->get("checkboxvalidation_buttons")."\";");
    eval("\$checkboxvalidationrand = \"".$_SESSION['rand_code']."\";");
    if ($mybb->settings['checkboxvalidation_enablewhere_private'] == 1)
        {
    eval("\$checkboxvalidation = \"".$templates->get("checkboxvalidation_global")."\";");
    }
}
}
}
function checkboxvalidation_datahandler_pm_validate(&$dh)
{
    global $mybb, $lang;
    if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_private'] == 1) && (THIS_SCRIPT == 'private.php') && (!isset($_COOKIE["checkboxvalidation"]) || ($mybb->user['usergroup'] == 1) || ($mybb->user['usergroup'] == 5) || ($mybb->user['usergroup'] == 7) || ($mybb->settings['checkboxvalidation_cookies'] == 0)))
        {
            $lang->load('checkboxvalidation');
            $groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

            $usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}

if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
    session_start();

    if($mybb->input['rand_code'] != $_SESSION['rand_code'] || !$_SESSION['rand_code']){

    $dh->set_error($lang->incorrect_number_error);
    }
    if (($mybb->input['rand_code'] == $_SESSION['rand_code']) && ($mybb->user['usergroup'] != 1) && ($mybb->user['usergroup'] != 5) && ($mybb->user['usergroup'] != 7) && ($mybb->settings['checkboxvalidation_cookies'] == 1)){
        setcookie("checkboxvalidation", "/", time()+31536000);
}
}
}
else
{
    return false;
}
}
//End New Private Message

//Start New Register
function checkboxvalidation_member_register_end(){
global $mybb, $lang, $templates, $checkboxvalidationbuttons, $checkboxvalidationrand, $checkboxvalidation;
if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_register'] == 1))
        {
            $lang->load('checkboxvalidation');
            $groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

            $usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}

if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
session_start();

$str = rand(1, 10);
    $_SESSION['rand_code'] = $str;
    eval("\$checkboxvalidationbuttons = \"".$templates->get("checkboxvalidation_buttons")."\";");
    eval("\$checkboxvalidationrand = \"".$_SESSION['rand_code']."\";");
    eval("\$checkboxvalidation = \"".$templates->get("checkboxvalidation_register")."\";");
    }
}
else
{
    return false;
}
}
function checkboxvalidation_datahandler_user_validate(&$dh)
{
    global $mybb, $lang;
    if (($mybb->settings['checkboxvalidation_enable'] == 1) && ($mybb->settings['checkboxvalidation_enablewhere_register'] == 1) && (THIS_SCRIPT == 'member.php') && ($mybb->input['action'] == 'do_register'))
        {
            $lang->load('checkboxvalidation');
            $groupsToTakeActionOn = explode(',', $mybb->settings['checkboxvalidation_disablefor']);

            $usersGroups = explode(',', $mybb->user['additionalgroups']);
array_push($usersGroups, $mybb->user['usergroup']);

$canDo = true;

foreach ($usersGroups as $usersGroup)
{
    if (in_array($usersGroup, $groupsToTakeActionOn))
    {
        $canDo = false;
    }
}

if (($canDo) || ($mybb->settings['checkboxvalidation_disablefor'] == ''))
{
    session_start();

    if($mybb->input['rand_code'] != $_SESSION['rand_code'] || !$_SESSION['rand_code']){

    $dh->set_error($lang->incorrect_number_error);
    }
}
}
else
{
    return false;
}
}
//END NEW REGISTER\\
?>