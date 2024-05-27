<?= $this->extend('Layout/main-layout') ?>
<?= $this->section('Main-containt') ?>
<style>
.tableimg {
    border: 0;
    vertical-align: top;
    max-width: 50%;
    height: auto;
    border-radius: 100%;
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
                <a class="btn btn-primary" href="/dashbord" role="button">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Model form for add update -->
<div class="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class=" modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Update Product
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form id="updateproduct" action="/update_data" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="productName" class="form-control" value="<?=$product['product_name']?>">
                                <input type="hidden" name="productid" class="form-control" value="<?=$product['id']?>">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <select name="mainCat" id="mainCat" class="form-control" require>
                                    <option value="">Select Main Category</option>
                                    
                                    <?php 

                                    foreach($maincat_data as $main_catlist) 
                                    {
                                           $maincat_id = $main_catlist['id'];
                                           $main_title = $main_catlist['category_title'];  
                                        ?>
                                    <option value="<?=$maincat_id;?>" <?php if($maincat_id==$product['maincat_id']){ echo "selected";}?> ><?=$main_title;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <select name="subCat" id="subCat" class="form-control" require>
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"><?=$product['description']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                
                                <img class="tableimg" src="<?=base_url("uplod_imgs/{$product['image']}");?>" alt="">
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