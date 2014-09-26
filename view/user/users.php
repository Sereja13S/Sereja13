<html>
    <head>
        <title>List of users.</title>
    </head>
    <body>
        <ul>
            <?php 
            foreach ($this->view->users as $user) {
                echo "<li>{$user->getName()}, \${$user->getEmail()}, \${$user->getPassword()}) (<a href=\"index.php?ctrl=user&act=editUser&id={$user->getId()}\">edit</a>)</li>";
            }
            ?>
        </ul>
        <a href="index.php?ctrl=user&act=editUser">add new</a>
    </body>
</html>