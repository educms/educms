CMS ini didesign untuk website sekolah baik SD SMP maupun SMA sederajat, dengan beberapa fitur pada umumnya yakni:
                        <ul>
                          <li><b>Post</b> : untuk membuat berita atau artikel</li>
                          <li><b>Page</b> : untuk membuat halaman</li>
                          <li><b>Slider</b> : untuk menambahkan gambar bergerak (slide) pada halaman utama website</li>
                          <li><b>Link</b> : untuk menambahkan situs penting</li>
                          <li><b>Media Sosial</b> : untuk menambahkan url media sosial sekolah (Facebook,Twitter,Youtube, dll..)</li>
                          <li><b>Photo Gallery</b> : untuk menambahkan album foto kegiatan/ foto lainnya</li>
                          <li><b>Video</b> : untuk menambahkan video kegiatan/ video lainnya, hanya tersedia untuk url youtube saja.</li>
                          <li><b>Staf dan Tenaga Pendidik</b> : untuk menambahkan list/daftar biodata dari staf dan tenaga pendidik</li>
                          <li><b>Peserta Didik</b> : untuk menambahkan list/daftar biodata dari peserta didik</li>
                          <li><b>Alumni</b> : untuk menambahkan list/daftar biodata dari alumni</li>
                        </ul>
                        Selain fitur diatas anda juga bisa membuat dan mengubah menu secara mandiri di <b>Menu Editor</b>. selain itu juga anda juga bisa merubah nama website, no.telp, alamat email, tema website dan juga logo website di konfigurasi <b>General</b>.
                        <p>CMS ini akan kami kembangkan secara berkala sesuai dengan perkembangan sekolah. apabila anda ingin ikut usul apa saja yang harus dikembangkan. silahkan bisa Whatsapp ke nomor <b>+6281334430992</b> atau email ke <b>educmsofficial@gmail.com</b></p>
                        Apabila anda ingin donasi sebagai bentuk support pengembangan CMS ini, bisa dikirimkan ke Rekening:<br />
                          <ul>
                            <li><b>BCA</b> A.n AH HANDOYO <b>0100076934</b></li>
                            <li><b>BRI</b> A.n AH HANDOYO <b>631101014954533</b></li>
                            <li><b>BTN</b> A.n AH HANDOYO <b>022301500044342</b></li>
                            <li><b>BANK JATIM</b> A.n AH HANDOYO <b>0176016795</b></li>
                          </ul>
                          CMS ini bisa didapatkan dengan gratis di github kami <a href="https://github.com/educms/educms" target="_blank">EDUCMS</a>

<p><br />
=====================================================<br />
<b>Langkah Instalasi (Pemasangan CMS)</b></br>
=====================================================<br />
<b>- Membuat dan Unggah Database</b>
<ol>
<li>Buat Database di DBMS MYSQL kalian bisa lewat PHPMyAdmin atau menggunana Mysql CLI</li>
<li>Unggah File educms.sql ke database yang sudah dibuat tadi</li>
</ol><br />
<b>- Setting Project EduCMS</b>
<ol>
<li>Pindahkan Project EduCMS ke Webserver anda baik local maupun online</li>
<li>
Ubah Koneksi database anda sesuai dengan database dan username mysql anda, untuk mengubahnya ada dua file yang harus diubah. yang pertama file .env ubah pada baris ini:
<br />
<b>DB_HOST=localhost</b><br />
<b>DB_PORT=3306</b><br />
<b>DB_DATABASE=nama_database</b><br />
<b>DB_USERNAME=username_mysql</b><br />
<b>DB_PASSWORD=password_mysql</b>,<br >
yang kedua ubah file database.php di folder config, ubah pada baris ini<br />
<b>'host' => env('DB_HOST', 'localhost'),</b><br />
<b>'port' => env('DB_PORT', '3306'),</b><br />
<b>'database' => env('DB_DATABASE', 'nama_database'),</b><br />
<b>'username' => env('DB_USERNAME', 'username_mysql'),</b><br />
<b>'password' => env('DB_PASSWORD', 'password_mysql'),</b><br />
</li>
<li>Ubah Base URL EduCMS, ini dilakukan untuk membedakan project anda dipasang di webserver local atau online. ubah file educms_config.php pada folder config, dan ubah pada baris: <br />
<b>'base_url_educms' => '/educms01/'</b> untuk "<b>educms01</b>" bisa diganti dengan "<b>/</b>" apabila diletakkan diwebserver online, kalau hanya dilocal cukup ganti dengan nama folder anda.
</li>
</ol>
</p>
