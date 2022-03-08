<?php

$link = mysqli_connect("localhost", "root", "") or die("can not connect");

$query = "CREATE DATABASE IF NOT EXISTS jobs4you";
$res = $link->query($query);
mysqli_select_db($link,"jobs4you");

$query = "CREATE TABLE if not exists `applicants` (
    `a_id` int(4) NOT NULL auto_increment,
    `a_uid` varchar(30) NOT NULL,
    `a_jid` varchar(30) NOT NULL,
    PRIMARY KEY  (`a_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=24";
$link->query($query);

$query = "CREATE TABLE if not exists `categories` (
  `cat_id` int(4) NOT NULL auto_increment,
  `cat_nm` varchar(30) NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=21";

$link->query($query);

$query = "CREATE TABLE if not exists  `applicants` (
`a_id` int(4) NOT NULL auto_increment,
`a_uid` varchar(30) NOT NULL,
`a_jid` varchar(30) NOT NULL,
PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=24";
$link->query($query);

$query = "CREATE TABLE if not exists `contact` (
`cont_id` int(4) NOT NULL auto_increment,
`cont_fnm` varchar(30) NOT NULL,
`cont_email` varchar(20) NOT NULL,
`cont_query` varchar(300) NOT NULL,
PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;";
$link->query($query);

$query = "CREATE TABLE  if not exists `employees` (
`ee_id` int(4) NOT NULL auto_increment,
`ee_fnm` varchar(30) NOT NULL,
`ee_pwd` varchar(10) NOT NULL,
`ee_gender` varchar(1) NOT NULL,
`ee_email` varchar(30) NOT NULL,
`ee_add` varchar(300) NOT NULL,
`ee_phno` varchar(10) NOT NULL,
`ee_current_location` varchar(20) NOT NULL,
`ee_annualsalary` int(10) NOT NULL,
`ee_current_industry` varchar(20) NOT NULL,
`ee_qualification` varchar(30) NOT NULL,
`ee_profile` varchar(300) NOT NULL,
`ee_resume` longtext NOT NULL,
PRIMARY KEY (`ee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ";

$query = "CREATE TABLE if not exists `employers` (
`er_id` int(4) NOT NULL auto_increment,
`er_fnm` varchar(30) NOT NULL,
`er_pwd` varchar(10) NOT NULL,
`er_company` varchar(30) NOT NULL,
`er_add` varchar(100) NOT NULL,
`er_ph` varchar(10) NOT NULL,
`er_email` varchar(30) NOT NULL,
`er_company_profile` varchar(300) NOT NULL,
PRIMARY KEY (`er_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ";
$link->query($query);

$query = "CREATE TABLE if not exists `jobs` (
`j_id` int(4) NOT NULL auto_increment,
`j_category` varchar(100) NOT NULL,
`j_owner_name` varchar(50) NOT NULL,
`j_title` varchar(100) NOT NULL,
`j_hours` int(3) NOT NULL,
`j_salary` int(10) NOT NULL,
`j_experience` int(3) NOT NULL,
`j_discription` varchar(300) NOT NULL,
`j_city` varchar(50) NOT NULL,
`j_active` int(1) NOT NULL default '0',
PRIMARY KEY (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ";

$link->query($query);
?>
