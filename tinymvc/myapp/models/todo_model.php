<?php
/**
 * Created by PhpStorm.
 * User: Penders
 * Date: 1/27/2015
 * Time: 9:39 PM
 */

class Todo_Model extends TinyMVC_Model
{
    //haal de todo's op om te tonen in de lijst
    function get_todos()
    {
        return $this->db->query_all('select * from todo');
    }

    //voeg een nieuwe todo toe
    function save_todos($description)
    {
        return $this->db->insert('todo',array('Description'=>$description,'Finished'=>'0'));
    }

    //update een todo
    function update_todo($id, $description, $finished) {
        $this->db->where('id',$id); // setup query conditions (optional)
        return $this->db->update('todo',array('Description'=>$description, 'Finished'=>$finished));
    }

    //verwijder een todo
    function delete_todo($id) {
        $this->db->where('id',$id);
        return $this->db->delete('todo',array('id'=>$id));
    }
}