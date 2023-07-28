# validation
```php
   
    public function create()
    {
        $val = $this->validate([
            'person_name' => 'required|min_length[3]|max_length[50]',
            'mobile' => 'required|numeric',
            'email' => 'required|valid_email',
            'address' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
        ]);

        if (!$val) {
            session()->setFlashdata('message', lang('App.crud.fileds_cant_empty'));
            session()->setFlashdata('alert-class', 'alert-danger');
            //return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
            return redirect()->back()->withInput()->with('validation', $this->validator);
        } else {
            //other logic goes here
        }
    }    
    
```
# validation-html
```php
    <?php if ($validator->hasError('person_name')) { ?>
        <p><?php echo $validator->getError('person_name'); ?></p>
    <?php } ?>
```    
# validation-html
```php
   <?php
    if (session()->has('message')) {
    ?>
        <div class="alert <?= session()->getFlashdata('alert-class') ?>">
            <?= session()->getFlashdata('message') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>
``` 
# API
```php
            if (!$val) {
                return $this->fail($this->validator->getErrors());
            } else {
            }
```
# API
```php
   protected $validationRules = [
        'username'     => 'required|alpha_numeric_space|min_length[3]',
        'email'        => 'required|valid_email|is_unique[users.email]',
        'password'     => 'required|min_length[8]',
        'pass_confirm' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
    ];
    $model->setValidationRule($fieldName, $fieldRules);

    $fieldValidationMessage = [
    'name' => [
        'required'   => 'Your baby name is missing.',
        'min_length' => 'Too short, man!',
        ],
    ];
    $model->setValidationMessages($fieldValidationMessage);


    if ($model->save($data) === false) {
        return view('updateUser', ['errors' => $model->errors()]);
    }

    <?php if (! empty($errors)): ?>
    <div class="alert alert-danger">
    <?php foreach ($errors as $field => $error): ?>
        <p><?= esc($error) ?></p>
    <?php endforeach ?>
    </div>
    <?php endif ?>
 ```   