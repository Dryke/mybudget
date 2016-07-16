<?php
  if($category_add)
  {
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Success!</strong> Category added.
    </div>
    <?php
  }
?>
<form class="col-md-3" method="POST">
  <h1>Category</h1>
  <label for="name">Name</label>
  <input name="name" type="text" id="name" class="form-control" placeholder="Name" required="true" autocomplete="off"><br />
  <label for="id_parent">Parent</label>
  <select name="id_parent" id="id_parent">
    <option value="0">None</option>
    <?php
      foreach($categories as $category)
      {
        ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php
      }
    ?>
  </select>
  <br />
  <button class="btn btn-medium btn-primary btn-block" type="submit" name="submitAddCategory">Add</button>
</form>
