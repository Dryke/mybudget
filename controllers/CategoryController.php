<?php
  $category_add = false;
  $categories = Category::getCategories();

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
?>
