# key-label-from-string
   create a function that takes a key, replaces underscores with spaces, and capitalizes the first letter of each word.
```php
   <?php

$text = "SR.No. ………………

PART – A – TO BE FILLED IN BY THE PARENTS / GUARDIAN
(Please fill the form in BLOCK CAPITALS)

1.    Name of the Students …………………………{name}…………………………….
2.    Date of Birth………………………{dob}…… Nationality……………… Mother Tongue………
3.    Whether Veg. / Non Veg. / Eggitarian……………………Dietary Restrictions……………
4.    Name of Mother…………………………………{mother_name}…………………………
5.    Name of Father…………………………………{father_name}………………………
6.    Occupation ……………………………………{occupation}………………………
7.    a)  Postal Address…………………………………{postal_address}……………………
    ……………………………
b) Email Address ………………………{email}………………………
    c)  Phone No(s) ………………………{phone}………………………
8.    Permanent Address ……….………………………{permanent_address}…………………………
9.    Number of real Brother(s) /Sister(s) studying in Amtul's (Name SR.No.& Class) :
    Name ……………{sibling_1_name}………….. SR.No. …………{sibling_1_sr_no}……… Class  …{sibling_1_class}……
    Name ……………{sibling_2_name}………….. SR.No. …………{sibling_2_sr_no}……… Class  …{sibling_2_class}……
    Name ……………{sibling_3_name}………….. SR.No. …………{sibling_3_sr_no}……… Class  …{sibling_3_class}……
10.    Name and address of the local guardian (if any) ………………………{local_guardian}………………
    Phone No(s) ……………{local_guardian_phone}…………";

function extractVariables($text) {
    preg_match_all('/\{([^}]+)\}/', $text, $matches);
    $variables = [];
    foreach ($matches[1] as $variable) {
        $variables[$variable] = null; // Initialize with null or any default value
    }
    return $variables;
}

// Function to generate label from key
function generateLabel($key) {
    // Replace underscores with spaces
    $key = str_replace('_', ' ', $key);
    // Capitalize the first letter of each word
    return ucwords($key);
}

$variablesArray = extractVariables($text);
$keysArray = array_keys($variablesArray);

// Create an array with keys and dynamically generated labels
$labelsArray = [];
foreach ($keysArray as $key) {
    $labelsArray[] = [
        'key' => $key,
        'label' => generateLabel($key)
    ];
}

print_r($labelsArray);
?>
    ```
## output
```txt
Array
(
    [0] => Array
        (
            [key] => name
            [label] => Name
        )

    [1] => Array
        (
            [key] => dob
            [label] => Dob
        )

    [2] => Array
        (
            [key] => mother_name
            [label] => Mother Name
        )

    [3] => Array
        (
            [key] => father_name
            [label] => Father Name
        )

    [4] => Array
        (
            [key] => occupation
            [label] => Occupation
        )

    [5] => Array
        (
            [key] => postal_address
            [label] => Postal Address
        )

    [6] => Array
        (
            [key] => email
            [label] => Email
        )

    [7] => Array
        (
            [key] => phone
            [label] => Phone
        )

    [8] => Array
        (
            [key] => permanent_address
            [label] => Permanent Address
        )

    [9] => Array
        (
            [key] => sibling_1_name
            [label] => Sibling 1 Name
        )

    [10] => Array
        (
            [key] => sibling_1_sr_no
            [label] => Sibling 1 Sr No
        )

    [11] => Array
        (
            [key] => sibling_1_class
            [label] => Sibling 1 Class
        )

    [12] => Array
        (
            [key] => sibling_2_name
            [label] => Sibling 2 Name
        )

    [13] => Array
        (
            [key] => sibling_2_sr_no
            [label] => Sibling 2 Sr No
        )

    [14] => Array
        (
            [key] => sibling_2_class
            [label] => Sibling 2 Class
        )

    [15] => Array
        (
            [key] => sibling_3_name
            [label] => Sibling 3 Name
        )

    [16] => Array
        (
            [key] => sibling_3_sr_no
            [label] => Sibling 3 Sr No
        )

    [17] => Array
        (
            [key] => sibling_3_class
            [label] => Sibling 3 Class
        )

    [18] => Array
        (
            [key] => local_guardian
            [label] => Local Guardian
        )

    [19] => Array
        (
            [key] => local_guardian_phone
            [label] => Local Guardian Phone
        )
)
```    