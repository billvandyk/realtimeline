/*
<option> elements have a special attribute named selected.

the element with this attribute will be preselected for the user, regardless of the order of the list.

heres a function i use to make select menus. it allows you to specify different text for the option than what the value is, although most of the time you will probably want them to be the same.
*/

<?php

function select_menu($name, $options, $selected) {
    $list = '';
    foreach ($options as $value => $text) {
        $is_selected = $value == $selected ? ' selected="selected"' : '';
        $list .= "  <option value=\\"$value\\"$is_selected>$text</option>\
";
    }
    return "<select name=\\"$name\\" id=\\"$name\\">\
$list</select>\
";
}

// usage

$options = array(
    'value for this option' => 'text displayed for this option',
    'Writer' => 'Writer',
    'Programmer' => 'Programmer',
    'Designer' => 'Designer'
);

$menu_name = 'title';
// you could grab selected_val from db
$selected_value = 'Designer';

echo select_menu($menu_name, $options, $selected_value);


?>