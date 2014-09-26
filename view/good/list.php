<html>
    <head>
        <title>List of goods of category <?php echo $this->view->category;?></title>
    </head>
    <body>
        <ul>
            <?php 
            foreach ($this->view->goods as $good) {
                echo "<li>{$good->getName()}, \${$good->getPrice()} (<a href=\"index.php?ctrl=good&act=edit&id={$good->getId()}\">edit</a>)</li>";
            }
            ?>
        </ul>
        <a href="index.php?ctrl=good&act=edit">add new</a>
    </body>
</html>

