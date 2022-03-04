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
INSERT INTO `__ci_sessions` VALUES ('k5uh5o0m3ou3hbkql24dsdgufpb8uoql','::1',1645942061,'id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";__ci_last_regenerate|i:1645941906;'),('22qp4f3c3jf6fq7j5gofkrn9b5i7h20v','::1',1645954168,'__ci_last_regenerate|i:1645954167;error_message|s:21:\"Maaf Anda Belum Login\";__ci_vars|a:1:{s:13:\"error_message\";s:3:\"old\";}'),('pnrultgp9u6rp4b8cuieldjqute6ljeg','::1',1645954490,'__ci_last_regenerate|i:1645954490;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('pgek66aeu0brvu25rsfsucrgqm0ihee8','::1',1645954847,'__ci_last_regenerate|i:1645954847;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('nnbe9l2vvcp3v7pr77f6h3vejvqe5n8k','::1',1645955154,'__ci_last_regenerate|i:1645955154;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('31l78q4od232ku51psfb9si96ljs6d72','::1',1645955456,'__ci_last_regenerate|i:1645955456;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('i7c3dpfd22nopj8e07g9rfjvedvveodk','::1',1645955818,'__ci_last_regenerate|i:1645955818;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('mm52jputvshp2r599r7nfgrb338mfefr','::1',1645956263,'__ci_last_regenerate|i:1645956263;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('4lc39ne7k8fpakvlevasgt3vm903nv72','::1',1645956987,'__ci_last_regenerate|i:1645956987;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('hnuicgspjvf2sl02390o6rkbmm3gvjoc','::1',1645957613,'__ci_last_regenerate|i:1645957613;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('fiecetn1qir1to70qchi6n2cch9ah666','::1',1645957924,'__ci_last_regenerate|i:1645957924;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('sabhj9emnbldjjcfj0nado6nn6cg3a6s','::1',1645958280,'__ci_last_regenerate|i:1645958280;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('6f2avje2cb97srkdr7b7roravglc4ls4','::1',1645958300,'__ci_last_regenerate|i:1645958280;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('i971jdoidanudmt2626lecun1pmg0nmm','::1',1646270686,'__ci_last_regenerate|i:1646270686;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('s8qfa3rv13m6qj4m2gappp6tq1gmi5f8','::1',1646271210,'__ci_last_regenerate|i:1646271210;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('ce67ehbjc5depm70ti94ql5stodeo31k','::1',1646271544,'__ci_last_regenerate|i:1646271544;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('b3ivkklbo9d9ocmcbc1dv62ksbppf13q','::1',1646271892,'__ci_last_regenerate|i:1646271892;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('q8kadherrl6jel5avf5umb2iq8ciruje','::1',1646272262,'__ci_last_regenerate|i:1646272262;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('4d5pql8voth31qlkql023uek1186lqgl','::1',1646272657,'__ci_last_regenerate|i:1646272657;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('jrs0oqnlmgiuhh4834gasogb6s3qlhr2','::1',1646273092,'__ci_last_regenerate|i:1646273092;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('g7pkiilf7p10jhh3kdt5dj659nndg6f8','::1',1646273447,'__ci_last_regenerate|i:1646273447;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('l9s987j0m44vprv2dj7dboonchi16t4g','::1',1646273772,'__ci_last_regenerate|i:1646273772;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('pemo9sa8u2gs0lfmrm1mhioqo3013l71','::1',1646274162,'__ci_last_regenerate|i:1646274162;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('hogh381ulsp7h07660pcbefv4oc8bmob','::1',1646274779,'__ci_last_regenerate|i:1646274779;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('lc7ldqncnsl2595oirgrmscn0l2ev9b1','::1',1646275394,'__ci_last_regenerate|i:1646275394;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('o62tf391ve02dovkfmhrngbrk6ne6ie2','::1',1646275720,'__ci_last_regenerate|i:1646275720;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('an4iml55vpalstj0ehkr5bcsu1c1kggk','::1',1646277494,'__ci_last_regenerate|i:1646277494;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('20rar0hoajpspfn1u038oh848a3fv0gp','::1',1646277874,'__ci_last_regenerate|i:1646277874;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('i7o84fsscvqd2bvg34cs3g0a6nvioq0u','::1',1646277893,'__ci_last_regenerate|i:1646277874;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('3rgag87p2an9rh7ebinnbjqg7g8cf5nc','::1',1646287263,'__ci_last_regenerate|i:1646287263;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('f700pal7mlrkm3kkhblmqs8d3rtqqmnh','::1',1646287989,'__ci_last_regenerate|i:1646287989;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('qhh2112ikdqanip98io5elgol9use3uj','::1',1646288317,'__ci_last_regenerate|i:1646288317;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('1om2pvbcb2lml29jpq9g0lne5efa7ck3','::1',1646288666,'__ci_last_regenerate|i:1646288666;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('8beo38uuq242do035et9ipv5jm90fp8c','::1',1646289376,'__ci_last_regenerate|i:1646289376;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('cif6q10fvn34ol5gcpnebssealnarltv','::1',1646289924,'__ci_last_regenerate|i:1646289924;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('okbo72r5l8lg6pm1o0a03hbgt5j6po57','::1',1646290384,'__ci_last_regenerate|i:1646290384;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('lh78at3vqdk9om9iis5l34cf7bo5k80l','::1',1646290550,'__ci_last_regenerate|i:1646290384;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('e2umornecqt5gmgd60om3igc3dcuui5f','::1',1646353682,'__ci_last_regenerate|i:1646353682;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";'),('donfl8fge19h9rvagqk0n8cfddmr2hkh','::1',1646353827,'__ci_last_regenerate|i:1646353682;id_user|s:1:\"1\";id_jabatan|s:1:\"1\";email|s:15:\"admin@admin.com\";username|s:5:\"admin\";password|s:32:\"21232f297a57a5a743894a0e4a801fc3\";fullname|N;alamat|N;phone|N;access_token|N;deleted|s:1:\"0\";nama_jabatan|s:10:\"superadmin\";');
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
  `deleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_jabatan`) USING BTREE,
  UNIQUE KEY `nama` (`nama_jabatan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_jabatan`
--

LOCK TABLES `_jabatan` WRITE;
/*!40000 ALTER TABLE `_jabatan` DISABLE KEYS */;
INSERT INTO `_jabatan` VALUES (1,'superadmin',0),(2,'admin',0),(3,'kasir',0);
/*!40000 ALTER TABLE `_jabatan` ENABLE KEYS */;
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
  `alamat` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_user`
--

LOCK TABLES `_user` WRITE;
/*!40000 ALTER TABLE `_user` DISABLE KEYS */;
INSERT INTO `_user` VALUES (1,1,'admin@admin.com','admin','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,0),(2,2,'admin2@admin.com','admin2','c84258e9c39059a89ab77d846ddab909',NULL,NULL,NULL,NULL,0),(3,3,'kasir@admin.com','kasir','c7911af3adbd12a035b289556d96470a',NULL,NULL,NULL,NULL,0),(4,1,'sample_user@mail.com','sample_user',NULL,'sample_user',NULL,NULL,NULL,0);
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
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `item_nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
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
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
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
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
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
/*!50003 DROP FUNCTION IF EXISTS `trial_function` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `trial_function`(param int) RETURNS varchar(50) CHARSET utf8mb4
    DETERMINISTIC
BEGIN
 DECLARE val_1 VARCHAR(50);
  
  SET val_1=CONCAT(param,' - ', 'asdasdads');
  
  RETURN val_1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-04  9:06:35
