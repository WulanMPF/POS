<html>
    <head>
        <title>Home POS</title>
    </head>
    <body>
        <h1>Selamat Datang di Aplikasi Point of Sales!</h1>
        <a href="{{ url('/products') }}">Halaman Produk</a>
        <br>
        <a href="{{ url('/user/{id}/name/{name}') }}">Halaman User</a>
        <br>
        <a href="{{ url('/penjualan') }}">Halaman Transaksi Penjualan</a>
    </body>
</html>