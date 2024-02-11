<div id="main">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <div class="page-heading">
        <h3>Halaman Prospek</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Detail data prospek
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor Whatsapp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="listProspek">

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
                    <span class="btn badge bg-primary mt-3" id="tambah">Tambah Data Prospek</span>
                </div>
            </div>
        </div>
        
    </section>

    <!-- start modal -->
    <div class="modal fade" id="modalTambahProspek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tambah Prospek</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahProspek">
                        <!-- <input type="hidden" id="posisi" name="posisi" value="prospek"> -->
                        <div class="form-group mb-2">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="no_whatsapp">No Whatsapp</label>
                            <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="tambahBuku">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditProspek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Prospek</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditProspek">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="form-group mb-2">
                            <label for="edit-nama">Nama</label>
                            <input type="text" class="form-control" id="edit-nama" name="edit-nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit-no_whatsapp">No Whatsapp</label>
                            <input type="text" class="form-control" id="edit-no_whatsapp" name="edit-no_whatsapp">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="simpanEdit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalkeCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Masukkan data tambahan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formPindah">
                        <input type="hidden" id="update-id" name="id">
                        <div class="form-group mb-2">
                            <label for="update-nama">Nama</label>
                            <input type="text" class="form-control" id="update-nama" name="update-nama" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="update-no_whatsapp">No Whatsapp</label>
                            <input type="text" class="form-control" id="update-no_whatsapp" name="update-no_whatsapp" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="pindahCustomer">Tambahkan sebagai customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script>
        $(function(){
            // start of function
            tampilkanData();

            // tambah
            $('#tambah').click(function() {
                $('#modalTambahProspek').modal('show');
            })
            $('#formTambahProspek').submit(function(e){
                e.preventDefault(); 
                tambahProspek();
                $('#modalTambahProspek').modal('hide');
            })

            // edit
            $('#listProspek').on('click', '#edit', function() {
                console.log("diklik kah?");
                var idnya = $(this).data('id');
                cariProspek(idnya);
                $('#modalEditProspek').modal('show');
                console.log("id update yang diklik adalah : " + idnya);
            })
            $('#formEditProspek').submit(function(e){
                e.preventDefault(); 
                updateProspek();
                $('#modalEditProspek').modal('hide');
            })

            // ganti
            $('#listProspek').on('click', '#ubah', function() {
                console.log("diklik kah?");
                var idnya = $(this).data('id');
                cariProspek2(idnya);
                $('#modalkeCustomer').modal('show');
                console.log("id ubah yang diklik adalah : " + idnya);
            })
            $('#formPindah').submit(function(e){
                e.preventDefault(); 
                pindah();
                $('#modalkeCustomer').modal('hide');
            })

            // hapus
            $('#listProspek').on('click', '#hapus', function() {
                var idnya = $(this).data('id');
                hapusProspek(idnya);
                console.log("id hapus yang diklik adalah : " + idnya);
            })

            // end of function
        })

        function tampilkanData(){
            $.ajax({
                // ajax start
                url: 'http://localhost/crm/index.php/api/prospek',
                method: 'GET',
                dataType: 'json',
                cache: false,
                success: function(data){
                    console.log("ambil berhasil");
                    // start success
                    let prospek = data.prospek;
                    $.each(prospek, function(index,prospek){
                        $('#listProspek').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${prospek.nama}</td>
                                <td>${prospek.no_whatsapp}</td>
                                <td>
                                    <span class="btn badge bg-danger mx-1" id="hapus" data-id="${prospek.id_prospek}">Hapus</span>
                                    <button class="btn badge bg-warning mx-1" id="edit" data-id="${prospek.id_prospek}">Edit</button>
                                    <span class="btn badge bg-light mx-1" id="ubah" data-id="${prospek.id_prospek}">Jadikan Customer</span>
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

        function tambahProspek(){
            let dataProspek = {
                "nama" : $("#nama").val(),
                "no_whatsapp" : $("#no_whatsapp").val(),
                "posisi" : "prospek"
            }

            console.log(dataProspek);
            $.ajax({
                // ajax start
                method: 'POST',
                url: 'http://localhost/crm/index.php/api/prospek/add/',
                dataType: 'json',
                data : dataProspek,
                success: function(response){
                    console.log(response);
                    resetValue();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }

        function hapusProspek(id){
            $.ajax({
                // ajax start
                method: 'DELETE',
                url: 'http://localhost/crm/index.php/api/prospek/remove/' + id,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    console.log(id);
                    resetValue();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }

        function cariProspek(id){
            $.ajax({
                // ajax start
                method: 'GET',
                url: 'http://localhost/crm/index.php/api/prospek/cariEdit/' + id,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    console.log("namanya adalah : " + response.prospek[0].nama);
                    $('#edit-id').val(id);
                    $('#edit-nama').val(response.prospek[0].nama);
                    $('#edit-no_whatsapp').val(response.prospek[0].no_whatsapp);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }

        function cariProspek2(id){
            $.ajax({
                // ajax start
                method: 'GET',
                url: 'http://localhost/crm/index.php/api/prospek/cariEdit/' + id,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    console.log("namanya adalah : " + response.prospek[0].nama);
                    $('#update-id').val(id);
                    $('#update-nama').val(response.prospek[0].nama);
                    $('#update-no_whatsapp').val(response.prospek[0].no_whatsapp);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }

        function updateProspek(){
            let id = $('#edit-id').val();
            let dataProspek = {
                "nama" : $("#edit-nama").val(),
                "no_whatsapp" : $("#edit-no_whatsapp").val()
            }
            $.ajax({
                // ajax start
                method: 'POST',
                url: 'http://localhost/crm/index.php/api/prospek/update/' + id,
                dataType: 'json',
                data: dataProspek,
                success: function(response){
                    console.log(response);
                    resetValue();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }

        function pindah(){
            let dataCustomer = {
                "id_prospek" : $("#update-id").val(),
                "alamat" : $("#alamat").val(),
                "posisi" : "customer"
            }
            $.ajax({
                // ajax start
                method: 'POST',
                url: 'http://localhost/crm/index.php/api/prospek/up',
                dataType: 'json',
                data: dataCustomer,
                success: function(response){
                    console.log(response);
                    resetValue();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }
        
        function updatePosisi(){
            let id = $('#update-id').val();
            let dataProspek = {
                "posisi" : "customer"
            }
            $.ajax({
                // ajax start
                method: 'POST',
                url: 'http://localhost/crm/index.php/api/prospek/status/' + id,
                dataType: 'json',
                data: dataProspek,
                success: function(response){
                    console.log(response);
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
            $('#listProspek').empty();
            tampilkanData();
        }
    </script>
    <!-- <script src="<?= base_url(); ?>public/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/static/js/pages/datatables.js"></script> -->
</div>