-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2016 年 09 月 26 日 15:44
-- 服务器版本: 5.6.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_smallstar`
--

-- --------------------------------------------------------

--
-- 表的结构 `show`
--

CREATE TABLE IF NOT EXISTS `show` (
  `user_id` varchar(60) DEFAULT NULL,
  `wx_sound_id` varchar(100) NOT NULL DEFAULT '',
  `poetry_id` varchar(11) DEFAULT '',
  `praise` int(11) DEFAULT '0',
  PRIMARY KEY (`wx_sound_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `show`
--


-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `wx_id` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(40) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`wx_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

