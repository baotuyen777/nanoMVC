<?php

global $wpdb;

$charset_collate = $wpdb->get_charset_collate();

$sql_submits = "CREATE TABLE " . $wpdb->prefix . "qsoft_form (
  submit_time int(11)  NOT NULL,
  user_id int(11),
  form_id int(11) NOT NULL,
  field_name varchar(127) NOT NULL,
  field_value longtext,
  field_order int(11),
  file varchar(255)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta($sql_submits);
//echo $wpdb->last_query;


