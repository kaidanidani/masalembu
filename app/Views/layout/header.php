<?php
  if (session()->get('role') === 'admin') {
    echo view('layout/header_admin');
  } else {
    echo view('layout/header_user');
  }
?>
