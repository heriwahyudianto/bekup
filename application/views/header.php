<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pegawai</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
</head>
<body>
<nav class="navbar navbar-light bg-faded">
  <a class="navbar-brand" href="#">Kepegawaian</a>
  <ul class="nav navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('pegawai'); ?>">Pegawai <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Kota</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Posisi</a>
    </li>
  </ul>
  <?php echo form_open_multipart('pegawai', ['class' => 'form-inline pull-xs-right']); ?>
    <input class="form-control" type="text" placeholder="Cari" id="cari" >
    <button class="btn btn-outline-success" type="button" onclick="cari(document.getElementById('cari').value);">Cari</button>
  <?php echo form_close(); ?>
</nav>