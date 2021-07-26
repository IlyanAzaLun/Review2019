<?php
    include('../_header.php');
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">DashBoard</h1>
        <p>Web ini dibuat untuk memenuhi tugas Ulangan Akhir Semester Matakuliah Manajemen Basis Data,</p>
        <p>Pada kesempatan ini saya <strong style="color:#33a5ff" id="link">Iyang A.S / 18112015</strong> memilih <b>Aplikasi CRUD Perpustakaan</b> beserta dengan tampilan data transaksi.</p>
    </div>
<!-- /.container-fluid -->
<?php
    include('../_footer.php')
?>
<script>
    // alternative to load event
    document.onreadystatechange = function () {
        if (document.readyState == "complete") {
            document.getElementById('link').onclick = function() {
                window.open("https://github.com/ilyanazalun", "_blank");
            }
        }
    }
</script>