<?php
try {
    $db = new PDO("sqlite:marii.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM cars";
    $result = $db->query($query);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Viga: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorent</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #fff; margin: 0; color: #333; }
        
        /* Navigatsioon */
        nav { display: flex; justify-content: space-between; align-items: center; padding: 15px 5%; border-bottom: 1px solid #eee; }
        .logo { font-weight: bold; font-size: 1.2rem; }
        nav a { margin: 0 10px; text-decoration: none; color: #666; font-size: 0.9rem; }

        /* Hero sektsioon */
        .hero { display: flex; align-items: center; background-color: #f9f9f9; margin: 20px 5%; border-radius: 15px; padding: 40px; overflow: hidden; }
        .hero-text { flex: 1; }
        .hero-text h1 { font-size: 2.5rem; margin-bottom: 10px; }
        .hero-image { flex: 1; text-align: right; }
        .hero-image img { width: 100%; max-width: 500px; border-radius: 10px; }
        .btn-black { background: #1a1a1a; color: white; padding: 12px 25px; border: none; border-radius: 5px; cursor: pointer; }

        /* Autode ruudustik */
        .container { width: 90%; margin: 40px auto; display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; }
        
        .car-card { border: 1px solid #eee; border-radius: 12px; overflow: hidden; transition: transform 0.2s; position: relative; }
        .car-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .car-card img { width: 100%; height: 180px; object-fit: cover; }
        
        .car-info { padding: 20px; }
        .car-info h3 { margin: 0; font-size: 1.1rem; }
        .car-info p { margin: 5px 0; color: #777; font-size: 0.85rem; }
        .price { font-weight: bold; color: #333; margin-top: 10px !important; }
        
        .rent-btn { width: 100%; background: #2d3436; color: white; border: none; padding: 12px; cursor: pointer; border-radius: 5px; margin-top: 10px; }
    </style>
</head>
<body>

    <nav>
        <div class="logo">Autorent</div>
        <div>
            <a href="#">Avaleht</a> <a href="#">Autod</a> <a href="#">Hinnad</a> <a href="#">Kontakt</a>
        </div>
        <input type="text" placeholder="Otsi autot...">
    </nav>

    <div class="hero">
        <div class="hero-text">
            <h1>Rendi auto soodsalt</h1>
            <p>Lai valik usaldusväärseid autosid igaks olukorraks.</p>
            <button class="btn-black">Vaata autosid</button>
        </div>
        <div class="hero-image">
            <img src="image.jpg" alt="Porshe"> </div>
    </div>

    <div class="container">
        <?php if (count($rows) > 0): ?>
            <?php foreach ($rows as $row): ?>
                <div class="car-card">
                    <img src="<?= htmlspecialchars($row['pilt']) ?>" alt="auto">
                    <div class="car-info">
                        <h3><?= htmlspecialchars($row['brand'] . " " . $row['model']) ?></h3>
                        <p><?= htmlspecialchars($row['year']) ?></p>
                        <p>Mootor: <?= htmlspecialchars($row['engine']) ?></p>
                        <p>Kütus: <?= htmlspecialchars($row['fuel']) ?></p>
                        <p class="price">Hind: <?= htmlspecialchars($row['price']) ?> €/päev</p>
                        <button class="rent-btn">Rendi</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; grid-column: 1/-1;">Andmebaas on tühi. Lisa sinna ridu!</p>
        <?php endif; ?>
    </div>

</body>
</html>