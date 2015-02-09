<?php
/**
 * Created by PhpStorm.
 * User: Penders
 * Date: 1/27/2015
 * Time: 9:50 PM
 */
class todo_Controller extends TinyMVC_Controller
{

    function index()
    {
        // load the model
        $this->load->model('Todo_Model', 'page');

        //insert van een nieuwe todo
        if (isset($_POST['submit'])) {
            if (isset($_POST['description_in'])) {
                $this->page->save_todos($_POST['description_in']);
            }
        }

        //update van een bestaande todo
        if (isset($_POST['do_update'])) {

            if (!isset($_POST['finished_in'])) {
                $finished = 0;
            } else {
                $finished = 1;
            }

            $this->page->update_todo($_GET['id'],$_POST['description_in'],$finished);
        }

        //verwijderen van een todo
        if (isset($_POST['delete'])) {
            $this->page->delete_todo($_GET['id']);
        }

        //view tonen
        $this->view->assign('todos',$this->page->get_todos());
        $this->view->display('todo_view');

    }
}