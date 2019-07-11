<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
       
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin Panel
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php 

                                if(isset($_POST['submit'])){
                                   
                                    $cat_title = $_POST['cat_title'];
                                    if($cat_title == "" || empty($cat_title)){
                                        echo "This field should not be empty";
                                    }
                                    else{
                                        $query = "INSERT INTO category(cat_title) ";
                                        $query .= "VALUE('{$cat_title}') ";

                                        $create_category_query = mysqli_query($connections, $query);
                                        if(!$create_category_query){
                                            die('QUERY FAILED' .mysqli_error($connections));
                                        }
                                    }
                                }
                             ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <?php 
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include "includes/update_category.php";
                                }
                            ?>
                               
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Categorys</th> 
                                                  <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                
                                        $query = "SELECT * FROM category";
                                        $select_categories = mysqli_query($connections,$query);
                                
                                            
                                        while($row = mysqli_fetch_assoc($select_categories)){
                                                     $cat_id = $row['cat_id'];
                                                     $cat_title = $row['cat_title'];
                                                     echo "<tr>";
                                                     echo "<td>{$cat_id}</td>";
                                                     echo "<td>{$cat_title}</td>";
                                                     echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                                     echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                                     echo "</tr>";
                                            }
                        
                                    ?>

                                    <?php 
                                        if(isset($_GET['delete'])){
                                            $the_cat_id = $_GET['delete'];
                                            $query = "DELETE FROM category WHERE cat_id ={$the_cat_id} ";
                                            $delete_query = mysqli_query($connections, $query);
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div> 
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php" ?> 