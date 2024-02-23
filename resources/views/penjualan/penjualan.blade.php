<html>
    <head>
        <title>Penjualan POS</title>
        <style>
            /* CSS untuk styling */
            .container {
                display: flex;
                flex-direction: row;
            }
            .container > div {
                flex: 1;
                padding: 10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                cursor: pointer; /* Menambahkan cursor pointer */
            }
            th {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #f0f0f0; /* Mengubah warna latar belakang saat hover */
            }
        </style>
    </head>
    <body>
        <h1>Selamat Datang di Halaman Transaksi Penjualan!</h1>
        <div class="container">
            <div>
                <h2>Daftar Produk</h2>
                <table id="productTable">
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Keripik Singkong</td>
                        <td>17500</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Biskuit</td>
                        <td>9800</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Coklat</td>
                        <td>24900</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Air Mineral</td>
                        <td>3600</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Soda</td>
                        <td>5800</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Kopi</td>
                        <td>6500</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Kapas</td>
                        <td>8300</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Sheet Mask</td>
                        <td>16900</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Sunscreen</td>
                        <td>72500</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Obat Sakit Kepala</td>
                        <td>3000</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Obat Flu</td>
                        <td>4200</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Minyak Kayu Putih</td>
                        <td>21400</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Detergen</td>
                        <td>27700</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Pelembut Pakaian</td>
                        <td>23100</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Pewangi Pakaian</td>
                        <td>25400</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Susu Bayi</td>
                        <td>171200</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Popok Bayi</td>
                        <td>73200</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>Snack Bayi</td>
                        <td>10900</td>
                    </tr>
                </table>
            </div>
            <div>
                <h2>Rekap Pesanan</h2>
                <table id="orderTable">
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </table>
                <p>Total Harga: <span id="totalPrice">0</span></p>
                <label for="cash">Jumlah Uang Pelanggan:</label>
                <input type="number" id="cash" oninput="calculateChange()">
                <p>Kembalian: <span id="change">0</span></p>
            </div>
        </div>
        <script>
            // Function untuk menambahkan pesanan ke tabel rekap
            function addToOrder(id, name, price) {
                let table = document.getElementById("orderTable");
                let qty = prompt("Masukkan jumlah produk:");
                if (qty !== null && !isNaN(qty) && qty !== '') {
                    let row = table.insertRow();
                    let totalPrice = parseInt(qty) * parseInt(price);
                    row.innerHTML = `<td>${id}</td><td>${name}</td><td>${qty}</td><td>${totalPrice}</td><td><button onclick="removeOrder(this)">Delete</button></td>`;
                    calculateTotalPrice();
                } else if (qty !== '') {
                    alert("Masukkan jumlah yang valid!");
                }
            }
        
            // Function untuk menghapus pesanan dari tabel rekap
            function removeOrder(button) {
                let row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
                calculateTotalPrice();
            }
        
            // Function untuk menghitung total harga pesanan
            function calculateTotalPrice() {
                let totalPrice = 0;
                let table = document.getElementById("orderTable");
                for (let i = 1; i < table.rows.length; i++) {
                    totalPrice += parseInt(table.rows[i].cells[3].innerHTML);
                }
                document.getElementById("totalPrice").innerText = totalPrice;
                calculateChange();
            }
        
            // Function untuk menghitung kembalian
            function calculateChange() {
                let totalPrice = parseInt(document.getElementById("totalPrice").innerText);
                let cash = parseInt(document.getElementById("cash").value);
                let change = cash - totalPrice;
                if (!isNaN(change)) {
                    document.getElementById("change").innerText = (change >= 0 ? change : 0);
                }
            }
        
            // Menambahkan event listener pada setiap baris tabel produk
            let productRows = document.querySelectorAll("#productTable tr");
            productRows.forEach(row => {
                row.addEventListener("click", () => {
                    let cells = row.querySelectorAll("td");
                    let id = cells[0].innerText;
                    let name = cells[1].innerText;
                    let price = cells[2].innerText;
                    addToOrder(id, name, price);
                });
            });
        </script>
        <br>
        <a href="{{ url('/home') }}">home</a>
    </body>
</html>