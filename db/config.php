<?php
session_start();

function base_url($url = null)
{
  $base_url = "http://localhost/pelayaran";
  if ($url != null) {
    return $base_url . "/" . $url;
  } else {
    return $base_url;
  }
}


function tgl($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
