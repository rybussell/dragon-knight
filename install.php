<?php

$start = microtime();

if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page == 2) { second(); }
    elseif ($page == 3) { third(); }
    elseif ($page == 4) { fourth(); }
    else { first(); }
} else { first(); }

function ct($link,$query){
    mysqli_query($link,$query);
    return $query;
}



function first() { // First page - show warnings and gather info.
    
echo "
<html>
<head>
<title>Dragon Knight Installation</title>
</head>
<body>
<div  style='width:75%;position:absolute;left:300px;'><b>Dragon Knight Installation: Page One</b><br /><br />
<b>NOTE:</b> Please ensure you have filled in the correct values in config.php before continuing. Installation will fail if these values are not correct. Also, the MySQL database needs to already exist. This installer script will take care of setting up its structure and content, but the database itself must already exist on your MySQL server before the installer will work.<br /><br />
Installation for Dragon Knight is a simple two-step process: set up the database tables, then create the admin user. After that, you're done.<br /><br />

<b>Complete Setup</b> includes table structure and all default data (items, drops, monsters, levels, spells, towns) - after complete setup, the game is totally ready to run. If you want to create all your own data, I trust you have enough knowledge of how databases work to clear the data and start fresh. If not, it is a very easy google search. Please do not contact me asking how to do so or if I will include the installation to only do the structures.
<br /><br />
Click the button below to begin your installation.<br /><br />
<form action=\"install2.php?page=2\" method=\"post\">
<input type=\"submit\" name=\"complete\" value=\"Complete Setup\" /><br />
</form></div>
</body>
</html>";


  
}

function second() {
	
echo "<html><head><title>Dragon Knight Installation</title></head><body><b>Dragon Knight Installation: Page Two</b><br /><br />";
    
	include("config.php");
	//include("lib2.php");
	
	$babble = $prefix . "_babble";
    $control = $prefix . "_control";
    $drops = $prefix . "_drops";
    $forum = $prefix . "_forum";
    $items = $prefix . "_items";
    $levels = $prefix . "_levels";
    $monsters = $prefix . "_monsters";
    $news = $prefix . "_news";
    $spells = $prefix . "_spells";
    $towns = $prefix . "_towns";
    $users = $prefix . "_users";
    
		
	$sql = "CREATE TABLE `$babble` ( `id` INT NOT NULL AUTO_INCREMENT , `posttime` TIME NOT NULL DEFAULT '00:00:00' , `author` VARCHAR(30) NOT NULL DEFAULT '' , `babble` VARCHAR(255) NOT NULL DEFAULT '' , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

if (ct($link,$sql)) { echo "<span style='background:green;'>Babble Box table created.</span><br />"; } else { echo "<span style='background:red;'>Error creating Babble Box table.</span>"; }


$sql = "CREATE TABLE `$control` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `gamename` varchar(50) NOT NULL default '',
  `gamesize` int(5) unsigned NOT NULL default '0',
  `gameopen` int(5) unsigned NOT NULL default '0',
  `gameurl` varchar(200) NOT NULL default '',
  `adminemail` varchar(100) NOT NULL default '',
  `forumtype` int(5) unsigned NOT NULL default '0',
  `forumaddress` varchar(200) NOT NULL default '',
  `class1name` varchar(50) NOT NULL default '',
  `class2name` varchar(50) NOT NULL default '',
  `class3name` varchar(50) NOT NULL default '',
  `diff1name` varchar(50) NOT NULL default '',
  `diff1mod` float unsigned NOT NULL default '0',
  `diff2name` varchar(50) NOT NULL default '',
  `diff2mod` float unsigned NOT NULL default '0',
  `diff3name` varchar(50) NOT NULL default '',
  `diff3mod` float unsigned NOT NULL default '0',
  `compression` tinyint(3) unsigned NOT NULL default '0',
  `verifyemail` tinyint(3) unsigned NOT NULL default '0',
  `shownews` tinyint(3) unsigned NOT NULL default '0',
  `showbabble` tinyint(3) unsigned NOT NULL default '0',
  `showonline` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Control table created.</span><br />"; } else { echo "<span style='background:red;'>Error creating Control table.</span>"; }

$sql = "INSERT INTO `$control` (`id`,`gamename`,`gamesize`,`gameopen`,`gameurl`,`adminemail`,`forumtype`,`forumaddress`,`class1name`,`class2name`,`class3name`,`diff1name`,`diff1mod`,`diff2name`,`diff2mod`,`diff3name`,`diff3mod`,`compression`,`verifyemail`,`shownews`,`showbabble`,`showonline`) VALUES (1, 'Dragon Knight', 250, 1, '', '', 1, '', 'Mage', 'Warrior', 'Paladin', 'Easy', '1', 'Medium', '1.2', 'Hard', '1.5', 1, 1, 1, 1, 1);";
if (ct($link,$sql)) { echo "<span style='background:green;'>Control table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating Control table.</span>";}


$sql = "CREATE TABLE `$drops` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `mlevel` smallint(5) unsigned NOT NULL default '0',
  `type` smallint(5) unsigned NOT NULL default '0',
  `attribute1` varchar(30) NOT NULL default '',
  `attribute2` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Drops table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Drops table.</span>";}



$sql = "INSERT INTO `$drops` (`id`,`name`,`mlevel`,`type`,`attribute1`,`attribute2`) VALUES (1, 'Life Pebble', 1, 1, 'maxhp,10', 'X'),
(2, 'Life Stone', 10, 1, 'maxhp,25', 'X'),
(3, 'Life Rock', 25, 1, 'maxhp,50', 'X'),
(4, 'Magic Pebble', 1, 1, 'maxmp,10', 'X'),
(5, 'Magic Stone', 10, 1, 'maxmp,25', 'X'),
(6, 'Magic Rock', 25, 1, 'maxmp,50', 'X'),
(7, 'Dragon\'s Scale', 10, 1, 'defensepower,25', 'X'),
(8, 'Dragon\'s Plate', 30, 1, 'defensepower,50', 'X'),
(9, 'Dragon\'s Claw', 10, 1, 'attackpower,25', 'X'),
(10, 'Dragon\'s Tooth', 30, 1, 'attackpower,50', 'X'),
(11, 'Dragon\'s Tear', 35, 1, 'strength,50', 'X'),
(12, 'Dragon\'s Wing', 35, 1, 'dexterity,50', 'X'),
(13, 'Demon\'s Sin', 35, 1, 'maxhp,-50', 'strength,50'),
(14, 'Demon\'s Fall', 35, 1, 'maxmp,-50', 'strength,50'),
(15, 'Demon\'s Lie', 45, 1, 'maxhp,-100', 'strength,100'),
(16, 'Demon\'s Hate', 45, 1, 'maxmp,-100', 'strength,100'),
(17, 'Angel\'s Joy', 25, 1, 'maxhp,25', 'strength,25'),
(18, 'Angel\'s Rise', 30, 1, 'maxhp,50', 'strength,50'),
(19, 'Angel\'s Truth', 35, 1, 'maxhp,75', 'strength,75'),
(20, 'Angel\'s Love', 40, 1, 'maxhp,100', 'strength,100'),
(21, 'Seraph\'s Joy', 25, 1, 'maxmp,25', 'dexterity,25'),
(22, 'Seraph\'s Rise', 30, 1, 'maxmp,50', 'dexterity,50'),
(23, 'Seraph\'s Truth', 35, 1, 'maxmp,75', 'dexterity,75'),
(24, 'Seraph\'s Love', 40, 1, 'maxmp,100', 'dexterity,100'),
(25, 'Ruby', 50, 1, 'maxhp,150', 'X'),
(26, 'Pearl', 50, 1, 'maxmp,150', 'X'),
(27, 'Emerald', 50, 1, 'strength,150', 'X'),
(28, 'Topaz', 50, 1, 'dexterity,150', 'X'),
(29, 'Obsidian', 50, 1, 'attackpower,150', 'X'),
(30, 'Diamond', 50, 1, 'defensepower,150', 'X'),
(31, 'Memory Drop', 5, 1, 'expbonus,10', 'X'),
(32, 'Fortune Drop', 5, 1, 'goldbonus,10', 'X');";
if (ct($link,$sql)) { echo "<span style='background:green;'>Drops table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating Drops table.</span>";}



$sql = "CREATE TABLE `$forum` ( `id` BIGINT(20) NOT NULL AUTO_INCREMENT , `postdate` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00' , `newpostdate` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00' , `author` VARCHAR(30) NOT NULL , `parent` BIGINT(20) NOT NULL , `replies` BIGINT(20) NOT NULL , `title` VARCHAR(150) NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Forum table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Forum table.</span>";}


$sql = "CREATE TABLE `$items` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `type` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(30) NOT NULL default '',
  `buycost` int(10) unsigned NOT NULL default '0',
  `attribute` smallint(5) unsigned NOT NULL default '0',
  `special` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Items table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Items table.</span>";}



$sql = "INSERT INTO `$items` (`id`,`type`,`name`,`buycost`,`attribute`,`special`) VALUES (1, 1, 'Stick', 10, 2, 'X'),
(2, 1, 'Branch', 30, 4, 'X'),
(3, 1, 'Club', 40, 5, 'X'),
(4, 1, 'Dagger', 90, 8, 'X'),
(5, 1, 'Hatchet', 150, 12, 'X'),
(6, 1, 'Axe', 200, 16, 'X'),
(7, 1, 'Brand', 300, 25, 'X'),
(8, 1, 'Poleaxe', 500, 35, 'X'),
(9, 1, 'Broadsword', 800, 45, 'X'),
(10, 1, 'Battle Axe', 1200, 50, 'X'),
(11, 1, 'Claymore', 2000, 60, 'X'),
(12, 1, 'Dark Axe', 3000, 100, 'expbonus,-5'),
(13, 1, 'Dark Sword', 4500, 125, 'expbonus,-10'),
(14, 1, 'Bright Sword', 6000, 100, 'expbonus,10'),
(15, 1, 'Magic Sword', 10000, 150, 'maxmp,50'),
(16, 1, 'Destiny Blade', 50000, 250, 'strength,50'),
(17, 2, 'Skivvies', 25, 2, 'goldbonus,10'),
(18, 2, 'Clothes', 50, 5, 'X'),
(19, 2, 'Leather Armor', 75, 10, 'X'),
(20, 2, 'Hard Leather Armor', 150, 25, 'X'),
(21, 2, 'Chain Mail', 300, 30, 'X'),
(22, 2, 'Bronze Plate', 900, 50, 'X'),
(23, 2, 'Iron Plate', 2000, 100, 'X'),
(24, 2, 'Magic Armor', 4000, 125, 'maxmp,50'),
(25, 2, 'Dark Armor', 5000, 150, 'expbonus,-10'),
(26, 2, 'Bright Armor', 10000, 175, 'expbonus,10'),
(27, 2, 'Destiny Raiment', 50000, 200, 'dexterity,50'),
(28, 3, 'Reed Shield', 50, 2, 'X'),
(29, 3, 'Buckler', 100, 4, 'X'),
(30, 3, 'Small Shield', 500, 10, 'X'),
(31, 3, 'Large Shield', 2500, 30, 'X'),
(32, 3, 'Silver Shield', 10000, 60, 'X'),
(33, 3, 'Destiny Aegis', 25000, 100, 'maxhp,50');";
if (ct($link,$sql)) { echo "<span style='background:green;'>Items table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating Items table.</span>";}



$sql = "CREATE TABLE `$levels` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `1_exp` bigint(15) unsigned NOT NULL default '0',
  `1_hp` smallint(5) unsigned NOT NULL default '0',
  `1_mp` smallint(5) unsigned NOT NULL default '0',
  `1_tp` smallint(5) unsigned NOT NULL default '0',
  `1_strength` smallint(5) unsigned NOT NULL default '0',
  `1_dexterity` smallint(5) unsigned NOT NULL default '0',
  `1_spells` int(5) unsigned NOT NULL default '0',
  `2_exp` bigint(15) unsigned NOT NULL default '0',
  `2_hp` smallint(5) unsigned NOT NULL default '0',
  `2_mp` smallint(5) unsigned NOT NULL default '0',
  `2_tp` smallint(5) unsigned NOT NULL default '0',
  `2_strength` smallint(5) unsigned NOT NULL default '0',
  `2_dexterity` smallint(5) unsigned NOT NULL default '0',
  `2_spells` int(5) unsigned NOT NULL default '0',
  `3_exp` bigint(15) unsigned NOT NULL default '0',
  `3_hp` smallint(5) unsigned NOT NULL default '0',
  `3_mp` smallint(5) unsigned NOT NULL default '0',
  `3_tp` smallint(5) unsigned NOT NULL default '0',
  `3_strength` smallint(5) unsigned NOT NULL default '0',
  `3_dexterity` smallint(5) unsigned NOT NULL default '0',
  `3_spells` int(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Levels table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Levels table.</span>";}



$sql = "
INSERT INTO `$levels` (`id`,`1_exp`,`1_hp`,`1_mp`,`1_tp`,`1_strength`,`1_dexterity`,`1_spells`,`2_exp`,`2_hp`,`2_mp`,`2_tp`,`2_strength`,`2_dexterity`,`2_spells`,`3_exp`,`3_hp`,`3_mp`,`3_tp`,`3_strength`,`3_dexterity`,`3_spells`) VALUES (1, 0, 15, 0, 5, 5, 5, 0, 0, 15, 0, 5, 5, 5, 0, 0, 15, 0, 5, 5, 5, 0),
 (2, 15, 2, 5, 1, 0, 1, 1, 18, 2, 4, 1, 2, 1, 1, 20, 2, 5, 1, 0, 2, 1),
 (3, 45, 3, 4, 2, 1, 2, 0, 54, 2, 3, 2, 3, 2, 0, 60, 2, 3, 2, 1, 3, 0),
 (4, 105, 3, 3, 2, 1, 2, 6, 126, 2, 3, 2, 3, 2, 0, 140, 2, 4, 2, 1, 3, 0),
 (5, 195, 2, 5, 2, 0, 1, 0, 234, 2, 4, 2, 2, 1, 6, 260, 2, 4, 2, 0, 2, 6),
 (6, 330, 4, 5, 2, 2, 3, 0, 396, 3, 4, 2, 4, 3, 0, 440, 3, 5, 2, 2, 4, 0),
 (7, 532, 3, 4, 2, 1, 2, 11, 639, 2, 3, 2, 3, 2, 0, 710, 2, 3, 2, 1, 3, 0),
 (8, 835, 2, 4, 2, 0, 1, 0, 1003, 2, 3, 2, 2, 1, 11, 1115, 2, 4, 2, 0, 2, 11),
 (9, 1290, 5, 3, 2, 3, 4, 2, 1549, 4, 2, 2, 5, 4, 0, 1722, 4, 2, 2, 3, 5, 0),
 (10, 1973, 10, 3, 2, 4, 3, 0, 2369, 10, 2, 2, 6, 3, 0, 2633, 10, 3, 2, 4, 4, 0),
 (11, 2997, 5, 2, 2, 3, 4, 0, 3598, 4, 1, 2, 5, 4, 2, 3999, 4, 1, 2, 3, 5, 2),
 (12, 4533, 4, 2, 2, 2, 3, 7, 5441, 4, 1, 2, 4, 3, 0, 6047, 4, 2, 2, 2, 4, 0),
 (13, 6453, 4, 3, 2, 2, 3, 0, 7745, 4, 2, 2, 4, 3, 0, 8607, 4, 2, 2, 2, 4, 0),
 (14, 8853, 5, 4, 2, 3, 4, 17, 10625, 4, 3, 2, 5, 4, 7, 11807, 4, 4, 2, 3, 5, 7),
 (15, 11853, 5, 5, 2, 3, 4, 0, 14225, 4, 4, 2, 5, 4, 0, 15808, 4, 4, 2, 3, 5, 0),
 (16, 15603, 5, 3, 2, 3, 4, 0, 18725, 5, 2, 2, 5, 4, 0, 20807, 5, 3, 2, 3, 5, 0),
 (17, 20290, 4, 2, 2, 2, 3, 12, 24350, 4, 1, 2, 4, 3, 0, 27057, 4, 1, 2, 2, 4, 0),
 (18, 25563, 4, 2, 2, 2, 3, 0, 30678, 3, 1, 2, 4, 3, 14, 34869, 3, 2, 2, 2, 4, 17),
 (19, 31495, 4, 5, 2, 2, 3, 0, 37797, 3, 4, 2, 4, 3, 0, 43657, 3, 4, 2, 2, 4, 0),
 (20, 38169, 10, 6, 2, 3, 3, 0, 45805, 10, 5, 2, 5, 3, 0, 53543, 10, 6, 2, 3, 4, 0),
 (21, 45676, 4, 4, 2, 2, 3, 0, 54814, 4, 3, 2, 4, 3, 0, 64664, 4, 3, 2, 2, 4, 0),
 (22, 54121, 5, 5, 2, 3, 4, 0, 64949, 4, 4, 2, 5, 4, 12, 77175, 4, 5, 2, 3, 5, 12),
 (23, 63622, 5, 3, 2, 3, 4, 0, 76350, 4, 2, 2, 5, 4, 0, 91250, 4, 2, 2, 3, 5, 0),
 (24, 74310, 5, 5, 2, 3, 4, 0, 89176, 4, 4, 2, 5, 4, 0, 107083, 4, 5, 2, 3, 5, 0),
 (25, 86334, 4, 4, 2, 2, 3, 3, 103605, 3, 3, 2, 4, 3, 17, 124895, 3, 3, 2, 2, 4, 14),
 (26, 99861, 6, 3, 2, 4, 5, 0, 119837, 5, 2, 2, 6, 5, 0, 144933, 5, 3, 2, 4, 6, 0),
 (27, 115078, 6, 2, 2, 4, 5, 0, 138098, 5, 1, 2, 6, 5, 0, 167475, 5, 1, 2, 4, 6, 0),
 (28, 132197, 4, 2, 2, 2, 3, 0, 158641, 4, 1, 2, 4, 3, 0, 192835, 4, 2, 2, 2, 4, 0),
 (29, 151456, 6, 3, 2, 4, 5, 0, 181751, 5, 2, 2, 6, 5, 3, 221365, 5, 2, 2, 4, 6, 3),
 (30, 173121, 10, 4, 3, 4, 4, 0, 207749, 10, 3, 3, 6, 4, 0, 253461, 10, 4, 3, 4, 5, 0),
 (31, 197494, 5, 5, 3, 3, 4, 8, 236996, 4, 3, 3, 5, 4, 0, 289568, 4, 3, 3, 3, 5, 0),
 (32, 224913, 6, 4, 3, 4, 5, 0, 269898, 5, 3, 3, 6, 5, 0, 330188, 5, 4, 3, 4, 6, 0),
 (33, 255758, 5, 4, 3, 3, 4, 0, 306912, 5, 3, 3, 5, 4, 0, 375885, 5, 3, 3, 3, 5, 0),
 (34, 290458, 6, 4, 3, 4, 5, 0, 348552, 5, 3, 3, 6, 5, 8, 427294, 5, 4, 3, 4, 6, 8),
 (35, 329495, 5, 3, 3, 3, 4, 0, 395397, 4, 2, 3, 5, 4, 0, 485126, 4, 2, 3, 3, 5, 0),
 (36, 373412, 4, 3, 3, 2, 3, 18, 448097, 5, 2, 3, 4, 3, 0, 550188, 5, 3, 3, 2, 4, 0),
 (37, 422818, 5, 4, 3, 3, 4, 0, 507384, 5, 3, 3, 5, 4, 0, 623383, 5, 3, 3, 3, 5, 0),
 (38, 478399, 6, 5, 3, 4, 5, 0, 574081, 5, 4, 3, 6, 5, 15, 705726, 5, 5, 3, 4, 6, 18),
 (39, 540927, 6, 4, 3, 4, 5, 0, 649115, 5, 3, 3, 6, 5, 0, 798362, 5, 3, 3, 4, 6, 0),
 (40, 611271, 15, 3, 3, 5, 5, 13, 733528, 15, 2, 3, 7, 5, 0, 902577, 15, 3, 3, 5, 6, 0),
 (41, 690408, 7, 3, 3, 5, 2, 0, 828492, 6, 2, 3, 7, 2, 0, 1019818, 6, 2, 3, 5, 3, 0),
 (42, 779437, 7, 4, 3, 5, 6, 0, 935326, 6, 3, 3, 7, 6, 0, 1151714, 6, 4, 3, 5, 7, 0),
 (43, 879592, 8, 5, 3, 6, 7, 0, 1055514, 7, 4, 3, 8, 7, 0, 1300096, 7, 4, 3, 6, 8, 0),
 (44, 992268, 6, 3, 3, 4, 5, 0, 1190725, 5, 2, 3, 6, 5, 0, 1448478, 5, 3, 3, 4, 6, 0),
 (45, 1119028, 5, 8, 3, 3, 4, 4, 1325936, 5, 8, 3, 5, 4, 18, 1596860, 5, 8, 3, 3, 5, 4),
 (46, 1245788, 6, 5, 3, 4, 5, 0, 1461147, 5, 4, 3, 6, 5, 0, 1745242, 5, 5, 3, 4, 6, 0),
 (47, 1372548, 7, 4, 3, 5, 6, 0, 1596358, 6, 3, 3, 7, 6, 0, 1893624, 6, 3, 3, 5, 7, 0),
 (48, 1499308, 6, 4, 3, 4, 5, 0, 1731569, 5, 3, 3, 6, 5, 0, 2042006, 5, 4, 3, 4, 6, 0),
 (49, 1626068, 5, 3, 3, 3, 4, 0, 1866780, 4, 2, 3, 5, 4, 0, 2190388, 4, 2, 3, 3, 5, 0),
 (50, 1752828, 15, 3, 3, 5, 5, 0, 2001991, 15, 2, 3, 7, 5, 0, 2338770, 15, 3, 3, 5, 6, 0),
 (51, 1879588, 6, 2, 3, 4, 5, 9, 2137202, 5, 1, 3, 6, 5, 13, 2487152, 5, 1, 3, 4, 6, 13),
 (52, 2006348, 7, 2, 3, 5, 6, 0, 2272413, 6, 1, 3, 7, 6, 0, 2635534, 6, 2, 3, 5, 7, 0),
 (53, 2133108, 8, 2, 3, 6, 7, 0, 2407624, 7, 1, 3, 8, 7, 0, 2783916, 7, 1, 3, 6, 8, 0),
 (54, 2259868, 8, 4, 3, 6, 7, 0, 2542835, 7, 3, 3, 8, 7, 0, 2932298, 7, 4, 3, 6, 8, 0),
 (55, 2386628, 7, 4, 3, 5, 6, 0, 2678046, 6, 3, 3, 7, 6, 0, 3080680, 6, 3, 3, 5, 7, 0),
 (56, 2513388, 7, 4, 3, 5, 6, 0, 2813257, 6, 3, 3, 7, 6, 0, 3229062, 6, 4, 3, 5, 7, 9),
 (57, 2640148, 6, 5, 3, 4, 5, 0, 2948468, 6, 4, 3, 6, 5, 0, 3377444, 6, 4, 3, 4, 6, 0),
 (58, 2766908, 5, 5, 3, 3, 4, 0, 3083679, 5, 4, 3, 5, 4, 19, 3525826, 5, 5, 3, 3, 5, 0),
 (59, 2893668, 8, 3, 3, 6, 7, 0, 3218890, 7, 2, 3, 8, 7, 0, 3674208, 7, 2, 3, 6, 8, 0),
 (60, 3020428, 15, 4, 4, 6, 6, 19, 3354101, 15, 3, 4, 8, 6, 0, 3822590, 15, 4, 4, 6, 7, 15),
 (61, 3147188, 8, 5, 4, 6, 7, 0, 3489312, 7, 4, 4, 8, 7, 0, 3970972, 7, 4, 4, 6, 8, 0),
 (62, 3273948, 8, 4, 4, 6, 7, 0, 3624523, 7, 3, 4, 8, 7, 0, 4119354, 7, 4, 4, 6, 8, 0),
 (63, 3400708, 9, 5, 4, 7, 8, 0, 3759734, 8, 4, 4, 9, 8, 0, 4267736, 8, 4, 4, 7, 9, 0),
 (64, 3527468, 5, 5, 4, 3, 4, 0, 3894945, 5, 4, 4, 5, 4, 0, 4416118, 5, 5, 4, 3, 5, 0),
 (65, 3654228, 6, 4, 4, 4, 5, 0, 4030156, 6, 3, 4, 6, 5, 0, 4564500, 6, 3, 4, 4, 6, 0),
 (66, 3780988, 8, 4, 4, 6, 7, 0, 4165367, 8, 3, 4, 8, 7, 0, 4712882, 8, 4, 4, 6, 8, 0),
 (67, 3907748, 7, 3, 4, 5, 6, 0, 4300578, 7, 2, 4, 7, 6, 0, 4861264, 7, 2, 4, 5, 7, 0),
 (68, 4034508, 9, 3, 4, 7, 8, 0, 4435789, 8, 2, 4, 9, 8, 0, 5009646, 8, 3, 4, 7, 9, 0),
 (69, 4161268, 5, 4, 4, 3, 4, 0, 4571000, 5, 3, 4, 5, 4, 0, 5158028, 5, 3, 4, 3, 5, 0),
 (70, 4288028, 20, 4, 4, 6, 6, 5, 4706211, 20, 3, 4, 8, 6, 16, 5306410, 20, 4, 4, 6, 7, 0),
 (71, 4414788, 5, 5, 4, 3, 4, 0, 4841422, 5, 4, 4, 5, 4, 0, 5454792, 5, 4, 4, 3, 5, 0),
 (72, 4541548, 6, 2, 4, 4, 5, 0, 4976633, 5, 1, 4, 6, 5, 0, 5603174, 5, 2, 4, 4, 6, 0),
 (73, 4668308, 8, 4, 4, 6, 7, 0, 5111844, 8, 3, 4, 8, 7, 0, 5751556, 8, 3, 4, 6, 8, 0),
 (74, 4795068, 7, 5, 4, 5, 6, 0, 5247055, 6, 4, 4, 7, 6, 0, 5899938, 6, 5, 4, 5, 7, 0),
 (75, 4921828, 5, 3, 4, 3, 4, 0, 5382266, 5, 2, 4, 5, 4, 0, 6048320, 5, 2, 4, 3, 5, 0),
 (76, 5048588, 6, 3, 4, 4, 5, 0, 5517477, 6, 2, 4, 6, 5, 0, 6196702, 6, 3, 4, 4, 6, 0),
 (77, 5175348, 6, 4, 4, 4, 5, 0, 5652688, 7, 3, 4, 6, 5, 0, 6345084, 7, 3, 4, 4, 6, 0),
 (78, 5302108, 7, 4, 4, 5, 6, 0, 5787899, 7, 3, 4, 7, 6, 0, 6493466, 7, 4, 4, 5, 7, 0),
 (79, 5428868, 8, 4, 4, 6, 7, 10, 5923110, 7, 3, 4, 8, 7, 0, 6641848, 7, 3, 4, 6, 8, 0),
 (80, 5555628, 20, 5, 4, 6, 7, 0, 6058321, 20, 4, 4, 8, 7, 0, 6790230, 20, 5, 4, 6, 8, 0),
 (81, 5682388, 7, 3, 4, 5, 6, 0, 6193532, 7, 2, 4, 7, 6, 0, 6938612, 7, 2, 4, 5, 7, 0),
 (82, 5809148, 6, 4, 4, 4, 5, 0, 6328743, 5, 3, 4, 6, 5, 0, 7086994, 5, 4, 4, 4, 6, 0),
 (83, 5935908, 6, 2, 4, 4, 5, 0, 6463954, 6, 1, 4, 6, 5, 0, 7235376, 6, 1, 4, 4, 6, 0),
 (84, 6062668, 5, 4, 4, 3, 4, 0, 6599165, 5, 3, 4, 5, 4, 0, 7383758, 5, 4, 4, 3, 5, 0),
 (85, 6189428, 7, 4, 4, 5, 6, 0, 6734376, 6, 3, 4, 7, 6, 0, 7532140, 6, 3, 4, 5, 7, 0),
 (86, 6316188, 8, 5, 4, 6, 7, 0, 6869587, 8, 4, 4, 8, 7, 0, 7680522, 8, 5, 4, 6, 8, 0),
 (87, 6442948, 8, 4, 4, 6, 7, 0, 7004798, 7, 3, 4, 8, 7, 0, 7828904, 7, 3, 4, 6, 8, 0),
 (88, 6569708, 9, 5, 4, 7, 8, 0, 7140009, 8, 4, 4, 9, 8, 0, 7977286, 8, 5, 4, 7, 9, 0),
 (89, 6696468, 5, 2, 4, 3, 4, 0, 7275220, 5, 1, 4, 5, 4, 0, 8125668, 5, 1, 4, 3, 5, 0),
 (90, 6823228, 20, 2, 5, 7, 8, 0, 7410431, 20, 1, 5, 9, 8, 0, 8274050, 20, 2, 5, 7, 9, 0),
 (91, 6949988, 5, 3, 5, 3, 4, 0, 7545642, 5, 2, 5, 5, 4, 0, 8422432, 5, 2, 5, 3, 5, 0),
 (92, 7076748, 6, 3, 5, 4, 5, 0, 7680853, 4, 2, 5, 6, 5, 0, 8570814, 4, 3, 5, 4, 6, 0),
 (93, 7203508, 8, 4, 5, 6, 7, 0, 7816064, 6, 2, 5, 8, 7, 0, 8719196, 6, 2, 5, 6, 8, 0),
 (94, 7330268, 4, 4, 5, 3, 3, 0, 7951275, 4, 3, 5, 5, 3, 0, 8867578, 4, 4, 5, 3, 4, 0),
 (95, 7457028, 3, 3, 5, 5, 2, 0, 8086486, 4, 2, 5, 7, 2, 0, 9015960, 4, 2, 5, 5, 3, 0),
 (96, 7583788, 5, 3, 5, 4, 3, 0, 8221697, 5, 2, 5, 7, 3, 0, 9164342, 5, 3, 5, 4, 4, 0),
 (97, 7710548, 5, 4, 5, 4, 5, 0, 8356908, 5, 3, 5, 7, 5, 0, 9312724, 5, 3, 5, 4, 6, 0),
 (98, 7837308, 4, 5, 5, 4, 3, 0, 8492119, 4, 3, 5, 7, 3, 0, 9461106, 4, 4, 5, 4, 4, 0),
 (99, 7964068, 50, 5, 5, 6, 5, 0, 8627330, 50, 3, 5, 9, 5, 0, 9609488, 50, 4, 5, 6, 6, 0),
 (100, 16777215, 0, 0, 0, 0, 0, 0, 16777215, 0, 0, 0, 0, 0, 0, 16777215, 0, 0, 0, 0, 0, 0);";
if (ct($link,$sql)) { echo "<span style='background:green;'>Levels table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating Levels table.</span>";}



$sql = "CREATE TABLE `$monsters` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `maxhp` int(11) unsigned NOT NULL default '0',
  `maxdam` int(8) unsigned NOT NULL default '0',
  `armor` int(8) unsigned NOT NULL default '0',
  `level` int(8) unsigned NOT NULL default '0',
  `maxexp` int(8) unsigned NOT NULL default '0',
  `maxgold` int(8) unsigned NOT NULL default '0',
  `immune` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Monsters table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Monsters table.</span>";}



$sql = "
INSERT INTO `$monsters` (`id`,`name`,`maxhp`,`maxdam`,`armor`,`level`,`maxexp`,`maxgold`,`immune`) VALUES (1, 'Blue Slime', 4, 3, 1, 1, 1, 1, 0),
 (2, 'Red Slime', 6, 5, 1, 1, 2, 1, 0),
 (3, 'Critter', 6, 5, 2, 1, 4, 2, 0),
 (4, 'Creature', 10, 8, 2, 2, 4, 2, 0),
 (5, 'Shadow', 10, 9, 3, 2, 6, 2, 1),
 (6, 'Drake', 11, 10, 3, 2, 8, 3, 0),
 (7, 'Shade', 12, 10, 3, 3, 10, 3, 1),
 (8, 'Drakelor', 14, 12, 4, 3, 10, 3, 0),
 (9, 'Silver Slime', 15, 100, 200, 30, 15, 1000, 2),
 (10, 'Scamp', 16, 13, 5, 4, 15, 5, 0),
 (11, 'Raven', 16, 13, 5, 4, 18, 6, 0),
 (12, 'Scorpion', 18, 14, 6, 5, 20, 7, 0),
 (13, 'Illusion', 20, 15, 6, 5, 20, 7, 1),
 (14, 'Nightshade', 22, 16, 6, 6, 24, 8, 0),
 (15, 'Drakemal', 22, 18, 7, 6, 24, 8, 0),
 (16, 'Shadow Raven', 24, 18, 7, 6, 26, 9, 1),
 (17, 'Ghost', 24, 20, 8, 6, 28, 9, 0),
 (18, 'Frost Raven', 26, 20, 8, 7, 30, 10, 0),
 (19, 'Rogue Scorpion', 28, 22, 9, 7, 32, 11, 0),
 (20, 'Ghoul', 29, 24, 9, 7, 34, 11, 0),
 (21, 'Magician', 30, 24, 10, 8, 36, 12, 0),
 (22, 'Rogue', 30, 25, 12, 8, 40, 13, 0),
 (23, 'Drakefin', 32, 26, 12, 8, 40, 13, 0),
 (24, 'Shimmer', 32, 26, 14, 8, 45, 15, 1),
 (25, 'Fire Raven', 34, 28, 14, 9, 45, 15, 0),
 (26, 'Dybbuk', 34, 28, 14, 9, 50, 17, 0),
 (27, 'Knave', 36, 30, 15, 9, 52, 17, 0),
 (28, 'Goblin', 36, 30, 15, 10, 54, 18, 0),
 (29, 'Skeleton', 38, 30, 18, 10, 58, 19, 0),
 (30, 'Dark Slime', 38, 32, 18, 10, 62, 21, 0),
 (31, 'Silver Scorpion', 30, 160, 350, 40, 63, 2000, 2),
 (32, 'Mirage', 40, 32, 20, 11, 64, 21, 1),
 (33, 'Sorceror', 41, 33, 22, 11, 68, 23, 0),
 (34, 'Imp', 42, 34, 22, 12, 70, 23, 0),
 (35, 'Nymph', 43, 35, 22, 12, 70, 23, 0),
 (36, 'Scoundrel', 43, 35, 22, 12, 75, 25, 0),
 (37, 'Megaskeleton', 44, 36, 24, 13, 78, 26, 0),
 (38, 'Grey Wolf', 44, 36, 24, 13, 82, 27, 0),
 (39, 'Phantom', 46, 38, 24, 14, 85, 28, 1),
 (40, 'Specter', 46, 38, 24, 14, 90, 30, 0),
 (41, 'Dark Scorpion', 48, 40, 26, 15, 95, 32, 1),
 (42, 'Warlock', 48, 40, 26, 15, 100, 33, 1),
 (43, 'Orc', 49, 42, 28, 15, 104, 35, 0),
 (44, 'Sylph', 49, 42, 28, 15, 106, 35, 0),
 (45, 'Wraith', 50, 45, 30, 16, 108, 36, 0),
 (46, 'Hellion', 50, 45, 30, 16, 110, 37, 0),
 (47, 'Bandit', 52, 45, 30, 16, 114, 38, 0),
 (48, 'Ultraskeleton', 52, 46, 32, 16, 116, 39, 0),
 (49, 'Dark Wolf', 54, 47, 36, 17, 120, 40, 1),
 (50, 'Troll', 56, 48, 36, 17, 120, 40, 0),
 (51, 'Werewolf', 56, 48, 38, 17, 124, 41, 0),
 (52, 'Hellcat', 58, 50, 38, 18, 128, 43, 0),
 (53, 'Spirit', 58, 50, 38, 18, 132, 44, 0),
 (54, 'Nisse', 60, 52, 40, 19, 132, 44, 0),
 (55, 'Dawk', 60, 54, 40, 19, 136, 45, 0),
 (56, 'Figment', 64, 55, 42, 19, 140, 47, 1),
 (57, 'Hellhound', 66, 56, 44, 20, 140, 47, 0),
 (58, 'Wizard', 66, 56, 44, 20, 144, 48, 0),
 (59, 'Uruk', 68, 58, 44, 20, 146, 49, 0),
 (60, 'Siren', 68, 400, 800, 50, 10000, 50, 2),
 (61, 'Megawraith', 70, 60, 46, 21, 155, 52, 0),
 (62, 'Dawkin', 70, 60, 46, 21, 155, 52, 0),
 (63, 'Grey Bear', 70, 62, 48, 21, 160, 53, 0),
 (64, 'Haunt', 72, 62, 48, 22, 160, 53, 0),
 (65, 'Hellbeast', 74, 64, 50, 22, 165, 55, 0),
 (66, 'Fear', 76, 66, 52, 23, 165, 55, 0),
 (67, 'Beast', 76, 66, 52, 23, 170, 57, 0),
 (68, 'Ogre', 78, 68, 54, 23, 170, 57, 0),
 (69, 'Dark Bear', 80, 70, 56, 24, 175, 58, 1),
 (70, 'Fire', 80, 72, 56, 24, 175, 58, 0),
 (71, 'Polgergeist', 84, 74, 58, 25, 180, 60, 0),
 (72, 'Fright', 86, 76, 58, 25, 180, 60, 0),
 (73, 'Lycan', 88, 78, 60, 25, 185, 62, 0),
 (74, 'Terra Elemental', 88, 80, 62, 25, 185, 62, 1),
 (75, 'Necromancer', 90, 80, 62, 26, 190, 63, 0),
 (76, 'Ultrawraith', 90, 82, 64, 26, 190, 63, 0),
 (77, 'Dawkor', 92, 82, 64, 26, 195, 65, 0),
 (78, 'Werebear', 92, 84, 65, 26, 195, 65, 0),
 (79, 'Brute', 94, 84, 65, 27, 200, 67, 0),
 (80, 'Large Beast', 96, 88, 66, 27, 200, 67, 0),
 (81, 'Horror', 96, 88, 68, 27, 210, 70, 0),
 (82, 'Flame', 100, 90, 70, 28, 210, 70, 0),
 (83, 'Lycanthor', 100, 90, 70, 28, 210, 70, 0),
 (84, 'Wyrm', 100, 92, 72, 28, 220, 73, 0),
 (85, 'Aero Elemental', 104, 94, 74, 29, 220, 73, 1),
 (86, 'Dawkare', 106, 96, 76, 29, 220, 73, 0),
 (87, 'Large Brute', 108, 98, 78, 29, 230, 77, 0),
 (88, 'Frost Wyrm', 110, 100, 80, 30, 230, 77, 0),
 (89, 'Knight', 110, 102, 80, 30, 240, 80, 0),
 (90, 'Lycanthra', 112, 104, 82, 30, 240, 80, 0),
 (91, 'Terror', 115, 108, 84, 31, 250, 83, 0),
 (92, 'Blaze', 118, 108, 84, 31, 250, 83, 0),
 (93, 'Aqua Elemental', 120, 110, 90, 31, 260, 87, 1),
 (94, 'Fire Wyrm', 120, 110, 90, 32, 260, 87, 0),
 (95, 'Lesser Wyvern', 122, 110, 92, 32, 270, 90, 0),
 (96, 'Doomer', 124, 112, 92, 32, 270, 90, 0),
 (97, 'Armor Knight', 130, 115, 95, 33, 280, 93, 0),
 (98, 'Wyvern', 134, 120, 95, 33, 290, 97, 0),
 (99, 'Nightmare', 138, 125, 100, 33, 300, 100, 0),
 (100, 'Fira Elemental', 140, 125, 100, 34, 310, 103, 1),
 (101, 'Megadoomer', 140, 128, 105, 34, 320, 107, 0),
 (102, 'Greater Wyvern', 145, 130, 105, 34, 335, 112, 0),
 (103, 'Advocate', 148, 132, 108, 35, 350, 117, 0),
 (104, 'Strong Knight', 150, 135, 110, 35, 365, 122, 0),
 (105, 'Liche', 150, 135, 110, 35, 380, 127, 0),
 (106, 'Ultradoomer', 155, 140, 115, 36, 395, 132, 0),
 (107, 'Fanatic', 160, 140, 115, 36, 410, 137, 0),
 (108, 'Green Dragon', 160, 140, 115, 36, 425, 142, 0),
 (109, 'Fiend', 160, 145, 120, 37, 445, 148, 0),
 (110, 'Greatest Wyvern', 162, 150, 120, 37, 465, 155, 0),
 (111, 'Lesser Devil', 164, 150, 120, 37, 485, 162, 0),
 (112, 'Liche Master', 168, 155, 125, 38, 505, 168, 0),
 (113, 'Zealot', 168, 155, 125, 38, 530, 177, 0),
 (114, 'Serafiend', 170, 155, 125, 38, 555, 185, 0),
 (115, 'Pale Knight', 175, 160, 130, 39, 580, 193, 0),
 (116, 'Blue Dragon', 180, 160, 130, 39, 605, 202, 0),
 (117, 'Obsessive', 180, 160, 135, 40, 630, 210, 0),
 (118, 'Devil', 184, 164, 135, 40, 666, 222, 0),
 (119, 'Liche Prince', 190, 168, 138, 40, 660, 220, 0),
 (120, 'Cherufiend', 195, 170, 140, 41, 690, 230, 0),
 (121, 'Red Dragon', 200, 180, 145, 41, 720, 240, 0),
 (122, 'Greater Devil', 200, 180, 145, 41, 750, 250, 0),
 (123, 'Renegade', 205, 185, 150, 42, 780, 260, 0),
 (124, 'Archfiend', 210, 190, 150, 42, 810, 270, 0),
 (125, 'Liche Lord', 210, 190, 155, 42, 850, 283, 0),
 (126, 'Greatest Devil', 215, 195, 160, 43, 890, 297, 0),
 (127, 'Dark Knight', 220, 200, 160, 43, 930, 310, 0),
 (128, 'Giant', 220, 200, 165, 43, 970, 323, 0),
 (129, 'Shadow Dragon', 225, 200, 170, 44, 1010, 337, 0),
 (130, 'Liche King', 225, 205, 170, 44, 1050, 350, 0),
 (131, 'Incubus', 230, 205, 175, 44, 1100, 367, 1),
 (132, 'Traitor', 230, 205, 175, 45, 1150, 383, 0),
 (133, 'Demon', 240, 210, 180, 45, 1200, 400, 0),
 (134, 'Dark Dragon', 245, 215, 180, 45, 1250, 417, 1),
 (135, 'Insurgent', 250, 220, 190, 46, 1300, 433, 0),
 (136, 'Leviathan', 255, 225, 190, 46, 1350, 450, 0),
 (137, 'Grey Daemon', 260, 230, 190, 46, 1400, 467, 0),
 (138, 'Succubus', 265, 240, 200, 47, 1460, 487, 1),
 (139, 'Demon Prince', 270, 240, 200, 47, 1520, 507, 0),
 (140, 'Black Dragon', 275, 250, 205, 47, 1580, 527, 1),
 (141, 'Nihilist', 280, 250, 205, 47, 1640, 547, 0),
 (142, 'Behemoth', 285, 260, 210, 48, 1700, 567, 0),
 (143, 'Demagogue', 290, 260, 210, 48, 1760, 587, 0),
 (144, 'Demon Lord', 300, 270, 220, 48, 1820, 607, 0),
 (145, 'Red Daemon', 310, 280, 230, 48, 1880, 627, 0),
 (146, 'Colossus', 320, 300, 240, 49, 1940, 647, 0),
 (147, 'Demon King', 330, 300, 250, 49, 2000, 667, 0),
 (148, 'Dark Daemon', 340, 320, 260, 49, 2200, 733, 1),
 (149, 'Titan', 360, 340, 270, 50, 2400, 800, 0),
 (150, 'Black Daemon', 400, 400, 280, 50, 3000, 1000, 1),
 (151, 'Lucifuge', 600, 600, 400, 50, 10000, 10000, 2);";
if (ct($link,$sql)) { echo "<span style='background:green;'>Monsters table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating Monsters table.</span>";}



$sql = "CREATE TABLE `$news` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `postdate` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>News table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating News table.</span>";}


$sql = "INSERT INTO `$news` (`id`,`postdate`,`content`) VALUES (1, '2017-12-03 23:17:00', 'Use the admin panel to create a different news story. This is just a placeholder.');";
if (ct($link,$sql)) { echo "<span style='background:green;'>News table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating News table.</span>";}


$sql = "CREATE TABLE `$spells` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(40) NOT NULL default '',
  `mp` int(5) unsigned NOT NULL default '0',
  `attribute` int(5) unsigned NOT NULL default '0',
  `type` int(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Spells table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Spells table.</span>";}



$sql = "INSERT INTO `$spells` (`id`,`name`,`mp`,`attribute`,`type`) VALUES (1, 'Heal', 5, 10, 1),
 (2, 'Revive', 10, 25, 1),
 (3, 'Life', 25, 50, 1),
 (4, 'Breath', 50, 100, 1),
 (5, 'Gaia', 75, 150, 1),
 (6, 'Hurt', 5, 15, 2),
 (7, 'Pain', 12, 35, 2),
 (8, 'Maim', 25, 70, 2),
 (9, 'Rend', 40, 100, 2),
 (10, 'Chaos', 50, 130, 2),
 (11, 'Sleep', 10, 5, 3),
 (12, 'Dream', 30, 9, 3),
 (13, 'Nightmare', 60, 13, 3),
 (14, 'Craze', 10, 10, 4),
 (15, 'Rage', 20, 25, 4),
 (16, 'Fury', 30, 50, 4),
 (17, 'Ward', 10, 10, 5),
 (18, 'Fend', 20, 25, 5),
 (19, 'Barrier', 30, 50, 5);";
if (ct($link,$sql)) { echo "<span style='background:green;'>Spells table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating Spells table.</span>";}



$sql = "CREATE TABLE `$towns` (
  `id` int(5) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `latitude` int(11) NOT NULL default '0',
  `longitude` int(11) NOT NULL default '0',
  `innprice` int(10) NOT NULL default '0',
  `mapprice` int(10) NOT NULL default '0',
  `travelpoints` smallint(5) unsigned NOT NULL default '0',
  `itemslist` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Towns table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Towns table.</span>";}



$sql = "INSERT INTO `$towns` (`id`,`name`,`latitude`,`longitude`,`innprice`,`mapprice`,`travelpoints`,`itemslist`) VALUES (1, 'Midworld', 0, 0, 5, 0, 0, '1,2,3,17,18,19,28,29'),
 (2, 'Roma', 30, 30, 10, 25, 5, '2,3,4,18,19,29'),
 (3, 'Bris', 70, -70, 25, 50, 15, '2,3,4,5,18,19,20,29.30'),
 (4, 'Kalle', -100, 100, 40, 100, 30, '5,6,8,10,12,21,22,23,29,30'),
 (5, 'Narcissa', -130, -130, 60, 500, 50, '4,7,9,11,13,21,22,23,29,30,31'),
 (6, 'Hambry', 170, 170, 90, 1000, 80, '10,11,12,13,14,23,24,30,31'),
 (7, 'Gilead', 200, -200, 100, 3000, 110, '12,13,14,15,24,25,26,32'),
 (8, 'Endworld', -250, -250, 125, 9000, 160, '16,27,33');";
if (ct($link,$sql)) { echo "<span style='background:green;'>Towns table populated.<br /></span></span>";} else { echo "<span style='background:red;'>Error populating Towns table.</span>";}



$sql = "CREATE TABLE `$users` (
  `id` bigint(15) unsigned NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(256) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `verify` varchar(8) NOT NULL default '0',
  `charname` varchar(30) NOT NULL default '',
  `regdate` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
  `onlinetime` DATETIME NOT NULL DEFAULT '1970-01-01 00:00:00',
  `authlevel` tinyint(3) unsigned NOT NULL default '0',
  `latitude` int(11) NOT NULL default '0',
  `longitude` int(11) NOT NULL default '0',
  `difficulty` tinyint(3) unsigned NOT NULL default '0',
  `charclass` tinyint(4) unsigned NOT NULL default '0',
  `currentaction` varchar(30) NOT NULL default 'In Town',
  `currentfight` int(11) unsigned NOT NULL default '0',
  `currentmonster` int(10) unsigned NOT NULL default '0',
  `currentmonsterhp` int(11) unsigned NOT NULL default '0',
  `currentmonstersleep` tinyint(3) unsigned NOT NULL default '0',
  `currentmonsterimmune` tinyint(4) NOT NULL default '0',
  `currentuberdamage` tinyint(3) unsigned NOT NULL default '0',
  `currentuberdefense` tinyint(3) unsigned NOT NULL default '0',
  `currenthp` int(11) unsigned NOT NULL default '15',
  `currentmp` int(11) unsigned NOT NULL default '0',
  `currenttp` int(11) unsigned NOT NULL default '10',
  `maxhp` int(11) unsigned NOT NULL default '15',
  `maxmp` int(11) unsigned NOT NULL default '0',
  `maxtp` int(11) unsigned NOT NULL default '10',
  `level` int(11) unsigned NOT NULL default '1',
  `gold` bigint(20) unsigned NOT NULL default '100',
  `experience` bigint(20) unsigned NOT NULL default '0',
  `goldbonus` smallint(5) NOT NULL default '0',
  `expbonus` smallint(5) NOT NULL default '0',
  `strength` int(11) unsigned NOT NULL default '5',
  `dexterity` int(11) unsigned NOT NULL default '5',
  `attackpower` int(11) unsigned NOT NULL default '5',
  `defensepower` int(11) unsigned NOT NULL default '5',
  `weaponid` int(11) unsigned NOT NULL default '0',
  `armorid` int(11) unsigned NOT NULL default '0',
  `shieldid` int(11) unsigned NOT NULL default '0',
  `slot1id` int(11) unsigned NOT NULL default '0',
  `slot2id` int(11) unsigned NOT NULL default '0',
  `slot3id` int(11) unsigned NOT NULL default '0',
  `weaponname` varchar(50) NOT NULL default 'None',
  `armorname` varchar(50) NOT NULL default 'None',
  `shieldname` varchar(50) NOT NULL default 'None',
  `slot1name` varchar(50) NOT NULL default 'None',
  `slot2name` varchar(50) NOT NULL default 'None',
  `slot3name` varchar(50) NOT NULL default 'None',
  `dropcode` int(11) unsigned NOT NULL default '0',
  `spells` varchar(50) NOT NULL default '0',
  `towns` varchar(80) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;";
if (ct($link,$sql)) { echo "<span style='background:green;'>Users table created.<br /></span></span>";} else { echo "<span style='background:red;'>Error creating Users table.</span>";}

    
    $time = round((microtime() - $start), 4);
    echo "<br />Database setup complete in $time seconds.<br /><br /><a href=\"install2.php?page=3\">Click here to continue with installation.</a></body></html>";
}

function third() { // Third page: gather user info for admin account.

echo "
<html>
<head>
<title>Dragon Knight Installation</title>
</head>
<body>
<b>Dragon Knight Installation: Page Three</b><br /><br />
Now you must create an administrator account so you can use the control panel. Fill out the form below to create your account. You will be able to customize the class names through the control panel once your admin account is created.<br /><br />
<form action=\"install2.php?page=4\" method=\"post\">
<table width=\"50%\">
<tr><td width=\"20%\" style=\"vertical-align:top;\">Username:</td><td><input type=\"text\" name=\"username\" size=\"30\" maxlength=\"30\" placeholder=\"Username\" /><br /><br /><br /></td></tr>
<tr><td style=\"vertical-align:top;\">Password:</td><td><input type=\"password\" name=\"password1\" size=\"30\" maxlength=\"30\" placeholder=\"Password\" /></td></tr>
<tr><td style=\"vertical-align:top;\">Verify Password:</td><td><input type=\"password\" name=\"password2\" size=\"30\" placeholder=\"Verify Password\" maxlength=\"30\" /><br /><br /><br /></td></tr>
<tr><td style=\"vertical-align:top;\">Email Address:</td><td><input type=\"text\" name=\"email1\" size=\"30\" maxlength=\"100\"  placeholder=\"Email Address\" /></td></tr>
<tr><td style=\"vertical-align:top;\">Verify Email:</td><td><input type=\"text\" name=\"email2\" size=\"30\" maxlength=\"100\" placeholder=\"Verify Email\" /><br /><br /><br /></td></tr>
<tr><td style=\"vertical-align:top;\">Character Name:</td><td><input type=\"text\" name=\"charname\" size=\"30\" maxlength=\"30\" placeholder=\"Character Name\" /></td></tr>
<tr><td style=\"vertical-align:top;\">Character Class:</td><td><select name=\"charclass\"><option value=\"1\">Mage</option><option value=\"2\">Warrior</option><option value=\"3\">Paladin</option></select></td></tr>
<tr><td style=\"vertical-align:top;\">Difficulty:</td><td><select name=\"difficulty\"><option value=\"1\">Easy</option><option value=\"2\">Medium</option><option value=\"3\">Hard</option></select></td></tr>
<tr><td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Submit\" /> <input type=\"reset\" name=\"reset\" value=\"Reset\" /></td></tr>
</table>
</form>
</body>
</html>
";

}

function fourth() { // Final page: insert new user row, congratulate the person on a job well done.
    
	include("config.php");
	//include("lib2.php");
	
    extract($_POST);
    if (!isset($username)) { echo "Username is required."; }
    if (!isset($password1)) { echo "Password is required."; }
    if (!isset($password2)) { echo "Verify Password is required."; }
    if ($password1 != $password2) { echo "Passwords don't match."; }
    if (!isset($email1)) { echo "Email is required."; }
    if (!isset($email2)) { echo "Verify Email is required."; }
    if ($email1 != $email2) { echo "Emails don't match."; }
    if (!isset($charname)) { echo "Character Name is required."; }
    $password = md5($password1);  //Will move this to password_hash shortly
    $date = date('Y-m-d H:i:s');
    $users = $prefix . "_users";
    //$query = mysqli_query($link,"INSERT INTO $users (`id`,`username`,`password`,`email`,`verify`,`charname`,`charclass`,`regdate`,`onlinetime`,`authlevel`) VALUES ('1','$username','$password','$email1','1','$charname','$charclass','$date','$date','1';");
    if (!mysqli_query($link,"INSERT INTO $users (`id`,`username`,`password`,`email`,`verify`,`charname`,`charclass`,`regdate`,`onlinetime`,`authlevel`) VALUES ('1','$username','$password','$email1','1','$charname','$charclass','$date','$date','1')"))
  {
  echo("Error description: " . mysqli_error($link) . "<br />");
  }
	
	
echo "<html>
<head>
<title>Dragon Knight Installation</title>
</head>
<body>
<b>Dragon Knight Installation: Page Four</b><br /><br />
Your admin account was created successfully. Installation is complete.<br /><br />
Make sure the install.php is deleted from your Dragon Knight directory for security purposes. <br /><br />
You are now ready to <a href=\"index.php\">play the game</a>. Note that you must log in through the public section before being allowed into the control panel. Once logged in, an \"Admin\" link will appear in the Functions box of the left sidebar panel.<br /><br/>
Thank you for using Dragon Knight!<br /><br />-----<br /><br />

</body>
</html>";
}






?>

