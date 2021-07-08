<body >

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->

                <div class="p-5">
                                    <div class="text-center">
                                    <img src="<?php echo base_url()?>assets1/img/SiM@nTan-PCR.png"width="250" height="90" >
                                    </img>
                                </div>
                    <form class="user" method="post" action="<?php echo base_url('login/proses_register'); ?>">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nama" placeholder="Name Lengkap">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="institut" placeholder="Name Institut">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputEmail" name="password" placeholder="Password">
                        </div>

                    
                        <button type="submit" class="btn btn-primary btn-user btn-block">
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
