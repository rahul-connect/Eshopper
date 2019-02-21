-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 09:02 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `title`) VALUES
(1, 'Samsung'),
(4, 'Apple'),
(6, 'PUMA'),
(7, 'Vero Moda'),
(8, 'Reebok'),
(9, 'Godrej'),
(10, 'Classmate'),
(11, 'Raymond'),
(12, 'Allen Solly'),
(13, 'Prestige');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_title` varchar(1000) NOT NULL,
  `p_image` varchar(1000) NOT NULL,
  `p_price` varchar(1000) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `session_id` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `p_title`, `p_image`, `p_price`, `p_qty`, `session_id`) VALUES
(2, 42, 'Puma Men Grey  T-shirt', 'Front_Medium (2)dsfsssa.jpg', '1400', 2, 'of6nj152nqvk112a4f5nalu5a1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Electronics'),
(3, 'Mens'),
(4, 'Women'),
(5, 'Households'),
(6, 'Stationery'),
(7, 'Footwears'),
(8, 'Furnitures');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(250) NOT NULL,
  `c_session` varchar(200) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_pass` varchar(200) NOT NULL,
  `c_image` varchar(5000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_session`, `c_name`, `c_email`, `c_pass`, `c_image`) VALUES
(7, 'sgc31ii06pfn3o38q25ic07bk7', 'Rahul Agarwal', 'rahulmma.ra@gmail.com', 'rahul', 'rahul.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_pass`
--

CREATE TABLE IF NOT EXISTS `forgot_pass` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE IF NOT EXISTS `order_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_status` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `order_id`, `user_id`, `order_name`, `city`, `address`, `total_amount`, `order_status`) VALUES
(1, 3257035, 7, 'Rahul Agarwal', 'Bangalore', 'Near Kormangala Police Station , 8th Block.', 2800, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `pro_id`, `qty`) VALUES
(1, 3257035, 42, 1),
(2, 3257035, 41, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_category` varchar(250) NOT NULL,
  `p_sub` varchar(255) NOT NULL,
  `p_brand` varchar(250) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_desc` varchar(5000) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `p_category`, `p_sub`, `p_brand`, `p_price`, `p_desc`, `p_qty`, `p_image`) VALUES
(2, 'Apple iPhone 6 Plus', '2', '1', '4', 41000, 'The Order Quantity is Limited to 2 Units Per Customer for iPhone. Connectivity and Phone Features depend on the Carrier and the Location of the User.The best part of the iPhone 6 Plus is its innovative design. The cover glass curves around the sides to join the anodised aluminum enclosure in a modest design with no distinct edges or gaps. It''s a seamless fusion of metal and glass that feels incredible in your hands.The iPhone 6 Plus comes with a 5.5-inch Retina HD display that can produce a pixel resolution of 1920x1080 at 401 Pixels per inch. The Multi-touch Display comes with full sRGB color standards, white balance and brightness. The phone also uses UV light to rightly position the display''s liquid crystals, resulting in a better viewing experience.', 5, 'apple2.jpeg'),
(3, 'SAMSUNG Galaxy J7', '2', '1', '1', 16000, 'Are you planning on getting a new phone? You can take a look at this Samsung smartphone as it offers a high performance, a long battery life and an optimal camera performance.Thanks to the Super AMOLED 13.90-cm HD display (1280x720), you can enjoy a rich browsing and movie-watching experience on this phone. The display ensures brighter colour reproduction and a deeper contrast to give a life-like viewing experience.', 8, 'amsung.jpeg'),
(4, 'SAMSUNG Galaxy Note 4', '2', '1', '1', 28000, 'The Samsung Galaxy Note 4 boasts an incredible 5.7" Quad HD Super AMOLED Display that can produce vivid colors at an astonishing resolution of 2560x1440 pixels. It has a pixel density of 500 pixels per inch which delivers better clarity. You can even change your lock screen every hour for constant freshness throughout the day.Whether it''s bright or dark, the Note 4''s 16 Mega Pixel Smart OIS (Optical Image Stabilization) primary camera will always give you incredible results. Take clear selfies with this phone''s powerful secondary 3.7 Mega Pixel camera with a 120 degree wide angle feature that allows you to capture more in your picture.', 2, 'note4.jpeg'),
(5, 'Puma Brilliance DP', '7', 'null', '6', 1200, 'Key Features of Puma Brilliance DP Men Running Shoes\r\nColour: Grey\r\nClosure: Laced.\r\nweight:336g', 8, 'puma.jpeg'),
(7, 'Godrej Interio Bed', '8', 'null', '9', 22000, 'Morpheus king bed has a metal construction that gives it its firmness and stability. It is contemporary and stylish, in wine red colour. The bed features 15 metal slats in the bed frame for extra support to the mattress. It has an inclined headboard which provides ease while sitting. The almond-coloured cushions give you the comfort you require when you lean on them to read a book or work on your laptop. The optional understorage of this bed helps tidy your room and keep it clutter free. This is a perfect pick if space and style is your requirement.', 3, 'bed.jpeg'),
(8, 'Godrej Wardrobe', '8', 'null', '9', 12000, 'Key Features of Godrej Interio Engineered Wood Free Standing Wardrobe\r\nWidth x Height: 900 mm x 2013 mm\r\nDoor Type: Hinged\r\n2 Doors\r\nKnock Down', 2, 'almirah.jpeg'),
(12, 'Vero Moda Black Pencil Skirt', '4', '11', '7', 1500, 'Giving a fashionable twist to formal wear is this black coloured pencil skirt from VERO MODA, owing to its unique yet trendy design. Fashioned from polyester spandex fabric, this skirt is highly comfortable and has an added stretch quality. The pleats on this skirt lend a stylish look to it. This skirt can be paired with matching stilettos and a white coloured top.\r\nPolyester spandex fabric\r\nSlim fit\r\nKnee length\r\nLoops for belt on the waist\r\nZip closure at the back', 4, 'vra.jpg'),
(13, 'Apple MacBook Air', '2', '4', '4', 60000, 'Enjoy a super-fast performance with minimum power consumption, thanks to the 1.6 GHz Intel Core i5 processor (with Turbo Boost up to 2.7 GHz). The 4 GB RAM complements the processing power of the laptop. With the Intel HD Graphics 6000, graphics-intensive apps and 3D games run smoothly.Extremely thin and lightweight, this beautifully designed MacBook Air boasts a sleek unibody construction. It features a full-size keyboard with an ambient light sensor and a multi-touch trackpad.', 6, 'apple.jpeg'),
(15, 'Classmate Octane Gel Pen', '6', 'null', '10', 150, 'Classmate Octane Gel Pen. The Perfect Pen Is A Must To Sign Off A Deal Or Leave A Note For A Loved Or Just Plain Filing Minutes At A Meeting So Gear Up With The Best That The Stationery World Has To Offer. Rubber Grip For Easy Writing Constructed With A Rubber Grip, This Pen Gives Your Hand The Best Grip So There Is Easy Flow While Writing And No Accidents. The Grip Also Makes Sure That The Pen Does Not Fall Out Easily Or Roll Off The Table. Water Resistant Ink-Smudge Freethe Pen Offers Smudge Proof Writing As The Ink Is Water Resistant And You Can Always Be Sure Your Information Stays Safe And Does Not Bleed Out.', 50, 'pen.jpeg'),
(16, 'Classmate A4 Notebook', '6', 'null', '10', 150, 'Keep all important writings and notes from lectures organized in one place in these A4 notebooks from Classmate. Packed in a set of 2, these notebooks have 180 pages that are tightly bound in an attractive blue soft cover.\r\nEco-friendly, Single Line, 180 Pages\r\nThe elemental chlorine-free paper used in the making of these notebooks has a smooth surface that offers a pleasurable writing experience. Pen down your thoughts or important learnings at school, college or office in this single line notebook that resists tearing apart.', 100, 'note.jpeg'),
(17, 'Classmate asteroid Geometry Box', '6', 'null', '10', 220, 'I Personally love this product. \r\nIt has amazing features. \r\nThe scale and compass is the best. \r\nThe scale can be folded n all. It''s 15 cm but also 30 cm. (Idk how to explain. :P)\r\nThe compass can be a compass and a divider. (Not at the same time).\r\nTHe only problem is, The scale can break, if not handled properly. \r\nWithout the scale, Protractor, set square will fall off. \r\nOverall product is amazing. :D\r\nI''d recommend you to buy it if you''re okay with everything. :)\r\n', 20, 'geo.jpeg'),
(18, 'Reebok Sonic Run', '7', 'null', '8', 1500, 'Sizes are in UK	Type : Sport Shoes	Sole Material : Rubber	Disclaimer : Product colour may slightly vary due to photographic lighting sources or your monitor settings', 4, 'reebok.jpg'),
(19, 'Puma Men Black Blazer', '3', '12', '6', 4000, 'Look stylish and cool with a sporty look in this blazer from Puma. Wear it on top of a T-shirt or a shirt, paired with skinny jeans and sports sneakers for an ideal look.Black, woven blazer, V neck with a knit, ribbed spread collar, has  notched lapel , full button placket, long panelled sleeves with button cuffs, has corduroy elbow patches with stitch detail, welt pocket on the left side of the chest with ribbed mouth, patch pockets on the waist with ribbed mouths, panelled at back with a centre split', 2, 'blaz.jpg'),
(20, 'Raymond Blue Solid  Blazer', '3', '12', '11', 5001, 'Give the style-gazers something to talk about the next time you head for a party wearing this blue blazer from Raymond. Offering slim fit, this blazer is finished with a lapel collar and flap pockets. Wear this linen blazer over a shirt with trousers to fetch you endless compliments.', 3, 'ray.jpg'),
(21, 'Raymond Navy Blue Blazer', '3', '12', '11', 4500, 'Make a style statement as you walk in a party wearing this blazer from Raymond. Fashioned from rayon, this bandhgala blazer is accented with a concealed and flap pockets. Wear this slim-fit blazer over a shirt with trousers .', 6, 'raymond.jpg'),
(22, 'Raymond Brown & Black', '3', '12', '11', 5999, 'Get a sophisticated look in this stylish blazer from Raymond. This piece is bound to make heads turn your way. We suggest you team it with a slim fit shirt, a pair of trousers and loafers for a classy look.Brown and black woven houndstooth checked blazer, has a notched lapel, a single-breasted design with a double button closure on the front, padded shoulders, long sleeves with buttoned detailing along the hems, has three pockets, has slits on the back, two inner pockets ', 2, 'bla.jpg'),
(23, 'Puma Men Navy Slim Fit Jeans', '3', '9', '6', 2024, 'Navy blue, 5 pocket, mid-rise jeans, has a waistband with belt loops, button and zip fly closure, 2 scoop pockets on the front sides and a coin pocket on the right side, has rivet trims with branding, 2 patch pockets on the back with branding on the right back pocket, brand patch on the waistband at the back, contrast stitch detail throughout', 4, 'puma.jpg'),
(24, 'PUMA Blue Dirty Worn Jeans', '3', '9', '6', 2999, 'A pair of blue 5-pocket mid-rise jeans, heavily washed, has a zip fly with a button closure, a waistband with belt loops, 2 scoop pockets on either side on the front with metallic rivets, 1 coin pocket on the right with metallic rivet and contrast stitch detail, has a yoke on the back, a patch pocket with stitch detail on either side with metallic rivets and a brand patch on the right pocket, a brand patch on the waistband on the back', 7, 'pum.jpg'),
(25, 'Puma Black Top', '4', '8', '6', 999, 'Puma is the name that comes to mind first when one talks about sportswear. Puma has shown tremendous growth from being a small shoe factory in Germany to the world''s leading companies today. Puma established in 1942 by Adolf and Rudolf Dassler, is a popular sportswear brand in the market. Aiming to be the most desirable and sustainable sports lifestyle company, Puma has become the top brand when it comes to fashion in sports. They design and develop sports apparel, footwear and accessories. ', 7, 'top.jpg'),
(26, 'Vero Moda Golden Strappy Top', '4', '8', '7', 398, 'Breathe a new life into your casual wardrobe in the form of this gold coloured top from VERO MODA. This regular-fit top will ensure a comfortable fit, courtesy its cotton blend fabric. Featuring lace detailing, this top will go well with a skirt and belly shoes.\r\n', 8, 'vero.jpg'),
(27, 'Vero Moda Black Regular Fit Top', '4', '8', '7', 1200, 'Sport an effortlessly chic look by teaming it with a pair of white skinny fit denims and sandals. Accessorize with a long chain necklace. ', 1000, 'black.jpg'),
(28, 'Vero Moda Red Regular Fit Top', '4', '8', '7', 1200, 'Paint the streets red by wearing this top with a pair of jeans and heels. Adorn the look with a wristwatch and carry a sling bag for a stunning look', 1, 'red.jpg'),
(33, 'VERO MODA Short Skirt', '3', '11', '7', 1400, 'We hate to play favorites, but if we were to pick one 70''s trend to adopt, we would pick up button-front skirt. It has been spotted everywhere and we''ve got one for you too. Pair yours with a crop shirt or classic white tucked-in shirt. Complete the girl next door look with suede heels and winged eye liner make-up.', 1, '78391_56eb302f29d04846d581ad0d389caba4_image1_zoom.jpg'),
(34, 'Vero Moda Light Blue Solid Flared Skirt', '4', '11', '7', 700, 'Complement your enviably toned legs in style with this blue flared skirt by VERO MODA. Featuring a solid design, it will go well with trendy tops and blouses. The fine cotton fabric further promises ultimate comfort and a soft feel.', 2, 'Vero-Moda-Light-Blue-Solid-Flared-Skirt-1233-9310312-1-pdp_slider_l.jpg'),
(35, 'Vero Moda Black Solid Flared Skirt', '4', '11', '7', 1300, 'Flaunt a structured, voguish silhouette at the next formal meet wearing this on-trend black skirt from VERO MODA. Done in soft viscose blend fabric in on-trend slim fit, this piece is best worked with platforms and a button-down top.', 5, 'Vero-Moda-Black-Solid-Flared-Skirt-5642-7510312-1-pdp_slider_l.jpg'),
(36, 'Vero Moda Off-White Mini Skirt', '4', '11', '7', 1300, 'Don this chic and trendy skirt and see compliments coming your way as you hang out with friends. Team it with a solid top and pumps for a complete ensemble.\r\nOff-white woven sequinned mini skirt, has an elasticated waistband and an attached inner lining', 2, '11447827940499-Vero-Moda-Off-White-Sequinned-Mini-Skirt-1281447827940039-1.jpg'),
(37, 'Vero Moda new Pencil Skirt', '4', '11', '7', 1999, 'Glam up your look with this trendy pencil skirt. Style it with a top and a pair of boots or heels to complete the look.\r\nBlack knitted pencil skirt with metallic detail throughout, has a short concealed zip closure on the left side and an attached lining', 1, 'Vero-Moda-Marquee-by-Karan-Johar-Black--Grey-Embellished-Mini-Skirt_1_7ba92a6bacf4fcf757e3beb9b7fe12aa.jpg'),
(38, 'Puma Men Black Regular Fit T-shirt', '3', '7', '6', 999, 'Black T-shirt, has a crew neck, short sleeves, printed branding on the front\r\nSize & Fit\r\nThe model (height 6''1" and shoulders 18") is wearing a size M\r\nMaterial and Care\r\nCotton; Machine-wash', 2, 'Front_Medium.jpg'),
(39, 'Puma Men Black Printed Cool T-shirt', '3', '7', '6', 1200, 'This tee can be teamed with a pair of track pants or shorts and sports shoes. Add on a cap and a thick strap watch to complete this look.', 2, 'Front_Medium (1).jpg'),
(40, 'Puma Men White Regular Fit T-shirt', '3', '7', '6', 999, 'You can team this tee with a pair of track pants and sports shoes. Add on a thick strap watch to complete this sporty outfit', 3, 'Front_Medium (2)fdzfdafa.jpg'),
(41, 'Puma Men Red Regular Fit T-shirt', '3', '7', '6', 700, 'Details\r\nRed woven T-shirt, has a ribbed crew neck, short sleeves, printed detail on the front\r\nSize & Fit\r\nThe model (height 6â€™ and shoulders 22â€) is wearing a size M\r\nMaterial and Care\r\nBlended; Hand-wash cold', 3, 'Front_Medium (2)jvhgj g.jpg'),
(42, 'Puma Men Grey  T-shirt', '3', '7', '6', 1400, 'Details\r\nGrey melange T-shirt, has a crew neck, long sleeves, printed branding on the front\r\nSize & Fit\r\nThe model (height 6''2" and shoulders 18.5") is wearing a size M\r\nMaterial and Care\r\nCotton; Machine-wash', 3, 'Front_Medium (2)dsfsssa.jpg'),
(46, 'Allen Solly  Red Checked Shirt', '3', '2', '12', 2300, 'This shirt from Allen Solly will give you the perfect amount of comfort and durability', 1, '11475137518932-Allen-Solly-Men-Red-Regular-Fit-Checked-Casual-Shirt-3361475137518723-1.jpg'),
(47, 'Allen Solly Men Navy Blue', '3', '2', '12', 2500, 'You''ll love the design', 1, '11473830980810-Allen-Solly-Men-Navy-Blue-Regular-Fit-Solid-Casual-Shirt-3121473830980524-1.jpg'),
(48, 'Allen Solly Men Rust Solid', '3', '2', '12', 300, 'new product', 2, '11475056583324-Allen-Solly-Men-Shirts-2361475056583036-1.jpg'),
(49, 'Solly Jeans Men Blue Slim', '3', '9', '12', 2500, 'buy now', 2, '11473764264047-Allen-Solly-Men-Blue-Slim-Fit-Low-Rise-Clean-Look-Jeans-1531473764263847-1.jpg'),
(50, 'Solly Jeans Co. Navy Washed Slim ', '3', '9', '12', 2600, 'allen solly', 2, '11454921895491-Allen-Solly-Navy-Washed-Slim-Fit-Jeans-2841454921895026-1.jpg'),
(51, 'Prestige PMC Cooker', '5', '', '13', 1200, 'prestige', 1, 'Prestige-PMC-1-0-Multi-SDL994995032-1-67b7c.jpg'),
(52, 'Prestige Gas Stoves', '5', '', '13', 1400, 'gas', 1, 'Prestige-Prithvi-1-Brass-Burner-SDL128021845-1-59208.jpg'),
(53, 'Prestige Pressure Cooker', '5', '', '13', 1229, 'cooker', 1, 'Prestige-5-Ltrs-Popular-Aluminium-1236770-1-59e43.jpg'),
(54, 'Samsung NP370R5E-S05IN', '2', '4', '1', 28000, 'laptop', 1, '$_12laptop.jpg'),
(55, 'Samsung Chromebook', '2', '4', '1', 22000, 'chromebook', 2, '$_12chromebooklaptop.jpg'),
(56, 'Puma Running Shoes', '7', '', '6', 1500, 'puma', 1, '$_12pumashoes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cat_id`, `name`) VALUES
(1, 2, 'Smartphone'),
(2, 3, 'Casual Shirts'),
(4, 2, 'Laptops'),
(6, 2, 'Cameras'),
(7, 3, 'T-shirt'),
(8, 4, 'Tops'),
(9, 3, 'Jeans'),
(11, 4, 'Skirts'),
(12, 3, 'Blazers');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_price` int(10) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `forgot_pass`
--
ALTER TABLE `forgot_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `forgot_pass`
--
ALTER TABLE `forgot_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
