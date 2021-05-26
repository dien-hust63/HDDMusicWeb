-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2021 lúc 04:25 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hddmusic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(64) NOT NULL,
  `admin_password_hash` varchar(255) NOT NULL,
  `admin_email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password_hash`, `admin_email`) VALUES
(4, 'nguyentiendung', '$2y$10$yRVJG8e0oIMdE0qMLw8LpOgGSg93DhxReiXRoLi5m9fx67kjs8n/K', 'nguyentiendung2000@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `artist`
--

INSERT INTO `artist` (`id`, `name`, `age`, `hometown`, `country`, `avatar`) VALUES
(2, 'Sơn Tùng MTP', 26, 'Thai Binh', 1, 'sontung.jpg'),
(4, 'Hoàng Dũng', 25, 'Thái Nguyên', 1, 'hoangdung.png'),
(5, 'Đen Vâu', 32, 'Quảng Ninh', 1, 'denvau.jpg'),
(6, 'Chillies', 32, 'Quảng Ninh', 1, 'chillies.jpg'),
(7, 'Hồ Ngọc Hà', 36, 'Huế', 1, 'hongocha.jpg'),
(8, 'MCK', 22, 'Hà Nội', 1, 'mck.jpg'),
(9, 'Noo Phước Thịnh', 32, 'Hồ Chí Minh', 1, 'noophuocthinh.jpg'),
(10, 'Bích Phương', 31, 'Hạ Long', 1, 'bichphuong.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artist_song`
--

CREATE TABLE `artist_song` (
  `id` int(11) NOT NULL,
  `artist` int(11) DEFAULT NULL,
  `song` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `artist_song`
--

INSERT INTO `artist_song` (`id`, `artist`, `song`) VALUES
(1, 4, 1),
(2, 2, 5),
(4, 5, 3),
(5, 6, 11),
(6, 2, NULL),
(7, 2, NULL),
(8, 2, NULL),
(9, 2, NULL),
(10, 2, NULL),
(11, 2, NULL),
(12, 2, NULL),
(13, 2, NULL),
(14, 2, NULL),
(15, 2, NULL),
(16, 2, NULL),
(17, 2, NULL),
(18, 2, NULL),
(19, 2, NULL),
(20, 2, NULL),
(21, 2, NULL),
(22, 2, NULL),
(23, 2, NULL),
(24, 2, NULL),
(25, 2, NULL),
(26, 2, NULL),
(27, 2, NULL),
(28, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(17, ''),
(28, 'America'),
(15, 'Brunei'),
(3, 'China'),
(42, 'dfs'),
(45, 'England'),
(33, 'fads'),
(47, 'France'),
(13, 'Indonexia'),
(5, 'Japan'),
(4, 'Korea'),
(12, 'Lao'),
(20, 'Singapore'),
(2, 'Thailand'),
(1, 'Viet Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'pop'),
(2, 'rap'),
(3, 'country'),
(4, 'rock'),
(5, 'jazz');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `user`) VALUES
(2, 'mydjfa', 7),
(3, 'mydjfa', 7),
(4, 'sdfEWF', 7),
(5, 'aff', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist_song`
--

CREATE TABLE `playlist_song` (
  `id` int(11) NOT NULL,
  `playlist` int(11) NOT NULL,
  `song` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lyrics` text DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `song`
--

INSERT INTO `song` (`id`, `name`, `lyrics`, `genre`, `country`, `link`, `summary`, `image`) VALUES
(1, 'Nàng thơ', 'Em, ngày em đánh rơi nụ cười vào anh\r\nCó nghĩ sau này em sẽ chờ\r\nVà vô tư cho đi hết những ngây thơ\r\nAnh, một người hát mãi những điều mong manh\r\nLang thang tìm niềm vui đã lỡ\r\nChẳng buồn dặn lòng quên hết những chơ vơ\r\nTa yêu nhau bằng nỗi nhớ chưa khô trên những bức thư\r\nTa đâu bao giờ có lỗi khi không nghe tim chối từ\r\nChỉ tiếc rằng\r\nEm không là nàng thơ\r\nAnh cũng không còn là nhạc sĩ mộng mơ\r\nTình này nhẹ như gió\r\nLại trĩu lên tim ta những vết hằn\r\nTiếng yêu này mỏng manh\r\nGiờ tan vỡ, thôi cũng đành\r\nXếp riêng những ngày tháng hồn nhiên\r\nTrả lại...\r\nMai, rồi em sẽ quên ngày mình khờ dại\r\nMong em kỷ niệm này cất lại\r\nMong em ngày buồn thôi ướt đẫm trên vai\r\nMai, ngày em sải bước bên đời thênh thang\r\nChỉ cần một điều em hãy nhớ\r\nCó một người từng yêu…', 1, 1, 'nangtho.mp3', NULL, 'nangtho.jpg'),
(3, 'Hai Triệu Năm', 'Anh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm\r\nAnh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm\r\nXung quanh anh toàn là nước, ay\r\nCơ thể anh đang bị ướt, ay\r\nMênh mông toàn là nước, ay\r\nÊm ái như chưa từng trước đây\r\nTrăm ngàn con sóng xô-ya\r\nAnh lao vào trong biển cả vì em làm anh nóng khô-ya\r\nAnh ngâm mình trong làn nước để mặn mòi từ da dẻ (mặn mòi từ da dẻ)\r\nTa cần tình yêu vì tình yêu làm cho ta trẻ (đúng rồi)\r\nAnh cũng cần em nhưng không biết em sao\r\nAnh không care lắm và anh quyết đem trao\r\nCho em hết nắng cho em hết đêm sao\r\nNhìn mặt anh đi, em nghĩ anh tiếc em sao?\r\nTrăm ngàn con sóng từ mọi nơi mà đổ về\r\nVà đây là cách mà anh đi tìm kiếm sự vỗ về\r\nEm có quá nhiều bí mật, anh thì không cần gặng hỏi\r\nEm sâu như là đại dương, anh thì không hề lặn giỏi (anh thì không hề lặn giỏi baby)\r\nAnh soi mình vào gương cho bõ công lau\r\nThấy mặt thấy người sao thấy rõ trong nhau\r\nÁnh mắt nụ cười kia không rõ nông sâu\r\nTa rồi sẽ là ai, một câu hỏi nhỏ trong đầu\r\nTa chỉ là hòn đất hay chỉ là cỏ bông lau\r\nNhư là mấy gã em mới bỏ không lâu\r\nHay chỉ là đầu thuốc kia cháy đỏ không lâu\r\nYêu em kiểu nông dân, yêu em kiểu quê mùa\r\nYêu từ vụ đông xuân, đến hè thu thay mùa\r\nNhưng em thì trơn trượt như là con cá chuối\r\nMuốn níu em trong tay, Khá Bảnh cũng khá đuối (Khá Bảnh cũng khá đuối)\r\nEm giống hệt như biển cả em có nhiều bí mật\r\nAnh làm rất nhiều thứ, để đồng tiền trong ví chật\r\nNgười ta không quý con ong, mà người ta chỉ quý mật\r\nEm hỏi anh nhạc sao hay, anh gọi nó là bí thuật, yo\r\nEm hỏi anh nhạc sao hay, anh gọi nó là bí thuật, yo\r\nAnh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm\r\nAnh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm\r\nNước đã hình thành trong hàng triệu năm (triệu năm)\r\nCát đã hình thành trong hàng triệu năm (triệu năm)\r\nBiển cả hình thành trong hàng triệu năm (triệu năm)\r\nSao em làm anh buồn sau hàng triệu năm? (triệu năm)\r\nGặp em từ thể đơn bào, rồi tiến hoá\r\nXa em từ khi thềm lục địa đầy biến hoá\r\nMuốn được ôm em qua kỷ Ju-ra\r\nHoá thạch cùng nhau trên những phiến đá (phá đá cùng nhau)\r\nRồi loài người tìm thấy lửa, anh lại tìm thấy em\r\nAnh tưởng rằng mọi thứ sẽ được bùng cháy lên\r\nMuốn được cùng em, trồng rau bên hồ cá\r\nNhưng tim em lúc đó, đang là thời kì đồ đá\r\nAnh đã tin vào em như tin vào thuyết nhật tâm\r\nNhư Ga-li-lê người ta nói anh thật hâm\r\nCó lẽ Đác-win biết biển cả sẽ khô hơn\r\nNhưng anh tin ông ta không biết chúng ta đang tiến hoá để cô đơn (tiến hoá để cô đơn)\r\nVà có lẽ Đác-win biết biển cả sẽ khô hơn\r\nNhưng anh tin ông ta không biết chúng ta đang tiến hoá để cô đơn (tiến hoá để cô đơn)\r\nAnh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm\r\nAnh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm\r\nAnh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm\r\nAnh cô đơn giữa tinh không này\r\nMuôn con sóng cuốn xô vào đây\r\nEm cô đơn giữa mênh mông người\r\nVà ta cô đơn đã hai triệu năm', 2, 1, 'haitrieunam.mp3', NULL, 'haitrieunam.png'),
(5, 'Nắng ấm xa dần', 'Nắng ấm xa dần rồi.\r\nNắng ấm xa dần rồi.\r\nNắng ấm xa dần bỏ rơi, để lại những giấc mơ .\r\n(Giữ lại đi, giữ lại đi.)\r\nNắng ấm xa dần rồi.\r\nNắng ấm xa dần rồi.\r\nNắng ấm xa dần, xa dần theo những tiếng cười .\r\n(Hãy mang đi giúp những nỗi buồn)\r\nTheo thời gian những hạt mưa như nặng thêm.\r\nXóa hết thương yêu mặn nồng ngày nào giữa chúng ta.\r\nAnh lục tìm vẫn cứ mãi lục tìm.\r\nGiơ bàn tay cố kìm nén những cảm xúc.\r\nVùi mình vào đêm đen anh chẳng tìm thấy lối ra.\r\nSau lưng là tiếng nói yêu anh, chẳng rời xa anh.\r\nTrước mắt anh điều đấy, nó dối trá, tại sao người vội quên mau?\r\nLà vì em.\r\nBài ca anh viết sẽ không được trọn vẹn đâu em.\r\nBước đi.\r\nEm yêu một ai thật rồi mãi chẳng là anh đâu.\r\nVậy thì người cứ bước đi xa nơi này.\r\nÁnh bình minh sẽ không còn nơi đây.\r\nBước đi xa nơi này.\r\nSẽ không còn nơi đây.\r\nPhải tự đứng lên mà thôi, che nhẹ đi những niềm đau và nỗi buồn.\r\nXung quanh anh giờ đây cô đơn mình anh ôm giấc mơ.\r\nNhìn em bước ra đi xa dần.\r\nEhhhhhh... .\r\nEm bước ra đi xa dần.\r\nEhhhhh...\r\nNhìn em bước ra đi xa dần.\r\nEhhhhh...\r\nNhìn em bước ra đi xa dần...\r\nĐến rồi lại đi.\r\nCứ vội vàng đi.\r\nTrao cho anh bao yêu thương rồi em lại bỏ đi.\r\nGieo trong anh bao nhiêu niềm đau, rồi em mau,\r\nRời bỏ anh, xa anh, quay mặt lặng lẽ quên mau.\r\nUhhh.\r\nEm yêu quên thật rồi.\r\nUhhh.\r\nChẳng một lời chia li, quên rồi, em yêu quên rồi, quên rồi ...\r\nVậy thì người cứ bước đi xa nơi này.\r\nÁnh bình minh sẽ không còn nơi đây.\r\nBước đi xa nơi này.\r\nSẽ không còn nơi đây.\r\nPhải tự đứng lên mà thôi, che nhẹ đi những niềm đau và nỗi buồn.\r\nXung quanh anh giờ đây cô đơn mình anh ôm giấc mơ.\r\nVậy thì người cứ bước đi xa nơi này.\r\nÁnh bình minh sẽ không còn nơi đây.\r\nBước đi xa nơi này.\r\nSẽ không còn nơi đây.\r\nPhải tự đứng lên mà thôi, che nhẹ đi những niềm đau và nỗi buồn.\r\nXung quanh anh giờ đây cô đơn mình anh ôm giấc mơ.\r\nNhìn em bước ra đi xa dần.\r\nEhhhhhh.\r\nNhìn em bước ra đi xa dần.\r\nEhhh... Year...\r\nNhìn em, nhìn em bước đi.\r\nEhhh... Year...\r\nNhìn em bước ra đi xa dần.\r\nEhhh... Year...\r\nNắng ấm xa dần rồi .\r\nNắng ấm xa dần rồi.\r\nNắng ấm xa dần bỏ rơi, để lại những giấc mơ.(giữ lại đi, giữ lại đi.)\r\nNắng ấm xa dần rồi.\r\nNắng ấm xa dần, xa dần theo những tiếng cười.\r\n(Hãy mang đi giúp những nỗi buồn)', 1, 1, 'nangamxadan.mp3', NULL, 'nangamxadan.jpeg'),
(11, 'Vùng kí ức', 'Trên phím đàn\r\nEm bỏ lại ngày tháng bạc màu\r\nEm bỏ lại nỗi nhớ ngày đầu\r\nEm quên một câu nói\r\nĐừng đi\r\nThêm chút đường\r\nLy đen dường như chẳng dịu lại\r\nNhư cung đàn đã hoá khờ dại\r\nChênh vênh một mình giữa tay ai\r\nVùng ký ức xưa ta còn nhau, còn đâu em hỡi?\r\nNhiều lần đã cố gắng quên đi dù cho\r\nTình mình đã vỡ đôi\r\nEm tiếc nuối thêm làm chi?\r\nCòn lại những giọt buồn trên mi\r\nMang những thanh âm kia cùng em đi\r\nGửi lại vùng ký ức ta trao về em\r\nMột ngày đầy nắng\r\nNụ cười người mỗi lúc mây tan vào đêm\r\nMột ngày người ghé thăm\r\nNgày mai nắng như nhạt hơn\r\nVà ta thức dậy như đã lớn\r\nThôi giấc mơ trôi đi\r\nEm có quên đôi khi một mai\r\nTa lỡ hẹn\r\nÁnh mặt trời trên nóc toà nhà\r\nQuay sang nhìn như hai người lạ\r\nĐưa tay chào nhau cuối sân ga\r\nVùng ký ức xưa ta còn nhau, còn đâu em hỡi?\r\nNhiều lần đã cố gắng quên đi dù cho\r\nTình mình đã vỡ đôi\r\nEm tiếc nuối thêm làm chi?\r\nCòn lại những giọt buồn trên mi\r\nMang những thanh âm kia cùng em đi\r\nGửi lại vùng ký ức ta trao về em\r\nMột ngày đầy nắng\r\nNụ cười người mỗi lúc mây tan vào đêm\r\nMột ngày người ghé thăm\r\nVà ngày mai nắng như nhạt hơn\r\nVà ta thức dậy như đã lớn\r\nThôi giấc mơ trôi đi\r\nEm có quên đôi khi một mai\r\nVùng ký ức xưa ta còn nhau...\r\nVùng ký ức xưa ta còn nhau, còn đâu em hỡi?\r\nNhiều lần đã cố gắng quên đi dù cho\r\nTình mình đã vỡ đôi\r\nEm tiếc nuối thêm làm chi?\r\nCòn lại những giọt buồn trên mi\r\nMang những thanh âm kia cùng em đi\r\nGửi lại vùng ký ức ta trao về em\r\nMột ngày đầy nắng\r\nNụ cười người mỗi lúc mây tan vào đêm\r\nMột ngày người ghé thăm\r\nVà ngày mai nắng như nhạt hơn\r\nVà ta thức dậy như đã lớn\r\nThôi giấc mơ trôi đi\r\nEm có quên đôi khi một mai', 1, 1, 'vungkyuc.mp3', NULL, 'vungkyuc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_image`) VALUES
(7, 'nguyenvandien', '$2y$10$wCcTckBvmC3I6.TVOjNblOvl9Xc5p64nXfkkoSG7r2G9RRWXoDYjG', 'nguyenvandien2000@gmail.com', NULL),
(8, 'tranduchuy', '$2y$10$HRmWhNaL0JJ.0t0aK7Ekje5GiAQ64q6xaSkQ8Z2zXMcrj5DXMICy.', 'tranduchuy2000@gmail.com', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Chỉ mục cho bảng `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_artist_country` (`country`);

--
-- Chỉ mục cho bảng `artist_song`
--
ALTER TABLE `artist_song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`),
  ADD KEY `song` (`song`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_playlist_user_2` (`user`);

--
-- Chỉ mục cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_song_playlist_1` (`playlist`),
  ADD KEY `FK_song_playlist_2` (`song`);

--
-- Chỉ mục cho bảng `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_song_genre` (`genre`),
  ADD KEY `FK_song_country` (`country`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `artist_song`
--
ALTER TABLE `artist_song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `FK_artist_country` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `artist_song`
--
ALTER TABLE `artist_song`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`artist`) REFERENCES `artist` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`song`) REFERENCES `song` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `FK_playlist_user_2` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD CONSTRAINT `FK_song_playlist_1` FOREIGN KEY (`playlist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_song_playlist_2` FOREIGN KEY (`song`) REFERENCES `song` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FK_song_country` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_song_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
