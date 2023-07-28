# Year List 
```php
    Year List (Group By),Previous Year(group by,where,limit,order_by)
   <?php
    public function getYearList()
    {
        $this->select('period');
        $this->groupBy('period ');
        return $this->get()->getResultArray();
    }
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
    public function single_order($id = 0)
    {
        $this->select("orders.*,user_addresses.*");
        $this->join("user_addresses",'user_addresses.user_id=orders.user_id');
        $this->where('orders.id', $id);
        $this->limit(1);
        return $this->get()->getRowArray();
    }
    public function order_detail($id = 0)
    {
        $this->select("order_items.*,products.title,description,products.price as start_price,image");
        $this->join("products",'products.id=order_items.product_id');
        $this->where('order_id', $id);
        return $this->get()->getResultArray();
    }
    ?>
```
