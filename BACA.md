![IPR](https://img.shields.io/badge/Project-IPR-blue?logo=github&color=%23F7DF1E)
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

<br><br>

## Fitur / Kerangka Kerja / Peralatan
| Bagian | Deskripsi |
| --- | --- |
| Fitur | Masuk, Buat, Baca, Ubah, Hapus, Paginasi, Pencarian, Validasi, Cetak, Ekspor, DLL |
| Kerangka Kerja | Bootstrap 4, CodeIgniter 4 |
| Peralatan | Visual Studio Code, XAMPP (PHP Versi 7.4), Git |

<br><br>

## Unduh & Instal
1. XAMPP dengan PHP versi 7.4 :

   ```bash
   https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.30/xampp-windows-x64-7.4.30-1-VC15-installer.exe/download
   ```
<br>

2. Visual Studio Code :

   ```bash
   https://code.visualstudio.com/docs/?dv=win
   ```
<br>

3. Git :
   
   ```bash
   https://git-scm.com/download/win
   ```

<br><br>

## Basis data
1. Buka ``` XAMPP ```, lalu tekan tombol mulai di bagian ``` Apache ``` & ``` MySQL ```. Hal ini bertujuan untuk dapat mendukung website secara optimal.

2. Akses ``` peramban ``` terlebih dahulu untuk membuka panel admin basis data, silakan salin tautan berikut: ``` localhost/phpmyadmin/ ```.
   
3. Buat basis data bernama ``` warehouse_db ``` di lokal.

4. Buka basis data ``` warehouse_db ``` dan Impor ``` warehouse_db_default.sql ``` di direktori ``` IBMAETER/public/sql ```.

5. Jika basis data tidak berfungsi dengan baik, anda dapat mengimpor ``` trigger ``` yang disediakan oleh pembuat aplikasi di direktori ``` IBMAETER/public/sql/trigger ```.

6. Kemudian buka berkas XAMPP: ``` php.ini ``` -> hapus ``` titik koma (;) ``` di depan ``` extension=intl ``` -> simpan.

<br><br>

## Akun Bawaan
| Peran | Surel | Kata Sandi |
| --- | --- | --- |
| Admin | af@gmail.com | Superadmin123 |
| User | adeline@gmail.com | User123456 |
| User | renaldyy@gmail.com | User123456 |

<br>

## Memulai
1. Unduh dan ekstrak repositori ini.

2. Buka direktori ``` IBMAETER ```, lalu buka ``` GitBash ``` di dalam direktori tersebut.
   
   • Pertama, periksa apakah ada masalah atau tidak, jika masih ada kesalahan, sesuaikan saja dengan situasinya.
   
   • Kedua, langkah ini wajib dilakukan, jadi silakan salin perintah berikut ini:
   
   ````bash
   php spark serve
   ````

3. Buka ``` peramban ``` anda (Tab baru), lalu ketik -> ``` localhost:8080 ``` atau sesuaikan dengan yang ada di ``` GitBash ``` anda.
   
4. Silakan masuk dan akses fitur-fiturnya, selamat menikmati [Selesai].

<br><br>

## Sorotan
<table>
<tr>
<th width="280">Beranda</th>
<th width="280">Kebijakan</th>
<th width="280">Waspada Penipuan</th>
</tr>
<tr>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/6082b9c1-a7e1-4996-b832-ecbf94b1c604" alt="home"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/f78f2ae3-ec19-46d7-b7bf-d3bfa14a6e34" alt="policies"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/d72f5366-0120-4be5-a5d2-56541f916067" alt="scam-alert"></td>
</tr>
</table>
<table>
<tr>
<th width="840">Masuk</th>
</tr>
<tr>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/11124e55-c517-4825-9bfd-330ac7e9efd8" alt="login"></td>
</tr>
</table>
<table>
<tr>
<th colspan="2">Dasbor</th>
</tr>
<tr>
<td width="420"><img src="https://github.com/devancakra/IBMAETER/assets/54527592/d794fb81-26df-4c34-9dfb-dc598e29d572" alt="dashboard-1"></td>
<td width="420"><img src="https://github.com/devancakra/IBMAETER/assets/54527592/8e4fe0fa-0aff-4167-afc1-9d76856ba7aa" alt="dashboard-2"></td>
</tr>
</table>
<table>
<tr>
<th width="280">Tambah Pekerja</th>
<th width="280">Ubah Pekerja</th>
<th width="280">Otorisasi Barang</th>
</tr>
<tr>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/052cacaa-ed28-4ec3-8495-16692459edaa" alt="add-workers"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/1798253b-a077-4c26-b770-b08583cd9946" alt="edit-workers"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/53631b43-d492-4d13-a432-ea3a270fb4ca" alt="item-authorization"></td>
</tr>
</table>
<table>
<tr>
<th width="280">Kelola Barang</th>
<th width="280">Fitur Cetak</th>
<th width="280">Absensi</th>
</tr>
<tr>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/9f9d0cb0-72de-467b-8ce6-164c8f060d8a" alt="manage-items"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/112edd8f-bb00-47ab-b636-c3b5a15d2622" alt="print-feature"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/e0127ed8-59f1-41c8-9eb5-8c8b4f626449" alt="attendance"></td>
</tr>
</table>
<table>
<tr>
<th width="280">Rekam Jejak Pengguna</th>
<th width="280">Ubah Profil</th>
<th width="280">Pengumuman</th>
</tr>
<tr>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/429b61ce-b9cc-4e48-a6ae-cd1d4eceac96" alt="user-track-record"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/25b13a23-3d4d-4384-9ff3-96fb4c7e318b" alt="edit-profile"></td>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/c7e48dfc-cd29-4421-a111-2bd583289340" alt="announcements"></td>
</tr>
</table>
<table>
<tr>
<th width="840">Ubah Pengumuman</th>
</tr>
<tr>
<td><img src="https://github.com/devancakra/IBMAETER/assets/54527592/fd955f5e-9ea5-4c57-b5ba-5f5cffa26cbe" alt="edit-announcements"></td>
</tr>
</table>

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

## Penafian
Aplikasi ini dibuat dengan menyertakan sumber-sumber dari pihak ketiga. Pihak ketiga di sini adalah penyedia layanan, yang layanannya berupa pustaka, kerangka kerja, dan lain-lain. Saya ucapkan terima kasih banyak atas layanannya. Telah terbukti sangat membantu dan dapat diimplementasikan.

<br><br>

## LISENSI
Lisensi 3 Klausul BSD

Hak Cipta (c) 2023, Devan C. M. Wijaya, S.Kom dkk

Penyebarluasan dan penggunaan dalam bentuk sumber dan biner, dengan atau tanpa dengan atau tanpa modifikasi, diperbolehkan asalkan memenuhi persyaratan berikut:

1. Redistribusi kode sumber harus mempertahankan pemberitahuan hak cipta di atas, daftar ketentuan ini dan penafian berikut.

2. Redistribusi dalam bentuk biner harus mereproduksi pemberitahuan hak cipta di atas, daftar ketentuan ini dan penafian berikut dalam dokumentasi, dan/atau materi lain yang disertakan dengan distribusi.

3. Baik nama pemegang hak cipta maupun nama kontributornya tidak boleh digunakan untuk mendukung atau mempromosikan produk yang berasal dari perangkat lunak ini tanpa izin tertulis sebelumnya.

PERANGKAT LUNAK INI DISEDIAKAN OLEH PEMEGANG HAK CIPTA DAN KONTRIBUTOR "SEBAGAIMANA ADANYA" DAN SEGALA JAMINAN TERSURAT MAUPUN TERSIRAT, TERMASUK, NAMUN TIDAK TERBATAS PADA JAMINAN TERSIRAT ATAS KELAYAKAN UNTUK DIPERDAGANGKAN DAN KESESUAIAN UNTUK TUJUAN TERTENTU DITIADAKAN. PEMEGANG HAK CIPTA ATAU KONTRIBUTOR TIDAK BERTANGGUNG JAWAB ATAS KERUSAKAN LANGSUNG, TIDAK LANGSUNG, INSIDENTAL, KHUSUS, CONTOH, ATAU KONSEKUENSIAL (TERMASUK NAMUN TIDAK TERBATAS PADA PENGADAAN BARANG ATAU JASA PENGGANTI; KEHILANGAN PENGGUNAAN, DATA, ATAU KEUNTUNGAN; ATAU GANGGUAN BISNIS) BAGAIMANAPUN PENYEBABNYA DAN BERDASARKAN TEORI PERTANGGUNGJAWABAN APA PUN, BAIK DALAM KONTRAK, PERTANGGUNGJAWABAN YANG KETAT, ATAU KESALAHAN (TERMASUK KELALAIAN ATAU LAINNYA) YANG TIMBUL DENGAN CARA APA PUN DARI PENGGUNAAN PERANGKAT LUNAK INI, MESKIPUN TELAH DIBERITAHUKAN TENTANG KEMUNGKINAN KERUSAKAN TERSEBUT.
