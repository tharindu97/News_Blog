                <div class="well">
                    <?php 
                    
                        $query = "SELECT * FROM category";
                        $select_categories_sidebar = mysqli_query($connections,$query);
                        
                    ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                    while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                                                $cat_title = $row['cat_title'];
                                                echo "<li><a href='#'>{$cat_title}</a></li>";
                                        }
                    
                                ?>
                            </ul>
                        </div>
                        
                        <!-- /.col-lg-6 -->
                        
                    </div>
                    <!-- /.row -->
                    
                </div>
                <!-- Side Widget Well -->
                        <?php include "includes/widget.php" ?> 

            