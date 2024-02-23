<html>
    <head>
        <title>Products POS</title>
    </head>
    <body>
        <h1>Selamat Datang di Halaman Produk!</h1>
        <h2>Kategori Produk</h2>
        <a href="{{ url('/category/food-beverage') }}">Food Beverage</a>
        <br>
        <a href="{{ url('/category/beauty-health') }}">Beauty Health</a>
        <br>
        <a href="{{ url('/category/home-care') }}">Home Care</a>
        <br>
        <a href="{{ url('/category/baby-kid') }}">Baby Kid</a>
        <br><br>
        <a href="{{ url('/home') }}">home</a>
    </body>
</html>