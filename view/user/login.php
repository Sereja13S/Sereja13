<html>
    <head>
        <title>Please log in</title>
    </head>
    <body>
        <div style="color: red;">
            <?php echo $this->view->message; ?>
        </div>
        <form method="post" action="?ctrl=user&act=logIn">
            <label for="name">User name:</label>
            <input type="text" name="name" id="name" />
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
            <input type="submit" />
        </form>
    </body>
</html>

