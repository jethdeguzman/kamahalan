
<?php
class User extends CI_Model
{
 function login($username, $password)
 {
     
   $this -> db -> select('id, username, password, status, type');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();
  

   if($query -> num_rows() == 1)
   {
    
     return $query->result();
   }
   else
   {
    
     return false;
   }
 }

 function showalluser(){
  $query = $this->db->get('users');
  return $query->result();
 }


 
}
?>

