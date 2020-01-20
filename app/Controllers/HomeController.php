<?php
// HomeController.php
require_once MODELS.'/Product.php';
require_once MODELS.'/Category.php';

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Our Best Cats Members Home Page';
        $this->view->render('home/index', compact('title'));
    }

    public function getProducts($vars)
    {
        $products = Product::getProducts();
        echo json_encode($products);
    }

    public function getProduct($vars)
    {
        extract($vars);
        $product = Product::getBySlug($id);
        echo json_encode($product);
    }

    public function getProductItem($vars)
    {
        extract($vars);
        $product = Product::getProductBySlug($id);
        echo json_encode($product);
    }

    public function getCategories()
    {
        $categories = Category::getCategories();
        echo json_encode($categories);
    }

    public function getProductsByCategory($vars)
    {
        extract($vars);
        $products = Product::getProductsByCategory($id);
        echo json_encode($products);
    }

}
