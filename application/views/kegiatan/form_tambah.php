<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<form method="post" action="">
		<table class="table">
			<tr>
				<td><label>Kegiatan </label></td>
				<td><input type="text" name="kegiatan" value="<?= set_value('kegiatan'); ?>" placeholder="Nama Kegiatan" class="form-control"> </td>
			<tr>
				<td>
				<td><?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><input type="text" name="kegiatan_unit" value="<?= set_value('kegiatan_unit'); ?>" placeholder="Nama Unit Pengaju Kegiatan" class="form-control"></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('kegiatan_unit', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><input type="text" name="kegiatan_peserta" value="<?= set_value('kegiatan_peserta'); ?>" placeholder="Darimana Peserta Kegiatan" class="form-control"></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('kegiatan_peserta', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div class="input-group mb-3">
						<input type="number" class="form-control" placeholder="Jumlah Peserta Kegiatan" aria-describedby="basic-addon2" name="kegiatan_jmlpeserta" value="<?= set_value('kegiatan_jmlpeserta'); ?>">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2">Orang</span>
						</div>
					</div>
				</td>
				<!-- <td><input type="text" name="kegiatan_jmlpeserta" value="<?php // set_value('kegiatan_jmlpeserta'); ?>" placeholder="Jumlah Peserta Kegiatan" class="form-control"></td> -->
			</tr>
			<tr>
				<td>
				<td><?= form_error('kegiatan_jmlpeserta', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>



			</tr>

			<tr>
				<td><label>Prioritas </label></td>
				<td>
					<select name="prioritas" value="<?= set_value('prioritas'); ?>" class="form-control">
						<option value="">Pilih Prioritas</option>
						<option value="Biasa">Biasa</option>
						<option value="Sedang">Sedang</option>
						<option value="Perlu">Perlu</option>
					</select>
				</td>
			<tr>
				<td>
				<td><?= form_error('prioritas', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
				<td>
					<!-- <input type="textarea" name="prioritas_alasan" value="<?= set_value('prioritas_alasan'); ?>" placeholder="Alasan Prioritas Kegiatan"> -->
					<textarea name="prioritas_alasan" placeholder="Alasan Prioritas Kegiatan" rows="5" class="form-control"><?= set_value('prioritas_alasan'); ?></textarea>
				</td>
				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('prioritas_alasan', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>

			</tr>

			<tr>
				<td><label>Penanggung Jawab </label></td>
				<td>
					<select name="penanggung_jawab" value="<?= set_value('penanggung_jawab'); ?>" class="form-control">
						<option value="">Pilih Penanggung Jawab</option>
						<?php foreach ($listUser as $u) : ?>
							<option value="<?= $u->email; ?>"><?= $u->gelar_depan.$u->nama.$u->gelar_akademik; ?></option>
						<?php endforeach; ?>
					</select>

				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('penanggung_jawab', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td><label>Waktu</label></td>
				<td><input type="datetime-local" name="waktu" value="<?= set_value('waktu'); ?>" class="form-control"> </td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
					<script type='text/javascript'>
						$(window).load(function() {
							$("#tempat").change(function() {
								console.log($("#tempat option:selected").val());
								if ($("#tempat option:selected").val() == 'Outdoor') {
									$('#ruangan').prop('hidden', false);
									$('#ruangan2').prop('hidden', 'true');
								} else if ($("#tempat option:selected").val() == 'Indoor') {
									$('#ruangan').prop('hidden', 'true');
									$('#ruangan2').prop('hidden', false);
								} else {
									$('#ruangan').prop('hidden', 'true');
									$('#ruangan2').prop('hidden', 'true');
								}
							});
						});
					</script>
					<label>
						Lokasi <br />
				<td>
					<select name="tempat" id="tempat" class="form-control">
						<option value="">Pilih Lokasi</option>
						<option value="Outdoor">Outdoor</option>
						<option value="Indoor">Indoor</option>
					</select>
				</td>
			<tr>
				<td>
				<td><?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><input type="text" placeholder="Lokasi Outdoor" name="lokasiOut" id="ruangan" hidden class="form-control" /></td>
				</td>
			</tr>
			<tr>
				<td>
				<td>
					<select name="lokasiIn" value="" id="ruangan2" hidden class="form-control">
						<option value="">Pilih Ruangan</option>
						<?php
						$i = 101;
						while ($i <= 134) {
						?><option value="R.<?= $i ?>">R.<?= $i ?></option><?php
																			$i++;
																		}
																			?>
						<option value="R.139">R.139</option>
						<option value="R.140">R.140</option>
						<?php
						$i = 201;
						while ($i <= 216) {
						?><option value="R.<?= $i ?>">R.<?= $i ?></option><?php
																			$i++;
																		}
																			?>
						<option value="R.219">R.219</option>
						<option value="R.220">R.220</option>
						<option value="R.227">R.227</option>
						<option value="R.228">R.228</option>
						<?php
						$i = 231;
						while ($i <= 234) {
						?><option value="R.<?= $i ?>">R.<?= $i ?></option><?php
																			$i++;
																		}
																			?>
						<option value="R.239">R.239</option>
						<option value="R.240">R.240</option>
						<?php
						$i = 301;
						while ($i <= 306) {
						?><option value="R.<?= $i ?>">R.<?= $i ?></option><?php
																			$i++;
																		}
																		$i = 309;
																		while ($i <= 311) {
																			?><option value="R.<?= $i ?>">R.<?= $i ?></option><?php
																																$i++;
																															}
																															$i = 314;
																															while ($i <= 330) {
																																?><option value="R.<?= $i ?>">R.<?= $i ?></option><?php
																																														$i++;
																																													}
																																														?>
						<option value="R.192">R.192</option>
						<option value="R.193">R.193</option>
						<option value="R.282">R.282</option>

						<option value="R.182">R.182</option>
						<option value="R.191">R.191</option>
						<option value="R.280">R.280</option>
						<option value="R.283">R.283</option>
						<option value="R.284">R.284</option>
						<option value="R.252">R.252</option>
						<option value="R.254">R.254</option>
						<option value="R.256">R.256</option>
						<option value="R.352">R.352</option>
						<option value="R.179">R.179</option>
						<option value="R.281">R.281</option>
						<option value="R.154">R.154</option>
						<option value="R.156">R.156</option>

						<option value="R.178">R.178</option>
						<option value="R.170">R.170</option>
						<option value="R.286">R.286</option>
						<option value="R.353">R.353</option>
						<option value="R.155">R.155</option>
						<option value="R.151">R.151</option>
						<option value="R.153">R.153</option>
						<option value="R.253">R.253</option>
						<option value="R.251">R.251</option>
						<option value="R.255">R.255</option>
						<option value="R.264">R.264</option>
						<option value="R.190">R.190</option>
						<option value="R.262">R.262</option>

						<option value="R.157">R.157</option>
						<option value="R.152">R.152</option>
						<option value="R.166">R.166</option>
						<option value="R.179">R.179</option>
						<option value="R.194">R.194</option>
						<option value="R.260">R.260</option>
						<option value="R.278">R.278</option>
						<option value="R.184">R.184</option>
						<option value="R.158">R.158</option>
						<option value="R.261">R.261</option>
						<option value="R.257">R.257</option>
						<option value="R.289">R.289</option>
						<option value="R.Workshop">R.Workshop</option>

						<option value="R.Studio Gambar">R.Studio Gambar</option>
					</select>
				</td>
				</td>
			</tr>
			</label>
			</td>
			</tr>

			<tr>
				<td><label>Pelaksana </label></td>
				<td><input type="text" name="pelaksana" value="<?= set_value('pelaksana'); ?>" placeholder="Unit / Tim Pelaksana Kegiatan" class="form-control"> </td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('pelaksana', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td><label>Skema Kegiatan <br>Terhadap Prokes </label></td>
				<td>
					<textarea name="skema_proses_masuk_keluar" placeholder="Proses Peserta Masuk Dan Keluar Kampus" rows="4" class="form-control"><?= set_value('skema_proses_masuk_keluar'); ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('skema_proses_masuk_keluar', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><textarea name="skema_penerapan_prokes" placeholder="Penerapan Prokes Ke Peserta" rows="4" class="form-control"><?= set_value('skema_penerapan_prokes'); ?></textarea></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('skema_penerapan_prokes', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><textarea name="skema_kegiatan_berlangsung" placeholder="Skema Selama Kegiatan Berlangsung" rows="4" class="form-control"><?= set_value('skema_kegiatan_berlangsung'); ?></textarea></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('skema_kegiatan_berlangsung', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><textarea name="skema_kegiatan_selesai" placeholder="Skema Setelah Kegiatan Selesai" rows="4" class="form-control"><?= set_value('skema_kegiatan_selesai'); ?></textarea></td>
				</td>
			</tr>
			<tr>
				<td>
				<td><?= form_error('skema_kegiatan_selesai', '<small class="text-danger pl-3">', '</small>'); ?></td>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="tombol" value="Tambah" class="form-control btn btn-success" /></td>
			</tr>
		</table>
		<input type="hidden" id="status" name="satgas" value="Menunggu">
		<input type="hidden" id="status" name="kasatgas" value="Menunggu">
		<input type="hidden" id="pengaju" name="pengaju" value="<?= $this->session->userdata('email') ?>">

	</form>
</body>

</html>