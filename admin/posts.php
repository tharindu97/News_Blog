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

                        <?php 

                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            }
                            else{
                                $source = '';
                            }

                            switch ($source) {
                                case '34':
                                    # code...
                                    include "includes/add_post.php";
                                    break;

                                case '100':
                                    # code...
                                    echo "Case 100";
                                    break;
                                
                                case '55':
                                    # code...
                                    echo "Case 55";
                                    break;
                                
                                
                                default:
                                    # code...
                                    break;
                            }

                         ?>

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