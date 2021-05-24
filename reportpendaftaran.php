<?php
    //menghubungkan ke file koneksipendaftaran.php
    include('koneksipendaftaran.php');

    //menghubungkan ke file autoload.inc.php
    require_once("dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    //mengambil data dari tabel pendaftaran
    $query = mysqli_query($koneksi, "SELECT * FROM pendaftaran");

    //membuat header
    $html = '<center><h3>Daftar Peserta Didik</h3></center></br>';

    //membuat kolom pada tabel
    $html = '<table border="1" width="100%">
        <tr>
        <th>No</th>
        <th>Jenis Pendaftaran</th>
        <th>Tanggal Masuk Sekolah</th>
        <th>NIS</th>
        <th>No. Ujian</th>
        <th>Pernah Paud</th>
        <th>Pernah TK</th>
        <th>No. SKHUN</th>
        <th>No. Ijazah</th>
        <th>Hobi</th>
        <th>Cita-Cita</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>NISN</th>
        <th>NIK</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Berkebutuhan Khusus</th>
        <th>Alamat</th>
        <th>RT</th>
        <th>RW</th>
        <th>Dusun</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Kode Pos</th>
        <th>Tempat Tinggal</th>
        <th>Modal Transportasi</th>
        <th>No. HP</th>
        <th>Email</th>
        <th>Penerima KPS/PKH/KIP</th>
        <th>No. KPS/KKS/PKH/KIP</th>
        <th>Kewarganegaraan</th>
        <th>Negara</th>
        </tr>';
        $no = 1;

    //mencetak isi database
    while($row = mysqli_fetch_array($query)){
        $html .= "<tr>
        <td>".$no."</td>
        <td>".$row['jenis_pendaftaran']."</td>
        <td>".$row['tgl_msk']."</td>
        <td>".$row['nis']."</td>
        <td>".$row['no_ujian']."</td>
        <td>".$row['paud']."</td>
        <td>".$row['tk']."</td>
        <td>".$row['skhun']."</td>
        <td>".$row['ijazah']."</td>
        <td>".$row['hobi']."</td>
        <td>".$row['cita2']."</td>
        <td>".$row['nama']."</td>
        <td>".$row['jenis_kelamin']."</td>
        <td>".$row['nisn_sekarang']."</td>
        <td>".$row['nik']."</td>
        <td>".$row['tempat_lahir']."</td>
        <td>".$row['tanggal_lahir']."</td>
        <td>".$row['agama']."</td>
        <td>".$row['berkebutuhan']."</td>
        <td>".$row['alamat']."</td>
        <td>".$row['rt']."</td>
        <td>".$row['rw']."</td>
        <td>".$row['dusun']."</td>
        <td>".$row['kelurahan']."</td>
        <td>".$row['kecamatan']."</td>
        <td>".$row['kode_pos']."</td>
        <td>".$row['tempat_tinggal']."</td>
        <td>".$row['transportasi']."</td>
        <td>".$row['no_hp']."</td>
        <td>".$row['email']."</td>
        <td>".$row['kps']."</td>
        <td>".$row['no_kps']."</td>
        <td>".$row['kewarganegaraan']."</td>
        <td>".$row['negara']."</td>
        </tr>";
        $no++;
    }

    $html .= "</html>";
    $dompdf->loadhtml($html);
    
    //setting ukuran dan orientasi kertas
    $dompdf->setPaper('A1', 'landscape');

    //rendering dari html ke pdf
    $dompdf->render();

    //melakukan output file pdf
    $dompdf->stream('laporan_daftarpesertadidik.pdf')
?>