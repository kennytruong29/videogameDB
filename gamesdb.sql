-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: gamesdb
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `belongsto`
--

DROP TABLE IF EXISTS `belongsto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `belongsto` (
  `vid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`vid`,`cid`),
  KEY `cid` (`cid`),
  CONSTRAINT `belongsto_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `videogame` (`vid`) ON DELETE CASCADE,
  CONSTRAINT `belongsto_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `belongsto`
--

LOCK TABLES `belongsto` WRITE;
/*!40000 ALTER TABLE `belongsto` DISABLE KEYS */;
INSERT INTO `belongsto` VALUES (8,1),(13,1),(14,1),(3,2),(4,2),(7,2),(9,2),(12,2),(15,2),(16,3),(10,4),(11,4);
/*!40000 ALTER TABLE `belongsto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` text,
  `photoPath` text,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Action/Adventure','https://s3.amazonaws.com/steamgriddb/thumb/78b9508436357acbab1aabb76e12739f.png'),(2,'RPG','https://s3.amazonaws.com/steamgriddb/thumb/251dbb5e528421776ff6e17c87be507f.png'),(3,'MOBA','https://s3.amazonaws.com/steamgriddb/thumb/9fd81843ad7f202f26c1a174c7357585.png'),(4,'Platformer','https://s3.amazonaws.com/steamgriddb/thumb/4158345f3687fcb84c1795cbf3c2e638.png');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recieves`
--

DROP TABLE IF EXISTS `recieves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recieves` (
  `vid` int(11) NOT NULL,
  `revID` int(11) NOT NULL,
  `creationDate` date DEFAULT NULL,
  PRIMARY KEY (`vid`,`revID`),
  KEY `revID` (`revID`),
  CONSTRAINT `recieves_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `videogame` (`vid`) ON DELETE CASCADE,
  CONSTRAINT `recieves_ibfk_2` FOREIGN KEY (`revID`) REFERENCES `reviews` (`revID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recieves`
--

LOCK TABLES `recieves` WRITE;
/*!40000 ALTER TABLE `recieves` DISABLE KEYS */;
INSERT INTO `recieves` VALUES (4,117,'2019-12-03'),(4,118,'2019-12-03'),(7,116,'2019-12-03'),(9,122,'2019-12-03'),(10,112,'2019-12-03'),(10,119,'2019-12-03'),(11,102,'2019-12-02'),(12,126,'2019-12-04'),(13,131,'2019-12-04'),(14,124,'2019-12-03'),(14,125,'2019-12-04'),(15,120,'2019-12-03'),(16,121,'2019-12-03'),(16,129,'2019-12-04');
/*!40000 ALTER TABLE `recieves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `revID` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `comment` text,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`revID`),
  CONSTRAINT `reviews_chk_1` CHECK (((`rating` >= 1) and (`rating` <= 5)))
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (92,1,'ads','asdfs'),(102,5,'Fantastic ','The man'),(106,1,'asides','asdfs'),(111,1,'',''),(112,5,'great game 10/10 would play again i love the star bois (bring back the star bois )','lizard'),(116,5,'Great game I love to blast enemies with the plasma rifle','Fallout_Fan'),(117,5,'Better than oBLIVION','Kennifer'),(118,5,'Great open world game, lots of cool weapons.','Skyrim_Fan'),(119,5,'This game is out of this world no cap','gamergirl96'),(120,2,'Game broke my heart','whatislove'),(121,1,'Toxic community ','Not-Toxic'),(122,1,'I do not recommend this game. Nothing wild about it whatsoever. ','twitches'),(124,5,'Best collaboration to exist. baby yoda made me play this game','datalego'),(125,5,'I\'d like them to add baby yoda as a playable character','theMandalorian'),(126,5,'best version of pokemon ever','cameron'),(129,1,'League is bETTER','LeagueL0ver'),(131,5,'I like this game','Demo');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videogame`
--

DROP TABLE IF EXISTS `videogame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videogame` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `publisher` text,
  `platform` text,
  `developer` text,
  `photopath` text,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videogame`
--

LOCK TABLES `videogame` WRITE;
/*!40000 ALTER TABLE `videogame` DISABLE KEYS */;
INSERT INTO `videogame` VALUES (3,'Oblivion','Bethesda','Multiplatform','Bethesda Game Studios','https://s3.amazonaws.com/steamgriddb/thumb/a38c30b2766c4353d929a8afe1f2e831.png'),(4,'Skyrim','Bethesda','Multiplatform','Bethesda Game Studios','https://s3.amazonaws.com/steamgriddb/thumb/251dbb5e528421776ff6e17c87be507f.png'),(7,'Fallout 3','Bethesda','Multiplatform','Bethesda Game Studios','\nhttps://s3.amazonaws.com/steamgriddb/thumb/effffa8deef3c927fefc014850129bb6.png'),(8,'Uncharted 4','SCEA','PS4','Naughty Dog','https://s3.amazonaws.com/steamgriddb/thumb/bd439194e7f892d3052e0a47eb0ffbf7.png'),(9,'The Witcher 3','CD Projekt','Multiplatform','CD Projekt RED','https://s3.amazonaws.com/steamgriddb/thumb/ab73f542b6d60c4de151800b8abc0a6c.png'),(10,'Super Mario Galaxy','Nintendo','Nintendo Wii','Nintendo Tokyo','https://s3.amazonaws.com/steamgriddb/thumb/4158345f3687fcb84c1795cbf3c2e638.png'),(11,'Ratchet and Clank: A Crack in Time','SCEA','PS3','Insomniac Games','https://s3.amazonaws.com/steamgriddb/thumb/c51a0844f28f9a4f7f3820c8b5eb7937.png'),(12,'Pokemon: Emerald','Nintendo','GBA','Game Freak','https://s3.amazonaws.com/steamgriddb/thumb/8befb4efe8ce6cdf0e1a84974d452a9f.png'),(13,'Assassins Creed IV: Black Flag','Ubisoft','Multiplatform','UbiSoft Quebec','https://s3.amazonaws.com/steamgriddb/thumb/952dcec392ca2f4667f334b1f8853370.png'),(14,'Lego: Star Wars','THQ','Console','TT Games','https://s3.amazonaws.com/steamgriddb/thumb/78b9508436357acbab1aabb76e12739f.png'),(15,'Kingdom Hearts: Birth by Sleep','Square Enix','PSP','Square Enix Product','https://s3.amazonaws.com/steamgriddb/thumb/e41990b122b864f164d2ab96e8322690.png'),(16,'DOTA 2','Valve','PC','Valve','https://s3.amazonaws.com/steamgriddb/thumb/9fd81843ad7f202f26c1a174c7357585.png');
/*!40000 ALTER TABLE `videogame` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-05  8:41:05
