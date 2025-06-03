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
create database web222;
use web222;
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


CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold_quantity` int(11) DEFAULT 0,
  `price` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `intro` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `quantity`, `sold_quantity`, `price`, `avatar`, `category_id`, `intro`) VALUES
(21, 'Thịt lợn mán', 100, 0, 160000, '/products/21.png', 1, 'Thịt lợn sạch, được cho ăn thức ăn thiên nhiên.'),
(22, 'Sụn Úc', 204, 0, 75000, '/products/22.png', 1, 'Sụn nhập từ Úc, bảo quản qua quy trình chuyên nghiệp.'),
(23, 'Sườn già', 302, 0, 60000, '/products/23.png', 1, 'Sườn già tươi mổ trong ngày.'),
(24, 'Ba chỉ bò Mỹ', 404, 0, 160000, '/products/24.png', 1, 'Ba chỉ bò Mỹ thái cuộn.'),
(31, 'Bí xanh', 102, 0, 10000, '/products/31.png', 1, 'Bí sạch không thuốc trừ sâu.'),
(32, 'Rau cải kale', 206, 0, 25000, '/products/32.png', 1, 'Rau sạch không thuốc trừ sâu.'),
(33, 'Bắp cải Sapa', 308, 0, 45000, '/products/33.png', 1, 'Bắp cải sạch không thuốc trừ sâu.'),
(34, 'Rau cải mèo', 404, 0, 55000, '/products/34.png', 1, 'Rau cải sạch không thuốc trừ sâu.'),
(41, 'Ốc giác', 105, 0, 185000, '/products/41.png', 1, 'Ốc tươi mới đánh bắt.'),
(42, 'Cua Cà Mau', 207, 0, 339000, '/products/42.png', 1, 'Cua tươi mới đánh bắt.'),
(43, 'Râu bạch tuộc', 304, 0, 50000, '/products/43.png', 1, 'Bạch tuộc tươi mới đánh bắt.'),
(44, 'Tôm sú', 404, 0, 45000, '/products/44.png', 1, 'Tôm sú mới đánh bắt.'),
(1, 'Sprite Hương Chanh 320ml', 3, 0, 9200, '/products/02.jpg', 2, 'Vị chanh tươi mát cùng những bọt ga sảng khoái tê đầu lưỡi, nước ngọt Sprite hương chanh 320ml giúp bạn đập tan cơn khát.'),
(2, 'Pepsi Không Calo 320ml', 102, 0, 10600, '/products/1.jpg', 2, 'Nước ngọt Pepsi không calo lon 320ml với lượng gas lớn sẽ giúp bạn xua tan mọi cảm giác mệt mỏi, căng thẳng, sản phẩm không calo lành mạnh, tốt cho sức khỏe.'),
(3, 'Pepsi Cola Sleak 245ml', 107, 0, 8500, '/products/2.jpg', 2, 'Nước ngọt Pepsi Cola Sleek 245ml giúp giải khát, bù nước cho cơ thể, thành phần an toàn không chứa chất bảo quản độc hại.'),
(4, 'Mirinda Cam 330ml', 156, 0, 8500, '/products/3.jpg', 2, 'Nước ngọt Mirinda vị cam, chua ngọt tươi mát giúp bạn giải khát nhanh chóng, bừng tỉnh năng lượng sảng khoái, thiết kế lon nhỏ tiện lợi, bao bì ấn tượng, trẻ trung phù hợp với giới trẻ.'),
(5, 'Coca Cola 390ml', 124, 0, 7800, '/products/4.jpg', 2, 'Nước ngọt Coca Cola chai 390ml xua tan nhanh mọi cảm giác mệt mỏi, căng thẳng, đặc biệt thích hợp sử dụng với các hoạt động ngoài trời.'),
(6, 'Mirinda Soda Kem 330ml', 123, 0, 7000, '/products/5.jpg', 2, 'Nước ngọt Mirinda vị soda kem tươi mát giúp bạn giải khát nhanh chóng, bừng tỉnh năng lượng sảng khoái, thiết kế lon nhỏ tiện lợi, bao bì ấn tượng, trẻ trung phù hợp với giới trẻ.'),
(7, 'Srite Chai 390ml', 100, 0, 7000, '/products/6.jpg', 2, 'Vị chanh tươi mát cùng những bọt ga sảng khoái tê đầu lưỡi, nước ngọt Sprite hương chanh 320ml giúp bạn đập tan cơn khát.'),
(8, 'Fanta Nho 320ml', 196, 0, 7000, '/products/8.jpg', 2, 'Nước ngọt Fanta hương nho 320ml chua ngọt tươi mới, thơm ngon mang đến cho bạn cảm giác sảng khoái cùng vị ga thích thú. Sản phẩm chính hãng, giá tốt.'),
(51, 'Kẹo ổi Oishi', 134, 0, 10000, '/products/51.jpg', 3, 'Kẹo túi 32 viên, có vị thơm và ngọt của hương ổi.'),
(52, 'Kẹo bạc hà Dinamite', 206, 0, 10500, '/products/52.jpg', 3, 'Kẹo ngọt thanh hương bạc hà, bên trong nhân socola sánh mịn.'),
(53, 'Kẹo dâu Alpenliebe', 253, 0, 25000, '/products/53.jpg', 3, 'Kẹo ngọt và thơm, hương dâu đặc trưng cùng với vị sữa.'),
(54, 'Kẹo chanh muối Alpenliebe', 304, 0, 20000, '/products/54.jpg', 3, 'Kẹo ngọt thơm sữa với hương vị chanh muối.'),
(55, 'Snack Bento', 105, 0, 45000, '/products/55.jpg', 3, 'Vị cay nồng nàn của hương mực tẩm gia vị.'),
(56, 'Snack tôm Lays', 202, 0, 40000, '/products/56.jpg', 3, 'Snack mới chế biến từ tôm tươi, kết hợp với khoai tây cho hương vị độc đáo.'),
(57, 'Snack rong biển Peke', 255, 0, 25000, '/products/57.jpg', 3, 'Snack kết hợp khoai tây với rong biển.'),
(58, 'Snack thịt nướng Slike', 305, 0, 25000, '/products/58.jpg', 3, 'Snack mới lạ, kích thích vị giác.'),
(11, 'Dưa lưới vỏ xanh', 106, 0, 45000, '/products/11.png', 4, 'Quả tròn, thịt màu cam, rất thơm và ngọt, độ đường 14 - 15%, trái nặng 1,3 - 1,5 kg.'),
(12, 'Dưa hoàng kim', 206, 0, 40000, '/products/12.png', 4, 'Dưa Vàng Kim Hoàng Hậu. Trọng lượng quả 1,8kg/quả. Độ Brix >= 14.'),
(13, 'Nho xanh không hạt', 253, 0, 250000, '/products/13.png', 4, 'Nho xanh Úc là một trong những giống nho phổ biến và được yêu thích nhất hiện nay, phần vỏ màu xanh lá cây khi chín ngả sang màu vàng, quả hình bầu dục, thịt dày chắc ngọt, nhiều nước và không có hạt.'),
(14, 'Kiwi vàng Úc', 304, 0, 250000, '/products/14.png', 4, 'Kiwi vàng có thịt quả màu vàng trong rất đẹp mắt, với nhiều hạt đen tạo thành 1 vòng tròn xung quanh trục dọc của quả. Kiwi vàng có vị ngọt thanh mát rất đặc trưng.'),
(15, 'Dưa hấu không hạt', 106, 0, 45000, '/products/15.jpg', 4, 'Dưa hấu không hạt có vỏ căng, xanh, bóng, thịt dưa ngọt thanh mát và rất giàu các chất dinh dưỡng cần thiết cho cơ thể. Trái nặng 2.8kg.'),
(16, 'Bưởi năm roi', 206, 0, 40000, '/products/16.jpg', 4, 'Vỏ xanh, tách ra bên trong ruột có màu vàng nhạt, có vị ngọt thanh và chua nhẹ, trái 1.6kg.'),
(17, 'Mãng cầu tây', 256, 0, 25000, '/products/17.jpg', 4, 'Mãng cầu tây có vị thơm nồng nàn, có vị ngọt thanh và dịu.'),
(18, 'Xoài cát Đài Loan', 306, 0, 25000, '/products/18.jpg', 4, 'Xoài thơm, chua, vỏ mỏng, hạt lép.');

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
(1, 'https://cdn.tuoitre.vn/thumb_w/730/2022/7/17/z3571554423834daf1b9e26195706fde61ab9dff05f65f-1read-only-16580255492061280331606.jpg', 'Nông sản, thực phẩm trôi nổi vẫn còn nhiều', 'Từ rạng sáng, Bộ trưởng đi kiểm tra tại chợ đầu mối Bình Điền và các kênh phân phối hiện đại; sau đó làm việc với Công ty cổ phần VN kỹ nghệ súc sản (Vissan), thăm các trang trại sản xuất rau, dưa lưới ở Hóc Môn và Củ Chi.', 'Qua kiểm tra thực tế, Bộ trưởng Lê Minh Hoan thừa nhận tình trạng buôn bán hàng trôi nổi vẫn còn nhiều. "Sáng nay, chúng ta đi kiểm tra thực tế chợ Bình Điền chứng kiến bên trong chợ họ làm khá tốt nhưng phía ngoài tình trạng buôn bán hàng trôi nổi rất nhiều. Việc này sẽ làm những người phía bên trong mất lòng tin và họ chạy ra ngoài, dẫn đến mất kiểm soát. Chính vì vậy cần có sự vào cuộc của các cấp chính quyền địa phương"), Bộ trưởng cho biết và nhận xét: Trước đây chúng ta không biết ai làm gì, ở đâu, số lượng bao nhiêu, giá cả như thế nào… đến ngay cả chính sách hỗ trợ cũng gặp khó khăn. Chính vì vậy mà khâu kiểm soát chất lượng sản phẩm cũng gặp rất nhiều khó khăn, thiếu minh bạch. Giờ muốn kiểm soát chất lượng cần phải thiết lập lại hệ thống tổ chức, giải bài toán nông nghiệp nhỏ lẻ bằng sự liên kết giữa nông dân và doanh nghiệp, có đăng ký và quản lý giám sát lẫn nhau. Nếu chỉ có riêng bộ máy quản lý nhà nước thì không thể làm hết được.\r\n\r\nChuyến khảo sát của Bộ NN-PTNT nhằm chuẩn bị cho hội nghị "Đảm bảo chất lượng, an toàn thực phẩm và minh bạch nguồn gốc xuất xứ thực phẩm cho người tiêu dùng VN", được tổ chức sáng nay 18.10.'),
(2, 'https://images2.thanhnien.vn/Uploaded/phanhau/2022_11_10/toyen-5072.jpeg', 'Trung Quốc chính thức nhập khẩu khoai lang, tổ yến của Việt Nam', 'Ngày 10.11, Bộ NN-PTNT cho biết đã tiếp nhận thông tin từ công điện hỏa tốc của Đại sứ quán Việt Nam tại Trung Quốc về nghị định thư xuất khẩu khoai lang, tổ yến Việt Nam sang Trung Quốc.', 'Trong ngày 9.11, Đại sứ quán Việt Nam tại Trung Quốc đã nhận được nghị định thư (phía Trung Quốc đã ký), về yêu cầu kiểm dịch thực vật đối với sản phẩm tổ yến và khoai lang của Việt Nam xuất khẩu sang Trung Quốc giữa Bộ NN-PTNT và Tổng cục Hải quan Trung Quốc.\r\n\r\nTheo đó, từ đầu năm 2022, Bộ NN-PTNT và Đại sứ quán Việt Nam tại Trung Quốc đã tăng cường các hoạt động thúc đẩy việc mở cửa thị trường của sản phẩm nông sản Việt Nam xuất khẩu sang Trung Quốc. Đến nay, hai bên đã hoàn tất việc mở cửa thị trường xuất khẩu cho quả sầu riêng và đang tiến hành thí điểm xuất khẩu đối với quả chanh leo vào thị trường Trung Quốc.\r\n\r\nGần đây nhất, Trung Quốc đã ký nghị định thư về yêu cầu kiểm dịch thực vật đối với quả chuối tươi, qua đó tạo điều kiện để xuất khẩu chuối tươi Việt Nam xuất khẩu chính ngạch sang Trung Quốc.\r\n\r\nThông tin từ Cục Bảo vệ thực vật (Bộ NN-PTNT) cho biết, khoai lang và tổ yến sẽ là sản phẩm nông sản thứ 12, 13 xuất khẩu chính ngạch vào thị trường Trung Quốc sau 11 loại quả gồm: thanh long, nhãn, chôm chôm, xoài, mít, dưa hấu, chuối, măng cụt, vải và sầu riêng.\r\n\r\nĐối với quả chanh leo, phía Trung Quốc đã đồng ý cho xuất khẩu thử nghiệm và chỉ đi qua cửa khẩu Quảng Tây của Trung Quốc. Sau khoai lang và tổ yến, Cục Bảo vệ thực vật sẽ tiếp tục các thủ tục để xuất khẩu quả bưởi và quả dừa tươi vào thị trường Trung Quốc.'),
(3, 'https://image.vtc.vn/resize/th/upload/2022/08/13/123-07194844.png', 'Có nên ăn nấm trong mùa mưa bão?', 'Mùa mưa bão đang kéo đến là "thời điểm vàng" cho các căn bệnh truyền nhiễm sinh sôi. Do đó, điều quan trọng nhất là phải tăng cường sức đề kháng của cơ thể trong giai đoạn này bằng một chế độ ăn lành mạnh và an toàn. Nấm có nên nằm trong chế độ ăn đó?', 'Rashi Chahal, một nhà dinh dưỡng học nổi tiếng, đã chia về mức độ an toàn của việc ăn nấm trong mùa mưa. Theo bà, để giữ được thân hình cân đối và khỏe mạnh trong những đợt gió mùa, bạn cần tuân thủ một chế độ ăn uống đầy đủ chất dinh dưỡng để tăng sức đề kháng. Đối với những người có sức khỏe kém, nên tránh ăn nấm vào khi trời trở gió vì nấm phát triển trong môi trường ẩm và có nhiều vi khuẩn gây bệnh sinh sôi bên trong.\r\nTuy nhiên, đừng quên rằng nấm cũng có rất nhiều lợi ích cho sức khỏe.\r\n\r\nLợi ích của nấm trong chế độ ăn uống thường ngày là gì?\r\n\r\nNếu bạn không phải đối tượng cần phải hạn chế sử dụng nấm trong giai đoạn gió mùa, thì việc kết hợp loại rau này trong chế độ ăn uống hằng ngày là vô cùng có lợi.\r\n\r\nNấm cung cấp chất béo, cholesterol có lợi, gluten, chất xơ và khi ăn nấm, bạn nạp rất ít lượng calo và natri cho cơ thể. Nấm cũng rất dồi dào vitamin B - một nguồn dinh dưỡng có khả năng tăng cường sức đề kháng, điều chỉnh hệ thống miễn dịch và hỗ trợ chống lại các bệnh truyền nhiễm, đặc biệt là trong giai đoạn này.\r\niTVC from Admicro\r\nBên cạnh đó, nấm giúp bảo vệ bạn bởi vì nó có tính kháng khuẩn mạnh và chống lại virus. Nhiều loại thuốc kháng sinh truyền thống được bào chế từ nấm. Một số loại nấm có tác dụng bổ dưỡng, củng cố hệ thống miễn dịch và cải thiện một số bệnh ung thư.\r\n\r\nLưu ý cách ăn nấm an toàn\r\n\r\nNấm sống trong môi trường tuyệt đối sạch, thân nấm lại ở dạng xốp và sợi nên khi rửa nấm sẽ làm nước đọng lại khiến cho nấm không còn được ngọt. Vì vậy không nên rửa kỹ, chỉ cần rửa nhanh dưới vòi nước lạnh, sau đó thấm chúng thật khô ráo.\r\n\r\nKhi chế biến các loại nấm, bạn nên nhẹ nhàng tránh làm nấm bị dập nát dễ nhiễm khuẩn.\r\n\r\nTuy nhiên, một số loại nấm bắt buộc phải vệ sinh nếu trong quá trình vận chuyển để gây bẩn vào, nhưng nên rửa dưới vòi nước dạng hơi sương chứ không rửa trực tiếp nước vào thân nấm sẽ làm hỏng thịt nấm.\r\n\r\nKhi sử dụng nấm tuyệt đối phải cắt bỏ chân (cắt gốc) vì chân nấm là nơi tiếp xúc với chất dinh dưỡng, phần bọc và nuôi cây giống là một số chất vô cơ mà chúng ta không nên sử dụng.\r\n\r\nCần ăn nấm được nấu chín hoàn toàn, tức là khoảng 5 - 10 phút sau khi đun sôi. Sau khi ăn nấm xong không nên dùng ngay đồ uống lạnh  như trà đá hoặc cà phê đá, bởi vì nấm mang tính bổ âm nên uống ngay đồ lạnh sau đó thì dễ bị lạnh bụng.'),
(4, 'https://image.vtc.vn/resize/th/upload/2022/08/01/1587009331-174-thumbnailschemaarticle-09370422.jpg', 'Những người nên tránh xa thịt vịt', 'Thịt vịt không chỉ thơm ngon mà còn đem lại nguồn dinh dưỡng rất tốt cho cơ thể, nhưng những người dưới đây tuyệt đối hạn chế ăn thịt vịt.\r\nThịt vịt là món ăn dân dã nhưng lại vô cùng độc đáo, chính vì vậy nó từ lâu đã trở thành món khoái khẩu của nhiều hộ gia đình Việt Nam. Vào mùa hè, thịt chỉ chỉ cần đem luộc, chấm cùng chút nước mắm gừng là đủ làm xao xuyến nhiều người.\r\nNhưng thịt vịt không chỉ ngon mà còn có hàm lượng dinh dưỡng rất cao. Trung bình trong 100g thịt vịt có khoảng 25g chất protein, hàm lượng này cao gấp nhiều lần lượng protein có trong thịt bò, thịt heo, thịt dê, cá, trứng. Ngoài ra, thịt vịt cũng cung cấp nhiều dưỡng chất như canxi, photpho, sắt, vitamin (B1, B2, A, D, E), acide nicotic…', 'Những thực phẩm đại kỵ với thịt vịt\r\n\r\nThịt vịt kỵ với quả mận\r\n\r\nThịt vịt tính hàn giúp giải nhiệt tốt cho cơ thể. Còn quả mận ăn vào nóng trong sẽ sinh nóng ruột. Nếu bạn ăn hai thực phẩm này gần thời gian với nhau hoặc ăn cùng một lúc sẽ gây ra bệnh khó tiêu, chướng bụng, nóng ruột hại cho sức khỏe.\r\n\r\nThịt ba ba\r\n\r\nLý do không nên ăn hai loại thực phẩm này chung với nhau được các chuyên gia giải thích như sau: Thịt ba ba tính ngọt, bình lại không độc, còn thịt vịt thì thuộc tính mát. Nếu ăn chung sẽ gây phù thũng, tiêu chảy. Ngoài ra, thịt ba ba có nhiều hoạt chất sinh học, thịt vịt chứa nhiều đạm, ăn chung với nhau sẽ làm biến chất đạm, giảm giá trị dinh dưỡng. Cho nên thịt vịt không nên ăn chung với thịt ba ba là như thế.\r\n\r\nTrứng gà\r\n\r\nTrứng gà và thịt vịt đều tính hàn, kết hợp với nhau có thể làm tổn hại đến nguyên khí trong cơ thể.\r\n\r\nThịt rùa\r\n\r\nCũng giống như thịt ba ba, nếu ăn thịt rùa chung với thịt vịt sẽ làm cho cơ thể bạn rơi vào tình trạng "âm thịnh dương suy", từ đó gây phù nề, tiêu chảy.\r\nTỏi\r\n\r\nTỏi có tính nóng, trong khi đó thịt vịt có tính hàn, nên nếu kết hợp sẽ không hề có lợi cho đường ruột và hệ tiêu hóa.\r\n\r\nNhững người không nên ăn thịt vịt\r\n\r\nNgười đang bị cảm\r\n\r\nKhi bạn vừa bị cảm xong thể trạng cơ thể còn nhiều mệt mỏi thì không nên ăn thịt vịt. Đặc biệt là khi bị cảm lạnh, bởi thịt vịt có tính hàn giúp giải nhiệt sẽ khiến cho cơ thể bạn lạnh bụng, tiêu chảy và khó chịu trong người làm người bệnh đang ốm càng ốm thêm\r\n\r\nNgười đang bị ho\r\n\r\nNhững người bị ho không nên ăn thịt vịt bởi trong thành phần thịt vịt có chất tanh, mà người ho thường phải kiêng tanh. Bởi ăn tanh sẽ khiến người bệnh khó thở. Mùi tanh trong thành phần của thịt vịt sẽ khiến cho người bệnh dễ ho thêm. Vì vậy, nếu trong nhà bạn có người ho thì đừng cho họ ăn thịt vịt kẻo rước thêm bệnh nhé.\r\n\r\nNgười bị bệnh gout\r\n\r\nTrong thành phần của thịt vịt có chứa hàm lượng purin và protein rất cao khiến cho axit uric trong cơ thể con người tăng cao. Vì vậy, với những người mắc bệnh gout không nên ăn thịt vịt kẻo tình trạng bệnh nguy hiểm hơn. Khi ăn thịt vịt người bệnh gout càng thêm nghiêm trọng hơn.\r\n\r\nNgười có hệ tiêu hóa kém\r\n\r\nVới những người đang mắc căn bệnh tiêu hóa, khó tiêu, chướng bụng, tiêu chảy.., thì tuyệt đối không nên ăn thịt vịt bởi thịt vịt chứa nhiều chất béo khiến cho hệ tiêu hóa tăng thêm gánh nặng làm bệnh tình thêm nặng hơn.\r\n\r\nNgười có thể chất yếu, lạnh\r\n\r\nTheo Đông y, thịt vịt có tính lành, đối với những người có thể trạng hàn lạnh thì nên hạn chế ăn thịt vịt, bởi sau khi ăn vào có thể sẽ gây lạnh bụng, dẫn đến cảm giác chán ăn, đau bụng, tiêu chảy hoặc các dấu hiệu tiêu hóa bất lợi khác.');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_code` varchar(50) NOT NULL,
  `discount_percent` int(11) DEFAULT 0,
  `discount_amount` int(11) DEFAULT 0,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `min_order_amount` int(11) DEFAULT 0,
  `max_discount` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`promotion_id`),
  UNIQUE KEY `promotion_code` (`promotion_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_code`, `discount_percent`, `discount_amount`, `start_date`, `end_date`, `min_order_amount`, `max_discount`, `description`, `status`) VALUES
('WELCOME10', 10, 0, '2025-03-01 00:00:00', '2025-12-31 23:59:59', 100000, 50000, 'Giảm 10% cho đơn hàng đầu tiên', 'active'),
('SUMMER20', 20, 0, '2025-06-01 00:00:00', '2025-08-31 23:59:59', 200000, 100000, 'Khuyến mãi mùa hè giảm 20%', 'active'),
('FLASH50K', 0, 50000, '2025-03-20 00:00:00', '2025-03-25 23:59:59', 150000, 50000, 'Giảm ngay 50.000đ cho đơn hàng từ 150.000đ', 'active'),
('SPRING15', 15, 0, '2025-03-01 00:00:00', '2025-08-31 23:59:59', 120000, 75000, 'Khuyến mãi mùa xuân giảm 15%', 'active'),
('NEWUSER30', 30, 0, '2025-01-01 00:00:00', '2025-12-31 23:59:59', 50000, 100000, 'Giảm 30% cho người dùng mới', 'active'),
('WEEKEND100K', 0, 100000, '2025-03-01 00:00:00', '2025-12-31 23:59:59', 300000, 100000, 'Giảm 100.000đ cho đơn hàng cuối tuần', 'active'),
('BIRTHDAY25', 25, 0, '2025-01-01 00:00:00', '2025-12-31 23:59:59', 200000, 150000, 'Giảm 25% nhân dịp sinh nhật', 'active'),
('MEMBER20', 20, 0, '2025-01-01 00:00:00', '2025-12-31 23:59:59', 150000, 100000, 'Giảm 20% cho thành viên thân thiết', 'active');

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
  `status` enum('pending','paid','cancelled') DEFAULT 'pending',
  `promotion_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`order_id`, `customer_id`, `order_date`, `total_price`, `address`, `phone`, `status`, `promotion_id`) VALUES
(1, 101, '2025-03-20 10:00:00', 45000, '123 Đường ABC, Quận 1, TP.HCM', '0123456789', 'paid', 1),
(2, 102, '2025-03-20 11:00:00', 25000, '456 Đường XYZ, Quận 2, TP.HCM', '0123456788', 'pending', NULL),
(3, 103, '2025-03-20 12:00:00', 35000, '789 Đường DEF, Quận 3, TP.HCM', '0123456787', 'cancelled', NULL),
(4, 104, '2025-03-20 13:00:00', 150000, '321 Đường GHI, Quận 4, TP.HCM', '0123456786', 'paid', 2),
(5, 105, '2025-03-20 14:00:00', 85000, '654 Đường JKL, Quận 5, TP.HCM', '0123456785', 'pending', NULL),
(6, 106, '2025-03-20 15:00:00', 95000, '987 Đường MNO, Quận 6, TP.HCM', '0123456784', 'cancelled', NULL),
(7, 107, '2025-03-20 16:00:00', 75000, '147 Đường PQR, Quận 7, TP.HCM', '0123456783', 'paid', 3),
(8, 108, '2025-03-20 17:00:00', 125000, '258 Đường STU, Quận 8, TP.HCM', '0123456782', 'pending', NULL),
(9, 109, '2025-03-20 18:00:00', 185000, '369 Đường VWX, Quận 9, TP.HCM', '0123456781', 'cancelled', NULL),
(10, 110, '2025-03-20 19:00:00', 215000, '741 Đường YZ, Quận 10, TP.HCM', '0123456780', 'paid', NULL),
(11, 101, '2025-01-15 08:30:00', 125000, '123 Đường ABC, Quận 1, TP.HCM', '0123456789', 'paid', 1),
(12, 102, '2025-01-16 09:45:00', 85000, '456 Đường XYZ, Quận 2, TP.HCM', '0123456788', 'paid', 2),
(13,103, '2025-01-17 10:15:00', 150000, '789 Đường DEF, Quận 3, TP.HCM', '0123456787', 'paid', NULL),
(14,104, '2025-01-18 11:20:00', 95000, '321 Đường GHI, Quận 4, TP.HCM', '0123456786', 'paid', 3),
(15,105, '2025-01-19 13:40:00', 175000, '654 Đường JKL, Quận 5, TP.HCM', '0123456785', 'paid', NULL),
(16,106, '2025-01-20 14:25:00', 110000, '987 Đường MNO, Quận 6, TP.HCM', '0123456784', 'paid', 4),
(17,107, '2025-01-21 15:50:00', 135000, '147 Đường PQR, Quận 7, TP.HCM', '0123456783', 'paid', NULL),
(18,108, '2025-01-22 16:35:00', 165000, '258 Đường STU, Quận 8, TP.HCM', '0123456782', 'paid', 5),
(19, 109, '2025-01-23 17:10:00', 145000, '369 Đường VWX, Quận 9, TP.HCM', '0123456781', 'paid', NULL),
(20, 110, '2025-01-24 18:45:00', 195000, '741 Đường YZ, Quận 10, TP.HCM', '0123456780', 'paid', 6),
(21, 111, '2025-01-25 19:20:00', 115000, '852 Đường ABC, Quận 11, TP.HCM', '0123456779', 'paid', NULL),
(22, 112, '2025-01-26 20:55:00', 155000, '963 Đường XYZ, Quận 12, TP.HCM', '0123456778', 'paid', 7),
(23, 113, '2025-01-27 21:30:00', 185000, '159 Đường DEF, Quận Bình Thạnh, TP.HCM', '0123456777', 'paid', NULL),
(24, 114, '2025-01-28 22:05:00', 125000, '357 Đường GHI, Quận Gò Vấp, TP.HCM', '0123456776', 'paid', 8),
(25, 115, '2025-01-29 23:40:00', 145000, '456 Đường JKL, Quận Phú Nhuận, TP.HCM', '0123456775', 'paid', NULL),
(26, 116, '2025-01-30 00:15:00', 175000, '789 Đường MNO, Quận Tân Bình, TP.HCM', '0123456774', 'paid', 1),
(27, 117, '2025-01-31 01:50:00', 135000, '123 Đường PQR, Quận Tân Phú, TP.HCM', '0123456773', 'paid', NULL),
(28, 118, '2025-02-01 02:25:00', 165000, '456 Đường STU, Quận Bình Tân, TP.HCM', '0123456772', 'paid', 2),
(29, 119, '2025-02-02 03:00:00', 195000, '789 Đường VWX, Quận Thủ Đức, TP.HCM', '0123456771', 'paid', NULL),
(30, 120, '2025-02-03 04:35:00', 115000, '123 Đường YZ, Quận 1, TP.HCM', '0123456770', 'paid', 3),
(31, 121, '2025-02-04 05:10:00', 155000, '456 Đường ABC, Quận 2, TP.HCM', '0123456769', 'paid', NULL),
(32, 122, '2025-02-05 06:45:00', 185000, '789 Đường XYZ, Quận 3, TP.HCM', '0123456768', 'paid', 4),
(33, 123, '2025-02-06 07:20:00', 125000, '123 Đường DEF, Quận 4, TP.HCM', '0123456767', 'paid', NULL),
(34, 124, '2025-02-07 08:55:00', 145000, '456 Đường GHI, Quận 5, TP.HCM', '0123456766', 'paid', 5),
(35, 125, '2025-02-08 09:30:00', 175000, '789 Đường JKL, Quận 6, TP.HCM', '0123456765', 'paid', NULL),
(36, 126, '2025-02-09 10:05:00', 135000, '123 Đường MNO, Quận 7, TP.HCM', '0123456764', 'paid', 6),
(37, 127, '2025-02-10 11:40:00', 165000, '456 Đường PQR, Quận 8, TP.HCM', '0123456763', 'paid', NULL),
(38, 128, '2025-02-11 12:15:00', 195000, '789 Đường STU, Quận 9, TP.HCM', '0123456762', 'paid', 7),
(39, 129, '2025-02-12 13:50:00', 115000, '123 Đường VWX, Quận 10, TP.HCM', '0123456761', 'paid', NULL),
(40, 130, '2025-02-13 14:25:00', 155000, '456 Đường YZ, Quận 11, TP.HCM', '0123456760', 'paid', 8),
(41, 131, '2025-02-14 15:00:00', 185000, '789 Đường ABC, Quận 12, TP.HCM', '0123456759', 'paid', NULL),
(42, 132, '2025-02-15 16:35:00', 125000, '123 Đường XYZ, Quận Bình Thạnh, TP.HCM', '0123456758', 'paid', 1),
(43, 133, '2025-02-16 17:10:00', 145000, '456 Đường DEF, Quận Gò Vấp, TP.HCM', '0123456757', 'paid', NULL),
(44, 134, '2025-02-17 18:45:00', 175000, '789 Đường GHI, Quận Phú Nhuận, TP.HCM', '0123456756', 'paid', 2),
(45, 135, '2025-02-18 19:20:00', 135000, '123 Đường JKL, Quận Tân Bình, TP.HCM', '0123456755', 'paid', NULL),
(46, 136, '2025-02-19 20:55:00', 165000, '456 Đường MNO, Quận Tân Phú, TP.HCM', '0123456754', 'paid', 3),
(47, 137, '2025-02-20 21:30:00', 195000, '789 Đường PQR, Quận Bình Tân, TP.HCM', '0123456753', 'paid', NULL),
(48, 138, '2025-02-21 22:05:00', 115000, '123 Đường STU, Quận Thủ Đức, TP.HCM', '0123456752', 'paid', 4),
(49, 139, '2025-02-22 23:40:00', 155000, '456 Đường VWX, Quận 1, TP.HCM', '0123456751', 'paid', NULL),
(50, 140, '2025-02-23 00:15:00', 185000, '789 Đường YZ, Quận 2, TP.HCM', '0123456750', 'paid', 5),
(51, 141, '2025-02-24 01:50:00', 125000, '123 Đường ABC, Quận 3, TP.HCM', '0123456749', 'paid', NULL),
(52, 142, '2025-02-25 02:25:00', 145000, '456 Đường XYZ, Quận 4, TP.HCM', '0123456748', 'paid', 6),
(53, 143, '2025-02-26 03:00:00', 175000, '789 Đường DEF, Quận 5, TP.HCM', '0123456747', 'paid', NULL),
(54, 144, '2025-02-27 04:35:00', 135000, '123 Đường GHI, Quận 6, TP.HCM', '0123456746', 'paid', 7),
(55, 145, '2025-02-28 05:10:00', 165000, '456 Đường JKL, Quận 7, TP.HCM', '0123456745', 'paid', NULL),
(56, 146, '2025-02-29 06:45:00', 195000, '789 Đường MNO, Quận 8, TP.HCM', '0123456744', 'paid', 8),
(57, 147, '2025-03-01 07:20:00', 115000, '123 Đường PQR, Quận 9, TP.HCM', '0123456743', 'paid', NULL),
(58, 148, '2025-03-02 08:55:00', 155000, '456 Đường STU, Quận 10, TP.HCM', '0123456742', 'paid', 1),
(59, 149, '2025-03-03 09:30:00', 185000, '789 Đường VWX, Quận 11, TP.HCM', '0123456741', 'paid', NULL),
(60, 150, '2025-03-04 10:05:00', 125000, '123 Đường YZ, Quận 12, TP.HCM', '0123456740', 'paid', 2),
(61, 101, '2025-03-05 11:40:00', 165000, '123 Đường ABC, Quận 1, TP.HCM', '0123456789', 'paid', 3),
(62, 102, '2025-03-06 12:15:00', 195000, '456 Đường XYZ, Quận 2, TP.HCM', '0123456788', 'paid', NULL),
(63, 103, '2025-03-07 13:50:00', 115000, '789 Đường DEF, Quận 3, TP.HCM', '0123456787', 'paid', 4),
(64, 104, '2025-03-08 14:25:00', 155000, '321 Đường GHI, Quận 4, TP.HCM', '0123456786', 'paid', NULL),
(65, 105, '2025-03-09 15:00:00', 185000, '654 Đường JKL, Quận 5, TP.HCM', '0123456785', 'paid', 5),
(66, 106, '2025-03-10 16:35:00', 125000, '987 Đường MNO, Quận 6, TP.HCM', '0123456784', 'paid', NULL),
(67, 107, '2025-03-11 17:10:00', 145000, '147 Đường PQR, Quận 7, TP.HCM', '0123456783', 'paid', 6),
(68, 108, '2025-03-12 18:45:00', 175000, '258 Đường STU, Quận 8, TP.HCM', '0123456782', 'paid', NULL),
(69, 109, '2025-03-13 19:20:00', 135000, '369 Đường VWX, Quận 9, TP.HCM', '0123456781', 'paid', 7),
(70, 110, '2025-03-14 20:55:00', 165000, '741 Đường YZ, Quận 10, TP.HCM', '0123456780', 'paid', NULL),
(71, 111, '2025-03-15 21:30:00', 195000, '852 Đường ABC, Quận 11, TP.HCM', '0123456779', 'paid', 8),
(72, 112, '2025-03-16 22:05:00', 115000, '963 Đường XYZ, Quận 12, TP.HCM', '0123456778', 'paid', NULL),
(73, 113, '2025-03-17 23:40:00', 155000, '159 Đường DEF, Quận Bình Thạnh, TP.HCM', '0123456777', 'paid', 1),
(74, 114, '2025-03-18 00:15:00', 185000, '357 Đường GHI, Quận Gò Vấp, TP.HCM', '0123456776', 'paid', NULL),
(75, 115, '2025-03-19 01:50:00', 125000, '456 Đường JKL, Quận Phú Nhuận, TP.HCM', '0123456775', 'paid', 2),
(76, 116, '2025-03-20 02:25:00', 145000, '789 Đường MNO, Quận Tân Bình, TP.HCM', '0123456774', 'paid', 3),
(77, 117, '2025-03-21 03:00:00', 175000, '123 Đường PQR, Quận Tân Phú, TP.HCM', '0123456773', 'paid', NULL),
(78, 118, '2025-03-22 04:35:00', 135000, '456 Đường STU, Quận Bình Tân, TP.HCM', '0123456772', 'paid', 4),
(79, 119, '2025-03-23 05:10:00', 165000, '789 Đường VWX, Quận Thủ Đức, TP.HCM', '0123456771', 'paid', NULL),
(80, 120, '2025-03-24 06:45:00', 195000, '123 Đường YZ, Quận 1, TP.HCM', '0123456770', 'paid', 5),
(81, 121, '2025-03-25 07:20:00', 145000, '456 Đường ABC, Quận 2, TP.HCM', '0123456769', 'paid', NULL),
(82, 122, '2025-03-26 08:55:00', 175000, '789 Đường XYZ, Quận 3, TP.HCM', '0123456768', 'paid', 6),
(83, 123, '2025-03-27 09:30:00', 135000, '123 Đường DEF, Quận 4, TP.HCM', '0123456767', 'paid', NULL),
(84, 124, '2025-03-28 10:05:00', 165000, '456 Đường GHI, Quận 5, TP.HCM', '0123456766', 'paid', 7),
(85, 125, '2025-03-29 11:40:00', 195000, '789 Đường JKL, Quận 6, TP.HCM', '0123456765', 'paid', NULL),
(86, 126, '2025-03-30 12:15:00', 115000, '123 Đường MNO, Quận 7, TP.HCM', '0123456764', 'paid', 8),
(87, 127, '2025-03-31 13:50:00', 155000, '456 Đường PQR, Quận 8, TP.HCM', '0123456763', 'paid', NULL),
(88, 128, '2025-04-01 14:25:00', 185000, '789 Đường STU, Quận 9, TP.HCM', '0123456762', 'paid', 1),
(89, 129, '2025-04-02 15:00:00', 125000, '123 Đường VWX, Quận 10, TP.HCM', '0123456761', 'paid', NULL),
(90, 130, '2025-04-03 16:35:00', 145000, '456 Đường YZ, Quận 11, TP.HCM', '0123456760', 'paid', 2),
(91, 131, '2025-04-04 08:00:00', 160000, '123 Đường ABC, Quận 12, TP.HCM', '0123456759', 'paid', NULL),
(92, 132, '2025-04-05 09:10:00', 170000, '456 Đường DEF, Quận Bình Thạnh, TP.HCM', '0123456758', 'paid', 3),
(93, 133, '2025-04-06 10:20:00', 180000, '789 Đường GHI, Quận Phú Nhuận, TP.HCM', '0123456757', 'paid', NULL),
(94, 134, '2025-04-07 11:30:00', 190000, '123 Đường JKL, Quận Tân Bình, TP.HCM', '0123456756', 'paid', 4),
(95, 135, '2025-04-08 12:40:00', 200000, '456 Đường MNO, Quận Tân Phú, TP.HCM', '0123456755', 'paid', NULL),
(96, 136, '2025-04-09 13:50:00', 210000, '789 Đường PQR, Quận Gò Vấp, TP.HCM', '0123456754', 'paid', 5),
(97, 137, '2025-04-10 15:00:00', 220000, '123 Đường STU, Quận Bình Tân, TP.HCM', '0123456753', 'paid', NULL),
(98, 138, '2025-04-11 16:10:00', 230000, '456 Đường VWX, Quận Thủ Đức, TP.HCM', '0123456752', 'paid', 6),
(99, 139, '2025-04-12 17:20:00', 240000, '789 Đường YZ, Quận 1, TP.HCM', '0123456751', 'paid', NULL),
(100, 140, '2025-04-13 18:30:00', 250000, '123 Đường ABC, Quận 2, TP.HCM', '0123456750', 'paid', 7),
(101, 141, '2025-04-14 09:15:00', 155000, '123 Đường DEF, Quận 3, TP.HCM', '0123456749', 'paid', 1),
(102, 142, '2025-04-15 10:25:00', 165000, '456 Đường GHI, Quận 4, TP.HCM', '0123456748', 'paid', NULL),
(103, 143, '2025-04-16 11:35:00', 175000, '789 Đường JKL, Quận 5, TP.HCM', '0123456747', 'paid', 2),
(104, 144, '2025-04-17 12:45:00', 185000, '123 Đường MNO, Quận 6, TP.HCM', '0123456746', 'paid', NULL),
(105, 145, '2025-04-18 13:55:00', 195000, '456 Đường PQR, Quận 7, TP.HCM', '0123456745', 'paid', 3),
(106, 146, '2025-04-19 15:05:00', 205000, '789 Đường STU, Quận 8, TP.HCM', '0123456744', 'paid', NULL),
(107, 147, '2025-04-20 16:15:00', 215000, '123 Đường VWX, Quận 9, TP.HCM', '0123456743', 'paid', 4),
(108, 148, '2025-04-21 17:25:00', 225000, '456 Đường YZ, Quận 10, TP.HCM', '0123456742', 'paid', NULL),
(109, 149, '2025-04-22 18:35:00', 235000, '789 Đường ABC, Quận 11, TP.HCM', '0123456741', 'paid', 5),
(110, 150, '2025-04-23 19:45:00', 245000, '123 Đường DEF, Quận 12, TP.HCM', '0123456740', 'paid', NULL),
(111, 121, '2025-04-24 08:30:00', 150000, '456 Đường GHI, Quận Bình Thạnh, TP.HCM', '0123456739', 'paid', 6),
(112, 122, '2025-04-25 09:40:00', 160000, '789 Đường JKL, Quận Phú Nhuận, TP.HCM', '0123456738', 'paid', NULL),
(113, 123, '2025-04-26 10:50:00', 170000, '123 Đường MNO, Quận Tân Bình, TP.HCM', '0123456737', 'paid', 7),
(114, 124, '2025-04-27 12:00:00', 180000, '456 Đường PQR, Quận Tân Phú, TP.HCM', '0123456736', 'paid', NULL),
(115, 125, '2025-04-28 13:10:00', 190000, '789 Đường STU, Quận Gò Vấp, TP.HCM', '0123456735', 'paid', 8),
(116, 126, '2025-04-29 14:20:00', 200000, '123 Đường VWX, Quận Bình Tân, TP.HCM', '0123456734', 'paid', NULL),
(117, 127, '2025-04-30 15:30:00', 210000, '456 Đường YZ, Quận Thủ Đức, TP.HCM', '0123456733', 'paid', 1),
(118, 128, '2025-05-01 16:40:00', 220000, '789 Đường ABC, Quận 1, TP.HCM', '0123456732', 'paid', NULL),
(119, 129, '2025-05-02 17:50:00', 230000, '123 Đường DEF, Quận 2, TP.HCM', '0123456731', 'paid', 2),
(120, 130, '2025-05-03 19:00:00', 240000, '456 Đường GHI, Quận 3, TP.HCM', '0123456730', 'paid', NULL),
(121, 131, '2025-05-04 08:30:00', 160000, '123 Đường ABC, Quận 4, TP.HCM', '0123456729', 'paid', 3),
(122, 132, '2025-05-05 09:40:00', 170000, '456 Đường DEF, Quận 5, TP.HCM', '0123456728', 'paid', NULL),
(123, 133, '2025-05-06 10:50:00', 180000, '789 Đường GHI, Quận 6, TP.HCM', '0123456727', 'paid', 4),
(124, 134, '2025-05-07 12:00:00', 190000, '123 Đường JKL, Quận 7, TP.HCM', '0123456726', 'paid', NULL),
(125, 135, '2025-05-08 13:10:00', 200000, '456 Đường MNO, Quận 8, TP.HCM', '0123456725', 'paid', 5),
(126, 136, '2025-05-09 14:20:00', 210000, '789 Đường PQR, Quận 9, TP.HCM', '0123456724', 'paid', NULL),
(127, 137, '2025-05-10 15:30:00', 220000, '123 Đường STU, Quận 10, TP.HCM', '0123456723', 'paid', 6),
(128, 138, '2025-05-11 16:40:00', 230000, '456 Đường VWX, Quận 11, TP.HCM', '0123456722', 'paid', NULL),
(129, 139, '2025-05-12 17:50:00', 240000, '789 Đường YZ, Quận 12, TP.HCM', '0123456721', 'paid', 7),
(130, 140, '2025-05-13 19:00:00', 250000, '123 Đường ABC, Quận Bình Thạnh, TP.HCM', '0123456720', 'paid', NULL),
(131, 141, '2025-05-14 08:30:00', 155000, '123 Đường DEF, Quận Phú Nhuận, TP.HCM', '0123456719', 'paid', 8),
(132, 142, '2025-05-15 09:40:00', 165000, '456 Đường GHI, Quận Tân Bình, TP.HCM', '0123456718', 'paid', NULL),
(133, 143, '2025-05-16 10:50:00', 175000, '789 Đường JKL, Quận Tân Phú, TP.HCM', '0123456717', 'paid', 1),
(134, 144, '2025-05-17 12:00:00', 185000, '123 Đường MNO, Quận Gò Vấp, TP.HCM', '0123456716', 'paid', NULL),
(135, 145, '2025-05-18 13:10:00', 195000, '456 Đường PQR, Quận Bình Tân, TP.HCM', '0123456715', 'paid', 2),
(136, 146, '2025-05-19 14:20:00', 205000, '789 Đường STU, Quận Thủ Đức, TP.HCM', '0123456714', 'paid', NULL),
(137, 147, '2025-05-20 15:30:00', 215000, '123 Đường VWX, Quận 1, TP.HCM', '0123456713', 'paid', 3),
(138, 148, '2025-05-21 16:40:00', 225000, '456 Đường YZ, Quận 2, TP.HCM', '0123456712', 'paid', NULL),
(139, 149, '2025-05-22 17:50:00', 235000, '789 Đường ABC, Quận 3, TP.HCM', '0123456711', 'paid', 4),
(140, 150, '2025-05-23 19:00:00', 245000, '123 Đường DEF, Quận 4, TP.HCM', '0123456710', 'paid', NULL),
(141, 121, '2025-05-24 08:30:00', 150000, '456 Đường GHI, Quận 5, TP.HCM', '0123456709', 'paid', 5),
(142, 122, '2025-05-25 09:40:00', 160000, '789 Đường JKL, Quận 6, TP.HCM', '0123456708', 'paid', NULL),
(143, 123, '2025-05-26 10:50:00', 170000, '123 Đường MNO, Quận 7, TP.HCM', '0123456707', 'paid', 6),
(144, 124, '2025-05-27 12:00:00', 180000, '456 Đường PQR, Quận 8, TP.HCM', '0123456706', 'paid', NULL),
(145, 125, '2025-05-28 13:10:00', 190000, '789 Đường STU, Quận 9, TP.HCM', '0123456705', 'paid', 7),
(146, 126, '2025-05-29 14:20:00', 200000, '123 Đường VWX, Quận 10, TP.HCM', '0123456704', 'paid', NULL),
(147, 127, '2025-05-30 15:30:00', 210000, '456 Đường YZ, Quận 11, TP.HCM', '0123456703', 'paid', 8),
(148, 128, '2025-06-1 16:40:00', 220000, '789 Đường ABC, Quận 12, TP.HCM', '0123456702', 'paid', NULL),
(149, 129, '2025-06-1 17:50:00', 230000, '123 Đường DEF, Quận Bình Thạnh, TP.HCM', '0123456701', 'paid', 1),
(150, 130, '2025-06-1 14:25:00', 185000, '789 Đường YZ, Quận 5, TP.HCM', '0123456690', 'paid', 5);

CREATE TABLE `order_product` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert order products for the first 50 orders


-- Continue with more orders and order products...
-- I'll add more in the next message due to length limitations

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

--
-- Dumping data for table `order_product`
-- --------------------------------------------------------

--
-- Table structure for table `product`
--
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

--
-- Constraints for table `orderr`
--
ALTER TABLE `orderr`
  ADD CONSTRAINT `orderr_ibfk_2` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`promotion_id`) ON DELETE SET NULL ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `dashboard` (
  `dashboard_id` int(11) NOT NULL AUTO_INCREMENT,
  `total_orders` int(11) DEFAULT 0,
  `total_revenue` decimal(10,2) DEFAULT 0.00,
  `top_products` text DEFAULT NULL,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dashboard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert more orders


-- Insert more order products (Batch 1)
INSERT INTO `order_product` (`product_id`, `order_id`, `order_quantity`) VALUES
(1, 11, 2),
 (2, 11, 1),
 (3, 12, 1),
 (4, 12, 2),
 (5, 13, 2),
 (6, 13, 1),
 (11, 16, 1),
 (12, 16, 2),
 (13, 17, 2),
 (14, 17, 1),
 (15, 18, 1),
 (16, 18, 2),
 (17, 19, 2),
 (18, 19, 1),
 (21, 21, 2),
 (22, 21, 1),
 (23, 22, 1),
 (24, 22, 2),
 (31, 26, 1),
 (32, 26, 2),
 (33, 27, 2),
 (41, 31, 2),
 (42, 31, 1),
 (43, 32, 1),
 (44, 32, 2),
 (51, 36, 1),
 (52, 36, 2),
 (53, 37, 2),
 (54, 37, 1),
 (55, 38, 1),
 (56, 38, 2),
 (57, 39, 2),
 (58, 39, 1),
 (1, 1, 2),
 (2, 1, 1),
 (8, 14, 2),
 (34, 27, 1),
 (1, 41, 2),
 (2, 41, 1),
 (3, 41, 1),
 (4, 42, 1),
 (5, 42, 2),
 (6, 43, 2),
 (7, 43, 1),
 (8, 43, 1),
 (11, 45, 2),
 (12, 45, 1),
 (13, 45, 1),
 (14, 46, 1),
 (15, 46, 2),
 (16, 47, 2),
 (17, 47, 1),
 (18, 47, 1),
 (21, 49, 2),
 (22, 49, 1),
 (23, 49, 1),
 (24, 50, 1),
 (31, 53, 2),
 (32, 53, 1),
 (33, 53, 1),
 (34, 54, 1),
 (41, 57, 2),
 (42, 57, 1),
 (43, 57, 1),
 (44, 58, 1),
 (51, 61, 2),
 (52, 61, 1),
 (53, 61, 1),
 (54, 62, 1),
 (55, 62, 2),
 (56, 63, 2),
 (57, 63, 1),
 (58, 63, 1),
 (1, 65, 2),
 (2, 65, 1),
 (3, 65, 1),
 (1, 66, 2),
 (2, 66, 1),
 (3, 66, 1),
 (4, 67, 1),
 (5, 67, 2),
 (6, 68, 2),
 (7, 68, 1),
 (8, 68, 1),
 (11, 70, 2),
 (12, 70, 1),
 (13, 70, 1),
 (14, 71, 1),
 (15, 71, 2),
 (16, 72, 2),
 (17, 72, 1),
 (18, 72, 1),
 (21, 74, 2),
 (22, 74, 1),
 (23, 74, 1),
 (24, 75, 1),
 (31, 78, 2),
 (32, 78, 1),
 (33, 78, 1),
 (34, 79, 1),
 (41, 82, 2),
 (42, 82, 1),
 (43, 82, 1),
 (44, 83, 1),
 (51, 86, 2),
 (52, 86, 1),
 (53, 86, 1),
 (54, 87, 1),
 (55, 87, 2),
 (56, 88, 2),
 (57, 88, 1),
 (58, 88, 1),
 (1, 90, 2),
 (2, 90, 1),
 (3, 90, 1),
 (4, 91, 1),
 (5, 91, 2),
 (6, 92, 2),
 (7, 92, 1),
 (8, 92, 1),
 (11, 94, 2),
 (12, 94, 1),
 (13, 94, 1),
 (14, 95, 1),
 (15, 95, 2),
 (16, 96, 2),
 (17, 96, 1),
 (18, 96, 1),
 (21, 98, 2),
 (22, 98, 1),
 (23, 98, 1),
 (24, 99, 1),
 (31, 102, 2),
 (32, 102, 1),
 (33, 102, 1),
 (34, 103, 1),
 (41, 106, 2),
 (42, 106, 1),
 (43, 106, 1),
 (44, 107, 1),
 (51, 110, 2),
 (52, 110, 1),
 (53, 110, 1),
 (54, 111, 1),
 (55, 111, 2),
 (56, 112, 2),
 (57, 112, 1),
 (58, 112, 1),
 (1, 114, 2),
 (2, 114, 1),
 (3, 114, 1),
 (4, 115, 1),
 (5, 115, 2),
 (6, 116, 2),
 (7, 116, 1),
 (8, 116, 1),
 (11, 118, 2),
 (12, 118, 1),
 (13, 118, 1),
 (14, 119, 1),
 (15, 119, 2),
 (16, 120, 2),
 (17, 120, 1),
 (18, 120, 1),
 (21, 122, 2),
 (22, 122, 1),
 (23, 122, 1),
 (24, 123, 1),
 (31, 126, 2),
 (32, 126, 1),
 (33, 126, 1),
 (34, 127, 1),
 (41, 130, 2),
 (42, 130, 1),
 (43, 130, 1),
 (44, 131, 1),
 (51, 134, 2),
 (52, 134, 1),
 (53, 134, 1),
 (54, 135, 1),
 (55, 135, 2),
 (56, 136, 2),
 (57, 136, 1),
 (58, 136, 1),
 (1, 138, 2),
 (2, 138, 1),
 (3, 138, 1),
 (11, 142, 2),
 (12, 142, 1),
 (13, 142, 1),
 (14, 143, 1),
 (15, 143, 2),
 (16, 144, 2),
 (17, 144, 1),
 (18, 144, 1),
 (21, 146, 2),
 (22, 146, 1),
 (23, 146, 1),
 (24, 147, 1),
 (31, 150, 2),
 (32, 150, 1),
 (33, 150, 1),
 (34, 37, 1),
 (41, 40, 2),
 (42, 40, 1),
 (43, 40, 1),
 (44, 41, 1),
 (51, 44, 2),
 (52, 44, 1),
 (53, 44, 1),
 (54, 45, 1),
 (55, 45, 2),
 (56, 46, 2),
 (57, 46, 1),
 (58, 46, 1),
 (1, 48, 2),
 (2, 48, 1),
 (3, 48, 1),
 (4, 49, 1),
 (5, 49, 2),
 (6, 50, 2),
 (7, 50, 1),
 (8, 50, 1),
 (13, 52, 1),
 (14, 53, 1),
 (15, 53, 2),
 (16, 54, 2),
 (17, 54, 1),
 (18, 54, 1),
 (21, 56, 2),
 (22, 56, 1),
 (23, 56, 1),
 (24, 57, 1),
 (31, 60, 2),
 (32, 60, 1),
 (33, 60, 1),
 (34, 61, 1),
 (41, 64, 2),
 (42, 64, 1),
 (43, 64, 1),
 (44, 65, 1),
 (51, 68, 2),
 (52, 68, 1),
 (53, 68, 1),
 (54, 69, 1),
 (55, 69, 2),
 (56, 70, 2),
 (57, 70, 1),
 (58, 70, 1),
 (1, 72, 2),
 (2, 72, 1),
 (3, 72, 1),
 (4, 73, 1),
 (5, 73, 2),
 (6, 74, 2),
 (7, 74, 1),
 (8, 74, 1),
 (11, 76, 2),
 (12, 76, 1),
 (13, 76, 1),
 (14, 77, 1),
 (15, 77, 2),
 (16, 78, 2),
 (21, 80, 2),
 (22, 80, 1),
 (23, 80, 1),
 (24, 81, 1),
 (31, 84, 2),
 (32, 84, 1),
 (33, 84, 1),
 (34, 85, 1),
 (41, 88, 2),
 (42, 88, 1),
 (43, 88, 1),
 (44, 89, 1),
 (51, 92, 2),
 (52, 92, 1),
 (53, 92, 1),
 (54, 93, 1),
 (55, 93, 2),
 (56, 94, 2),
 (57, 94, 1),
 (58, 94, 1),
 (1, 96, 2),
 (2, 96, 1),
 (3, 96, 1),
 (4, 97, 1),
 (5, 97, 2),
 (6, 98, 2),
 (7, 98, 1),
 (8, 98, 1),
 (11, 100, 2),
 (12, 100, 1),
 (13, 100, 1),
 (14, 101, 1),
 (15, 101, 2),
 (16, 102, 2),
 (17, 102, 1),
 (18, 102, 1),
 (23, 104, 1),
 (24, 105, 1),
 (31, 108, 2),
 (32, 108, 1),
 (33, 108, 1),
 (34, 109, 1),
 (41, 112, 2),
 (42, 112, 1),
 (43, 112, 1),
 (44, 113, 1),
 (51, 116, 2),
 (52, 116, 1),
 (53, 116, 1),
 (54, 117, 1),
 (55, 117, 2),
 (56, 118, 2),
 (57, 118, 1),
 (58, 118, 1),
 (1, 120, 2),
 (2, 120, 1),
 (3, 120, 1),
 (4, 121, 1),
 (5, 121, 2),
 (6, 122, 2),
 (7, 122, 1),
 (8, 122, 1),
 (11, 124, 2),
 (12, 124, 1),
 (13, 124, 1),
 (14, 125, 1),
 (15, 125, 2),
 (16, 126, 2),
 (17, 126, 1),
 (18, 126, 1),
 (21, 128, 2),
 (22, 128, 1),
 (23, 128, 1),
 (24, 129, 1),
 (31, 132, 2),
 (32, 132, 1),
 (33, 132, 1),
 (34, 133, 1),
 (41, 136, 2),
 (42, 136, 1),
 (43, 136, 1),
 (44, 137, 1),
 (51, 140, 2),
 (52, 140, 1),
 (53, 140, 1),
 (54, 141, 1),
 (55, 141, 2),
 (56, 142, 2),
 (57, 142, 1),
 (58, 142, 1),
 (1, 144, 2),
 (2, 144, 1),
 (3, 144, 1),
 (4, 145, 1),
 (5, 145, 2),
 (6, 146, 2),
 (7, 146, 1),
 (8, 146, 1),
 (11, 148, 2),
 (12, 148, 1),
 (13, 148, 1),
 (14, 149, 1),
 (15, 149, 2),
 (16, 150, 2),
 (17, 150, 1),
 (18, 150, 1);