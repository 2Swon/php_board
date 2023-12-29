-- phpMyAdmin SQL Dump
-- version 5.2
-- https://www.phpmyadmin.net/

-- 서버: 127.0.0.1 via TCP/IP
-- 서버 타입: MariaDB
 -- 서버 버전: 10.4.25-MariaDB - mariadb.org binary distribution
-- PHP 버전: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- 데이터베이스: `wonfirst`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `MEMBER`
--
CREATE TABLE MEMBER (
  NUM int(11) NOT NULL AUTO_INCREMENT,
  MEMBER_ID varchar(11) NOT NULL,
  PWD varchar(20) NOT NULL,
  NICKNAME varchar(20) NOT NULL,
  BIRTH_DATE date,
  acts varchar(20) NOT NULL DEFAULT 'USER',
  PRIMARY KEY(NUM)
);

--
-- 테이블의 덤프 데이터 `MEMBER`
--
INSERT INTO MEMBER VALUES()

-- --------------------------------------------------------

--
-- 테이블 구조 'BOARD'
--
CREATE TABLE BOARD (
  BOARD_ID int(11) NOT NULL AUTO_INCREMENT,
  BOARD_WRITER varchar(20) NOT NULL,
  BOARD_REVIEW varchar(100) NOT NULL,
  BOARD_CONTENT text NOT NULL,
  BOARD_WRITER_DATE datetime NOT NULL,
  BOARD_VIEW int(11) NOT NULL,
  PRIMARY KEY(BOARD_ID)
);

-- --------------------------------------------------------

--
-- 테이블 구조 'BOARD_REVIEW'
--
CREATE TABLE BOARD_REVIEW (
  BOARD_REVIEW_ID int(11) NOT NULL AUTO_INCREMENT,
  BOARD_ID int(11) NOT NULL,
  BOARD_REVIEW_WRITER varchar(20) NOT NULL,
  BOARD_REVIEW_CONTENT text NOT NULL,
  BOARD_REVIEW_DATE datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY(BOARD_REVIEW_ID)
);

