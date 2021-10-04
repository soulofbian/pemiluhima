<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon"
        href="<?= base_url(); ?>assets/images/favicon.png" />
    <title>Pemilu HIMA Informatika UNSIA</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= base_url(); ?>assets/css/font-awesome.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/css/owl-carousel.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/css/lightbox.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/countdown/sample.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="front" class="logo">
                            <img src="<?= base_url(); ?>assets/images/unsia_crop.png"
                                align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="#livecount">Final Count</a></li>
                            <li class="scroll-to-section"><a href="#hima">Sekilas HIMATI</a></li>
                            <li class="scroll-to-section"><a href="#kandidat">Kandidat</a></li>
                            <li class="scroll-to-section"><a href="" data-toggle="modal"
                                    data-target="#modalTatib">Ketentuan
                                    Pemilu</a></li>
                            <li class="scroll-to-section"><a href="#kontak">Hubungi Kami</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>PemiluHima</h4>
                            <h6>Informatika - Unsia</h6><br>
                            <center>
                              <!--  <button data-toggle="modal" data-target="#modalDaftar"
                                    class="btn btn-md btn-warning ">Daftar Voting</button>&nbsp;&nbsp; -->
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="img-fill">
                            <div class="inner-content">
                                <div id="countdown"></div>
                                <div class="container">
                                    <div class="special-card">
                                        <div class="special-content">
                                            <p> Terimakasih atas partisipasi anda dalam kegiatan e-voting dalam rangka pemilihan ketua HIMA Informatika Universitas Siber Asia<br><br></p>
                                            <p>HIMA Informatika, dari kita! untuk kita! milik kita!<br> 
                                            Bergerak bersama memajukan dunia informatika</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Beranda Area End ***** -->
    <!-- ***** Live Count Area Starts ***** -->
    <section class="section" id="livecount">
        <div class="container">
            <div class="row" data-aos="zoom-out-down">
                <div class="col-lg-6 col-md-4 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Final Count</h6>
                            <h2>Perhitungan perolehan suara</h2>
                            <p>Total suara <!-- diupdate pada <font color="blue"><?php echo date('d M Y H:m:i'); ?>
                                    WIB
                                </font>-->
                            </p>
                            <h1>
                                <?php foreach ($hitung as $item_hasil) {
    $jumlah_suara=$item_hasil->jumlah_suara;
    $pendaftar = $item_hasil->pendaftar;
}
$persen = ($jumlah_suara/294)*100;
$persen = bcdiv($persen, 1, 2);
    echo "$jumlah_suara <small>[$persen%]</small>";?>
                            </h1><br>
                            Pendaftar: <?php echo $pendaftar;?><br>
                            Mahasiswa Informatika <sup>*)aktif</sup> : 294
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <canvas id="myChart" width="100%" height="100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Live Count Area Ends ***** -->
    <!-- ***** Hima Area Starts ***** -->
    <section class="section" id="hima">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12" data-aos="fade-right">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Tentang HIMATIF</h6>
                            <h2>Himpunan Mahasiswa Informatika</h2>
                        </div>
                        <p>Berawal dari keinginan kuat untuk ikut serta memajukan pendidikan di Indonesia, khususnya
                            pada jurusan Informatika Universitas Siber Asia maka diperlukan adanya wadah bagi para
                            mahasiswa agar lebih terstruktur dan teroganisir dengan baik dalam suatu Himpunan Mahasiswa
                            Jurusan. </p>
                        <p>
                            Hima Informatika dibentuk diawali dengan pemilihan ketua HIMA yang nantinya akan menyusun
                            beberapa agenda kegiatan bersama pengurus inti terpilih.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12" data-aos="fade-left">
                    <div class="right-content">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/mjSf_yoJepg"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** hima Area Ends ***** -->
    <!-- ***** Kandidat Area Starts ***** -->
    <section class="section" id="kandidat">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Kandidat</h6>
                        <h2>Calon Ketua HIMA Informatika</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    <?php
                    foreach ($kandidat as $item) {
                        echo '
                        <div class="item">
                        <div class="card" style="background-image: url(' . base_url() . 'assets/images/kandidat/'.$item->nim.'.jpg);">
                            <div class="price"><h6>'.$item->id.'</h6></div>
                        
                            <div class="info">
                              
                              <div class="main-text-button" style="text-align:center;">
                              <h1 class="title">'.$item->nama.'</h1>
                            <div class="scroll-to-section"><button nim="'.$item->nim.'" class="btn btn-info btn-md profil-kandidat">Detail Kandidat No '.$item->id.'</button></div>
                              </div>
                            </div>
                        </div>
                    </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kandidat Area Ends ***** -->
    <!-- ***** Kontak Area Starts ***** -->
    <section class="section" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Hubungi Kami</h6>
                            <h2>Informasi pemilu HIMA</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>WA & Telpon</h4>
                                    <span><a href="#">0817-6564-556</a><br><a href="#">0821-1439-8959</a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Email</h4>
                                    <span><a href="#">unsia.himainformatika@gmail.com</a><br><a
                                            href="#">panitia@pemiluhima.scriptnesia.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kontak Area Ends ***** -->
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <div class="logo">
                            <a href="<?= base_url(); ?>"><img
                                    src="<?= base_url(); ?>assets/images/logo_putih.png"
                                    alt=""></a>
                        </div>
                        <!-- <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Panitia Pemilu HIMA Informatika
                            <br>Universitas Siber Asia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FORM DAFTAR -->
    <div class="modal fade" id="modalDaftar" tabindex="-1" role="dialog" aria-labelledby="modalDaftar"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Pendaftaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-daftar">
                    <div id="pesandaftar"></div>
                    <form id="daftar">
                        <!-- SECURE SECURE SECURE -->
                        <input type="hidden"
                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <fieldset>
                                    <input name="nim" type="text" id="nim" placeholder="NIM*" required=""
                                        autocomplete="off">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <fieldset>
                                    <input name="nama" type="text" id="nama" placeholder="Nama Mahasiswa" disabled>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Email (terdaftar di siakad)*" required="" autocomplete="off">
                                </fieldset>
                            </div>
                            <div class="col-lg-12" style="margin-top:30px;">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button-icon">DAFTAR</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Tatib -->
    <div class="modal fade" id="modalTatib" tabindex="-1" role="dialog" aria-labelledby="modalTatib" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ketentuan Pemilu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <img src="<?=base_url('assets/doc/tatib1.png')?>"
                    width="100%" alt=""><br>
                <img src="<?=base_url('assets/doc/tatib2.png')?>"
                    width="100%" alt="">
            </div>
        </div>
    </div>
    <!-- profil kandidat -->
    <div class="modal fade" id="modalProfil" tabindex="-1" role="dialog" aria-labelledby="modalProfil"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body content-profil">

                </div>
            </div>
        </div>
    </div>

    <script>
        const base_url = "<?= base_url(); ?>";
        const csrf = {
            data: 'data',
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
    </script>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>assets/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- Plugins -->
    <script src="<?= base_url(); ?>assets/js/owl-carousel.js"></script>
    <script src="<?= base_url(); ?>assets/js/accordions.js"></script>
    <script src="<?= base_url(); ?>assets/js/datepicker.js"></script>
    <script src="<?= base_url(); ?>assets/js/scrollreveal.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/waypoints.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/imgfix.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/slick.js"></script>
    <script src="<?= base_url(); ?>assets/js/lightbox.js"></script>
    <script src="<?= base_url(); ?>assets/js/isotope.js"></script>
    <script src="<?= base_url(); ?>assets/countdown/sv-countdown.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- JS BIKINAN SENDIRI -->
    <script src="<?= base_url(); ?>assets/js/pemiluhima_50.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(".profil-kandidat").click(function() {
            var nim = $(this).attr("nim");
            $(".content-profil").empty();
            $(".content-profil").html(
                '<img src="<?=base_url('assets/doc/cv/')?>' +
                nim + '.jpg" width="100%">');
            $("#modalProfil").modal("show");
        });
    </script>
    <script>
        AOS.init();
    </script>
    <!-- Chart -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                                        foreach ($hitung as $item_hitung) {
                                            echo "'$item_hitung->nama',";
                                            $jumlah_suara=$item_hitung->jumlah_suara;
                                        }
                                        ?>
                ],
                datasets: [{
                    label: 'Perolehan Suara',
                    data: [
                        <?php
                                            foreach ($hitung as $item) {
                                                echo "'$item->hasil',";
                                            }
                                            ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(94, 6, 79, 0.2)',
                        'rgba(6, 94, 40, 0.2)',
                        'rgba(6, 30, 94, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(94, 6, 79, 1)',
                        'rgba(6, 94, 40, 1)',
                        'rgba(6, 30, 94, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- Global Init -->
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>
    <!-- daftar -->
    <script>
        $("#daftar").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?= base_url('daftar/dodaftar') ?>",
                data: $(this).serialize(),
                beforeSend: function() {
                    $("#form-submit").prop('disabled', true);
                    $("#form-submit").text('Mohon tunggu...');
                },
                success: function(response) {
                    $("#daftar").trigger("reset");
                    $("#form-submit").text('DAFTAR');
                    $("#form-submit").prop('disabled', false);
                    // apabila email tidak terdaftar
                    if (response == "invalid") {
                        $("#modalDaftar").modal("hide");
                        $.confirm({
                            title: 'Pesan Kesalahan!',
                            content: 'Email anda tidak terdaftar, gunakan email terdaftar di siakad',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                tryAgain: {
                                    text: 'Coba lagi',
                                    btnClass: 'btn-red',
                                    action: function() {
                                        $("#email").val('');
                                        $("#modalDaftar").modal("show");
                                    }
                                },
                                close: function() {
                                    $("#modalDaftar").modal("hide");
                                }
                            }
                        });
                    }
                    // apabila sudah pernah mendaftar
                    else if (response == "has_token") {
                        $("#modalDaftar").modal("hide");
                        $.confirm({
                            title: 'Informasi',
                            content: 'NIM dan alamat email ini sudah terdaftar, periksa kembali email anda pada folder inbox atau spam',
                            type: 'blue',
                            typeAnimated: true,
                            buttons: {
                                close: function() {
                                    $("#modalDaftar").modal("hide");
                                }
                            }
                        });
                    }
                    // apabila ga kekirim
                    else if (response == "notsend") {
                        $("#modalDaftar").modal("hide");
                        $.confirm({
                            title: 'Informasi',
                            content: 'Email tidak terkirim, dimungkinkan ada kendala dalam pengiriman email, coba beberapa saat lagi',
                            type: 'blue',
                            typeAnimated: true,
                            buttons: {
                                close: function() {
                                    $("#modalDaftar").modal("hide");
                                }
                            }
                        });
                    } else
                    // apabila baru mendaftar dan sukses mendaftar
                    {
                        $("#modalDaftar").modal("hide");
                        $.confirm({
                            title: 'Pendaftaran Berhasil',
                            content: 'Pendaftaran pemilih pemilu Hima Informatika sukses, buka link pada email yang kami kirimkan untuk melakukan voting. terimakasih',
                            type: 'green',
                            typeAnimated: true,
                            buttons: {
                                Tutup: {
                                    btnClass: 'btn-success',
                                    action: function() {}
                                },
                            }
                        });
                    }
                    var hasil = JSON.parse(response);
                    var no = 0;
                    $.each(hasil, function(i, item) {});
                }
            });
        });
        <?php echo $this->session->flashdata('msg');?>
    </script>
</body>

</html>