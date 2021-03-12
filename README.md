
<p align="center">
<img src="https://img.shields.io/badge/Maintained%3F-yes-green.svg?style=flat-square">
</p>


# 🤔 Apa Itu Codefy?
Codefy merupakan website e-learning screencast dengan menggunakan framework laravel 8, dengan fitur yang lengkap seperti enroled course, showcase project, submission project,  quiz per course nya, wesbite multilanguage [ Maintenance / Masih Dalam Tahap Development ]

# 🤗 Apa Saja Yang Ada?
Codefy memiliki fitur fitur yang sangat keren antaranya : 
1. Enroled Courses
2. Submission Course
3. Quiz
4. Interaktif Course
5. Showcase Your Projects
6. Dan Lainnya

# 🙇 Bagaimana Cara Install Nya?
## Server Required
   1. PHP >= 7.3 || 8.0
   2. Composer
   3. BCMath PHP Extension.
   4. C Type PHP Extension.
   5. JSON PHP Extension.
   6. Mbstring PHP Extension.
   7. penSSL PHP Extension.
   8. PDO PHP Extension.
   9. Tokenizer PHP Extension.
   10. XML PHP Extension.
## Install Codefy
   1. Clone repository nya
      ```
      git clone https://github.com/antowrnto/codefy.git
      ```
   2. Install vendor dependencies
      ```
      composer install && composer upgarade
      ```
   3. Install node moduls untuk tailwind CSS<br/>
       Menggunakan NPM
       ```
       npm install && npm run dev
       ```
       Menggunakan YARN
       ```
       yarn && yarn run dev
       ```
   4. Buat database nyaa di phpmyadmin atau sejensinya<br/>
        Masukan username dan database name di  ``` .env ```<br/>
        Buka Command line<br/>
           ```
           cd PATH_TO_PROJECT
           ```
           ```
           php artisan migrate
           ```
   5. Starting development server
        ```
        php artisan serve
        ```
# 👮 Bagaimana Caranya Jadi Administrator?
  1. Kalian dapfar dulu seperti biasa di ``` https://YOUR_DOMAIN.com/register```
  2. Kalian buka command line </br>
     ``` 
      php artisan tinker 
     ``` 
     ```
     $user = User::find(YOUR_ID_IN_DATABASES)
     ```
     ```
     $user->assignRole('administrator')
     ```
  3. Selanjutnya kalian refresh browser kalian.
  4. Jika kalian tidak langsung redirect ke page role kalian access ``` https://YOUR_DOMAIN.com/administrator ```
  
  Dan sekarang anda adalah administrator.
  
  
# ☑ Todo Task
- [ ]    CRUD ALL DATA
- [ ]    PAYMENT GATEAWAY
- [ ]    INTEGRATION WITH MIDTRANS
- [ ]    UPDATE DETAIL ACCOUNT USER
- [ ]    TWO FACTOR AUTHENTICATION
- [x]    RRELATIONSHIP TABLE DATABASE
- [ ]    CHANGE UI PROFILE INFORMATION
- [x]    FOLLOWABLE USER
- [ ]    CREATE POST USER
- [ ]    LANDING PAGE
- [x]    FILE SYSTEM GOOGLE DRIVE

# 💤 Harus Di Perbaiki
- [x]    File System Dropbox

# 😎 Happy Coding And Learning

------------
Give Me Star For Support <br/>
Lets Contribute In This Repo<br/>
Project Owner by ♥️ ANTO WIRANTO
