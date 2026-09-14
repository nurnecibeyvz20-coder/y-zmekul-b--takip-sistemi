-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 May 2026, 00:07:04
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yuzme_kursu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `rol_id`, `kullanici_adi`, `sifre`) VALUES
(1, 1, 'berat', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `antrenorler`
--

CREATE TABLE `antrenorler` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `uzmanlik` varchar(100) DEFAULT NULL,
  `maas` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `devam`
--

CREATE TABLE `devam` (
  `id` int(11) NOT NULL,
  `sporcu_id` int(11) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `durum` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `havuzlar`
--

CREATE TABLE `havuzlar` (
  `id` int(11) NOT NULL,
  `havuz_adi` varchar(50) DEFAULT NULL,
  `uzunluk` int(11) DEFAULT NULL,
  `derinlik` float DEFAULT NULL,
  `kapasite` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `id` int(11) NOT NULL,
  `sporcu_id` int(11) DEFAULT NULL,
  `ay` varchar(20) DEFAULT NULL,
  `tutar` decimal(10,2) DEFAULT NULL,
  `odeme_tarihi` date DEFAULT NULL,
  `durum` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `performans`
--

CREATE TABLE `performans` (
  `id` int(11) NOT NULL,
  `sporcu_id` int(11) DEFAULT NULL,
  `stil` varchar(50) DEFAULT NULL,
  `derece` varchar(20) DEFAULT NULL,
  `tarih` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roller`
--

CREATE TABLE `roller` (
  `id` int(11) NOT NULL,
  `rol_adi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `roller`
--

INSERT INTO `roller` (`id`, `rol_adi`) VALUES
(1, 'Admin'),
(2, 'Sporcu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sporcular`
--

CREATE TABLE `sporcular` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `tc` varchar(11) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `dogum_tarihi` date DEFAULT NULL,
  `cinsiyet` varchar(10) DEFAULT NULL,
  `adres` text DEFAULT NULL,
  `takim_id` int(11) DEFAULT NULL,
  `kayit_tarihi` date DEFAULT NULL,
  `fotoğraf` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sporcular`
--

INSERT INTO `sporcular` (`id`, `ad`, `soyad`, `tc`, `telefon`, `dogum_tarihi`, `cinsiyet`, `adres`, `takim_id`, `kayit_tarihi`, `fotoğraf`) VALUES
(1, 'jhkjkjh', 'jkhkjhjhkj', NULL, '5455', '0000-00-00', NULL, NULL, 0, '2026-05-19', NULL),
(5, 'Test ', '03', NULL, '05555', '2001-10-30', NULL, NULL, 2, NULL, NULL),
(3, 'BERAT TALHA', 'ÇELİK', NULL, '05368967228', '2026-05-01', NULL, NULL, 0, NULL, NULL),
(4, 'asdasd', 'asdasd', NULL, '0555 555 55 55', '2026-05-04', NULL, NULL, 2, NULL, NULL),
(6, 'BERAT TALHA', 'ÇELİK', NULL, '05368967228', '2003-05-04', NULL, NULL, 0, '2026-05-26', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takimlar`
--

CREATE TABLE `takimlar` (
  `id` int(11) NOT NULL,
  `takim_adi` varchar(50) DEFAULT NULL,
  `antrenor_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `antrenorler`
--
ALTER TABLE `antrenorler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `devam`
--
ALTER TABLE `devam`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `havuzlar`
--
ALTER TABLE `havuzlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `performans`
--
ALTER TABLE `performans`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `roller`
--
ALTER TABLE `roller`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sporcular`
--
ALTER TABLE `sporcular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `takimlar`
--
ALTER TABLE `takimlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `antrenorler`
--
ALTER TABLE `antrenorler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `devam`
--
ALTER TABLE `devam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `havuzlar`
--
ALTER TABLE `havuzlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `performans`
--
ALTER TABLE `performans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `roller`
--
ALTER TABLE `roller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sporcular`
--
ALTER TABLE `sporcular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `takimlar`
--
ALTER TABLE `takimlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
