<?php
/*
HAK AKSES JABATAN
Hak akses jabatan disimpan di tabel _jabatan, buat nambahin jabatan tambahin aja di tabelnya
terus masukin nama_jabatan -nya disini

caranya
$config[nama_jabatan(varchar)]=array(
    blok_url(varchar),
    blok_url(varchar),
    blok_url(varchar),
)

url dengan isi /user/* maka url /user/add,/user/edit, dst akan di blok juga



*/
$config['admin'] =  array(
    '/user/',
    '/jabatan/'
);

