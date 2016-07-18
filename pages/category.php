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

  if($category_delete)
  {
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Success!</strong> Category deleted.
    </div>
    <?php
  }
?>
<form class="col-md-3" method="POST">
  <input name="name" type="text" id="name" class="form-control" placeholder="Name" required="true" autocomplete="off"><br />
  <label for="id_parent">Parent</label>
  <select name="id_parent" id="id_parent">
    <option value="0">None</option>
    <?php
      foreach($main_categories as $category)
      {
        ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php
      }
    ?>
  </select>
  <br /><br />
  <button class="btn btn-medium btn-primary" type="submit" name="submitAddCategory">Add</button>
</form>

<div class="col-md-9">
  <table class="table">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Children</th>
      <th></th>
    </tr>
    <?php
      foreach($categories as $category)
      {
        ?>
        <tr>
          <td><?php echo $category['id']; ?></td>
          <td><?php echo $category['name']; ?></td>
          <td>
            <?php
              if(isset($category['children']))
              {
                ?>
                <ul>
                  <?php
                  foreach($category['children'] as $child)
                  {
                    ?>
                    <li>
                      <?php echo $child['name']; ?>
                      <form method="POST" class="category_remove">
                        <input type="hidden" name="id" value="<?php echo $child['id']; ?>"/>
                        <button type="submit" name="submitDeleteCategory"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                      </form>
                    </li>
                    <?php
                  }
                  ?>
              </ul>
              <?php
              }
             ?>
          </td>
          <td>
            <form method="POST" class="category_remove">
              <input type="hidden" name="id" value="<?php echo $category['id']; ?>"/>
              <button type="submit" name="submitDeleteCategory"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </form>
          </td>
        </tr>
        <?php
      }
    ?>
  </table>
</div>
