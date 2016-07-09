-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2016 年 07 月 09 日 21:44
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

INSERT INTO `show` (`user_id`, `wx_sound_id`, `poetry_id`, `praise`) VALUES
('oi-y6wEpQqKvrX_u3PhecavBgjnI', '-lLPt20GvmwTRWPhSGcc0G438oGSL_Fqkf-epecjHEi1m15JirY_VzsbCnD9NbUA', 'cgx', 0),
('', '0o1-WviYWrRrVYOSKQB27fOqRKxzmDubJGz2JY0XBXoxoXxJEFhfxxamoNymoCIs', 'cgx', 0),
('oi-y6wGcKE01toBIEaEcldeZHNlY', '1237378768e7q8e7r8qwesafdasdfasdfaxss111', 'qbs', 0),
('oi-y6wGcKE01toBIEaEcldeZHNlY', '3ChDj-KIXMlKhv-d9eP6w5lwHVCxYMU5nSdSLfs87Rn1oUw9SLRsz9o5jglWr_wG', 'qbs', 0),
('oi-y6wGcKE01toBIEaEcldeZHNlY', '5BmlPSeRyzryCv3rVoELPHVMBApB4Udkw_eF9worHx1BY1Gf5r4JVTF8zoGbChHj', 'qbs', 1),
('oi-y6wKZ7ZUMXQKOE3h7l-IRtEC0', '5sFE9k04HHmMFSHfx4NV_UNscMusWGhoNhztNFec-sU3Z77eI_SHa6vp1Yus9ajB', 'qbs', 3),
('oi-y6wGcKE01toBIEaEcldeZHNlY', 'bKh2NedlRITRVOBgY9cGAZTIQuOCvymgQOupjfLx_ZWW5d-ABSFc8gFxq-uNjyl0', 'qbs', 2),
('oi-y6wKZ7ZUMXQKOE3h7l-IRtEC0', 'c-Z6n8zEOW45F2YJ1NIe-qdW2RuXhdegj5CCJSwfzf4BCdgXaJbNcnZWu2z80Chl', 'qbs', 0),
('', 'C2qPekenLa_GZvK4i4SKTXlGemf4juPz2dm_Ypnq8k4qBMuK-GM2_nm1mT-kdemU', 'cgx', 0),
('oi-y6wGcKE01toBIEaEcldeZHNlY', 'C6hJCuFK67ZKDODFuMv8zoPmMFyeH_7pa14ouAdNOuyNZEzJ_rl651yYTUkHch13', 'qbs', 1),
('oi-y6wPChnNg3uoci7FGg_B32rSA', 'CRm9W8UX-8GfcV7-YRPcmDfZOS_cRXtwVvLOsZ4br01gM9AblOSkv2kYqaV9HNwb', 'qbs', 2),
('oi-y6wPChnNg3uoci7FGg_B32rSA', 'ecGcn_aWAwSPwj5lr6Eu6qna6BVuP6K_-wkLxg6tpWCyhMfmejnYg2uFFgqOM-yq', 'cgx', 0),
('oi-y6wEpQqKvrX_u3PhecavBgjnI', 'fpMJsMw0ArWqEdX09wnpuvMUjf-M7FoVWpUWQjy_E0R2lcpyPaVlosiXoDeBtS3z', 'cgx', 0),
('oi-y6wGcKE01toBIEaEcldeZHNlY', 'Fw8bN8gqpBLNPlAokjChlblPG0doHHHGE2GotDycMjmMVFSGWmjz9pgd-Ch-jekg', 'qbs', 2),
('oi-y6wEpQqKvrX_u3PhecavBgjnI', 'FYJ45zuy-MIxonsJpsrRJIUsERuB3maILGHbi1j6XDogzsqXT7zwdWNMm_hUV0nf', 'cgx', 0),
('oi-y6wKZ7ZUMXQKOE3h7l-IRtEC0', 'iZnlzK1bBehM-lOeUBjy_7y97hBXI5OQfWB0UbGO2aHMi5uZnagrBm08AVwjl5b3', 'qbs', 1),
('oi-y6wGcKE01toBIEaEcldeZHNlY', 'jlxWX53WkHaI7eleSl6GQcvIE5UAKsQsUEYpiy6d0ERpH2pzlsmTz0R07sZ8yjgJ', 'cgx', 1),
('oi-y6wEpQqKvrX_u3PhecavBgjnI', 'jXN3b9Mt8Lb69zRp-LovNluy8PB81U3XeWqCyw1LGKpoXV1A2pRnSL1F8BLbM_Vd', 'cgx', 0),
('oi-y6wPChnNg3uoci7FGg_B32rSA', 'l-pd9oiS9CpgPE3camJN1HibSWn3BYAvLVLU4We1TZOMFfGg8FQ7pO4M6vce-Qp1', 'qbs', 0),
('oi-y6wKZ7ZUMXQKOE3h7l-IRtEC0', 'ltuymYhc1tEZVgHU3uS-M_ugs6DuI5X8ZtukqHwzGIN_-8a1-VVHPZ0abkkS58Y9', 'qbs', 0),
('oi-y6wEpQqKvrX_u3PhecavBgjnI', 'Rmfj_VmeWBRtcSFQtj8Z3NdOuCQXZrcYEQIleZT7JlFw7bqGAupRgPr8SLy-l0mH', 'cgx', 0),
('oi-y6wGcKE01toBIEaEcldeZHNlY', 'RUgv2rDGfZcFFoOLNdUropoD-QTTDt1QXiozZ19ECzJLiDqTBLMEhUY6C8pma3b6', 'qbs', 2),
('oi-y6wPChnNg3uoci7FGg_B32rSA', 'wb46UzLrMIvJ6YRqO5rYEgMgNQdkkavDa6ddtrYDACA9u1nPloOdniwSQso3gcSi', 'cgx', 1),
('oi-y6wEpQqKvrX_u3PhecavBgjnI', 'ya5OLoiizPm0dbhdKiIcpdN1P3WVc5p2TqPyTCg0LhhP7uZsOmzr7AH5jTC2NvPE', 'cgx', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `wx_id` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(40) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`wx_id`),
  KEY `wx_id` (`wx_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`wx_id`, `name`, `level`, `sex`) VALUES
('', 'Dd%20', 0, 1),
('null', '%E7%88%B8%E7%88%B8', 0, 1),
('oi-y6wAZEL02mKSBfoTHsMKXHjQE', '%E9%9C%84%E9%9C%84', 0, 0),
('oi-y6wEpQqKvrX_u3PhecavBgjnI', '%E7%9C%8B%E7%9C%8B', 0, 1),
('oi-y6wGcKE01toBIEaEcldeZHNlY', '%E7%9F%B3%E5%9F%B9%E6%B6%9B', 0, 1),
('oi-y6wKZ7ZUMXQKOE3h7l-IRtEC0', 'zsj', 0, 0),
('oi-y6wPChnNg3uoci7FGg_B32rSA', 'A', 0, 0);
