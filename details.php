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
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'read') {
        $info = $crudAdmin->display_data_by_id($_GET['id']);
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
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>

<body>
    <div class="tittle">
        <h1><?php echo $info['name']; ?></h1>
    </div>
    <div class="info_container">
        <div class="left">
            <div class="details">
                <p id="details"><?php echo $info['details']; ?></h1>
                </p>
            </div>
        </div>
        <div class="right">
            <img class="details_image" width="100px" src="uploads/<?php echo $info['image']; ?>" />
            <div class="img_info">
                <h3>Name: <?php echo $info['name']; ?></h3>
                <p>Scientific Name: <?php echo $info['sciname']; ?></p>
                <p>availabity: <?php echo $info['regions']; ?></p>
            </div>


        </div>
    </div>
</body>

</html>