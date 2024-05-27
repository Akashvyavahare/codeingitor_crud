<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MainCategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;


class Dashbord extends BaseController
{

    protected $maincat_data;
    protected $subcat_data;
    protected $product_data;
    public function __construct()
    {  
        $this->maincat_data=new MainCategoryModel();
        $this->subcat_data=new SubCategoryModel();
        $this->product_data=new ProductModel();
    }
    public function index()
    {

        $data['product'] = $this->product_data
        ->select('products.*,main_category.id as maincatid, main_category.category_title as maincatName, sub_category.subcat_title as subcat_name,sub_category.id as subctid')
        ->join('sub_category', 'sub_category.id = products.subcat_id')
        ->join('main_category', 'main_category.id = sub_category.maincat_id')
        ->findAll();
        $data['maincat_data'] = $this->maincat_data->findAll();
        return view('dashbord',$data);
    }

    
    public function addProduct()
    {
        $productName = $this->request->getPost('productName');
        $mainCatId = $this->request->getPost('mainCat');
        $subCatId = $this->request->getPost('subCat');
        $description = $this->request->getPost('description');
         $image = $this->request->getFile('image');

        if ($image->isValid()) {
            $newName = $image->getRandomName();
            $image->move('uplod_imgs', $newName);
            $imageName = $newName;
        } else {
            $imageName = ''; 
        }
            // $newFileName = $image->getRandomName();
            // $filePicture->move('uplod_imgs', $newFileName);

        $data = [
            'product_name' => $productName,
            'maincat_id' => $mainCatId,
            'subcat_id' => $subCatId,
            'description' => $description,
            'image' => $imageName 
        ];

        
        $productId = $this->product_data->insert($data);

        if ($productId) {
            $response['success'] = true;
            $response['message'] = 'Product added successfully.';
        }
        else{

            $response = [
                'success' => false,
                'message' => 'Failed to add product.'
            ];

        }
        return $this->response->setJSON($response);
    }
     
    public function getSubcategories()
    {
        $mainCatId = $this->request->getPost('mainCatId');
             
        $subcategories = $this->subcat_data->where('maincat_id', $mainCatId)->findAll();       
        return $this->response->setJSON($subcategories);
    }
    
    function editdata($id=null)
    {
      $data['product'] = $this->product_data->find($id);
      $data['maincat_data'] = $this->maincat_data->findAll();
      return view('update',$data);
     }

   function updatedata()
   {
    $productid = $this->request->getPost('productid');
    $productName = $this->request->getPost('productName');
    $mainCatId = $this->request->getPost('mainCat');
    $subCatId = $this->request->getPost('subCat');
    $description = $this->request->getPost('description');
    $image = $this->request->getFile('image');

    if ($image->isValid()) {
        $newName = $image->getRandomName();
        $image->move('uplod_imgs', $newName);
        $imageName = $newName;
             
        $data = [
            'product_name' => $productName,
            'maincat_id' => $mainCatId,
            'subcat_id' => $subCatId,
            'description' => $description,
            'image' => $imageName 
        ];

    } else {
        $data = [
            'product_name' => $productName,
            'maincat_id' => $mainCatId,
            'subcat_id' => $subCatId,
            'description' => $description,
        ];


    }
        
        $productId = $this->product_data->update($productid,$data);

        if ($productId) {
            session()->setFlashdata('message', 'Update successfully!');      
            session()->setFlashdata('alert-class', 'alert-success');
        }
        else{
               
            session()->setFlashdata('message', 'something went wrong');      
           session()->setFlashdata('alert-class', 'alert-success');
        }
        $this->response->redirect(base_url('/dashboard'));
   }
     


    public function deleteProduct($id=null)
    {
        $product = $this->product_data->find($id);
        if ($product) {

            $this->product_data->delete($id);
            session()->setFlashdata('message', 'Deleted successfully!');      
            session()->setFlashdata('alert-class', 'alert-success');
        }
        else{

            session()->setFlashdata('message', 'Something went wrong');      
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        $this->response->redirect(base_url('/dashbord'));
    }
    
}
