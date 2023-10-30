![HKI](https://img.shields.io/badge/Project-HKI-blue?logo=github&color=%23F7DF1E)
![CI4](https://img.shields.io/badge/-Codeigniter4-darkblue?style=flat&logo=Codeigniter)
![JS](https://img.shields.io/badge/Javascript-brown.svg?&style=flat&logo=javascript&logoColor=%23F7DF1E)
![JQUERY](https://img.shields.io/badge/JQuery-%23323330.svg?&style=flat&logo=jquery&logoColor=%23F7DF1E&color=FF3366)
![JSON](https://img.shields.io/badge/JSON-%23323330.svg?&style=flat&logo=json&logoColor=%23F7DF1E&color=9900FF)
![Bootstrap](https://img.shields.io/badge/-Bootstrap-purple.svg?&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/-PHP-darkgreen.svg?&logo=PHP&logoColor=white)
![MySQL](https://img.shields.io/badge/-MySQL-darkcyan.svg?style=flat&logo=mysql&logoColor=white)

# IBMAETER
<strong>Proyek HKI - Program Komputer</strong><br>
IBMAETER merupakan website yang memudahkan pengguna dalam mengelola kegiatan inventaris gudang dan manajemen pekerja gudang. Fitur-fitur yang disediakan dapat menjaga performa bisnis dengan tetap memegang kendali penuh atas stok persediaan barang, harga barang, berat barang, dan lainnya yang disajikan secara cepat dan real time, sehingga pengguna tidak perlu melakukan semua aktivitas secara manual. Pengguna juga diuntungkan dalam upaya penghematan waktu.

<br>

## Fitur / Kerangka Kerja / Peralatan
| Bagian | Deskripsi |
| --- | --- |
| Fitur | Masuk, Buat, Baca, Ubah, Hapus, Paginasi, Pencarian, Validasi, Cetak, Ekspor, DLL |
| Kerangka Kerja | Bootstrap 4, CodeIgniter 4 |
| Peralatan | Visual Studio Code, XAMPP (PHP Versi 7.4), Composer, Git |

<br>

## Unduh & Instal
1.XAMPP dengan PHP versi 7.4 :
```bash
https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.30/xampp-windows-x64-7.4.30-1-VC15-installer.exe/download
```
2.Visual Studio Code :
```bash
https://code.visualstudio.com/docs/?dv=win
```
3.Composer :
```bash
https://getcomposer.org/Composer-Setup.exe
```
4.Git :
```bash
https://git-scm.com/download/win
```

<br>

## Basis data
1.Buka XAMPP, lalu mulai bagian Apache & MySQL. Hal ini bertujuan untuk dapat mendukung website secara optimal.<br>
2.Akses peramban terlebih dahulu untuk membuka panel admin database, silakan salin tautan berikut:
```bash
localhost/phpmyadmin/
```
3.Buat basis data bernama "warehouse_db" di lokal.<br>
4.Buka basis data "warehouse_db" dan Impor basis data (warehouse_db_default.sql) di direktori IBMAETER/public/sql.

<br>

## Akun Bawaan
| Peran | Surel | Kata Sandi |
| --- | --- | --- |
| Admin | af@gmail.com | Superadmin123 |
| User | adeline@gmail.com | User123456 |

<br>

## Menjalankan
1.Unduh repositori ini.<br>
2.Kemudian buka berkas XAMP (php.ini) -> hapus titik koma (;) di depan extension=intl -> simpan.<br>
3.Buka direktori "IBMAETER", lalu buka GitBash di dalam direktori tersebut.<br>
<ul>
    <li>Pertama, jika tidak ada kesalahan yang terjadi maka lewati saja langkah ini, tetapi jika sebaliknya, silakan salin perintah berikut:</li>
  
````bash
composer update --no-dev
````
<li>Kedua, kemudian periksa apakah masih ada masalah atau tidak, jika masih ada kesalahan maka sesuaikan saja dengan situasinya.</li>
<li>Ketiga, langkah ini wajib dilakukan, jadi silakan salin perintah berikut ini:</li>

````bash
php spark serve
````
</ul>
4. Buka peramban anda (Tab baru), lalu ketik -> localhost:8080 atau sesuaikan dengan yang ada di GitBash anda.<br>
5. Silakan masuk dan akses fitur-fiturnya, selamat menikmati [Selesai].

<br><br>

## Anggota Tim Proyek IBMAETER
| ANGGOTA | NAMA LENGKAP |
| --- | --- |
| 1 | Rizky Parlika, S.Kom., M.Kom. |
| 2 | Rifky Akhmad Fernanda, S.Kom. |
| 3 | Devan Cakra Mudra Wijaya, S.Kom. |
| 4 | Merdin Risalul Abrori, S.Kom. |
| 5 | Arista Pratama, S.Kom., M.Kom. |
| 6 | Lugito Michael Imanuel Prasetya, S.Kom. |
