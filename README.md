# Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web

Membuat Website Marketplace sederhana.

**Luangkan waktu untuk membaca spek ini sampai selesai. Kerjakan hal yang perlu saja.**

## Deskripsi Singkat

Pada tugas besar ini, Anda diminta untuk membuat aplikasi *marketplace* **berbasis web** yang memungkinkan seorang pengguna membeli dan menjual barang. Untuk menggunakan aplikasi ini, pengguna harus login terlebih dahulu. Pengguna tersebut dapat membeli dan menjual barang dengan akun yang sama.

Anda diminta untuk membuat tampilan sedemikian hingga mirip dengan tampilan pada contoh. Website yang diminta tidak harus responsive. Desain tampilan tidak perlu dibuat indah. Icon dan jenis font tidak harus sama dengan contoh. Warna font, garis pemisah, dan perbedaan ukuran font harus terlihat sesuai contoh. Format harga dan waktu harus terlihat sesuai contoh. Perhatikan juga **tata letak** elemen-elemen.

## Anggota Tim

Setiap kelompok beranggotakan **3 orang**. Jika berlebih akan ada maksimal 2 kelompok yang beranggotakan 4 orang.

## Petunjuk Pengerjaan

1. Buatlah organisasi pada gitlab dengan nama sesuai dengan nama tim yang anda daftarkan.
2. Tambahkan anggota tim pada organisasi anda.
3. Fork pada repository ini dengan organisasi yang telah dibuat.
4. Ubah hak akses repository hasil Fork anda menjadi **private**.
5. Silakan commit pada repository anda (hasil fork). Lakukan berberapa commit dengan pesan yang bermakna, contoh: `fix css`, `create post done`, jangan seperti `final`, `benerin dikit`. Disarankan untuk tidak melakukan commit dengan perubahan yang besar karena akan mempengaruhi penilaian (contoh: hanya melakukan satu commit kemudian dikumpulkan). Sebaiknya commit dilakukan setiap ada penambahan fitur. **Commit dari setiap anggota tim akan mempengaruhi penilaian.** Jadi, setiap anggota tim harus melakukan commit yang berpengaruh terhadap proses pembuatan aplikasi.
6. Edit file readme ini semenarik mungkin (gunakan panduan Markdown language), diperbolehkan untuk merubah struktur dari readme ini. (Soal tidak perlu dipertahankan).
7. Pada Readme terdapat tampilan aplikasi dan penjelasan mengenai pembagian tugas masing-masing anggota (lihat formatnya pada bagian **pembagian tugas**).
8. Merge request dari repository anda ke repository ini dengan format **Nama kelompok** - **NIM terkecil** - **Nama Lengkap dengan NIM terkecil** sebelum **Sabtu, 8 Oktober 2016 23.59**.


## Tools

1. Untuk backend, wajib menggunakan **PHP** tanpa framework apapun.
2. Gunakan **MySQL** untuk menyimpan data.
3. Untuk frontend, gunakan Javascript, HTML dan CSS. **Tidak boleh** menggunakan library atau framework CSS atau JS seperti JQuery atau Bootstrap. CSS sebisa mungkin ada di file yang berbeda dengan PHP (tidak inline styling).

## Spesifikasi

### Login

![](mocks/login.jpg)

Pengguna dapat melakukan login sebagai user. Login hanya membandingkan username dan password saja, dan tidak perlu proteksi apapun. Halaman ini merupakan halaman pertama yang dibuka oleh pengguna ketika menjalankan aplikasi. Tidak ada proses otentikasi apakah pengguna sudah login atau belum dalam page lainnya. Identitas pengguna yang sedang login diberikan melalui HTTP GET pada URL (sebagai contoh: /catalog.php?id_active=2 menandakan bahwa pengguna yang sedang login memiliki id pengguna = 2).

### Register

![](mocks/register.jpg)

Pengguna dapat mendaftarkan diri sebagai user agar dapat menggunakan aplikasi ini. Hanya terdapat **satu** jenis user, yaitu user yang dapat membeli sekaligus menjual barang. Anda harus melakukan validasi bahwa email dan username yang sama tidak boleh digunakan untuk dua kali mendaftar. Setelah selesai register, otomatis masuk ke halaman Catalog dengan keadaan sudah login.

### Catalog

![](mocks/catalog.jpg)

Catalog merupakan halaman utama yang ditampilkan ketika user telah login. Catalog menampilkan list barang yang dijual oleh seluruh pengguna. Barang-barang tersebut ditampilkan terurut dimulai dari barang yang baru ditambahkan.

Perlu diperhatikan, tulisan di atas tombol logout memiliki format "Hi, <<username>>!". Selanjutnya, terdapat menu bar yang menampilkan 5 menu utama seperti pada gambar. Menu yang sedang dibuka diberikan warna background yang berbeda sebagai penanda halaman apa yang sedang dibuka pengguna.

Lalu, terdapat search bar. Pengguna dapat mencari barang dengan melakukan search ke `username (store)` atau `nama barang (product)` sesuai dengan pilihan pada radio button di bawah search bar.

Pada list barang, pengguna dapat membeli (buy) dan menyukai (like) barang. Terdapat juga informasi jumlah like dan jumlah barang tersebut yang sudah laku (purchased). 

Ketika pengguna menekan tombol like, halaman tidak boleh refresh dan jumlah like akan berubah dan tersimpan ke basis data. **Fungsionalitas Like diimplementasi dengan menggunakan AJAX**. Selain itu, tulisan like akan berubah menjadi **Liked** dan **berubah warna menjadi merah**. Jumlah like akan berubah sesuai dengan banyaknya like pada basis data (jadi tidak asal nambah satu saja). Hal tersebut juga berlaku sebaliknya (unlike). Unlike dapat dilakukan dengan menekan tombol Liked.

Ketika pengguna menekan tombol buy, pengguna akan menuju halaman confirmation purchase.

### Confirmation Purchase

![](mocks/confirmation_purchase.jpg)

Pada halaman ini, pengguna harus mengisi identitas terkait pengiriman barang. Pada field selain credit card number, sudah terisi sesuai dengan data pengguna namun tetap dapat diubah. Untuk field quantity memiliki nilai default 1. Total harga otomatis dihitung dengan menggunakan javascript. Lakukan konfirmasi pembelian terlebih dahulu dengan javascript, seperti “Apakah data yang anda masukan benar?”. Setelah mengkonfirmasi, pengguna akan diarakahkan ke halaman *Purchases*.

### Your Products

![](mocks/your_products.jpg)

Halaman ini berisikan list barang yang dijual oleh pengguna. Pada menu ini, pengguna dapat melakukan edit dan delete pada barang. Untuk delete, lakukan konfirmasi penghapusan terlebih dahulu dengan javascript.

### Add Product

![](mocks/add_product.jpg)

Pengguna dapat menambahkan barang yang ingin dijual. Gunakan HTTP POST.  *Redirect* ke halaman *Your Products* setelah selesai menambahkan.

### Edit Product

![](mocks/edit_product.jpg)

Pengguna dapat mengubah info barang yang sudah dibuat. Form yang digunakan memiliki tampilan yang sama dengan form untuk add product, namun field-field yang ada sudah terisi. Gunakan HTTP POST. Untuk memudahkan pengerjaan, gambar tidak dapat diganti. *Redirect* ke halaman *Your Products* setelah selesai merubah.

### Sales

![](mocks/sales.jpg)

Halaman ini berisi histori penjualan barang yang dijual oleh pengguna. Apabila data barang tersebut diubah/dihapus, tidak mempengaruhi histori (tetap seperti pada data ketika dilakukan pembelian).

### Purchases

![](mocks/purchases.jpg)

Halaman ini berisi histori pembelian barang oleh pengguna. Apabila data barang tersebut diubah/dihapus, tidak mempengaruhi histori (tetap seperti pada data ketika dilakukan pembelian).

### Validasi

Validasi **wajib** dilakukan pada *client-side*, dengan menggunakan **javascript** bukan HTML 5 input type, yaitu:
- Setiap field pada form tidak boleh kosong. Termasuk juga gambar barang ketika add product.
- Email harus sesuai format email.
- Harga harus integer.
- Khusus deskripsi pada add dan edit product, pastikan terdiri dari maksimal 200 karakter.
- Nilai dari Card Verification Value harus terdiri dari 3 digit.
- Nilai dari Credit Card harus terdiri dari 12 digit.

## Knowledge

Untuk meringankan beban tugas ini, ada berberapa keyword yang bisa anda cari untuk menyelesaikan tugas ini.
- CSS: margin, padding, header tag, font-size, text-align, float, clear, border, color, div, span, placeholder, anchor tag.
- Javascript : XMLHTTPRequest.
- PHP: mysqli_connect, mysql_query, $_GET, $_POST, var_dump, print_r, echo, require, fungsi header.
- SQL query: SELECT, INSERT, UPDATE, DELETE, WHERE, operator LIKE.
Jika ada pertanyaan silakan tanyakan lewat milis.

### Pembagian Tugas
*Disarankan semua anggota kelompok mengerjakan tampilan dan fungsionalitasnya. Bukan hanya tampilan atau fungsionalitasnya saja*

**Tampilan**
1. Login : 135130xx, 135130xx
2. Register : 135130xx
3. Lanjutkan ...

**Fungsionalitas**
1. Login : 135130xx, 135130xx
2. Register : 135130xx
3. Fungsionalitas : 135130xx,135130xx
4. Lanjutkan...

## About

Asisten IF3110 2016

Adin | Chairuni | David | Natan | Nilta | Tifani | Wawan | William

Dosen : Yudistira Dwi Wardhana | Riza Satria Perdana

