<?php
    if(isset($_POST['submitDeleteCategory']))
    {
        $category = new Category();
        $category->id = (int)$_POST['id'];
        if($category->delete())
        {
            $notification = new Notification('success', 'Success!', 'Category deleted.');
        }
    }

    if(isset($_POST['submitAddCategory']))
    {
        $category = new Category();
        $category->name = $_POST['name'];
        $category->id_parent = $_POST['id_parent'];
        if($category->add())
        {
            $notification = new Notification('success', 'Success!', 'Category added.');
        }
    }

    require_once('NotificationController.php');

    echo $twig->render($actual_page.'.html', array(
        'categories' => Category::getTree(),
        'main_categories' => Category::getMainCategories()
    ));
?>
