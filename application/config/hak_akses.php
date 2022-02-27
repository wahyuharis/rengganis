<?php
/*
HAK AKSES JABATAN
Hak akses jabatan disimpan di tabel _jabatan, buat nambahin jabatan tambahin aja di tabelnya
terus masukin nama_jabatan -nya disini

caranya
$config[nama_jabatan(varchar)]=array(
    allow_url(varchar),
    allow_url(varchar),
    allow_url(varchar),
)

allow url yang singkat misal '/jabatan/' maka url dibelakangnya akan di allow juga
misal '/jabatan/add','/jabatan/edit', dst

*/
$config['admin'] =  array(
    '/jabatan/'
);
