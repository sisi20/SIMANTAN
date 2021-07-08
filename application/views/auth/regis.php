<body class="bg-body">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="p-5">
                            <div class="text-center">
                                <img src="<?= base_url('assets1/img/Politeknik_Caltex_Riau.png') ?>" class="img-fluid" width="250" height="90">
                                <img src="<?php echo base_url() ?>assets1/img/SiM@nTan-PCR.png" width="250" height="90">
                                </img>
                            </div>
                            <form class="user" method="post" action="">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email" value="<?= set_value('email')?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nama" placeholder="Name Lengkap" value="<?= set_value('nama')?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                                    <script type='text/javascript'>
                                        $(window).load(function() {
                                            $("#institut").change(function() {
                                                console.log($("#institutIn option:selected").val());
                                                if ($("#institutIn option:selected").val() == 'Politeknik Caltex Riau') {
                                                    $('#institutOut').prop('hidden', 'true');
                                                } else if ($("#institut option:selected").val() == 'Lainnya') {
                                                    $('#institutOut').prop('hidden', false);
                                                } else {
                                                    $('#institutIn').prop('hidden', 'true');
                                                }
                                            });
                                        });
                                    </script>
                                    <select name="institutIn" id="institut" class="form-control">
                                        <option value="">Pilih Institut</option>
                                        <option value="Politeknik Caltex Riau">Politeknik Caltex Riau</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?= form_error('institutIn', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <input type="text" placeholder="Institut" name="institutOut" id="institutOut" hidden class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputEmail" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    Register Akun
                                </button>
                                <hr>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="/SIMANTAN-PCR/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>