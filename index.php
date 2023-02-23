<?php
include('function.php');

$crudAdmin = new crudApp();
// if(isset($_POST['add'])){
//     $add_message = $crudAdmin->addData($_POST);
// }
$records = $crudAdmin->display_data();


if (isset($_GET['status'])) {
    if ($_GET['status'] == 'search') {
        $crudAdmin->search($_GET['data']);
    }
}
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'delete') {
        $crudAdmin->delete_data($_GET['id']);
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>birds larner</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="head_container">
        <h2>Birds of World</h2>
        <div class="header_action">
           
            <a style="background-color: rgb(40, 45, 55);" href="add.php" id="add_record" class="button">Add new Record</a>
            <!-- <div class="search_container">
                <input id="search_text" type="text" name="search_content">
                <a href="?status=search&&data=" id="search_icon">Serr</a>
            </div> -->
        </div>
    </div>
    <div class="search_container">

        <table>
            <thead>
                <th>Name</th>
                <th>Binomical Name</th>
                <th>regions</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php while($record = mysqli_fetch_assoc($records)){ ?>
                    <tr>
                        <td><?php echo $record['name']; ?></td>
                        <td><?php echo $record['sciname']; ?></td>
                        <td><?php echo $record['regions']; ?></td>
                        <td><img height="50px" class="tabble_image" src="uploads/<?php echo $record['image'];?>" /></td>
                        <td>
                            <a class="edit_button" href="edit.php?status=edit&&id=<?php 
                            echo $record['id'];?>">Edit</a>
                            <a class="delete_button" href="?status=delete&&id=<?php
                            echo $record['id']; ?>">delete</a>
                        </td>
                    </tr>
                 <?php } ?>    
            </tbody>
        </table>
        <?php ?>
    </div>
    
</body>
</html>