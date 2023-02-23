<?php
   include('function.php');

   $crudAdmin = new crudApp();
   if(isset($_GET['status'])){
       if($_GET['status'] = 'edit'){
           $id = $_GET['id'];
           $std_data_id = $crudAdmin->display_data_by_id($id);
       }
   }
   if(isset($_POST['update'])){
      $up_message= $crudAdmin->update($_POST);
   }
   if(isset($_POST['add'])){
    $add_message = $crudAdmin->addData($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>

<body>
    <div class="head_container">
        <h2 style="font-size: 22px;">Add new Records</h2>
        <div class="form_container">
            <form action="" enctype="multipart/form-data" method="POST">
                <div id="first_ip" class="input_fild">
                    <label for="name">Bird Name</label>
                    <input type="text" name="name" />
                </div>
                <div class="input_fild">
                    <label for="bio_name">Bionomical Name</label>
                    <input type="text" name="bio_name" />
                </div>
                <div class="input_fild">
                    <label for="regions">Rigions</label>
                    <input type="text" name="regions" />

                </div>
                <div class="input_fild">
                    <label for="img">Image</label>
                    <input type="file" name="img" />
                </div>
                <div class="input_fild">
                    <label for="details">Details</label>
                    <textarea name="details" rows="5" cols="50">bb</textarea>
                </div>
                <input style="padding: 2px 10px; border: 2px solid blueviolet; border-radius: 10px; font-size:20px;" type="submit" name="add"> 
                <?php if(isset($add_message)){echo $add_message;}?>
            </form>
            <a class="button" style="padding: 2px 10px; border: 2px solid blueviolet; border-radius: 10px; margin-top: 30px; font-size:20px; text-decoration: none;" href="index.php" >Go to list</a>
        </div>
    </div>
    </div>
</body>

</html>