![HKI](https://img.shields.io/badge/Project-HKI-blue?logo=github&color=%23F7DF1E)
![CI4](https://img.shields.io/badge/-Codeigniter4-darkblue?style=flat&logo=Codeigniter)
![JS](https://img.shields.io/badge/Javascript-brown.svg?&style=flat&logo=javascript&logoColor=%23F7DF1E)
![JQUERY](https://img.shields.io/badge/JQuery-%23323330.svg?&style=flat&logo=jquery&logoColor=%23F7DF1E&color=FF3366)
![JSON](https://img.shields.io/badge/JSON-%23323330.svg?&style=flat&logo=json&logoColor=%23F7DF1E&color=9900FF)
![Bootstrap](https://img.shields.io/badge/-Bootstrap-purple.svg?&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/-PHP-darkgreen.svg?&logo=PHP&logoColor=white)
![MySQL](https://img.shields.io/badge/-MySQL-darkcyan.svg?style=flat&logo=mysql&logoColor=white)

# IBMAETER
<strong>IPR Project - Computer Programs</strong><br>
IBMAETER is a website that facilitates users in managing warehouse inventory activities and warehouse worker management. The features provided can maintain business performance while maintaining full control of stock inventory, item prices, item weight, and others that are presented quickly and in real time, so that users do not need to do all activities manually. Users also benefit in saving their time.

<br>

## Features / Framework / Tools
| Part | Description |
| --- | --- |
| Features | Login, Create, Read, Update, Delete, Pagination, Search, Validation, Print, Export, ETC |
| Framework | Bootstrap 4, CodeIgniter 4 |
| Tools | Visual Studio Code, XAMPP (PHP Version 7.4), Composer, Git |

<br>

## Download & Install
1.XAMPP with PHP version 7.4 :
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

## Database
1.Open XAMPP, then start the Apache & MySQL section. This aims to be able to support the website optimally.<br>
2.Access the browser first in order to open the database admin panel, please copy the following link:
```bash
localhost/phpmyadmin/
```
3.Create a database called "warehouse_db" on local.<br>
4.Open the "warehouse_db" database and Import the database (warehouse_db_default.sql) in the IBMAETER/public/sql directory.

<br>

## Default Account
| Role | Email | Password |
| --- | --- | --- |
| Admin | af@gmail.com | Superadmin123 |
| User | adeline@gmail.com | User123456 |

<br>

## Running
1.Download this repository.<br>
2.Then open the XAMP file (php.ini) -> remove semicolon (;) in front of extension=intl -> save.<br>
3.Open the "IBMAETER" directory, then open GitBash inside that directory.<br>
<ul>
    <li>First, if no error occurs then just skip this step, but if otherwise then please copy the following command:</li>
  
````bash
composer update --no-dev
````
<li>Secondly, then check whether there are any more problems or not, if there are still errors, just adjust to the situation.</li>
<li>Third, this step is mandatory, so please copy the following command:</li>

````bash
php spark serve
````
</ul>
4. Open your browser (New tab), then type -> localhost:8080 or customize the one on your GitBash.<br>
5. Please login and access the features, enjoy [Done].

<br><br>

## IBMAETER Project Team Members
| MEMBER | FULL NAME |
| --- | --- |
| 1 | Rizky Parlika, S.Kom., M.Kom. |
| 2 | Rifky Akhmad Fernanda, S.Kom. |
| 3 | Devan Cakra Mudra Wijaya, S.Kom. |
| 4 | Merdin Risalul Abrori, S.Kom. |
| 5 | Arista Pratama, S.Kom., M.Kom. |
| 6 | Lugito Michael Imanuel Prasetya, S.Kom. |

<br><br>

## LICENSE
BSD 3 Clause License

Copyright (c) 2023, Devan C. M. Wijaya, S.Kom.

Dissemination and use in source and binary form, with or without with or without modification, is allowed provided that the following conditions are met:


1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation, and/or other materials included with the distribution.

3. Neither the copyright holder's name nor the names of its contributors may be used to endorse or promote products derived from this software without prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. NEITHER THE COPYRIGHT HOLDER NOR THE CONTRIBUTORS SHALL BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING BUT NOT LIMITED TO PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND UNDER ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY FROM THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
