-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: rengganis
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `__ci_sessions`
--

DROP TABLE IF EXISTS `__ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `__ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `__ci_sessions`
--

LOCK TABLES `__ci_sessions` WRITE;
/*!40000 ALTER TABLE `__ci_sessions` DISABLE KEYS */;
INSERT INTO `__ci_sessions` VALUES ('p1j66igkvhjp2gvasedls336e5qorolj','::1',1646545180,'__ci_last_regenerate|i:1646545180;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('iafsh1oeb5dnivsgoi63l5vjlifttffn','::1',1646545540,'__ci_last_regenerate|i:1646545540;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('ct0t341kk4n60r9fr28hfv2ur6kra8el','::1',1646545858,'__ci_last_regenerate|i:1646545858;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('6ugpl44abdkjp1qni5sl89lad09rb62s','::1',1646546284,'__ci_last_regenerate|i:1646546284;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('nsodgeohjq2kp9jhpombfb04tp7gbf8k','::1',1646546626,'__ci_last_regenerate|i:1646546626;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('mss1vg7mi5dq5cnaohdia5bbt9codog0','::1',1646547023,'__ci_last_regenerate|i:1646547023;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('qpven1p98l74vmgmvdvjn6m923c6sves','::1',1646547381,'__ci_last_regenerate|i:1646547381;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('sc5cqoml1sdlm4d68tnt853p1k6msv9p','::1',1646547891,'__ci_last_regenerate|i:1646547891;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('ni2rb1guhrjle8etqsuollm348bd1i4k','::1',1646548312,'__ci_last_regenerate|i:1646548312;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('7eiu0og705qt4gb07ob01lg8qsbjkfod','::1',1646548628,'__ci_last_regenerate|i:1646548628;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('5pfe8vgq01ooar2nrqqk5t58l65pq3h4','::1',1646548963,'__ci_last_regenerate|i:1646548963;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('nn91jefg4ugtkt69sgg9irhrq6te6kom','::1',1646549287,'__ci_last_regenerate|i:1646549287;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('4l3o8tqrhj44kkitps7clu4o728drlvi','::1',1646549618,'__ci_last_regenerate|i:1646549618;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('50dkhdvbnrfko06bt2vi8f8jq6st7tl4','::1',1646550609,'__ci_last_regenerate|i:1646550609;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('5i5lor3ja3lvlpjp6fbql5jtnno77a7b','::1',1646551342,'__ci_last_regenerate|i:1646551342;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('9qjicoqcn50kd47gvn1m4ln08s680k27','::1',1646551658,'__ci_last_regenerate|i:1646551658;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('jqb9spt5jh99aotvf8ajp34nvh3vl0u7','::1',1646551766,'__ci_last_regenerate|i:1646551658;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('mcj29ejnuspql58ifiao5o06lep8jnmu','::1',1646620174,'__ci_last_regenerate|i:1646620174;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('qkprar1f7b757hq27ns67r3brfsr5ss4','::1',1646620639,'__ci_last_regenerate|i:1646620639;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('k1f5r0puubrlt22cf9h0okaftoft3t36','::1',1646621302,'__ci_last_regenerate|i:1646621302;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('rr490unppvvg6qh9ngm6rf415dh305iu','::1',1646621603,'__ci_last_regenerate|i:1646621603;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('6270pmkgcl56uuscrutq8kcadqe653k5','::1',1646623568,'__ci_last_regenerate|i:1646623568;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('kvoo8tg7ii0si3f0c3ve6g0jvje3p2l2','::1',1646624002,'__ci_last_regenerate|i:1646624002;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('l5pmbt0roni00v59ra5111lao1dea1ab','::1',1646624334,'__ci_last_regenerate|i:1646624334;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('o4mshr0aj68fv73dk6sa67s4ljc71eiq','::1',1646625802,'__ci_last_regenerate|i:1646625802;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('63acfbm8kcciigr4m46bs448liav8nat','::1',1646626155,'__ci_last_regenerate|i:1646626155;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('hfd24q0nb76usom3f5dr8ggs6fdhv4ma','::1',1646626457,'__ci_last_regenerate|i:1646626457;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('g9ila3n8cik3mfvnqc84io1cqb5p629u','::1',1646626774,'__ci_last_regenerate|i:1646626774;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('k8q29pa6vijh8rjsqi12qp6ku9pjrg88','::1',1646626882,'__ci_last_regenerate|i:1646626774;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:20:\"superadmin@admin.com\";username|s:10:\"superadmin\";password|s:32:\"17c4520f6cfd1ab53d8745e84681eb49\";fullname|N;alamat|N;phone|N;foto|N;access_token|N;allow_delete|s:1:\"0\";deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";');
/*!40000 ALTER TABLE `__ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_jabatan`
--

DROP TABLE IF EXISTS `_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `allow_delete` int(11) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_jabatan`) USING BTREE,
  UNIQUE KEY `nama` (`nama_jabatan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_jabatan`
--

LOCK TABLES `_jabatan` WRITE;
/*!40000 ALTER TABLE `_jabatan` DISABLE KEYS */;
INSERT INTO `_jabatan` VALUES (1,'superadmin',0,0),(2,'admin',1,0),(3,'kasir',1,0),(4,'sales',0,0);
/*!40000 ALTER TABLE `_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_lok_provinces`
--

DROP TABLE IF EXISTS `_lok_provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_lok_provinces` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_lok_provinces`
--

LOCK TABLES `_lok_provinces` WRITE;
/*!40000 ALTER TABLE `_lok_provinces` DISABLE KEYS */;
INSERT INTO `_lok_provinces` VALUES (11,'ACEH'),(12,'SUMATERA UTARA'),(13,'SUMATERA BARAT'),(14,'RIAU'),(15,'JAMBI'),(16,'SUMATERA SELATAN'),(17,'BENGKULU'),(18,'LAMPUNG'),(19,'KEPULAUAN BANGKA BELITUNG'),(21,'KEPULAUAN RIAU'),(31,'DKI JAKARTA'),(32,'JAWA BARAT'),(33,'JAWA TENGAH'),(34,'DI YOGYAKARTA'),(35,'JAWA TIMUR'),(36,'BANTEN'),(51,'BALI'),(52,'NUSA TENGGARA BARAT'),(53,'NUSA TENGGARA TIMUR'),(61,'KALIMANTAN BARAT'),(62,'KALIMANTAN TENGAH'),(63,'KALIMANTAN SELATAN'),(64,'KALIMANTAN TIMUR'),(65,'KALIMANTAN UTARA'),(71,'SULAWESI UTARA'),(72,'SULAWESI TENGAH'),(73,'SULAWESI SELATAN'),(74,'SULAWESI TENGGARA'),(75,'GORONTALO'),(76,'SULAWESI BARAT'),(81,'MALUKU'),(82,'MALUKU UTARA'),(91,'PAPUA BARAT'),(94,'PAPUA');
/*!40000 ALTER TABLE `_lok_provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_lok_regencies`
--

DROP TABLE IF EXISTS `_lok_regencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_lok_regencies` (
  `id` int(11) NOT NULL DEFAULT 0,
  `province_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_lok_regencies`
--

LOCK TABLES `_lok_regencies` WRITE;
/*!40000 ALTER TABLE `_lok_regencies` DISABLE KEYS */;
INSERT INTO `_lok_regencies` VALUES (1101,11,'KABUPATEN SIMEULUE'),(1102,11,'KABUPATEN ACEH SINGKIL'),(1103,11,'KABUPATEN ACEH SELATAN'),(1104,11,'KABUPATEN ACEH TENGGARA'),(1105,11,'KABUPATEN ACEH TIMUR'),(1106,11,'KABUPATEN ACEH TENGAH'),(1107,11,'KABUPATEN ACEH BARAT'),(1108,11,'KABUPATEN ACEH BESAR'),(1109,11,'KABUPATEN PIDIE'),(1110,11,'KABUPATEN BIREUEN'),(1111,11,'KABUPATEN ACEH UTARA'),(1112,11,'KABUPATEN ACEH BARAT DAYA'),(1113,11,'KABUPATEN GAYO LUES'),(1114,11,'KABUPATEN ACEH TAMIANG'),(1115,11,'KABUPATEN NAGAN RAYA'),(1116,11,'KABUPATEN ACEH JAYA'),(1117,11,'KABUPATEN BENER MERIAH'),(1118,11,'KABUPATEN PIDIE JAYA'),(1171,11,'KOTA BANDA ACEH'),(1172,11,'KOTA SABANG'),(1173,11,'KOTA LANGSA'),(1174,11,'KOTA LHOKSEUMAWE'),(1175,11,'KOTA SUBULUSSALAM'),(1201,12,'KABUPATEN NIAS'),(1202,12,'KABUPATEN MANDAILING NATAL'),(1203,12,'KABUPATEN TAPANULI SELATAN'),(1204,12,'KABUPATEN TAPANULI TENGAH'),(1205,12,'KABUPATEN TAPANULI UTARA'),(1206,12,'KABUPATEN TOBA SAMOSIR'),(1207,12,'KABUPATEN LABUHAN BATU'),(1208,12,'KABUPATEN ASAHAN'),(1209,12,'KABUPATEN SIMALUNGUN'),(1210,12,'KABUPATEN DAIRI'),(1211,12,'KABUPATEN KARO'),(1212,12,'KABUPATEN DELI SERDANG'),(1213,12,'KABUPATEN LANGKAT'),(1214,12,'KABUPATEN NIAS SELATAN'),(1215,12,'KABUPATEN HUMBANG HASUNDUTAN'),(1216,12,'KABUPATEN PAKPAK BHARAT'),(1217,12,'KABUPATEN SAMOSIR'),(1218,12,'KABUPATEN SERDANG BEDAGAI'),(1219,12,'KABUPATEN BATU BARA'),(1220,12,'KABUPATEN PADANG LAWAS UTARA'),(1221,12,'KABUPATEN PADANG LAWAS'),(1222,12,'KABUPATEN LABUHAN BATU SELATAN'),(1223,12,'KABUPATEN LABUHAN BATU UTARA'),(1224,12,'KABUPATEN NIAS UTARA'),(1225,12,'KABUPATEN NIAS BARAT'),(1271,12,'KOTA SIBOLGA'),(1272,12,'KOTA TANJUNG BALAI'),(1273,12,'KOTA PEMATANG SIANTAR'),(1274,12,'KOTA TEBING TINGGI'),(1275,12,'KOTA MEDAN'),(1276,12,'KOTA BINJAI'),(1277,12,'KOTA PADANGSIDIMPUAN'),(1278,12,'KOTA GUNUNGSITOLI'),(1301,13,'KABUPATEN KEPULAUAN MENTAWAI'),(1302,13,'KABUPATEN PESISIR SELATAN'),(1303,13,'KABUPATEN SOLOK'),(1304,13,'KABUPATEN SIJUNJUNG'),(1305,13,'KABUPATEN TANAH DATAR'),(1306,13,'KABUPATEN PADANG PARIAMAN'),(1307,13,'KABUPATEN AGAM'),(1308,13,'KABUPATEN LIMA PULUH KOTA'),(1309,13,'KABUPATEN PASAMAN'),(1310,13,'KABUPATEN SOLOK SELATAN'),(1311,13,'KABUPATEN DHARMASRAYA'),(1312,13,'KABUPATEN PASAMAN BARAT'),(1371,13,'KOTA PADANG'),(1372,13,'KOTA SOLOK'),(1373,13,'KOTA SAWAH LUNTO'),(1374,13,'KOTA PADANG PANJANG'),(1375,13,'KOTA BUKITTINGGI'),(1376,13,'KOTA PAYAKUMBUH'),(1377,13,'KOTA PARIAMAN'),(1401,14,'KABUPATEN KUANTAN SINGINGI'),(1402,14,'KABUPATEN INDRAGIRI HULU'),(1403,14,'KABUPATEN INDRAGIRI HILIR'),(1404,14,'KABUPATEN PELALAWAN'),(1405,14,'KABUPATEN S I A K'),(1406,14,'KABUPATEN KAMPAR'),(1407,14,'KABUPATEN ROKAN HULU'),(1408,14,'KABUPATEN BENGKALIS'),(1409,14,'KABUPATEN ROKAN HILIR'),(1410,14,'KABUPATEN KEPULAUAN MERANTI'),(1471,14,'KOTA PEKANBARU'),(1473,14,'KOTA D U M A I'),(1501,15,'KABUPATEN KERINCI'),(1502,15,'KABUPATEN MERANGIN'),(1503,15,'KABUPATEN SAROLANGUN'),(1504,15,'KABUPATEN BATANG HARI'),(1505,15,'KABUPATEN MUARO JAMBI'),(1506,15,'KABUPATEN TANJUNG JABUNG TIMUR'),(1507,15,'KABUPATEN TANJUNG JABUNG BARAT'),(1508,15,'KABUPATEN TEBO'),(1509,15,'KABUPATEN BUNGO'),(1571,15,'KOTA JAMBI'),(1572,15,'KOTA SUNGAI PENUH'),(1601,16,'KABUPATEN OGAN KOMERING ULU'),(1602,16,'KABUPATEN OGAN KOMERING ILIR'),(1603,16,'KABUPATEN MUARA ENIM'),(1604,16,'KABUPATEN LAHAT'),(1605,16,'KABUPATEN MUSI RAWAS'),(1606,16,'KABUPATEN MUSI BANYUASIN'),(1607,16,'KABUPATEN BANYU ASIN'),(1608,16,'KABUPATEN OGAN KOMERING ULU SELATAN'),(1609,16,'KABUPATEN OGAN KOMERING ULU TIMUR'),(1610,16,'KABUPATEN OGAN ILIR'),(1611,16,'KABUPATEN EMPAT LAWANG'),(1612,16,'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),(1613,16,'KABUPATEN MUSI RAWAS UTARA'),(1671,16,'KOTA PALEMBANG'),(1672,16,'KOTA PRABUMULIH'),(1673,16,'KOTA PAGAR ALAM'),(1674,16,'KOTA LUBUKLINGGAU'),(1701,17,'KABUPATEN BENGKULU SELATAN'),(1702,17,'KABUPATEN REJANG LEBONG'),(1703,17,'KABUPATEN BENGKULU UTARA'),(1704,17,'KABUPATEN KAUR'),(1705,17,'KABUPATEN SELUMA'),(1706,17,'KABUPATEN MUKOMUKO'),(1707,17,'KABUPATEN LEBONG'),(1708,17,'KABUPATEN KEPAHIANG'),(1709,17,'KABUPATEN BENGKULU TENGAH'),(1771,17,'KOTA BENGKULU'),(1801,18,'KABUPATEN LAMPUNG BARAT'),(1802,18,'KABUPATEN TANGGAMUS'),(1803,18,'KABUPATEN LAMPUNG SELATAN'),(1804,18,'KABUPATEN LAMPUNG TIMUR'),(1805,18,'KABUPATEN LAMPUNG TENGAH'),(1806,18,'KABUPATEN LAMPUNG UTARA'),(1807,18,'KABUPATEN WAY KANAN'),(1808,18,'KABUPATEN TULANGBAWANG'),(1809,18,'KABUPATEN PESAWARAN'),(1810,18,'KABUPATEN PRINGSEWU'),(1811,18,'KABUPATEN MESUJI'),(1812,18,'KABUPATEN TULANG BAWANG BARAT'),(1813,18,'KABUPATEN PESISIR BARAT'),(1871,18,'KOTA BANDAR LAMPUNG'),(1872,18,'KOTA METRO'),(1901,19,'KABUPATEN BANGKA'),(1902,19,'KABUPATEN BELITUNG'),(1903,19,'KABUPATEN BANGKA BARAT'),(1904,19,'KABUPATEN BANGKA TENGAH'),(1905,19,'KABUPATEN BANGKA SELATAN'),(1906,19,'KABUPATEN BELITUNG TIMUR'),(1971,19,'KOTA PANGKAL PINANG'),(2101,21,'KABUPATEN KARIMUN'),(2102,21,'KABUPATEN BINTAN'),(2103,21,'KABUPATEN NATUNA'),(2104,21,'KABUPATEN LINGGA'),(2105,21,'KABUPATEN KEPULAUAN ANAMBAS'),(2171,21,'KOTA B A T A M'),(2172,21,'KOTA TANJUNG PINANG'),(3101,31,'KABUPATEN KEPULAUAN SERIBU'),(3171,31,'KOTA JAKARTA SELATAN'),(3172,31,'KOTA JAKARTA TIMUR'),(3173,31,'KOTA JAKARTA PUSAT'),(3174,31,'KOTA JAKARTA BARAT'),(3175,31,'KOTA JAKARTA UTARA'),(3201,32,'KABUPATEN BOGOR'),(3202,32,'KABUPATEN SUKABUMI'),(3203,32,'KABUPATEN CIANJUR'),(3204,32,'KABUPATEN BANDUNG'),(3205,32,'KABUPATEN GARUT'),(3206,32,'KABUPATEN TASIKMALAYA'),(3207,32,'KABUPATEN CIAMIS'),(3208,32,'KABUPATEN KUNINGAN'),(3209,32,'KABUPATEN CIREBON'),(3210,32,'KABUPATEN MAJALENGKA'),(3211,32,'KABUPATEN SUMEDANG'),(3212,32,'KABUPATEN INDRAMAYU'),(3213,32,'KABUPATEN SUBANG'),(3214,32,'KABUPATEN PURWAKARTA'),(3215,32,'KABUPATEN KARAWANG'),(3216,32,'KABUPATEN BEKASI'),(3217,32,'KABUPATEN BANDUNG BARAT'),(3218,32,'KABUPATEN PANGANDARAN'),(3271,32,'KOTA BOGOR'),(3272,32,'KOTA SUKABUMI'),(3273,32,'KOTA BANDUNG'),(3274,32,'KOTA CIREBON'),(3275,32,'KOTA BEKASI'),(3276,32,'KOTA DEPOK'),(3277,32,'KOTA CIMAHI'),(3278,32,'KOTA TASIKMALAYA'),(3279,32,'KOTA BANJAR'),(3301,33,'KABUPATEN CILACAP'),(3302,33,'KABUPATEN BANYUMAS'),(3303,33,'KABUPATEN PURBALINGGA'),(3304,33,'KABUPATEN BANJARNEGARA'),(3305,33,'KABUPATEN KEBUMEN'),(3306,33,'KABUPATEN PURWOREJO'),(3307,33,'KABUPATEN WONOSOBO'),(3308,33,'KABUPATEN MAGELANG'),(3309,33,'KABUPATEN BOYOLALI'),(3310,33,'KABUPATEN KLATEN'),(3311,33,'KABUPATEN SUKOHARJO'),(3312,33,'KABUPATEN WONOGIRI'),(3313,33,'KABUPATEN KARANGANYAR'),(3314,33,'KABUPATEN SRAGEN'),(3315,33,'KABUPATEN GROBOGAN'),(3316,33,'KABUPATEN BLORA'),(3317,33,'KABUPATEN REMBANG'),(3318,33,'KABUPATEN PATI'),(3319,33,'KABUPATEN KUDUS'),(3320,33,'KABUPATEN JEPARA'),(3321,33,'KABUPATEN DEMAK'),(3322,33,'KABUPATEN SEMARANG'),(3323,33,'KABUPATEN TEMANGGUNG'),(3324,33,'KABUPATEN KENDAL'),(3325,33,'KABUPATEN BATANG'),(3326,33,'KABUPATEN PEKALONGAN'),(3327,33,'KABUPATEN PEMALANG'),(3328,33,'KABUPATEN TEGAL'),(3329,33,'KABUPATEN BREBES'),(3371,33,'KOTA MAGELANG'),(3372,33,'KOTA SURAKARTA'),(3373,33,'KOTA SALATIGA'),(3374,33,'KOTA SEMARANG'),(3375,33,'KOTA PEKALONGAN'),(3376,33,'KOTA TEGAL'),(3401,34,'KABUPATEN KULON PROGO'),(3402,34,'KABUPATEN BANTUL'),(3403,34,'KABUPATEN GUNUNG KIDUL'),(3404,34,'KABUPATEN SLEMAN'),(3471,34,'KOTA YOGYAKARTA'),(3501,35,'KABUPATEN PACITAN'),(3502,35,'KABUPATEN PONOROGO'),(3503,35,'KABUPATEN TRENGGALEK'),(3504,35,'KABUPATEN TULUNGAGUNG'),(3505,35,'KABUPATEN BLITAR'),(3506,35,'KABUPATEN KEDIRI'),(3507,35,'KABUPATEN MALANG'),(3508,35,'KABUPATEN LUMAJANG'),(3509,35,'KABUPATEN JEMBER'),(3510,35,'KABUPATEN BANYUWANGI'),(3511,35,'KABUPATEN BONDOWOSO'),(3512,35,'KABUPATEN SITUBONDO'),(3513,35,'KABUPATEN PROBOLINGGO'),(3514,35,'KABUPATEN PASURUAN'),(3515,35,'KABUPATEN SIDOARJO'),(3516,35,'KABUPATEN MOJOKERTO'),(3517,35,'KABUPATEN JOMBANG'),(3518,35,'KABUPATEN NGANJUK'),(3519,35,'KABUPATEN MADIUN'),(3520,35,'KABUPATEN MAGETAN'),(3521,35,'KABUPATEN NGAWI'),(3522,35,'KABUPATEN BOJONEGORO'),(3523,35,'KABUPATEN TUBAN'),(3524,35,'KABUPATEN LAMONGAN'),(3525,35,'KABUPATEN GRESIK'),(3526,35,'KABUPATEN BANGKALAN'),(3527,35,'KABUPATEN SAMPANG'),(3528,35,'KABUPATEN PAMEKASAN'),(3529,35,'KABUPATEN SUMENEP'),(3571,35,'KOTA KEDIRI'),(3572,35,'KOTA BLITAR'),(3573,35,'KOTA MALANG'),(3574,35,'KOTA PROBOLINGGO'),(3575,35,'KOTA PASURUAN'),(3576,35,'KOTA MOJOKERTO'),(3577,35,'KOTA MADIUN'),(3578,35,'KOTA SURABAYA'),(3579,35,'KOTA BATU'),(3601,36,'KABUPATEN PANDEGLANG'),(3602,36,'KABUPATEN LEBAK'),(3603,36,'KABUPATEN TANGERANG'),(3604,36,'KABUPATEN SERANG'),(3671,36,'KOTA TANGERANG'),(3672,36,'KOTA CILEGON'),(3673,36,'KOTA SERANG'),(3674,36,'KOTA TANGERANG SELATAN'),(5101,51,'KABUPATEN JEMBRANA'),(5102,51,'KABUPATEN TABANAN'),(5103,51,'KABUPATEN BADUNG'),(5104,51,'KABUPATEN GIANYAR'),(5105,51,'KABUPATEN KLUNGKUNG'),(5106,51,'KABUPATEN BANGLI'),(5107,51,'KABUPATEN KARANG ASEM'),(5108,51,'KABUPATEN BULELENG'),(5171,51,'KOTA DENPASAR'),(5201,52,'KABUPATEN LOMBOK BARAT'),(5202,52,'KABUPATEN LOMBOK TENGAH'),(5203,52,'KABUPATEN LOMBOK TIMUR'),(5204,52,'KABUPATEN SUMBAWA'),(5205,52,'KABUPATEN DOMPU'),(5206,52,'KABUPATEN BIMA'),(5207,52,'KABUPATEN SUMBAWA BARAT'),(5208,52,'KABUPATEN LOMBOK UTARA'),(5271,52,'KOTA MATARAM'),(5272,52,'KOTA BIMA'),(5301,53,'KABUPATEN SUMBA BARAT'),(5302,53,'KABUPATEN SUMBA TIMUR'),(5303,53,'KABUPATEN KUPANG'),(5304,53,'KABUPATEN TIMOR TENGAH SELATAN'),(5305,53,'KABUPATEN TIMOR TENGAH UTARA'),(5306,53,'KABUPATEN BELU'),(5307,53,'KABUPATEN ALOR'),(5308,53,'KABUPATEN LEMBATA'),(5309,53,'KABUPATEN FLORES TIMUR'),(5310,53,'KABUPATEN SIKKA'),(5311,53,'KABUPATEN ENDE'),(5312,53,'KABUPATEN NGADA'),(5313,53,'KABUPATEN MANGGARAI'),(5314,53,'KABUPATEN ROTE NDAO'),(5315,53,'KABUPATEN MANGGARAI BARAT'),(5316,53,'KABUPATEN SUMBA TENGAH'),(5317,53,'KABUPATEN SUMBA BARAT DAYA'),(5318,53,'KABUPATEN NAGEKEO'),(5319,53,'KABUPATEN MANGGARAI TIMUR'),(5320,53,'KABUPATEN SABU RAIJUA'),(5321,53,'KABUPATEN MALAKA'),(5371,53,'KOTA KUPANG'),(6101,61,'KABUPATEN SAMBAS'),(6102,61,'KABUPATEN BENGKAYANG'),(6103,61,'KABUPATEN LANDAK'),(6104,61,'KABUPATEN MEMPAWAH'),(6105,61,'KABUPATEN SANGGAU'),(6106,61,'KABUPATEN KETAPANG'),(6107,61,'KABUPATEN SINTANG'),(6108,61,'KABUPATEN KAPUAS HULU'),(6109,61,'KABUPATEN SEKADAU'),(6110,61,'KABUPATEN MELAWI'),(6111,61,'KABUPATEN KAYONG UTARA'),(6112,61,'KABUPATEN KUBU RAYA'),(6171,61,'KOTA PONTIANAK'),(6172,61,'KOTA SINGKAWANG'),(6201,62,'KABUPATEN KOTAWARINGIN BARAT'),(6202,62,'KABUPATEN KOTAWARINGIN TIMUR'),(6203,62,'KABUPATEN KAPUAS'),(6204,62,'KABUPATEN BARITO SELATAN'),(6205,62,'KABUPATEN BARITO UTARA'),(6206,62,'KABUPATEN SUKAMARA'),(6207,62,'KABUPATEN LAMANDAU'),(6208,62,'KABUPATEN SERUYAN'),(6209,62,'KABUPATEN KATINGAN'),(6210,62,'KABUPATEN PULANG PISAU'),(6211,62,'KABUPATEN GUNUNG MAS'),(6212,62,'KABUPATEN BARITO TIMUR'),(6213,62,'KABUPATEN MURUNG RAYA'),(6271,62,'KOTA PALANGKA RAYA'),(6301,63,'KABUPATEN TANAH LAUT'),(6302,63,'KABUPATEN KOTA BARU'),(6303,63,'KABUPATEN BANJAR'),(6304,63,'KABUPATEN BARITO KUALA'),(6305,63,'KABUPATEN TAPIN'),(6306,63,'KABUPATEN HULU SUNGAI SELATAN'),(6307,63,'KABUPATEN HULU SUNGAI TENGAH'),(6308,63,'KABUPATEN HULU SUNGAI UTARA'),(6309,63,'KABUPATEN TABALONG'),(6310,63,'KABUPATEN TANAH BUMBU'),(6311,63,'KABUPATEN BALANGAN'),(6371,63,'KOTA BANJARMASIN'),(6372,63,'KOTA BANJAR BARU'),(6401,64,'KABUPATEN PASER'),(6402,64,'KABUPATEN KUTAI BARAT'),(6403,64,'KABUPATEN KUTAI KARTANEGARA'),(6404,64,'KABUPATEN KUTAI TIMUR'),(6405,64,'KABUPATEN BERAU'),(6409,64,'KABUPATEN PENAJAM PASER UTARA'),(6411,64,'KABUPATEN MAHAKAM HULU'),(6471,64,'KOTA BALIKPAPAN'),(6472,64,'KOTA SAMARINDA'),(6474,64,'KOTA BONTANG'),(6501,65,'KABUPATEN MALINAU'),(6502,65,'KABUPATEN BULUNGAN'),(6503,65,'KABUPATEN TANA TIDUNG'),(6504,65,'KABUPATEN NUNUKAN'),(6571,65,'KOTA TARAKAN'),(7101,71,'KABUPATEN BOLAANG MONGONDOW'),(7102,71,'KABUPATEN MINAHASA'),(7103,71,'KABUPATEN KEPULAUAN SANGIHE'),(7104,71,'KABUPATEN KEPULAUAN TALAUD'),(7105,71,'KABUPATEN MINAHASA SELATAN'),(7106,71,'KABUPATEN MINAHASA UTARA'),(7107,71,'KABUPATEN BOLAANG MONGONDOW UTARA'),(7108,71,'KABUPATEN SIAU TAGULANDANG BIARO'),(7109,71,'KABUPATEN MINAHASA TENGGARA'),(7110,71,'KABUPATEN BOLAANG MONGONDOW SELATAN'),(7111,71,'KABUPATEN BOLAANG MONGONDOW TIMUR'),(7171,71,'KOTA MANADO'),(7172,71,'KOTA BITUNG'),(7173,71,'KOTA TOMOHON'),(7174,71,'KOTA KOTAMOBAGU'),(7201,72,'KABUPATEN BANGGAI KEPULAUAN'),(7202,72,'KABUPATEN BANGGAI'),(7203,72,'KABUPATEN MOROWALI'),(7204,72,'KABUPATEN POSO'),(7205,72,'KABUPATEN DONGGALA'),(7206,72,'KABUPATEN TOLI-TOLI'),(7207,72,'KABUPATEN BUOL'),(7208,72,'KABUPATEN PARIGI MOUTONG'),(7209,72,'KABUPATEN TOJO UNA-UNA'),(7210,72,'KABUPATEN SIGI'),(7211,72,'KABUPATEN BANGGAI LAUT'),(7212,72,'KABUPATEN MOROWALI UTARA'),(7271,72,'KOTA PALU'),(7301,73,'KABUPATEN KEPULAUAN SELAYAR'),(7302,73,'KABUPATEN BULUKUMBA'),(7303,73,'KABUPATEN BANTAENG'),(7304,73,'KABUPATEN JENEPONTO'),(7305,73,'KABUPATEN TAKALAR'),(7306,73,'KABUPATEN GOWA'),(7307,73,'KABUPATEN SINJAI'),(7308,73,'KABUPATEN MAROS'),(7309,73,'KABUPATEN PANGKAJENE DAN KEPULAUAN'),(7310,73,'KABUPATEN BARRU'),(7311,73,'KABUPATEN BONE'),(7312,73,'KABUPATEN SOPPENG'),(7313,73,'KABUPATEN WAJO'),(7314,73,'KABUPATEN SIDENRENG RAPPANG'),(7315,73,'KABUPATEN PINRANG'),(7316,73,'KABUPATEN ENREKANG'),(7317,73,'KABUPATEN LUWU'),(7318,73,'KABUPATEN TANA TORAJA'),(7322,73,'KABUPATEN LUWU UTARA'),(7325,73,'KABUPATEN LUWU TIMUR'),(7326,73,'KABUPATEN TORAJA UTARA'),(7371,73,'KOTA MAKASSAR'),(7372,73,'KOTA PAREPARE'),(7373,73,'KOTA PALOPO'),(7401,74,'KABUPATEN BUTON'),(7402,74,'KABUPATEN MUNA'),(7403,74,'KABUPATEN KONAWE'),(7404,74,'KABUPATEN KOLAKA'),(7405,74,'KABUPATEN KONAWE SELATAN'),(7406,74,'KABUPATEN BOMBANA'),(7407,74,'KABUPATEN WAKATOBI'),(7408,74,'KABUPATEN KOLAKA UTARA'),(7409,74,'KABUPATEN BUTON UTARA'),(7410,74,'KABUPATEN KONAWE UTARA'),(7411,74,'KABUPATEN KOLAKA TIMUR'),(7412,74,'KABUPATEN KONAWE KEPULAUAN'),(7413,74,'KABUPATEN MUNA BARAT'),(7414,74,'KABUPATEN BUTON TENGAH'),(7415,74,'KABUPATEN BUTON SELATAN'),(7471,74,'KOTA KENDARI'),(7472,74,'KOTA BAUBAU'),(7501,75,'KABUPATEN BOALEMO'),(7502,75,'KABUPATEN GORONTALO'),(7503,75,'KABUPATEN POHUWATO'),(7504,75,'KABUPATEN BONE BOLANGO'),(7505,75,'KABUPATEN GORONTALO UTARA'),(7571,75,'KOTA GORONTALO'),(7601,76,'KABUPATEN MAJENE'),(7602,76,'KABUPATEN POLEWALI MANDAR'),(7603,76,'KABUPATEN MAMASA'),(7604,76,'KABUPATEN MAMUJU'),(7605,76,'KABUPATEN MAMUJU UTARA'),(7606,76,'KABUPATEN MAMUJU TENGAH'),(8101,81,'KABUPATEN MALUKU TENGGARA BARAT'),(8102,81,'KABUPATEN MALUKU TENGGARA'),(8103,81,'KABUPATEN MALUKU TENGAH'),(8104,81,'KABUPATEN BURU'),(8105,81,'KABUPATEN KEPULAUAN ARU'),(8106,81,'KABUPATEN SERAM BAGIAN BARAT'),(8107,81,'KABUPATEN SERAM BAGIAN TIMUR'),(8108,81,'KABUPATEN MALUKU BARAT DAYA'),(8109,81,'KABUPATEN BURU SELATAN'),(8171,81,'KOTA AMBON'),(8172,81,'KOTA TUAL'),(8201,82,'KABUPATEN HALMAHERA BARAT'),(8202,82,'KABUPATEN HALMAHERA TENGAH'),(8203,82,'KABUPATEN KEPULAUAN SULA'),(8204,82,'KABUPATEN HALMAHERA SELATAN'),(8205,82,'KABUPATEN HALMAHERA UTARA'),(8206,82,'KABUPATEN HALMAHERA TIMUR'),(8207,82,'KABUPATEN PULAU MOROTAI'),(8208,82,'KABUPATEN PULAU TALIABU'),(8271,82,'KOTA TERNATE'),(8272,82,'KOTA TIDORE KEPULAUAN'),(9101,91,'KABUPATEN FAKFAK'),(9102,91,'KABUPATEN KAIMANA'),(9103,91,'KABUPATEN TELUK WONDAMA'),(9104,91,'KABUPATEN TELUK BINTUNI'),(9105,91,'KABUPATEN MANOKWARI'),(9106,91,'KABUPATEN SORONG SELATAN'),(9107,91,'KABUPATEN SORONG'),(9108,91,'KABUPATEN RAJA AMPAT'),(9109,91,'KABUPATEN TAMBRAUW'),(9110,91,'KABUPATEN MAYBRAT'),(9111,91,'KABUPATEN MANOKWARI SELATAN'),(9112,91,'KABUPATEN PEGUNUNGAN ARFAK'),(9171,91,'KOTA SORONG'),(9401,94,'KABUPATEN MERAUKE'),(9402,94,'KABUPATEN JAYAWIJAYA'),(9403,94,'KABUPATEN JAYAPURA'),(9404,94,'KABUPATEN NABIRE'),(9408,94,'KABUPATEN KEPULAUAN YAPEN'),(9409,94,'KABUPATEN BIAK NUMFOR'),(9410,94,'KABUPATEN PANIAI'),(9411,94,'KABUPATEN PUNCAK JAYA'),(9412,94,'KABUPATEN MIMIKA'),(9413,94,'KABUPATEN BOVEN DIGOEL'),(9414,94,'KABUPATEN MAPPI'),(9415,94,'KABUPATEN ASMAT'),(9416,94,'KABUPATEN YAHUKIMO'),(9417,94,'KABUPATEN PEGUNUNGAN BINTANG'),(9418,94,'KABUPATEN TOLIKARA'),(9419,94,'KABUPATEN SARMI'),(9420,94,'KABUPATEN KEEROM'),(9426,94,'KABUPATEN WAROPEN'),(9427,94,'KABUPATEN SUPIORI'),(9428,94,'KABUPATEN MAMBERAMO RAYA'),(9429,94,'KABUPATEN NDUGA'),(9430,94,'KABUPATEN LANNY JAYA'),(9431,94,'KABUPATEN MAMBERAMO TENGAH'),(9432,94,'KABUPATEN YALIMO'),(9433,94,'KABUPATEN PUNCAK'),(9434,94,'KABUPATEN DOGIYAI'),(9435,94,'KABUPATEN INTAN JAYA'),(9436,94,'KABUPATEN DEIYAI'),(9471,94,'KOTA JAYAPURA');
/*!40000 ALTER TABLE `_lok_regencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_user`
--

DROP TABLE IF EXISTS `_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `allow_delete` int(11) DEFAULT 1,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_user`
--

LOCK TABLES `_user` WRITE;
/*!40000 ALTER TABLE `_user` DISABLE KEYS */;
INSERT INTO `_user` VALUES (1,1,'superadmin@admin.com','superadmin','17c4520f6cfd1ab53d8745e84681eb49',NULL,NULL,NULL,NULL,NULL,NULL,0,0),(2,2,'admin2@admin.com','admin2','c84258e9c39059a89ab77d846ddab909',NULL,NULL,NULL,NULL,NULL,NULL,1,0),(3,3,'kasir@admin.com','kasir','c7911af3adbd12a035b289556d96470a',NULL,NULL,NULL,NULL,NULL,NULL,1,0),(5,2,'sample_user@mail.com','sample_user','5ebbc37e034d6874a2af59eb04beaa52','sample user',NULL,'<p>fsdfsdfsdf</p>',NULL,'16367441.jpg',NULL,1,0),(6,2,'withphoneuserq123123123@mail.com','withphoneuser123','4bc059b6b7cd5a500d46c46633e200c3','asdasdasdasd',NULL,'','123123297348237','',NULL,1,0),(9,4,'sales_jember@mail.com','sales_jember','175ba1cf7fec849341b991d297b6f5eb','sales_jember',3509,'','2342342342','',NULL,1,0);
/*!40000 ALTER TABLE `_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_kas`
--

DROP TABLE IF EXISTS `buku_kas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku_kas` (
  `id_buku_kas` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku_kas_rekening` int(11) NOT NULL,
  `id_buku_kas_jenis_trans` int(11) DEFAULT NULL COMMENT 'pembelian,\r\npembelian retur,\r\npenjualan\r\npenjualan retur',
  `jenis_trans_tabel_id` int(11) DEFAULT NULL COMMENT 'primary key dari tabel dibawah\r\n\r\npembelian,\r\npembelian retur,\r\npenjualan\r\npenjualan retur',
  `nomor` varchar(50) NOT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  `pemasukan` bigint(20) DEFAULT NULL,
  `pengeluaran` bigint(20) DEFAULT NULL,
  `penyesuaian` bigint(20) DEFAULT NULL,
  `saldo_akhir` bigint(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_buku_kas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_kas`
--

LOCK TABLES `buku_kas` WRITE;
/*!40000 ALTER TABLE `buku_kas` DISABLE KEYS */;
/*!40000 ALTER TABLE `buku_kas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_kas_jenis_trans`
--

DROP TABLE IF EXISTS `buku_kas_jenis_trans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku_kas_jenis_trans` (
  `id_buku_kas_jenis_trans` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_trans_nama` varchar(50) DEFAULT NULL,
  `jenis_trans_nama_label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_buku_kas_jenis_trans`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_kas_jenis_trans`
--

LOCK TABLES `buku_kas_jenis_trans` WRITE;
/*!40000 ALTER TABLE `buku_kas_jenis_trans` DISABLE KEYS */;
INSERT INTO `buku_kas_jenis_trans` VALUES (1,'pembelian','pembelian'),(2,'pembelian_retur','retur pembelian'),(3,'penjualan','penjualan'),(4,'penjualan_retur','retur penjualan');
/*!40000 ALTER TABLE `buku_kas_jenis_trans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_kas_rekening`
--

DROP TABLE IF EXISTS `buku_kas_rekening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku_kas_rekening` (
  `id_buku_kas_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rekening` varchar(50) DEFAULT NULL,
  `nomor_rekening` varchar(50) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id_buku_kas_rekening`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_kas_rekening`
--

LOCK TABLES `buku_kas_rekening` WRITE;
/*!40000 ALTER TABLE `buku_kas_rekening` DISABLE KEYS */;
/*!40000 ALTER TABLE `buku_kas_rekening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudang`
--

DROP TABLE IF EXISTS `gudang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(50) DEFAULT NULL,
  `kota` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `is_sales` int(11) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `allow_delete` int(11) DEFAULT 1,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id_gudang`),
  UNIQUE KEY `nama_gudang` (`nama_gudang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudang`
--

LOCK TABLES `gudang` WRITE;
/*!40000 ALTER TABLE `gudang` DISABLE KEYS */;
INSERT INTO `gudang` VALUES (1,'Gudang Default',3509,'0336-721000',NULL,0,NULL,0,0),(3,'sales_jember',3509,'2342342342','',1,9,1,0);
/*!40000 ALTER TABLE `gudang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `item_nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_jenis`
--

DROP TABLE IF EXISTS `item_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_jenis` (
  `id_item_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `item_jenis_nama` varchar(50) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id_item_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_jenis`
--

LOCK TABLES `item_jenis` WRITE;
/*!40000 ALTER TABLE `item_jenis` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_rel_item_jenis`
--

DROP TABLE IF EXISTS `item_rel_item_jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_rel_item_jenis` (
  `id_item_rel_item_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) DEFAULT NULL,
  `id_item_jenis` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_item_rel_item_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_rel_item_jenis`
--

LOCK TABLES `item_rel_item_jenis` WRITE;
/*!40000 ALTER TABLE `item_rel_item_jenis` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_rel_item_jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `jenis_kontak` enum('supplier','customer') NOT NULL,
  `telphone_kantor` varchar(50) DEFAULT '',
  `whatsapp` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `kota` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT '',
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (1,'tukiman','supplier','45345345345','45345345345','supplier@mail.com',3509,'asdasdasd',0),(2,'customer','customer','467567567567','789789789789','supplierlumajang@mail.com',3508,'<p>m,m,m,gmhlfglhlfgh</p>',0);
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_pembelian` varchar(50) DEFAULT NULL,
  `tanggal_pembelian` timestamp NULL DEFAULT current_timestamp(),
  `id_kontak` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `ppn` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian_detil`
--

DROP TABLE IF EXISTS `pembelian_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian_detil` (
  `id_pembelian` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian_detil`
--

LOCK TABLES `pembelian_detil` WRITE;
/*!40000 ALTER TABLE `pembelian_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembelian_detil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian_retur`
--

DROP TABLE IF EXISTS `pembelian_retur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian_retur` (
  `id_pembelian_retur` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_pembelian_retur` varchar(50) DEFAULT NULL,
  `tanggal_pembelian_retur` timestamp NULL DEFAULT current_timestamp(),
  `id_kontak` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `ppn` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_pembelian_retur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian_retur`
--

LOCK TABLES `pembelian_retur` WRITE;
/*!40000 ALTER TABLE `pembelian_retur` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembelian_retur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian_retur_detil`
--

DROP TABLE IF EXISTS `pembelian_retur_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian_retur_detil` (
  `id_pembelian_retur` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian_retur_detil`
--

LOCK TABLES `pembelian_retur_detil` WRITE;
/*!40000 ALTER TABLE `pembelian_retur_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembelian_retur_detil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_penjualan` varchar(50) DEFAULT NULL,
  `tanggal_penjualan` timestamp NULL DEFAULT current_timestamp(),
  `id_kontak` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `ppn` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan_detil`
--

DROP TABLE IF EXISTS `penjualan_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan_detil` (
  `id_penjualan` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan_detil`
--

LOCK TABLES `penjualan_detil` WRITE;
/*!40000 ALTER TABLE `penjualan_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan_detil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan_retur`
--

DROP TABLE IF EXISTS `penjualan_retur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan_retur` (
  `id_penjualan_retur` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_penjualan_retur` varchar(50) DEFAULT NULL,
  `tanggal_penjualan_retur` timestamp NULL DEFAULT current_timestamp(),
  `id_kontak` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `ppn` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_penjualan_retur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan_retur`
--

LOCK TABLES `penjualan_retur` WRITE;
/*!40000 ALTER TABLE `penjualan_retur` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan_retur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan_retur_detil`
--

DROP TABLE IF EXISTS `penjualan_retur_detil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan_retur_detil` (
  `id_penjualan_retur` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `disc` int(11) DEFAULT NULL COMMENT 'persen',
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan_retur_detil`
--

LOCK TABLES `penjualan_retur_detil` WRITE;
/*!40000 ALTER TABLE `penjualan_retur_detil` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan_retur_detil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok`
--

DROP TABLE IF EXISTS `stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stok` (
  `id_stok` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_gudang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_item` int(11) NOT NULL,
  `qty_in` int(11) DEFAULT NULL,
  `qty_out` int(11) DEFAULT NULL,
  `qty_adj` int(11) DEFAULT NULL,
  `qty_end` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan_def` enum('HILANG','RUSAK','KETEMU','DIGANTI') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'rengganis'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-07 11:23:45
