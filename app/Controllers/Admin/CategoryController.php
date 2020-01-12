<?php
// CategoryController.php
require_once MODELS.'/Category.php';

class CategoryController extends Controller
{
    /**
     * Главная страница управления категориями
     *
     * @return bool
     */
    public function index()
    {
        // Create an instance
        $categories = new Category();
        // Get the list of Categories
        $categories = $categories->index();

        $title = 'Category List Page ';
        $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
    }
    /**
     * Добавление категории
     *
     * @return bool
     */
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $opts[] = trim(strip_tags($_POST['name']));
            $opts[] = (int)isset($_POST['status']);
            $category = new Category();
            $category->store($opts);
            Helper::redirect('/admin/categories');
        }
        $title = 'Admin Category Add New Category ';
        $this->view->render('admin/categories/create', compact('title'), 'admin');
    }
}


// class CategoryController extends Controller
// {
//     public function index()
//     {
//         $categories = Category::all();
//         $title = 'Category List Page ';
//         $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
//     }
//     /**
//      * Добавление категории
//      *
//      * @return bool
//      */
//     public function create()
//     {
//         if (isset($_POST) and !empty($_POST)) {
//             $category = new Category();
//             $category->name = trim(strip_tags($_POST['name']));
//             $category->status = (int)isset($_POST['status']);
//             $category->store();
//             Helper::redirect('/admin/categories');
//         }
//         $title = 'Admin Category Add New Category ';
//         $this->view->render('admin/categories/create', compact('title'), 'admin');
//     }
// }