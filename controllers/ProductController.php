<?php
// controllers/ProductController.php
include_once '../config/Database.php';
include_once '../models/Product.php';

class ProductController {

    // Show all products
    public function index() {
        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);
        $stmt = $product->read();
        include_once '../views/products/index.php';
    }

    // Create a new product
    public function create() {
        if ($_POST) {
            $database = new Database();
            $db = $database->getConnection();
            $product = new Product($db);

            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];

            if ($product->create()) {
                header("Location: /tugas/MVC/public/index.php");
            }
        }
        include_once '../views/products/create.php';
    }

    // Update an existing product
    public function edit($id) {
        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);
        $product->id = $id;
        $stmt = $product->getSingle();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($_POST) {
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];

            if ($product->update()) {
                header("Location: /tugas/MVC/public/index.php");
            }
        }
        include_once '../views/products/edit.php';
    }

    // Delete a product
    public function delete($id) {
        $database = new Database();
        $db = $database->getConnection();
        $product = new Product($db);
        $product->id = $id;

        if ($product->delete()) {
            header("Location: /tugas/MVC/public/index.php");
        }
    }
}
?>
