<?php
  if($transaction_add)
  {
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Success!</strong> Transaction added.
    </div>
    <?php
  }
?>
<form class="col-md-3" method="POST">
  <h1>Transaction</h1>
  <label for="name">Name</label>
  <input name="name" type="text" id="name" class="form-control" placeholder="Name" required="true" autocomplete="off"><br />
  <label for="id_category">Category</label>
  <select name="id_category" id="id_category">
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
  <label for="amount">Amount</label>
  <div class="input-group">
    <input type="text" name="amount" id="amount" class="form-control" aria-label="Amount in &euro;">
    <span class="input-group-addon">&euro;</span>
  </div>
  <br />
  <button class="btn btn-medium btn-primary btn-block" type="submit" name="submitAddTransaction">Add</button>
</form>
