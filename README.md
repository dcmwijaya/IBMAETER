![HKI](https://img.shields.io/badge/Project-HKI-blue?logo=github&color=%23F7DF1E)
![CI4](https://img.shields.io/badge/-Codeigniter4-blue?style=flat&logo=Codeigniter)
![JS](https://img.shields.io/badge/Javascript%20-%23323330.svg?&style=flat&logo=javascript&logoColor=%23F7DF1E)
![JQUERY](https://img.shields.io/badge/JQuery%20-%23323330.svg?&style=flat&logo=jquery&logoColor=%23F7DF1E&color=FF3366)
![JSON](https://img.shields.io/badge/JSON%20-%23323330.svg?&style=flat&logo=json&logoColor=%23F7DF1E&color=9900FF)
![Bootstrap](https://img.shields.io/badge/-Bootstrap-purple.svg?&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/-PHP-grey.svg?&logo=PHP&logoColor=white)
![MySQL](https://img.shields.io/badge/-MySQL-tosca.svg?style=flat&logo=mysql&logoColor=white)

# IBMAETER
<b>Website inventaris barang gudang dan manajemen pekerja terpadu dengan menggunakan framework Codeigniter 4</b>
<p>Dibuat untuk pemenuhan tugas Final Project mata kuliah Pemrograman Framework C dan juga ditujukan untuk mendapatkan Hak Kekayaan Intelektual</p>

<br>

## Tools / Framework / Other
| Bagian | Keterangan |
| --- | --- |
| Fitur | Login, Create, Read, Update, Delete, Validation, Print, Export excel, Pagination, Search, ETC |
| Framework | Bootstrap 4, CodeIgniter 4 |
| Tools | Visual Studio Code, XAMPP (PHP Versi 7.4.16), Composer, Git |

<br>

## Environment
1. Download XAMPP
```bash
https://www.apachefriends.org/index.html
```
2. Download Visual Studio Code 
```bash
https://code.visualstudio.com/
```
3. Download Composer
```bash
https://getcomposer.org/
```
4. Download Git
```bash
http://git-scm.com/
```
5. Buat database dengan nama warehouse_db di local, ketikkan pada browser :
```bash
localhost/phpmyadmin/
```
6. Import database dengan nama warehouse_db_default.sql
7. Import semua trigger dan arahkan ke database warehouse_db yang sudah dibuat tadi di local (opsional).

<br>

## Install Codeigniter Melalui Composer
Install Codeigniter 4 dengan nama ibmaeter-ci4 melalui gitbash arahkan pada htdocs
```bash
composer create-project codeigniter4/appstarter ibmaeter-ci4
```

<br>

## Run Server
1. Pastikan masih berada di dalam folder ibmaeter-ci4 -> Klik kanan pilih gitbash lalu ketikkan :
```bash
$php spark serve
```
2. Buka XAMPP lalu start apache dan mysql
3. Buka browser anda (Tab baru) lalu ketikkan -> localhost:8080 atau sesuaikan yang ada pada gitbash

<br>

## Solusi Error Sewaktu Run Server
1. Ketiklah di gitbash seperti ini : composer update --no-dev
2. Lalu ketik di gitbash seperti ini : composer audit
3. Kemudian cek ada permasalahan lagi atau tidak, kalau semisal masih ada error tinggal menyesuaikan dengan keadaan saja.

<br>

## Akun untuk login
| Role | Email | Password |
| --- | --- | --- |
| Admin | tesla@gmail.com | Admin123 |
| Pekerja | kukun@gmail.com | User123 |

<br>

## Cara Menjalankan Web Secara Local
1. Download repository ini
2. Environment pastikan semua telah dilakukan -> Install Codeigniter 4 melalui gitbash
3. Lalu buka file XAMP (php.ini) -> hapus semicolon (;) didepan extension=intl ->save
4. Extract file yang di download tadi -> Copy & Paste isi folder yang di download tadi ke -> XAMP (htdocs) -> masuk kedalam folder ibmaeter-ci4 / jika belum ada buat dulu foldernya
5. Run Server
6. Login akun
7. Selesai, selamat menikmati

<br>

## Tim Mahasiswa
| NO | NAMA ANGGOTA TIM | NPM |
| --- | --- | --- |
| 1 | Devan Cakra Mudra Wijaya, S.Kom. | 18081010013 |
| 2 | Merdin Risalul Abrori, S.Kom. | 18081010081 |
| 3 | Rifky Akhmad Fernanda, S.Kom. | 18081010126 |

<br>

## Tim Dosen
| NO | NAMA ANGGOTA TIM |
| --- | --- |
| 1 | Rizky Parlika, S.Kom., M.Kom. |
| 2 | Arista Pratama, S.Kom., M.Kom. |
| 3 | Lugito Michael Imanuel Prasetya, S.Kom. |
