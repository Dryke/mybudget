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
    <input name="name" type="text" id="name" class="form-control" placeholder="Name" required="true" autocomplete="off">
    <br />
    <div class="input-group">
        <input type="text" name="amount" id="amount" class="form-control" aria-label="Amount in &euro;" placeholder="0.00">
        <span class="input-group-addon">&euro;</span>
    </div>
    <br />
    <label for="id_category">Category</label>
    <select name="id_category" id="id_category">
        <?php
            foreach($categories as $category)
            {
                ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php
                if(isset($category['children']))
                {
                    foreach($category['children'] as $child)
                    {
                        ?>
                        <option value="<?php echo $child['id']; ?>">-- <?php echo $child['name']; ?></option>
                        <?php
                    }
                }
            }
        ?>
    </select>
    <br /><br />
    <button class="btn btn-medium btn-primary" type="submit" name="submitAddTransaction">Add</button>
</form>
