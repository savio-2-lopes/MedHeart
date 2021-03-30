-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Jul-2020 às 01:30
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `medheart`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adicionar_arquivos`
--

DROP TABLE IF EXISTS `adicionar_arquivos`;
CREATE TABLE IF NOT EXISTS `adicionar_arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_data` varchar(255) NOT NULL,
  `paciente` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` varchar(200) NOT NULL,
  `medico` varchar(200) NOT NULL,
  `horario` varchar(200) NOT NULL,
  `departamento` varchar(200) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`id`, `paciente`, `medico`, `horario`, `departamento`, `data_inicial`, `data_final`, `status`) VALUES
(1, 'Savio', 'DR.caligari', '12', 'nada', '2020-06-18', '2020-06-18', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadmedico`
--

DROP TABLE IF EXISTS `cadmedico`;
CREATE TABLE IF NOT EXISTS `cadmedico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_medico` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `departamento` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `educacao` varchar(200) NOT NULL,
  `experiencia` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadmedico`
--

INSERT INTO `cadmedico` (`id`, `nome_medico`, `telefone`, `departamento`, `login`, `educacao`, `experiencia`) VALUES
(1, 'Fausto', '1212121212', 'Necromancia', 'fausto@gmail.com', 'Alquimia', 'Mefistofeles'),
(3, 'DR. Victor Frankenstein', '12121212', 'Necromancia', 'frankenstein@gmail.com', 'Medicina', 'CadÃ¡rveres'),
(4, 'Dr. Jeklin', '1212121212', 'Psicologia', 'hyde@gmail.com', 'doppelganger', 'Mr. Hyde'),
(5, 'Dr Phibes', '(12) 1221-2212', 'd', 'phibes@gmail.com', 'd', 'd'),
(6, 'Doutor Moreau', '1212121', 'Anatomia & psicologia', 'moreau@gmail.com', 'evoluÃ§Ã£o das espÃ©cies', 'hibridos humanos/animais'),
(7, 'Izzie Stevens', '121212', 'Pediatra', 'gray@gmail.com', 'Medicina', 'Oncorlogista'),
(9, 'Dr. Hannibal Lecter', '12121212', 'Psicologia', 'hannibal@gmail.com', 'Psicologia', 'mÃ©dico psiquiatra'),
(10, 'DR. Griffin', '121212121', 'Ã“ptica', 'griffin@gmail.com', 'Invisibilidade', 'Lux'),
(11, 'C. A. Rotwang', '1212121212', 'Engenharia', 'metropolis@gmail.com', 'RobÃ³tica', 'Androids'),
(13, 'Samuel Loomis', '121212', 'Psicologia', 'loomis@gmail.com', 'Psicologia', 'Psicologia'),
(15, 'Izzie Stevens', '(12) 1221-2122', 'Psiquiatrico', 'izzie@gmail.com', 'Psicologia', 'Pediatria'),
(16, 'sas', '(12) 1212-1212', 'sas', 'savioaugulopes@gmail.com', 'sas', 'sas'),
(18, 'ds', '(12) 1212-1212', 'ds', 'savioaugulopes@gmail.com', 'ds', 'ds'),
(20, 'editei certo', '(12) 2212-1219', 'ds', 'dd@gmail.com', 'ds', 'ds'),
(22, 'Izzie Stevens', '(12) 1212-1212', 's', 'savioaugulopes@gmail.com', 'sd', 'sd'),
(24, 'sdsd', '(23) 2323-2323', 'dsds', 'savi@gmailcom', 'dsds', 'dsds'),
(25, 'editado', '(12) 1212-1212', 's', 'savi@gmailcom', 's', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadpaciente`
--

DROP TABLE IF EXISTS `cadpaciente`;
CREATE TABLE IF NOT EXISTS `cadpaciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primeiro_nome` varchar(255) NOT NULL,
  `nome_meio` varchar(255) NOT NULL,
  `ultimo_nome` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `guardiao` varchar(255) NOT NULL,
  `ocupacao` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tipo_sanguineo` varchar(255) NOT NULL,
  `religiao` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alergia` varchar(255) NOT NULL,
  `codigo_convenio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadpaciente`
--

INSERT INTO `cadpaciente` (`id`, `primeiro_nome`, `nome_meio`, `ultimo_nome`, `genero`, `data_nascimento`, `guardiao`, `ocupacao`, `status`, `tipo_sanguineo`, `religiao`, `telefone`, `email`, `alergia`, `codigo_convenio`) VALUES
(54, 'Mulan', 'sd', 's', 'feminino', '2020-01-03', 's', 'sds', 's', 'B+', 's', '(99) 9999-9999', 'savioaugulopes@gmail.com', 'ds', '\r\n																										3'),
(10, 'Horace ', 'Walpole ', 'Walpole ', 'masculino', '1717-01-01', 'Nada', 'Escritor', 'Vazio', 'A-', 'Ateu', '121212121', 'horace@gmail.com', 'Nada', '\r\n																										4'),
(30, 'Sheridan ', 'Le', 'Fanu', 'masculino', '1814-01-01', 'Nenhum', 'Escritor', 'Nenhum', 'AB-', 'nehuma', '121212', 'carmilla@gmail.com', 'Nenhuma', '\r\n																										3'),
(17, 'Gregor', 'Dumpim', 'Sansa', 'masculino', '2020-12-12', 'sasas', 'Caixeiro Viajante', 'adadad', 'A-', 'Wicca', '121212121212', 'gregor@hotmail.com', 'Insetos', '12'),
(32, 'John ', 'Willian ', 'Polidori', 'masculino', '1796-01-01', 'Nenhum', 'Escritor', 'Nenhum', 'A-', 'Nenhuma', '12121212', 'polidori@gmail.com', 'Nenhuma', '\r\n																										2'),
(31, 'Regina ', 'Maria ', 'Roche', 'feminino', '1764-01-01', 'Nenhum', 'Escritor', 'Nenhum', 'B+', 'Nehuma', '121212', 'regina@gmail.com', 'Nenhuma', '\r\n																										2'),
(27, 'ann radcliffe', 'ann', 'ann', 'feminino', '2020-01-02', 'nenhum', 'escritora', 'nehum', 'B+', 'ateu', '(12) 1212-1212', 'ann@gmail.com', 'nada', '\r\n																										26'),
(28, 'Matthew ', 'Matthew ', 'Gregory ', 'masculino', '1775-01-01', 'Nenhum', 'Escritor', 'Nenhum', 'AB+', 'Nenhuma', '121212', 'matthew@gmail.com', 'Nenhuma', '\r\n																										1'),
(29, 'Charles ', 'Charles ', 'Robert ', 'masculino', '1750-01-01', 'Nenhum', 'Escritor', 'Nenhum', 'A-', 'Wicca', '1212121', 'charles@gmail.com', 'nenhuma', '\r\n																										2'),
(48, 'ads', 'ads', 'ads', 'outros', '2021-02-01', 'Nenhum', 'Diretor', 's', 'B-', 'ds', '(12) 2121-2121', 'savioaugulopes@gmail.com', 'sa', '\r\n																										26'),
(35, 'Mario Bava', 'Mario ', 'Bava', 'masculino', '1967-01-01', 'Nenhum', 'Diretor', 'Nenhum', 'A-', 'Nenhuma', '121212', 'bava@gmail.com', 'Nenhuma', '\r\n																										2'),
(36, 'Dario ', 'Dario ', 'Argento ', 'masculino', '1977-01-01', 'Nenhum', 'Diretor', 'Nada', 'A-', 'Nenhuma', '121212', 'suspiria@gmail.com', 'dsds', '\r\n																										4'),
(39, 'Waternoose', 'SR', 'Noose', 'outros', '2003-01-01', 'Nenhum', 'Dono da MS.A', 'Nada', 'A-', 'Nenhuma', '12999', 'waternoose@gmail.com', 'Nenhuma', '\r\n																										1'),
(40, 'Loverclaft', 'H.P', 'Phillips', 'masculino', '2000-02-12', 'Nenhum', 'Escritor', 'Sem nome', 'A-', 'Nenhum', '12992992', 'loverclaft@gmail.com', 'Nada', '\r\n																										5'),
(43, 'allan turing ', 'turing', 'turing', 'outros', '2004-10-29', 'Nada', 'nada', 'nada', 'AB+', 'nenhuma', '(12) 1212-1212', 'turing@gmail.com', 'nenhuma', '\r\n																										3'),
(42, 'Michael Myers', 'Michael Myers', 'Michael Myers', 'masculino', '1987-01-01', 'Myers', 'Ator', 'Myers', 'B+', 'Twron', '1212121', 'halloween@gmail.com', 'Sol', '\r\n																										23'),
(44, 'sdsds', 'dsds', 'sds', 'outros', '2021-01-02', 'dsds', 'dsd', 'sdsd', 'B+', 'sd', '(12) 1212-1212', 'dsdsd@gmailc.om', 'sdsds', '\r\n																										3'),
(45, 'ighor', 'ighor', 'ighor', 'masculino', '2020-02-03', 'sem', 'sem', 'sem', 'B+', 'sem', '(12) 1212-1212', 'sem@gmail.com', 'sem', '\r\n																										26'),
(50, 'sf', 'dsd', 'dsd', 'outros', '2020-02-02', 'ds', 'ds', 'ds', 'B+', 'ds', '(12) 1212-1219', 'savioaugulopes@gmail.com', 's', '\r\n																										3'),
(47, 'cadastrareditado', 'd', 'd', 'outros', '2020-01-01', 'Nenhum', 'Diretor', 'd', 'B+', 'Nenhuma', '(12) 1212-3333', 'sa@gmail.com', 'd', '\r\n																										3'),
(49, 'editadofd', 'sds', 'dsd', 'outros', '2020-01-03', 'dsd', 'dsd', 'dsd', 'B-', 'dsd', '(99) 9999-9999', 'dsds@gmail.com', 'dsd', '\r\n																										3'),
(52, 'cadastrad', 'dsd', 'ds', 'outros', '2020-03-01', 'Nenhum', 'ds', 'dsd', 'A-', 'sd', '(23) 2323-2332', 'savioaugulopes@gmail', 'sdsd', '\r\n																										3'),
(53, 'dssd', 'sd', 'ds', 'outros', '2020-02-03', 'dsd', 'sds', 'sd', 'A-', 'ds', '(12) 1212-1299', 'savioaugulopes@gmail.com', 'asas', '\r\n																										27'),
(55, 'joana editada', 'd', 'd', 'feminino', '2020-01-03', 's', 'sds', 's', 'A-', 's', '(99) 9999-9912', 'savioaugulopes@gmail', 's', '\r\n																										2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadprescricao`
--

DROP TABLE IF EXISTS `cadprescricao`;
CREATE TABLE IF NOT EXISTS `cadprescricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `paciente` varchar(200) NOT NULL,
  `historico` varchar(200) NOT NULL,
  `medicamento` varchar(200) NOT NULL,
  `anotacoes` varchar(900) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadprescricao`
--

INSERT INTO `cadprescricao` (`id`, `titulo`, `data`, `paciente`, `historico`, `medicamento`, `anotacoes`) VALUES
(1, 'editar', '2020-01-02', '\r\n															10', '21:59', '\r\n																14', 'd'),
(2, 'editar3', '2020-12-31', '\r\n															38', '22:58', '\r\n																7', 'd'),
(4, 'editar2', '2020-12-31', '\r\n															38', '20:58', '\r\n																8', 'c'),
(5, 'sddsd', '2020-02-01', '\r\n															30', '01:00', '\r\n																7', 'ds'),
(6, '', '2020-01-01', '\r\n																38', '00:00', '\r\n																6', 'dsdsdsd'),
(13, 'dsd', '2020-02-01', '\r\n															43', '01:00', '\r\n																7', 'csd'),
(8, 'editadad', '2020-01-03', '\r\n															30', '02:00', '\r\n																6', 'dd'),
(12, 'dsd', '2020-01-02', '\r\n															30', '23:01', '\r\n																7', 'dsd'),
(14, 'ds', '2020-01-01', '\r\n															30', '01:00', '\r\n																6', 's'),
(11, 'nada', '2020-12-31', '\r\n															17', '21:58', '\r\n																7', 'dadd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_equipamento`
--

DROP TABLE IF EXISTS `cad_equipamento`;
CREATE TABLE IF NOT EXISTS `cad_equipamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_equipamento` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `clinico` varchar(255) NOT NULL,
  `quantidade` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `data_validade` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_equipamento`
--

INSERT INTO `cad_equipamento` (`id`, `nome_equipamento`, `categoria`, `clinico`, `quantidade`, `preco`, `data_validade`) VALUES
(10, 'dsds', 'dsds', 'dsdsd', '4', '12', '2023-11-29'),
(4, 'ELETROCARDIOGRAFO INTERPRETATIVO DIGITAL ', 'ELETROCARDIOGRAFO ', 'ELETROCARDIOGRAFO ', '3', '1849.50', '2028-02-21'),
(12, 'sddsdsds', 'sddsdsds', 'sddsdsds', '1', '1.1221', '2020-12-12'),
(13, 'dsd', 'sds', 'dsds', '12', '21.12', '2020-12-12'),
(14, 'Cardioversor', 'Cardioversor', 'Cardioversor', '23', '13730.90', '2030-12-12'),
(17, 'sa', 'sa', 'sa', '2', '12', '2020-01-02'),
(15, 'sdsdsd', 'dsdsdsd', 'dsdsd', '2', '12', '2020-01-01'),
(16, 'sds', 'dsds', 'dsds', '3', '12', '2020-01-02'),
(18, 'edutar', 'sa', 'sa', '2', '2', '2020-01-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_historico_medico`
--

DROP TABLE IF EXISTS `cad_historico_medico`;
CREATE TABLE IF NOT EXISTS `cad_historico_medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `paciente` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_lab`
--

DROP TABLE IF EXISTS `cad_lab`;
CREATE TABLE IF NOT EXISTS `cad_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_lab` varchar(255) NOT NULL,
  `medico` varchar(255) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `data_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_lab`
--

INSERT INTO `cad_lab` (`id`, `tipo_lab`, `medico`, `quantidade`, `data_registro`) VALUES
(18, 'Imunologia', '\r\n																														Fausto', 3, '2020-12-12'),
(42, 'editado novo cadastro', '\r\n															3', 3, '2020-01-31'),
(6, 'Laboratorio de  toxicologia ', 'Dr. Victor Frankenstei', 1, '2020-04-23'),
(13, 'Glicose', 'Dr. MAd', 5, '2021-12-12'),
(10, 'Toxicologia', 'Dr. Victor Frankedten', 12, '2020-02-01'),
(25, 'Patologista', '\r\n															6', 4, '2020-06-16'),
(26, 'nada', '\r\n															6', 3, '2020-06-26'),
(29, 'editado novo', '\r\n															4', 1, '2020-01-03'),
(28, 'Patologista', '\r\n															5', 3, '2020-01-31'),
(30, 'dsds', '\r\n															3', 2, '2020-01-01'),
(41, 'Mulan', '4', 3, '2020-01-02'),
(32, 'laboratÃ³rio aleatÃ³rio', '\r\n															4', 3, '2020-11-30'),
(33, 'ds', '7', 3, '2020-02-01'),
(34, 'Patologista', '5', 5, '2020-01-03'),
(35, 'sdsdsdsddddddddddddddd', '\r\n															3', 3, '2020-01-02'),
(36, 'sdsd', '3', 4, '2021-11-02'),
(37, 'ds', '3', 2, '2021-01-02'),
(40, 'sd', '13', 5, '0012-12-23'),
(39, 'cadas', '4', 3, '2019-10-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_medicamento`
--

DROP TABLE IF EXISTS `cad_medicamento`;
CREATE TABLE IF NOT EXISTS `cad_medicamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_medicamento` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `efeito` varchar(255) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `data_validade` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_medicamento`
--

INSERT INTO `cad_medicamento` (`id`, `nome_medicamento`, `categoria`, `efeito`, `quantidade`, `preco`, `data_validade`) VALUES
(32, 'editadossspasas', 'Antidepressivo', 's', 3, '12', '2020-01-01'),
(6, 'nortriptilina', 'Antidepressivo', 'Antidepressivo', 3, '5.2', '2023-01-01'),
(7, 'clomipramina', 'Antidepressivo', 'Antidepressivo', 21, '12', '2021-02-09'),
(8, 'desipramina', 'Antidepressivo', 'Antidepressivo', 3, '12', '2020-02-01'),
(9, 'CITALOPRAM ', 'ANTIDEPRESSIVO ', 'ANTIDEPRESSIVO ', 23, '0.90', '2030-02-02'),
(18, 'trazodona', 'antipressivos', 'antipressivo', 2, '2', '2023-05-01'),
(21, 'Diazepam', 'Antidepressivo', 'dsdsd', 3, '3.2', '2020-01-01'),
(19, 'Paroxetina', 'Antidepressivo', 'Nada', 2, '2.2', '2022-01-01'),
(24, 'fsfdfdsf', 'jdj', 'jj', 3, '3', '2020-01-03'),
(23, 'ourts', 'sdsd', 'juhh', 3, '23', '2022-01-02'),
(25, 'sasasa', 'asas', 'saas', 3, '2', '2021-01-01'),
(26, 'deu certo', 'deu certo', 'deu certo', 3, '12', '2020-01-01'),
(27, 'deu certo de verd', 'deu certo de verd', 'deu certo de verd', 2, '1', '2020-01-02'),
(28, 'ss', 'ss', 'ss', 2, '1', '2020-01-02'),
(29, 'dsdb', 'dsdss', 'dsd', 4, '12', '2020-01-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenio`
--

DROP TABLE IF EXISTS `convenio`;
CREATE TABLE IF NOT EXISTS `convenio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convenio`
--

INSERT INTO `convenio` (`id`, `nome`, `code`) VALUES
(1, 'alianz', '324'),
(2, 'ameno', '543'),
(3, 'ameplan', '125'),
(5, 'bradesco', '65'),
(8, 'golden cross', '232'),
(11, 'Unimed', ''),
(12, 'Sul America', ''),
(13, 'total medcare', '67'),
(22, 'Classe', '2'),
(23, 'biovida', '56'),
(25, 'Generico', '121'),
(26, 'nada', '434'),
(27, 'nadada', 'sds'),
(28, 'editei', '13'),
(29, 'cadastro', '12'),
(31, 'dsds', '12121'),
(33, 'bradesco', '2323');

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua And Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas The'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo The Democratic Republic Of The'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'XA', 'External Territories of Australia'),
(71, 'FK', 'Falkland Islands'),
(72, 'FO', 'Faroe Islands'),
(73, 'FJ', 'Fiji Islands'),
(74, 'FI', 'Finland'),
(75, 'FR', 'France'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia The'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'XU', 'Guernsey and Alderney'),
(92, 'GN', 'Guinea'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HT', 'Haiti'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong S.A.R.'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'XJ', 'Jersey'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea North'),
(116, 'KR', 'Korea South'),
(117, 'KW', 'Kuwait'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'LA', 'Laos'),
(120, 'LV', 'Latvia'),
(121, 'LB', 'Lebanon'),
(122, 'LS', 'Lesotho'),
(123, 'LR', 'Liberia'),
(124, 'LY', 'Libya'),
(125, 'LI', 'Liechtenstein'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'MO', 'Macau S.A.R.'),
(129, 'MK', 'Macedonia'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaysia'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malta'),
(136, 'XM', 'Man (Isle of)'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'MS', 'Montserrat'),
(148, 'MA', 'Morocco'),
(149, 'MZ', 'Mozambique'),
(150, 'MM', 'Myanmar'),
(151, 'NA', 'Namibia'),
(152, 'NR', 'Nauru'),
(153, 'NP', 'Nepal'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NL', 'Netherlands The'),
(156, 'NC', 'New Caledonia'),
(157, 'NZ', 'New Zealand'),
(158, 'NI', 'Nicaragua'),
(159, 'NE', 'Niger'),
(160, 'NG', 'Nigeria'),
(161, 'NU', 'Niue'),
(162, 'NF', 'Norfolk Island'),
(163, 'MP', 'Northern Mariana Islands'),
(164, 'NO', 'Norway'),
(165, 'OM', 'Oman'),
(166, 'PK', 'Pakistan'),
(167, 'PW', 'Palau'),
(168, 'PS', 'Palestinian Territory Occupied'),
(169, 'PA', 'Panama'),
(170, 'PG', 'Papua new Guinea'),
(171, 'PY', 'Paraguay'),
(172, 'PE', 'Peru'),
(173, 'PH', 'Philippines'),
(174, 'PN', 'Pitcairn Island'),
(175, 'PL', 'Poland'),
(176, 'PT', 'Portugal'),
(177, 'PR', 'Puerto Rico'),
(178, 'QA', 'Qatar'),
(179, 'RE', 'Reunion'),
(180, 'RO', 'Romania'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SH', 'Saint Helena'),
(184, 'KN', 'Saint Kitts And Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'VC', 'Saint Vincent And The Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'XG', 'Smaller Territories of the UK'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia'),
(204, 'SS', 'South Sudan'),
(205, 'ES', 'Spain'),
(206, 'LK', 'Sri Lanka'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syria'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad And Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks And Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State (Holy See)'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (US)'),
(241, 'WF', 'Wallis And Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'YU', 'Yugoslavia'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab`
--

DROP TABLE IF EXISTS `lab`;
CREATE TABLE IF NOT EXISTS `lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_lab` varchar(200) NOT NULL,
  `medico` varchar(200) NOT NULL,
  `quantidade` varchar(200) NOT NULL,
  `data_registro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lab`
--

INSERT INTO `lab` (`id`, `tipo_lab`, `medico`, `quantidade`, `data_registro`) VALUES
(1, 'Patologista', '\r\n															3', '2', '2020-10-29'),
(2, 'Patologista', '\r\n															3', '2', '2020-10-29'),
(3, 'Patologista', '\r\n															3', '2', '2020-10-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `painel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `code`, `nome`, `senha`, `painel`, `status`) VALUES
(1, '1234', 'Savio', '1234', 'admin', 'Ativo'),
(2, '1234', 'Savio Augusto', '1234', 'admin', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_medicamento` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `efeito` varchar(255) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `preco` int(255) NOT NULL,
  `data_validade` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id`, `nome_medicamento`, `categoria`, `efeito`, `quantidade`, `preco`, `data_validade`) VALUES
(1, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(2, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(3, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(4, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(5, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(6, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(7, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(8, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(9, 'sassssssssss', 'sassssssssss', 'sassssssssss', 12, 12, '2020-12-12'),
(10, 'asasasas', 'asasasas', 'asasasas', 12, 12, '2020-12-12'),
(11, 'Sem nome estranho', 'antdepressivo', 'antdepressivo', 11, 2, '2020-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_prescricao`
--

DROP TABLE IF EXISTS `registro_prescricao`;
CREATE TABLE IF NOT EXISTS `registro_prescricao` (
  `prescricao_registro_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prescricao` int(20) NOT NULL,
  `nome_medicamento` varchar(200) NOT NULL,
  `preco` float(20,2) NOT NULL,
  `quantidade` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`prescricao_registro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicao_equipamento`
--

DROP TABLE IF EXISTS `requisicao_equipamento`;
CREATE TABLE IF NOT EXISTS `requisicao_equipamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipamento` varchar(200) NOT NULL,
  `paciente` varchar(200) NOT NULL,
  `prescricao` varchar(200) NOT NULL,
  `quantidade` int(200) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicao_lab`
--

DROP TABLE IF EXISTS `requisicao_lab`;
CREATE TABLE IF NOT EXISTS `requisicao_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lab` varchar(200) NOT NULL,
  `paciente` varchar(200) NOT NULL,
  `prescricao` varchar(200) NOT NULL,
  `quantidade` int(200) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisicao_lab`
--

INSERT INTO `requisicao_lab` (`id`, `lab`, `paciente`, `prescricao`, `quantidade`, `data`) VALUES
(1, '\r\n															25', '\r\n															17', '\r\n															2', 3, '2021-01-03'),
(2, '\r\n															42', '\r\n															10', '\r\n															1', 3, '2021-01-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicao_medicamento`
--

DROP TABLE IF EXISTS `requisicao_medicamento`;
CREATE TABLE IF NOT EXISTS `requisicao_medicamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicamento` varchar(200) NOT NULL,
  `paciente` varchar(200) NOT NULL,
  `prescricao` varchar(200) NOT NULL,
  `quantidade` int(200) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `requisicao_medicamento`
--

INSERT INTO `requisicao_medicamento` (`id`, `medicamento`, `paciente`, `prescricao`, `quantidade`, `data`) VALUES
(1, '\r\n															7', '\r\n															30', '\r\n															2', 3, '2020-01-02'),
(2, '\r\n															7', '\r\n															30', '\r\n															2', 3, '2020-01-02'),
(3, '\r\n															7', '\r\n															30', '\r\n															2', 3, '2020-01-02'),
(4, '\r\n															7', '\r\n															30', '\r\n															2', 3, '2020-01-02'),
(5, '\r\n															18', '\r\n															17', '\r\n															2', 3, '2002-12-12'),
(6, '\r\n															6', '\r\n															54', '\r\n															1', 3, '2020-01-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `postingdate` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `session`
--

INSERT INTO `session` (`id`, `session`, `postingdate`, `status`) VALUES
(1, '2010-2011', '2010-04-14', 0),
(2, '2011-2012', '2012-04-14', 0),
(3, '2012-2013', '2012-04-13', 0),
(4, '2013-2014', '2013-04-05', 0),
(5, '2013-2014', '2014-04-12', 0),
(6, '2014-2015', '2015-04-12', 0),
(7, '2015-2016', '2016-04-12', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_servico`
--

DROP TABLE IF EXISTS `sub_servico`;
CREATE TABLE IF NOT EXISTS `sub_servico` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(100) NOT NULL,
  `sub_nome` varchar(200) NOT NULL,
  `taxa` varchar(100) NOT NULL,
  PRIMARY KEY (`servico_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginid` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `painel` varchar(255) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `loginid`, `password`, `status`, `painel`, `nome`, `telefone`) VALUES
(1, 'admin', 'admin', 'Ativo', 'admin', 'Savio', ''),
(2, 'admin', 'ads', 'ativo', 'admin', 'ds', '(12) 1212-1212');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
