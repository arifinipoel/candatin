<?php

if ($_SESSION['tipe_login'] == "1") {
?>
    <ul class="sidebar-menu">
        <li class="active">
            <a href="main">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Realisasi</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="datakegiatan"><i class="fa fa-angle-double-right"></i> Master Kegiatan</a></li>
                <li><a href="masterkegiatan"><i class="fa fa-angle-double-right"></i> Data Dasar</a></li>
                <li><a href="realisasi"><i class="fa fa-angle-double-right"></i> Realisasi</a></li>
            </ul>
        </li>



        <li>
            <a href="account">
                <i class="fa fa-user"></i> <span>Ubah Password</span>
            </a>
        </li>
        <li>
            <a href="logout">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
        </li>



    </ul>
<?php
} elseif ($_SESSION['tipe_login'] == "2") {
?>
    <ul class="sidebar-menu">


        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Ekspor <i>(menurut)</i></span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

                <li><a href="eksporHs"><i class="fa fa-angle-double-right"></i> Kode HS</a></li>
                <li><a href="ekspornegaratujuan"><i class="fa fa-angle-double-right"></i>Komoditas dan Negara Tujuan</a></li>
                <li><a href="eksporNegaraTertentu"><i class="fa fa-angle-double-right"></i>Tujuan ke Negara Tertentu</a></li>
                <li><a href="eksporProvAsal"><i class="fa fa-angle-double-right"></i>Propinsi Asal</a></li>
                <li><a href="eksporPelabuhanMuat"><i class="fa fa-angle-double-right"></i>Pelabuhan Muat</a></li>

            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Impor <i>(menurut)</i></span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

                <li><a href="imporHs"><i class="fa fa-angle-double-right"></i> Kode HS</a></li>
                <li><a href="impornegaraasal"><i class="fa fa-angle-double-right"></i>Komoditas dan Negara Asal</a></li>
                <li><a href="imporNegaraTertentu"><i class="fa fa-angle-double-right"></i>Asal dari Negara Tertentu</a></li>
                <li><a href="imporPelabuhanBongkar"><i class="fa fa-angle-double-right"></i>Pelabuhan Bongkar</a></li>

            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Kode HS 10 Digit</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

                <li><a href="#"><i class="fa fa-angle-double-right"></i> Tanaman Pangan</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Hortikultura</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Perkebunan</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Peternakan</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Sarpras</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Kode HS 8 Digit</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

                <li><a href="#"><i class="fa fa-angle-double-right"></i> Tanaman Pangan</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Hortikultura</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Perkebunan</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Peternakan</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Sarpras</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-edit"></i> <span>Master Komoditas</span>
            </a>
        </li>
        <li>
            <a href="account">
                <i class="fa fa-user"></i> <span>Ubah Password</span>
            </a>
        </li>
        <li>
            <a href="logout">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
        </li>
    </ul>
<?php
} elseif ($_SESSION['tipe_login'] == "3") {
?>
    <ul class="sidebar-menu">

        <li class="active">
            <a href="main">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <!--
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>RK dan DPA</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="rk_wilayah"><i class="fa fa-angle-double-right"></i> Rencana Kegiatan</a></li>
                                <li><a href="dpa_wilayah"><i class="fa fa-angle-double-right"></i> DPA</a></li>
                                
                            </ul>
                        </li>
						!-->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

                <li><a href="rk_laporan_admin"><i class="fa fa-angle-double-right"></i> RK</a></li>
                <li><a href="dpa_laporan_admin"><i class="fa fa-angle-double-right"></i> DPA</a></li>
                <!--<li><a href="absensi"><i class="fa fa-angle-double-right"></i> Absensi</a></li>!-->
                <li><a href="lapKeuDaerah"><i class="fa fa-angle-double-right"></i> Keuangan Daerah</a></li>
                <li><a href="lapRekapKeuDaerah"><i class="fa fa-angle-double-right"></i> Rekap Realisasi Keuangan</a></li>
            </ul>
        </li>

        <li>
            <a href="account">
                <i class="fa fa-user"></i> <span>Ubah Password</span>
            </a>
        </li>
        <li>
            <a href="logout">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
        </li>
    </ul>
<?php
} elseif ($_SESSION['tipe_login'] == "4") {
?>
    <ul class="sidebar-menu">
        <li class="active">
            <a href="main">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="skpd">
                <i class="fa fa-user"></i> <span>Profile BAPEDA</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Persetujuan RK dan DPA</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <!--<li><a href="dpa"><i class="fa fa-angle-double-right"></i> DPA</a></li>!-->
                <li><a href="rk_approval"><i class="fa fa-angle-double-right"></i> Rencana Kegiatan</a></li>
                <li><a href="dpa_approval"><i class="fa fa-angle-double-right"></i> DPA</a></li>

            </ul>
        </li>

        <li>
            <a href="account">
                <i class="fa fa-user"></i> <span>Ubah Password</span>
            </a>
        </li>
        <li>
            <a href="logout">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
        </li>



    </ul>
<?php
}
?>
</section>