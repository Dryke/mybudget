<?php
  require_once('config/config.php');

  $queries = array();
  $queries[] = 'DROP TABLE IF EXISTS user;';
  $queries[] = 'DROP TABLE IF EXISTS category;';
  $queries[] = 'DROP TABLE IF EXISTS transaction;';
  $queries[] = 'DROP TABLE IF EXISTS transaction_auto;';

  $queries[] = 'CREATE TABLE user(
    id INT NOT NULL auto_increment,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    date_add DATETIME NOT NULL,
    PRIMARY KEY(id)
  )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;';

  $queries[] = 'CREATE TABLE category(
    id INT NOT NULL auto_increment,
    id_parent INT DEFAULT 1,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
  )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;';

  $queries[] = 'CREATE TABLE transaction(
    id INT NOT NULL auto_increment,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    amount FLOAT(12,2) DEFAULT 0,
    sign INT(1) DEFAULT 0,
    date_add DATETIME NOT NULL,
    PRIMARY KEY(id)
  )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;';

  $queries[] = 'CREATE TABLE transaction_auto(
    id INT NOT NULL auto_increment,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    amount FLOAT(12,2) DEFAULT 0,
    sign INT(1) DEFAULT 0,
    date_execution DATETIME NOT NULL,
    PRIMARY KEY(id)
  )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;';

  foreach($queries as $query)
  {
    $db = new Db();
    $db->execute($query);
  }

  echo 'ok';
?>
