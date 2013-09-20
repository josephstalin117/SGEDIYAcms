<?php
if(!defined('THINK_PATH')) exit();
return $array = array (
  'DB_TYPE' => 'mysql',
  'DB_HOST' => 'localhost',
  'DB_NAME' => 'yufuCms',
  'DB_USER' => 'root',
  'DB_PWD' => 'lyz133551',
  'DB_PORT' => '3306',
  'DB_PREFIX' => 'yufu_qy_',
  'DB_BACKUP' => '../Data/backup',
  'RBAC_ROLE_TABLE' => 'yufu_qy_role',
  'RBAC_USER_TABLE' => 'yufu_qy_user',
  'RBAC_ACCESS_TABLE' => 'yufu_qy_access',
  'RBAC_NODE_TABLE' => 'yufu_qy_node',
  'URL_CASE_INSENSITIVE' => true,
  'SITE_NAME' => '圣哥弟娅服饰官方网站',
  'SITE_TITLE' => '圣哥弟娅服饰官方网站',
  'SITE_KEYWORDS' => '圣哥弟娅 女装 淘宝',
  'SITE_DESCRIPTION' => '可乙有限公司',
  'URL_MODEL' => 0,
  'DEFAULT_THEME' => 'default',
  'WX_QRCODE' => NULL,
);
?>