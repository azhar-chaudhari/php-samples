# Year List 
```php
    Year List (Group By),Previous Year(group by,where,limit,order_by)
   <?php
   //group by
    public function getYearList()
    {
        $this->select('period');
        $this->groupBy('period ');
        return $this->get()->getResultArray();
    }
    //single value
    public function getPreviousYear($currentYear='')
    {
        $this->select('period');
        $this->where('period <', $currentYear);
        $this->groupBy('period');
        $this->orderBy('period','desc');
        $this->limit(1);
        $result=$this->get()->getRowArray();
        return !empty($result) ?$result['period']:'';
    }
    //where join
    public function order_detail($id = 0)
    {
        $this->select("order_items.*,products.title,description,products.price as start_price,image");
        $this->join("products",'products.id=order_items.product_id');
        $this->where('order_id', $id);
        return $this->get()->getResultArray();
    }
    //like
    public function getOrders($category = '')
    {
        $this->select('*');
        $this->like('category', $category);       
        return $this->get()->getResultArray();
    }
    //single row
    public function single_order($id = 0)
    {
        $this->select("orders.*,user_addresses.*");
        $this->join("user_addresses",'user_addresses.user_id=orders.user_id');
        $this->where('orders.id', $id);
        $this->limit(1);
        return $this->get()->getRowArray();
    }
    //last row
    public function getLastLoginInfo($user_id = 0)
    {
        return $this->select('login_date,login_time')
            ->where('user_id', $user_id)
            ->get()->getLastRow();
    }
    public function checkActivationDetails($email)
    {
        $this->select('user_id');
        $this->where('email', $email);
        $query = $this->get();
        return !empty($query) ? $query->getNumRows():0;
    }
  
    //table
    public function getStates()
    {
        return $this->db->table('states')
            ->select('state_id as id, state_name as title')
            ->orderBy('state_name', 'asc')
            ->get()->getResultArray();
    }
    //delete
    public function deletePostBy($email=''){
        $this->delete('posts', array('user_email' => $email));
    }
    //optional where
    public function getStates($id=0)
    {
        $this->select('state_id as id, state_name as title');
            if($id>0){
                $this->where('state_id',$id);
            }
            
            $this->orderBy('state_name', 'asc');
            $this->get()->getResultArray();
    }
    //update single column
    public function updateOtp($id, $data)
    {
        return $this->where('user_id', $id)->set('otp', $data['otp'])->update();
    }
    //raw query
    public function rawQuery($sql)
    {
       return $this->query($sql);
    }
    /*
    $sql = 'SELECT * FROM some_table WHERE id = :id: ';
        $db->query($sql, [
            'id' => 3,
        ]);
    */
    //raw query with parameter
    public function rawQuery($sql,$parameters)
    {
       return $this->query($sql,$parameters);
    }
    //data from multiple tables
    public function order_detail($id = 0)
    {
        $this->select("table1.*");
        $this->where('id', $id);
        $data['column1']= $this->get()->getResultArray();

        $this->select("table2.*");
        $this->where('id', $id);
        $data['column2']= $this->get()->getResultArray();

        return $data;
    }
    //other examples
    /*
      concat_example :  concat(col_1,"-",col_2 )as title
      $this->where('period_type',$type);
      ->where('show_in_dropwdown','Y')
      ->where('period_date',date('Y-m-d',strtotime($period)))
    */
    //optional limit
    ?>
```
# Count total records
```php
 
$countRecords=$this->select('task_id')->countAllResults();

$countRecords=$this->select('count(task_id) as total')->get()->getRowArray()['total'];

 $userData = $model->select('*')->where('email', $email)->orderBy('suser_id', 'desc')->limit(1)->first();

 $taskModel->getTaskBycode($data['code']);
 $taskModel->getTaskBycode($code);
```