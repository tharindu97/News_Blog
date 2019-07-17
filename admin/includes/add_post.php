<?php 

	if(isset($_POST['submit'])){
		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_category_id'];
		$post_author = $_POST['post_author'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_contents = $_POST['post_contents'];

		$post_date = date('d-m-y');
		$post_comment_count = 4;

		move_uploaded_file($post_image_temp, "../images/$post_image");


		$query = "INSERT INTO posts(post_tags,post_comment_count,post_status,post_category_id,post_title,post_author,post_date,
post_image,post_content) ";
		$query .= "VALUES('{$post_tags}','{$post_comment_count}','{$post_status}','{$post_category_id}','{$post_title}',
		'{$post_author}',now(),'{$post_image}','{$post_contents}')";

		$post_add_result = mysqli_query($connections, $query);

		if(!$post_add_result){
			die("QUERY FAILED" .mysqli_error($connections));
		}

	}

 ?>

<form action="" method="post" enctype="multipart/from-data">

    <div class="from-group">
      <label for="title">Post Title</label>
      <input type="text" name="post_title" class="form-control">  
    </div>
    <br>
    <div class="from-group">
      <label for="title">Post Category ID</label>
      <input type="text" name="post_category_id" class="form-control">  
    </div>
    <br>
    <div class="from-group">
      <label for="title">Post Author</label>
      <input type="text" name="post_author" class="form-control">  
    </div>
    <br>
    <div class="from-group">
      <label for="title">Post Status</label>
      <input type="text" name="post_status" class="form-control">  
    </div>
    <br>
    <div class="from-group">
      <label for="post_image">Post Images</label>
      <input type="file" name="image">  

    </div>
    <br>
    <div class="from-group">
      <label for="title">Post Tags</label>
      <input type="text" name="post_tags" class="form-control">  
    </div>
    <br>
    <div class="from-group">
      <label for="title">Post Content</label>
      <textarea type ="text" name="post_contents" class="form-control" id="" cols="30" rows="10"></textarea>  
    </div>
    <br>
    <div class="from-group">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">  
    </div>

</form>