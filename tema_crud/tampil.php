<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Pasien</font></center>
		<hr>
		<a href="index.php?page=tambah_ps"><button class="btn btn-dark right" disabled="disabled" >Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>ID</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Umur</th>
					<th>Gender</th>
					<th>Alamat</th>
					<th>Masuk</th>
					<th>Kondisi</th>
					<th>Keluar</th>
					<!-- <th>Aksi</th> -->
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM datapasien ORDER BY idps DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['idps'].'</td>
							<td>'.$data['nikps'].'</td>
							<td>'.$data['namaps'].'</td>
							<td>'.$data['umurps'].'</td>
							<td>'.$data['klmnps'].'</td>
							<td>'.$data['alamatps'].'</td>
							<td>'.$data['tglmskps'].'</td>
							<td>'.$data['sttsps'].'</td>
							<td>'.$data['tglklrps'].'</td>
							
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
