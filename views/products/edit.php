<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="index.php?action=edit&id=<?php echo $id; ?>" method="POST">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Description: <input type="text" name="description" value="<?php echo $row['description']; ?>"><br>
        Price: <input type="text" name="price" value="<?php echo $row['price']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
