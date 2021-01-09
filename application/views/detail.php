<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<div class='panel panel-info'>
				<div class='container'>

					<br>
					<center>
						<h1>Fuzzy Logic Penerima Modal</h1>

						<br>
						<br>
						<br>
						<div class="col-sm-11">
							<div class="table-responsive">
								<table id="myTable" class="table table-striped table color-bordered-table danger-bordered-table">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">Nama UKM</th>
											<th class="text-center">Lama Usaha (dalam tahun)</th>
											<th class="text-center">Jumlah Pekerja</th>
											<th class="text-center">Omzet (dalam Juta)</th>
											<th class="text-center">Jumlah Aset</th>
											<th class="text-center">Hasil Keputusan</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($mentah as $km) : ?>
											<tr>
												<td class='text-center'><?= $i; ?></td>
												<td class='text-center'><?= $km['NamaUkm']; ?></td>
												<td class='text-center'><?= $km['LamaUsaha']; ?></td>
												<td class='text-center'><?= $km['JumlahPekerja']; ?></td>
												<td class='text-center'><?= $km['Omzet']; ?></td>
												<td class='text-center'><?= $km['JumlahAset']; ?></td>
												<td class='text-center'><?= $km['HasilKeputusan']; ?></td>
												<td class='text-center'>
													<a href="<?= base_url('Welcome/detailukm/' . $km['id']) ?>">
														<button class='btn btn-block  btn-outline btn-rounded btn-success'><i class='fa fa-eye fa-fw'></i>Detail</button>
													</a></td>
											</tr>

										<?php
																		$i++;
																	endforeach;
										?>
								</table>
								<br>
								<br>
							</div>
						</div>
				</div>
			</div>
		</div>