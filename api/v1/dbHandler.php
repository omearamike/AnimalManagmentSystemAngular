<?php

class DbHandler {

    private $conn;

    function __construct() {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
        // $db->createNewDB();
        // createNewDB();
    }
    /**
     * Fetching single record
     */
    public function getOneRecord($query) {
        $r = $this->conn->query($query.' LIMIT 1') or die($this->conn->error.__LINE__);
        return $result = $r->fetch_assoc();
    }
    /**
     * Creating new record
     */
    public function insertIntoTable($obj, $column_names, $table_name) {

        $c = (array) $obj;
        $keys = array_keys($c);
        $columns = '';
        $values = '';
        foreach($column_names as $desired_key){ // Check the obj received. If blank insert blank into the array.
           if(!in_array($desired_key, $keys)) {
                $$desired_key = '';
            }else{
                $$desired_key = $c[$desired_key];
            }
            $columns = $columns.$desired_key.',';
            $values = $values."'".$$desired_key."',";
        }
        $query = "INSERT INTO ".$table_name."(".trim($columns,',').") VALUES(".trim($values,',').")";
        $r = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if ($r) {
            $new_row_id = $this->conn->insert_id;
            return $new_row_id;
            } else {
            return NULL;
        }
    }
public function getSession(){
    if (!isset($_SESSION)) {
        session_start();
    }
    $sess = array();
    if(isset($_SESSION['uid']))
    {
        $sess["uid"] = $_SESSION['uid'];
        $sess["name"] = $_SESSION['name'];
        $sess["email"] = $_SESSION['email'];
        $sess["herdnumber"] = $_SESSION['herdnumber'];
    }
    else
    {
        $sess["uid"] = '';
        $sess["name"] = 'Guest';
        $sess["email"] = '';
    }
    return $sess;
}
public function destroySession(){
    if (!isset($_SESSION)) {
    session_start();
    }
    if(isSet($_SESSION['uid']))
    {
        unset($_SESSION['uid']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['herdnumber']);
        $info='info';
        if(isSet($_COOKIE[$info]))
        {
            setcookie ($info, '', time() - $cookie_time);
        }
        $msg="Logged Out Successfully...";
    }
    else
    {
        $msg = "Not logged in...";
    }
    return $msg;
}

// echo "tesing";
public function createNewDB($herdnumber){
  $dsn = $dsn = "mysql:host=localhost";
  $pdoinit = new PDO($dsn,"farmadmin","mike");

  //Creation of user "user_name"
  // $pdo->query("CREATE USER 'user_name'@'%' IDENTIFIED BY 'pass_word';");
  //Creation of database "new_db"
  $pdoinit->query("-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 02, 2017 at 12:26 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0


--
-- Database: `aa_$herdnumber`
--
CREATE DATABASE IF NOT EXISTS `aa_$herdnumber` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aa_$herdnumber`;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `tag_id` bigint(20) NOT NULL,
  `GMT_Added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breed_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` int(3) NOT NULL,
  `notes` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `animalmanagment`
--

CREATE TABLE `animalmanagment` (
  `care_id` int(11) NOT NULL,
  `tag_id` int(13) NOT NULL,
  `caredetails_id` int(11) NOT NULL,
  `admindate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `breed_id` int(11) NOT NULL,
  `breed_name` varchar(255) DEFAULT NULL,
  `breed_properties` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `caredetails`
--

CREATE TABLE `caredetails` (
  `caredetails_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers_auth`
--

CREATE TABLE `customers_auth` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `diet_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `feedtype_id` int(11) NOT NULL,
  `dailyvolume` int(11) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedlot`
--

CREATE TABLE `feedlot` (
  `lot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedlotlocation`
--

CREATE TABLE `feedlotlocation` (
  `location_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedtype`
--

CREATE TABLE `feedtype` (
  `feedtype_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `priceperkg` int(11) DEFAULT NULL,
  `dietdiet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lot information`
--

CREATE TABLE `lot information` (
  `lot_id` int(11) DEFAULT NULL,
  `tag_id` int(13) DEFAULT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movement`
--

CREATE TABLE `movement` (
  `movement_id` int(11) NOT NULL,
  `movementDate` date DEFAULT NULL,
  `lot_id` int(11) NOT NULL,
  `animaltag_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `sex_id` int(11) NOT NULL,
  `sex_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) unsigned NOT NULL,
  `valueOne` varchar(255) DEFAULT NULL,
  `valueTwo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `weight_id` int(11) NOT NULL,
  `tag_id` int(13) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `weightDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `animalmanagment`
--
ALTER TABLE `animalmanagment`
  ADD PRIMARY KEY (`care_id`),
  ADD KEY `FKanimalmana985796` (`tag_id`),
  ADD KEY `FKanimalmana36508` (`caredetails_id`);

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indexes for table `caredetails`
--
ALTER TABLE `caredetails`
  ADD PRIMARY KEY (`caredetails_id`);

--
-- Indexes for table `customers_auth`
--
ALTER TABLE `customers_auth`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`),
  ADD KEY `FKdiet137441` (`lot_id`),
  ADD KEY `FKdiet184058` (`feedtype_id`);

--
-- Indexes for table `feedlot`
--
ALTER TABLE `feedlot`
  ADD PRIMARY KEY (`lot_id`);

--
-- Indexes for table `feedlotlocation`
--
ALTER TABLE `feedlotlocation`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `FKfeedlotloc376857` (`location`);

--
-- Indexes for table `feedtype`
--
ALTER TABLE `feedtype`
  ADD PRIMARY KEY (`feedtype_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location`);

--
-- Indexes for table `movement`
--
ALTER TABLE `movement`
  ADD PRIMARY KEY (`movement_id`),
  ADD KEY `FKmovement564702` (`animaltag_id`),
  ADD KEY `FKmovement376305` (`lot_id`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`sex_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`weight_id`),
  ADD KEY `FKweight776635` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animalmanagment`
--
ALTER TABLE `animalmanagment`
  MODIFY `care_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `caredetails`
--
ALTER TABLE `caredetails`
  MODIFY `caredetails_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers_auth`
--
ALTER TABLE `customers_auth`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedlot`
--
ALTER TABLE `feedlot`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedtype`
--
ALTER TABLE `feedtype`
  MODIFY `feedtype_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sex`
--
ALTER TABLE `sex`
  MODIFY `sex_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT;");
  //Adding all privileges on our newly created database
  // $pdo->query("GRANT ALL PRIVILEGES on `new_db`.* TO 'user_name'@'%';");

}
public function testing2(){
  return "value";
}

}

?>
