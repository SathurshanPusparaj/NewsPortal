-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `memberdetails`
--

DROP TABLE IF EXISTS `memberdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memberdetails` (
  `uid` int(10) unsigned DEFAULT NULL,
  `userpic` varchar(500) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  KEY `uid` (`uid`),
  CONSTRAINT `memberdetails_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `memberinfo` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberdetails`
--

LOCK TABLES `memberdetails` WRITE;
/*!40000 ALTER TABLE `memberdetails` DISABLE KEYS */;
INSERT INTO `memberdetails` VALUES (3,'images/profile/Dorsey-iamge.png',NULL,'currently working at Yahoo.com'),(1,'images/profile/season-2.jpg','studied at standford',NULL);
/*!40000 ALTER TABLE `memberdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memberinfo`
--

DROP TABLE IF EXISTS `memberinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memberinfo` (
  `uid` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `authority` tinyint(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberinfo`
--

LOCK TABLES `memberinfo` WRITE;
/*!40000 ALTER TABLE `memberinfo` DISABLE KEYS */;
INSERT INTO `memberinfo` VALUES (1,'sathurshan','sathu@gmail.com','1234','scool lane,dickoya','male','2017-10-10',1),(2,'sasasas','satshurshan@gmail.com','sasas','asa','male','2017-10-02',0),(3,'rahul','rahul@gmail.com','123456','71 Pilgrim Avenue \r\nChevy Chase, MD 20815','male','2017-10-13',0);
/*!40000 ALTER TABLE `memberinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `nid` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `sdescription` varchar(255) NOT NULL,
  `ldescription` mediumtext NOT NULL,
  `path` varchar(2555) NOT NULL,
  `verified` int(1) NOT NULL,
  `udate` date NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,0,'world','First flight touches down on remote St Helena','The first scheduled commercial airline service to the remote British island of St Helena in the south Atlantic has touched down safely.','he virgin flight, an SA Airlink service from South Africa, ends the island\'s long-standing reliance on a ship which sailed every three weeks.\r\nIt is hoped that the service, funded by the UK, will boost tourism and help make St Helena more self-sufficient.\r\nBut British media have dubbed it \"the most useless airport in the world\".\r\nBuilt with £285m ($380m) of funding from the UK Department for International Development (Dfid), the airport should have opened in 2016, but dangerous wind conditions delayed the launch.','images/news/first-flight.jpg',1,'2017-10-14'),(2,3,'entertainment','Thor out of five for Marvel\'s latest','Chris Hemsworth is back as superhero Thor in what one critic describes as \"a comedy with blockbuster spectacle\".','According to the Daily Telegraph, Thor: Ragnarok is one of the Marvel Studios\' \"best films to date... funny, charming, dazzling [and] gorgeously designed.\"\r\nThe film, says Variety, is \"easily the best of the three Thor movies\", with \"self-aware punchlines throughout\".\r\nEmpire, meanwhile, gives four stars to a superhero adventure it describes as \"a full-bore comedy using blockbuster spectacle as a backdrop for gags\".\r\nThor: Ragnarok, which follows 2011\'s Thor and 2013\'s Thor: The Dark World, sees the titular god of thunder, played by Chris Hemsworth, face a fearsome new adversary.\r\nThis new character, named Hela, is \"played with haughty relish\" by Oscar winner Cate Blanchett, according to the Radio Times\' Jeremy Aspinall.\r\nThe action in Taika Waititi\'s film also sees Hemsworth come to blows with fellow Avenger The Hulk, now a gladiator on a distant planet named Sakaar.\r\nHis appearance, writes The Guardian\'s Steve Rose, constitutes \"the most fleshed-out performance of Hulk we\'ve yet had in this Marvel universe\".\r\nThe result, says Screen Daily\'s Tim Grierson, is \"a grinningly goofy comic-book movie that reverberates with boyish delight\".\r\nThe Independent, however, does take issue with the film\'s \"convoluted\" plot and bemoans its lack of \"dramatic urgency\".\r\nThor: Ragnarok, which also stars Tom Hiddleston and Jeff Goldblum, opens in the UK and Ireland on 24 October.','images/news/thor1_marvel.jpg',1,'2017-10-20'),(3,3,'World','Catalonia independence: Rajoy dissolves Catalan parliament','Mariano Rajoy begins imposing direct rule over Catalonia after its push for independence.','','images/news/example-blog05.jpg',1,'2017-10-27'),(4,3,'Tech','Artificial intelligence smart enough to fool Captcha security check','Researchers developed an algorithm that imitates how the human brain responds to these visual clues.','','',1,'2017-10-27'),(5,1,'World',' North Korea nuclear threat accelerating','The threat of nuclear attack from North Korea is increasing, US Defence Secretary James Mattis said during a visit to South Korea.','','images/news/mediaitem.jpg',1,'2017-10-28'),(6,1,'Tech','Facebook: Were not listening in to chat','An executive was responding to a tweet asking about ads which seem to be linked to real-life conversations.','A Facebook executive has denied the social network uses a devices microphone to listen to what users are saying and then send them relevant ads.','images/news/season-2.jpg',1,'2017-10-28'),(7,3,'business','Hammond\'s \'Budget spending dilemma\'','Related content\r\nKamal Ahmed: \'Living within our means\' still Treasury mantra\r\nEarnings in first fall for three years\r\nChancellor told to freeze taxes in Budget','Philip Hammond may have to abandon his target for getting rid of the deficit if he wants to increase spending on public services, the Institute for Fiscal Studies said.\r\nHe is also facing a likely cut in the forecast for productivity growth, and uncertainty around Brexit, it said.\r\nThe Treasury said it would continue to adopt a \"balanced approach\".\r\nMr Hammond is to unveil his Budget on 22 November - the first since the general election.\r\nHe has said he aims to eliminate the budget deficit - the difference between the government\'s everyday spending and the money it has coming in - by the middle of the next decade.\r\nKamal Ahmed: Treasury\'s message remains \'living within our means\'\r\nEarnings fall for first time in three years\r\nChancellor told to freeze taxes in Budget\r\nHe told the BBC last week: \"We\'ve already moved the target for balancing the books out from 2020 to 2025, but continuing to drive down the deficit in a measured and sensible way over a period of years... has to be the right way to go.\"\r\nBut the IFS says Mr Hammond is also under \"increasingly intense\" political pressure to spend more, while the Parliamentary arithmetic makes tax increases look difficult.','images/news/gettyimage.jpg',1,'2017-10-30'),(8,1,'world','Can Japan burn flammable ice for energy?','Japan\'s relationship with the energy sector is, at best, complicated.','Having virtually no oil, coal or natural gas to fire its power plants, Japan was forced to import over 90% of its energy in 2014. It is the world\'s third largest importer of oil and coal, and the number one importer of liquefied natural gas.\r\nIn 2016, its gas bill was $28.9 billion.\r\nFurthermore, its 50-plus nuclear reactors, once considered a brilliant solution to its energy resource dearth, today mostly stand idle following the devastating Fukushima Daiichi nuclear power plant meltdown, in 2011.But Japanese scientists may have found an innovative end to the country\'s energy woes.\r\nThey are pioneering a new technology that could reshape the global energy industry. Even better, a technology that revolves around a resource which Japan has in abundance buried under the ocean.\r\nThe Japanese government wants to burn \"flammable ice\" for energy.','images/news/large-tease.jpg',1,'2017-11-01'),(9,3,'world','The Brief from Brussels: EU mulls \'rule of law\' checks for funds','The Brief from Brussels is a daily roundup of the top stories from Europe’s de facto political capital. In this edition: the EU’s top justice','','',1,'2017-11-01'),(10,1,'Business','Tech firms questioned over \'meddling\'','Facebook, Twitter and Google lawyers defended themselves to US lawmakers probing whether Russia used social media to influence the 2016 election.','The three firms faced hard questions at a Senate panel on crime and terrorism about why they missed political ads bought with Russian money.\r\nLawmakers are eyeing new regulations for social media firms in the wake of Russia\'s alleged meddling in 2016.\r\nThe firms said they would tighten advertising policies and guidelines.\r\nSenator Al Franken, a Democrat from Minnesota, asked Facebook - which absorbed much of the heat from lawmakers - why payment in Russian rubles did not tip off the firm to suspicious activity.\r\n\"In hindsight, we should have had a broader lens,\" said Colin Stretch, general counsel for Facebook. \"There are signals we missed.\"\r\nA day earlier Facebook said as many as 126m US users may have seen Russia-backed content over the last two years.\r\nLawyers for the three firms are facing two days of congressional hearings as lawmakers consider legislation that would extend regulations for television, radio and satellite to also cover social media platforms.\r\nThe firms said they are increasing efforts to identify bots and spam, as well as make political advertising more transparent.\r\nFacebook, for example, said it expects to have 20,000 people working on \"safety and security\" by the end of 2018 - double the current number.','images/news/fb.jpg',1,'2017-11-01'),(11,3,'business','Wall Street has ended higher, with the Nasdaq at a new record following strong US economic data.','Wall Street has ended higher, with the Nasdaq at a new record following strong US economic data.','US consumer confidence hit a 17-year high in October, while sales of single-family homes rose in September to their highest level in a decade.\r\nThe Dow Jones Jones Industrial Average finished up 0.1% at 23,377.2 points, while the S&P 500 rose 0.1% to 2,575.2.\r\nThe technology-focused Nasdaq Composite jumped 0.4% to 6,727.6 points despite a near-10% fall for toy maker Mattel.\r\nChip maker Qualcomm, which is emboiled in a row with Apple, fell 6.7%.\r\nThe iPhone maker rose 1.4% to a record high after positive reviews of its much-anticipated iPhone X.\r\nMondelez jumped 5.4% after the snack maker reported better-than-expected profits and revenue, while Kellogg surged 6.2% following its first sales increase in more than two years.\r\nResults from big companies \"continue to impress\", said Steve Chiavarone at Federated Investors in New York. \"It strikes me that that leads you to a much more bullish outlook for the fourth quarter.\"\r\nPeter Jankovskis at OakBrook Investments in Lisle, Illinois said corporate results and economic data continued to be better-than-expected: \"I think fundamentally investors are really focused on those numbers more than the political noise, if you will, in the background.\"\r\nInvestors are also awaiting an announcement on the next Federal Reserve chair, which could come this week. President Donald Trump is expected to pick Fed Governor Jerome Powell, who is seen as more dovish on interest rates and thus relatively stock market friendly, Reuters reported.\r\nThe Fed started its two-day meeting in Washington DC on Tuesday, although the central bank is widely expected to leave interest rates unchanged on Wednesday.\r\nRockwell Automation shares jumped 7.4% after the automation equipment rejected an unsolicited $27bn bid from rival Emerson Electric.\r\nHowever, Under Armour plunged 23.7% after the sportswear company slashed its 2017 forecasts.','images/news/consumer.jpg',1,'2017-10-25'),(12,1,'entertainment','WATCH 2.0 making video: Rajinikanth-Akshay Kumar\'s film looks bigger and better','Disappointing hordes of fans, 2.0, which was supposed to release on Diwali this year, has been pushed to January 2018. While the film is currently in its post-production stage, the makers have released a making video of the film.','Going by the video, it looks like the team has worked extra hard for the sequel, which appears to be grander than the first part. The video shows some candid shots of Rajinikanth and Akshay Kumar on the sets of the film. From the making video, it\'s quite clear that the audiences are in for a big surprise.','images/news/enthiran.jpg',1,'2017-11-01'),(13,3,'World','law in srilanka','current president','','',0,'2017-11-01');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlog` (
  `Logid` int(255) NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL,
  `signin` datetime NOT NULL,
  `signout` datetime NOT NULL,
  PRIMARY KEY (`Logid`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlog`
--

LOCK TABLES `userlog` WRITE;
/*!40000 ALTER TABLE `userlog` DISABLE KEYS */;
INSERT INTO `userlog` VALUES (1,1,'2017-10-24 15:46:43','0000-00-00 00:00:00'),(20,3,'2017-10-24 17:37:06','0000-00-00 00:00:00'),(21,3,'2017-10-24 17:38:32','0000-00-00 00:00:00'),(22,3,'2017-10-24 17:53:19','0000-00-00 00:00:00'),(23,3,'2017-10-24 17:53:41','2017-10-24 17:57:02'),(24,3,'2017-10-24 17:58:24','2017-10-24 17:59:50'),(25,3,'2017-10-24 18:03:28','2017-10-24 18:04:08'),(26,3,'2017-10-27 18:53:29','2017-10-27 22:43:46'),(27,1,'2017-10-28 19:18:00','0000-00-00 00:00:00'),(28,1,'2017-10-28 19:18:31','2017-10-28 19:18:51'),(29,3,'2017-10-28 19:20:08','2017-10-28 19:21:15'),(30,1,'2017-10-30 15:26:28','2017-10-30 16:44:24'),(31,1,'2017-10-31 11:48:56','2017-10-31 11:49:52'),(32,3,'2017-10-31 11:50:15','2017-10-31 11:50:56'),(33,1,'2017-10-31 11:54:16','2017-10-31 11:54:22'),(34,3,'2017-10-31 11:54:37','2017-10-31 11:57:20'),(35,1,'2017-11-01 06:10:59','2017-11-01 06:11:15'),(36,3,'2017-11-01 06:39:39','0000-00-00 00:00:00'),(37,3,'2017-11-01 06:39:39','0000-00-00 00:00:00'),(38,1,'2017-11-01 12:44:17','2017-11-01 12:44:50'),(39,3,'2017-11-01 12:45:01','2017-11-01 12:48:27'),(40,1,'2017-11-01 12:48:40','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `userlog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-03 19:53:48
