<h2 align="center">Laporan Peminjaman buku</h2>

<table border="1" cellspacing="0" cellpadding="5" width="100%">

        <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
        </tr>
        <?php
        include "koneksi.php";
         $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM t_peminjaman LEFT JOIN t_user on t_user.userID = t_peminjaman.userID LEFT JOIN t_buku on t_buku.bukuID = t_peminjaman.bukuID");
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['tgl_peminjaman']; ?></td>
                    <td><?php echo $data['tgl_pengembalian']; ?></td>
                    <td><?php echo $data['statusPeminjaman']; ?></td>
            </tr>
            <?php
            }
            ?>
            </table>
            <script>
                window.print();
                setTimeout(function(){
                   window.close();
                }, 100); 
            </script>