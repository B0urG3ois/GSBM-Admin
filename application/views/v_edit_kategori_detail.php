<!-- proses 29 (bengkel.php)-->

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<!-- Row -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Ubah Kategori Detail</h4>
						<h6 class="card-subtitle">Silahkan ubah <code> Kategori Detail</code> sesuai dengan yang
							Anda inginkan.</h6>
					</div>
					<hr class="m-t-0">
					<section class="content">
						<!-- dari variabel ['bengkel'] di controller -->
						<form action="<?php echo base_url().'bengkel/update_kategori_detail'; ?>" method="post"
							class="form-horizontal r-separator" enctype="multipart/form-data">
							<div class="card-body bg-light">
								<h4 class="card-title m-t-10 p-b-20">Informasi</h4>
								<?php foreach($kategori_detail as $ktg_dtl) { ?>
								
								<div class="form-group row align-items-center m-b-0">
									<label class="col-3 text-right control-label col-form-label">Nama Layanan / Onderdil</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<input type="text" name="Isi_Kategori" class="form-control"
											value="<?php echo $ktg_dtl->Isi_Kategori ?>">
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0">
									<label class="col-3 text-right control-label col-form-label">Kategori</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_Kategori" name="ID_Kategori" class="form-control">
											<?php
													$this->db->select('*');
													$this->db->from('kategori');
													$this->db->where("ID_Kategori", $ktg_dtl->ID_Kategori);
													$query = $this->db->get();
													foreach ($query->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_Kategori ?>" selected>
												<?php echo $ktg->Nama_Kategori ?>
											</option>
											<?php endforeach; 
												?>
											<?php
												$this->db->select('*');
												$this->db->from('kategori');
												$kategori = $this->db->get();
												foreach ($kategori->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_Kategori ?>">
												<?php echo $ktg->Nama_Kategori ?>
											</option>
											<?php endforeach; ?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<?php if ($ktg_dtl->ID_Kategori < 3) { ?>
								<div class="form-group row align-items-center m-b-0" id="JL">
									<label class="col-3 text-right control-label col-form-label">Jenis Layanan</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_JL" name="ID_JL" class="form-control">
											<?php
													$this->db->select('*');
													$this->db->from('saring_jenis_layanan');
													$this->db->where("ID_JL", $ktg_dtl->ID_JL);
													$query = $this->db->get();
													foreach ($query->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_JL ?>" selected>
												<?php echo $ktg->Nama_JL ?>
											</option>
											<?php endforeach; 
												?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>

								<!-- Onderil Edit -->
								<div class="form-group row align-items-center m-b-0" id="JO">
									<label class="col-3 text-right control-label col-form-label">Jenis Onderdil</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_JO2" name="ID_JO2" class="form-control">

										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0" id="MM">
									<label class="col-3 text-right control-label col-form-label">Merek Motor</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_MM2" name="ID_MM2" class="form-control">
											<option disabled selected>Merek Motor</option>
													<?php
                    											$saring_merek_motor = $this->db->get('saring_merek_motor');
		            											foreach ($saring_merek_motor->result() as $sMM) : ?>
                                                    <option value="<?php echo $sMM->ID_MM ?>">
                                                        <?php echo $sMM->Nama_MM ?>
                                                    </option>
                                                    <?php endforeach; ?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0" id="TM">
									<label class="col-3 text-right control-label col-form-label">Tipe Motor</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_TM2" name="ID_TM2" class="form-control">

										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0" id="MO">
									<label class="col-3 text-right control-label col-form-label">Merek Onderdil</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_MO22" name="ID_MO2" class="form-control">
											<option disabled selected>Merek Onderdil</option>
											<?php
                    								$kategori = $this->db->get('saring_merek_onderdil');
		            								foreach ($kategori->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_MO ?>">
												<?php echo $ktg->Nama_MO ?>
											</option>
											<?php endforeach; ?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<?php } else { ?>
								<!-- Layanan Edit -->
								<div class="form-group row align-items-center m-b-0" id="JL">
									<label class="col-3 text-right control-label col-form-label">Jenis Layanan</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_JL" name="ID_JL" class="form-control">
											<?php
													$this->db->select('*');
													$this->db->from('saring_jenis_layanan');
													$this->db->where("ID_JL", $ktg_dtl->ID_JL);
													$query = $this->db->get();
													foreach ($query->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_JL ?>" selected>
												<?php echo $ktg->Nama_JL ?>
											</option>
											<?php endforeach; 
												?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>

								<div class="form-group row align-items-center m-b-0" id="JO">
									<label class="col-3 text-right control-label col-form-label">Jenis Onderdil</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_JO" name="ID_JO" class="form-control">
											<?php
													$this->db->select('*');
													$this->db->from('saring_jenis_onderdil');
													$this->db->where("ID_JO", $ktg_dtl->ID_JO);
													$query = $this->db->get();
													foreach ($query->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_JO ?>" selected>
												<?php echo $ktg->Nama_JO ?>
											</option>
											<?php endforeach; 
												?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0" id="MM">
									<label class="col-3 text-right control-label col-form-label">Merek Motor</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_MM" name="ID_MM" class="form-control">

										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0" id="TM">
									<label class="col-3 text-right control-label col-form-label">Tipe Motor</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_TM" name="ID_TM" class="form-control">
											<?php
													$this->db->select('*');
													$this->db->from('saring_tipe_motor');
													$this->db->where("ID_TM", $ktg_dtl->ID_TM);
													$query = $this->db->get();
													foreach ($query->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_TM ?>" selected>
												<?php echo $ktg->Nama_TM ?>
											</option>
											<?php endforeach; 
												?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0" id="MO">
									<label class="col-3 text-right control-label col-form-label">Merek Onderdil</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<select id="ID_MO" name="ID_MO" class="form-control">
											<?php
													$this->db->select('*');
													$this->db->from('saring_merek_onderdil');
													$this->db->where("ID_MO", $ktg_dtl->ID_MO);
													$query = $this->db->get();
													foreach ($query->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_MO ?>" selected>
												<?php echo $ktg->Nama_MO ?>
											</option>
											<?php endforeach; 
												?>

											<?php
                    								$kategori = $this->db->get('saring_merek_onderdil');
		            								foreach ($kategori->result() as $ktg) : ?>
											<option value="<?php echo $ktg->ID_MO ?>">
												<?php echo $ktg->Nama_MO ?>
											</option>
											<?php endforeach; ?>
										</select>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<?php } ?>
								<div class="form-group row align-items-center m-b-0">
									<label class="col-3 text-right control-label col-form-label">Harga</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<input type="text" name="Harga_Kategori" class="form-control"
											value="<?php echo $ktg_dtl->Harga_Kategori ?>">
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0">
									<label class="col-3 text-right control-label col-form-label">Deskripsi</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<textarea rows="4" cols="50" type="text" name="Isi_Deskripsi" id="Isi_Deskripsi"
											class="form-control" value="<?php echo $ktg_dtl->Isi_Deskripsi ?>"><?php echo $ktg_dtl->Isi_Deskripsi ?></textarea>
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<div class="form-group row align-items-center m-b-0">
									<label class="col-3 text-right control-label col-form-label">Gambar / Foto</label>
									<div class="col-9 border-left p-b-10 p-t-10">
										<input type="hidden" name="Old_Gambar" class="form-control"
											value="<?php echo $ktg_dtl->Gambar_Isi_Kategori ?>">
										<input type="file" name="Gambar_Kategori" class="form-control">
										<!-- value = untuk nangkep dr database dan dimasukin ke dalem view edit -->
									</div>
								</div>
								<?php } ?>
							</div>
							<div class="card-body">
								<div class="form-group m-b-0 text-right">
									<a href="<?php echo base_url().'bengkel/LO'; ?>" class="btn btn-danger">Kembali</a>
									<button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
								</div>
							</div>
						</form>

						
					</section>
				</div>
			</div>
		</div>
		<!-- End Row -->
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right sidebar -->
		<!-- ============================================================== -->
		<!-- .right-sidebar -->
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script>
		window.onload = function () {

			var id_ktg = document.getElementById("ID_Kategori");
			var result_id_ktg = id_ktg.options[id_ktg.selectedIndex].value;

			if (result_id_ktg  < 3) {
				$("#JL").show();
				$("#JO").hide();
				$("#MM").hide();
				$("#TM").hide();
				$("#MO").hide();

				var id_jl = document.getElementById("ID_JL");
				var result_id_jl = id_jl.options[id_jl.selectedIndex].value;

				$.ajax({
					type: "POST",
					url: '<?php echo base_url() . 'bengkel/get_jenis_layanan2'; ?>',
					data: "ID_Kategori=" + result_id_ktg + "&ID_JL=" + result_id_jl,
					cache: false,
					success: function (msg) {
						$("#ID_JL").html(msg);
					}
				});
			} else if (result_id_ktg  > 2) {
				$("#JL").hide();
				$("#JO").show();
				$("#MM").show();
				$("#TM").show();
				$("#MO").show();

				var id_jo = document.getElementById("ID_JO");
				var result_id_jo = id_jo.options[id_jo.selectedIndex].value;

				var id_tm = document.getElementById("ID_TM");
				var result_id_tm = id_tm.options[id_tm.selectedIndex].value;

				$.ajax({
					type: "POST",
					url: '<?php echo base_url() . 'bengkel/get_jenis_onderdil2'; ?>',
					data: "ID_Kategori=" + result_id_ktg + "&ID_JO=" + result_id_jo,
					cache: false,
					success: function (msg) {
						$("#ID_JO").html(msg);
					}
				});

				$.ajax({
					type: "POST",
					url: '<?php echo base_url() . 'bengkel/get_merek_motor'; ?>',
					data: "ID_TM=" + result_id_tm,
					cache: false,
					success: function (msg) {
						$("#ID_MM").html(msg);
					}
				});
			}
		};

		$(function () {
			$("#ID_Kategori").change(function () {
				var selectedText = $(this).find("option:selected").text();
				var selectedValue = $(this).val();

				if (selectedValue == 1 || selectedValue == 2) {
					$("#JL").show();
					$("#JO").hide();
					$("#MM").hide();
					$("#MO").hide();

					$.ajax({
						type: "POST",
						url: '<?php echo base_url() . 'bengkel/get_jenis_layanan'; ?>',
						data: "ID_Kategori=" + selectedValue,
						cache: false,
						success: function (msg) {
							$("#ID_JL").html(msg);
							$("#ID_JL2").html(msg);
						}
					});
				} else {
					$("#JL").hide();
					$("#JO").show();
					$("#MM").show();
					$("#MO").show();

					$.ajax({
						type: "POST",
						url: '<?php echo base_url() . 'bengkel/get_jenis_onderdil'; ?>',
						data: "ID_Kategori=" + selectedValue,
						cache: false,
						success: function (msg) {
							$("#ID_JO").html(msg);
							$("#ID_JO2").html(msg);

							$("#ID_MM2").change(function () {
								$("#TM").show();
								var selectedText2 = $(this).find("option:selected").text();
								var selectedValue2 = $(this).val();

								$.ajax({
									type: "POST",
									url: '<?php echo base_url() . 'bengkel/get_id_tm'; ?>',
									data: "ID_MM=" + selectedValue2,
									cache: false,
									success: function(msg){
										$("#ID_TM2").html(msg);
									}
								});
							});
						}
					});
				}
			});

			$("#ID_MM").change(function () {
				var selectedText2 = $(this).find("option:selected").text();
				var selectedValue2 = $(this).val();

				$.ajax({
					type: "POST",
					url: '<?php echo base_url() . 'bengkel/get_id_tm'; ?>',
					data: "ID_MM=" + selectedValue2,
					cache: false,
					success: function(msg){
						$("#ID_TM").html(msg);
					}
				});
			});
		});

	</script>

	</body>

	</html>
