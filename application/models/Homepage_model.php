<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_model extends CI_Model {


    public function insert($post){

         $this->db->set($post)->insert('log');
         if($this->db->affected_rows() > 0){


             return true;
         }
         else{

             return false;

         }




    }


    public function login($post){


          $this->db->from('log');
          $this->db->WHERE(['ad'=>$post->ad,'sifre'=>$post->sifre]);
          $return_query=$this->db->get();

          if ($return_query->num_rows() > 0){

            return $return_query->row();
          }
          else{

              return false;
          }


    }

    public function update($post){


        $this->db->set($post)->where(['id' => $post->id])->update('log');
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }




    }


    public function liste($post){

        $this->db->from('liste');

        $return_query=$this->db->get();

        if ($return_query->num_rows() > 0){

            return $return_query->row();
        }
        else{

            return false;
        }



    }

  public function ekle($post){

        $this->db->set($post)->insert('liste');
        if($this->db->affected_rows() > 0){


          return true;
      }
        else{

          return false;

      }


  }




}