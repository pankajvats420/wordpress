<?php 
    session_start();
    define('server', 'localhost');
	define('username', 'root');
	define('password', '');
	define('database', 'crud');


class database{
	

    public $db;	

    public function __construct(){
        $this->db = $conn=mysqli_connect(server,username,password,database);

        if($this->db==""){
        	echo "Not connected".mysqli_connect_error();
        }
    }

    public function insert($name,$email,$phone,$image,$password,$tmp_name){
    	 move_uploaded_file($tmp_name, "upload/".$image);
    	 
         $sql = "insert into users (name,email,phone,image,password) values('$name','$email','$phone','$image','$password')";
         $result = mysqli_query($this->db, $sql);
   
         if($result = true){
              
                 $this->msg('Data Inserted Succesfully');

                 $this->redirect('index.php');
         	  
          }
                    
    }

    public function fetchdata(){
         $sql = "select * from users";
         $result = mysqli_query($this->db, $sql);

         $data = array();
         while ($row = mysqli_fetch_assoc($result)) {
         	$data[] = $row;
         }

         return $data;
         
    }

    public function fetchonerecord($userid){
         $sql = "select * from users where id='$userid'";
         $result = mysqli_query($this->db, $sql);
         $row = mysqli_fetch_assoc($result);
         return $row;
    }

    public function update($name,$email,$phone,$image,$password,$userid,$tmp_name){
    	if(!empty($image)){

                 move_uploaded_file($tmp_name, "upload/".$image);
                 $sql = " update users set name='$name',email='$email',phone='$phone',image='$image',password='$password' where id='$userid' ";
                 $result = mysqli_query($this->db, $sql);

                 if($result = true){
                      
                         $this->msg('Data updated Succesfully');

                         $this->redirect('index.php');
                 	  
                  }
        }else{
            $sql = " update users set name='$name',email='$email',phone='$phone',password='$password' where id='$userid' ";
                 $result = mysqli_query($this->db, $sql);

                 if($result = true){
                      
                         $this->msg('Data updated Succesfully');

                         $this->redirect('index.php');
                      
                  }
        }

    }

    public function delete($userid){
         $sql = "delete from users where id='$userid'";
         $result = mysqli_query($this->db, $sql);
         
         if($result = true){
              
                 $this->msg('Data Deleted Succesfully');

                 $this->redirect('index.php');
         	  
          }
        
    }

    public function msg($msg){
    	echo "<script>alert('$msg')</script>";
    }

    public function redirect($path){
    	echo "<script>window.location.href='$path'</script>";
    }

    

}
       
?>