<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$idps							= $_POST['idps'];
			$nikps 							= $_POST['nikps'];
			$namaps 						= $_POST['namaps'];
			$umurps 						= $_POST['umurps'];
			$klmnps							= $_POST['klmnps'];
			$alamatps 						= $_POST['alamatps'];
			$tglmskps 						= $_POST['tglmskps'];
			$sttsps							= $_POST['sttsps'];
			$tglklrps						= $_POST['tglklrps'];

			$cek = mysqli_query($koneksi, "SELECT * FROM datapasien WHERE idps='$idps'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO datapasien(idps, nikps, namaps, umurps, klmnps, alamatps, tglmskps, sttsps, tglklrps) VALUES('$idps', '$nikps', '$namaps', '$umurps', '$klmnps' , '$alamatps', '$tglmskps', '$sttsps', '$tglklrps')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index2.php?page=tampil_ps2";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, DATA sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambah2.php" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Pasien</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="idps" class="form-control" size="8" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nik Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nikps" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="namaps" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Umur Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="umurps" class="form-control" required>
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
			<!-- <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="klmnps" value="laki-laki" <?php if($data['klmnps'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="klmnps" value="perempuan" <?php if($data['klmnps'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div> -->
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Pasien</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamatps" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Masuk</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tglmskps" class="form-control" required>
				</div>
			</div>
			<!-- <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status Kondis</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Status" value="OTG" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Status" value="PDP" required>Perempuan
						</label>
					</div>
				</div>
			</div> -->
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status Kondisi Pasien</label>
				<div class="col-md-6 col-sm-6">
					<select name="sttsps" class="form-control" required>
						<option value="">Masukkan Status Anda</option>
						<option value="OTG">OTG</option>
						<option value="ODP">ODP</option>
						<option value="PDP">PDP</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Keluar</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tglklrps" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
