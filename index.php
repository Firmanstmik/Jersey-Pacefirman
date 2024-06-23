<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jersey Pace | Firman Maulana</title>
    <link rel="stylesheet" href="stylee.css">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
    /* stylee.css */
    #recommendation-container {
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
        display: none;
        position: absolute;
        background-color: white;
        z-index: 1000;
        width: 300px;
    }

    #recommendation-container p {
        margin: 0;
        padding: 10px;
        cursor: pointer;
    }

    #recommendation-container p:hover {
        background-color: #f0f0f0;
    }

    .search-bar {
        position: relative;
    }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img src="img/Logo.png" alt="Logo Jersey Terbaik">
        </div>
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Cari produk...">
            <button type="button" id="search-button">Cari</button>
            <div id="recommendation-container"></div>
        </div>
        <div class="shop-info">
            <p>Jersey Pace | Firman Maulana</p>
        </div>
    </div>
    <nav>
        <ul> <?php include("page/navbar.php") ?> </ul>
    </nav>

    <?php include("content.php") ?>

    <?php include("page/user/keranjang.php") ?>
    <div class="footer">
        <p>created by | Pace/Abang Firman Maulana | all rights reserved</p>
    </div>

    <script>
    // Data produk contoh
    const products = [{
            id_barang: "1",
            sisa: "100",
            name: "Barcelona",
            url: "?page=belanja_detail&id=1&st=100"
        },
        {
            id_barang: "2",
            sisa: "50",
            name: "Real Madrid",
            url: "?page=belanja_detail&id=2&st=50"
        },
        {
            id_barang: "3",
            sisa: "50",
            name: "Argentina",
            url: "?page=belanja_detail&id=3&st=50"
        },
        {
            id_barang: "4",
            sisa: "100",
            name: "Liverpool",
            url: "?page=belanja_detail&id=4&st=100"
        },
        {
            id_barang: "5",
            sisa: "50",
            name: "Ac Milan",
            url: "?page=belanja_detail&id=5&st=50"
        },
        {
            id_barang: "6",
            sisa: "100",
            name: "Manchester City",
            url: "?page=belanja_detail&id=6&st=100"
        },
        {
            id_barang: "7",
            sisa: "50",
            name: "Bayern Munchen",
            url: "?page=belanja_detail&id=7&st=50"
        },
        {
            id_barang: "8",
            sisa: "50",
            name: "Dortmund",
            url: "?page=belanja_detail&id=8&st=50"
        }
    ];


    // Fungsi untuk menangani input pencarian dan menampilkan rekomendasi
    function searchProduct() {
        const input = document.getElementById('search-input').value.toLowerCase();
        const recommendationContainer = document.getElementById('recommendation-container');
        recommendationContainer.innerHTML = '';
        let found = false;

        products.forEach(product => {
            if (product.name.toLowerCase().includes(input) && input !== "") {
                const recommendation = document.createElement('p');
                recommendation.innerText = product.name;
                recommendation.onclick = () => window.location.href = product.url;
                recommendationContainer.appendChild(recommendation);
                found = true;
            }
        });

        if (!found && input !== "") {
            const noResult = document.createElement('p');
            noResult.innerText = 'Barang yang anda cari tidak ada';
            recommendationContainer.appendChild(noResult);
        }

        recommendationContainer.style.display = 'block';
    }

    // Menyembunyikan rekomendasi ketika mengklik di luar area rekomendasi
    document.addEventListener('click', function(event) {
        const recommendationContainer = document.getElementById('recommendation-container');
        const searchInput = document.getElementById('search-input');
        if (!recommendationContainer.contains(event.target) && !searchInput.contains(event.target)) {
            recommendationContainer.style.display = 'none';
        }
    });

    // Menambahkan event listener ke tombol cari
    document.getElementById('search-button').addEventListener('click', searchProduct);

    // Mendengarkan event input pada kotak pencarian
    document.getElementById('search-input').addEventListener('input', searchProduct);
    </script>

</body>

</html>