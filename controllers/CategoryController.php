<?php
    $category_add = false;
    $category_delete = false;

    if(isset($_POST['submitDeleteCategory']))
    {
        $category = new Category();
        $category->id = (int)$_POST['id'];
        if($category->delete())
        {
            $category_delete = true;
        }
    }

    if(isset($_POST['submitAddCategory']))
    {
        $category = new Category();
        $category->name = $_POST['name'];
        $category->id_parent = $_POST['id_parent'];
        if($category->add())
        {
            $category_add = true;
        }
    }

    $categories = Category::getTree();
    $main_categories = Category::getMainCategories();
?>
