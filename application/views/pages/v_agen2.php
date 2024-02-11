<div id="main">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <div class="page-heading">
        <h3>Halaman Agen</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Detail data agen
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor Whatsapp</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="listAgen">
                            <!-- <tr>
                                <td>0</td>
                                <td>Solid</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>Mana yaa alamatnya heheh kasih tau ga nih</td>
                                <td>hayo</td>
                                <td>
                                    <span class="btn badge bg-danger mx-1">Hapus</span>
                                    <span class="btn badge bg-warning mx-1">Edit</span>
                                </td>
                                <td>
                                    <span class="badge bg-success mx-1">Aktif</span>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                    <!-- start pagination -->
                    <div class="card-body">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-primary  justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end pagination -->
                </div>
            </div>
        </div>
        
    </section>
    <script>
        $(function(){
            // start 
            tampilkanData();

            $('#listAgen').on('click', '#hapus', function() {
                var id_akun = $(this).data('id-akun');
                var id_agen = $(this).data('id-agen');
                var id_customer = $(this).data('id-customer');
                var id_prospek = $(this).data('id-prospek');
                hapusAgen(id_customer, id_prospek, id_agen, id_akun);
                console.log("data punya id agen : " +id_agen);
                console.log("data punya id customer : " +id_customer);
                console.log("data punya id prospek : " +id_prospek);
                console.log("data punya id akun : " +id_akun);
                resetValue();
                // console.log(id);
            });

            // end
        })

        function tampilkanData(){
            $.ajax({
                // ajax start
                url: 'http://localhost/crm/index.php/api/agen',
                method: 'GET',
                dataType: 'json',
                cache: false,
                success: function(data){
                    console.log("ambil berhasil");
                    // start success
                    let agen = data.agen;
                    $.each(agen, function(index,agen){
                        $('#listAgen').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${agen.nama}</td>
                                <td>${agen.no_whatsapp}</td>
                                <td>${agen.alamat}</td>
                                <td>${agen.username}</td>
                                <td>
                                    <span class="btn badge bg-danger mx-1" id="hapus" data-id-customer="${agen.id_customer}" data-id-prospek="${agen.id_prospek}" data-id-akun="${agen.id_akun}" data-id-agen="${agen.id_agen}">Hapus</span>
                                    <button class="btn badge bg-warning mx-1" id="edit" data-id="${agen.id_customer}">Edit</button>
                                </td>
                            </tr>
                        `);
                    })
                    // end success
                },
                error: function(error) {
                    console.log('Gagal mengambil data:', error);
                }
                // ajax end
            });
        }
        
        function hapusAgen(id_customer, id_prospek, id_agen, id_akun){
            console.log("punya prospek : " + id_prospek);
            console.log("punya customer : " + id_customer);
            $.ajax({
                // ajax start
                method: 'DELETE',
                url: 'http://localhost/crm/index.php/api/agen/remove/' + id_customer + '/' + id_prospek + '/' + id_agen + '/' + id_akun,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    // console.log(id);
                    resetValue();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  
                // ajax end
            })
        }

        function resetValue(){
            $("#listAgen").empty();
            tampilkanData();
        }
    </script>
    <!-- <script src="<?= base_url(); ?>public/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/static/js/pages/datatables.js"></script> -->
</div>