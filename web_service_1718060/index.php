<?php
$data = file_get_contents('mhs.json');
$mhs = json_decode($data, true);
$mhs = $mhs['mahasiswa'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

    <title>Profil Mahasiswa</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web Service Profile</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Features</a>
                    <a class="nav-item nav-link" href="#">Pricing</a>
                    <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Profil Mahasiswa</h1>
            </div>
        </div>

        <div class="row">
            <?php foreach ($mhs as $row) : ?>
                <div class="col-md-4" style="margin-bottom: 5%">
                    <div class="card" style=" height: 100%;">
                        <div class="card-header" style="height: 100%">
                            <img src="<?php echo $row['foto']; ?>" class="card-img-top" alt="..." style = "height: 350px ">
                        </div>
                        <div class="card-body">
                                    <h5 class="card-title"> <?php echo $row['nama']; ?></h5>
                                    <p class="card-text">Mahasiwa dengan NIM <?php echo $row['nim']; ?> ini berasal dari <?php echo $row['alamat_asal']; ?>.</p>
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['nim']; ?>">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <?php foreach ($mhs as $row) : ?>
        <div class="modal fade" id="modal<?php echo $row['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About <?php echo $row['nama'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container" >
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo $row['foto'];?>" class="card-img-top rounded-circle border border-info" alt="..." >
                    </div>
                    <div class="col-md-6">
                        <label class="control-label"><b><?php  echo $row['nama'] ?></b></label>
                        <hr>
                        <label><b>NIM :</b></label><br>
                        <p><?php echo $row['nim'] ?></p>
                        <hr>
                        <label><b>Jenis Kelamin :</b></label><br>
                        <p><?php  echo $row['jk'] ?></p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <label><b>Alamat Asal : </b><?php  echo $row['alamat_asal'] ?></label><br>
                        <hr>
                        <label><b>Alamat Malang : </b><?php  echo $row['alamat_mlg'] ?></label><br>                  
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
  <?php endforeach; ?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.rincian').on('click',function(){
                $('#detailprofil').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data['nim']);
                $('#nama').val(data['nama']);
            });
        });
    </script>
</body>

</html>