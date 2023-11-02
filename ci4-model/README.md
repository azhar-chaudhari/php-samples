# Cache


## query cache
The getTasks method enables query caching before performing the query and disables it afterward. The query result will be cached, reducing the need to query the database again for the same data.
```php
   <?php
   //group by
    public function getTasks()
    {
        // Enable query caching
        $this->cacheOn();

        // Perform the query
        $query = $this->findAll();

        // Turn off caching
        $this->cacheOff();

        return $query;
    }
   
    ?>
```
## view cache
CodeIgniter also allows you to cache the output of views, reducing the need to regenerate the HTML for a page on every request. 
You can enable view caching for specific views:

Example 1:
```php
// In your controller method
$this->output->cache(60); // Cache the output for 60 seconds
$this->load->view('contact');
    ?>
```
Example 2:
```php
// In your controller method
$this->output->cache(60); // Cache the output for 60 seconds
$taskData=$model->getTasks();
$data = ['tasks' => $taskData];
// Load and render the view
$this->load->view('tasks', $data);
    ?>
```