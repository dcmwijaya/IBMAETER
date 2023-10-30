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
3.Git :
```bash
https://git-scm.com/download/win
```

<br>

## Basis data
1.Buka XAMPP, lalu tekan tombol mulai di bagian Apache & MySQL. Hal ini bertujuan untuk dapat mendukung website secara optimal.<br>
2.Akses peramban terlebih dahulu untuk membuka panel admin basis data, silakan salin tautan berikut:
```bash
localhost/phpmyadmin/
```
3.Buat basis data bernama "warehouse_db" di lokal.<br>
4.Buka basis data "warehouse_db" dan Impor basis data (warehouse_db_default.sql) di direktori IBMAETER/public/sql.<br>
5.Jika basis data tidak berfungsi dengan baik, Anda dapat mengimpor pemicu yang disediakan oleh pembuat aplikasi di direktori IBMAETER/public/sql/trigger.<br>
6.Kemudian buka berkas XAMP (php.ini) -> hapus titik koma (;) di depan extension=intl -> simpan.

<br>

## Akun Bawaan
| Peran | Surel | Kata Sandi |
| --- | --- | --- |
| Admin | af@gmail.com | Superadmin123 |
| User | adeline@gmail.com | User123456 |

<br>

## Menjalankan
1.Unduh repositori ini.<br>
2.Buka direktori "IBMAETER", lalu buka GitBash di dalam direktori tersebut.
<ul>
<li>Pertama, periksa apakah ada masalah atau tidak, jika masih ada kesalahan, sesuaikan saja dengan situasinya.</li>
<li>Kedua, langkah ini wajib dilakukan, jadi silakan salin perintah berikut ini:</li><br>

````bash
php spark serve
````
</ul>
3. Buka peramban Anda (Tab baru), lalu ketik -> localhost:8080 atau sesuaikan dengan yang ada di GitBash Anda.<br>
4. Silakan masuk dan akses fitur-fiturnya, selamat menikmati [Selesai].

<br><br>

## Sorotan
<img alt="menu home" src="https://github.com/devancakra/IBMAETER/assets/54527592/b5e21391-03bd-4383-ad51-ff568195b6eb"><br>
<img alt="menu kebijakan" src="https://github.com/devancakra/IBMAETER/assets/54527592/1f153c11-9bec-4410-8299-3482c6b76bf0"><br>
<img alt="menu waspada penipuan" src="https://github.com/devancakra/IBMAETER/assets/54527592/139ddd95-5e66-4ce5-90df-1836e569611c"><br>
<img alt="menu login" src="https://github.com/devancakra/IBMAETER/assets/54527592/7f4c8e7c-1680-44c0-bdcc-e8053563ed74"><br>
<img alt="menu dashboard-1" src="https://github.com/devancakra/IBMAETER/assets/54527592/505474f2-0470-48fa-96c3-9d688d6cef49"><br>
<img alt="menu dashboard-2" src="https://github.com/devancakra/IBMAETER/assets/54527592/c0a7f6cb-e2b1-4df0-af52-cf6bd7dcbc82"><br>
<img alt="menu tambah pekerja" src="https://github.com/devancakra/IBMAETER/assets/54527592/82002203-22e1-4e60-9e1b-1f0e3851a77f"><br>
<img alt="fitur edit pekerja" src="https://github.com/devancakra/IBMAETER/assets/54527592/631cd95a-417d-4753-9e3c-a5f70bc54bf8"><br>
<img alt="menu perizinan barang" src="https://github.com/devancakra/IBMAETER/assets/54527592/d2dcff65-b527-48fa-93d1-e4ad4cbbdaa7"><br>
<img alt="menu kelola barang" src="https://github.com/devancakra/IBMAETER/assets/54527592/48e56a4f-394a-46b3-ae9e-94e508f48366"><br>
<img alt="fitur print" src="https://github.com/devancakra/IBMAETER/assets/54527592/c8f4e484-fc07-43c2-80b2-60fc0091d326"><br>
<img alt="menu absensi" src="https://github.com/devancakra/IBMAETER/assets/54527592/541eeab4-2c09-46ed-bb1c-ee4567947007"><br>
<img alt="fitur user record" src="https://github.com/devancakra/IBMAETER/assets/54527592/dba734b5-9f92-43bb-9624-3e1bb54a450c"><br>
<img alt="menu ubah profile" src="https://github.com/devancakra/IBMAETER/assets/54527592/2bcd0723-6088-448c-b729-b79c20e5fee2"><br>
<img alt="menu pengumuman" src="https://github.com/devancakra/IBMAETER/assets/54527592/22b011c9-8bf2-479a-bd71-d7ff9f172457"><br>
<img alt="menu edit pengumuman" src="https://github.com/devancakra/IBMAETER/assets/54527592/e0c5762f-0645-419b-a1b9-893e2da9de35"><br>
<img alt="fitur pengumuman" src="https://github.com/devancakra/IBMAETER/assets/54527592/89a0b96b-b4b7-44d7-af30-d02346e6c764">

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

<br><br>

## LISENSI
Lisensi 3 Klausul BSD

Hak Cipta (c) 2023, Devan C. M. Wijaya, S.Kom.

Penyebarluasan dan penggunaan dalam bentuk sumber dan biner, dengan atau tanpa dengan atau tanpa modifikasi, diperbolehkan asalkan memenuhi persyaratan berikut:

1. Redistribusi kode sumber harus mempertahankan pemberitahuan hak cipta di atas, daftar ketentuan ini dan penafian berikut.

2. Redistribusi dalam bentuk biner harus mereproduksi pemberitahuan hak cipta di atas, daftar ketentuan ini dan penafian berikut dalam dokumentasi, dan/atau materi lain yang disertakan dengan distribusi.

3. Baik nama pemegang hak cipta maupun nama kontributornya tidak boleh digunakan untuk mendukung atau mempromosikan produk yang berasal dari perangkat lunak ini tanpa izin tertulis sebelumnya.

PERANGKAT LUNAK INI DISEDIAKAN OLEH PEMEGANG HAK CIPTA DAN KONTRIBUTOR "SEBAGAIMANA ADANYA" DAN SEGALA JAMINAN TERSURAT MAUPUN TERSIRAT, TERMASUK, NAMUN TIDAK TERBATAS PADA JAMINAN TERSIRAT ATAS KELAYAKAN UNTUK DIPERDAGANGKAN DAN KESESUAIAN UNTUK TUJUAN TERTENTU DITIADAKAN. PEMEGANG HAK CIPTA ATAU KONTRIBUTOR TIDAK BERTANGGUNG JAWAB ATAS KERUSAKAN LANGSUNG, TIDAK LANGSUNG, INSIDENTAL, KHUSUS, CONTOH, ATAU KONSEKUENSIAL (TERMASUK NAMUN TIDAK TERBATAS PADA PENGADAAN BARANG ATAU JASA PENGGANTI; KEHILANGAN PENGGUNAAN, DATA, ATAU KEUNTUNGAN; ATAU GANGGUAN BISNIS) BAGAIMANAPUN PENYEBABNYA DAN BERDASARKAN TEORI PERTANGGUNGJAWABAN APA PUN, BAIK DALAM KONTRAK, PERTANGGUNGJAWABAN YANG KETAT, ATAU KESALAHAN (TERMASUK KELALAIAN ATAU LAINNYA) YANG TIMBUL DENGAN CARA APA PUN DARI PENGGUNAAN PERANGKAT LUNAK INI, MESKIPUN TELAH DIBERITAHUKAN TENTANG KEMUNGKINAN KERUSAKAN TERSEBUT.
