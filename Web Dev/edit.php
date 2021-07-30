<?php
include('config.php');
?>

	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['idps'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$idps = $_GET['idps'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM datapasien WHERE idps='$idps'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nikps					= $_POST['nikps'];
			$namaps					= $_POST['namaps'];
			$umurps					= $_POST['umurps'];
			$klmnps					= $_POST['klmnps'];
			$alamatps				= $_POST['alamatps'];
			$tglmskps				= $_POST['tglmskps'];
			$sttsps					= $_POST['sttsps'];
			$tglklrps				= $_POST['tglklrps'];
			$idps					= $_POST['idps'];

			$sql = mysqli_query($koneksi, "UPDATE datapasien SET nikps='$nikps', namaps='$namaps', umurps='$umurps', klmnps='$klmnps', alamatps='$alamatps', tglmskps='$tglmskps', sttsps='$sttsps', tglklrps='$tglklrps' WHERE idps='$idps'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index2.php?page=tampil_ps2";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index2.php?page=edit_ps&idps <?php echo $idps; ?>" method="POST">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="idps" class="form-control" size="4" value="<?php echo $data['idps']; ?>"  readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nik Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nikps" class="form-control" value="<?php echo $data['nikps']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="namaps" class="form-control" value="<?php echo $data['namaps']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Umur Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="umurps" class="form-control" value="<?php echo $data['umurps']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" name="klmnps" id="klmnps">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="Laki-Laki" <?php if ($klmnps == "Laki-Laki") echo "selected" ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if ($klmnps == "Perempuan") echo "selected" ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamatps" class="form-control" value="<?php echo $data['alamatps']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Masuk Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tglmskps" class="form-control" value="<?php echo $data['tglmskps']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status Kondisi Pasien</label>
				<div class="col-md-6 col-sm-6">
					<select name="sttsps" class="form-control" required>
						<option value="">Masukkan Status Anda</option>
						<option value="OTG" <?php if($data['sttsps'] == 'OTG'){ echo 'selected'; } ?>>Orang Tanpa Gejala (OTG) </option>
						<option value="PDP" <?php if($data['sttsps'] == 'PDP'){ echo 'selected'; } ?>>Pasien Dalam Pantauan (PDP) </option>
						<option value="ODP" <?php if($data['sttsps'] == 'ODP'){ echo 'selected'; } ?>>Orang Dalam Pantauan (ODP) </option>
					</select>
				</div>
			</div>
			<!-- <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status Kondisi Pasien</label>
				<div class="col-md-6 col-sm-6">
					<select name="sttsps" class="form-control" required>
						<option value="">Masukkan Status Anda</option>
						<option value="OTG">OTG</option>
						<option value="ODP">ODP</option>
						<option value="PDP">PDP</option>
					</select>
				</div>
			</div> -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Keluar Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tglklrps" class="form-control" value="<?php echo $data['tglklrps']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Sumbit" >
					<a href="index.php?page=tampil_ps2" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
