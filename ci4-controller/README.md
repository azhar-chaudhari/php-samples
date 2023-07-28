# Year List 
```php
<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Census2011Model;
use App\Models\StateModel;
use App\Models\LgdDistrictModel;
class TaskController extends BaseController
{

    public function index()
    {
        helper(['form', 'ci', 'view']);
        $data = array();
        $model = new TaskModel();
        $data['title'] = 'All Tasks';
        $data['tests'] = $model->getAllTasks();
        $data['validation'] = \Config\Services::validation();
        $data['base_url'] = base_url() . '/' . '';

        /*
            $user_id = session()->get('user_id');
            $CategoryModel =  new CategoryModel();
            $data['cats1'] = $CategoryModel->find($id);
            $data['cats2'] = $CategoryModel->where('user_id', $user_id)->first();
            $data['new_url'] = base_url() . "/" . (isAdmin() ? 'page1 : 'page2') . "/";
        */

        echo view('view_name', $data);
    }
    public function edit($task_id=0)
    {
        helper(['form', 'ci', 'view']);
        $data = array();
        $model = new TaskModel();
        $data['title'] = 'Task';
        $data['validation'] = \Config\Services::validation();
        $data['base_url'] = base_url() . '/' . '';
        $data['task'] = $model->find($task_id);
        /*
            $user_id = session()->get('user_id');
            $CategoryModel =  new CategoryModel();
            $data['cats1'] = $CategoryModel->find($user_id);
            $data['cats2'] = $CategoryModel->where('user_id', $user_id)->first();
            $data['new_url'] = base_url() . "/" . (isAdmin() ? 'page1 : 'page2') . "/";
            $data['is_data'] = !empty($data['cats1']) ? 1 : 0;
        */

        echo view('view_name', $data);
    }

    /*
    'bg_date' => dateYMD($this->request->getPost('bg_date')),
    'added_datetime' => date('Y-m-d H:i:s'),
    */

}    
    ?>
```
# Count total records
```php
 


```