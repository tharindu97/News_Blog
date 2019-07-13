<?php 

	function insert_categories(){
		global $connections;
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
	}


	function read_categories(){
			
			global $connections;
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
			}


	function delete_categories(){

		global $connections;
		if(isset($_GET['delete'])){
            $the_cat_id = $_GET['delete'];
            $query = "DELETE FROM category WHERE cat_id ={$the_cat_id} ";
            $delete_query = mysqli_query($connections, $query);
            if ($delete_query) {
            	# code...
            	echo "<script>window.location ='categories.php' </script>";
            }
        }
	}

 ?>