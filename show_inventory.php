<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Inventory</title>
</head>
<body>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("SELECT * FROM items ORDER BY purchase_date DESC");
        $items = $stmt->fetchALL(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            echo "<p>{$item['item_name']} ({$item['quantity']} units)</p>";
        }

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    ?>
</body>
</html>