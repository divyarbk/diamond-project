<?php
	$config = mysql_connect('localhost','root','');
	if(!$config){
		die("Can not connect: ".mysql_error());
	}
	
	$sql = 'DROP DATABASE divyar_store';
	$result = mysql_query($sql);	
	if(mysql_query("CREATE DATABASE divyar_store",$config)){
		echo "Your Database was created successfully"."<br>";
	}else{
		echo "Error: " .mysql_error();
	}

	$select_db=mysql_select_db('divyar_store',$config);
	/*Create Customer Table*/
	
	$create_admin="CREATE TABLE `admin` (
				  `adminid` int(6) NOT NULL AUTO_INCREMENT,
				  `adminname` varchar(30) NOT NULL,
				  `password` varchar(50) NOT NULL,
				  PRIMARY KEY (`adminid`)
				  )AUTO_INCREMENT=100";
	
	if(mysql_query($create_admin)){
		mysql_query("INSERT INTO admin(adminname,password) VALUES('admin','21232f297a57a5a743894a0e4a801fc3')");
		echo "Admin Has Been Created"."<br>";
	}
	
	
	$create_customer="CREATE TABLE `customer` (
	  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
	  `customer_name` varchar(30) NOT NULL,
	  `customer_password` varchar(50) NOT NULL,
	  `customer_email` varchar(30) NOT NULL,
	  `customer_location` varchar(30) NOT NULL,
	  `customer_address` varchar(30) NOT NULL,
	  `customer_phone` int(11) NOT NULL,
	  `profile_img` TEXT NULL,
	  `created_date` TIMESTAMP NOT NULL,
	  PRIMARY KEY (`customer_id`)
	)";
	if(mysql_query($create_customer)){
		
		mysql_query('INSERT INTO customer(customer_name,customer_password,customer_email,customer_location,customer_address,customer_phone) VALUES("divyar","7d26e12c634a4e029def074d2dd417cf","khin@gmail.com","Mandalay","Mandalay","2147483647"),("jar","68995fcbf432492d15484d04a9d2ac40","jar@gmail.com","Mandalay","Mandalay","09988744747")');
		echo "Customer Has Been Created"."<br>";
	}
	
	$create_category="CREATE TABLE IF NOT EXISTS `category` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
	)";
	
	if(mysql_query($create_category)){
		mysql_query("INSERT INTO `category` (`id`, `name`) VALUES
					(1, 'Rings'),
					(2, 'Pendant'),
					(3, 'Necklaces'),
					(4, 'Earings')");
					echo "Category Has Been Created"."<br>";
	}
	
	
	$create_product="CREATE TABLE `product` (
	  `productid` int(6) NOT NULL AUTO_INCREMENT,
	  `productname` varchar(30) NOT NULL,
	  `producttype` int(11) NOT NULL,
	  `productprice` int(11) NOT NULL,
	  `productquantity` int(11) NOT NULL,
	  `productpicture` text NOT NULL,
	  `prodcutpicture1` text NOT NULL,
	  `prodcutpicture2` text NOT NULL,
	  `product_descrip` text NOT NULL,
	  `product_gender` varchar(10) NOT NULL,
	  PRIMARY KEY (`productid`),	  
	  FOREIGN KEY (producttype)  REFERENCES category(id) ON UPDATE CASCADE ON DELETE NO ACTION
	)";
	
	if(mysql_query($create_product)){		
		echo "Product Has Been Created"."<br>";
		mysql_query("INSERT INTO `product` (`productid`, `productname`, `producttype`, `productprice`, `productquantity`, `productpicture`, `prodcutpicture1`, `prodcutpicture2`, `product_descrip`, `product_gender`) VALUES
(1, 'Alecia Love Ring', 1, 599, 30, 'F5.jpg', 'F5.jpg', 'F5.jpg', 'Set in 18 Kt White Gold (1.33 gms) with Diamonds (0.05 Ct, IJ-SI) Certified by SGL', 'Female'),
(2, 'Diti 950 Platinum Diamond Ring', 1, 520, 50, 'F8.jpg', 'F8.jpg', 'F8.jpg', 'This ring is made from 950 Platinum\r\n\nProduct width is 7.13 mm and height is 19.64 mm\r\n\nThis ring has be', 'Female'),
(3, '950 Platinum Diamond Ring', 1, 620, 50, 'F9.jpg', 'F9.jpg', 'F9.jpg', 'This ring is made from Certified platinum 950\r\n\nThe ring has been adorned with real diamonds\r\n\nDiamond c', 'Female'),
(4, 'Sangini 18KY Gold Pendant', 2, 325, 50, 'F10.jpg', 'F10.jpg', 'F10.jpg', 'Featuring a leaf shaped 18KY glinting gold locket with a beautifully cut diamond resting in the cent', 'Female'),
(5, '1ct Famous Designer Heart Jewe', 1, 430, 50, '1ct-Famous-Designer-Heart-Jewelry-Wholesale-Synthetic-Diamond-Rings-Set-Women-Engagement-Sterling-Silver-Women-Jewelry.jpg', '1ct-Famous-Designer-Heart-Jewelry-Wholesale-Synthetic-Diamond-Rings-Set-Women-Engagement-Sterling-Silver-Women-Jewelry.jpg', '1ct-Famous-Designer-Heart-Jewelry-Wholesale-Synthetic-Diamond-Rings-Set-Women-Engagement-Sterling-Silver-Women-Jewelry.jpg', '1ct Famous Designer Heart Jewelry Wholesale Synthetic Diamond Rings Set Women Engagement Sterling Si', 'Female'),
(6, 'Elegance', 1, 1370, 50, 'elegance-1.jpg', 'elegance-1.jpg', 'elegance-1.jpg', 'Solitaire engagement ring with a 1.01ct Brilliant cut diamond in a 6 claw setting. 2.5mm rounded ban', 'Female'),
(7, 'Diamond Pendant', 2, 620, 50, 'diamond-pendant-1.jpg', 'diamond-pendant-1.jpg', 'diamond-pendant-1.jpg', 'Custom made pendant in 9ct White Gold, featuring one 0.50ct Brilliant cut diamond in a 4 claw settin', 'Female'),
(8, 'Cluster Pendant', 2, 501, 50, 'cluster-pendant-1.jpg', 'cluster-pendant-1.jpg', 'cluster-pendant-1.jpg', 'Custom made cluster pendant, featuring seven 0.10ct Brilliant cut diamonds, claw set in a 9ct White', 'Female'),
(9, '14K-Gold-Mens-Ring-268-Ctw-MR2', 1, 3200, 20, 'Screen Shot 2016-06-13 at 2.23.39 AM.png', 'Screen Shot 2016-06-13 at 2.23.39 AM.png', 'Screen Shot 2016-06-13 at 2.23.39 AM.png', 'This Men`s Diamond Ring is made of 14K White Gold , along with stunning hand-picked diamonds.Each ring is immaculately made, finished and polished by our highly skilled craftspeople here in the US. All diamonds are set one by one with advanced technology precision tools to create security and long lasting wear. This Diamond Ring has a Shiny finish and it is set with 46 Round Brilliant Cut Stones.', 'Male'),
(10, '14K Gold Men`s Ring 0.60 Ctw. ', 1, 2500, 20, 'Screen Shot 2016-06-13 at 2.28.26 AM.png', 'Screen Shot 2016-06-13 at 2.28.26 AM.png', 'Screen Shot 2016-06-13 at 2.28.26 AM.png', 'This Men`s Diamond Ring is made of 14K White Gold , along with stunning hand-picked diamonds.Each ring is immaculately made, finished and polished by our highly skilled craftspeople here in the US. All diamonds are set one by one with advanced technology precision tools to create security and long lasting wear. This Diamond Ring has a Shiny finish and it is set with 20 Round Brilliant Cut Stones.', 'Male'),
(11, '1 Carat Classic Porcelain Rang', 1, 2700, 20, '1-Carat-Classic-Porcelain-Range-Design-Male-Jewelry-Sterling-Silver-Synthetic-Diamond-Carbon-Ring-Man-Wedding.jpg', 'Screen Shot 2016-06-13 at 2.33.50 AM.png', 'Screen Shot 2016-06-13 at 2.32.57 AM.png', '1 Carat Classic Porcelain Range Design Male Jewelry Sterling Silver Synthetic Diamond Carbon Ring Man Wedding Ring', 'Male'),
(12, '0.45CT Royal Design', 1, 780, 30, 'Screen Shot 2016-06-13 at 2.39.03 AM.png', 'Screen Shot 2016-06-13 at 2.39.27 AM.png', 'Screen Shot 2016-06-13 at 2.39.17 AM.png', '0.45CT Royal Design Male Jewelry Sterling Silver Synthetic Diamond Carbon Ring For Men''s Birthday Man Wedding Ring', 'Male'),
(13, 'Diamond Ring Solitaire', 1, 350, 50, 'gold-diamond-ring-500x500.jpg', 'gold-diamond-ring-250x250.jpg', 'gold-diamond-ring-500x500.jpg', 'Backed by a team of creative and skilled designers, we are gainfully engaged in manufacturing and supplying an excellent range of Diamond Ring Solitaire. Renowned for its elegant design and high gloss finish, these rings are designed from the pure gold and diamond, using hi-tech tools in sync with the international standards of quality. These flawlessly finished rings are offered in diverse specifications to satisfactorily fulfill specific needs of our clients. Apart from this, our product adds an extra touch of beauty to the ones that wear these rings.', 'Female')		
		");
		
	}
	
	
	$create_order="CREATE TABLE `order`(
		`order_id` int(11) NOT NULL AUTO_INCREMENT,
		`customer_id` int(11) NOT NULL,
		`delivery_address` varchar(100) NOT NULL,
		`delivery_phone` int(11) NOT NULL,
		`bank_account` varchar(50) NOT NULL,
		`total` int NOT NULL,
		`order_date` TIMESTAMP NOT NULL,
		`payment` ENUM('pendding','paid') NOT NULL,
		PRIMARY KEY (`order_id`),
		CONSTRAINT `fk_customerid` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) 
		
	
	)";
	if(mysql_query($create_order)){		
		echo "Order Has Been Created"."<br>";
	}
	
	
	$create_orderdetail="CREATE TABLE `order_detail` (
		`orderdetail_id` int NOT NULL AUTO_INCREMENT,
	  `order_id` int(11) NOT NULL,
	  `productid` int(11) NOT NULL,
	  `price` int(11) NOT NULL,
	  `photo` text NOT NULL,
	  `quantity` int(11) NOT NULL,
	  `size` int(11) NOT NULL,
	  PRIMARY KEY (`orderdetail_id`),	  
	  CONSTRAINT `fk_orderid` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
	  CONSTRAINT `fk_productid` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`)
	)";
	if(mysql_query($create_orderdetail)){		
		echo "Order_detail Has Been Created"."<br>";
	}
	
	$create_payment="CREATE TABLE `payment`(
		`pay_id` int(11) NOT NULL AUTO_INCREMENT,
		`order_id` int(11) NOT NULL,
		`customer_id` int(11) NOT NULL,
		`status` ENUM('pending','paid') NOT NULL,
		PRIMARY KEY (`pay_id`),
		CONSTRAINT `p_customerid` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`), 
		CONSTRAINT `p_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`)
	
	)";
	if(mysql_query($create_payment)){		
		echo "Payment Has Been Created"."<br>";
	}
	
	$create_bank="CREATE TABLE `bank`(
		`bank_id` int(11) NOT NULL AUTO_INCREMENT,
		`username` varchar (50) NOT NULL,
		`account` varchar(30) NOT NULL,
		`amount` int NOT NULL,
		PRIMARY KEY (`bank_id`)
		
	
	)";
	if(mysql_query($create_bank)){
		mysql_query('INSERT INTO bank(username,account,amount) VALUES("divyar",99900152458,500000),("jar",99900152459,600000)');		
		echo "Bank Has Been Created"."<br>";
	}
	
	?>