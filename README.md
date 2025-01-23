# Form Contact Us Menggunakan API

## Deskripsi Proyek
Sebuah projek untuk fitur contact us yang dikirim melalui API. 
- Terdapat 2 folder, [form-pesan-server] dan [form-pesan-client] yang masing-masing merupakan sebuah website terpisah.
- form berada pada web [form-pesan-client] , yang menjadi frontend untuk user/customer/client mengirim sebuah pesan.
- Data pesan akan dikirim dan disimpan pada database yang ada pada web [form-pesan-server]. Dimana web ini yang akan digunakan oleh admin , terdapat dashboard yang akan menampilkan pesan yang ada pada database.   

## Fitur Utama
- **Form Contact Us pada web [form-pesan-client]**
- **API call untuk membuat Pesan ke database**
- **Dashboard admin pada web [form-pesan-server]**
  
## Teknologi yang Digunakan
- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: Bootstrap 5
- **Language**: PHP, HTML, CSS, JavaScript
- **API**: REST API, HTTP POST Method 
---

## Cara setup projek agar bisa dijalankan
- Terdapat 2 project yang perlu di setup
- Pastikan sudah menginstal composer 
- Download projek ini sebagai zip
- Ekstrak file projek
  
**Form-Pesan-Server**
- Di folder projek, masuk ke folder [form-pesan-server], buka terminal dan jalankan perintah 'composer install'
- Ubah nama file .env.example menjadi .env
- Pada .env, ubah settingan nya sesuai dengan apa yang akan digunakan (seperti db_name, username, host, password dsb.)
- Jika sudah, untuk default, projek ini sudah dapat dijalankan dengan mengetikan artisan command "php artisan serve --port=8080".
- namun port dapat disesuiakn dengan bagaimana anda akan memanggil url endpoint pada [form-pesan-client].
- Dan ada dapat mengubah route endpoint yang dapat dipanggil pada file api.php di folder routes.

**Form-Pesan-Client**
- Di folder projek, masuk ke folder [form-pesan-client], buka terminal dan jalankan perintah 'composer install'
- Ubah nama file .env.example menjadi .env
- Pada .env, settingan database tidak perlu diperhatikan. 
- Jika sudah, projek sudah dapat dijalankan dengan mengetikan artisan command "php artisan serve".
- Anda dapat mengatur link endpoint yang mau dipanggil/digunakan pada file ContactController di folder controller, pastikan url sesuai dengan diport mana anda menjalankan [form-pesan-server].


