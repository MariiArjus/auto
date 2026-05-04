<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="et">
<head>
<meta charset="UTF-8">
<title>Autorent</title>
<style>
body {
    font-family: Arial;
    margin: 0;
    background: #f5f5f5;
}

header {
    padding: 20px;
    background: white;
}

.hero {
    padding: 40px;
    background: #eaeaea;
}

.cars {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    padding: 40px;
}

.card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.card-content {
    padding: 15px;
}

button {
    width: 100%;
    padding: 10px;
    background: black;
    color: white;
    border: none;
    cursor: pointer;
}
</style>
</head>
<body>

<header>
    <h1>Autorent</h1>
</header>

<section class="hero">
    <h2>Rendi auto soodsalt</h2>
    <p>Lai valik autosid igaks olukorraks</p>
</section>

<section class="cars">

<?php
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
?>
    <div class="card">
        <img src="<?php echo $row['images']; ?>">
        <div class="card-content">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['type'] . " - " . $row['year']; ?></p>
            <p>Mootor: <?php echo $row['engine']; ?></p>
            <p>Kütus: <?php echo $row['fuel']; ?></p>
            <p>Hind: <?php echo $row['price_per_day']; ?> €/päev</p>
            <button>Rendi</button>
        </div>
    </div>
<?php
}
?>

</section>

</body>
</html>
