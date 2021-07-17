<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h3>Kegiatan</h3>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td class="col-md-3"><label>Pengaju </label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break "><?= $kegiatan['pengaju'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><label>Kegiatan</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['kegiatan'] ?></p>
                        </td>
                    <tr>
                    <tr>
                        <td class="col-md-3"><label></label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['kegiatan_unit'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label></label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['kegiatan_peserta'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label></label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['kegiatan_jmlpeserta'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label>Prioritas</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['prioritas'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label></label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['prioritas_alasan'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label>Penanggung Jawab</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['penanggung_jawab'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label>Mulai Acara</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['acara_mulai'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label>Acara Akhir</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['acara_akhir'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label>Lokasi Indoor </label></td>
                        <td class="col-md-9">
                            <?php 
                            if ($lokasi[0]['tempat'] == 'Indoor') {
                                $awal = $lokasi[0]['id'];
                                $next = 1;
                                echo '<p class="form-control text-break">' . $lokasi['0']['lokasi'] . '</p>';
                            } else {
                                $next = 0;
                                $awal = 0;
                                echo '<p class="form-control text-break">-</p>';
                            } ?>

                        </td>
                    </tr>
                    <?php foreach ($lokasi as $l) : ?>
                        <?php if ($l['tempat'] == 'Indoor' && $l['id'] != $awal) {
                            echo '<tr>
                            <td class="col-md-3"><label></label></td>
                            <td class="col-md-9"><p class="form-control text-break">' . $l['lokasi'] . '</p></td>
                            </tr>';
                            $next++;
                        } ?>

                    <?php endforeach; ?>

                    <tr>
                        <td class="col-md-3"><label>Lokasi Outdoor </label></td>
                        <td class="col-md-9">
                            <?php 
                            if ($lokasi[0]['tempat'] == 'Outdoor') {
                                $awal = $lokasi[0]['id'];
                                echo '<p class="form-control text-break">' . $lokasi['0']['lokasi'] . '</p>';
                            } else if($lokasi[$next]['tempat'] == 'Outdoor'){
                                $awal = $lokasi[$next]['id'];
                                echo '<p class="form-control text-break">'.$lokasi[$next]['lokasi'].'</p>';
                                $next++;
                            }else{
                                $awal = 0;
                                echo '<p class="form-control text-break">-</p>';
                            } ?>

                        </td>
                    </tr>
                    <?php foreach ($lokasi as $l) : ?>
                        <?php if ($l['tempat'] == 'Outdoor' && $l['id'] != $awal) {
                            echo '<tr>
                            <td class="col-md-3"><label></label></td>
                            <td class="col-md-9"><p class="form-control text-break">' . $l['lokasi'] . '</p></td>
                            </tr>';
                        } ?>

                    <?php endforeach; ?>

                    <tr>
                        <td class="col-md-3"><label>Pelaksana</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['pelaksana'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label>Skema Kegiatan Terhadap Prokes</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['skema_proses_masuk_keluar'] ?></p>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label></label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['skema_penerapan_prokes'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><label></label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['skema_kegiatan_berlangsung'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3"><label></label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= $kegiatan['skema_kegiatan_selesai'] ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3"><label>Satgas</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= ($kegiatan['satgas'] == 'Menunggu') ? 'Menunggu' : $kegiatan['satgas'] ?></p>
                        </td>
                    </tr>
                    <tr class="">
                        <td class="col-md-3"><label>KaSatgas</label></td>
                        <td class="col-md-9">
                            <p class="form-control text-break"><?= ($kegiatan['kasatgas'] == 'Menunggu') ? 'Menunggu' : $kegiatan['kasatgas'] ?></p>
                        </td>
                    </tr>
                </table>
        </div>

        <div class="col-md-5">

            <h3>Status Pengajuan Kegiatan</h3>
            <hr />
            <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 5) || ($this->session->userdata('email') == $kegiatan['pengaju'] && !empty($komentar)) || ($this->session->userdata('email') == $kegiatan['penanggung_jawab'])) { ?>
                <div class="overflow-auto" style="min-height: 20px; max-height: 46em;">
                    <?php foreach ($komentar as $k) : ?>
                        <!--  Mengambil data komentar -->
                        <?php $date = new DateTime($k['tanggal']); //
                        ?>
                        <!-- Mengambil data waktu dari db berdasarkan kapan komentar dibuat -->

                        <div class="card">
                            <div class="card-header">
                                <div class="text-break">
                                    <p class="" style="text-align: left; margin: auto;"> <?= $k['user'] ?></p>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-break"> <?= $k['komentar'] ?></p>
                                <footer class="">
                                    <p class="" style="text-align: right; font-size: 13px; color: grey;"><?= $date->format('j-F-Y H:i'); ?></p></cite>
                                </footer>
                            </div>
                        </div>
                        <br />
                    <?php endforeach; ?>

                </div>
                <div class="" style="margin-top: 25px; margin-bottom: 50px;">
                    <hr />
                    <?php if (($this->session->userdata('role') == '1') || ($this->session->userdata('role') == '5') || (!empty($komentar))) { ?>
                        <?php if (($kegiatan['satgas'] != "Menunggu") && ($kegiatan['kasatgas'] != "Menunggu")) { //Jika sudah di approve keduanya
                        ?>

                        <?php } else { // Jika belum di approve kedua sisi maupun 1 sisi
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <input type="hidden" value="<?= $this->session->userdata('email') ?>" name="user">
                                    <input type="hidden" value="<?= $kegiatan['id'] ?>" name="kegiatan">
                                    <span class="" id="addon-wrapping"><?= $this->session->userdata('email') ?></span>
                                </div>
                                <input type="text" class="form-control" name="komentar" aria-describedby="addon-wrapping" value="<?= set_value('komentar') ?>">
                                <button class="btn btn-success justify-content-end" name="Komen" <?php if ($kegiatan['satgas'] != "Menunggu" && $kegiatan['kasatgas'] != "Menunggu") {
                                                                                                        echo "disabled";
                                                                                                    } ?>>Submit</button>
                                <input type="hidden" value="<?= date("Y-m-d h:i:s"); ?>" name="tanggal">
                            </div>
                            <?= form_error('komentar', '<small class="text-danger pl-3">', '</small>') ?>
                            <br />
                            <?php if (($this->session->userdata('role') == "1") || ($this->session->userdata('role') == "5")) { ?>
                                <a href="<?= base_url('detail/approve/' . $kegiatan['id']) ?>" class="btn btn-success form-control" <?php if ($this->session->userdata('role') == '1' && $kegiatan['satgas'] != "Menunggu" && $kegiatan['penanggung_jawab'] != $this->session->userdata('email') && $kegiatan['pengaju'] != $this->session->userdata('email')) {
                                                                                                                                        echo "hidden";
                                                                                                                                    } else if ($this->session->userdata('role') == '5' && $kegiatan['kasatgas'] != "Menunggu" && $kegiatan['penanggung_jawab'] != $this->session->userdata('email') && $kegiatan['pengaju'] != $this->session->userdata('email')) {
                                                                                                                                        echo "hidden";
                                                                                                                                    }
                                                                                                                                    ?> onclick="return confirm('Approve Kegiatan?')">Approve</a>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>

            </form>
        </div>
    </div>
</div>