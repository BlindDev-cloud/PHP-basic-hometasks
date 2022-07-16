<tr>

    <th scope="row">
        <?php echo $_i + 1; ?>
    </th>

    <td>
        <?php
        echo $_name;
        ?>
    </td>

    <td>
        <?php
        echo number_format($_price, 2);
        ?>
    </td>

    <td>
        <?php
        echo $_count;
        ?>
    </td>

    <td>
        <?php
        echo number_format(round($_price * $_count, 2), 2);
        ?>
    </td>

</tr>