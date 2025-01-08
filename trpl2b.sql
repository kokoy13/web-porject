-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2025 pada 13.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trpl2b`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `file_upload` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `user_id`, `kategori_id`, `judul_berita`, `file_upload`, `isi_berita`, `date_created`) VALUES
(4, 2, 3, 'Tim PKM PM Politeknik Negeri Padang Rancang Website Untuk Rumah Singgah Pasien M.Ihpan', 'berita-1.jpg', 'Program Kreativitas Mahasiswa bidang Pengabdian kepada Masyarakat (PKM-PM) berfokus dalam memberikan bantuan iptek kepada mitra program sebagai bentuk solusi atas permasalahan atau kebutuhan prioritas mitra yang teridentifikasi saat mahasiswa dan mitra berdiskusi sebelum kesepakatan bersama dicapai. PKM-PM bertujuan memberikan kesempatan kepada mahasiswa untuk berinteraksi secara aktif dengan masyarakat mitra non profit; menumbuhkan tenggang rasa dan solidaritas terhadap masalah yang dihadapi masyarakat mitra; serta menerapkan ilmu pengetahuan, teknologi dan seni untuk membantu menyelesaikan permasalahan mitra.\r\n\r\nTim PKM Politeknik Negeri Padang dibimbing langsung oleh Bapak Fazrol Rozi, M.Sc dan diketuai oleh Gybran Nauval Yuhandika dengan anggota Altaf Hafizun, Githani Rizkyka Pasya, M.Nawaf Akbar, serta Wirda Nissa.\r\n\r\nAdapun proses seleksi PKM-PM Vokasi ini dimulai dengan tahap seleksi proposal. Tim Mahasiswa berdiskusi dengan pihak mitra yaitu Rumah Singgah Pasien M.Ihpan yang berlokasi di Jl. Dr. H. Abdullah Ahmad No.17 Sawahan memiliki jarak +- 230 meter dari RSUP M.Djamil. Rumah singgah M.Ihpan terdapat fasilitas kamar tidur, kamar mandi, peralatan memasak, kursi roda, ruang tamu, sembako, serta bimbingan berobat. RSP M.Ihpan dikhususkan untuk masyarakat yang berasal dari Kab. Pasaman dan Kab. Pasaman Barat. Hal ini disebabkan jarak antara Kab. Pasaman dan Kab. Pasaman Barat dengan RSUP M.Djamil +- 250 km sehingga masyarakat Kab. Pasaman dan Kab. Pasaman Barat tidak memiliki tempat tinggal sementara selama menjalani pengobatan.\r\n\r\nRumah Singgah Pasien M.Ihpan juga masih menggunakan pendataan pasien secara manual sehingga tim PKM PM merancang sistem informasi berbasis website dengan tujuan dapat meningkatkan aksebilitas dan pengelolaan rumah singgah pasien M.Ihpan.\r\n\r\nProses PKM ini berlangsung selama empat (4) bulan dimulai dari tanggal 27 April 2024 s.d bulan Agustus nanti. Mohon doanya agar tim PKM PM Politeknik Negeri Padang dapat lolos sampai Pekan Ilmiah Mahasiswa Nasional (PIMNAS) ke-37 yang digelar di Universitas Airlangga (Unair) Surabaya. Jangan lupa kepoin kegiatan kami di instagram @pkmpm.rspmihpan', '2024-12-13 04:06:33'),
(5, 2, 4, 'Tim Peridot Raih Juara 2 di HACKATHON 4.0', 'berita-2.jpg', 'Nama Tim: Peridot\r\nAnggota Tim:\r\n\r\nRanaufal Muha\r\nAhmad Zulveron\r\nYefri Afri Zandra\r\nDeskripsi Proyek:\r\nPeridot adalah platform revolusioner yang dibangun di atas blockchain Internet Computer Protocol (ICP), yang mengintegrasikan dunia gaming dan teknologi NFT. Proyek ini bertujuan untuk menciptakan ekosistem yang dinamis di mana gamer, pengembang game, dan pembuat NFT dapat berinteraksi dan bertransaksi dengan mudah dan aman.\r\n\r\nPenghargaan: Meraih Juara 2 pada HACKATHON 4.0 oleh codefest.id\r\nHadiah: Rp. 5.000.000,-\r\n\r\nTim Peridot, yang terdiri dari Ranaufal Muha, Ahmad Zulveron, dan Yefri Afri Zandra, berhasil meraih Juara 2 dalam kompetisi HACKATHON 4.0 yang diselenggarakan oleh codefest.id. Dengan proyek mereka yang revolusioner, Peridot, tim ini menunjukkan keunggulan dalam mengintegrasikan teknologi blockchain ICP dengan dunia gaming dan NFT.\r\n\r\nPeridot adalah platform revolusioner yang dibangun di atas blockchain Internet Computer Protocol (ICP). Proyek ini bertujuan untuk menciptakan ekosistem yang kaya dan dinamis di mana para gamer, pengembang game, dan pembuat NFT dapat berinteraksi dan bertransaksi dengan mudah dan aman. Integrasi antara gaming dan teknologi NFT dalam satu platform ini menawarkan pengalaman baru yang menarik dan inovatif bagi semua penggunanya.\r\n\r\nHACKATHON 4.0 adalah ajang kompetisi tahunan yang diadakan oleh codefest.id, yang bertujuan untuk mendorong inovasi dan kreativitas dalam pengembangan teknologi. Kompetisi ini diikuti oleh tim-tim dari berbagai latar belakang, yang bersaing untuk mengembangkan solusi teknologi terbaru dalam waktu terbatas. Dengan konsep hackathon, peserta ditantang untuk merancang, mengembangkan, dan mempresentasikan proyek mereka dalam jangka waktu yang singkat, sehingga menuntut kecepatan, ketepatan, dan kreativitas yang tinggi.\r\n\r\nPada ajang HACKATHON 4.0 ini, Tim Peridot berhasil menarik perhatian para juri dengan konsep dan eksekusi proyek mereka yang solid. Sebagai penghargaan atas prestasi mereka, Tim Peridot berhak menerima hadiah sebesar Rp. 5.000.000,-. Pencapaian ini menjadi bukti nyata atas kerja keras dan dedikasi tim dalam mengembangkan solusi berbasis teknologi yang inovatif.\r\n\r\nPrestasi ini diharapkan dapat memotivasi mahasiswa lain untuk terus berinovasi dan berpartisipasi dalam kompetisi-kompetisi teknologi serupa, guna memberikan kontribusi positif bagi perkembangan teknologi di Indonesia.', '2024-12-13 04:22:06'),
(6, 2, 2, 'Mahasiswa Jurusan TI Raih Juara 1 di KMIPN VI', 'berita-3.jpg', 'Pada ajang bergengsi Kompetisi Mahasiswa Informatika Politeknik Nasional (KMIPN) VI yang diselenggarakan di Politeknik Negeri Jakarta, mahasiswa jurusan Teknologi Informasi berhasil mengukir prestasi membanggakan. Tim Caiman, yang terdiri dari Firman Ardiansyah sebagai ketua, serta Aditya Ibnu Arif dan Jesica Sanditia Putri sebagai anggota, berhasil meraih Juara 1 dalam kategori Desain Profil Produk Inovasi dengan produk mereka yang inovatif, “Sketoo”.\r\n\r\nKMIPN merupakan kompetisi tahunan yang diadakan untuk mendorong kreativitas dan inovasi mahasiswa dalam bidang informatika. Pada tahun ini, Politeknik Negeri Jakarta menjadi tuan rumah bagi kompetisi bergengsi ini, dan Tim Caiman sukses menunjukkan keunggulan mereka di hadapan para juri dan peserta lainnya.\r\n\r\n“Sketoo” adalah produk inovatif yang dikembangkan oleh Tim Caiman, yang menonjol dengan desain dan fungsionalitas yang memukau. Keberhasilan tim ini tidak lepas dari bimbingan dosen-dosen berkompeten, Fazrol Rozi dan Ardian Firosha, serta dosen lainnya yang memberikan dukungan penuh dan arahan selama proses pengembangan produk.\r\n\r\nFirman Ardiansyah, ketua tim, menyampaikan rasa syukurnya atas pencapaian ini. “Kami sangat bangga bisa membawa pulang Juara 1 di KMIPN VI. Ini adalah hasil kerja keras dan kolaborasi yang luar biasa dari seluruh anggota tim serta dukungan dari dosen pembimbing kami.”\r\n\r\nPrestasi ini diharapkan dapat menjadi inspirasi bagi mahasiswa lainnya untuk terus berinovasi dan mengembangkan ide-ide kreatif yang dapat memberikan kontribusi positif bagi perkembangan teknologi informasi di Indonesia.\r\n\r\nSelamat kepada Tim Caiman atas prestasi gemilangnya! Teruslah berkarya dan berinovasi untuk masa depan yang lebih baik.', '2024-12-13 06:52:06'),
(7, 2, 4, 'Jurusan Teknologi Informasi Politeknik Negeri Padang Raih Prestasi Gemilang di Kompetisi Mahasiswa I', 'berita-4.jpg', '*Padang, 4 Agustus 2023* – Tiga tim dari Politeknik Negeri Padang (PNP) telah menunjukkan kelasnya dalam Kompetisi Mahasiswa Informatika Politeknik Nasional yang berlangsung di Politeknik Elektronika Negeri Surabaya pada tanggal 31 Juli hingga 3 Agustus 2023. Kompetisi yang diikuti oleh berbagai politeknik ternama dari seluruh Indonesia ini memberikan panggung untuk mahasiswa-mahasiswa teknologi informasi unggulan menampilkan kemampuan mereka.\r\n\r\nTim-tim dari PNP yang turut berkompetisi adalah GOMU Team, GloryTech, dan tim ZENITH. Keberhasilan mereka dalam mencapai berbagai tahap kompetisi ini adalah prestasi yang membanggakan, menunjukkan bahwa PNP mampu menghasilkan mahasiswa yang mampu bersaing di tingkat nasional dalam bidang teknologi informasi.\r\n\r\nSalah satu pencapaian yang patut dicatat adalah keberhasilan tim GOMU Team, GloryTech, dan tim ZENITH dalam meraih tempat di final kompetisi. Dengan persaingan yang ketat dan tantangan yang kompleks, ketiga tim ini telah memperlihatkan kerja keras, dedikasi, dan kerja sama yang kuat untuk mengatasi semua rintangan yang dihadapi.\r\n\r\nKompetisi Mahasiswa Informatika Politeknik Nasional merupakan ajang tahunan yang bergengsi di bidang teknologi informasi, di mana para mahasiswa dari berbagai politeknik di Indonesia berkompetisi dalam berbagai cabang ilmu seperti pemrograman, pengembangan perangkat lunak, kecerdasan buatan, dan lainnya. Selain bertujuan untuk meningkatkan kualitas pendidikan di bidang teknologi informasi, kompetisi ini juga menjadi sarana untuk saling bertukar pengalaman dan pengetahuan antara mahasiswa-mahasiswa dari berbagai daerah.\r\n\r\nSelain itu, tim GLORY Tech juga berhasil meraih penghargaan “Best Team Work” atas kerja sama tim yang luar biasa dalam menghadapi berbagai tugas dan ujian dalam kompetisi ini. Prestasi ini menjadi bukti nyata bahwa kolaborasi tim yang baik mampu menghasilkan solusi-solusi kreatif dan efektif dalam dunia teknologi informasi.\r\n\r\nKompetisi Mahasiswa Informatika Politeknik Nasional tidak hanya berfungsi sebagai ajang untuk bersaing, tetapi juga sebagai platform pembelajaran dan pertukaran pengetahuan antar mahasiswa dari berbagai daerah. Dengan keberhasilan ini, PNP semakin terpacu untuk terus meningkatkan kualitas pendidikan di bidang teknologi informasi serta mendukung mahasiswanya dalam mencapai prestasi gemilang di masa depan.\r\n\r\nDengan meriahnya Kompetisi Mahasiswa Informatika Politeknik Nasional tahun ini, diharapkan semakin banyak mahasiswa yang terinspirasi untuk mengembangkan potensi dan kemampuan mereka dalam teknologi informasi. Selamat kepada Jurusan Teknologi Informasi PNP atas prestasi luar biasa ini, semoga semakin banyak prestasi-prestasi gemilang yang akan diukir di masa depan.', '2024-12-13 07:04:58'),
(9, 2, 2, 'Mahasiswa Jurusan Teknologi Informasi Memenangkan kejuaraan Internasional di Thailand', 'berita-5.jpg', 'Mahasiswa Jurusan Teknologi Informasi memenangkan sebuah kompetisi Internasional yang dilaksanakan di Thailand yaitu kompetisi SAFE-network & Maejo University, Product Inovation Competition di Chiang Mai, Thailand.\r\n\r\nDimana finalis yang mengikuti kompetisi ini adalah dari negara Indonesia, Thailand, vietname, Miyanmar, Philipina, Malaysia, India dan Nigeria\r\n\r\nPemenang dari kompetisi ini adalah :\r\n\r\nLapak Petani (Mendali Emas) : Arsyad Hamidi, Zalna Mustika, Sonya Hasna Hafiza, Singari Aulia\r\nTrolley Petani (Mendali Silver) : Gibran Naufal Yuhandika, Githani Rizkyka Pasha, Quryata A’yunin dan Siti Nurhaliza Yus\r\nFeazy (Mendali Silver) : Ranaufal Muha,Alvin Fadli Dwi Mulya, Abdillah Hendra dan  Kurnia Asila\r\nPembimbingnya adalah Rahmat Hidayat, Aldo Erianda, Alde Alanda, Taufik Gusman dan Hidra Amnur', '2024-12-18 07:56:52'),
(10, 2, 2, 'Mahasiswa TEKINFO Juara Umum Mobile Apps Competisi 6.0 di Malaysia', 'berita-6.jpg', 'Mahasiswa Jurusan Teknologi Informasi Politeknik Negeri Padang menjuarai sebuah kompetisi di Universiti Sarawak Malaysia yaitu Mobile Apps Competition 6.0. tidak tanggung-tanggung, mereka menjadi juara umum pada kompetisi tersebut\r\n\r\n', '2025-01-01 10:04:35'),
(11, 2, 3, 'SEMINAR MENTAL HEALTH DAN COMMUNICATION SKILL BAGI CIVITAS AKADEMIKA JURUSAN TEKNOLOGI INFORMASI', 'berita-7.jpg', 'Pada hari Selasa, 20 Agustus 2024, Jurusan Teknologi Informasi Politeknik Negeri Padang sukses menyelenggarakan Seminar Mental Health dan Communication Skill bagi civitas akademika. Acara ini berlangsung di Gedung PKM Politeknik Negeri Padang dan dihadiri oleh seluruh mahasiswa jurusan Teknologi Informasi, dosen, serta tenaga kependidikan.\r\n\r\nSeminar dibuka oleh Wakil Direktur Bidang Kemahasiswaan, Ir. Nasrullah, ST, MT, yang dalam sambutannya menekankan pentingnya kesehatan mental dan kemampuan komunikasi bagi seluruh civitas akademika. Beliau berharap melalui seminar ini, para peserta dapat memahami pentingnya menjaga kesehatan mental serta meningkatkan kemampuan komunikasi yang efektif.\r\n\r\nSeminar Sesi I: Mental Health\r\n\r\nSesi pertama yang bertemakan Mental Health dimoderatori oleh Sumema, S.Ds., M.Ds. Pemateri dalam sesi ini adalah Neny Andriani, M.Psi., Psikolog, CI, C.NLP, yang merupakan Pimpinan Jogja Consultant Cabang Padang. Dalam paparannya, Neny Andriani menyampaikan betapa pentingnya kesehatan mental, terutama dalam dunia pendidikan yang penuh dengan tekanan. Ia juga memberikan tips dan strategi untuk menjaga keseimbangan emosional dan mental di tengah tuntutan akademik.\r\n\r\nSeminar Sesi II: Communication Skill\r\n\r\nSesi kedua dilanjutkan dengan materi Communication Skill yang dipandu oleh Rita Afyenni, S.Kom., M.Kom. Pemateri sesi ini, Rini Handayani, SE, MM dari Minang Hospitality Management, membahas berbagai teknik komunikasi efektif yang dapat diterapkan oleh mahasiswa dan tenaga pendidik. Ia menekankan bahwa kemampuan komunikasi yang baik dapat meningkatkan kualitas interaksi, baik di lingkungan kampus maupun dalam kehidupan sehari-hari.\r\n\r\nInteraktif dan Menghibur dengan Game Kahoot\r\n\r\nMenariknya, setiap sesi seminar diselingi dengan game interaktif Kahoot yang diikuti oleh para peserta. Game ini tidak hanya menguji pengetahuan peserta mengenai materi yang telah disampaikan, tetapi juga memberikan suasana yang lebih menyenangkan dan kompetitif.', '2025-01-01 10:09:28'),
(12, 2, 3, 'Program Studi Manajemen Informatika Jurusan Teknologi Informasi Politeknik Negeri Padang Jalani Ases', 'berita-8.jpg', 'Padang, 25 Juli 2024 – Program Studi Manajemen Informatika Jurusan Teknologi Informasi Politeknik Negeri Padang hari ini memasuki tahap krusial dalam proses akreditasi, yaitu asesmen lapangan. Kegiatan yang berlangsung selama 2 hari ini melibatkan tim asesor dari Lembaga Akreditasi LAM INFOKOM untuk melakukan evaluasi menyeluruh terhadap seluruh aspek program studi.\r\n\r\nAsesmen lapangan ini bertujuan untuk menilai sejauh mana program studi telah memenuhi standar yang ditetapkan oleh LAM INFOKOM. Tim asesor akan melakukan pemeriksaan terhadap berbagai dokumen, wawancara dengan dosen, mahasiswa, alumni dan tenaga kependidikan, serta observasi langsung terhadap kegiatan akademik dan non-akademik.\r\n\r\nRoni Putra, S.Kom., MT. menyampaikan harapannya agar program studi dapat memperoleh hasil yang terbaik dalam asesmen ini. “Asesmen lapangan ini merupakan bentuk komitmen kami untuk terus meningkatkan kualitas pendidikan di Program Studi Manajemen Informatika. Kami berharap dapat memperoleh masukan yang berharga dari tim asesor untuk perbaikan ke depannya,” ujarnya.\r\n\r\nAsesmen Lapangan ini merupakan bukti nyata dari komitmen Politeknik Negeri Padang dalam memberikan pendidikan berkualitas tinggi. Diharapkan hasil asesmen ini dapat semakin memperkuat reputasi Program Studi Manajemen Informatika sebagai salah satu program studi unggulan di bidang teknologi informasi.\r\n\r\nSelama asesmen, tim penilai mengunjungi berbagai fasilitas, seperti laboratorium komputer, ruang kelas, dan pusat sumber daya belajar. Mereka juga memeriksa dokumen-dokumen penting, termasuk kurikulum, rencana pembelajaran, dan laporan evaluasi akademik. Wawancara dengan mahasiswa dan dosen bertujuan untuk menilai kualitas pengalaman belajar dan pengajaran di program studi tersebut.', '2025-01-01 10:11:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama_dosen`, `email`, `prodi_id`, `telp`, `alamat`) VALUES
(1, 41521521, 'ronal hasdi', 'admin@gmail.com', 10, '21', '421sa'),
(2, 421421, 'reyendra', 'reyy@gmail.com', 11, '0831', 'jalan'),
(3, 31, 'ajf', 'fka@g', 10, 'ss', 's'),
(4, 21, 'ff', 'ff@ff', 10, 'ff', 'ff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(2, 'Olahraga'),
(3, 'Komputer'),
(4, 'Politik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `hobi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `email`, `alamat`, `prodi_id`, `hobi`) VALUES
('2112', 'akoa', '2021-01-03', 'L', 'kkoam@koma.fs', 'kmd', 11, 'game');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jenjang_studi` char(2) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `jenjang_studi`, `keterangan`) VALUES
(10, 'strpl', 'd4', 'ahay'),
(11, 'ijoav', 'd3', 'aszlkm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `level`) VALUES
(2, 'administrator', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(4, 'fsaf', 'fsafsa', 'fsafsa', 'admin'),
(5, 'fsagag', 'gsagsa@gsafsa', '85b0b62635762dd2c8168d0fe7872675', 'admin'),
(7, 'fsagag', 'fajaradiputra127@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `berita_ibfk_1` (`kategori_id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
