
<?php


// // for迴圈
// for ($i = 1 ; $i<=9 ; $i++) {
//     for ($j = 1 ; $j<=9 ; $j++) {
//         echo "$i"."x"."$j"."=".$i*$j;
//         echo "&nbsp;";
//     }
//     echo "<br />";
// }

// echo "<hr>";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table border="0" align="center">
    
        <tr>
        <?php for ($i = 1 ; $i<=9 ; $i++) { ?>
               <?php for ($j = 1 ; $j<=9 ; $j++) {?>
                  <td><?php echo $i ?></td>
                  <td>x</td>
                  <td><?php echo $j ?></td>
                  <td>=</td>
                  <td><?php echo $i*$j ?></td>
                  <td> | </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>

    

    

   

    
    
    



     
</body>
</html>