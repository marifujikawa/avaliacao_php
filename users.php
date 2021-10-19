<?php


# Regra
$userQuery = "SELECT * FROM users ORDER BY date_registered";
$users = mysql_query($userQuery) or die(mysql_error());


$tableQuery = "SELECT * FROM table WHERE column = 'test'";
$tables = mysql_query($tableQuery) or die(mysql_error());


?>
<!-- # Html -->
<h1>New Users</h1>
<table class="users-table">

    <?php while ($row = mysql_fetch_assoc($users)) { ?>

        <tr>
            <td><?php echo  $row['username'];  ?></td>
            <td><?php echo  $row['date_registered'];  ?></td>
        </tr>

    <?php } ?>

</table>

<div id="test">

    <?php while ($row = mysql_fetch_assoc($tables)) { ?>

        <?php if ($row['type'] == 3) { ?>

            <div class="table-value">
                <span><?php echo $row['val'] + 1; ?></span>
            </div>

        <?php } else { ?>

            <div class="table-value">
                <?php echo $row['val']; ?>
            </div>

        <?php } ?>

    <?php } ?>

    <?php if (!$tables) { ?>

        <div class="table-value">
            Found none!
        </div>

    <?php } ?>

</div>

<!-- # Style -->
<style type="text/css">
    .users-table {}

    #test.table-value {
        margin-bottom: 20px;
    }

    #test.table-value>span {
        font-weight: bold;
    }
</style>