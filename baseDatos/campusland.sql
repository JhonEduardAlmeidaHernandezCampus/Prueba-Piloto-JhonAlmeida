-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-06-2023 a las 14:18:57
-- Versión del servidor: 8.0.33-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `campusland`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academic_area`
--

CREATE TABLE `academic_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journeys` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `academic_area`
--

INSERT INTO `academic_area` (`id`, `id_area`, `id_staff`, `id_position`, `id_journeys`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_area`
--

CREATE TABLE `admin_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admin_area`
--

INSERT INTO `admin_area` (`id`, `id_area`, `id_staff`, `id_position`, `id_journey`) VALUES
(3, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int NOT NULL,
  `name_area` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `name_area`) VALUES
(1, 'area de mantenimiento'),
(2, 'área administrativa ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campers`
--

CREATE TABLE `campers` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_route` int NOT NULL,
  `id_trainer` int NOT NULL,
  `id_psycologist` int NOT NULL,
  `id_teacher` int NOT NULL,
  `id_level` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_staff` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapters`
--

CREATE TABLE `chapters` (
  `id` int NOT NULL,
  `id_thematic_units` int NOT NULL,
  `name_chapter` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `chapters`
--

INSERT INTO `chapters` (`id`, `id_thematic_units`, `name_chapter`, `start_date`, `end_date`, `description`, `duration_days`) VALUES
(1, 1, 'fundamentos en html\r\n', '2023-02-27', '2023-03-08', 'Se enseñan las bases, conceptos y sintaxis que se manejan en este lenguaje', 9),
(2, 2, 'fundamentos en css', '2023-03-17', '2023-06-24', 'Se enseñan las bases, conceptos y sintaxis que se manejan en este lenguaje', 7),
(3, 3, 'fundamentos en js', '2023-03-31', '2023-04-07', 'Se enseñan las bases, conceptos y sintaxis que se manejan en este lenguaje', 7),
(4, 4, 'fundamentos en php', '2023-04-14', '2023-04-22', 'Se enseñan las bases, conceptos y sintaxis que se manejan en este lenguaje', 8),
(5, 5, 'fundamentos en base de datos', '2023-05-01', '2023-05-07', 'Se enseñan las bases, conceptos y sintaxis que se manejan en este lenguaje', 7),
(6, 1, 'Ejercicios para finalizar', '2023-03-08', '2023-03-17', 'Se realizan ejercicios para poner en practica lo aprendido en html', 9),
(7, 2, 'Ejercicios para finalizar', '2023-03-24', '2023-03-31', 'Se realizan ejercicios para poner en practica lo aprendido en css', 7),
(8, 3, 'Ejercicios para finalizar', '2023-04-07', '2023-04-15', 'Se realizan ejercicios para poner en practica lo aprendido en js', 8),
(9, 4, 'Ejercicios para finalizar', '2023-04-22', '2023-04-30', 'Se realizan ejercicios para poner en practica lo aprendido en php', 8),
(10, 5, 'Ejercicios para finalizar', '2023-05-07', '2023-05-15', 'Se realizan ejercicios para poner en practica lo aprendido en mysql', 8),
(11, 6, 'Los cuatro componentes de la comunicacion cap 1', '2023-02-27', '2023-03-08', 'La buena comunicación consta de cuatro componentes: las personas, el mensaje, el contexto y la escucha activa. ', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `name_city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_region` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name_city`, `id_region`) VALUES
(1, 'Piedecuesta', 1),
(3, 'Medellin', 1),
(4, 'Santander', 1),
(5, 'Lima', 10),
(9, 'Múnich', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `whatsapp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contact_info`
--

INSERT INTO `contact_info` (`id`, `id_staff`, `whatsapp`, `instagram`, `linkedin`, `email`, `address`, `cel_number`) VALUES
(1, 1, '+573209280099', 'daniel.gomez', 'https://www.linkedin.com/in/daniel-santiago-g%C3%B3mez-abril-a3432b278/', 'daniel@gmail.com', 'casa 61 nuevo pinares ', '+573209280099'),
(2, 2, '+573122249700', 'daniela.gomez', 'https://www.linkedin.com/in/daniela-andrea-g%C3%B3mez-abril-546613166/', 'daniela@gmail.com', 'casa 61 nuevo pinares ', '+573122249700'),
(3, 3, '+573160688122', 'jolver.pardo', 'https://www.linkedin.com/in/liobabrand/', 'jjpardo@gmail.com', 'provenza av10 #9-40', '+573160688122'),
(5, 5, '+57317321338', 'karen.lorena', 'https://www.linkedin.com/in/karenlorenacelis12/', 'karen@gmail.com', 'calle 45#8-25 barrio miraflores ', '+573173213338'),
(6, 6, '+573145629487', 'miguel.rodriguez', 'https://www.linkedin.com/in/miguel-ni%C3%B1o-3aa2661a5/', 'miguel@gmail.com', 'carrera 2# 18-30 bario esperanza', '+573145729487'),
(7, 7, '+5731000883727', 'vermer.cardozo', 'https://www.linkedin.com/in/laurent-vermer-54490/', 'vermer@gmail.com', 'carrera 5#15-86 barrio campo ', '+573100083727'),
(8, 8, '+573100059476', 'diego.ramirez', 'https://www.linkedin.com/in/diegoribas10/', 'diego@gmail.com', 'carrera 13#4-95 barrio girasoles', '+573100059476'),
(9, 9, '+573005117784', 'fabio.eliecer', 'https://www.linkedin.com/in/fabiopintech/', 'fabio@gmail.com', 'calle 34#12-46 barrio el gaitan', '+573005117784'),
(10, 10, '+573183515058', 'jose.cabrejo', 'https://www.linkedin.com/in/jose-cabrejo/', 'jose@gmail.com', 'carrera 52#9-35 barrio ruitoque', '+573183515058'),
(11, 11, '+573010045398', 'vanesa.cordoba', 'https://www.linkedin.com/in/yesli-vanessa-martinez-ropero-392418143/', 'yesli.vanessa@gmail.com', 'carrera 42#5-18 barrio la universidad', '+573010045398'),
(13, 14, '+573522457851', 'CarlosVillafradess', 'Carlos Villafrades', 'villafrades@gmail.com', 'calle 11', '3524568654');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `name_country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name_country`) VALUES
(1, 'Peru'),
(2, 'Alemania'),
(12, 'España'),
(14, 'Colombia'),
(15, 'ADEP1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `design_area`
--

CREATE TABLE `design_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emergency_contact`
--

INSERT INTO `emergency_contact` (`id`, `id_staff`, `cel_number`, `relationship`, `full_name`, `email`) VALUES
(2, 14, '326568495', 'Hermano', 'Jhon Villafrades', 'villafrades@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `english_skills`
--

CREATE TABLE `english_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_teacher` int NOT NULL,
  `id_location` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journey`
--

CREATE TABLE `journey` (
  `id` int NOT NULL,
  `name_journey` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `journey`
--

INSERT INTO `journey` (`id`, `name_journey`, `check_in`, `check_out`) VALUES
(1, 'mañana', '06:00:00', '13:30:00'),
(2, 'tarde', '08:00:00', '22:00:00'),
(3, 'laboral', '08:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE `levels` (
  `id` int NOT NULL,
  `name_level` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_level` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `levels`
--

INSERT INTO `levels` (`id`, `name_level`, `group_level`) VALUES
(1, 'basico', 'apolo'),
(2, 'intermedio', 'artemidis'),
(3, 'avanzado', 'sputnik'),
(8, 'vasico', 'apolo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `name_location` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `name_location`) VALUES
(1, 'Salon Artemis'),
(2, 'Salon Apolo'),
(3, 'Salon Sputnik');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maint_area`
--

CREATE TABLE `maint_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marketing_area`
--

CREATE TABLE `marketing_area` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_position` int NOT NULL,
  `id_journey` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `name_module` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL,
  `id_theme` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `name_module`, `start_date`, `end_date`, `description`, `duration_days`, `id_theme`) VALUES
(1, 'HTML ATTRIBUTE MOD 1', '2023-02-27', '2023-03-01', 'All HTML elements can have attributes', 3, 1),
(2, 'Teoría personas en la comunicacion ', '2023-02-27', '2023-03-03', 'La comunicación puede ser compleja, debido a nuestros filtros mentales, los niveles de conocimiento, preocupaciones personales y nociones preconcebidas que afectan cómo interpretamos los mensajes. ', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optional_topics`
--

CREATE TABLE `optional_topics` (
  `id` int NOT NULL,
  `id_topic` int NOT NULL,
  `id_team` int NOT NULL,
  `id_subject` int NOT NULL,
  `id_camper` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_ref`
--

CREATE TABLE `personal_ref` (
  `id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_ref`
--

INSERT INTO `personal_ref` (`id`, `full_name`, `cel_number`, `relationship`, `occupation`) VALUES
(1, 'David Andrés Rueda Chacón', '23243243', 'comprometido', 'estudiante a medio tiempo'),
(2, 'Sebastian Carvajal', '31030047', 'Hermano', 'Estudiante'),
(9, 'Julian Alvarez', '12212', 'example', 'Admin'),
(22, 'Jhon hernandez Ferrer', '23432', 'no se que', 'estudiante'),
(222, 'Laura Sofia ', '23432', 'que funciona por favor', 'estudiante'),
(5421, 'prueba', '325151', 'ddsdf', 'dccxc'),
(5423, 'Ana Maria', '33356895', 'Madre', 'Ama de casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE `position` (
  `id` int NOT NULL,
  `name_position` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `arl` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `position`
--

INSERT INTO `position` (`id`, `name_position`, `arl`) VALUES
(1, 'Trainer', 'sura'),
(2, 'Psicologa', 'sura'),
(3, 'Docente de Ingles', 'postiva'),
(4, 'Diseñador Web', 'colpatria'),
(7, 'Backend', 'colpatria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `psychologist`
--

CREATE TABLE `psychologist` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_route` int NOT NULL,
  `id_academic_area_psycologist` int NOT NULL,
  `id_position` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `psychologist`
--

INSERT INTO `psychologist` (`id`, `id_staff`, `id_route`, `id_academic_area_psycologist`, `id_position`, `id_team_educator`) VALUES
(1, 4, 3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

CREATE TABLE `regions` (
  `id` int NOT NULL,
  `name_region` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_country` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regions`
--

INSERT INTO `regions` (`id`, `name_region`, `id_country`) VALUES
(1, 'Santander', 14),
(4, 'Baviera', 2),
(7, 'Caribe', 14),
(10, 'machu-pichu', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review_skills`
--

CREATE TABLE `review_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_tutor` int NOT NULL,
  `id_location` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routes`
--

CREATE TABLE `routes` (
  `id` int NOT NULL,
  `name_route` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_month` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `routes`
--

INSERT INTO `routes` (`id`, `name_route`, `start_date`, `end_date`, `description`, `duration_month`) VALUES
(1, 'frontend', '2023-02-27', '2023-05-27', 'Se dan las bases de el desarrollo web y diseño', 3),
(2, 'bakend', '2023-05-27', '2023-08-27', 'Se dan las bases para el manejo en la parte logica de las aplicaciones y desarrollos web', 3),
(3, 'Habilidades Blandas', '2023-02-27', '2023-05-27', 'Aprende a destacar en cualquier trabajo dominando las habilidades blandas profesionales esenciales. Desarrolla las habilidades que más valoran las personas responsables de contratación, desde la inteligencia emocional y el pensamiento crítico hasta el sesgo inconsciente y el trabajo en equipo. ', 3),
(4, 'Flurert', '2023-02-27', '2023-10-27', 'Se sentra en la programacion movil', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_skills`
--

CREATE TABLE `software_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_trainer` int NOT NULL,
  `id_location` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soft_skills`
--

CREATE TABLE `soft_skills` (
  `id` int NOT NULL,
  `id_team_schedule` int NOT NULL,
  `id_journey` int NOT NULL,
  `id_psychologist` int NOT NULL,
  `id_location` int NOT NULL,
  `id_subject` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff`
--

CREATE TABLE `staff` (
  `id` int NOT NULL,
  `doc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_surname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_surname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eps` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_area` int NOT NULL,
  `id_city` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `staff`
--

INSERT INTO `staff` (`id`, `doc`, `first_name`, `second_name`, `first_surname`, `second_surname`, `eps`, `id_area`, `id_city`) VALUES
(1, '1096062031', 'daniel', 'santiago', 'gomez', 'abril', 'nueva eps', 1, 1),
(2, '1098765478', 'daniela', 'andrea', 'gomez', 'abril', 'salud total ', 1, 1),
(3, '1098765432', 'jolver', NULL, 'pardo', 'martinez', 'nueva eps ', 1, 1),
(4, '1098745321', 'vanesa', NULL, 'martinez', 'chacon', 'salud total ', 1, 1),
(5, '1098745214', 'karen ', 'lorena', 'celis', 'nueva', 'medimas', 2, 1),
(6, '1003456321', 'miguel ', 'jaime', 'rodriguez', 'pedroza', 'sanitas', 1, 1),
(7, '1932592314', 'vermer', NULL, 'cardozo', 'soacha', 'famisanar', 1, 1),
(8, '1083912225', 'diego ', 'andres', 'ramirez', 'espinoza', 'compensar', 1, 1),
(9, '1073569317', 'fabio', 'eliecer', 'pino', 'cardenas', 'salud total ', 1, 1),
(10, '1008314721', 'jose', 'alexander', 'cabrejo', 'rincon', 'nueva eps ', 1, 1),
(11, '1000391690', 'angie', 'vanessa', 'cordoba', 'ancizar', 'famisanar', 1, 1),
(14, '1084544265', 'Carlos', 'Alberto', 'Villafrades', 'Pinilla', 'coosalud', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name_subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `name_subject`) VALUES
(1, 'StivenCarvajal'),
(4, 'sofware skills'),
(5, 'sofware review');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_route` int NOT NULL,
  `id_academic_area` int NOT NULL,
  `id_position` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_educators`
--

CREATE TABLE `team_educators` (
  `id` int NOT NULL,
  `name_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `team_educators`
--

INSERT INTO `team_educators` (`id`, `name_rol`) VALUES
(1, 'psychologist'),
(2, 'teacher'),
(3, 'trainer'),
(5, 'Developmen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thematic_units`
--

CREATE TABLE `thematic_units` (
  `id` int NOT NULL,
  `id_route` int NOT NULL,
  `name_thematics_units` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `thematic_units`
--

INSERT INTO `thematic_units` (`id`, `id_route`, `name_thematics_units`, `start_date`, `end_date`, `description`, `duration_days`) VALUES
(1, 1, 'html', '2023-02-27', '2023-03-17', 'bases con el lenguaje de html', 18),
(2, 1, 'css', '2023-03-17', '2023-03-31', 'bases en el lenguaje de css', 14),
(3, 1, 'js', '2023-03-31', '2023-04-15', 'bases en el lenguaje de js', 15),
(4, 2, 'php', '2023-04-14', '2023-04-30', 'bases en el lenguaje de php', 16),
(5, 2, 'mysql', '2023-05-01', '2023-05-27', 'modelado de bases de datos en mysql', 15),
(6, 3, 'Fundamentos de la comunicación', '2023-02-27', '2023-03-17', 'Aprende a comunicarte de manera más productiva. Tus habilidades de comunicación interfieren en tus perspectivas profesionales, el valor que aportas a la empresa y tu probabilidad de ascender. ', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `themes`
--

CREATE TABLE `themes` (
  `id` int NOT NULL,
  `id_chapter` int NOT NULL,
  `name_theme` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `themes`
--

INSERT INTO `themes` (`id`, `id_chapter`, `name_theme`, `start_date`, `end_date`, `description`, `duration_days`) VALUES
(1, 1, 'atributos ', '2023-02-27', '2023-03-03', '\r\nAll HTML elements can have attributes\r\nAttributes provide additional information about elements\r\nAttributes are always specified in the start tag\r\nAttributes usually come in name/value pairs like: name=\"value\"\r\n\r\n', 5),
(2, 6, 'HTML Atrributes Exercises', '2023-03-14', '2023-03-17', 'The title Attribute\r\n\r\nThe title attribute defines some extra information about an element.\r\n\r\nThe value of the title attribute will be displayed as a tooltip when you mouse over the element:', 4),
(3, 11, 'Componente las personas ', '2023-02-27', '2023-03-03', 'Tanto si eres el emisor como el receptor del mensaje, es importante que consideres la perspectiva del otro.', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `id_module` int NOT NULL,
  `name_topic` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `topics`
--

INSERT INTO `topics` (`id`, `id_module`, `name_topic`, `start_date`, `end_date`, `description`, `duration_days`) VALUES
(1, 1, 'The href Attribute', '2023-02-27', '2023-02-27', 'The <a> tag defines a hyperlink. The href attribute specifies the URL of the page the link goes to:', 1),
(2, 2, 'ejercicios juego de rol', '2023-02-27', '2023-02-27', 'Los estudiantes tendran un pequeño juego de rol para practicar sobre lo aprendido', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trainers`
--

CREATE TABLE `trainers` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_level` int NOT NULL,
  `id_route` int NOT NULL,
  `id_academic_area` int NOT NULL,
  `id_position` int NOT NULL,
  `id_team_educator` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trainers`
--

INSERT INTO `trainers` (`id`, `id_staff`, `id_level`, `id_route`, `id_academic_area`, `id_position`, `id_team_educator`) VALUES
(1, 3, 1, 1, 1, 1, 3),
(2, 6, 3, 1, 1, 1, 3),
(3, 7, 2, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors`
--

CREATE TABLE `tutors` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_academic_area` int NOT NULL,
  `id_position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `working_info`
--

CREATE TABLE `working_info` (
  `id` int NOT NULL,
  `id_staff` int NOT NULL,
  `years_exp` int DEFAULT NULL,
  `months_exp` int DEFAULT NULL,
  `id_work_reference` int NOT NULL,
  `id_personal_ref` int NOT NULL,
  `start_contract` date NOT NULL,
  `end_contract` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `working_info`
--

INSERT INTO `working_info` (`id`, `id_staff`, `years_exp`, `months_exp`, `id_work_reference`, `id_personal_ref`, `start_contract`, `end_contract`) VALUES
(1, 1, 2, 24, 1, 1, '2023-06-22', '2025-06-22'),
(3, 2, 1, 12, 1, 1, '2020-12-10', '2021-12-11'),
(5, 1, 2, 24, 1, 1, '2021-10-27', '2023-06-10'),
(6, 1, 1, 10, 1, 2, '2023-07-22', '2024-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_reference`
--

CREATE TABLE `work_reference` (
  `id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `work_reference`
--

INSERT INTO `work_reference` (`id`, `full_name`, `cel_number`, `position`, `company`) VALUES
(1, 'Ivan Sanchez', '3222194656', 'Student', 'CampusLands'),
(22, 'Miller', '23432', 'Manaller', 'ABCCD'),
(12346, 'Paco Alberto', '318698547', 'S.Engineer', 'GBP'),
(12347, 'Juan J', '3152353383', 'Student', 'CampusLands'),
(12348, 'David Andrés Rueda Chacon', '3123533244', 'Student', 'CampusLands'),
(541854, 'Juan Camilo', '5658474471', 'Junior', 'CampusLands'),
(541856, 'Ana Maria', '3339585478', 'Estudiante', 'campuslands');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academic_area`
--
ALTER TABLE `academic_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area` (`id_area`),
  ADD KEY `id_staff_academic` (`id_staff`),
  ADD KEY `id_position_academic` (`id_position`),
  ADD KEY `id_journey_academic` (`id_journeys`);

--
-- Indices de la tabla `admin_area`
--
ALTER TABLE `admin_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area_admin` (`id_area`),
  ADD KEY `id_staff_admin` (`id_staff`),
  ADD KEY `id_position_admin` (`id_position`),
  ADD KEY `id_journey_admin` (`id_journey`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `campers`
--
ALTER TABLE `campers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_camper` (`id_journey`),
  ADD KEY `id_level_camper` (`id_level`),
  ADD KEY `id_route_camper` (`id_route`),
  ADD KEY `id_staff_camper` (`id_staff`),
  ADD KEY `id_team_schedule_camper` (`id_team_schedule`),
  ADD KEY `id_trainer_camper` (`id_trainer`);

--
-- Indices de la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thematic_chapter` (`id_thematic_units`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_region` (`id_region`);

--
-- Indices de la tabla `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `design_area`
--
ALTER TABLE `design_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area_design` (`id_area`),
  ADD KEY `id_staff_design` (`id_staff`),
  ADD KEY `id_position_design` (`id_position`),
  ADD KEY `id_journey_design` (`id_journey`);

--
-- Indices de la tabla `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff_emergency` (`id_staff`);

--
-- Indices de la tabla `english_skills`
--
ALTER TABLE `english_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_english` (`id_journey`),
  ADD KEY `id_location_english` (`id_location`),
  ADD KEY `id_teacher_english` (`id_teacher`),
  ADD KEY `id_team_schedule_english` (`id_team_schedule`),
  ADD KEY `id_subject_english` (`id_subject`);

--
-- Indices de la tabla `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maint_area`
--
ALTER TABLE `maint_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_maint_area` (`id_area`),
  ADD KEY `id_staff_maint` (`id_staff`),
  ADD KEY `id_position_maint` (`id_position`),
  ADD KEY `id_journey_maint` (`id_journey`);

--
-- Indices de la tabla `marketing_area`
--
ALTER TABLE `marketing_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marketing_area` (`id_area`),
  ADD KEY `id_staff_marketing` (`id_staff`),
  ADD KEY `id_position_marketing` (`id_position`),
  ADD KEY `id_journey_marketing` (`id_journey`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theme_module` (`id_theme`);

--
-- Indices de la tabla `optional_topics`
--
ALTER TABLE `optional_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camper_optional_topics` (`id_camper`),
  ADD KEY `id_team_schedule_optional_topics` (`id_team`),
  ADD KEY `id_topic_optional_topics` (`id_topic`),
  ADD KEY `id_team_educator_optional_topics` (`id_team_educator`),
  ADD KEY `id_subject_optional_topics` (`id_subject`);

--
-- Indices de la tabla `personal_ref`
--
ALTER TABLE `personal_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `psychologist`
--
ALTER TABLE `psychologist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area_phychologist` (`id_academic_area_psycologist`),
  ADD KEY `id_position_phychologist` (`id_position`),
  ADD KEY `id_route_phychologist` (`id_route`),
  ADD KEY `id_staff_phychologist` (`id_staff`),
  ADD KEY `id_team_educator_phychologist` (`id_team_educator`);

--
-- Indices de la tabla `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_country` (`id_country`);

--
-- Indices de la tabla `review_skills`
--
ALTER TABLE `review_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_review` (`id_journey`),
  ADD KEY `id_location_review` (`id_location`),
  ADD KEY `id_team_schedule_review` (`id_team_schedule`),
  ADD KEY `id_tutor_review` (`id_tutor`);

--
-- Indices de la tabla `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `software_skills`
--
ALTER TABLE `software_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_skills` (`id_journey`),
  ADD KEY `id_location_skills` (`id_location`),
  ADD KEY `id_trainer_skills` (`id_trainer`),
  ADD KEY `id_subject_skills` (`id_subject`),
  ADD KEY `id_team_schedules_skills` (`id_team_schedule`);

--
-- Indices de la tabla `soft_skills`
--
ALTER TABLE `soft_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_journey_soft` (`id_journey`),
  ADD KEY `id_location_soft` (`id_location`),
  ADD KEY `id_phychologist_soft` (`id_psychologist`),
  ADD KEY `id_team_schedule_soft` (`id_team_schedule`),
  ADD KEY `id_subject_soft` (`id_subject`);

--
-- Indices de la tabla `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area_staff` (`id_area`),
  ADD KEY `id_city` (`id_city`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area_teacher` (`id_academic_area`),
  ADD KEY `id_position_teacher` (`id_position`),
  ADD KEY `id_route_teacher` (`id_route`),
  ADD KEY `id_staff_teacher` (`id_staff`),
  ADD KEY `id_team_educator_teacher` (`id_team_educator`);

--
-- Indices de la tabla `team_educators`
--
ALTER TABLE `team_educators`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `thematic_units`
--
ALTER TABLE `thematic_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_route_thematic` (`id_route`);

--
-- Indices de la tabla `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chapter_themes` (`id_chapter`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_module_topic` (`id_module`);

--
-- Indices de la tabla `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff_trainer` (`id_staff`),
  ADD KEY `id_position_trainer` (`id_position`),
  ADD KEY `id_academic_area_trainer` (`id_academic_area`),
  ADD KEY `id_level_trainer` (`id_level`),
  ADD KEY `id_route_trainer` (`id_route`),
  ADD KEY `id_team_educator_trainer` (`id_team_educator`);

--
-- Indices de la tabla `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_academic_area_tutor` (`id_academic_area`),
  ADD KEY `id_position_tutor` (`id_position`),
  ADD KEY `id_staff_tutor` (`id_staff`);

--
-- Indices de la tabla `working_info`
--
ALTER TABLE `working_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_staff_work` (`id_staff`),
  ADD KEY `id_work_reference` (`id_work_reference`),
  ADD KEY `id_personal_ref` (`id_personal_ref`);

--
-- Indices de la tabla `work_reference`
--
ALTER TABLE `work_reference`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academic_area`
--
ALTER TABLE `academic_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `admin_area`
--
ALTER TABLE `admin_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `campers`
--
ALTER TABLE `campers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de la tabla `design_area`
--
ALTER TABLE `design_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `english_skills`
--
ALTER TABLE `english_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `journey`
--
ALTER TABLE `journey`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `maint_area`
--
ALTER TABLE `maint_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marketing_area`
--
ALTER TABLE `marketing_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `optional_topics`
--
ALTER TABLE `optional_topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_ref`
--
ALTER TABLE `personal_ref`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5424;

--
-- AUTO_INCREMENT de la tabla `position`
--
ALTER TABLE `position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `psychologist`
--
ALTER TABLE `psychologist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `review_skills`
--
ALTER TABLE `review_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `software_skills`
--
ALTER TABLE `software_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `soft_skills`
--
ALTER TABLE `soft_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_educators`
--
ALTER TABLE `team_educators`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `thematic_units`
--
ALTER TABLE `thematic_units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `working_info`
--
ALTER TABLE `working_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `work_reference`
--
ALTER TABLE `work_reference`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541857;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `academic_area`
--
ALTER TABLE `academic_area`
  ADD CONSTRAINT `id_academic_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_journey_academic` FOREIGN KEY (`id_journeys`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_academic` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_academic` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `admin_area`
--
ALTER TABLE `admin_area`
  ADD CONSTRAINT `id_area_admin` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_journey_admin` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_admin` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_admin` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `campers`
--
ALTER TABLE `campers`
  ADD CONSTRAINT `id_journey_camper` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_level_camper` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_camper` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_camper` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_camper` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedule_software_skiils` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_trainer_camper` FOREIGN KEY (`id_trainer`) REFERENCES `trainers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `id_thematic_chapter` FOREIGN KEY (`id_thematic_units`) REFERENCES `thematic_units` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `id_region` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `contact_info`
--
ALTER TABLE `contact_info`
  ADD CONSTRAINT `id_staff` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `design_area`
--
ALTER TABLE `design_area`
  ADD CONSTRAINT `id_area_design` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_journey_design` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_design` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_design` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `id_staff_emergency` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `english_skills`
--
ALTER TABLE `english_skills`
  ADD CONSTRAINT `id_journey_english` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_english` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_english` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_teacher_english` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_english` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedules_english` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `maint_area`
--
ALTER TABLE `maint_area`
  ADD CONSTRAINT `id_journey_maint` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_maint_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_maint` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_maint` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `marketing_area`
--
ALTER TABLE `marketing_area`
  ADD CONSTRAINT `id_journey_marketing` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_marketing_area` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_marketing` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_marketing` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `id_theme_module` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `optional_topics`
--
ALTER TABLE `optional_topics`
  ADD CONSTRAINT `id_camper_optional_topics` FOREIGN KEY (`id_camper`) REFERENCES `campers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_optional_topics` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_optional_topics` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_optional_topics` FOREIGN KEY (`id_team`) REFERENCES `team_schedule_software_skiils` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_topic_optional_topics` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `psychologist`
--
ALTER TABLE `psychologist`
  ADD CONSTRAINT `id_academic_area_phychologist` FOREIGN KEY (`id_academic_area_psycologist`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_phychologist` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_phychologist` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_phychologist` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_phychologist` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `id_country` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `review_skills`
--
ALTER TABLE `review_skills`
  ADD CONSTRAINT `id_journey_review` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_review` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_review` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedules_review` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_tutor_review` FOREIGN KEY (`id_tutor`) REFERENCES `tutors` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `software_skills`
--
ALTER TABLE `software_skills`
  ADD CONSTRAINT `id_journey_skills` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_skills` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_skills` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedules_skills` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedule_software_skiils` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_trainer_skills` FOREIGN KEY (`id_trainer`) REFERENCES `trainers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `soft_skills`
--
ALTER TABLE `soft_skills`
  ADD CONSTRAINT `id_journey_soft` FOREIGN KEY (`id_journey`) REFERENCES `journey` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_location_soft` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_phychologist_soft` FOREIGN KEY (`id_psychologist`) REFERENCES `psychologist` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_subject_soft` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_schedule_soft` FOREIGN KEY (`id_team_schedule`) REFERENCES `team_schedules_soft_skils` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `id_area_staff` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_city` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `id_academic_area_teacher` FOREIGN KEY (`id_academic_area`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_position_teacher` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_teacher` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_teacher` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_teacher` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `thematic_units`
--
ALTER TABLE `thematic_units`
  ADD CONSTRAINT `id_route_thematic` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `id_chapter_themes` FOREIGN KEY (`id_chapter`) REFERENCES `chapters` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `id_module_topic` FOREIGN KEY (`id_module`) REFERENCES `modules` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `trainers`
--
ALTER TABLE `trainers`
  ADD CONSTRAINT `id_academic_area_trainer` FOREIGN KEY (`id_academic_area`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_level_trainer` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_trainer` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_route_trainer` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_trainer` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_team_educator_trainer` FOREIGN KEY (`id_team_educator`) REFERENCES `team_educators` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `id_academic_area_tutor` FOREIGN KEY (`id_academic_area`) REFERENCES `academic_area` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_position_tutor` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_tutor` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `working_info`
--
ALTER TABLE `working_info`
  ADD CONSTRAINT `id_personal_ref` FOREIGN KEY (`id_personal_ref`) REFERENCES `personal_ref` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_staff_work` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `id_work_reference` FOREIGN KEY (`id_work_reference`) REFERENCES `work_reference` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
