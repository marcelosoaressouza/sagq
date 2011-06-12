-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 12/06/2011 às 10h05min
-- Versão do Servidor: 5.1.57
-- Versão do PHP: 5.3.6-6~dotdeb.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sagq`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc` text,
  `file` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `requirement_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `requirement_id` (`requirement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `attachment`
--

INSERT INTO `attachment` (`id`, `desc`, `file`, `created`, `updated`, `requirement_id`) VALUES
(1, 'Teste', 'HTTPS_Everywhere_new_logo.jpg', '2011-06-11 17:08:06', '2011-06-11 20:08:06', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `process`
--

CREATE TABLE IF NOT EXISTS `process` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `desc` text,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `process_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `process_id` (`process_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `process`
--

INSERT INTO `process` (`id`, `title`, `desc`, `status`, `created`, `updated`, `process_id`, `user_id`) VALUES
(1, 'ISO 9001', '<p>ISO 9001 Quality Process Managament</p>', 1, '2011-06-11 16:30:23', '2011-06-12 12:59:27', NULL, 1),
(2, 'ISO 14000', '<p>ISO 14000</p>', 0, '2011-06-11 16:45:08', '2011-06-11 19:45:08', NULL, 1),
(3, 'Manuais de Qualidade', '<p>Manuais de Qualidade</p>', 0, '2011-06-11 16:45:41', '2011-06-11 19:45:41', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requirement`
--

CREATE TABLE IF NOT EXISTS `requirement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `desc` text,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `process_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `process_id` (`process_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `requirement`
--

INSERT INTO `requirement` (`id`, `desc`, `status`, `created`, `updated`, `process_id`) VALUES
(1, '<p>Requisito 1.</p>', 1, '2011-06-11 16:51:29', '2011-06-11 20:30:35', 1),
(2, '<p>Confecionar Manuais.</p>', 0, '2011-06-11 17:01:49', '2011-06-11 20:01:49', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profile` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `profile`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
(2, 'marcelo', '574f61edd3a2bc3ccebc170b80b0787a', 'Admin');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`requirement_id`) REFERENCES `requirement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `process`
--
ALTER TABLE `process`
  ADD CONSTRAINT `process_ibfk_1` FOREIGN KEY (`process_id`) REFERENCES `process` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `process_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `requirement_ibfk_1` FOREIGN KEY (`process_id`) REFERENCES `process` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
