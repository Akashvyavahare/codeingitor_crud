<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Dashbord</title>
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

<body>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
            <div class="header-search">

            </div>
        </div>
        <div class="header-right">

            <div class="user-notification">
                <div class="dropdown">

                    <div class="dropdown-menu dropdown-menu-right">

                    </div>
                </div>
            </div>

            <div class="user-info-dropdown">
                <span class="user-name"></span>
                <a href="<?=base_url('/logout')?>">Log out</a>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="#">
                <h1 style="color: white !important;"><?=session()->get('fullname');?></h1>
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="#" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">All Record</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">

            <?= $this->renderSection('Main-containt'); ?>
        </div>
    </div>

    <!-- js -->
    <script src="<?= base_url('assets/vendors/scripts/core.js')?>"></script>
    <script src="<?= base_url('assets/vendors/scripts/script.min.js')?>"></script>
    <script src="<?= base_url('assets/vendors/scripts/process.js')?>"></script>
    <script src="<?= base_url('assets/vendors/scripts/layout-settings.js')?>"></script>

    <script src="<?= base_url('assets/src/plugins/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js')?>"></script>


    <!-- datatable -->
    <script src="<?= base_url('assets/src/plugins/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js')?>"></script>
    <!-- buttons for Export datatable -->
    <script src="<?= base_url('assets/src/plugins/datatables/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?= base_url('assets/src/plugins/datatables/js/buttons.bootstrap4.min.js')?>"></script>

    <script>
    $(document).ready(function() {
        $('#addProductForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            for (var value of formData.values()) {
                if (value === '') {
                    alert('Please fill in all fields!');
                    return false;
                }
            }

            $.ajax({
                url: '/addProduct',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        $('#bd-example-modal-lg').modal('hide');
                        window.location.href = '/dashbord';
                    } else {

                        console.log(response.errors);
                    }
                }
            });
        });



        function getSubcategory(mainCatId) {
            if (mainCatId) {
                $.ajax({
                    url: '/geSubcat',
                    type: 'POST',
                    data: {
                        mainCatId: mainCatId
                    },
                    success: function(response) {
                        $('#subCat').empty();

                        // Append new options from the response
                        response.forEach(function(subcategory) {
                            $('#subCat').append('<option value="' + subcategory.id + '">' +
                                subcategory.subcat_title + '</option>');
                        });
                    }
                });
            }
        }

        //On chage Maincat Id 
        $('#mainCat').change(function() {
            var mainCatId = $(this).val();
            getSubcategory(mainCatId);
        });

    });
    </script>
</body>

</html>