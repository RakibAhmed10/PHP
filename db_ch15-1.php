<?php
require 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

// define the products table
$query = 'CREATE TABLE IF NOT EXISTS ecomm_products (
        product_code  CHAR(5)      NOT NULL,
        name          VARCHAR(100) NOT NULL,
        description   MEDIUMTEXT,
        price         DEC(6,2)     NOT NULL,

        PRIMARY KEY(product_code)
    ) 	
    ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));

// define the customers table
$query = 'CREATE TABLE IF NOT EXISTS ecomm_customers (
        customer_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
        first_name  VARCHAR(20)      NOT NULL,
        last_name   VARCHAR(20)      NOT NULL,
        address_1   VARCHAR(50)      NOT NULL,
        address_2   VARCHAR(50),
        city        VARCHAR (20)     NOT NULL,
        state       CHAR(2)          NOT NULL,
        zip_code    CHAR(5)          NOT NULL,
        phone       CHAR(12)         NOT NULL,
        email       VARCHAR(100)     NOT NULL,

        PRIMARY KEY (customer_id)
    ) 	
    ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));

// define the general order table
$query = 'CREATE TABLE IF NOT EXISTS ecomm_orders (
        order_id            INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
        order_date          DATE             NOT NULL,
        customer_id         INTEGER UNSIGNED NOT NULL,
        cost_subtotal       DEC(7,2)         NOT NULL,
        cost_shipping       DEC (6,2),
        cost_tax            DEC(6,2),
        cost_total          DEC(7,2)         NOT NULL,
        shipping_first_name VARCHAR(20)      NOT NULL,
        shipping_last_name  VARCHAR(20)      NOT NULL,
        shipping_address_1  VARCHAR(50)      NOT NULL,
        shipping_address_2  VARCHAR(50),
        shipping_city       VARCHAR (20)     NOT NULL,
        shipping_state      CHAR(2)          NOT NULL,
        shipping_zip_code   CHAR(5)          NOT NULL,
        shipping_phone      CHAR(12)         NOT NULL,
        shipping_email      VARCHAR(100)     NOT NULL,

        PRIMARY KEY(order_id),
        FOREIGN KEY (customer_id) REFERENCES ecomm_customers(customer_id)
    ) 	
    ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));

// define the order details table
$query = 'CREATE TABLE IF NOT EXISTS ecomm_order_details (
        order_id     INTEGER UNSIGNED NOT NULL,
        order_qty    INTEGER UNSIGNED NOT NULL,
        product_code CHAR(5)          NOT NULL,

        FOREIGN KEY (order_id) REFERENCES ecomm_orders(order_id),
        FOREIGN KEY (product_code) REFERENCES ecomm_products(product_code)
    ) 	
    ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));

$query = 'CREATE TABLE IF NOT EXISTS ecomm_temp_cart (
        session      CHAR(50)         NOT NULL,
        product_code CHAR(5)          NOT NULL,
        qty          INTEGER UNSIGNED NOT NULL,

        PRIMARY KEY (session, product_code),
        FOREIGN KEY (product_code) REFERENCES ecomm_products(product_code)
    ) 	
    ENGINE=MyISAM';
mysql_query($query, $db) or die(mysql_error($db));

echo 'Success!';
?>