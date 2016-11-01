<?php

Class MY_Form_validation extends CI_Form_validation {

    public function price($str){
        $this->CI->form_validation->set_message('price', 'The {field} field must contain a price value.');
        if((bool) preg_match("/([0-9,]+(\.[0-9]{2})?)/", $str)){
            trim($str);
            $str = str_replace(',','',$str);
            return $str;
        }
        return FALSE;
    }

    function is_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.]', $table, $field);

            return isset($this->CI->db)
                ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'status' => 1))->num_rows() === 0)
                : FALSE;

    }

    function is_unique_multi($str, $fields) {
        $fields = explode('|',$fields);
        if(count($fields) >= 2 ){
            $table = $fields[0];
            $fields = explode(".",$fields[1]);
            if(!empty($fields) && count($fields) > 0  ){
                foreach ($fields as $k =>  $field){
                    $f= explode(":",$field);
                    $this->CI->db->where($f[0],isset($f[1])?$f[1]:$str);
                }
                return isset($this->CI->db)
                    ? ($this->CI->db->limit(1)->get($table)->num_rows() === 0)
                    : FALSE;
            }else{
                return false ;
            }
        } 
        return false ;
    }


}