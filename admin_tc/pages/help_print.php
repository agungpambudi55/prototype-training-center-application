<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=about.doc");
?>
<?php
session_start();
require_once "ceklogin.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
label{ border-bottom:3px solid gray; font-weight:bold; display:block; font-size:18px; padding:5px 0px 5px 0px; margin:0px 0px 20px 0px}
.page{border:0px solid gray; padding:0px; margin:0;}
</style>
<body>
  
    
<div align="center"<font size="5"><font face="Georgia, Times New Roman, Times, serif">TRAINING CENTER EEPIS</font></font></div><br />
<hr style="color:#666;" />
Aplikasi ini adalah suatu alat yang diciptakan untuk mempermudah hubunganya dalam layanan training. Diciptakan oleh siswa SMKN 1 Jenangan yang Praktek industri di PENS.
<br /><br /><br />
<b>Algoritma Training Center EEPIS</b>
<br /><br />
System ini berjalan dengan alur sebagai berikut:
<ol>
<li>Admin harus menentukan kategori pelatihan</li>
<li>Menentukan  jenis peserta pelatihan</li>
<li>Menentukan Nama pelatihan</li>
<li>Menentukan Judul Pelatihan </li>
<li>Menentukan Biaya dan jenis peserta</li>
<li>Menentukan Tempat pelatihan</li>
<li>Menentukan Instruktur pelatihan</li>
<li>Menentukan Jadwal pelatihan </li>
<li>Kemudian Menerbitkan jadwal training lewat website dan yang lainnya</li>
<li>Setelah itu peserta datang,dalam hal ini masuk tahap registrasi dan disodori formulir pendaftaran</li>
<li>Kemudian setelah melengkapi data-data pendaftaran, peserta membayar sesuai dengan jenis peserta perjudul</li>
<li>Kemudian apabila jumlah peserta sudah memenuhi minimal, pendaftaran ditutup 
<li>Pembagian Kelas</li>
<li>Kemudian diadakan training sesuai jadwal yang telah ditentukan</li>
<li>Kemudian dihari pelatihan diberi absen peserta dan absen instruktur </li>
<li>Pelatihan diseleseikan  sesuai jumlah hari yang telah ditentukan </li>
<li>Setelah 1 jadwal pelatihan telah terselenggara, hasil dari pelatihan pun muncul yaitu berupa sertifikat yang telah ditetapkan sebelumnya</li>
<li>Kemudian system ini juga ada rekapan bulanan, dari keuangan, jumlah peserta dan jumlah jadwal yang telah terjadwal selama satu bulan </li>
<li>Disytem ini juga disediakan history peserta pelatihan</li>
</ol>
</p>
<br /><br /><br /><br /><br /><br />
Untuk lebih jelasnya silahkan cari di menu help yang telah disediakan.<br /><br /><br /><br />
<span style="display:block; font-size:18px; font-weight:bold" id="pela">A. PELATIHAN</span><br />

<p class="page" id="kategori">
<label>1. Kategori Pelatihan</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Pada bagian ini. Seseorang harus menetapkan kategori dari pelatihan, hal ini dimasukkan untuk mengelompokan pelatihan supaya terstruktur dengan baik sehingga mempermudah dalam penetapan.
</p>

<p class="page" id="pelatihan">
<label>2. Pelatihan</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Dibagian ke dua ini adalah pelatihan. Fungsi tool ini adalah untuk memngelompokan judul sesuei dengan vendor masing-masing judul. Contoh : Pelatihan ORACLE, Java, dan lain-lain. Pada bagian form tambah pelatihan ada field <i><u>Kategori</u></i>, yang artinya sebelum Anda menentukan <i><u>pelatihan</u></i>, tentukan kategori. Setelah itu di Pelatihan inputkan nama pelatihan. Kemudian pada bagian <i><u>Keterangan</u></i> isikan keterangan tentang deskripsi nama pelatihan Anda.
</p>

<p class="page" id="jenis">
<label>3. Jenis Peserta Pelatihan</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Pada bagian ini harus menentukan jenis peserta pelatihan, hal ini dimasukan agar mempermudah dalam pengelompokan peserta. Dan pada tools ini dimasudkan juga agar dapat menentukan biaya perjudul sesuai jenis peserta. Pada form ini hanya terdapat field <i><u>Jenis peserta</u></i> dan <i><u>Keterangan</u></i>. Disini Anda bisa memberi keterangan terserah Anda.
</p>

<p class="page" id="judul">
<label>4. Judul Pelatihan</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Sebelum mengisi form tambah judul Anda harus menentukan pelatihan dan setelahnya mengisi dengan lengkap form tambah judul. Saya kira Anda tidak kesulitan dalam melakukan pengisian
</p>

<p class="page" id="biaya">
<label>5. Biaya</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Biaya adalah untuk menentukan biaya pelatihan perjudul sesuai dengan jenis peserta. Pada form tambah jenis peserta ada field <i><u>Pelatihan</u></i>, yang artinya sebelum Anda menentukan biaya Anda diwajibkan memilih pelatihan kemudian memilih <i><u>judul</u></i> yang berdasarkan pelatihan yang dipilih kemudian Anda juga harus menentukan <i><u>Jenis Peserta</u></i> baru setelah Anda memilih semua, Anda boleh mengisi Biaya. Dan Simpan.
</p>

<p class="page" id="tempat">
<label>6. Tempat Pelatihan</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Tentu saja sebelum Anda menentukan jadwal pelatihan Anda harus menentukan tempat-tempat mana saja yang ingin menjadi tempat pelatihan.
</p>

<p class="page" id="jadwal">
<label>7. Jadwal Pelatihan</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Pada bagian ini, diisi apabila semua telah ditentukan. Mulai dari judul, tempat, instruktur, kelas dan lain-lain. Dalam pembuatan jadwal Anda harus menentukan pelatihan, judul, tanggal mulai sampai tanggal selesai, menentukan jam dan juga menetukan sertifikat pelatihan
Apabila anda ingin mencetak jadwal ,anda harus menentukan kapan jadwal itu dilaksanakan (Tanggal Mulai sampai Tanggal Selesai) dengan mengisi textbox yang sudah tersedia diatas, Setelah itu pilih cetak dengan Excel atau Pdf.
</p>

<p class="page" id="instruktur">
<label>8. Instruktur</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Instruktur adalah orang yang memberi pengarahan atau pembimbing kepada peserta training ini. Untuk itu anda harus menetukan daftar instruktur yang akurat. Isi instruktur dengan sebenarnya karena sebagai informasi bagi peserta.
</p>

<p class="page" id="kelas">
<label>9. Kelas</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Sistem kami menetapkan jadwal dahulu, baru membuka pendaftaran peserta dan apabila pendaftaran peserta sudah memenuhi peserta minimal di judul, baru peserta bisa dibuat kelas. Pembuatan kelas terletak di jadwal training view. Apabila judul tersebut jumlah minimal nya sudah terpenuhi maka dibagian aksi ada gambar <font color="#0033FF">anak panah</font> berwarna biru. Artinya judul tersebut siap dibuat kelas. Kemudian diklik akan dialihkan ke halaman pembagian kelas, kemudian check all peserta dan anda berhak menentukan jumlah maksimal di kelas dengan memilih jumlah peserta dalam kelas dan tekan tombol create kelas. Anda akan dialihkan ke halaman buat kelas. Disini ada field yang harus ditentukan. Pertama Anda harus menetukan nama kelas, kemudian tahun, kemudian pilih instruktur dan terakhir pilih tempat. Setelah semuanya OK , klik tombol submit. Dan kelas pun terbuat.
</p>

<br /><br /><br /><br /><br />
<span style="display:block; font-size:18px; font-weight:bold" id="peserta">B. PESERTA</span><br />

<p class="page" id="daftar">
<label>1. Daftar Peserta</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Pada bagian daftar ada 3 tahap, yang pertama pengisian data peserta, yang ke dua pilih judul, dan yang ke tiga adalah cetak kuitansi. Anda harus melengkapi data pertahap dengan lengkap.
</p>
<p class="page" id="formulir">
<label>2. Formulir Pendaftaran</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Formulir ini adalah berkas yang diberikan kepada calon peserta training supaya menuliskan identitas pribadi. Semua judul yang telah dibuat akan otomatis masuk ke bagian formulir sesuei kategori yang dipilih calon peserta. Ada fasilitas print formulir sehingga Anda tidak susah untuk membuat formulir pendaftaran.
Setelah data yang ada di formulir sudah selesai diisi peserta, Anda harus menginputkan data tersebut kepada system di bagian daftar peserta.
</p>
<p class="page" id="kwitansi">
<label>3. Kwitansi Peserta</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Bagian ini adalah daftar kwitansi yang telah dicetak dari pelatihan yang diikuti.
</p>
<p class="page" id="nilai">
<label>4. Status Nilai</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ini adalah bagian untuk memberi nilai kepada masing-masing peserta tiap judul. Anda harus memilih Pelatihan, judul pelatihan dan kelas. Kemudian baru daftar peserta yang ada dikelas akan tampil dan Anda tinggal memberi nilai.
</p>

<br /><br /><br /><br /><br />
<span style="display:block; font-size:18px; font-weight:bold" id="absen">C. ABSEN</span><br />

<p class="page" id="ab_pes">
<label>1. Absen Peserta</label>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Absen ini dikhususkan kepada peserta. Dan wajib diisi. Absen disini modelnya perhari sesuai jadwal masing-masing pelatihan.
</p>
<p class="page" id="ab_ins">
<label>2. Absen Instruktur</label>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Absen ini dikhususkan kepada instruktur. Dan wajib diisi. Absen disini modelnya perhari sesuai jadwal masing-masing pelatihan.
</p>


<br /><br /><br /><br /><br />
<span style="display:block; font-size:18px; font-weight:bold" id="laporan">D. LAPORAN</span><br />

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laporan ini sifatnya laporan perbulan dan Anda bisa cetak laporan pada bulan itu.


<br /><br /><br /><br /><br />
<span style="display:block; font-size:18px; font-weight:bold" id="bktm">E. BUKU TAMU</span><br />

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buku tamu digunakan sebagai kontak dari pengunjung web yang dionlinekan. Anda dapat membalas pesan dari pengunjung web lewat menghubungi nomor telepon atau email dari pengirim, karena kami memberikan fasilitas tersebut. 

<br /><br /><br /><br /><br />

<span style="display:block; font-size:18px; font-weight:bold" id="ad_ter">F. PENGGUNA</span><br />

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang boleh menambahkan pengguna dan mengatur pengguna hanya Admin tertinggi.

<br /><br /><br /><br /><br />

<span style="display:block; font-size:18px; font-weight:bold" id="modhakakses">G. MODUL HAK AKSES</span><br />

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistem admin juga dilengkapi dengan hak akses. Nama modul diberikan sesuai dengan link modul, tetapi jika Anda menghendaki nama yang berbeda dari nama link modul, Anda tinggal mengeditnya. Hak Akses adalah tentang siapa yang diperbolehkan mengakses halaman tersebut. Apabila hak akses hanya Administrator saja, maka halaman tersebut hanya boleh diakses untuk admin tertinggi saja. Dan apabila hak akses tersebut Administrator dan Operator maka halaman tersebut selain bisa diakses oleh Admin juga boleh diakses oleh operator. Disini ada dua type yaitu sebagai administrator dan operator.
</body>
</html>