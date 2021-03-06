<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_profile_pic extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function data($username){
        $data = $this->db->get_where('user_rating',array('username' => $username));
        if($data->num_rows()==1){
             return $data;
        }
        else{
            return false;
        }
       
    }
    function put_pic($pic){
      $this->db->where('username',$_SESSION['username']);
      $row=$this->db->get('users')->row();
      $row->pic=$pic;
       $this->db->where('username',$_SESSION['username']);
      $this->db->update('users',$row);
    }
    function check_user($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if($query->num_rows()==1){
            return TRUE;
        }
        else
            return FALSE;
    }
    function add($username){
      $data['username']=$username;
      $this->db->insert('user_rating',$data);
    }
    function get_user_rating($user){
     @ $this->db->where('rater',$_SESSION['username']);
      $this->db->where('rated',$user);
      $data=$this->db->get("rating_data");
      return $data;
    }



    function update($rating, $user){
    
      $dat['rater']=$_SESSION['username'];
      $dat['rated']=$user;
      $dat['rating']=$rating;
      $val['username']=$user;
      $this->db->where('rater',$_SESSION['username']);
      $this->db->where('rated',$user);
      $query=$this->db->get("rating_data");
       $row = $query->row(); 
       $rate=$row->rating;
      if($query->num_rows()==0){
        $this->db->where('rater',$_SESSION['username']);
        $this->db->where('rated',$user);
        $this->db->insert('rating_data',$dat);
         $data=$this->db->get_where('user_rating',array('username'=>$user));
         foreach ($data->result() as $key) {
           if($rating==5){
               $key->five=$key->five+1;
           }
           else if($rating==4){
                $key->four=$key->four+1;
           }
           else if($rating==3){
                $key->three=$key->three+1;
           }
            else if($rating==2){
                $key->two=$key->two+1;
           }
            else if($rating==1){
                $key->one=$key->one+1;
           }

          if($rate==5 &&  $key->five!=0){
               $key->five=$key->five-1;
           }
           else if($rate==4 && $key->four!=0){
                $key->four=$key->four-1;
           }
           else if($rate==3 && $key->three!=0){
                $key->three=$key->three-1;
           }
            else if($rate==2 && $key->two!=0){
                $key->two=$key->two-1;
           }
            else if($rate==1 && $key->one!=0){
                $key->one=$key->one-1;
           }
           

           $sum=$key->one + $key->two + $key->three + $key->four + $key->five;
          
          $u_rating=($key->five*5 + $key->four*4 + $key->three*3 + $key->two*2 + $key->one)/($sum);
          $this->db->where('username',$user);
          $u_user=$this->db->get('users')->row();
          $u_user->rating=$u_rating;
          $this->db->where('username',$user);
          $this->db->update('users',$u_user);
          $this->db->where('username',$user);
          $this->db->update('user_rating',$key);
         }
      }
      else{
      $this->db->where('rater',$_SESSION['username']);
      $this->db->where('rated',$user);
       $this->db->update('rating_data',$dat); 
       $data=$this->db->get_where('user_rating',array('username'=>$user));
       foreach ($data->result() as $key) {
         $this->db->where('username',$user);
        if($rating==5){
              $key->five=$key->five+1;
          }
          else if($rating==4){
               $key->four=$key->four+1;
          }
          else if($rating==3){
               $key->three=$key->three+1;
          }
           else if($rating==2){
               $key->two=$key->two+1;
          }
           else if($rating==1){
               $key->one=$key->one+1;
          }

         if($rate==5 &&  $key->five!=0){
               $key->five=$key->five-1;
           }
           else if($rate==4 && $key->four!=0){
                $key->four=$key->four-1;
           }
           else if($rate==3 && $key->three!=0){
                $key->three=$key->three-1;
           }
            else if($rate==2 && $key->two!=0){
                $key->two=$key->two-1;
           }
            else if($rate==1 && $key->one!=0){
                $key->one=$key->one-1;
           }
         $sum=$key->one + $key->two + $key->three + $key->four + $key->five;
          
          $u_rating=($key->five*5 + $key->four*4 + $key->three*3 + $key->two*2 + $key->one)/($sum);
          $this->db->where('username',$user);
          $u_user=$this->db->get('users')->row();
          $u_user->rating=$u_rating;
          $this->db->where('username',$user);
          $this->db->update('users',$u_user);


          $this->db->where('username',$user);
          $this->db->update('user_rating',$key);
      
      }
     
     
    }
  }

    function get_info($id){
        $data = $this->db->get_where('db_products', array('id' => $id));
        return $data;
    }
}