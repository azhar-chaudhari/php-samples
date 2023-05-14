# php-debug

```php
   <?php

#array
 'q'=>$this->getLastQuery()->getQuery();

#data array from model
$data['q']=$this->getLastQuery()->getQuery();

#data array from controller
$data['q']=$model->getLastQuery()->getQuery();


d($data);
//or
print_r($data);


dd($data); 
//or
print_r($data);die();
    ?>

```