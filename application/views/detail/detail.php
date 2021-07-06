<div class="container">
    <div class="row">
        <table class="table table-stripped">
            <div class="col-md-6">
                <p><small><?= $user->nama; ?></small> | <a href="<?= base_url('login/logout'); ?>"><small style="color: red;">Logout</small></a></p>
            </div>
            <thead>
                <tr>
                <th scope="col">Nama Kegiatan</th>
                <td><?= $kegiatan['kegiatan'] ?></td>
                </tr>
                <tr>
                <th scope="col">Prioritas</th>
                <td><?= $kegiatan['prioritas'] ?></td>
                </tr>
                <tr>
                <th scope="col">PIC</th>
                <td><?= $kegiatan['user'] ?></td>
                </tr>
                <tr>
                <?=$timestamp = strtotime($kegiatan['waktu']);
	        	$day = date('l', $timestamp);;
		        if($day == 'Monday'){
		    	$day = 'Senin';
		        }else if($day == 'Tuesday'){
			    $day = 'Selasa';
		        }else if($day == 'Wednesday'){
		        $day = 'Rabu';
		        }else if($day == 'Thursday'){
		    	$day = 'Kamis';
		        }else if($day == 'Friday'){
		    	$day = 'Jumat';
	        	}else if($day == 'Saturday'){
		    	$day = 'Sabtu';
		        }else if($day == 'Sunday'){
		        $day = 'Minggu';
		        } ?>
                <th scope="col">Waktu</th>
                <td><?= $day?>, <?= $kegiatan['waktu'] ?></td>
                </tr>
                <tr>
                <th scope="col">Tempat</th>
                <td><?= $kegiatan['tempat'] ?></td>
                </tr>
                <tr>
                <th scope="col">Lokasi</th>
                <td><?= $kegiatan['lokasi'] ?></td>
                </tr>
                <tr>
                <th scope="col">Skema</th>
                <td>
                <?= $kegiatan['skema_proses_masuk_keluar'] ?><br>
                <?= $kegiatan['skema_penerapan_prokes'] ?><br>
                <?= $kegiatan['skema_kegiatan_berlangsung'] ?><br>
                <?= $kegiatan['skema_kegiatan_selesai'] ?>
                </td>
                </tr>
                <tr>
                <th scope="col">Status</th>
                <td>
                        <?php if ($kegiatan['status'] == 1) { ?>
                         <p class="btn btn-success">Approved</p>
                         <?php } else { ?>
                        <p class="btn btn-warning">Menunggu</p>
                        <?php } ?>
              </td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-6"><a href="<?= base_url('detail/cetak/') . $kegiatan['id'] ?>" class="btn btn-info">cetak</a></div><br>
