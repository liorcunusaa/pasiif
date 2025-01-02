<?php include 'test-header.php'; ?>
	<!-- About Us -->
	<section class="about" id="about">
		<div class="main">
			<img src="character1.jpg" alt="">
			<div class="about-text">
				<h1>About Us</h1>
				<h5>Pasiif</h5>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti incidunt harum libero natus maxime. Quis amet, cupiditate nulla nisi quae consequuntur autem sequi, dolorem doloremque placeat fugit reiciendis. Omnis, quibusdam.</p>
				<a href="about.php"><button type="button">Read More</button></a>
			</div>
			
		</div>
	</section>

	<!-- galeri -->
	<section class="galeri container-1" id="galeri">
		<h2>Galeri</h2>
	
		<div class="swiper mySwiper">
			<div class="swiper-wrapper">
					<?php
					$galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC LIMIT 8");
					if(mysqli_num_rows($galeri) > 0){
					while($p = mysqli_fetch_array($galeri)){
				?>
				<div class="swiper-slide">
					<img src="uploads/galeri/<?= $p['foto'] ?>" alt="" class="foto">
				</div>
					<?php }}else{ ?>
						Tidak ada data
						<?php } 
					?>	
			</div>
		</div>				
	</section>

	<!-- bagian daftar prestasi -->
	<section class="about-prestasi" id="prestasi">
		<div class="main-prestasi">
			<img src="character_juara.png" style="width: 300px" alt="">
			<div class="about-text-prestasi">
				<h1>Daftar Prestasi</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti incidunt harum libero natus maxime. Quis amet, cupiditate nulla nisi quae consequuntur autem sequi, dolorem doloremque placeat fugit reiciendis. Omnis, quibusdam.</p>
				<a href="detail-daftar_prestasi.php"><button type="button">Read More</button></a>
			</div>
			
		</div>
	</section>
	
	<!-- mahasiswa -->
	<?php include 'Mahasiswa/MahasiswaNew.php'; ?>

	<!-- bagian Matkul -->
	<section class="galeri container-1">
		<h2>Mata Kuliah</h2>
			<main class="table" id="customers_table">
            
        <!--tabel header  -->
        <section class="table__header">
        	<h1>Jadwal Matkul</h1>
            <div class="input-group">
              <input type="search" class="form-control" placeholder="Search Data...">
            </div>
        </section>

        <!-- tabel body -->
        <section class="table__body">
          <table>
            <thead>
              <tr>
                <th>No <span class="icon-arrow">&UpArrow;</span></th>
                <th>Gambar <span class="icon-arrow">&UpArrow;</span></th>
                <th>Nama Matkul <span class="icon-arrow">&UpArrow;</span></th>
                <th>Ruang <span class="icon-arrow">&UpArrow;</span></th>
                <th>Hari <span class="icon-arrow">&UpArrow;</span></th>
                <th>Waktu <span class="icon-arrow">&UpArrow;</span></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;

                $where = " WHERE 1=1 ";
                if(isset($_GET['key'])){
                  
									$where .= " AND nama LIKE '%".addslashes($_GET['key'])."%' ";
                }

                $matkul = mysqli_query($conn, "SELECT * FROM matkul $where ORDER BY id_matkul DESC");
                if(mysqli_num_rows($matkul) > 0){
                  while($p = mysqli_fetch_array($matkul)){
              ?> 
              <tr>
                <td><?= $no++ ?></td>
                <td><img class="rounded-circle flex-shrink-0" src="uploads/matkul/<?= $p['gambar'] ?>" alt="" style="width: 40px; height: 40px;"></td>
                <td><?= $p['nama_matkul'] ?></td>
                <td><?= $p['ruang'] ?></td>
                <td><?= $p['waktu'] ?></td>

                <?php
									if ($p['hari'] == "Senin") {
											echo '<td><p class="status delivered">' . $p['hari'] . '</p></td>';
									} elseif ($p['hari'] == "Selasa") {
											echo '<td><p class="status cancelled">' . $p['hari'] . '</p></td>';
									} elseif ($p['hari'] == "Rabu") {
											echo '<td><p class="status pending">' . $p['hari'] . '</p></td>';
									} elseif ($p['hari'] == "Kamis") {
											echo '<td><p class="status shipped">' . $p['hari'] . '</p></td>';
									} else {
											echo '<td><p class="status pending">' . $p['hari'] . '</p></td>';
									}
								?>

                </tr>
     		          <?php }}else{ ?>
                  	<tr>
                      <td colspan="5">Data tidak ada</td>
                    </tr>
                  <?php } ?>
             </tbody>
            </table>
          </section>
        </main>
	</section>

	<!-- bagian Informasi -->
	<section id="ancmt">

		<!-- Heading -->
		<div class="ancmt-heading">
			<h2>Informasi</h2>
		</div>

		<div class="ancmt-container">
			<?php
				$pengumuman = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC");
				if(mysqli_num_rows($pengumuman) > 0){
				while($j = mysqli_fetch_array($pengumuman)){
			?>
			<div class="ancmt-box">
				<div class="ancmt-img">
					<img src="uploads/informasi/<?= $j['gambar'] ?>" alt="">
				</div>

				<div class="ancmt-text">
          <span><?= $j['created_at'] ?> | Pasiif</span>
					<!-- <a href> -->
          <p class="ancmt-title"><?= $j['judul'] ?></p> 
          <a href="detail-informasi.php?id=<?= $j['id'] ?>">Read More</a>
        </div>
			</div>
		<?php }}else{ ?>
				Tidak ada data
		<?php } ?>
		</div>	
	</section>

	<!-- kontak -->
	<section class="contactUs" id="kontak">
		<div class="title">
			<h2>Get in Touch</h2>
		</div>
		
			<div class="box">
				<div class="contact form">
					<h3>Send a Massage</h3>
					<form action="">
						<div class="formBox">
							<div class="row50">
								<div class="inputBox">
									<span>First Name</span>
									<input type="text" placeholder="Masukkan Nama Depan">
								</div>
								<div class="inputBox">
									<span>Last Name</span>
									<input type="text" placeholder="Masukkan Nama Akhir ">
								</div>
							</div>
							<div class="row50">
								<div class="inputBox">
									<span>Email</span>
									<input type="text" placeholder="Masukkan Gmail">
								</div>
								<div class="inputBox">
									<span>Mobile</span>
									<input type="text" placeholder="Masukkan Nomor">
								</div>
							</div>
						
							<div class="row100">
								<div class="inputBox">
									<span class="mass">Massage</span>
									<textarea placeholder="Tulis Pesan Disini..."name="" id=""></textarea>
								</div>
							</div>

							<div class="row100">
								<div class="inputBox">
									<input type="submit" value="Send">
								</div>
							</div>		
					</div>
					</form>
				</div>

				<div class="contact info">
					<h3>Contact Info</h3>
					<div class="infoBox">
						<div>
							<span><ion-icon name="pin"></ion-icon></span>
							<p><?= $d->alamat ?></p>
						</div>
						<div> 
							<span><ion-icon name="mail"></ion-icon></span>
							<p><?= $d->email ?></p>
						</div>
						<div>
							<span><ion-icon name="call"></ion-icon></span>
							<p><?= $d->telepon ?></p><a href="">
						</div>
					</div>
				</div>

				<div class="contact map"><iframe src="<?= $d->google_maps ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
			</div>
			<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
			<!-- <div class="box">
				<div class="contact form"><b>Alamat :</b> <br><?= $d->alamat ?></div>
				<div class="contact info"><b>Telepon :</b> <br><?= $d->telepon ?></div>
				<div class="contact map"><b>Email :</b> <br><?= $d->email ?></div>
			</div> -->
			<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>	
	</section>


<?php include 'footer.php'; ?>