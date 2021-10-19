<?php

echo '<h1>New Users</h1>';
$sql = "SELECT * FROM users ORDER BY date_registered";
$result = mysql_query($sql) or die(mysql_error());
echo '<table class="my-table-class">';
while ($row = mysql_fetch_assoc($result)) {
    echo '<tr><td>' . $row['username'] . '</td><td>' . $row['date_registered'] . '</td></tr>';
}
echo '</table>';
function random_custom_function($var)
{
    $var = $var + 1;
    return '<span style="font-weight:bold;">' . $var . '</span>';
}
$sql = "SELECT * FROM table WHERE column = 'test'";
$result = mysql_query($sql) or die(mysql_error());
echo '<div id="test">';
$i = 0;
while ($row = mysql_fetch_assoc($result)) {
    if ($row['type'] == 3) {
        echo '<div style="margin-bottom:20px;">' . random_custom_function($row['val']) . '</div>';
        $i++;
    } else {
        echo '<div style="margin-bottom:20px;">' . $row['val'] . '</div>';
    }
}
if ($i == 0) {
    echo '<table>';
    echo '<tr><td>Found none!</td></tr>';
    echo '</table>';
}
