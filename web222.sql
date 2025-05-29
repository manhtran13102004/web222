-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2022 at 05:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web222`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Thực phẩm'),
(2, 'Nước ngọt'),
(3, 'Bánh kẹo'),
(4, 'Trái cây');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`) VALUES
(3, 'Customer'),
(101, 'PHAN NGỌC YẾN NHI'),
(102, 'NGUYỄN TRẦN MINH HUỆ'),
(103, 'LÊ HOÀNG NAM'),
(104, 'LÊ THỊ TẾT'),
(105, 'LÊ THỊ NGỌC THANH'),
(106, 'NGUYỄN THỊ THÚY LOAN'),
(107, 'NGUYỄN THỊ KIM HOÀNG'),
(108, 'NGUYỄN THỊ KIM YẾN'),
(109, 'HUỲNH VĂN ẢNH'),
(110, 'NGUYỄN TẤN DƯƠNG'),
(111, 'LÊ VẠN PHƯỚC'),
(112, 'NGUYỄN THANH TÀI'),
(113, 'LÊ NGỌC LỜI'),
(114, 'LÊ NGUYỄN HÙNG PHONG'),
(115, 'NGUYỄN THANH YẾN VY'),
(116, 'HUỲNH VĂN CHÍNH'),
(117, 'PHẠM MỸ XƯƠNG'),
(118, 'VĂN CÔNG ĐỂ'),
(119, 'HUỲNH THỊ THANH GIẶP'),
(120, 'HUỲNH CÔNG LIÊM'),
(121, 'ĐĂNG NGỌC THANH TÂM'),
(122, 'CAO THỊ NGUYỆT'),
(123, 'PHẠM THỊ ÁNH LOAN'),
(124, 'ĐẶNG LỆ HÀ'),
(125, 'GIANG HÙNG ĐẠT'),
(126, 'PHAN THỊ HỒNG PHƯỢNG'),
(127, 'NGUYỄN HOÀNG GIANG'),
(128, 'ĐẶNG QUỐC TOÀN'),
(129, 'HỒ THỊ CẢNH'),
(130, 'TRƯƠNG THỊ AN'),
(131, 'ĐỖ THỊ THÚY KIỀU'),
(132, 'NGUYỄN THANH QUỐC HƯNG'),
(133, 'HUỲNH THỊ ÚT'),
(134, 'NGUYỄN HOÀ̀NG KHÁNH DUY'),
(135, 'NGUYỄN THỊ BẢY'),
(136, 'HUỲNH NGỌC HƯNG'),
(137, 'TRƯƠNG HOÀNG THÁI'),
(138, 'NGUYỄN THỊ BÍCH DU'),
(139, 'LÊ VÕ TUẤN AN'),
(140, 'PHẠM VĂN HỌC'),
(141, 'VÕ THỊ PHƯƠNG NAM'),
(142, 'LÊ NGỌ̣C THƯƠNG'),
(143, 'HUỲNH TẤN KHƯƠNG'),
(144, 'VÕ THỊ HOÀNG'),
(145, 'NGUYỄN VÕ HOÀNG PHÚC'),
(146, 'NGUYỄN THỊ THANH'),
(147, 'NGUYỄN THỊ TÁM'),
(148, 'NGUYỄN VĂN MƯỜI'),
(149, 'VÕ NGUYỄN BẢO NGỌC'),
(150, 'VÕ VĂN TRƯỜNG');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `img_news` varchar(255) NOT NULL,
  `header_news` text NOT NULL,
  `intro_news` text NOT NULL,
  `content_news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `img_news`, `header_news`, `intro_news`, `content_news`) VALUES
(1, 'https://cdn.tuoitre.vn/thumb_w/730/2022/7/17/z3571554423834daf1b9e26195706fde61ab9dff05f65f-1read-only-16580255492061280331606.jpg', 'Nông sản, thực phẩm trôi nổi vẫn còn nhiều', 'Từ rạng sáng, Bộ trưởng đi kiểm tra tại chợ đầu mối Bình Điền và các kênh phân phối hiện đại; sau đó làm việc với Công ty cổ phần VN kỹ nghệ súc sản (Vissan), thăm các trang trại sản xuất rau, dưa lưới ở Hóc Môn và Củ Chi.', 'Qua kiểm tra thực tế, Bộ trưởng Lê Minh Hoan thừa nhận tình trạng buôn bán hàng trôi nổi vẫn còn nhiều. “Sáng nay, chúng ta đi kiểm tra thực tế chợ Bình Điền chứng kiến bên trong chợ họ làm khá tốt nhưng phía ngoài tình trạng buôn bán hàng trôi nổi rất nhiều. Việc này sẽ làm những người phía bên trong mất lòng tin và họ chạy ra ngoài, dẫn đến mất kiểm soát. Chính vì vậy cần có sự vào cuộc của các cấp chính quyền địa phương”, Bộ trưởng cho biết và nhận xét: Trước đây chúng ta không biết ai làm gì, ở đâu, số lượng bao nhiêu, giá cả như thế nào… đến ngay cả chính sách hỗ trợ cũng gặp khó khăn. Chính vì vậy mà khâu kiểm soát chất lượng sản phẩm cũng gặp rất nhiều khó khăn, thiếu minh bạch. Giờ muốn kiểm soát chất lượng cần phải thiết lập lại hệ thống tổ chức, giải bài toán nông nghiệp nhỏ lẻ bằng sự liên kết giữa nông dân và doanh nghiệp, có đăng ký và quản lý giám sát lẫn nhau. Nếu chỉ có riêng bộ máy quản lý nhà nước thì không thể làm hết được.\r\n\r\nChuyến khảo sát của Bộ NN-PTNT nhằm chuẩn bị cho hội nghị “Đảm bảo chất lượng, an toàn thực phẩm và minh bạch nguồn gốc xuất xứ thực phẩm cho người tiêu dùng VN”, được tổ chức sáng nay 18.10.'),
(2, 'https://images2.thanhnien.vn/Uploaded/phanhau/2022_11_10/toyen-5072.jpeg', 'Trung Quốc chính thức nhập khẩu khoai lang, tổ yến của Việt Nam', 'Ngày 10.11, Bộ NN-PTNT cho biết đã tiếp nhận thông tin từ công điện hỏa tốc của Đại sứ quán Việt Nam tại Trung Quốc về nghị định thư xuất khẩu khoai lang, tổ yến Việt Nam sang Trung Quốc.', 'Trong ngày 9.11, Đại sứ quán Việt Nam tại Trung Quốc đã nhận được nghị định thư (phía Trung Quốc đã ký), về yêu cầu kiểm dịch thực vật đối với sản phẩm tổ yến và khoai lang của Việt Nam xuất khẩu sang Trung Quốc giữa Bộ NN-PTNT và Tổng cục Hải quan Trung Quốc.\r\n\r\nTheo đó, từ đầu năm 2022, Bộ NN-PTNT và Đại sứ quán Việt Nam tại Trung Quốc đã tăng cường các hoạt động thúc đẩy việc mở cửa thị trường của sản phẩm nông sản Việt Nam xuất khẩu sang Trung Quốc. Đến nay, hai bên đã hoàn tất việc mở cửa thị trường xuất khẩu cho quả sầu riêng và đang tiến hành thí điểm xuất khẩu đối với quả chanh leo vào thị trường Trung Quốc.\r\n\r\nGần đây nhất, Trung Quốc đã ký nghị định thư về yêu cầu kiểm dịch thực vật đối với quả chuối tươi, qua đó tạo điều kiện để xuất khẩu chuối tươi Việt Nam xuất khẩu chính ngạch sang Trung Quốc.\r\n\r\nThông tin từ Cục Bảo vệ thực vật (Bộ NN-PTNT) cho biết, khoai lang và tổ yến sẽ là sản phẩm nông sản thứ 12, 13 xuất khẩu chính ngạch vào thị trường Trung Quốc sau 11 loại quả gồm: thanh long, nhãn, chôm chôm, xoài, mít, dưa hấu, chuối, măng cụt, vải và sầu riêng.\r\n\r\nĐối với quả chanh leo, phía Trung Quốc đã đồng ý cho xuất khẩu thử nghiệm và chỉ đi qua cửa khẩu Quảng Tây của Trung Quốc. Sau khoai lang và tổ yến, Cục Bảo vệ thực vật sẽ tiếp tục các thủ tục để xuất khẩu quả bưởi và quả dừa tươi vào thị trường Trung Quốc.'),
(3, 'https://image.vtc.vn/resize/th/upload/2022/08/13/123-07194844.png', 'Có nên ăn nấm trong mùa mưa bão?', 'Mùa mưa bão đang kéo đến là “thời điểm vàng” cho các căn bệnh truyền nhiễm sinh sôi. Do đó, điều quan trọng nhất là phải tăng cường sức đề kháng của cơ thể trong giai đoạn này bằng một chế độ ăn lành mạnh và an toàn. Nấm có nên nằm trong chế độ ăn đó?', 'Rashi Chahal, một nhà dinh dưỡng học nổi tiếng, đã chia về mức độ an toàn của việc ăn nấm trong mùa mưa. Theo bà, để giữ được thân hình cân đối và khỏe mạnh trong những đợt gió mùa, bạn cần tuân thủ một chế độ ăn uống đầy đủ chất dinh dưỡng để tăng sức đề kháng. Đối với những người có sức khỏe kém, nên tránh ăn nấm vào khi trời trở gió vì nấm phát triển trong môi trường ẩm và có nhiều vi khuẩn gây bệnh sinh sôi bên trong.\r\nTuy nhiên, đừng quên rằng nấm cũng có rất nhiều lợi ích cho sức khỏe.\r\n\r\nLợi ích của nấm trong chế độ ăn uống thường ngày là gì?\r\n\r\nNếu bạn không phải đối tượng cần phải hạn chế sử dụng nấm trong giai đoạn gió mùa, thì việc kết hợp loại rau này trong chế độ ăn uống hằng ngày là vô cùng có lợi.\r\n\r\nNấm cung cấp chất béo, cholesterol có lợi, gluten, chất xơ và khi ăn nấm, bạn nạp rất ít lượng calo và natri cho cơ thể. Nấm cũng rất dồi dào vitamin B - một nguồn dinh dưỡng có khả năng tăng cường sức đề kháng, điều chỉnh hệ thống miễn dịch và hỗ trợ chống lại các bệnh truyền nhiễm, đặc biệt là trong giai đoạn này.\r\niTVC from Admicro\r\nBên cạnh đó, nấm giúp bảo vệ bạn bởi vì nó có tính kháng khuẩn mạnh và chống lại virus. Nhiều loại thuốc kháng sinh truyền thống được bào chế từ nấm. Một số loại nấm có tác dụng bổ dưỡng, củng cố hệ thống miễn dịch và cải thiện một số bệnh ung thư.\r\n\r\nLưu ý cách ăn nấm an toàn\r\n\r\nNấm sống trong môi trường tuyệt đối sạch, thân nấm lại ở dạng xốp và sợi nên khi rửa nấm sẽ làm nước đọng lại khiến cho nấm không còn được ngọt. Vì vậy không nên rửa kỹ, chỉ cần rửa nhanh dưới vòi nước lạnh, sau đó thấm chúng thật khô ráo.\r\n\r\nKhi chế biến các loại nấm, bạn nên nhẹ nhàng tránh làm nấm bị dập nát dễ nhiễm khuẩn.\r\n\r\nTuy nhiên, một số loại nấm bắt buộc phải vệ sinh nếu trong quá trình vận chuyển để gây bẩn vào, nhưng nên rửa dưới vòi nước dạng hơi sương chứ không rửa trực tiếp nước vào thân nấm sẽ làm hỏng thịt nấm.\r\n\r\nKhi sử dụng nấm tuyệt đối phải cắt bỏ chân (cắt gốc) vì chân nấm là nơi tiếp xúc với chất dinh dưỡng, phần bọc và nuôi cây giống là một số chất vô cơ mà chúng ta không nên sử dụng.\r\n\r\nCần ăn nấm được nấu chín hoàn toàn, tức là khoảng 5 - 10 phút sau khi đun sôi. Sau khi ăn nấm xong không nên dùng ngay đồ uống lạnh  như trà đá hoặc cà phê đá, bởi vì nấm mang tính bổ âm nên uống ngay đồ lạnh sau đó thì dễ bị lạnh bụng.'),
(4, 'https://image.vtc.vn/resize/th/upload/2022/08/01/1587009331-174-thumbnailschemaarticle-09370422.jpg', 'Những người nên tránh xa thịt vịt', 'Thịt vịt không chỉ thơm ngon mà còn đem lại nguồn dinh dưỡng rất tốt cho cơ thể, nhưng những người dưới đây tuyệt đối hạn chế ăn thịt vịt.\r\nThịt vịt là món ăn dân dã nhưng lại vô cùng độc đáo, chính vì vậy nó từ lâu đã trở thành món khoái khẩu của nhiều hộ gia đình Việt Nam. Vào mùa hè, thịt chỉ chỉ cần đem luộc, chấm cùng chút nước mắm gừng là đủ làm xao xuyến nhiều người.\r\nNhưng thịt vịt không chỉ ngon mà còn có hàm lượng dinh dưỡng rất cao. Trung bình trong 100g thịt vịt có khoảng 25g chất protein, hàm lượng này cao gấp nhiều lần lượng protein có trong thịt bò, thịt heo, thịt dê, cá, trứng. Ngoài ra, thịt vịt cũng cung cấp nhiều dưỡng chất như canxi, photpho, sắt, vitamin (B1, B2, A, D, E), acide nicotic…', 'Những thực phẩm đại kỵ với thịt vịt\r\n\r\nThịt vịt kỵ với quả mận\r\n\r\nThịt vịt tính hàn giúp giải nhiệt tốt cho cơ thể. Còn quả mận ăn vào nóng trong sẽ sinh nóng ruột. Nếu bạn ăn hai thực phẩm này gần thời gian với nhau hoặc ăn cùng một lúc sẽ gây ra bệnh khó tiêu, chướng bụng, nóng ruột hại cho sức khỏe.\r\n\r\nThịt ba ba\r\n\r\nLý do không nên ăn hai loại thực phẩm này chung với nhau được các chuyên gia giải thích như sau: Thịt ba ba tính ngọt, bình lại không độc, còn thịt vịt thì thuộc tính mát. Nếu ăn chung sẽ gây phù thũng, tiêu chảy. Ngoài ra, thịt ba ba có nhiều hoạt chất sinh học, thịt vịt chứa nhiều đạm, ăn chung với nhau sẽ làm biến chất đạm, giảm giá trị dinh dưỡng. Cho nên thịt vịt không nên ăn chung với thịt ba ba là như thế.\r\n\r\nTrứng gà\r\n\r\nTrứng gà và thịt vịt đều tính hàn, kết hợp với nhau có thể làm tổn hại đến nguyên khí trong cơ thể.\r\n\r\nThịt rùa\r\n\r\nCũng giống như thịt ba ba, nếu ăn thịt rùa chung với thịt vịt sẽ làm cho cơ thể bạn rơi vào tình trạng \"âm thịnh dương suy\", từ đó gây phù nề, tiêu chảy.\r\nTỏi\r\n\r\nTỏi có tính nóng, trong khi đó thịt vịt có tính hàn, nên nếu kết hợp sẽ không hề có lợi cho đường ruột và hệ tiêu hóa.\r\n\r\nNhững người không nên ăn thịt vịt\r\n\r\nNgười đang bị cảm\r\n\r\nKhi bạn vừa bị cảm xong thể trạng cơ thể còn nhiều mệt mỏi thì không nên ăn thịt vịt. Đặc biệt là khi bị cảm lạnh, bởi thịt vịt có tính hàn giúp giải nhiệt sẽ khiến cho cơ thể bạn lạnh bụng, tiêu chảy và khó chịu trong người làm người bệnh đang ốm càng ốm thêm\r\n\r\nNgười đang bị ho\r\n\r\nNhững người bị ho không nên ăn thịt vịt bởi trong thành phần thịt vịt có chất tanh, mà người ho thường phải kiêng tanh. Bởi ăn tanh sẽ khiến người bệnh khó thở. Mùi tanh trong thành phần của thịt vịt sẽ khiến cho người bệnh dễ ho thêm. Vì vậy, nếu trong nhà bạn có người ho thì đừng cho họ ăn thịt vịt kẻo rước thêm bệnh nhé.\r\n\r\nNgười bị bệnh gout\r\n\r\nTrong thành phần của thịt vịt có chứa hàm lượng purin và protein rất cao khiến cho axit uric trong cơ thể con người tăng cao. Vì vậy, với những người mắc bệnh gout không nên ăn thịt vịt kẻo tình trạng bệnh nguy hiểm hơn. Khi ăn thịt vịt người bệnh gout càng thêm nghiêm trọng hơn.\r\n\r\nNgười có hệ tiêu hóa kém\r\n\r\nVới những người đang mắc căn bệnh tiêu hóa, khó tiêu, chướng bụng, tiêu chảy.., thì tuyệt đối không nên ăn thịt vịt bởi thịt vịt chứa nhiều chất béo khiến cho hệ tiêu hóa tăng thêm gánh nặng làm bệnh tình thêm nặng hơn.\r\n\r\nNgười có thể chất yếu, lạnh\r\n\r\nTheo Đông y, thịt vịt có tính lành, đối với những người có thể trạng hàn lạnh thì nên hạn chế ăn thịt vịt, bởi sau khi ăn vào có thể sẽ gây lạnh bụng, dẫn đến cảm giác chán ăn, đau bụng, tiêu chảy hoặc các dấu hiệu tiêu hóa bất lợi khác.');

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `intro` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `quantity`, `price`, `avatar`, `category_id`, `intro`) VALUES
(21, 'Thịt lợn mán', 10, 160000, '/products/21.png', 1, 'Thịt lợn sạch, được cho ăn thức ăn thiên nhiên.'),
(22, 'Sụn Úc', 20, 75000, '/products/22.png', 1, 'Sụn nhập từ Úc, bảo quản qua quy trình chuyên nghiệp.'),
(23, 'Sườn già', 30, 60000, '/products/23.png', 1, 'Sườn già tươi mổ trong ngày.'),
(24, 'Ba chỉ bò Mỹ', 40, 160000, '/products/24.png', 1, 'Ba chỉ bò Mỹ thái cuộn.'),
(31, 'Bí xanh', 10, 10000, '/products/31.png', 1, 'Bí sạch không thuốc trừ sâu.'),
(32, 'Rau cải kale', 20, 25000, '/products/32.png', 1, 'Rau sạch không thuốc trừ sâu.'),
(33, 'Bắp cải Sapa', 30, 45000, '/products/33.png', 1, 'Bắp cải sạch không thuốc trừ sâu.'),
(34, 'Rau cải mèo', 40, 55000, '/products/34.png', 1, 'Rau cải sạch không thuốc trừ sâu.'),
(41, 'Ốc giác', 10, 185000, '/products/41.png', 1, 'Ốc tươi mới đánh bắt.'),
(42, 'Cua Cà Mau', 20, 339000, '/products/42.png', 1, 'Cua tươi mới đánh bắt.'),
(43, 'Râu bạch tuộc', 30, 50000, '/products/43.png', 1, 'Bạch tuộc tươi mới đánh bắt.'),
(44, 'Tôm sú', 40, 45000, '/products/44.png', 1, 'Tôm sú mới đánh bắt.'),
(1, 'Sprite Hương Chanh 320ml', 10, 9200, '/products/02.jpg', 2, 'Vị chanh tươi mát cùng những bọt ga sảng khoái tê đầu lưỡi, nước ngọt Sprite hương chanh 320ml giúp bạn đập tan cơn khát.'),
(2, 'Pepsi Không Calo 320ml', 10, 10600, '/products/1.jpg', 2, 'Nước ngọt Pepsi không calo lon 320ml với lượng gas lớn sẽ giúp bạn xua tan mọi cảm giác mệt mỏi, căng thẳng, sản phẩm không calo lành mạnh, tốt cho sức khỏe.'),
(3, 'Pepsi Cola Sleak 245ml', 10, 8500, '/products/2.jpg', 2, 'Nước ngọt Pepsi Cola Sleek 245ml giúp giải khát, bù nước cho cơ thể, thành phần an toàn không chứa chất bảo quản độc hại.'),
(4, 'Mirinda Cam 330ml', 10, 8500, '/products/3.jpg', 2, 'Nước ngọt Mirinda vị cam, chua ngọt tươi mát giúp bạn giải khát nhanh chóng, bừng tỉnh năng lượng sảng khoái, thiết kế lon nhỏ tiện lợi, bao bì ấn tượng, trẻ trung phù hợp với giới trẻ.'),
(5, 'Coca Cola 390ml', 10, 7800, '/products/4.jpg', 2, 'Nước ngọt Coca Cola chai 390ml xua tan nhanh mọi cảm giác mệt mỏi, căng thẳng, đặc biệt thích hợp sử dụng với các hoạt động ngoài trời.'),
(6, 'Mirinda Soda Kem 330ml', 10, 7000, '/products/5.jpg', 2, 'Nước ngọt Mirinda vị soda kem tươi mát giúp bạn giải khát nhanh chóng, bừng tỉnh năng lượng sảng khoái, thiết kế lon nhỏ tiện lợi, bao bì ấn tượng, trẻ trung phù hợp với giới trẻ.'),
(7, 'Srite Chai 390ml', 10, 7000, '/products/6.jpg', 2, 'Vị chanh tươi mát cùng những bọt ga sảng khoái tê đầu lưỡi, nước ngọt Sprite hương chanh 320ml giúp bạn đập tan cơn khát.'),
(8, 'Fanta Nho 320ml', 10, 7000, '/products/8.jpg', 2, 'Nước ngọt Fanta hương nho 320ml chua ngọt tươi mới, thơm ngon mang đến cho bạn cảm giác sảng khoái cùng vị ga thích thú. Sản phẩm chính hãng, giá tốt.'),
(51, 'Kẹo ổi Oishi', 10, 10000, '/products/51.jpg', 3, 'Kẹo túi 32 viên, có vị thơm và ngọt của hương ổi.'),
(52, 'Kẹo bạc hà Dinamite', 20, 10500, '/products/52.jpg', 3, 'Kẹo ngọt thanh hương bạc hà, bên trong nhân socola sánh mịn.'),
(53, 'Kẹo dâu Alpenliebe', 25, 25000, '/products/53.jpg', 3, 'Kẹo ngọt và thơm, hương dâu đặc trưng cùng với vị sữa.'),
(54, 'Kẹo chanh muối Alpenliebe', 30, 20000, '/products/54.jpg', 3, 'Kẹo ngọt thơm sữa với hương vị chanh muối.'),
(55, 'Snack Bento', 10, 45000, '/products/55.jpg', 3, 'Vị cay nồng nàn của hương mực tẩm gia vị.'),
(56, 'Snack tôm Lays', 20, 40000, '/products/56.jpg', 3, 'Snack mới chế biến từ tôm tươi, kết hợp với khoai tây cho hương vị độc đáo.'),
(57, 'Snack rong biển Peke', 25, 25000, '/products/57.jpg', 3, 'Snack kết hợp khoai tây với rong biển.'),
(58, 'Snack thịt nướng Slike', 30, 25000, '/products/58.jpg', 3, 'Snack mới lạ, kích thích vị giác.'),
(11, 'Dưa lưới vỏ xanh', 10, 45000, '/products/11.png', 4, 'Quả tròn, thịt màu cam, rất thơm và ngọt, độ đường 14 - 15%, trái nặng 1,3 - 1,5 kg.'),
(12, 'Dưa hoàng kim', 20, 40000, '/products/12.png', 4, 'Dưa Vàng Kim Hoàng Hậu. Trọng lượng quả 1,8kg/quả. Độ Brix >= 14.'),
(13, 'Nho xanh không hạt', 25, 250000, '/products/13.png', 4, 'Nho xanh Úc là một trong những giống nho phổ biến và được yêu thích nhất hiện nay, phần vỏ màu xanh lá cây khi chín ngả sang màu vàng, quả hình bầu dục, thịt dày chắc ngọt, nhiều nước và không có hạt.'),
(14, 'Kiwi vàng Úc', 30, 250000, '/products/14.png', 4, 'Kiwi vàng có thịt quả màu vàng trong rất đẹp mắt, với nhiều hạt đen tạo thành 1 vòng tròn xung quanh trục dọc của quả. Kiwi vàng có vị ngọt thanh mát rất đặc trưng.'),
(15, 'Dưa hấu không hạt', 10, 45000, '/products/15.jpg', 4, 'Dưa hấu không hạt có vỏ căng, xanh, bóng, thịt dưa ngọt thanh mát và rất giàu các chất dinh dưỡng cần thiết cho cơ thể. Trái nặng 2.8kg.'),
(16, 'Bưởi năm roi', 20, 40000, '/products/16.jpg', 4, 'Vỏ xanh, tách ra bên trong ruột có màu vàng nhạt, có vị ngọt thanh và chua nhẹ, trái 1.6kg.'),
(17, 'Mãng cầu tây', 25, 25000, '/products/17.jpg', 4, 'Mãng cầu tây có vị thơm nồng nàn, có vị ngọt thanh và dịu.'),
(18, 'Xoài cát Đài Loan', 30, 25000, '/products/18.jpg', 4, 'Xoài thơm, chua, vỏ mỏng, hạt lép.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('customer','admin') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `phone`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '0123456789', '123456', 'admin'),
(2, 'Hoa', 'hoatran@gmail.com', '0123456789', '123456', 'admin'),
(3, 'Customer', 'customer@gmail.com', '0123156789', '123456', 'customer'),
(4, 'Phong', 'phongnguyen@gmail.com', '0123456789', '123456', 'admin'),
(5, 'Hoan', 'hoanphan@gmail.com', '0123456789', '123456', 'admin'),
(7, 'Lam', 'lmtran29@gmail.com', '0123456789', '123456', 'admin'),
(102, 'NGUYỄN TRẦN MINH HUỆ', 'nguyentranminhhue@gmail.com', '0123156789', '123456', 'customer'),
(103, 'LÊ HOÀNG NAM', 'lehoangnam@gmail.com', '0123156789', '123456', 'customer'),
(104, 'LÊ THỊ TẾT', 'lethitet@gmail.com', '0123156789', '123456', 'customer'),
(105, 'LÊ THỊ NGỌC THANH', 'lethingocthanh@gmail.com', '0123156789', '123456', 'customer'),
(106, 'NGUYỄN THỊ THÚY LOAN', 'nguyenthithuyloan@gmail.com', '0123156789', '123456', 'customer'),
(107, 'NGUYỄN THỊ KIM HOÀNG', 'nguyenthikimhoang@gmail.com', '0123156789', '123456', 'customer'),
(108, 'NGUYỄN THỊ KIM YẾN', 'nguyenthikimyen@gmail.com', '0123156789', '123456', 'customer'),
(109, 'HUỲNH VĂN ẢNH', 'huynhvananh@gmail.com', '0123156789', '123456', 'customer'),
(110, 'NGUYỄN TẤN DƯƠNG', 'nguyentanduong@gmail.com', '0123156789', '123456', 'customer'),
(111, 'LÊ VẠN PHƯỚC', 'levanphuoc@gmail.com', '0123156789', '123456', 'customer'),
(112, 'NGUYỄN THANH TÀI', 'nguyenthanhtai@gmail.com', '0123156789', '123456', 'customer'),
(113, 'LÊ NGỌC LỜI', 'lengocloi@gmail.com', '0123156789', '123456', 'customer'),
(114, 'LÊ NGUYỄN HÙNG PHONG', 'lenguyenhungphong@gmail.com', '0123156789', '123456', 'customer'),
(115, 'NGUYỄN THANH YẾN VY', 'nguyenthanhyenvy@gmail.com', '0123156789', '123456', 'customer'),
(116, 'HUỲNH VĂN CHÍNH', 'huynhvanchinh@gmail.com', '0123156789', '123456', 'customer'),
(117, 'PHẠM MỸ XƯƠNG', 'phammyxuong@gmail.com', '0123156789', '123456', 'customer'),
(118, 'VĂN CÔNG ĐỂ', 'vancongde@gmail.com', '0123156789', '123456', 'customer'),
(119, 'HUỲNH THỊ THANH GIẶP', 'huynhthithanhgiap@gmail.com', '0123156789', '123456', 'customer'),
(120, 'HUỲNH CÔNG LIÊM', 'huynhcongliem@gmail.com', '0123156789', '123456', 'customer'),
(121, 'ĐĂNG NGỌC THANH TÂM', 'dangngocthanhtam@gmail.com', '0123156789', '123456', 'customer'),
(122, 'CAO THỊ NGUYỆT', 'caothinguyet@gmail.com', '0123156789', '123456', 'customer'),
(123, 'PHẠM THỊ ÁNH LOAN', 'phanthianhloan@gmail.com', '0123156789', '123456', 'customer'),
(124, 'ĐẶNG LỆ HÀ', 'dangleha@gmail.com', '0123156789', '123456', 'customer'),
(125, 'GIANG HÙNG ĐẠT', 'gianhhungdat@gmail.com', '0123156789', '123456', 'customer'),
(126, 'PHAN THỊ HỒNG PHƯỢNG', 'phanthihongphuong@gmail.com', '0123156789', '123456', 'customer'),
(127, 'NGUYỄN HOÀNG GIANG', 'nguyenhoanggiang@gmail.com', '0123156789', '123456', 'customer'),
(128, 'ĐẶNG QUỐC TOÀN', 'dangquoctoan@gmail.com', '0123156789', '123456', 'customer'),
(129, 'HỒ THỊ CẢNH', 'hothicanh@gmail.com', '0123156789', '123456', 'customer'),
(130, 'TRƯƠNG THỊ AN', 'truongthian@gmail.com', '0123156789', '123456', 'customer'),
(131, 'ĐỖ THỊ THÚY KIỀU', 'dothithuykieu@gmail.com', '0123156789', '123456', 'customer'),
(132, 'NGUYỄN THANH QUỐC HƯNG', 'nguyenthanhquochung@gmail.com', '0123156789', '123456', 'customer'),
(133, 'HUỲNH THỊ ÚT', 'huynhthiut@gmail.com', '0123156789', '123456', 'customer'),
(134, 'NGUYỄN HOÀ̀NG KHÁNH DUY', 'nguyenhoangkhanhduy@gmail.com', '0123156789', '123456', 'customer'),
(135, 'NGUYỄN THỊ BẢY', 'nguyenthibay@gmail.com', '0123156789', '123456', 'customer'),
(136, 'HUỲNH NGỌC HƯNG', 'huynhngochung@gmail.com', '0123156789', '123456', 'customer'),
(137, 'TRƯƠNG HOÀNG THÁI', 'truonghoangthai@gmail.com', '0123156789', '123456', 'customer'),
(138, 'NGUYỄN THỊ BÍCH DU', 'nguyenthibichdu@gmail.com', '0123156789', '123456', 'customer'),
(139, 'LÊ VÕ TUẤN AN', 'levotuanan@gmail.com', '0123156789', '123456', 'customer'),
(140, 'PHẠM VĂN HỌC', 'phamvanhoc@gmail.com', '0123156789', '123456', 'customer'),
(141, 'VÕ THỊ PHƯƠNG NAM', 'vothiphuongnam@gmail.com', '0123156789', '123456', 'customer'),
(142, 'LÊ NGỌ̣C THƯƠNG', 'lengocthuong@gmail.com', '0123156789', '123456', 'customer'),
(143, 'HUỲNH TẤN KHƯƠNG', 'huynhtankhuong@gmail.com', '0123156789', '123456', 'customer'),
(144, 'VÕ THỊ HOÀNG', 'vothihoang@gmail.com', '0123156789', '123456', 'customer'),
(145, 'NGUYỄN VÕ HOÀNG PHÚC', 'nguyenvohoangphuc@gmail.com', '0123156789', '123456', 'customer'),
(146, 'NGUYỄN THỊ THANH', 'nguyenthithanh@gmail.com', '0123156789', '123456', 'customer'),
(147, 'NGUYỄN THỊ TÁM', 'nguyenthitam@gmail.com', '0123156789', '123456', 'customer'),
(148, 'NGUYỄN VĂN MƯỜI', 'nguyenvanmuoi@gmail.com', '0123156789', '123456', 'customer'),
(149, 'VÕ NGUYỄN BẢO NGỌC', 'vonguyenbaongoc@gmail.com', '0123156789', '123456', 'customer'),
(150, 'VÕ VĂN TRƯỜNG', 'vovantruong@gmail.com', '0123156789', '123456', 'customer');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_insert_user` AFTER INSERT ON `user` FOR EACH ROW IF new.role ="customer" 
THEN 
  INSERT INTO customer VALUES(new.user_id, new.user_name); 
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `_comment`
--

CREATE TABLE `_comment` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cmt_time` datetime DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_comment`
--

INSERT INTO `_comment` (`product_id`, `customer_id`, `cmt_time`, `cmt`) VALUES
(11, 101, '2020-07-12 04:57:30', 'mọi người nên mua thử, tôi thấy rất rẻ mà chất lượng ok lắm'),
(11, 102, '2019-02-26 16:37:32', 'trái cây có mùi thơm nhẹ nhàng dễ chịu'),
(11, 126, '2020-06-22 08:51:13', 'người việt ủng hộ hàng việt'),
(12, 103, '2021-08-08 23:50:08', 'nhìn sản phẩm khá bắt mắt, tôi rất thích'),
(12, 127, '2021-02-15 03:20:30', 'đóng gói đẹp lắm'),
(12, 128, '2020-01-17 03:12:41', 'sản phẩm khá tốt'),
(13, 104, '2021-04-23 02:27:38', 'đóng gói đẹp lắm'),
(13, 105, '2019-06-24 20:35:09', 'trái cây có mùi thơm nhẹ nhàng dễ chịu'),
(13, 129, '2021-02-14 05:55:57', 'trái cây có mùi thơm nhẹ nhàng dễ chịu'),
(14, 106, '2019-09-09 05:42:52', 'nhìn sản phẩm khá bắt mắt, tôi rất thích'),
(14, 130, '2020-01-26 13:40:09', 'sản phẩm khá tốt'),
(14, 131, '2020-07-24 03:08:12', 'tôi thích đóng gói của sản phẩm này nhìn xinh lắm'),
(21, 107, '2021-12-23 23:15:15', 'sản phẩm này tốt'),
(21, 108, '2020-02-21 06:56:53', 'tôi thích đóng gói của sản phẩm này nhìn xinh lắm'),
(21, 132, '2021-11-23 08:32:28', 'người việt ủng hộ hàng việt'),
(22, 109, '2020-07-25 23:36:37', 'người việt ủng hộ hàng việt'),
(22, 133, '2020-03-24 06:59:01', 'người việt ủng hộ hàng việt'),
(22, 134, '2021-06-03 03:02:16', 'sản phẩm tươi ngon nên mẹ tôi rất thích'),
(23, 110, '2021-11-11 03:16:49', 'sản phẩm này tốt'),
(23, 111, '2020-07-18 09:49:32', 'đóng gói đẹp lắm'),
(23, 135, '2021-05-08 06:25:41', 'nhìn sản phẩm khá cao cấp, tôi rất thích'),
(24, 112, '2019-05-04 21:34:14', 'mọi người nên mua thử, tôi thấy rất rẻ mà chất lượng ok lắm'),
(24, 136, '2019-02-14 00:43:01', 'nhìn sản phẩm khá cao cấp, tôi rất thích'),
(24, 137, '2020-10-15 00:43:48', 'tôi thích đóng gói của sản phẩm này nhìn xinh lắm'),
(31, 113, '2021-09-04 20:28:18', 'sản phẩm khá tốt'),
(31, 114, '2019-12-21 17:14:13', 'tôi thích cách nhãn hàng bảo vệ môi trường bằng cách không dùng seal nilon'),
(31, 138, '2021-07-04 09:31:29', 'ăn rất vừa miệng, sản phẩm tươi ngon'),
(32, 115, '2021-12-14 04:32:55', 'sản phẩm tươi ngon nên mẹ tôi rất thích'),
(32, 139, '2019-05-03 08:39:14', 'sản phẩm tươi ngon nên mẹ tôi rất thích'),
(32, 140, '2020-11-11 21:43:44', 'người việt ủng hộ hàng việt'),
(33, 116, '2020-04-04 05:57:24', 'nhìn sản phẩm khá cao cấp, tôi rất thích'),
(33, 117, '2021-12-16 15:19:01', 'người việt ủng hộ hàng việt'),
(33, 141, '2019-06-08 13:36:11', 'đóng gói rất chắc chắn'),
(34, 118, '2020-06-04 15:00:22', 'sản phẩm tươi ngon nên mẹ tôi rất thích'),
(34, 142, '2021-06-04 12:19:23', 'nhìn sản phẩm khá cao cấp, tôi rất thích'),
(34, 143, '2021-04-26 19:04:47', 'sản phẩm xài khá tốt'),
(41, 119, '2019-01-09 11:25:56', 'đóng gói rất chắc chắn'),
(41, 120, '2021-11-08 02:56:21', 'tôi thích cách nhãn hàng bảo vệ môi trường bằng cách không dùng seal nilon'),
(41, 144, '2020-03-04 23:52:26', 'sản phẩm xài khá tốt'),
(42, 121, '2021-10-26 23:46:51', 'sản phẩm tươi ngon nên mẹ tôi rất thích'),
(42, 145, '2019-12-19 21:08:02', 'nhìn sản phẩm khá cao cấp, tôi rất thích'),
(42, 146, '2020-11-28 03:32:22', 'người việt ủng hộ hàng việt'),
(43, 122, '2021-05-08 02:35:44', 'đóng gói đẹp lắm'),
(43, 123, '2019-06-20 12:21:30', 'tôi thích cách nhãn hàng bảo vệ môi trường bằng cách không dùng seal nilon'),
(43, 147, '2021-11-20 22:19:24', 'sản phẩm này tốt'),
(44, 124, '2019-09-17 06:17:42', 'nhìn sản phẩm khá cao cấp, tôi rất thích'),
(44, 148, '2020-09-04 15:19:51', 'ăn rất vừa miệng, sản phẩm tươi ngon'),
(44, 149, '2021-03-18 05:21:46', 'ăn rất vừa miệng, sản phẩm tươi ngon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `_comment`
--
ALTER TABLE `_comment`
  ADD PRIMARY KEY (`product_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderr`
--
ALTER TABLE `orderr`
  ADD CONSTRAINT `orderr_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orderr` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `_comment`
--
ALTER TABLE `_comment`
  ADD CONSTRAINT `_comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `_comment_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
