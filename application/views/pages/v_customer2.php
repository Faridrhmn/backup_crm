<div id="main">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <div class="page-heading">
        <h3>Halaman Customer</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Detail data customer
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="listCustomer">
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

    <!-- start modal -->
    <div class="modal fade" id="modalEditCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Customer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditCustomer">
                        <input type="hidden" id="edit-id-customer" name="id">
                        <input type="hidden" id="edit-id-prospek" name="id">
                        <div class="form-group mb-2">
                            <label for="edit-nama">Nama</label>
                            <input type="text" class="form-control" id="edit-nama" name="edit-nama">
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit-no_whatsapp">No Whatsapp</label>
                            <input type="text" class="form-control" id="edit-no_whatsapp" name="edit-no_whatsapp">
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit-alamat">Alamat</label>
                            <input type="text" class="form-control" id="edit-alamat" name="edit-alamat">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="simpanEdit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalkeAgen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Masukkan data tambahan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formPindah">
                        <input type="hidden" id="pindah-id" name="id">
                        <input type="hidden" id="pindah-id2" name="id">
                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="pindahCustomer">Tambahkan sebagai agen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script>
        $(function(){
            // start 
            tampilkanData();

            // hapus
            $('#listCustomer').on('click', '#hapus', function() {
                var id_customer = $(this).data('id-customer');
                var id_prospek = $(this).data('id-prospek');
                hapusCustomer(id_customer, id_prospek);
                // console.log(id);
            });

            // edit
            $('#listCustomer').on('click', '#edit', function() {
                console.log("diklik kah?");
                var idnya = $(this).data('id');
                cariCustomer(idnya);
                $('#modalEditCustomer').modal('show');
                console.log("id update yang diklik adalah : " + idnya);
            });
            $('#formEditCustomer').submit(function(e){
                e.preventDefault(); 
                updateCustomer();
                $('#modalEditCustomer').modal('hide');
            })

            // ke Agen
            $('#listCustomer').on('click', '#ubah', function() {
                console.log("diklik kah?");
                var idnya = $(this).data('id');
                cariCustomer2(idnya);
                $('#modalkeAgen').modal('show');
                console.log("id update yang diklik adalah : " + idnya);
            });
            $('#formPindah').submit(function(e){
                e.preventDefault(); 
                pindah();
                $('#modalkeAgen').modal('hide');
                resetValue();
            })
            // end
        })

        function tampilkanData(){
            $.ajax({
                // ajax start
                url: 'http://localhost/crm/index.php/api/customer',
                method: 'GET',
                dataType: 'json',
                cache: false,
                success: function(data){
                    console.log("ambil berhasil");
                    // start success
                    let customer = data.customer;
                    $.each(customer, function(index,customer){
                        $('#listCustomer').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${customer.nama}</td>
                                <td>${customer.no_whatsapp}</td>
                                <td>${customer.alamat}</td>
                                <td>
                                    <span class="btn badge bg-danger mx-1" id="hapus" data-id-customer="${customer.id_customer}" data-id-prospek="${customer.id_prospek}">Hapus</span>
                                    <button class="btn badge bg-warning mx-1" id="edit" data-id="${customer.id_customer}">Edit</button>
                                    <span class="btn badge bg-light mx-1" id="ubah" data-id="${customer.id_customer}">Jadikan Agen</span>
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

        function hapusCustomer(id_customer, id_prospek){
            console.log("punya prospek : " + id_prospek);
            console.log("punya customer : " + id_customer);
            $.ajax({
                // ajax start
                method: 'DELETE',
                url: 'http://localhost/crm/index.php/api/customer/remove/' + id_customer + '/' + id_prospek,
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

        function cariCustomer(id){
            $.ajax({
                // ajax start
                method: 'GET',
                url: 'http://localhost/crm/index.php/api/customer/cariData/' + id,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    console.log("namanya adalah : " + response.customer[0].nama);
                    $('#edit-id-customer').val(id);
                    $('#edit-id-prospek').val(response.customer[0].id_prospek);
                    $('#edit-nama').val(response.customer[0].nama);
                    $('#edit-no_whatsapp').val(response.customer[0].no_whatsapp);
                    $('#edit-alamat').val(response.customer[0].alamat);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }

        function cariCustomer2(id){
            $.ajax({
                // ajax start
                method: 'GET',
                url: 'http://localhost/crm/index.php/api/customer/cariData/' + id,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    console.log("namanya adalah : " + response.customer[0].nama);
                    $('#username').val(response.customer[0].no_whatsapp);
                    $('#password').val(response.customer[0].no_whatsapp);
                    $('#pindah-id').val(response.customer[0].id_customer);
                    $('#pindah-id2').val(response.customer[0].id_prospek);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    console.log("ini error");
                }  

                // ajax end
            })
        }

        function updateCustomer(){
            let id_customer = $('#edit-id-customer').val();
            let id_prospek = $('#edit-id-prospek').val();
            let dataCustomer = {
                "nama" : $("#edit-nama").val(),
                "no_whatsapp" : $("#edit-no_whatsapp").val(),
                "alamat" : $("#edit-alamat").val()
            }
            console.log(dataCustomer);
            console.log("id milik prospek : " + id_prospek);
            console.log("id milik customer : " + id_customer);
            $.ajax({
                // ajax start
                method: 'POST',
                url: 'http://localhost/crm/index.php/api/customer/update/' + id_customer + '/' + id_prospek,
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

        function pindah(){
            let dataPindah = {
                "username" : $("#username").val(),
                "password" : $("#password").val(),
                "id_customer" : $("#pindah-id").val(),
                "id_prospek" : $("#pindah-id2").val(),
                "posisi" : "agen"
            }
            console.log(dataPindah);
            $.ajax({
                // ajax start
                method: 'POST',
                url: 'http://localhost/crm/index.php/api/customer/up',
                dataType: 'json',
                data: dataPindah,
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
            $("#listCustomer").empty();
            tampilkanData();
        }
    </script>
    <!-- <script src="<?= base_url(); ?>public/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/static/js/pages/datatables.js"></script> -->
</div>