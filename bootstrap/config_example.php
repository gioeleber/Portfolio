<?php
if($_SERVER['SERVER_NAME'] == 'portfolio'){
  //slim settings
  $config['displayErrorDetails'] = true;
  $config['addContentLengthHeader'] = false;
  // db local configuration
  $config['db']['host']   = 'localhost';
  $config['db']['user']   = 'root';
  $config['db']['pass']   = '';
  $config['db']['dbname'] = 'portfolio';
} else {
  //slim settings
  $config['displayErrorDetails'] = false;

  // db production configuration
  // $config['db']['host'] = ...
  // ...
}
