-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 22. Maret 2013 jam 10:15
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trikarsa_corp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(2) NOT NULL,
  `active_admin` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `username`, `password`, `role_id`, `active_admin`) VALUES
(1, 'Trikarsa Web Developer', 'tss@tri-karsa.com', 'trikarsa', 'b427ebd39c845eb5417b7f7aaf1f9724', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahasa`
--

CREATE TABLE IF NOT EXISTS `bahasa` (
  `id_bahasa` int(2) NOT NULL AUTO_INCREMENT,
  `nama_bahasa` varchar(100) NOT NULL,
  `alias_bahasa` varchar(5) NOT NULL,
  PRIMARY KEY (`id_bahasa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `nama_bahasa`, `alias_bahasa`) VALUES
(1, 'English', 'en'),
(2, 'Indonesia', 'id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner_slideshow`
--

CREATE TABLE IF NOT EXISTS `banner_slideshow` (
  `id_banner_slide` int(2) NOT NULL AUTO_INCREMENT,
  `banner_slide_name` varchar(100) NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  `title_banner_slide` varchar(200) NOT NULL,
  `active_banner_slide` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_banner_slide`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `banner_slideshow`
--

INSERT INTO `banner_slideshow` (`id_banner_slide`, `banner_slide_name`, `bahasa_id`, `title_banner_slide`, `active_banner_slide`) VALUES
(4, 'be058c89b87cffed1694238e5a9a17c3.png', 1, 'Our Manager', '1'),
(2, '8a7815cdd6e6470fd4d3bd49f3d2a357.png', 1, 'Training Center', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(22, 1363848900, '127.0.0.1', 'zyF8ANHr'),
(21, 1363848649, '127.0.0.1', 'ui7OEZi7'),
(20, 1363848606, '127.0.0.1', 'Qm1g4nGV'),
(19, 1363848592, '127.0.0.1', 'iiafGWEH'),
(18, 1363848552, '127.0.0.1', 'orpBo1df'),
(17, 1363848535, '127.0.0.1', 'yssfBOiU'),
(16, 1363848530, '127.0.0.1', 'kfvuzlOb'),
(8, 1363847723, '127.0.0.1', 'kPmRloMY'),
(9, 1363847778, '127.0.0.1', 'I5b0Pmsy'),
(10, 1363847868, '127.0.0.1', '6ST6ZWkY'),
(11, 1363848006, '127.0.0.1', 'mRKUQ75Y'),
(12, 1363848016, '127.0.0.1', 'w1ncdElF'),
(13, 1363848217, '127.0.0.1', 'E1lkeO8p'),
(14, 1363848220, '127.0.0.1', 'pBSBSvY8'),
(15, 1363848398, '127.0.0.1', 'x8stQcbI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `id_career` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `position` varchar(200) NOT NULL,
  `devisi` varchar(100) NOT NULL,
  `date_posted` date NOT NULL,
  `deadline` date NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_career`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `career`
--

INSERT INTO `career` (`id_career`, `title`, `position`, `devisi`, `date_posted`, `deadline`, `description`, `status`) VALUES
(7, 'Job 3', 'Staff Accounting dan  Finance', 'Sales Center', '2013-02-01', '2013-02-28', '<p>Persyaratan :</p>\r\n<p>- Pria/ Wanita Usia Max. 30 Tahun</p>\r\n<p>- Mampu mengoperasikan komputer dengan baik ( Word, Excel)</p>\r\n<p>- Komunikatif, Jujur dan Loyalitas</p>\r\n<p>- Domisili Jakarta, Tangerang dan Bekasi</p>\r\n<p>- Minimal Pendidikan SMK Akuntansi / D3 Ekonomi / S1 Ekonomi</p>\r\n<p>- Pengalaman minimal 1 tahun sebagai Accounting / Finance</p>\r\n<p>- Menegerti Jurnal, AP dan AR</p>\r\n<p>&nbsp;</p>', '1'),
(8, 'Job 2', 'Supervisor Accounting Pajak', 'Sales Center', '2013-02-01', '2013-02-25', '<p>Persyaratan :</p>\r\n<p>- Komunikatif, Kreatif, Jujur &amp; Loyalitas</p>\r\n<p>- Minimal Pendidikan D3/ S1 Akuntansi</p>\r\n<p>- Pengalaman Minimal 2 tahun</p>\r\n<p>- Kursus brevet Pajak A dan B</p>\r\n<p>- Memahami proses pajak</p>', '1'),
(10, 'Job 1 ', 'Position 1', 'Multimedia', '2013-02-05', '2013-02-14', '<p>Description 1</p>', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `config_website`
--

CREATE TABLE IF NOT EXISTS `config_website` (
  `id_config` tinyint(1) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(200) NOT NULL,
  `meta_header` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `background_name` varchar(100) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `logo_name` varchar(100) NOT NULL,
  `banner_name` varchar(100) NOT NULL,
  `email_contact` varchar(100) NOT NULL,
  `footer` text NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `config_website`
--

INSERT INTO `config_website` (`id_config`, `website_name`, `meta_header`, `meta_description`, `background_name`, `icon_name`, `logo_name`, `banner_name`, `email_contact`, `footer`, `bahasa_id`) VALUES
(1, 'Trikarsa Website', 'Trikarsa, Website', 'Website Trikarsa', 'a84749d28910274337f842fb882aabb0.jpg', 'icon.png', 'logo-trikarsa.png', '4b935a90ae7d8e5f2d70b9030c5a4c3b.jpg', 'tss@tri-karsa.com', 'Copyright 2013 By PT Trikarsa Sistemindo . Versi 1.1.0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id_contact` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_pengirim` varchar(100) NOT NULL,
  `judul_contact` varchar(200) NOT NULL,
  `description_contact` text NOT NULL,
  `date_post` date NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id_contact`, `nama_pengirim`, `email_pengirim`, `judul_contact`, `description_contact`, `date_post`) VALUES
(3, 'Devi Firdaus Fauzi', 'dfedogawa3@yahoo.com', 'Coba Newsletter', 'Coba Isi Newsletter', '2013-03-19'),
(4, 'Devi Firdaus Fauzi', 'dfedogawa3@yahoo.com', 'Coba Newsletter', 'Coba Newsletter', '2013-03-19'),
(5, '20 percent off selected Furniture', 'dfedogawa3@yahoo.com', 'Coba Newsletter', 'Coba', '2013-03-19'),
(6, 'Devi Firdaus Fauzi', 'dfedogawa3@yahoo.com', 'Coba Newsletter', 'Coba', '2013-03-19'),
(7, 'Devi Firdaus Fauzi', 'dfedogawa3@yahoo.com', 'Coba Newsletter', 'cac', '2013-03-19'),
(8, 'Devi Firdaus Fauzi', 'dfedogawa3@yahoo.com', 'Coba Newsletter', 'sadasd', '2013-03-19'),
(9, 'Name', 'email', 'Subject', 'Description', '2013-03-21'),
(10, 'Name', 'devi@tri-karsa.com', 'Subject', 'Description', '2013-03-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id_content` int(20) NOT NULL AUTO_INCREMENT,
  `alias_content` varchar(100) NOT NULL,
  `judul_content` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `subkategori_id` int(11) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `publish_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `add_other_content` enum('0','1','2') NOT NULL DEFAULT '0',
  `hits` int(10) NOT NULL,
  `active_content` enum('0','1') NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  PRIMARY KEY (`id_content`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id_content`, `alias_content`, `judul_content`, `description`, `subkategori_id`, `kategori_id`, `publish_date`, `created_at`, `add_other_content`, `hits`, `active_content`, `bahasa_id`) VALUES
(6, 'trikarsa-membuka-cabang-baru-di-surabaya', 'Trikarsa membuka cabang baru di surabaya', '<p>Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya,&nbsp;Trikarsa membuka cabang baru di surabaya</p>', 0, 2, '2013-03-01', '2013-03-05 00:00:00', '0', 0, '1', 2),
(7, 'trikarsa-open-new-branch-at-surabaya', 'Trikarsa open new branch at surabaya', '<p>Trikarsa open new branch at surabaya,&nbsp;Trikarsa open new branch at surabaya,&nbsp;Trikarsa open new branch at surabaya,&nbsp;Trikarsa open new branch at surabaya,&nbsp;Trikarsa open new branch at surabaya,&nbsp;Trikarsa open new branch at surabaya</p>', 0, 2, '2013-03-02', '2013-03-05 00:00:00', '0', 0, '1', 1),
(8, 'about-trikarsa', 'About PT.Trikarsa Corp', '<p><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>', 0, 3, '2013-03-03', '2013-03-05 00:00:00', '0', 0, '1', 1),
(9, 'about-trikarsa-front', 'About PT. Trikarsa Corp', '<p><img style="float: left; margin-right: 10px; border: 1px solid #cccccc;" src="../../../asset/images/frontend/logo/bab.jpg" alt="" width="120" height="139" /></p>\r\n<p align="left">PT. Trikarsa Sempurna Sistemindo (TSS) was established in January 2006, TSS has established a commitment in providing quality computer tool for all customers. Currently, TSS has become one of the dealers for International brand products in the field of Hardware and Software to be one of the vendors in the field focus IT (IT specialist) and system integrators to provide solutions to the needs of company or corporate.</p>\r\n<p>Experience in sales and marketing in the information technology services / IT TSS set as one of the suppliers<br /> IT services and solutions that can be relied in Indonesia, a number of large companies such as petroleum (Oil Company), Banking and finance, telecommunications, government and others are customers who have working with TSS to date. By holding some brand proven class and supported the line strong organizational support and shape consistency in the after sales service is The main advantage of TSS in the face tough competition this time....</p>', 0, 11, '2013-03-01', '2013-03-05 00:00:00', '0', 0, '1', 1),
(11, 'server-storage-solution', 'Server & Storage Solution', '<p>Trikarsa delivers storage solutions built on technology from the world&rsquo;s leading manufacturer. We can provide complete storage solutions from the design through to implementation and manage all aspects of storage including backup, recovery, replication, de-duplication and security.</p>\r\n<p>We can design and build any server configuration for small, medium and large businesses and organisations. Our experts can design a server to suit your business; whether that be an economical, easily accessible with a small physical footprint, up to a high powered and high performance rack server.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Data is critical for any business and storage systems</span></strong><br />Trikarsa provides expert advice when businesses make a decision to upgrade their storage solution. A custom designed solution can mean lower costs for data storage costs and more efficient business<br />operations. We will ensure you are provided with a storage solution capable of supporting your business needs and scalable for the future. If your business is already working at storage capacity, this can bring serious resource issues and interruptions are likely to occur and may even lead to downtime of business critical IT systems which has the<br />ability to impact the service to your customers.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Choosing the right technology</span></strong><br />Trikarsa has helped many companies to establish and extend their storage facilities and will bring this experience to bear on your project. We can advise on storage expansion, security, network monitoring and reporting requirements. <br />We offer consultative selection, design, implementation and management of your storage systems, drawing on our working knowledge of the issues facing customers from diverse and demanding sectors such as legal and financial.</p>', 0, 8, '2013-03-01', '2013-03-08 00:00:00', '0', 0, '1', 1),
(13, 'corporate-value', 'Corporate Value', '<p>Customer First: We respond to customers speedily, courteously and effectively</p>\r\n<p>Individual Dignity: We value the individual, uphold the right to express disagreement, and respect the time and efforts of others. Nurture fairness, trust and respect</p>\r\n<p>Professionalism: We impart freedom and the opportunity to excel and to grow; support innovation and wellreasoned risk<br />taking, demanding performance</p>\r\n<p>Quality focus: We make quality a value driver in our work, our products and our interactions.&nbsp; Do it &ldquo;First Time Right&rdquo;</p>', 0, 7, '2013-03-01', '2013-03-11 00:00:00', '0', 0, '1', 1),
(12, 'vision-mision', 'Vision Mision', '<p><span style="font-size: small;"><strong>Our Vision</strong></span><br />To be the largest IT company in<br />Indonesia with the quality and range<br />of services in every corporate line by<br />adopting state-of-the-art technology<br />and with the commitment of<br />consistent, measurable and accurate<br />management.</p>\r\n<p><br /><strong><span style="font-size: small;">Our Mission</span></strong><br />To become better, stronger and<br />larger by improving the Company&rsquo;s<br />competitive edge in the domestic<br />market. To remain focused on<br />retaining customers and delivering<br />optimum services in consonance <br />with the Company policies.</p>', 0, 7, '2013-03-01', '2013-03-08 00:00:00', '0', 0, '1', 1),
(14, 'management-team', 'Management Team', '<div id="testimonial" class="section">\r\n<h1>Chairman of the Company</h1>\r\n<br />\r\n<div class="half left"><img style="border: solid 1px #CCCCCC; margin-right: 10px; float: left;" src="../../../asset/images/upload/bab.jpg" alt="" width="75" height="87" />\r\n<p>To be the largest IT company in indonesia with the quality and range of services in every corporate line by adopting state of the art technology and with the commitment of consistent,measurable and accurate management.<br /> <cite>Yuddi Herwanta - <span>CEO / DIRECTOR</span></cite><br /> <br /> <img style="border: solid 1px #CCCCCC; margin-right: 10px; float: left;" src="../../../asset/images/upload/ibu%20yance.jpg" alt="" width="75" height="86" />Our Sales Departement will delightfully serve you by giving price quotations for the best products in their respective classes as desired by the customers (costomized based on request) as at present the IT business. <br /><cite>Yance Mulyana - <span>Finance &amp; Accounting Devision </span></cite><br /><br /> <img style="border: solid 1px #CCCCCC; margin-right: 10px; float: left;" src="../../../asset/images/upload/rahmat.jpg" alt="" width="75" height="87" />Focusing on quality service and technology excellence has ensured a consistent, methodology and quality service and technology excellence has ensured a consistent methodology and quality training training throughout our local and regional.<br /> <cite>Rahmat Kurnia - <span>Depart. Manager Training Center Devision </span></cite></p>\r\n</div>\r\n<div class="half right"><img style="border: solid 1px #CCCCCC; margin-right: 10px; float: left;" src="../../../asset/images/upload/bos.png" alt="" width="75" height="87" />\r\n<p>Enterprise System Solutions enable your organization to keep pace with challenging real-time cemands of server and storage capacity, management and adminstration.</p>\r\n<p><cite>Wandi Herwanta - <span>Business Manager </span></cite><br /> <br /> <img style="border: solid 1px #CCCCCC; margin-right: 10px; float: left;" src="../../../asset/images/upload/aris.jpg" alt="" width="75" height="88" />Trikarsa has partnered with security-product manufacturers and service providers to bring you a comprehensive range of IT security solutions protecting enterprise information</p>\r\n<cite>Aris Ihwan - <span>Solutions Architecture Division </span></cite>\r\n<p><br /> <img style="border: solid 1px #CCCCCC; margin-right: 10px; float: left;" src="../../../asset/images/upload/christ.jpg" alt="" width="75" height="87" />A comprehensive portfolio of support services designed to meet any business,whatever your IT support requirement we have a service that can meet your needs.</p>\r\n<cite>Christian Latif - <span>Depart. Manager MID Range Solution </span></cite></div>\r\n</div>', 0, 7, '2013-03-01', '2013-03-11 00:00:00', '0', 0, '1', 1),
(15, 'branches', 'Branches', '<p><span><img src="../../../asset/images/frontend/logo/bab.jpg" alt="" width="200" height="231" />Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>', 0, 7, '2013-03-01', '2013-03-11 00:00:00', '0', 0, '1', 1),
(16, 'contact-us', 'Contact US', '<p><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>', 0, 7, '2013-03-01', '2013-03-11 00:00:00', '0', 0, '1', 1),
(17, 'overview', 'Overview', '<p style="text-align: justify;"><span style="font-size: medium;"><strong>About The Company</strong></span><br />Established in 2006 as a small team of only a handful of personnel, PT. Trikarsa Sempurna Sistemindo could penetrate the sensitive competitive Indonesian market. Gradually, the Company continued to improve the quality of its services to the customers who have entrusted their IT needs to the Company as IT vendor. Our customers&rsquo; trust and reference help expand the existing market share. Our measured planning and duplication process ran well<br />and could help increase the number of new clientele. Our continual evaluations&mdash;mapping our strengths and weaknesses as IT vendor&mdash;help make us aware of our future priorities. The placement of strategic components in the Company has become our priority as we believe that human resources are the key to our success and the continuity of our business. The recruitment process is of paramount importance.<br /><span style="font-size: small; color: #ff6600;"><strong>&ldquo;Human resources&nbsp; are the</strong></span> <span style="font-size: small; color: #ff6600;"><strong>greatest assets&rdquo;</strong></span><br />Therefore, the Management instructed the entire team to remain focused and work based on the strategic plan. Currently, PT. Trikarsa Sempurna Sistemindo employs a total of around 90 full-time staff plus outsourcing staff stationed at the customers&rsquo; respective offices. Each individual employee has the qualifications and experience in their respective fields.&nbsp; The management team have been recruited on the basis of competence and experience. Employee development, training and empowerment are our priorities in order to protect and guarantee business continuity as the Management view employees as the Company&rsquo;s vital asset. Data indicate that the Company&rsquo;s employee turnover is relatively&nbsp; small, which means our staff empowerment strategies run well.</p>\r\n<p style="text-align: justify;"><strong><span style="color: #ff6600; font-size: small;">&ldquo;To become better, stronger</span></strong> <strong><span style="color: #ff6600; font-size: small;">and larger &rdquo;</span></strong><br />We believe that in the years to come we will be much stronger, larger, more innovative and more valuable in the domestic market since we gradually continue to direct our corporate value to a more strategic direction. In November 2011, Trikarsa opened a branch in Surabaya. Gradually but surely, PT. Trikarsa Sempurna Sistemindo is forming ideal team in order to provide optimal services to corporate users. In addition, the Company can also retain, protect, and develop potential customers who have entrusted their IT needs to us as vendor. To maintain team performance to always reach the target, we continually review our performance, with many success stories and a few failures. <br />Trikarsa not only sales in IT Hardware but also Trikarsa have team support for always support our customers after sales services. We commit to customer for after sales service are done consistently&nbsp; to ensure that the customers get the best, in accordance with our commitment due to the highly competitive IT business. Practically all IT players offer aggressive prices and interesting service values.</p>\r\n<p style="text-align: justify;"><span style="font-size: small; color: #ff6600;"><strong>Account and</strong></span> <span style="font-size: small; color: #ff6600;"><strong>Revenue Growth</strong></span><br />In our first year, we had around 90 companies (account-based) entrusting us to be their permanent vendor to supply their companies&rsquo; IT needs. The number continued to grow year by year, which entailed a significant revenue groth. In the fifth year, nearly 400 customers entrusted the purchases of their IT needs (products, both hardware and software, and services) to us. To date we keep on extensifying our accounts gradually and consistently to play a more strategic role in the Indonesian market.<br /><strong><span style="color: #ff6600; font-size: small;">Extension of Service Range</span></strong><br />Planning is part of the Company&rsquo;s activities in the process of achieving the objectives. Strong commitment and execution as well as satisfactory services lead to increased customers&rsquo; trust. Demand for more IT services support has triggered us to keep adding resources in the support line.&nbsp; Our solutions now consist of five main pillars, that is, Mid-Range Solutions, Sales Center Solutions, IT Security Solutions, Training Center Solutions, and Enterprise Solutions. Our data reveal that a majority of corporate users which have been our major customers or loyal customers do transactions continually and gradually, as planned in the IT agenda.&nbsp; Frequently, customers requested alternative solutions to their problems and at times customers involve our support department team in the IT planning session for strategic purposes.</p>\r\n<p style="text-align: justify;"><span style="font-size: small; color: #3366ff;"><strong>Our Expertise</strong></span><br />In 2011, we have 5 Port strategic Polios that we could deliver to our customers Professionally who are still active and<br />new customers in targeted, following the Port of polio and the services we provide;<br /><strong><span style="color: #ff9900; font-size: x-small;">1. Sales Center</span></strong><br />As the sales center of hardware and software with a complete product range to choose from for every corporate user&rsquo;s<br />needs and with a choice of the best product quality in its class (industry leader), Trikarsa is able to deliver customer<br />satisfaction by offering the best products on demand, among others, Dell, Hp, Sophos, Websense, Microsoft, Prometric,<br />Syamntec Backup Solution, GrapOn, Commscope, Avaya, Cisco, Cimtrak, and Astaro.<br /><strong><span style="color: #ff9900; font-size: x-small;">2. Mid-Range Solutions </span></strong><br />Trikarsa tops off its IT services by forming the Service Center Department. This department was intended to provide<br />corporate value and services to both existing (major accounts) and prospective customers. The Department of Service Center offers five strategic services, i.e.:<br />1. IT Outsourcing and Maintanance<br />2. Data Communication<br />3. Surveillance System (CCTV, Alarm, &amp; Access Control)<br />4. Computer Hardware Repair<br />5. Web and Multimedia<br /><strong><span style="color: #ff9900; font-size: x-small;">3. Enterprise Solution</span></strong><br />Specializing in providing enterprise-class solutions and services focused on data storage, network and security.<br />Enterprise System Solutions enable your organization to keep pace with challenging real-time cemands of server and<br />storage capacity, management, and administration.<br /><strong><span style="color: #ff9900; font-size: x-small;">4. IT Security Solutions</span></strong><br />Trikarsa has partnered with security-product manufacturers and service providers to bring you a comprehensive range<br />of IT security solutions for protecting enterprise information. The products offered by Trikarsa are Network &amp; Endpoint<br />Protection, Access Control, Confidentiality, Compliance &amp; Risk Assessment.<br /><span style="font-size: x-small;"><strong><span style="color: #ff9900;">5. Training Center</span></strong></span><br />Trikarsa forms a strategic department to increase the Company&rsquo;s corporate value, that is, by forming an IT consulting<br />team who have the relevant competency by providing business solution services for Microsoft products. This<br />department also gives IT training services to corporate users to improve the IT technical skills and competence of the<br />human resources.</p>', 0, 7, '2013-03-01', '2013-03-11 00:00:00', '0', 0, '1', 1),
(18, 'our-partners', 'Our Partners', '<p><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>', 0, 10, '2013-03-01', '2013-03-11 00:00:00', '0', 0, '1', 1),
(19, 'enterprise-solution', 'Enterprise-solution', '<p>Enterprise Solution</p>', 0, 8, '2013-03-01', '2013-03-13 00:00:00', '1', 0, '1', 1),
(20, 'corporate-goal', 'Corporate Goal', '<p><span style="color: #ff6600; font-size: medium;"><strong>&ldquo;To become better, stronger and larger &rdquo;</strong></span><br />We believe that in the years to come we will be much stronger, larger, more innovative and more valuable in the domestic market since we gradually continue to direct our corporate value to a more strategic direction. In November 2011, Trikarsa opened a branch in Surabaya. Gradually but surely, PT. Trikarsa Sempurna Sistemindo is forming ideal team in order to provide optimal services to corporate users. In addition, the Company can also retain, protect, and develop potential customers who have entrusted their IT needs to us as vendor. To maintain team performance to always reach the target, we continually review our performance, with many success stories and a few failures.&nbsp; Trikarsa not only sales in IT Hardware but also Trikarsa have team support for always support our customers after sales services. We commit to customer for after sales service are done consistently&nbsp; to ensure that the customers get the best, in accordance with our&nbsp; commitment due to the highly competitive IT business.&nbsp; Practically all IT players offer aggressive prices and interesting service values.</p>', 0, 7, '2013-03-01', '2013-03-21 00:00:00', '0', 0, '1', 1),
(21, 'destop-virtualization-solution', 'Desktop Virtualization Solution', '<p>Desktop PCs are notoriously underutilized, tying up capital, energy resources and management resources. Conventional desktops PCs&nbsp;&nbsp; &nbsp; also&nbsp;&nbsp; &nbsp; limit&nbsp;&nbsp; &nbsp; flexibility&nbsp;&nbsp; &nbsp; and&nbsp;&nbsp; &nbsp; productivity,&nbsp;&nbsp; &nbsp; tethering&nbsp;&nbsp; &nbsp; end&nbsp;&nbsp; &nbsp; users&nbsp;&nbsp; &nbsp; to individual machines and isolating active files on local drives. Desktop virtualization solutions are designed to provide end users with the same kind of capacity mobility that businesses demand from the rest of the infrastructure.</p>\r\n<p>Desktop virtualization solutions replace your traditional desktop computers with server-based thin client devices. Your full desktop operating system and applications are virtualized on highly reliable, fault-tolerant System servers located in a secure,managed data center environment.&nbsp;</p>\r\n<p>All the data that would traditionally reside on traditional desktop computers is stored on consolidated storage devices in the data center. Without compromising usability, users can access their familiar desktop environments remotely from any PC or thin client on the network, offering true mobility, extraordinary data protection and real control.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Transform your Business with Virtualization</span></strong><br />Improve the efficiency and availability of IT resources and applications through virtualization. Start by eliminating the old &ldquo;one server, one application&rdquo; model and run multiple virtual machines on each physical machine.</p>\r\n<p>Free your IT admins from spending so much time managing servers rather than innovating. About 70% of a typical IT budget in a nonvirtualized datacenter goes towards just maintaining the existing infrastructure, with little left for innovation. Trikarsa delivers resources, applications&mdash;even servers&mdash;when and where they&rsquo;re needed.</p>', 0, 8, '2013-03-01', '2013-03-21 00:00:00', '0', 0, '1', 1),
(22, 'thin-client-solution', 'Thin Client Solution', '<p>The trend in Thin Client computing is a result of the evolution of the&nbsp;personal computer (PC)-based network. In the past, new PC software&nbsp;and hardware were continuously being released, resulting in a neverending&nbsp;stream&nbsp;of upgrades<br />in terms&nbsp;of hardware,&nbsp;applications,&nbsp;devices, Internet access, device drivers (to name a few) being needed.</p>\r\n<p>Thin Client Computing (also known as Thin Client/Server-Based&nbsp;Computing) is basically an explanation in the shift back to more&nbsp;centralized computing (utilizing Network Servers) while keeping the&nbsp;advantages that users of PCs have historically enjoyed.&nbsp;In addition, a Thin Client computer requires no software to be loaded&nbsp;on it (since it doesn''t have a hard disk drive); furthermore, it stores&nbsp;no data on it. All software applications are handled and executed on&nbsp;efficient, powerful network servers while the Thin Client computer &ndash; &nbsp;quite simply &ndash; delivers and presents the screen display and has the &nbsp;most basic of drivers to operate the computer mouse and keyboard.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Replacing Desktop PCs with Zero-Client Solutions</span></strong><br />This is completely different with zero clients: The system has no&nbsp;processor, no memory, no embedded operating system, no firmware,&nbsp;no driver or other software, no local memory and definitely no moving&nbsp;parts. What you get is 100% hardware for a secure connection to your&nbsp;virtualization server over LAN. &nbsp;Peripherals such as keyboard and mouse, a display as well as other&nbsp;USB devices connect directly to the zero client. All software such as&nbsp;applications, drivers and the zero client Windows client are transferred&nbsp;from the desktop to the server and are stored in a centrally organised&nbsp;data centre and managed from there. Desktop TCO can be reduced by&nbsp;up to 70 percent.&nbsp;Combined with the zero client Controller, the central management&nbsp;component used for monitoring all zero client systems and connecting&nbsp;users to their assigned virtual desktops, Zero cleint has developed the&nbsp;most efficient, cutting-edge desktop virtualization concept.</p>', 0, 8, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(23, 'disaster-recovery-center', 'Disaster Recovery Center', '<p><strong>Back-Up System Solution</strong><br />Backup of vital company information is critical to a company&rsquo;s survival,&nbsp;no matter what size the company. Recent studies show that 93% of&nbsp;businesses that lose data due to a disaster go out of business within&nbsp;two years.&nbsp;Increasingly, businesses are turning to disk-based online server&nbsp;backup and recovery solutions as the most cost effective fit for their&nbsp;requirements, when they have neither the volume of data nor the&nbsp;level of technical staff that characterize most traditional backup and&nbsp;recovery operations.</p>\r\n<p><strong>The process of Backup &amp; Recovery</strong><br />Backup and recovery system is to enable an individual or company to&nbsp;be able to recover vital information in the event that data is lost, deleted&nbsp;or destroyed. As a result it is necessary to follow a regular process to&nbsp;ensure that a copy of critical information is made and stored in a safe&nbsp;place.</p>\r\n<p>However it should be noted that if a backup is made only once a week&nbsp;then a maximum of a weeks&rsquo; data will be lost. It is possible to backup&nbsp;more regularly but this is more complex and will depend on your&nbsp;requirements and budget.</p>', 0, 1, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(24, 'data-communication', 'Data Communication', '<p><strong><span style="font-size: medium; color: #339966;" data-mce-mark="1">Data Communication&nbsp;(LAN &amp; PABX) </span></strong><br />PT. Trikarsa Sempurna Sistemindo specializes itself in the design&nbsp;and installation of structured cabling systems on new construction&nbsp;or corporate relocation, whether upgrading current cabling networks,&nbsp;relocating offices or upfitting facilities.</p>\r\n<p>Our engineers and installation technicians are highly trained and take&nbsp;responsibility of your network project from design to implementation.&nbsp;We provide products and services designed to build and manage local&nbsp;area networks and wide area network infrastructures for customers&nbsp;large and small alike.&nbsp;Professional cable and wiring installers will work around your business&nbsp;hours to ensure your satisfaction. Our dedication to customer service&nbsp;and project management is hard to match as we strive to best align&nbsp;business strategies with business technology.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Networking Solutions Capabilities</span></strong><br />&bull; Voice and Data LAN Cabling<br />&bull; Facsimile LAN Cabling<br />&bull; Low-Voltage LAN Wiring<br />&bull; Adds, Moves, and Changes<br />&bull; Building to Building LAN Cabling &amp; Wiring<br />&bull; New and Old Buildings LAN Wiring<br />&bull; LAN Cabling Repairs<br />&bull; LAN Design<br />&bull; Cat 3, Cat 5, and Cat 6 LAN Wiring<br />&bull; Single and Multiple Floor LAN Cabling and Wiring</p>', 0, 12, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(25, 'surveillance-system', 'Surveillance System CCTV and Access Control ', '<p>PT. Trikarsa Sempurna Sistemindo was built on top quality personal&nbsp;service and a genuine concern for its customers. We bring together&nbsp;highly trained professional technicians and a state-of-the-art product&nbsp;line to provide the most comprehensive security source. Our expertise&nbsp;and experience in security systems will prove invaluable.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;" data-mce-mark="1">Security Camera/CCTV</span></strong><br />Security cameras nowadays form part of surveillance systems for all&nbsp;sorts of settings, from convenience stores to parking areas to offices&nbsp;and homes.</p>\r\n<p><span style="font-size: small;"><strong><span style="color: #ff6600;">Access Control</span></strong></span><br />Physical Access Control refers to the practice of restricting entrance&nbsp;to a property, building or room to authorized people. This can be&nbsp;accomplished by a person, such as a receptionist or guard, or by&nbsp;mechanical means such as locks and keys.</p>', 0, 12, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(26, 'it-outsourcing-maintenance', 'Account and IT Outsourcing Services', '<p>PT. Trikarsa Sempurna Sistemindo helps you gain increased visibility&nbsp;into service delivery by helping you develop business focused&nbsp;processes. We deliver Information Technology (IT) Outsourcing&nbsp;Services with the same level of transparency.&nbsp;</p>\r\n<p>PT. Trikarsa Sempurna Sistemindo is recognized for creating career&nbsp;enhancing opportunities for customers&rsquo; IT employees. Our excellent&nbsp;IT professionals and our ability to leverage intellectual capital has led&nbsp;to one of the most respected groups of IT skills in the industry.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;" data-mce-mark="1">IT Outsourcing Service Capabilities</span></strong></p>\r\n<ul>\r\n<li>Be responsible for hardware (PCs, laptops, servers, printers, etc.)&nbsp;installation to meet companies&rsquo; Standard Operating Procedure.</li>\r\n<li>Diagnose and resolve hardware/software problem and user service&nbsp;request.</li>\r\n<li>Manage equipment installation (install, configure, and test to meet&nbsp;Security and Control Guidelines)</li>\r\n<li>Be responsible to ensure the most updated antivirus definitions are&nbsp;properly applied on all PC laptops and desktops and all servers at&nbsp;their premises.</li>\r\n<li>Provide support to the operation of Local Area Network and Wide&nbsp;Area Network connectivity and security, problem-solving and&nbsp;configuration network access for PCs and Notebooks.</li>\r\n<li>IT Outsourcing should protect and maintain confidentiality of&nbsp;customers&rsquo; business information and should not share it with&nbsp;internal or external party in any circumstances</li>\r\n<li>Be responsible for support performance by delivering reports regularly at least once a month</li>\r\n</ul>', 0, 12, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(27, 'multimedia', 'Graphic Design & Multimedia', '<p>PT. Trikarsa Sempurna Sistemindo offers a wide range of professional&nbsp;graphic design services including logo design, corporate identity&nbsp;development, multimedia and flash presentations.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;" data-mce-mark="1">Logo &amp; Corporate Identity</span></strong><br />Professionally made and successful corporate identity design and&nbsp;corporate identity logo design contributes apparently to the success&nbsp;of the whole enterprise, because it gives your company and your brand&nbsp;name immediate credibility and lasting recognition.</p>\r\n<p>Our professionals in graphic design are experienced to provide you&nbsp;with fresh and creative ideas for your logo and give it a distinctive and&nbsp;eye-catching look.</p>\r\n<p><strong><span style="font-size: small;" data-mce-mark="1">Marketing Material</span></strong><br />We have the capabilities of aiding all of our clients with guidance and&nbsp;integration. We help our clients&rsquo; increase their business assets, we&nbsp;deliver high impact marketing tools and become the bridge in the gap&nbsp;between them and their clients.</p>\r\n<p>Whether you need a service based brochure, Flyer, Newsletter, Banner,&nbsp;Poster, etc. Trikarsa can help you achieve your goals.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Flash Presentation &amp; Interactive CD</span></strong><br />If you have a product or company that you want to demonstrate a&nbsp;Flash presentation is an effective way to fulfill it. With experts in this field you will use the true power of Flash reinforcing the impression that your site creates.<br />Whatever solutions you choose a flash introduction, a web presentation or flash multimedia it will add attractiveness and dynamics to your project.</p>', 0, 12, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(28, 'hardware-repair', 'Computer Hardware Repair', '<p>To give comfort to its main customers, PT. Trikarsa Sempurna&nbsp;Sistemindo establish or provide hardware repair services, and it also&nbsp;does not rule out accepting new customers. We repair or upgrade all&nbsp;major brandnames of computers (PCs), laptops (Notebooks), servers,&nbsp;LCD monitors, printers and other hardware.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;" data-mce-mark="1">Computer Hardware Repair Capabilities</span></strong></p>\r\n<ul>\r\n<li>Highly trained Technician to detect your hardware system failure</li>\r\n<li>2 hour response time maximum calculated from compalints received</li>\r\n<li>The checking and repair process can be conducted in client&rsquo;s place</li>\r\n</ul>', 0, 1, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(29, 'endpoint-network-solution', 'Network & Endpoint Security', '<p>Network security consists of the provisions and policies adopted by&nbsp;a network administrator to prevent and monitor unauthorized access,&nbsp;misuse, modification, or denial of a computer network and networkaccessible&nbsp;resources.&nbsp;Network<br />security&nbsp;involves&nbsp;the authorization of access to data in a network, which is controlled by the network administrator.</p>\r\n<p>Users choose or are assigned an ID and password or other&nbsp;authenticating information that allows them access to information and&nbsp;programs within their authority. Network security covers a variety of&nbsp;computer networks, both public and private, that are used in everyday&nbsp;jobs conducting transactions and communications among businesses,&nbsp;government agencies and individuals. &nbsp;</p>\r\n<p>Network security is involved in organizations, enterprises, and other&nbsp;types of institutions. It does as its title explains: It secures the network,&nbsp;as well as protecting and overseeing operations being done.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;" data-mce-mark="1">Access Control</span></strong><br />In the realm of network security (we are not concerned with physical&nbsp;access controls in this discussion), access control means limiting&nbsp;access to network resources and data. Access controls are used to&nbsp;prevent unauthorized use of network resources and the unauthorized&nbsp;disclosure or modification of data. This can also include preventing the<br />use of network resources, such as dial-in modems or limiting Internet&nbsp;access.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Confidentiality</span></strong><br />Confidentiality is defined as preventing unauthorized disclosure of&nbsp;data. Confidentiality security services prevent disclosure of data&nbsp;in storage, being processed on a local machine, transiting a local&nbsp;network, or flowing over a public Internet. An aspect of confidentiality &nbsp;is &ldquo;anonymity,&rdquo; a service that prevents disclosure of information that&nbsp;could lead to the identification of the end user.&nbsp;</p>', 0, 13, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(30, 'acces-control-solution', 'Access Control Solution', '<p>In the realm of network security (we are not concerned with physical&nbsp;access controls in this discussion), access control means limiting&nbsp;access to network resources and data. Access controls are used to&nbsp;prevent unauthorized use of network resources and the unauthorized&nbsp;disclosure or modification of data. This can also include preventing the&nbsp;use of network resources, such as dial-in modems or limiting Internet&nbsp;access.</p>', 0, 13, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(31, 'confidentiality-solution', 'Confidentiality Solution', '<p>Confidentiality is defined as preventing unauthorized disclosure of&nbsp;data. Confidentiality security services prevent disclosure of data&nbsp;in storage, being processed on a local machine, transiting a local&nbsp;network, or flowing over a public Internet. An aspect of confidentiality &nbsp;is &ldquo;anonymity,&rdquo; a service that prevents disclosure of information that&nbsp;could lead to the identification of the end user.</p>', 0, 13, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(32, 'risk-assesment-solution', 'Risk Assessment & Compliance', '<p>With few exceptions, whether related to financial, physical, or&nbsp;technological resources, different types of risk can be calculated&nbsp;using the same universal formula. Risk can be defined by the following&nbsp;calculation:<br />Risk = asset value &times; threat &times; vulnerability</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;" data-mce-mark="1">Elements of Risk</span></strong><br />As you can see with the preceding equation, there are three elements&nbsp;of risk: asset value, threat, and vulnerability. Estimating these elements&nbsp;correctly is critical to assessing risk accurately.</p>\r\n<p><strong><span style="font-size: small; color: #ff6600;" data-mce-mark="1">Assets</span></strong><br />Normally represented as a monetary value, assets can be defined&nbsp;as anything of worth to an organization that can be damaged,&nbsp;compromised, or destroyed by an accidental or deliberate action.&nbsp;In reality, an asset''s worth is rarely the simple cost of replacement;&nbsp;therefore, to get an accurate measure of risk, an asset should be&nbsp;valued taking into account the bottom-line cost of its compromise.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;" data-mce-mark="1">Threats</span></strong><br />A threat can be defined as a potential event that, if realized, would&nbsp;cause an undesirable impact. The undesirable impact can come&nbsp;in many forms, but often results in a financial loss. Threats are&nbsp;generalized as a percentage, but two factors play into the severity of&nbsp;a threat: degree of loss and likelihood of occurrence.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Vulnerabilities</span></strong><br />Vulnerabilities can be defined as the absence or weakness of&nbsp;cumulative controls protecting a particular asset. Vulnerabilities are&nbsp;estimated as percentages based on the level of control weakness.&nbsp;We can calculate control deficiency (CD) by subtracting the&nbsp;effectiveness of the control by 1 or 100 percent.</p>', 0, 13, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(33, 'compliance-solution', 'Compliance Solution', '<p>With few exceptions, whether related to financial, physical, or&nbsp;technological resources, different types of risk can be calculated&nbsp;using the same universal formula. Risk can be defined by the following&nbsp;calculation:<br />Risk = asset value &times; threat &times; vulnerability</p>\r\n<p><span style="font-size: small; color: #ff6600;"><strong><span data-mce-mark="1">Elements of Risk</span></strong></span><br />As you can see with the preceding equation, there are three elements&nbsp;of risk: asset value, threat, and vulnerability. Estimating these elements&nbsp;correctly is critical to assessing risk accurately.</p>\r\n<p><span style="font-size: small; color: #ff6600;"><strong><span data-mce-mark="1">Assets</span></strong></span><br />Normally represented as a monetary value, assets can be defined&nbsp;as anything of worth to an organization that can be damaged,&nbsp;compromised, or destroyed by an accidental or deliberate action.&nbsp;In reality, an asset''s worth is rarely the simple cost of replacement;&nbsp;therefore, to get an accurate measure of risk, an asset should be&nbsp;valued taking into account the bottom-line cost of its compromise.</p>\r\n<p><span style="color: #ff6600; font-size: small;"><strong><span data-mce-mark="1">Threats</span></strong></span><br />A threat can be defined as a potential event that, if realized, would&nbsp;cause an undesirable impact. The undesirable impact can come&nbsp;in many forms, but often results in a financial loss. Threats are&nbsp;generalized as a percentage, but two factors play into the severity of&nbsp;a threat: degree of loss and likelihood of occurrence.</p>\r\n<p><span style="font-size: small; color: #ff6600;"><strong>Vulnerabilities</strong></span><br />Vulnerabilities can be defined as the absence or weakness of&nbsp;cumulative controls protecting a particular asset. Vulnerabilities are&nbsp;estimated as percentages based on the level of control weakness.&nbsp;We can calculate control deficiency (CD) by subtracting the&nbsp;effectiveness of the control by 1 or 100 percent.</p>', 0, 13, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(34, 'microsoft-training', 'Microsoft Training', '<p><strong><span style="color: #ff6600; font-size: small;">Microsoft Training Courses</span></strong><br />A Microsoft course provides invaluable training and career&nbsp;advancement. Trikarsa Learning''s outstanding range of high-quality&nbsp;Microsoft training courses for IT professionals and Microsoft Office&nbsp;training for desktop PC users.&nbsp;Microsoft Certification As a long-time partner with Microsoft, Trikarsa uses only Microsoft&nbsp;Official Curriculum taught by Microsoft Certified Trainers to provide&nbsp;you with the best Microsoft training.</p>\r\n<p><strong><span style="color: #ff6600; font-size: small;">Microsoft Certification Training</span></strong></p>\r\n<ul>\r\n<li>MCTS - Microsoft Certified Technology Specialist<br />MCTS certifications provide the foundation for Microsoft&nbsp;certification, and validate your skills in building, implementing and troubleshooting a particular Microsoft technology.&nbsp;</li>\r\n<li>MCITP - Microsoft Certified IT Professional <br />MCITP certifications build on the technical proficiency measured in MCTS certifications. It validates your skills in planning, deploying, maintaining and optimising IT infrastructures.&nbsp;</li>\r\n<li>MOS - Microsoft Office Specialist<br />MOS certifications show that you have the most up-to-date skills on the latest Microsoft Office programs and Windows operating systems.&nbsp;</li>\r\n<li>MCSE - Microsoft Certified Systems Engineer<br />The MCSE credential is among the most popular and most widely recognised technical certifications in the IT industry.&nbsp;</li>\r\n<li>MCSA - Microsoft Certified Systems Administrator <br />MCSA certification validates your skills in managing and troubleshooting network environments running on Windows Server systems.</li>\r\n</ul>', 0, 14, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(35, 'it-training', 'IT Training', '<p>Focusing on quality service and technology excellence has ensured a&nbsp;consistent methodology and quality training throughout our local and&nbsp;regional presence, serving our customer base of global enterprises,&nbsp;government and large to medium-sized organizations consisting of&nbsp;international companies.</p>\r\n<p>PT. Trikarsa Sempurna Sistemindo adopts the best training practices&nbsp;and employs trainers who are qualified to &nbsp;nstruct in a broad range &nbsp;of IT subject areas, including messaging platform, database, internet-related, voice/data technology, e-commerce and client/server development technologies.</p>\r\n<p>Our training curriculum provides a range of introductory and advanced&nbsp;courses to address the requirements of novice and expert IT&nbsp;professionals alike. Trikarsa is strategically located at the heart of Jakarta - easy&nbsp;accessibility for clients from anywhere, with a shopping center, hotels&nbsp;and restaurants nearby, clients come from near and far.</p>\r\n<p>A successful professional must have both hard skill and soft skills.&nbsp;And PT. Trikarsa Sempurna Sistemindo intends to continue to serve&nbsp;the Indonesian people and create value for Indonesia as a globally&nbsp;competitive nation.</p>', 0, 14, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(36, 'jakarta', 'Branches on Jakarta', '<h3>PT.Trikarsa Sempurna Sistemindo</h3>\r\n<h4>Head Office</h4>\r\n<p><span>Ranuza Building, 2nd &amp; 3rd Floor</span><br /><span>Jl.Timor No.10-Menteng</span><br /><span>Jakarta Pusat 10350 - Indonesia</span><br /><span>Phone.+62.21-3193 5163</span><br /><span>Fax.+62.21-3193 5226&nbsp;</span><br /><a href="mailto:admin@tri-karsa.com">admin@tri-karsa.com</a></p>', 0, 15, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(37, 'surabaya', 'Branches on Surabaya', '<h4>Surabaya Office</h4>\r\n<p><span>Bumi Mandiri Tower II Building, 4th Floor</span><br /><span>Jl.Panglima Sudirman No.66-68</span><br /><span>Surabaya 60271 - Indonesia</span><br /><span>Phone.+62.31-535 2697</span><br /><span>Fax.+62.31-535 2724</span></p>', 0, 15, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 1),
(38, 'tentang-trikarsa-front', 'Tentang PT. Trikarsa Corp', '<p><img style="float: left;" src="../../../asset/images/frontend/logo/bab.jpg" alt="" width="120" height="139" /></p>\r\n<p align="left">PT. Trikarsa Sempurna Sistemindo (TSS) was established in January 2006, TSS has established a commitment in providing quality computer tool for all customers. Currently, TSS has become one of the dealers for International brand products in the field of Hardware and Software to be one of the vendors in the field focus IT (IT specialist) and system integrators to provide solutions to the needs of company or corporate.</p>\r\n<p>Experience in sales and marketing in the information technology services / IT TSS set as one of the suppliers<br />IT services and solutions that can be relied in Indonesia, a number of large companies such as petroleum (Oil Company), Banking and finance, telecommunications, government and others are customers who have working with TSS to date. By holding some brand proven class and supported the line strong organizational support and shape consistency in the after sales service is The main advantage of TSS in the face tough competition this time....</p>', 0, 11, '2013-03-01', '2013-03-22 00:00:00', '0', 0, '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `judul_file` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `file`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(20) NOT NULL AUTO_INCREMENT,
  `judul_gallery` varchar(250) NOT NULL,
  `nama_gallery` varchar(100) NOT NULL,
  `keterangan_gallery` text NOT NULL,
  `created_at` date NOT NULL,
  `active_gallery` enum('0','1') NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `judul_gallery`, `nama_gallery`, `keterangan_gallery`, `created_at`, `active_gallery`, `bahasa_id`) VALUES
(1, 'Vision Mision', '49d488ce8d0c09536dc3ebfe9786e002.jpg', '', '0000-00-00', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) NOT NULL,
  `alias_kategori` varchar(250) NOT NULL,
  `active_kategori` enum('0','1') NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `alias_kategori`, `active_kategori`, `bahasa_id`) VALUES
(1, 'Artikel', 'artikel', '1', 1),
(2, 'Latest News', 'latest-news', '1', 1),
(3, 'Corporate Info', 'corporate-info', '1', 1),
(6, 'Static Page', 'static-page', '1', 1),
(7, 'About Us', 'about-us', '1', 1),
(8, 'Enterprise Solution', 'enterprise-solution', '1', 1),
(9, 'Our Client', 'our-client', '1', 1),
(10, 'Our Partner', 'our-partner', '1', 1),
(11, 'Front Page', 'front-page', '1', 1),
(12, 'Midrange Solution', 'midrange-solution', '1', 1),
(13, 'IT Security Solution', 'it-security-solution', '1', 1),
(14, 'Training Center', 'training-center', '1', 1),
(15, 'Branches', 'branches', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_block`
--

CREATE TABLE IF NOT EXISTS `kategori_block` (
  `id_block` int(10) NOT NULL AUTO_INCREMENT,
  `nama_block` varchar(200) NOT NULL,
  `position_block` varchar(50) NOT NULL,
  `urutan_block` int(2) NOT NULL,
  `isi_block` text NOT NULL,
  `active_block` enum('0','1') NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  PRIMARY KEY (`id_block`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `kategori_block`
--

INSERT INTO `kategori_block` (`id_block`, `nama_block`, `position_block`, `urutan_block`, `isi_block`, `active_block`, `bahasa_id`) VALUES
(4, 'Coba', 'left', 1, '<p>isi coba</p>', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_menu`
--

CREATE TABLE IF NOT EXISTS `kategori_menu` (
  `id_kategori_menu` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori_menu` varchar(100) NOT NULL,
  `active_kategori_menu` enum('0','1') NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  PRIMARY KEY (`id_kategori_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori_menu`, `nama_kategori_menu`, `active_kategori_menu`, `bahasa_id`) VALUES
(1, 'Main Menu', '1', 1),
(2, 'Top Menu', '1', 1),
(3, 'Bottom Menu', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE IF NOT EXISTS `lamaran` (
  `id_lamaran` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `name_lamaran` varchar(80) NOT NULL,
  `email_lamaran` varchar(50) NOT NULL,
  `phone_lamaran` varchar(50) NOT NULL,
  `address_lamaran` text NOT NULL,
  `education_lamaran` varchar(70) NOT NULL,
  `lampiran_lamaran` varchar(100) NOT NULL,
  `cover_lamaran` text NOT NULL,
  `date_apply` date NOT NULL,
  PRIMARY KEY (`id_lamaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `career_id`, `name_lamaran`, `email_lamaran`, `phone_lamaran`, `address_lamaran`, `education_lamaran`, `lampiran_lamaran`, `cover_lamaran`, `date_apply`) VALUES
(1, 7, 'Devi Firdaus Fauzi', 'dfedogawa3@yahoo.com', '08587128960', 'Jalan', 'S1', '0039f048070db079ce43584ca399bcf3.docx', 'Dear Sir/Madam,\r\n\r\nI wish to apply for the position above, as advertised on Jobstreet.com on 13 March 2013.\r\n\r\n[Please add your message here.]\r\n\r\nThank you.\r\n\r\nSincerely\r\n[Your Name]', '2013-03-20'),
(20, 7, 'Dev', 'devi@tri-karsa.com', '0856545687', 'Jalan', 'S1', '3e2525aca41e0acf9932a928cd7ac315.docx', 'Dear Sir/Madam,\r\n\r\nI wish to apply for the position above, as advertised on Jobstreet.com on 13 March 2013.\r\n\r\n[Please add your message here.]\r\n\r\nThank you.\r\n\r\nSincerely\r\n[Your Name]', '2013-03-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(10) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(200) NOT NULL,
  `url_menu` varchar(250) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `level_menu` int(2) NOT NULL,
  `urutan_menu` int(5) NOT NULL,
  `kategori_menu_id` int(2) NOT NULL,
  `for_static` enum('1','0') NOT NULL DEFAULT '0',
  `active_menu` enum('0','1') NOT NULL,
  `bahasa_id` int(2) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `url_menu`, `parent_id`, `level_menu`, `urutan_menu`, `kategori_menu_id`, `for_static`, `active_menu`, `bahasa_id`) VALUES
(11, 'Overview', 'overview', 10, 1, 1, 1, '1', '1', 1),
(12, 'Vision Mision', 'vision-mision', 10, 1, 2, 1, '1', '1', 2),
(10, 'About Us', 'about-us', 0, 0, 1, 1, '1', '1', 1),
(13, 'Corporate Value', 'corporate-value', 10, 1, 1, 1, '1', '1', 1),
(14, 'Management Team', 'management-team', 10, 1, 1, 1, '1', '1', 1),
(15, 'Branches', 'branches', 0, 0, 3, 1, '1', '1', 1),
(16, 'Contact Us', 'contact_us', 10, 1, 1, 1, '', '1', 1),
(17, 'Our Expertise', '#', 0, 0, 2, 1, '1', '1', 1),
(18, 'Enterprise Solution', 'enterprise-solution', 17, 1, 1, 1, '1', '1', 1),
(19, 'Server & Storage Solution', 'server-storage-solution', 18, 2, 1, 1, '1', '1', 1),
(21, 'Gallery', 'gallery', 0, 0, 4, 1, '', '1', 1),
(24, 'Virtualization Solution', 'destop-virtualization-solution', 18, 2, 2, 1, '1', '1', 1),
(23, 'Careers', 'careers', 0, 0, 5, 1, '', '1', 1),
(25, 'Thin Client Solution', 'thin-client-solution', 18, 2, 3, 1, '1', '1', 1),
(26, 'Disaster Recovery Center/Plan (DRC)', 'disaster-recovery-center', 18, 2, 4, 1, '1', '1', 1),
(27, 'ITIL Solution', 'itil-solution', 18, 2, 5, 1, '1', '1', 1),
(28, 'Midrange Solution', 'midrange-solution', 17, 1, 2, 1, '1', '1', 1),
(29, 'Data Communication (LAN/Cabling System)', 'data-communication', 28, 2, 1, 1, '1', '1', 1),
(30, 'Surveillance System (CCTV,Fingerprint,Access Control)', 'surveillance-system', 28, 2, 2, 1, '1', '1', 1),
(31, 'IT Outsourcing & Maintenance', 'it-outsourcing-maintenance', 28, 2, 3, 1, '1', '1', 1),
(32, 'Multimedia', 'multimedia', 28, 2, 4, 1, '1', '1', 1),
(33, 'Hardware Repair', 'hardware-repair', 28, 2, 5, 1, '1', '1', 1),
(34, 'IT Security Solution', 'it-security-solution', 17, 1, 3, 1, '1', '1', 1),
(35, 'EndPoint & Network Solution', 'endpoint-network-solution', 34, 2, 1, 1, '1', '1', 1),
(36, 'Acces Control Solution', 'acces-control-solution', 34, 2, 2, 1, '1', '1', 1),
(37, 'Confidentiality Solution', 'confidentiality-solution', 34, 2, 3, 1, '1', '1', 1),
(38, 'Risk Assesment Solution', 'risk-assesment-solution', 34, 2, 4, 1, '1', '1', 1),
(39, 'Business Continuity Solution', 'business-continuitysolution', 34, 2, 5, 1, '1', '1', 1),
(40, 'Compliance Solution', 'compliance-solution', 34, 2, 6, 1, '1', '1', 1),
(41, 'Training Center', 'training-center', 17, 1, 4, 1, '1', '1', 1),
(42, 'Microsoft Training', 'microsoft-training', 41, 2, 1, 1, '1', '1', 1),
(43, 'IT Training', 'it-training', 41, 2, 2, 1, '1', '1', 1),
(44, 'Testing Center', 'testing-center', 41, 2, 3, 1, '1', '1', 1),
(45, 'Surabaya', 'surabaya', 15, 1, 2, 1, '1', '1', 1),
(46, 'Jakarta', 'jakarta', 15, 1, 1, 1, '1', '1', 1),
(47, 'Overview', 'overview-id', 49, 1, 1, 1, '1', '1', 2),
(48, 'Vision Mision', 'vision-mision-id', 49, 1, 2, 1, '1', '1', 2),
(49, 'About Us', 'about-us-id', 0, 0, 1, 1, '1', '1', 2),
(50, 'Milestone', 'milestone-id', 49, 1, 1, 1, '1', '1', 2),
(51, 'Management Team', 'management-team-id', 49, 1, 1, 1, '1', '1', 2),
(52, 'Branches', 'branches-id', 0, 0, 3, 1, '1', '1', 2),
(53, 'Contact Us', 'contact-us-id', 49, 1, 1, 1, '1', '1', 2),
(54, 'Our Bussiness', '#', 0, 0, 2, 1, '1', '1', 2),
(55, 'Enterprise Solution', 'enterprise-solution-id', 54, 1, 1, 1, '1', '1', 2),
(56, 'Server & Storage Solution', 'server-storage-solution-id', 55, 2, 1, 1, '1', '1', 2),
(57, 'Gallery', 'gallery-id', 0, 0, 4, 1, '0', '1', 2),
(58, 'Virtualization Solution', 'virtualization-solution-id', 55, 2, 2, 1, '1', '1', 2),
(59, 'Careers', 'careers-id', 0, 0, 5, 1, '', '1', 2),
(60, 'Thin Client Solution', 'thin-client-solution-id', 55, 2, 3, 1, '1', '1', 2),
(70, 'Disaster Recovery Center/Plan (DRC)', 'disaster-recovery-center-id', 55, 2, 4, 1, '1', '1', 2),
(80, 'ITIL Solution', 'itil-solution-id', 55, 2, 5, 1, '1', '1', 1),
(90, 'Midrange Solution', 'midrange-solution-id', 54, 1, 2, 1, '1', '1', 2),
(91, 'Data Communication (LAN/Cabling System)', 'data-communication-id', 90, 2, 1, 1, '1', '1', 2),
(92, 'Surveillance System (CCTV,Fingerprint,Access Control)', 'surveillance-system-id', 90, 2, 2, 1, '1', '1', 2),
(93, 'IT Outsourcing & Maintenance', 'it-outsourcing-maintenance-id', 90, 2, 3, 1, '1', '1', 2),
(94, 'Multimedia', 'multimedia-id', 90, 2, 4, 1, '1', '1', 2),
(95, 'Hardware Repair', 'hardware-repair-id', 90, 2, 5, 1, '1', '1', 2),
(96, 'IT Security Solution', 'it-security-solution-id', 54, 1, 3, 1, '1', '1', 2),
(97, 'EndPoint & Network Solution', 'endpoint-network-solution-id', 96, 2, 1, 1, '1', '1', 2),
(98, 'Acces Control Solution', 'acces-control-solution-id', 96, 2, 2, 1, '1', '1', 2),
(99, 'Confidentiality Solution', 'confidentiality-solution-id', 96, 2, 3, 1, '1', '1', 2),
(100, 'Risk Assesment Solution', 'risk-assesment-solution-id', 96, 2, 4, 1, '1', '1', 2),
(101, 'Business Continuity Solution', 'business-continuitysolution-id', 96, 2, 5, 1, '1', '1', 2),
(102, 'Compliance Solution', 'compliance-solution-id', 96, 2, 6, 1, '1', '1', 2),
(103, 'Training Center', 'training-center-id', 54, 1, 4, 1, '1', '1', 2),
(104, 'Microsoft Training', 'microsoft-training-id', 103, 2, 1, 1, '1', '1', 2),
(105, 'IT Training', 'it-training-id', 103, 2, 2, 1, '1', '1', 2),
(106, 'Testing Center', 'testing-center-id', 103, 2, 3, 1, '1', '1', 2),
(107, 'Surabaya', 'surabaya-id', 52, 1, 2, 1, '1', '1', 2),
(108, 'Jakarta', 'jakarta-id', 52, 1, 1, 1, '1', '1', 2),
(109, 'Corporate Goal', 'corporate-goal', 10, 1, 5, 1, '1', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_menu`
--

CREATE TABLE IF NOT EXISTS `role_menu` (
  `id_role_menu` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id_role_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `role_menu`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE IF NOT EXISTS `subkategori` (
  `id_subkategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkategori` varchar(200) NOT NULL,
  `alias_subkategori` varchar(250) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `active_subkategori` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_subkategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `subkategori`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id_testimonial` int(11) NOT NULL AUTO_INCREMENT,
  `title_testimonial` varchar(100) NOT NULL,
  `description_testimonial` text NOT NULL,
  `created_by_testimonial` varchar(100) NOT NULL,
  `email_testimonial` varchar(100) NOT NULL,
  `attachment_testimonial` varchar(100) NOT NULL,
  `active_testimonial` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_testimonial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `testimonial`
--

INSERT INTO `testimonial` (`id_testimonial`, `title_testimonial`, `description_testimonial`, `created_by_testimonial`, `email_testimonial`, `attachment_testimonial`, `active_testimonial`) VALUES
(1, 'Young Alkhawarizmi', '"Terus Maju Tanpa Henti..."', 'Devi Firdaus', 'devi@tri-karsa.com', 'c02eb2dc15a542bfc9415dd249253606.jpg', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
