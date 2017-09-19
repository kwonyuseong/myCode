-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: personal_project
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buylist`
--

DROP TABLE IF EXISTS `buylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buylist` (
  `productnum` int(11) NOT NULL,
  `usernum` int(11) NOT NULL,
  `productname` varchar(40) NOT NULL,
  `productexplain` varchar(400) DEFAULT NULL,
  `productprice` int(11) DEFAULT NULL,
  `productimgname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buylist`
--

LOCK TABLES `buylist` WRITE;
/*!40000 ALTER TABLE `buylist` DISABLE KEYS */;
INSERT INTO `buylist` VALUES (7,0,'testname','설명성ㄹㅇㄻㄴㄻㄴㅇㄹ',5000,'ION'),(7,1,'testname','설명성ㄹㅇㄻㄴㄻㄴㅇㄹ',5000,'ION'),(7,0,'testname','설명성ㄹㅇㄻㄴㄻㄴㅇㄹ',5000,'ION'),(7,1,'testname','설명성ㄹㅇㄻㄴㄻㄴㅇㄹ',5000,'ION'),(8,1,'NORTHSTAR','무게를 최소화 시켜 공중에서도 사용 가능 하도록 만들어진 기체이다 다량의 미사일과 초오오오오오 고열 용광!.... 지평선 넘어 까지 저격 가능한 레일건을 탑제하고 있다.',1000,'northstar'),(7,1,'RONIN','빠른 기동성으로 급습, 게릴라 작전에 유용하며 최첨단 openCV 기술로 날아오는 포탄을 전격검으로 튕겨낼 수 있다 또한 잠시 다른차원으로 이동하여 모습 을 감추는 기능을 탑재하고 있다 ',1000,'ronin'),(7,1,'RONIN','빠른 기동성으로 급습, 게릴라 작전에 유용하며 최첨단 openCV 기술로 날아오는 포탄을 전격검으로 튕겨낼 수 있다 또한 잠시 다른차원으로 이동하여 모습 을 감추는 기능을 탑재하고 있다 ',1000,'ronin'),(7,1,'RONIN','빠른 기동성으로 급습, 게릴라 작전에 유용하며 최첨단 openCV 기술로 날아오는 포탄을 전격검으로 튕겨낼 수 있다 또한 잠시 다른차원으로 이동하여 모습 을 감추는 기능을 탑재하고 있다 ',1000,'ronin'),(7,1,'RONIN','빠른 기동성으로 급습, 게릴라 작전에 유용하며 최첨단 openCV 기술로 날아오는 포탄을 전격검으로 튕겨낼 수 있다 또한 잠시 다른차원으로 이동하여 모습 을 감추는 기능을 탑재하고 있다 ',1000,'ronin'),(8,1,'NORTHSTAR','무게를 최소화 시켜 공중에서도 사용 가능 하도록 만들어진 기체이다 다량의 미사일과 초오오오오오 고열 용광!.... 지평선 넘어 까지 저격 가능한 레일건을 탑제하고 있다.',1000,'northstar'),(8,1,'NORTHSTAR','무게를 최소화 시켜 공중에서도 사용 가능 하도록 만들어진 기체이다 다량의 미사일과 초오오오오오 고열 용광!.... 지평선 넘어 까지 저격 가능한 레일건을 탑제하고 있다.',1000,'northstar'),(8,1,'NORTHSTAR','무게를 최소화 시켜 공중에서도 사용 가능 하도록 만들어진 기체이다 다량의 미사일과 초오오오오오 고열 용광!.... 지평선 넘어 까지 저격 가능한 레일건을 탑제하고 있다.',1000,'northstar'),(8,1,'NORTHSTAR','무게를 최소화 시켜 공중에서도 사용 가능 하도록 만들어진 기체이다 다량의 미사일과 초오오오오오 고열 용광!.... 지평선 넘어 까지 저격 가능한 레일건을 탑제하고 있다.',1000,'northstar'),(9,1,'TONE','중형 타이탄으로 기동성은 그렇게 빠른 편은 아니지만 여러 유용한 장비를 탑재하고있어 어떤 전투에도 무난한 성능과 성과를 보인다 레이더 투사체와 40MM 주포 소형 미사일 을 탑제 하고 있으며 에너지 방패도 전개 할 수 있다.',1000,'tone'),(9,1,'TONE','중형 타이탄으로 기동성은 그렇게 빠른 편은 아니지만 여러 유용한 장비를 탑재하고있어 어떤 전투에도 무난한 성능과 성과를 보인다 레이더 투사체와 40MM 주포 소형 미사일 을 탑제 하고 있으며 에너지 방패도 전개 할 수 있다.',1000,'tone'),(12,1,'LEGION','중량 기체이며 대형 미니건으로 엄청난 탄막을 퍼부을수 있으며 목표물 자동 포착기능이 매우 뛰어나 탐지된적을 빠르게 공격할 수 있다.',1000,'legion'),(12,3,'LEGION','중량 기체이며 대형 미니건으로 엄청난 탄막을 퍼부을수 있으며 목표물 자동 포착기능이 매우 뛰어나 탐지된적을 빠르게 공격할 수 있다.',1000,'legion');
/*!40000 ALTER TABLE `buylist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartlist`
--

DROP TABLE IF EXISTS `cartlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartlist` (
  `productnum` int(11) NOT NULL,
  `usernum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartlist`
--

LOCK TABLES `cartlist` WRITE;
/*!40000 ALTER TABLE `cartlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coment`
--

DROP TABLE IF EXISTS `coment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coment` (
  `comentno` int(11) NOT NULL AUTO_INCREMENT,
  `productnum` int(11) NOT NULL,
  `usernick` varchar(20) DEFAULT NULL,
  `comentdate` char(20) DEFAULT NULL,
  `comentcontent` text,
  PRIMARY KEY (`comentno`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coment`
--

LOCK TABLES `coment` WRITE;
/*!40000 ALTER TABLE `coment` DISABLE KEYS */;
INSERT INTO `coment` VALUES (4,7,'ADT','2016-12-11 (03:22)','ttttt'),(5,8,'ADT','2016-12-11 (03:25)','귀여운 북별이 ^^^'),(6,9,'ADT','2016-12-11 (03:25)','통통통'),(7,10,'ADT','2016-12-11 (03:25)','품절젬'),(8,11,'ADT','2016-12-11 (03:26)','파이어뱄!'),(9,12,'ADT','2016-12-11 (03:26)','에너미머신건');
/*!40000 ALTER TABLE `coment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `productnum` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(50) NOT NULL,
  `productcategory` varchar(30) DEFAULT NULL,
  `productcount` int(11) NOT NULL,
  `productprice` int(11) NOT NULL,
  `productseller` varchar(50) DEFAULT NULL,
  `productexplain` varchar(200) DEFAULT NULL,
  `productimgname` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`productnum`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (7,'RONIN','TITAN',100,1000,'KYSindustry','빠른 기동성으로 급습, 게릴라 작전에 유용하며 최첨단 openCV 기술로 날아오는 포탄을 전격검으로 튕겨낼 수 있다 또한 잠시 다른차원으로 이동하여 모습 을 감추는 기능을 탑재하고 있다 ','ronin'),(8,'NORTHSTAR','TITAN',100,1000,'KYSindustry','무게를 최소화 시켜 공중에서도 사용 가능 하도록 만들어진 기체이다 다량의 미사일과 초오오오오오 고열 용광!.... 지평선 넘어 까지 저격 가능한 레일건을 탑제하고 있다.','northstar'),(9,'TONE','TITAN',100,1000,'KYSindustry','중형 타이탄으로 기동성은 그렇게 빠른 편은 아니지만 여러 유용한 장비를 탑재하고있어 어떤 전투에도 무난한 성능과 성과를 보인다 레이더 투사체와 40MM 주포 소형 미사일 을 탑제 하고 있으며 에너지 방패도 전개 할 수 있다.','tone'),(10,'ION','TITAN',0,1000,'KYSindustry','볼텍스 쉴드라는 어마무시한 기술로 상대방이 공격한 실탄 공격을 모두 반사 할 수가 있다 ','ion'),(11,'SCORCH','TITAN',100,1000,'KYSindustry','중량 기체이며 적기지를 불바다로 만들 수 있는 전자기 고열 공격 방식이라는 특이한 무기를 사용한다.','scorch'),(12,'LEGION','TITAN',100,1000,'KYSindustry','중량 기체이며 대형 미니건으로 엄청난 탄막을 퍼부을수 있으며 목표물 자동 포착기능이 매우 뛰어나 탐지된적을 빠르게 공격할 수 있다.','legion');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `usernum` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(40) NOT NULL,
  `userpass` varchar(30) NOT NULL,
  `usernick` varchar(30) DEFAULT NULL,
  `usermoney` int(11) DEFAULT NULL,
  `userrank` char(15) DEFAULT NULL,
  PRIMARY KEY (`usernum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','1234','ADMINICK',47007,'8'),(2,'test','1234',NULL,10000000,NULL),(3,'1234','1234',NULL,122456,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-12 16:02:36
