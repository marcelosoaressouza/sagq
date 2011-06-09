-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 07/06/2011 às 12h47min
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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `requirement_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `requirement_id` (`requirement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `attachment`
--

INSERT INTO `attachment` (`id`, `desc`, `file`, `created`, `updated`, `requirement_id`) VALUES
(2, 'Manual 12345...', 'Artigo-WSL2011-Marcelo_Soares_Souza-08abr2011.pdf', '2011-05-31 23:09:40', '2011-05-31 23:09:40', 4),
(3, 'Testando Anexo', 'tabela_sul_américa.pdf', '2011-05-31 23:10:20', '2011-05-31 23:10:20', 7),
(4, 'Outro Manual', 'TeseMMorejon_ISO.pdf', '2011-06-01 00:06:43', '2011-06-01 00:06:43', 4),
(5, 'Teste, Teste...', 'sagg.sql', '2011-06-01 00:10:06', '2011-06-01 00:10:06', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `process`
--

CREATE TABLE IF NOT EXISTS `process` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `desc` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `process_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `process_id` (`process_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `process`
--

INSERT INTO `process` (`id`, `title`, `desc`, `status`, `created`, `updated`, `process_id`, `user_id`) VALUES
(9, 'ISO 9001:2008', '<p>Processo para Obten&ccedil;&atilde;o da <strong>ISO 9001:2008</strong></p>', 1, '2011-05-31 19:15:56', '2011-05-31 20:58:40', NULL, 1),
(11, 'Manuais de Qualidade', '<p>Elabora&ccedil;&atilde;o dos Manuais de Qualidade</p>', 0, '2011-05-31 19:18:35', '2011-05-31 19:18:35', 9, 1),
(12, 'Procedimentos para Verificação da Qualidade', '<p>Procedimentos para Verifica&ccedil;&atilde;o da Qualidade</p>', 0, '2011-05-31 19:24:45', '2011-05-31 19:24:45', 9, 1),
(17, 'Elaboração Metodologica dos Manuais', '<p>Processo de Elabora&ccedil;&atilde;o Metodologica dos Manuais</p>', 1, '2011-05-31 19:47:18', '2011-05-31 19:47:18', 11, 1),
(18, 'ISO 14001', '<p>Elabora&ccedil;&atilde;o do Processo ISO 14001</p>', 0, '2011-05-31 20:59:51', '2011-05-31 20:59:51', NULL, 2),
(19, 'Processo Filho 1', '<p>Processo Filho 1</p>', 2, '2011-05-31 21:06:56', '2011-05-31 21:06:56', 18, 2),
(20, 'Processo Filho 2', '<p>Processo Filho 2</p>', 3, '2011-05-31 21:07:41', '2011-05-31 21:07:41', 18, 2),
(21, 'Processo Filho 3', '<p>Processo Filho 3</p>', 0, '2011-05-31 21:07:55', '2011-05-31 21:07:55', 18, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requirement`
--

CREATE TABLE IF NOT EXISTS `requirement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `desc` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `process_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `process_id` (`process_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `requirement`
--

INSERT INTO `requirement` (`id`, `desc`, `status`, `created`, `process_id`) VALUES
(2, '<p>Manual de Qualidade do Processo Fabril de Microcomputadores</p>', 1, '2011-05-31 19:18:59', 11),
(3, '<p>Manual de Qualidade do Processo Fabril de Perif&eacute;ricos Gerais</p>', 2, '2011-05-31 19:23:42', 11),
(4, '<p>Elabora&ccedil;&atilde;o de Procedimentos e Documentos Gerais de Qualidade</p>', 1, '2011-05-31 19:24:19', 9),
(5, '<p style="text-align: justify;">Esta nova vers&atilde;o da distribui&ccedil;&atilde;o Multim&iacute;dia juntaDados traz as principais ferramentas para produ&ccedil;&atilde;o audiovisual <strong>voltada a Pontos de Cultura e a&ccedil;&otilde;es de Inclus&atilde;o Digital</strong>. Todas as ferramentas e sistema base foram atualizados trazendo novos recursos, melhoria de estabilidade e suporte a novos dispositivos e perif&eacute;ricos (Hardware) com a ado&ccedil;&atilde;o do <strong>kernel linux 2.6.39</strong>. Esta vers&atilde;o busca oferecer uma interface mais simples, amig&aacute;vel, r&aacute;pida, atualizada e totalmente voltada para as atividades dos Pontos de Cultura, a&ccedil;&otilde;es de Inclus&atilde;o Digital e afins.</p>\r\n<p>Entre as principais novidades desta vers&atilde;o est&atilde;o o <strong>LibreOffice 3.3.2</strong>, <strong>Firefox 4.0.1</strong> (j&aacute; com suporte aos plugins para Java e Adobe flash 10.2), <strong>Google Chrome 11</strong>, <strong>GNOME 2.32.1</strong>, <strong>Cinelerra CV 2.1.5</strong>, <strong>Gimp 2.6.11</strong>, <strong>Inkscape 0.48.1</strong>, <strong>Kdenlive 0.7.8</strong>, <strong>Lives 1.4.1</strong>, <strong>Arduino IDE 0022</strong>, <strong>PureData 0.42-6</strong>, <strong>Blender 2.49</strong> e a vers&atilde;o est&aacute;vel do <strong>linux kernel (2.6.39)</strong> com novas otimiza&ccedil;&otilde;es que trazem melhorias na interatividade (tempo de resposta do sistema) e garante uma maior estabilidade ao sistema.</p>', 3, '2011-05-31 19:37:54', 12),
(6, '<p>Template Geral dos Manuais</p>', 0, '2011-05-31 19:52:22', 17),
(7, '<p>Testando 12345... Testando...</p>', 2, '2011-05-31 21:04:10', 18),
(8, '<p>Requisito 1</p>', 0, '2011-05-31 21:05:20', 18),
(9, '<p>Requisito 2</p>', 0, '2011-05-31 21:05:40', 18),
(10, '<p>Requisito 3</p>', 1, '2011-05-31 21:05:53', 18),
(11, '<p>Requisito 1</p>', 0, '2011-05-31 21:08:11', 20),
(12, '<p>Requisito 2</p>', 1, '2011-05-31 21:08:37', 20);

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
