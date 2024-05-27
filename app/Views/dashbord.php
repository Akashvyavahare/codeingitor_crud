<?= $this->extend('Layout/main-layout') ?>
<?= $this->section('Main-containt') ?>
<style>
.tableimg {
    border: 0;
    vertical-align: top;
    height: auto;
    border-radius: 100%;
    width: auto;
    height:100px;
}
</style>
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
            </div>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <div class="dropdown">
                <a class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-lg" href="#"
                    role="button">
                    Add Product
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <?php  if(session()->has('message')){   ?>
        <div id="alertmsg" class="alert <?= session()->getFlashdata('alert-class') ?>">
            <?= session()->getFlashdata('message') ?>
        </div>
        <?php  } ?>
    </div>
    <div class="pb-20">

        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Product Name</th>
                    <th class="table-plus datatable-nosort">Product Image</th>
                    <th>category</th>
                    <th>Sub category</th>
                    <th>Description</th>
                    <th>Entry Info</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $list) { 
                    $product_id=$list['id'];
                    $product_name=$list['product_name'];                
                    $main_cat=$list['maincatName'];
                    $subcat_title=$list['subcat_name'];
                    $description=$list['description'];
                    $created_at=$list['created_at'];
                    $maincatid=$list['maincatid'];
                    $subctid=$list['subctid'];                
                    $product_img=base_url("uplod_imgs/{$list['image']}");

                ?>
                <tr>
                    <td class="table-plus">
                        <?=$product_name;?>
                    </td>
                    <td>
                        <img class="tableimg" src="<?=$product_img;?>" alt="">
                    </td>
                    <td><?=$main_cat;?></td>
                    <td><?=$subcat_title?></td>
                    <td><?=$description;?></td>
                    <td><?=$created_at;?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="<?=base_url("/edit_product/$product_id")?>"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="<?=base_url("/delet_product/$product_id")?>"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Model form for add update -->
<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Add Product
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" method="POST">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="productName" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <select name="mainCat" id="mainCat" class="form-control">
                                    <option value="">Select Main Category</option>
                                    <?php foreach($maincat_data as $main_catlist) {
                                           $maincat_id = $main_catlist['id'];
                                           $main_title = $main_catlist['category_title'];  
                                        ?>
                                        <option value="<?=$maincat_id;?>"><?=$main_title;?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <select name="subCat" id="subCat" class="form-control">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
