<?php

class First_controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('members_model');
    }
    public function index(){
        $this->load->view('members');
    }

    public function fetch_records(){
        $result = $this->members_model->fetch_members();
        $output = '';
      $output = '<table class="table">
                    <thead>
                    <tr><th>ID</th><th>Name</th><th>Email</th><th>Operation</th></tr>
                    </thead><tbody>';
        foreach($result as $res){
            $output .= "<tr class='success'><td>{$res['id']}</td><td>{$res['name']}</td><td>{$res['email']}</td>
                        <td><button class='edit-record' data-eid='{$res['id']}'>Edit</button> <button class='dlt' data-id='{$res['id']}'>Delete</button></td><tr>";
        }           
        $output .= '</tbody></table>';
        echo $output;
    }

    public function insert_records(){
        $params = array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'));
        $idd = $this->members_model->insert_records($params);
        if($idd){
            echo 'Inserted Successfully';
        }
        else{
            echo 'Not Inserted';
        }
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->members_model->delete($id);
        echo 'Record Deleted Successfully';
    }

    public function edit(){
        $id = $this->input->post('id');
        $result = $this->members_model->edit_members($id);
        $output = '';
      $output = '<table class="table"><tbody>';
        foreach($result as $res){
            $output .= "<tr class='success'><td><input type='text' id='edit_id' value='{$res['id']}'></td><br><td><input type='text' id='edit_name' value='{$res['name']}'></td><br></td><td><input type='text' id='edit_email' value='{$res['email']}'></td><br>
                        <td><button class='btn btn-success'>Save</button></td><tr>";
        }           
        $output .= '</tbody></table>';
        echo $output;
    }
}