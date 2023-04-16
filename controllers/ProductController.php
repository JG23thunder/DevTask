<?php 
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\Product;
class ProductController extends Controller
{
	public function index()
	{
		$products = (new Product())->findAll();
		$params = ['products' =>  $products];
		$this->setLayout('main');
		return $this->render('index', $params);
	}

	public function addproduct(Request $request)
	{
		$product = new Product();
		if($request->isPost())
		{				
				$product->loadData($request->getBody());
				if($product->validate() && $product->store())
				{
					header('Location: /');
				}

				$this->setLayout('addproductlayout');
				return $this->render('addproduct', ['model' => $product]);
		}

			$this->setLayout('addproductlayout');			
		return $this->render('addproduct', ['model' => $product]);



	}


	public function delete($id)
	{	
			$product = Product::find($id);

			if(!$product)
			{
				return 'Product not found';
			}
	
			$product->delete();

			return 'Product Delete successfully';


	}




public function massDelete(Request $request)
{
 	
	if ($request->isPost()) {
        $ids = $_POST['delete'] ?? [];
        $product = new Product();

        foreach ($ids as $id) {
            $product->setId($id);
            $product->delete();
        }
    }

    $this->setLayout('main');
    header('Location: /');

 	
}




}