<?php

class Connect
{
    private const hostName = "localhost";
    private const userName = "root";
    private const password = "";
    private const db = "cafe_db";

    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect(self::hostName, self::userName, self::password, self::db);
    }

    public function insert(array $post, string $table): bool
    {
        $colms = [];
        $values = [];
        foreach ($post as $key => $value) {
            $colms[] = "`" . $key . "`";
            $values[] = "'" . $this->con->real_escape_string($value) . "'";
        }
        $colmsString = implode(',', $colms);
        $valuesString = implode(',', $values);

        if ($this->con->query("INSERT INTO $table ($colmsString) VALUES ($valuesString)")) {
            return true;
        }

        return false;
    }

    public function select(string $table): array
    {
        $rows = $this->con->query("SELECT * FROM $table");
        $data = [];
        if ($rows && $rows->num_rows > 0) {
            $data = $rows->fetch_all(MYSQLI_ASSOC);
        }
        return $data;
    }

    public function selectOne(string $table, int $id)
    {
        $row = $this->con->query("SELECT * FROM $table WHERE id = $id LIMIT 1");

        $data = [];
        if ($row && $row->num_rows > 0) {
            $data = $row->fetch_assoc();
        }
        return $data;
    }

    public function destory(string $table, int $id): bool
    {
        if ($this->con->query("DELETE FROM $table WHERE id = $id")) {
            return true;
        }

        return false;
    }

    public function update(array $post, string $table, int $id): bool
    {
        $args = [];
        foreach ($post as $key => $value) {
            $escaped = $this->con->real_escape_string($value);
            $args[] = "`$key` = '$escaped'";
        }
        $sql = "UPDATE $table SET " . implode(', ', $args) . " WHERE id = $id";
        return $this->con->query($sql) ? true : false;
    }

    public function login(string $email, string $password)
    {
        $email = $this->con->real_escape_string($email);
        $password = $this->con->real_escape_string($password);
        $row = $this->con->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1");
        if ($row && $row->num_rows > 0) {
            return $row->fetch_assoc();
        }
        return false;
    }

    public function delete(string $table, int $id): bool
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        return $this->con->query($sql) ? true : false;
    }

    public function addToCart(int $userId, int $productId): bool
{
    $check = $this->con->query(
        "SELECT id, quantity FROM cart 
         WHERE user_id = $userId AND product_id = $productId 
         LIMIT 1"
    );

    if ($check && $check->num_rows > 0) {

        $item = $check->fetch_assoc();
        $newQuantity = $item['quantity'] + 1;

        return $this->con->query(
            "UPDATE cart 
             SET quantity = $newQuantity 
             WHERE id = {$item['id']}"
        );
    }

    return $this->con->query(
        "INSERT INTO cart (user_id, product_id, quantity)
         VALUES ($userId, $productId, 1)"
    );
}


public function getCart(int $userId): array
{
    $query = "
        SELECT 
            cart.id,
            cart.product_id,
            cart.quantity,
            products.name,
            products.price,
            products.image
        FROM cart
        INNER JOIN products
            ON cart.product_id = products.id
        WHERE cart.user_id = $userId
    ";

    $result = $this->con->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    return [];
}

}
