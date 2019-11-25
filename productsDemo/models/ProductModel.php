<?php
class ProductModel{
    private function getPDO(){
        // connect to the database which is stores in the same files with .php
        $pdoCon = new PDO('sqlite:./testproducts.db',null,null,null);
        return $pdoCon;
    }

    public function getProducts(){
        try{
            $pdo=$this->getPDO();
            $sqlAllProducts='SELECT * FROM products';
            $pdoStatement=$pdo->query($sqlAllProducts);
            $products=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $products;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getProductById($id){
        try{
            $pdo=$this->getPDO();
            $sqlProductsById="SELECT * FROM products WHERE id=?";
            $pdoStatement=$pdo->prepare($sqlProductsById);
            $prodid=$id;
            $pdoStatement->bindParam(1,$prodid);
            $pdoStatement->execute();
            $product=$pdoStatement->fetch(PDO::FETCH_OBJ);
            $pdo=null;
            // var_dump($product);
            return $product;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function updateProduct($product){
        try{
            $pdo=$this->getPDO();
            $sqlUpdate="UPDATE products SET name=?, description=?, category=?, img=?, price=? WHERE id=?";
            $pdoStatement=$pdo->prepare($sqlUpdate);
            $pdoStatement->bindParam(1,$product->name);
            $pdoStatement->bindParam(2,$product->description);
            $pdoStatement->bindParam(3,$product->category);
            $pdoStatement->bindParam(4,$product->img);
            $pdoStatement->bindParam(5,$product->price);
            $pdoStatement->bindParam(6,$product->id);

            $pdoStatement->execute();
            $pdo=null;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function deleteProductById($id){
        try{
            $pdo=$this->getPDO();
            $sqlDelete="DELETE FROM products WHERE id=?";
            $pdoStatement=$pdo->prepare($sqlDelete);
            $pdoStatement->bindParam(1,$id);
            $pdoStatement->execute();
            $pdo=null;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function addProduct($product){
        try{
            $pdo=$this->getPDO();
            $sqlUpdate="INSERT INTO products (name,description,category,img,price) VALUES(?,?,?,?,?)";
            $pdoStatement=$pdo->prepare($sqlUpdate);
            $pdoStatement->bindParam(1,$product->name);
            $pdoStatement->bindParam(2,$product->description);
            $pdoStatement->bindParam(3,$product->category);
            $pdoStatement->bindParam(4,$product->img);
            $pdoStatement->bindParam(5,$product->price);

            $pdoStatement->execute();
            $pdo=null;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getProductsByCategory($category){
        try{
            $pdo=$this->getPDO();
            $sqlProductsByCategory="SELECT * FROM products WHERE category=?";
            $pdoStatement=$pdo->prepare($sqlProductsByCategory);
            $pdoStatement->bindParam(1,$category);
            $pdoStatement->execute();
            $products=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $products;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getAllCategory(){
        try{
            $pdo=$this->getPDO();
            $sqlAllCategory="SELECT DISTINCT(category) FROM products ";
            $pdoStatement=$pdo->query($sqlAllCategory);
            $categories=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $categories;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }
}
?>