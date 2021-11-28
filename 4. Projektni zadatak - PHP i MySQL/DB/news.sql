-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 12:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archive` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `picture`, `date`, `archive`) VALUES
(1, 'Latest information about corona virus', 'In the Dubrovnik-Neretva County, 41 new cases of coronavirus infection were recorded in the last 24 hours.\r\n\r\nThese are 24 males and 17 females: 16 from Dubrovnik, 8 from Orebic, four from Konavle and Vela Luka, 3 from Korcula, two from Lumbarda and the Dubrovnik Parish, and one each from Smokvica and Ston.\r\n\r\n174 people were cured: 69 from Dubrovnik, 19 from Metkovic and Vela Luka, 16 from Župa dubrovacka, 12 from Konavle, 11 from Orebic, 8 from Ploce, 7 from Opuzen, 5 from Ston, 3 from Korcula and one person from Blato , Dubrovnik coast, Slivno, Smokvica is Mljet.\r\n\r\nIn the last 24 hours, 227 samples were processed, and since the beginning of the pandemic, a total of 163,724 samples have been analyzed.\r\n\r\n65 people tested positive for coronavirus were hospitalized in OB Dubrovnik, nine patients required intensive care and were on a respirator.\r\n\r\nThere are 1597 people in self-isolation, and in the last 24 hours no violation of the self-isolation measure was recorded. Since the beginning of the pandemic, a total of 975 cases of self-isolation violations have been identified.\r\n\r\nThe headquarters of the CZ DNŽ continues to appeal to the citizens to adhere to all prescribed measures by the Croatian Institute of Public Health and the Civil Protection Headquarters of the Republic of Croatia.', 'news/covid.jpg', '2021-11-24 19:58:26', 'Y'),
(2, 'Vaccination without notice', 'Korcula Health Center is organizing a vaccination against Covid 19 on Wednesday, November 17, from 12:00 to 15:00. \r\n\r\nAnyone interested can get vaccinated in the school sports hall of the Orebic Elementary School from 12 to 3 p.m. It is possible to get vaccinated with vaccines from Pfizer, Moderna and Johnson & Jonhnson. \r\n\r\nBe sure to bring your health card or other identification document. People who are vaccinated with the 2nd or 3rd dose must bring an acknowledgment of receipt of the last dose of the vaccine', 'news/cjepljenje1.jpg', '2021-07-28 18:52:46', 'N'),
(10, 'Pelješac bridge connected', 'With the lifting of the last, 165th segment of the steel span structure, the Pelješac bridge was completely connected on Thursday and it stretches from Komarna on the mainland, to Brijesta on Pelješac.\r\n\r\n\r\nThe bridge has 13 spans, of which five main ones are 285 meters long, six centrally placed reinforced concrete pylons 33 meters high, and two lanes together with a stop lane that will serve to maintain the bridge. The last element that was installed tonight is 18 meters long, and the symbolic installation was completed by Prime Minister Andrej Plenkovi?, Minister of Transport Oleg Butkovi?, Dubrovnik-Neretva County Prefect Nikola Dobroslavi? and President of the Croatian Roads Administration Josip Škori?. The connection was followed by numerous citizens from the mainland and many boats, barges and other vessels.\r\n\r\n\r\nThe length of the bridge from the axis to the axis of the abutments is 2,404 meters, the total length of the bridge with abutments is 2,440 meters, and the navigation profile under the bridge is 200 times 55 meters.\r\n\r\n\r\nThe main and responsible designer of the Pelješac Bridge is Marjan Pipenbaher. The bridge was built by the Chinese consortium China Road and Bridge Corporation. The Chinese got the job in a tender in 2018, offering 2.081 billion kuna without VAT, with a 36-month completion deadline.\r\n\r\n\r\nThe decision to finance the construction of the bridge was made by the Government in 2017. Construction officially began on July 31, 2018, when the contractor was introduced to the works. In May 2013, a study commissioned by the European Commission showed that the Peljesac Bridge was the best solution to connect southern Croatia with the rest of the country.\r\n\r\n\r\nThe Peljesac Bridge is the first of a total of four phases of the &quot;Road Connection with Southern Dalmatia&quot; project, for which the European Commission has approved 357m euros in grants or 85 per cent of eligible costs.\r\n\r\n\r\nNamely, the total value of the project is 526 million euros including VAT, and the value of eligible costs is 420 million euros, of which 85 percent is co-financed by the European Union, ie 357 million euros. The European Union also finances supporting infrastructure: access roads, tunnels, additional bridges and viaducts, as well as the Ston bypass.\r\n\r\n\r\nThe bridge along with access roads is expected to be open to traffic in June 2022, before the start of the main tourist season.', 'news/most.jpg', '2021-11-24 20:00:43', 'N'),
(13, 'Fire in Loviste', 'A large fire broke out at around 11 am on the island of Peljesac, east of the settlement of Loviste in the municipality of Orebic. It is burning on a very difficult terrain where there are currently 30 firefighters from companies on Peljesac. As we have learned from the commander of DVD Orebic, Niksa Nogalo, the forest fire near Loviste has been brought under control, thanks to the quick intervention of firefighters. Firefighters from DVD Loviste, Orebic, Viganj, Trpanj and Kuna were taking part in the extinguishing.\r\n\r\nIn the forest fire that broke out in the area of Vu?ipolje on the northeast side of Lovište, a little more than three hectares of macchia, grass and several olive trees were burned. The causes are still being determined, and firefighters from the Orebic and Loviste Voluntary Fire Brigades are still on duty at the fire, soaking the edges, and they will monitor it until the fire is declared extinguished.\r\n\r\nThanks to the quick notification of the beginning of the fire and the intervention, the fire was brought under control at around 1 pm on Tuesday, thus preventing major material damage. On that occasion, the Fire Brigade again called on the population to exercise extreme caution, warning that in these hot days, and until November 1, it is strictly forbidden to light fires in the open.', '13-82.jpg', '2021-07-27 13:10:55', 'N'),
(14, 'Kono has died', 'Yesterday afternoon we found out that Kono the turtle has died, her life was extinguished by a ships propeller!\r\n\r\nTurtle Kono was well known to everyone, our dearest guest who always returned faithfully and always attracted attention from all sides. Our beloved turtle we are sad that you had to leave us in this way. You were our dearest guest, and we were looking forward to your every arrival!\r\n\r\nAlso we found out today that another turtle was seen in the Loviste bay this morning and that makes us very happy!', 'news/kono.jpg', '2021-11-24 20:00:02', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
