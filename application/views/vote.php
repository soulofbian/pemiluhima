
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    
</head>
<body style="background-color:rgb(26, 26, 68);">
    <div class="container" style="margin-top:20px;">
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
<div class="card">
    <div class="card-header">
        <div class="card-titte"><b>KARTU SUARA</b> <br>Pemilu HIMA Informatika UNSIA</div>
    </div>
    <div class="card-body">
    <?php
foreach ($mahasiswa as $item_mhs) {
    echo "VOTER : $item_mhs->nama#$item_mhs->nim#$item_mhs->angkatan";
    echo "<input type='hidden' id='token' value='$item_mhs->token'>";
}
    ?>
    <br><br>
    <table class='table table-hover table-striped table-sm table-bordered'>
        <thead>
            <tr>
                <td style="color:white;background-color:black" colspan="3"><center>Calon Ketua HIMA Informatika</center></td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($kandidat as $item_kandidat) {
                    echo"
                    <tr>
                    <td style='text-align:center;' class='align-middle'>
                    <img src='".base_url()."assets/images/kandidat/".$item_kandidat->nim."_tmb.jpg' width='75px'>
                    </td>
                    <td class='align-middle'>
                    $item_kandidat->nama
                    </td>
                    <td style='text-align:center;' class='align-middle'>
                    <button nama='$item_kandidat->nama' nim='$item_kandidat->nim' class='btn btn-md btn-primary voteme'>Pilih</button>
                    </td>
                    </tr>";
                }
            ?>
            
        </tbody>
    </table>
    </div>
</div>
    </div>
</div>
</div>
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/js/popper.js"></script>

<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    var base_url='<?=base_url();?>';
    $(".voteme").click(function(){
        var nama=$(this).attr('nama');
        var nim=$(this).attr('nim');
        $.confirm({

title: 'VOTE!',

content: 'Yakin memilih '+nama+' ?',

type: 'green',

typeAnimated: true,

buttons: {

    Yakin: {

        text: 'Yakin',
        btnClass: 'btn-green',
        action: function() {
            var token=$("#token").val();
            window.open(base_url+'vote/dovote/'+token+'/'+nim,"_self");
        }

    },

    Tidak: {

        text: 'Tidak',
        btnClass: 'btn-red',
        action: function() {


}

},

}

});
    })
        
    
</script>
</body>
</html>