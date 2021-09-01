-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2021 at 08:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follower_id`) VALUES
(3, 1, 22),
(9, 11, 22),
(10, 8, 1),
(12, 1, 8),
(13, 2, 8),
(14, 8, 2),
(15, 8, 11),
(16, 2, 11),
(17, 8, 22),
(21, 11, 31),
(22, 1, 31),
(24, 11, 32),
(25, 31, 32),
(26, 8, 32),
(27, 32, 31),
(28, 32, 11),
(29, 31, 11),
(30, 32, 33),
(31, 11, 33),
(32, 31, 33),
(33, 33, 31),
(34, 31, 22);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `follow_id`) VALUES
(8, 22, 1),
(14, 22, 11),
(15, 1, 8),
(17, 8, 1),
(18, 8, 2),
(19, 2, 8),
(20, 11, 8),
(21, 11, 2),
(22, 22, 8),
(26, 31, 11),
(27, 31, 1),
(29, 32, 11),
(30, 32, 31),
(31, 32, 8),
(32, 31, 32),
(33, 11, 32),
(34, 11, 31),
(35, 33, 32),
(36, 33, 11),
(37, 33, 31),
(38, 31, 33),
(39, 22, 31);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message_text` text NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_active` varchar(20) NOT NULL,
  `sender_active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `sender_id`, `message_text`, `sent_date`, `user_active`, `sender_active`) VALUES
(1, 11, 31, 'Hey, done with homework?', '2021-01-26 06:58:30', 'true', 'true'),
(2, 31, 11, 'Hey, not yet. You?', '2021-01-26 06:59:54', 'true', 'true'),
(3, 31, 11, 'Have you asked Hermione?', '2021-01-26 09:38:52', 'true', 'true'),
(4, 32, 31, 'Hey, how are you?', '2021-01-26 09:40:09', 'true', 'true'),
(5, 31, 32, 'Hey) good, you?', '2021-01-26 09:43:18', 'true', 'true'),
(6, 32, 31, '&lt;p&gt;Good, thanx :)&lt;/p&gt;', '2021-01-26 17:19:22', 'true', 'true'),
(7, 32, 31, '&lt;p&gt;Any luck with hw?)&lt;/p&gt;', '2021-01-26 17:22:23', 'true', 'true'),
(8, 11, 31, '&lt;p&gt;Just about to&lt;/p&gt;', '2021-01-26 17:23:31', 'true', 'true'),
(9, 31, 11, '&lt;p&gt;Ok, will get in touch later&lt;/p&gt;', '2021-01-26 17:24:24', 'true', 'true'),
(10, 33, 31, '&lt;p&gt;Hi, dude&lt;/p&gt;', '2021-01-26 19:02:22', 'true', 'true'),
(11, 8, 1, '&lt;p&gt;Спишь?&lt;/p&gt;', '2021-01-26 20:15:57', 'true', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` varchar(20) NOT NULL,
  `like_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `tweet`, `post_date`, `active`, `like_count`) VALUES
(1, 11, 'Hello, Twitter!', '2021-01-26 09:30:28', 'true', 3),
(2, 8, 'New album is on the way..!', '2021-01-24 18:37:25', 'true', 2),
(4, 2, 'Official: Lionel Messi has been handed a two-game ban for his red card against Athletic Club in the Spanish Super Cup final.\r\n\r\n❌ Copa Del Rey | UE Cornellà\r\n\r\n❌ La Liga | Elche CF', '2021-01-24 18:38:40', 'true', 2),
(5, 11, 'There was a Hogsmeade visit halfway through January. Hermione was very surprised that Ron was planning to go.', '2021-01-26 09:30:37', 'true', 5),
(6, 1, 'Grandi ragazzi!\r\nAbbiamo iniziato il 2021 nel migliore dei modi! #finoallafine', '2021-01-24 18:38:12', 'true', 2),
(7, 1, 'Altri 3 punti importantissimi! Felice di aver dato il mio contributo!', '2021-01-24 18:39:19', 'true', 3),
(8, 22, 'I think we need to stop calling it \'working from home\' and start calling it \'living at work\'', '2021-01-24 18:38:53', 'true', 1),
(9, 22, '&lt;p&gt;friend: i can&amp;rsquo;t find his insta&lt;/p&gt;\r\n&lt;p&gt;me:&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://pbs.twimg.com/media/ENxhavZXYAUrK0w?format=jpg&amp;amp;name=small&quot; alt=&quot;Ð˜Ð·Ð¾Ð±Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ&quot; width=&quot;244&quot; height=&quot;292&quot; /&gt;&lt;/p&gt;', '2021-01-24 18:38:57', 'true', 1),
(12, 8, '&lt;p&gt;&amp;ldquo;Spirit&amp;rdquo;+ &amp;ldquo;Bigger&amp;rdquo; The extended cut from Disney&amp;rsquo;s The Lion King (Official Video) https://youtu.be/hiqLtqMDrXQ&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://pbs.twimg.com/media/D_2SvTLW4AAnmZC?format=jpg&amp;amp;name=900x900&quot; alt=&quot;Image&quot; width=&quot;384&quot; height=&quot;256&quot; /&gt;&lt;/p&gt;', '2021-01-26 09:30:46', 'true', 6),
(15, 31, '&lt;p&gt;&lt;span class=&quot;css-901oao css-16my406 r-poiln3 r-bcqeeo r-qvutc0&quot; style=&quot;border: 0px solid black; box-sizing: border-box; color: #0f1419; display: inline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; white-space: pre-wrap; overflow-wrap: break-word; min-width: 0px; background-color: rgba(0, 0, 0, 0.03);&quot;&gt;The 2020 season of the Quidditch Premier League has regrettably been suspended due to the ongoing global pandemic. Please read our official statement for all the details, including next steps for players: &lt;/span&gt;&lt;a class=&quot;css-4rbku5 css-18t94o4 css-901oao css-16my406 r-1n1174f r-1loqt21 r-poiln3 r-bcqeeo r-qvutc0&quot; dir=&quot;ltr&quot; style=&quot;background-color: rgba(0, 0, 0, 0.03); color: #1b95e0; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; list-style: none; margin: 0px; text-decoration-line: none; cursor: pointer; border: 0px solid black; box-sizing: border-box; display: inline; padding: 0px; white-space: pre-wrap; overflow-wrap: break-word; min-width: 0px;&quot; role=&quot;link&quot; href=&quot;https://t.co/19g8Q6EVe2?amp=1&quot; target=&quot;_blank&quot; rel=&quot;noopener noreferrer&quot; data-focusable=&quot;true&quot;&gt;&lt;span class=&quot;css-901oao css-16my406 r-poiln3 r-hiw28u r-bcqeeo r-qvutc0&quot; style=&quot;border: 0px solid black; box-sizing: border-box; color: inherit; display: inline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 0px; line-height: inherit; font-family: inherit; margin: 0px; padding: 0px; white-space: inherit; overflow-wrap: break-word; min-width: 0px;&quot; aria-hidden=&quot;true&quot;&gt;http://&lt;/span&gt;quidditchpremierleague.com/news/covid-19&lt;/a&gt; &lt;span class=&quot;r-18u37iz&quot; style=&quot;-webkit-box-direction: normal; -webkit-box-orient: horizontal; flex-direction: row; color: #0f1419; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap; background-color: rgba(0, 0, 0, 0.03);&quot;&gt;&lt;a class=&quot;css-4rbku5 css-18t94o4 css-901oao css-16my406 r-1n1174f r-1loqt21 r-poiln3 r-bcqeeo r-qvutc0&quot; dir=&quot;ltr&quot; style=&quot;background-color: rgba(0, 0, 0, 0); color: #1b95e0; font: inherit; list-style: none; margin: 0px; text-align: inherit; text-decoration-line: none; cursor: pointer; border: 0px solid black; box-sizing: border-box; display: inline; padding: 0px; white-space: inherit; overflow-wrap: break-word; min-width: 0px;&quot; role=&quot;link&quot; href=&quot;https://twitter.com/hashtag/quidditch?src=hashtag_click&quot; data-focusable=&quot;true&quot;&gt;#quidditch&lt;/a&gt;&lt;/span&gt; &lt;span class=&quot;r-18u37iz&quot; style=&quot;-webkit-box-direction: normal; -webkit-box-orient: horizontal; flex-direction: row; color: #0f1419; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap; background-color: rgba(0, 0, 0, 0.03);&quot;&gt;&lt;a class=&quot;css-4rbku5 css-18t94o4 css-901oao css-16my406 r-1n1174f r-1loqt21 r-poiln3 r-bcqeeo r-qvutc0&quot; dir=&quot;ltr&quot; style=&quot;background-color: rgba(0, 0, 0, 0); color: #1b95e0; font: inherit; list-style: none; margin: 0px; text-align: inherit; text-decoration-line: none; cursor: pointer; border: 0px solid black; box-sizing: border-box; display: inline; padding: 0px; white-space: inherit; overflow-wrap: break-word; min-width: 0px;&quot; role=&quot;link&quot; href=&quot;https://twitter.com/hashtag/covid19?src=hashtag_click&quot; data-focusable=&quot;true&quot;&gt;#covid19&lt;/a&gt;&lt;/span&gt; &lt;span class=&quot;r-18u37iz&quot; style=&quot;-webkit-box-direction: normal; -webkit-box-orient: horizontal; flex-direction: row; color: #0f1419; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap; background-color: rgba(0, 0, 0, 0.03);&quot;&gt;&lt;a class=&quot;css-4rbku5 css-18t94o4 css-901oao css-16my406 r-1n1174f r-1loqt21 r-poiln3 r-bcqeeo r-qvutc0&quot; dir=&quot;ltr&quot; style=&quot;background-color: rgba(0, 0, 0, 0); color: #1b95e0; font: inherit; list-style: none; margin: 0px; text-align: inherit; text-decoration-line: none; cursor: pointer; border: 0px solid black; box-sizing: border-box; display: inline; padding: 0px; white-space: inherit; overflow-wrap: break-word; min-width: 0px;&quot; role=&quot;link&quot; href=&quot;https://twitter.com/hashtag/sport?src=hashtag_click&quot; data-focusable=&quot;true&quot;&gt;#sport&lt;/a&gt;&lt;/span&gt;&lt;/p&gt;', '2021-01-26 09:30:33', 'true', 2),
(16, 32, '&lt;p&gt;&lt;span style=&quot;color: #0f1419; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap; background-color: rgba(0, 0, 0, 0.03);&quot;&gt;You asked, we listened. Discover ethical and sustainable BIPOC owned clothing brands from around the globe. Let\'s celebrate diversity in fashion and back the change we want to see in the world.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://pbs.twimg.com/card_img/1353834721105637379/MnFzdEOx?format=jpg&amp;amp;name=small&quot; width=&quot;380&quot; height=&quot;200&quot; /&gt;&lt;/p&gt;', '2021-01-26 19:08:38', 'true', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tweet_answers`
--

CREATE TABLE `tweet_answers` (
  `id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweet_answers`
--

INSERT INTO `tweet_answers` (`id`, `tweet_id`, `user_id`, `answer`, `post_date`) VALUES
(1, 12, 22, '&lt;p&gt;Congrats, B &amp;lt;3&lt;/p&gt;', '2021-01-24 19:10:01'),
(2, 9, 22, '&lt;p&gt;Ahahahahah&lt;/p&gt;', '2021-01-24 20:37:24'),
(4, 2, 22, '&lt;p&gt;Hurraaay&lt;/p&gt;', '2021-01-24 20:48:08'),
(5, 2, 1, '&lt;p&gt;Congratulations&lt;/p&gt;', '2021-01-24 20:50:00'),
(6, 1, 1, '&lt;p&gt;Hello, buddy&lt;/p&gt;', '2021-01-24 20:52:31'),
(8, 5, 31, '&lt;p&gt;So was I&lt;/p&gt;', '2021-01-25 05:57:55'),
(9, 5, 32, '&lt;p&gt;Was I?&lt;/p&gt;', '2021-01-26 09:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `tweet_liked_users`
--

CREATE TABLE `tweet_liked_users` (
  `id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweet_liked_users`
--

INSERT INTO `tweet_liked_users` (`id`, `tweet_id`, `user_id`) VALUES
(18, 7, 1),
(19, 12, 1),
(20, 6, 1),
(21, 2, 1),
(22, 2, 2),
(23, 12, 2),
(24, 5, 2),
(25, 1, 2),
(26, 6, 8),
(27, 7, 8),
(28, 4, 8),
(29, 4, 11),
(30, 12, 11),
(31, 8, 11),
(32, 9, 11),
(34, 7, 22),
(35, 5, 22),
(36, 12, 22),
(39, 5, 31),
(40, 1, 31),
(41, 15, 31),
(43, 1, 32),
(44, 15, 32),
(45, 5, 32),
(46, 12, 32),
(47, 16, 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'cristiano@gmail.com', 'qwerty'),
(2, 'messi@hotmail.com', 'messi123'),
(8, 'bee@gmail.com', 'qwe'),
(11, 'potter@gmail.com', 'buklya'),
(21, 'james@gmail.com', 'jbjb'),
(22, 'HeyFranHey@gmail.com', 'heyhey'),
(31, 'ronw@gmail.com', 'hermi'),
(32, 'hermione@gmail.com', '999'),
(33, 'longbottom@gmail.com', 'long');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `name`, `surname`, `gender`, `country`, `city`, `avatar`) VALUES
(1, 1, 'Cristiano', 'Ronaldo', 'male', 'Portugal', 'Funchal', 'https://thumbor.forbes.com/thumbor/fit-in/416x416/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5ec593cc431fb70007482137%2F0x0.jpg%3Fbackground%3D000000%26cropX1%3D1321%26cropX2%3D3300%26cropY1%3D114%26cropY2%3D2093'),
(2, 2, 'Lionel', 'Messi', 'male', 'Argentina', 'Rosario', 'https://thumbor.forbes.com/thumbor/fit-in/416x416/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5ec595d45f39760007b05c07%2F0x0.jpg%3Fbackground%3D000000%26cropX1%3D989%26cropX2%3D2480%26cropY1%3D74%26cropY2%3D1564'),
(3, 8, 'Beyonce', 'Knowles-Carter', 'female', 'USA', 'Los Angeles', 'https://yt3.ggpht.com/ytc/AAUvwnhheBbk_iickpdFt8gymbqbxcWk44NSZvR9glBG8gA=s900-c-k-c0x00ffffff-no-rj'),
(6, 11, 'Harry', 'Potter', 'male', 'England', 'London', 'https://pyxis.nymag.com/v1/imgs/171/429/c95b07becc2bef532d9669b4824ea4386f-08-harry-potter.rsquare.w1200.jpg'),
(16, 21, 'James', 'Bond', 'male', 'England', 'London', 'https://www.mountainheavensella.com/wp-content/uploads/2018/12/default-user.png'),
(17, 22, 'Francheska', 'K', 'female', 'Italy', 'Rome', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn_halT3HSVom6RfGB_iHCcz7Tr0EZ3tWTaQ&usqp=CAU'),
(26, 31, 'Ronald', 'Weasley', 'male', 'England', 'Lancaster', 'https://www.channelnewsasia.com/image/12633936/1x1/600/600/6e08463beb66e24e25156b7a88a7d4a3/gO/rupert-grint-and-emma-watson.jpg'),
(27, 32, 'Hermione', 'Granger', 'female', 'England', 'London', 'https://shortyawards.imgix.net/entries/8th/emwatson.jpeg?auto=format&fit=crop&h=400&q=65&w=400&s=415339c1c6a3d4a1bd2e0f0ea67a8d0f'),
(28, 33, 'Neville', 'Longbottom', 'male', 'Scotland', 'Edinburgh', 'https://a1cf74336522e87f135f-2f21ace9a6cf0052456644b80fa06d4f.ssl.cf2.rackcdn.com/images/characters_opt/p-harry-potter-matthew-lewis.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet_answers`
--
ALTER TABLE `tweet_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet_liked_users`
--
ALTER TABLE `tweet_liked_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tweet_answers`
--
ALTER TABLE `tweet_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tweet_liked_users`
--
ALTER TABLE `tweet_liked_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
