<?php
namespace App\Controllers;
use App\Models\CommandModel;

class CommandController extends BaseController
{
    public function index()
    {
        $model = new CommandModel();
        $data['commands'] = $model->findAll();
        return view('command_list', $data);
    }

    public function create()
    {
        return view('create_command');
    }
}
?>
