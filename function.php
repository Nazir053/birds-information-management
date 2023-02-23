<?php
class crudApp{
    private $conn;
    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'birds';   
        
        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$this->conn){
            die("database Connection error");
        }
    }
    public function addData($data){
        $name = $data['name'];
        $sciname = $data['bio_name'];
        $regions = $data['regions'];
        $details = $data['details'];
        $img_name = $_FILES['img']['name'];
        $img_tmp_name = $_FILES['img']['tmp_name'];

        $Insert_query = "INSERT INTO `b_records`(`name`, `sciname`,`regions`, `image`,`details`) VALUES 
        ('$name','$sciname','$regions','$img_name', '$details')";

        if(mysqli_query($this->conn, $Insert_query)){
            move_uploaded_file($img_tmp_name,'uploads/'.$img_name);
            return "Information Added success";
        }

    }

    public function display_data(){
        $select_query = "SELECT * FROM b_records";
        if(mysqli_query($this->conn, $select_query)){
            return mysqli_query($this->conn, $select_query);
        }
        

    }
    public function display_data_by_id($id){
        $select_query = "SELECT * FROM b_records WHERE id=$id";
        if(mysqli_query($this->conn, $select_query)){
            $data = mysqli_query($this->conn, $select_query);
            return mysqli_fetch_assoc($data);
        }

     }
     public function update($data){
        $id = $data['id'];
        $name = $data['name'];
        $sciname = $data['bio_name'];
        $regions = $data['regions'];
        $details = $data['details'];
        $img_name = $_FILES['img']['name'];
        $img_tmp_name = $_FILES['img']['tmp_name'];

        $update_query = "UPDATE b_records SET name='$name',
        sciname='$sciname',regions='$regions', details = '$details', image='$img_name' WHERE id=$id";

        if(mysqli_query($this->conn, $update_query)){
            move_uploaded_file($img_tmp_name, 'uploads/'.$img_name);
            return "updated success";
        } 
     }
     public function delete_data($id){
        $img_catch_query = "SELECT * FROM b_records WHERE id=$id";
        $delete_img = mysqli_query($this->conn,$img_catch_query);
        $img_dlt = mysqli_fetch_assoc($delete_img); 
        $dlt_info= $img_dlt['image'];
        $delete_query = "DELETE FROM b_records WHERE id=$id";
        if(mysqli_query($this->conn, $delete_query)){
            unlink('uploads/'.$dlt_info);
            return "deleted";
        }

     }
     public function search($dara){

     }
}

?>