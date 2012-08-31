<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  5 => 
  array (
    'menu_id' => '5',
    'parent_id' => '0',
    'm_connection' => 'main_right',
    'var_name' => 'menu_admincp',
    'disallow_access' => NULL,
    'module' => 'core',
    'url' => 'admincp',
    'module_is_active' => '1',
  ),
  11 => 
  array (
    'menu_id' => '11',
    'parent_id' => '0',
    'm_connection' => 'main_right',
    'var_name' => 'menu_profile',
    'disallow_access' => 'a:1:{i:0;s:1:"3";}',
    'module' => 'profile',
    'url' => 'profile.my',
    'module_is_active' => '1',
    'children' => 
    array (
      0 => 
      array (
        'menu_id' => '15',
        'parent_id' => '11',
        'm_connection' => NULL,
        'var_name' => 'menu_profile_my_profile_b392d011b7f15183caf21a8bc56fd1fe',
        'disallow_access' => NULL,
        'module' => 'profile',
        'url' => 'profile',
        'module_is_active' => '1',
      ),
      1 => 
      array (
        'menu_id' => '16',
        'parent_id' => '11',
        'm_connection' => NULL,
        'var_name' => 'menu_profile_edit_profile_b392d011b7f15183caf21a8bc56fd1fe',
        'disallow_access' => NULL,
        'module' => 'profile',
        'url' => 'user.profile',
        'module_is_active' => '1',
      ),
      2 => 
      array (
        'menu_id' => '17',
        'parent_id' => '11',
        'm_connection' => NULL,
        'var_name' => 'menu_profile_edit_profile_picture_b392d011b7f15183caf21a8bc56fd1fe',
        'disallow_access' => NULL,
        'module' => 'profile',
        'url' => 'user.photo',
        'module_is_active' => '1',
      ),
    ),
  ),
  21 => 
  array (
    'menu_id' => '21',
    'parent_id' => '0',
    'm_connection' => 'main_right',
    'var_name' => 'menu_settings',
    'disallow_access' => 'a:1:{i:0;s:1:"3";}',
    'module' => 'user',
    'url' => 'user.setting',
    'module_is_active' => '1',
    'children' => 
    array (
      0 => 
      array (
        'menu_id' => '28',
        'parent_id' => '21',
        'm_connection' => NULL,
        'var_name' => 'menu_user_account_settings_73c8da87d666df89aabd61620c81c24c',
        'disallow_access' => NULL,
        'module' => 'user',
        'url' => 'user.setting',
        'module_is_active' => '1',
      ),
      1 => 
      array (
        'menu_id' => '29',
        'parent_id' => '21',
        'm_connection' => NULL,
        'var_name' => 'menu_user_privacy_settings_73c8da87d666df89aabd61620c81c24c',
        'disallow_access' => NULL,
        'module' => 'user',
        'url' => 'user.privacy',
        'module_is_active' => '1',
      ),
      2 => 
      array (
        'menu_id' => '27',
        'parent_id' => '21',
        'm_connection' => NULL,
        'var_name' => 'menu_user_logout_4ee1a589029a67e7f1a00990a1786f46',
        'disallow_access' => 'a:1:{i:0;s:1:"3";}',
        'module' => 'user',
        'url' => 'user.logout',
        'module_is_active' => '1',
      ),
    ),
  ),
); ?>