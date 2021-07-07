<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user" method="post" action="<?php echo base_url('/login/proses_register'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nama" placeholder="Name Institut">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputEmail" name="password" placeholder="Password">
                        </div>

                        <div class="form-group row">
                            <div class="custom-control custom-checkbox small">
                                &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="vehicle1" name="role" value="1">
                                <label for="vehicle1"> Satgas</label><br>
                            </div>
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" id="role" name="role" value="2">
                                <label for="vehicle2"> Staff</label><br>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Akun
                        </button>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>

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