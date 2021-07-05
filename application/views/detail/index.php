<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Kegiatan</h1>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td><label>Kegiatan : </label></td>
                        <td><input type="text" name="kegiatan" value="<?= $kegiatan['kegiatan'] ?>" placeholder="Nama Kegiatan" disabled> </td>
                    <tr>
                    <tr>
                        <td>
                        <td><input type="text" name="kegiatan_unit" value="<?= $kegiatan['kegiatan_unit'] ?>" placeholder="Nama Unit Pengaju Kegiatan" disabled></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <td><input type="text" name="kegiatan_peserta" value="<?= $kegiatan['kegiatan_peserta'] ?>" placeholder="Darimana Peserta Kegiatan" disabled></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <td><input type="text" name="kegiatan_jmlpeserta" value="<?= $kegiatan['kegiatan_jmlpeserta'] ?>" placeholder="Jumlah Peserta Kegiatan" disabled></td>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Prioritas : </label></td>
                        <td>
                            <select name="prioritas" disabled>
                                <option value="<?= $kegiatan['prioritas'] ?>" selected><?= $kegiatan['prioritas'] ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <td><input type="text" name="prioritas_alasan" value="<?= $kegiatan['prioritas_alasan'] ?>" placeholder="Alasan Prioritas Kegiatan" disabled></td>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Penanggung Jawab : </label></td>
                        <td>
                            <select name="penanggung_jawab" disabled>
                                <option value="<?= $kegiatan['penanggung_jawab'] ?>"><?= $kegiatan['user'] ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Waktu / Tempat : </label></td>
                        <td><input type="text" name="waktu" value="<?= $kegiatan['waktu'] ?>" disabled> </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Lokasi : </label>
                        </td>
                        <td>
                            <input type="text" name="waktu" value="<?= $kegiatan['lokasi'] ?>" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Pelaksana : </label></td>
                        <td><input type="text" name="pelaksana" value="<?= $kegiatan['pelaksana'] ?>" placeholder="Unit / Tim Pelaksana Kegiatan" disabled> </td>
                    </tr>

                    <tr>
                        <td><label>Skema Kegiatan <br>Terhadap Prokes: </label></td>
                        <td><input type="text" name="skema_proses_masuk_keluar" placeholder="Skema Kegiatan" value="<?= $kegiatan['skema_proses_masuk_keluar'] ?>" disabled> </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="text" name="skema_penerapan_prokes" placeholder="Skema Kegiatan" value="<?= $kegiatan['skema_penerapan_prokes'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="text" name="skema_kegiatan_berlangsung" placeholder="Skema Kegiatan" value="<?= $kegiatan['skema_kegiatan_berlangsung'] ?>" disabled></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="text" name="skema_kegiatan_selesai" placeholder="Skema Kegiatan" value="<?= $kegiatan['skema_kegiatan_selesai'] ?>" disabled></td>
                    </tr>

                    <tr>
                        <td><label>Status: </label></td>
                        <td><input type="text" name="skema" placeholder="Skema Kegiatan" value="<?php if ($kegiatan['status'] == 1) {
                                                                                                    echo 'Approved';
                                                                                                } else {
                                                                                                    echo 'Menunggu';
                                                                                                } ?>" disabled> </td>
                    </tr>

                </table>
        </div>

        <div class="col-md-4">

            <h2><b>Status Pengajuan Kegiatan</b></h2>
            <hr />
            <?php foreach ($komentar as $k) : ?>
                <!--  Mengambil data komentar -->
                <?php $date = new DateTime($k['tanggal']); //
                ?>
                <!-- Mengambil data waktu dari db berdasarkan kapan komentar dibuat -->
                <div class="">
                    <span class="input-group-text" id="addon-wrapping">
                        <p class="col-md-6" style="text-align: left; margin: auto;"> <?= $k['user'] ?></p>
                        <p class="col-md-6 " style="text-align: right; margin:auto"><?= $date->format('j-F-Y H:i'); ?></p>
                    </span>
                    <p class="form-control text-break" aria-describedby="addon-wrapping"> <?= $k['komentar'] ?></p>
                </div>
                <hr />
            <?php endforeach; ?>


            <?php if ($kegiatan['status'] == 0) { ?>
                <div class="input-group flex-nowrap">
                    <input type="hidden" value="<?= $user['id'] ?>" name="user">
                    <input type="hidden" value="<?= $kegiatan['id'] ?>" name="kegiatan">
                    <span class="input-group-text" id="addon-wrapping"><?= $user['nama'] ?></span>
                    <input type="text" class="form-control" name="komentar" aria-describedby="addon-wrapping" value="<?= set_value('komentar') ?>">
                    <button class="btn btn-success justify-content-end" name="Komen" <?php if ($kegiatan['status'] == 1) {
                                                                                            echo "disabled";
                                                                                        } ?>>Submit</button>
                    <input type="hidden" value="<?= date("Y-m-d h:i:s"); ?>" name="tanggal">
                </div>
                <?= form_error('komentar', '<small class="text-danger pl-3">', '</small>') ?>


                <?php if ($user['role'] == 1) { ?>
                    <hr />
                    <a href="<?= base_url('detail/approve/' . $kegiatan['id']) ?>" class="btn btn-success form-control <?php if ($kegiatan['status'] == 1) {
                                                                                                                            echo "disabled";
                                                                                                                        } ?>" onclick="return confirm('Approve Kegiatan?')">Approve</a>
                <?php } ?>
            <?php } ?>
            </form>
        </div>
    </div>
</div>