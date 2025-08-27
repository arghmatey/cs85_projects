<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Inventory</title>
    <style>
    body { font-family: system-ui; padding: 2rem;}
    h1 { text-align: center; }
    table { border-collapse: collapse; max-width: 800px; width: 100%; margin: 0 auto; background: #fff; border-radius: 4px; }
    th, td { border: 1px solid #ddd; padding: .5rem;}
    th { background:#e1866a; }
  </style>
</head>
<body>
    <h1>Personal Inventory</h1>
    <?php
    function renderTable($items) {
        echo "<table>";
        echo "<tr><th>Item</th><th>Category</th><th>Quantity</th><th>Purchase Date</th></tr>";

        foreach ($items as $item) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['item_name']) . "</td>";
            echo "<td>" . htmlspecialchars($item['category']) . "</td>";
            echo "<td>" . htmlspecialchars($item['quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($item['purchase_date']) . "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }

    try {
        $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "testpassword");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("SELECT * FROM items ORDER BY purchase_date DESC");
        $items = $stmt->fetchALL(PDO::FETCH_ASSOC);

        renderTable($items);

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    // ----- REFLECTION -----
    // I selected these specific items because I use them the most or are planning on using them soon. In real applications, a small program like this would be scaled to control inventory for warehouses, user accounts, or retail stock. Using PDO, input data and queries are seperated. This ensures input data is seem as values only, not executable code. To include something I learned in the preivous assignment, I added htmlspecialchars to prevent XSS when rendering into the table. 
    ?>
</body>
</html>
