<form action="" method="post">
        <div class="form-group">
            <label for="cat-title">Edit Category</label>
            <?php 
                if(isset($_GET['edit'])){
                    $cat_id = $_GET['edit'];
                    $query = "SELECT * FROM category WHERE cat_id = {$cat_id}";
                    $edit_query = mysqli_query($connections, $query);

                    while($row = mysqli_fetch_assoc($edit_query)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
            ?>
            <input value = "<?php if(isset($cat_title)){echo $cat_title; } ?>" type="text" class="form-control" name="cat_title">
            <?php
                    }
                }
            ?>
            <?php 
                if(isset($_POST['update'])){
                    $the_cat_title = $_POST['cat_title'];
                    $query = "UPDATE category SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                    $update_query = mysqli_query($connections, $query);
                    if(!$update_query){
                        die("QUERY FAILED" .mysqli_error($connections));
                    }
                }
            ?>

        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
        </div>
    </form>