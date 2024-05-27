<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Login</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/styles/core.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/styles/icon-font.min.css')?>" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css')?>" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/styles/style.css')?>" />
</head>

<body class="login-page">

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url('assets/vendors/images/login-page-img.png')?>" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login</h2>
                        </div>
                        <form method="POST" action="<?= base_url('/loginAuth');?>">
                            <div class="input-group custom">
                                <input type="text" name="username" class="form-control form-control-lg"
                                    placeholder="Username" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <br> <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php  if(session()->has('message')){   ?>
                                <div id="alertmsg" class="alert <?= session()->getFlashdata('alert-class') ?>">
                                    <?= session()->getFlashdata('message') ?>
                                </div>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="<?= base_url('assets/vendors/scripts/core.js')?>"></script>
    <script src="<?= base_url('assets/vendors/scripts/script.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/scripts/process.js')?>"></script>
    <script src="<?= base_url('assets/vendors/scripts/layout-settings.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/apexcharts/apexcharts.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/scripts/dashboard3.js')?>"></script>
</body>

</html>