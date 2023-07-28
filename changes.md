# php-8 changes

strtolower
strtotime
Expected type 'string'. Found 'null'.
 
```php
<?php 
// ?? ''
// ?? '1970-01-01'
$email = strtolower($this->request->getPost("email")??'');

$form_date = date('Y-m-d', strtotime($this->request->getPost('form_date')));
$form_date = date('Y-m-d', strtotime($this->request->getPost('form_date') ?? '1970-01-01'));

```
count
```php
<?php 
$nums = count($this->request->getPost('subjects') ?? array());
```