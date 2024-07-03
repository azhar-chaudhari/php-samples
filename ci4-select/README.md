# Select Dropdown


## Constant
\app\Config\Constants.php
```php
define('STATUS_DATA', [array('id'=>'Y','title'=>'Yes'),array('id'=>'N','title'=>'No')]);
```

## Controller
app\Controllers\CategoryController.php
```php
    public function add()
    {
        $data = array();
        $data['status_data'] = STATUS_DATA;
        echo view('category_create', $data);
    }
```
## Model -1
```php
  $checked_status= $row['category_status'] == 'Y' ? "checked" : " ";
  $col='<div class="form-group">
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="switch_status_'.$i.'" id="switch_status_'.$i.'" data-id="'.$i.'" data-status="'.$checked_status.'" '.$checked_status.'>
                <label class="custom-control-label" for="switch_status_'.$i.'"></label>
                </div>
                </div>';
```
## Model -2
```php
         $checked_status= $row['category_status'] == 'Y' ? 'Active' : 'Inactive',
```
## View - create
\app\Views\admin\category\category_edit.php
```html
    <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="name" class=" control-label">Status</label>
                                    <select id="category_status" name="category_status" class="form-control">
                                    <?php
                                        if (!empty($status_data)) {
                                            foreach ($status_data as $d) {
                                                echo '<option value="' . $d['id'] . '"  data-name="' . $d['title'] . '"  >' . $d['title'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
```

## View - edit
\app\Views\admin\category\category_edit.php
```html
    <div class="col-md-4">
                                <div class="form-group ">
                                    <label for="name" class=" control-label">Status</label>
                                    <select id="category_status" name="category_status" class="form-control">
                                   <?php
                                        if (!empty($status_data)) {
                                            foreach ($status_data as $d) {
                                                if ($d['id'] == $record['category_status']) {
                                                    $selected = "selected='selected'";
                                                } else {
                                                    $selected = '';
                                                }
                                                echo '<option value="' . $d['id'] . '"  data-name="' . $d['title'] . '"   ' . $selected . '>' . $d['title'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
```