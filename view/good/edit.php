<html>
    <body>
        <div style="color: red;"><?php echo $this->view->message; ?></div>
        <form method="post" action="index.php?ctrl=good&act=edit">
            <input type="hidden" value="<?php echo $this->view->good->getId(); ?>" name="id" />
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $this->view->good->getName(); ?>" />
            <label for="desc">Description:</label>
            <input type="text" name="desc" value="<?php echo $this->view->good->getDescription(); ?>" />
            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo $this->view->good->getPrice(); ?>" />
            <label for="cat">Category:</label>
            <select name="cat">
                <?php foreach ($this->view->cats as $cat) { ?>
                <option <?php if ($cat['id'] == $this->view->good->getCategory_id()) echo 'selected'; ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" />
        </form>
    </body>
</html>

