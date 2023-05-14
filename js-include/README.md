# js-include
```php
   <?php
    for ($i = 1; $i < 16; $i++) {
        $chart_id = "bar_chart_" . $i . "_1";

                echo <<<JS
               var {$chart_id} = new ApexCharts(document.querySelector("#{$chart_id}"), getBarChartData("First Value", [{$dp1}], "Second Value", [{$dp2}], [{$label}], ["#6c757d", "#28a745"]));
                    {$chart_id}.render();                                  
        JS;
    }
    ?>
    ```