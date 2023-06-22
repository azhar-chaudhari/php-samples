# js-include
```php
    Datatable pass parameters
   <?php
    public function table_list()
    {
        $model = new TaskModel();
        $taskTypeModel = new TaskTypeModel();
        $data['task_type_data'] = $taskTypeModel->findAll();

        $data['date'] = $this->request->getPost('date');

        $data['draw'] = $this->request->getPost('draw');
        $data['start'] = $this->request->getPost('start');
        $data['length'] = $this->request->getPost('length') == 0 ? 10 : ($this->request->getPost('length') < 0 ? 0 : $this->request->getPost('length'));
        $data['searchValue'] = $this->request->getPost('search')['value'];
        $data['order_column'] = $this->request->getPost('order')['0']['column'];
        $data['order_dir'] = $this->request->getPost('order')['0']['dir'];
        return $model->task_list($data);
    }
    ?>
    ```