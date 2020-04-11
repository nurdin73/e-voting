$('#dataTable').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : false,
    'info'        : true,
    'autoWidth'   : false
})
var ctx = document.getElementById('pieChart');
function diagram() {
    var data_nama = [];
    var jumlah = []; 
    $.post("<?= base_url('admin/dataChart') ?>",
    function (data) {
        var json = JSON.parse(data);
        $.each(json.hasil, function (i, data) { 
            data_nama.push(data.nama);
            jumlah.push(data.jumlah);
        });
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data_nama,
                datasets: [{
                    label: '# Jumlah Voting',
                    data: jumlah,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                animation : false,
                hover : {
                    mode : 'index'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize : 1,
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    })
}
window.setInterval("diagram()", 1000);
window.setInterval("waktu()", 1);
function waktu() {
        var waktu = new Date();
        // setTimeout("waktu()", 1000);

        // Jam
        if (waktu.getHours() < 10) {
            document.getElementById("jam").innerHTML = "0"+ waktu.getHours();
        } else {
            document.getElementById("jam").innerHTML = waktu.getHours();
        }
        if(waktu.getMinutes() < 10) {
            document.getElementById("menit").innerHTML = "0"+ waktu.getMinutes();
        } else {
            document.getElementById("menit").innerHTML = waktu.getMinutes();
        }
        if (waktu.getSeconds() < 10) {
            document.getElementById("detik").innerHTML = "0" + waktu.getSeconds();
        } else {
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
        

        if (waktu.getDate() < 10) {
            document.getElementById("date").innerHTML = "0" + waktu.getDate();
        } else {
            document.getElementById("date").innerHTML = waktu.getDate();
        }
        document.getElementById("year").innerHTML = waktu.getFullYear();
        if (waktu.getMonth() == 0) {
            document.getElementById("month").innerHTML = "Januari";
        } else if(waktu.getMonth() == 1) {
            document.getElementById("month").innerHTML = "Februari";
        } else if(waktu.getMonth() == 2) {
            document.getElementById("month").innerHTML = "Maret";
        } else if(waktu.getMonth() == 3) {
            document.getElementById("month").innerHTML = "April";
        } else if(waktu.getMonth() == 4) {
            document.getElementById("month").innerHTML = "Mei";
        } else if(waktu.getMonth() == 5) {
            document.getElementById("month").innerHTML = "Juni";
        } else if(waktu.getMonth() == 6) {
            document.getElementById("month").innerHTML = "juli";
        } else if(waktu.getMonth() == 7) {
            document.getElementById("month").innerHTML = "Agustus";
        } else if(waktu.getMonth() == 8) {
            document.getElementById("month").innerHTML = "September";
        } else if(waktu.getMonth() == 9) {
            document.getElementById("month").innerHTML = "Oktober";
        } else if(waktu.getMonth() == 10) {
            document.getElementById("month").innerHTML = "November";
        } else if(waktu.getMonth() == 11) {
            document.getElementById("month").innerHTML = "Desember";
        }
    }

// form Data

$('#formData').submit(function (e) { 
    e.preventDefault();
    $('#formData').validate({
        rules : {
            nama_paslon : {
                required : true
            },
            visi : {
                required : true,
                minlength : 20
            },
            misi : {
                required : true,
                minlength : 100 
            },
            foto : {
                required : true
            }
        },
        messages : {
            nama_paslon : {
                required : 'Nama Paslon Harus Diisi'
            },
            visi : {
                required : 'Visi Wajib Diisi',
                minlength : 'Jumlah Huruf Minimal 30'
            },
            misi : {
                required : 'Misi Wajib Diisi',
                minlength : 'Jumlah Huruf Minimal 100'
            },
            foto : {
                required : 'Foto Wajib Ditambahkan',
            }
        },
        errorElement : "small",
        submitHandler : submitForm
    })
    function submitForm() {
        var formData = new FormData($('#formData')[0]);  
        $.ajax({
            xhr : function() {  
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {  
                    var percent = Math.round((e.loaded / e.total) * 100);
                    $('#percent').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '% Complete');
                });
                return xhr;
            },
            type: "POST",
            url: "<?= base_url('admin/calon/adds') ?>",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#percent').attr('aria-valuenow', 0).css('width',  '0%').text('');
                $('#formData')[0].reset();
                Swal.fire(
                    'Sukses!',
                    'Data Paslon Berhasil Ditambahkan',
                    'success'
                )
            },
            error: function (response) {  
                console.log(response);
            }
        });
    }
});


// modal detail paslon
$('.detail').click(function (e) { 
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        url: "<?= base_url('admin/detailCalon') ?>",
        data: {
            'id' : id
        },
        success: function (response) {
            var json = JSON.parse(response);
            $('#foto').attr('src', '<?= base_url('assets/dist/img/img-calon/') ?>' + json.foto);
            $('#nama').text(json.nama);
            $('#visi').text(json.visi);
            $('#misi').text(json.misi);
            $('#jml').text(json.vot);
        }
    });
});
// delete paslon
$('.hapus').click(function (e) { 
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: "Apakah anda ingin menghapus paslon?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Saya Yakin!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/calon/delete') ?>",
                data: {
                    'id' : id
                },
                success: function (response) {
                    Swal.fire(
                        'Sukses!',
                        'Data Paslon Berhasil Dihapus',
                        'success'
                    ).then((result) => {
                        window.location.href = '<?= base_url('admin/calon') ?>';
                    })
                },
                error: function (response) {  
                    Swal.fire(
                        'Error!',
                        'Data Paslon Gagal Dihapus',
                        'error'
                    )
                }
            });
        }
    });
});
// preview gambar
function prev(userfile, idpreview) {  
    var gb = userfile.files;
    for (var i = 0; i < gb.length; i++) {
        var gbprev = gb[i];
        var imageType = /image.*/;
        var preview = document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbprev.type.match(imageType)) {
            preview.file = gbprev;
            reader.onload = (function (element) {  
                return function(e) {
                    element.src = e.target.result;
                }
            })(preview);
            reader.readAsDataURL(gbprev);
        } else {
            alert("Type file harus .png, .jpg, .gif");
        }
        
    }
}
// edit gambar
// modal edit paslon
$('.edit').click(function (e) { 
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        type: "GET",
        url: "<?= base_url('admin/detailCalon') ?>",
        data: {
            'id' : id
        },
        success: function (response) {
            var json = JSON.parse(response);
            $('#preview').attr('src', '<?= base_url('assets/dist/img/img-calon/') ?>' + json.foto);
            $('#id').val(json.id);
            $('#nama2').val(json.nama);
            $('#visi2').val(json.visi);
            $('#misi2').val(json.misi);
        }
    });
});

// update data calon 
$('#editData').submit(function (e) { 
    e.preventDefault();
    $('#editData').validate({
        rules : {
            nama : {
                required : true
            },
            visi : {
                required : true,
                minlength : 20
            },
            misi : {
                required : true,
                minlength : 100 
            },
            foto : {
                required : true
            }
        },
        messages : {
            nama : {
                required : 'Nama Paslon Harus Diisi'
            },
            visi : {
                required : 'Visi Wajib Diisi',
                minlength : 'Jumlah Huruf Minimal 30'
            },
            misi : {
                required : 'Misi Wajib Diisi',
                minlength : 'Jumlah Huruf Minimal 100'
            },
            foto : {
                required : 'Foto Wajib Ditambahkan',
            }
        },
        errorElement : "small",
        submitHandler : updateData
    })
    function updateData() {
        var editData = new FormData($('#editData')[0]);
        $.ajax({
            xhr : function() {  
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {  
                    var percent = Math.round((e.loaded / e.total) * 100);
                    $('#per').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '% Complete');
                });
                return xhr;
            },  
            type: "POST",
            url: "<?= base_url('admin/calon/update') ?>",
            data: editData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#per').attr('aria-valuenow', 0).css('width',  '0%').text('');
                Swal.fire(
                    'Sukses!',
                    'Data Paslon Berhasil Dirubah!',
                    'success'
                ).then((result) => {
                    window.location.href = '<?= base_url('admin/calon') ?>';
                })
            },
            error: function (response) {
                var err = JSON.parse(response);
                Swal.fire(
                    'Gagal!',
                    'Terjadi Kesalahan Pada Proses Update!' + err.error,
                    'error'
                )
            }
        });
    }
});