/*
Navicat MySQL Data Transfer

Source Server         : Myconection
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : prueba

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-05-02 17:47:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for colores
-- ----------------------------
DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colores
-- ----------------------------
INSERT INTO `colores` VALUES ('1', 'warning', 'este es un color naranja', '\0');
INSERT INTO `colores` VALUES ('2', 'danger', 'este es un color rojo', '');
INSERT INTO `colores` VALUES ('3', 'primary', 'este es un color azul', '\0');
INSERT INTO `colores` VALUES ('4', 'success', 'este es un color verde', '\0');
INSERT INTO `colores` VALUES ('5', 'dark', 'este es un color negro', '\0');
INSERT INTO `colores` VALUES ('6', 'success', 'este es un color verde', '');
INSERT INTO `colores` VALUES ('7', 'dark', 'este es un color negro', '');
INSERT INTO `colores` VALUES ('8', 'warning', 'este es un color naranja', '');
INSERT INTO `colores` VALUES ('9', 'primary', 'este es un color azul', '');

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `estatura` decimal(8,2) DEFAULT NULL,
  `peso` decimal(8,2) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES ('1', 'Franco Lisboa Abad', 'piura', '99899899', '47318311', '1.65', '70.00', '\0');
INSERT INTO `personas` VALUES ('2', 'Jose alvarado', 'sullana', '87777777', '81281821', '1.60', '78.00', '');
INSERT INTO `personas` VALUES ('3', 'Velasquez Juan alberto', 'sechura', '128128', '812812', '1.70', '90.00', '');
INSERT INTO `personas` VALUES ('4', 'jorge coello', 'talara', '1821728', '127172', '1.68', '98.00', '');
INSERT INTO `personas` VALUES ('5', 'david lisboa', 'piura', '7127172', '812812', '1.68', '70.00', '');
INSERT INTO `personas` VALUES ('6', 'jean corrales', 'san ramon', '9128812', '8127172', '1.70', '120.00', '\0');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'franklisboaabad', '$2y$10$OqYcrSQ4s3t53qe8EdYEnuAO7aQJ/4j4Hpq6KmdBQDOO4Tj/9A7oO', '');
INSERT INTO `usuario` VALUES ('2', 'davidlisboaabad', '$2y$10$lh.ijWVa6iQe8d5U6YaPKuNYRd55is6F2Sq1pS/0.qtbYY.rsv2nK', '');
INSERT INTO `usuario` VALUES ('3', 'franklisboaabad123', '$2y$10$THP7kOZ/2QQq7fwPvuDt2eqRB8lN5leXdhl0kO4nD5f.Ob1zp0Q9G', '');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'carlos', 'piura', '989898989', 'ideas@gmail.com', '');
INSERT INTO `usuarios` VALUES ('2', 'Frank lisboa Abad', 'Piura', '934543245', 'franklisboaabad@gmail.com', '');
INSERT INTO `usuarios` VALUES ('3', 'deibis aguila calle', 'el indio', '91821828', 'deibisac@gmail.com', '');
