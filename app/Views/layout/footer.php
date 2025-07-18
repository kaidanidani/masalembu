<?php
  if (session()->get('role') === 'admin') {
    echo view('layout/footer_admin');
  } else {
    echo view('layout/footer_user');
  }
?>
