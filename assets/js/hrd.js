// materialize
$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.tooltipped').tooltip();
    $('.modal').modal({
        dismissible:false
    });
    $('.materialboxed').materialbox();
    if ($(window).width() < 1582) {
        $('.medium').removeClass('ml');
    } else {
        $('.medium').addClass('ml');
    }
    $(window).resize(function(){
        if ($(window).width() < 1582) {
            $('.medium').removeClass('ml');
        } else {
            $('.medium').addClass('ml');
        }
    });
    $('#menu').on('click', function () {
        $('#side-bar').toggleClass('on-side');
        $('#content-bar').toggleClass('on-content');
    });
});

// konfirmasi password
$(document).ready(function(){
    $('#konfir').on('change', function(){
        if ($(this).val() != $('#pb').val()) {
            $('#modal-content').html('Password Baru & konfirmasi nya Harus Sama!!');
            $('.modal').modal('open');
            $('.modal-close').on('click', function(e){
                e.preventDefault();
                setTimeout(() => {
                    $('#pb').focus();
                },100);
                
            }); 
        }
    })
});

// modal Training Program
$(document).ready(function(){
    let sub = document.URL.split('.');
    let dir = sub[2].split('/');
    if (dir[1]=='tp') {
        $('#modal-content').html('COMING SOON');
        $('.modal').modal('open');
        $('.modal-close').on('click', function(){
            window.location = 'http://hrd.gatrans.net/input';
        });
    }
});

// input data & update data
$(document).ready(function () {
    $('#inputID').on('change', function () {
        let id = $(this).val();
        if (id) {
            $.ajax({
                type:"post",
                url: "http://hrd.gatrans.net/ajax-id",
                data:{'id':id},
                success:function(data){
                    if (data > 0) {
                        $('#modal-content').html('NIK Sudah Digunakan!!');
                        $('.modal').modal('open');
                        $('.modal-close').on('click', function(e){
                            e.preventDefault();
                            setTimeout(() => {
                                $('#inputID').focus();
                            },100);
                            
                        });
                    }
                }
            });
        }
    });

    $('#inputNama').on('change', function () {
        let nama = $(this).val();
        if (nama) {
            $.ajax({
                type:"post",
                url: "http://hrd.gatrans.net/ajax",
                data:{'nama':nama},
                success:function(data){
                     if (data > 0) {
                        $('#modal-content').html('NAMA Sudah Digunakan!!');
                        $('.modal').modal('open');
                        $('.modal-close').on('click', function(e){
                            e.preventDefault();
                            setTimeout(() => {
                                $('#inputNama').focus();
                            },100);
                            
                        });
                    }
                }
            });
        }
    });

    $('#tonpwp').val($('#inputNPWP').val());
    $('#inputNPWP').on('change', function () {
        let npwp = $(this).val();
        let dot = '.';
        let min = '-';
        let char;
        if (npwp) {
            if (npwp.length > 15) {
                char = npwp;
            } else {
                char = npwp[0]+npwp[1]+dot+npwp[2]+npwp[3]+npwp[4]+dot+npwp[5]+npwp[6]+npwp[7]+dot+npwp[8]+min+npwp[9]+npwp[10]+npwp[11]+dot+npwp[12]+npwp[13]+npwp[14];
            }
            $('#tonpwp').val(char);
        }
    });

    if ($('#inputSK').val() == 'SK2') {
        $('#singleDate').show();
        $('#labelResign').show();
        $('#labelPecat').hide();
        $('#labelMati').hide();
        $('#doubleDate').hide();
    } else if ($('#inputSK').val() == 'SK3') {
        $('#singleDate').show();
        $('#labelPecat').show();
        $('#labelResign').hide();
        $('#labelMati').hide();
        $('#doubleDate').hide();
    } else if ($('#inputSK').val() == 'SK6') {
        $('#singleDate').show();
        $('#labelMati').show();
        $('#labelPecat').hide();
        $('#labelResign').hide();
        $('#doubleDate').hide();
    } else if ($('#inputSK').val() == 'SK4') {
        $('#singleDate').hide();
        $('#doubleDate').show();
        $('#mulaiSkor').show();
        $('#akhirSkor').show();
        $('#mulaiCuti').hide();
        $('#akhirCuti').hide();
    } else if ($('#inputSK').val() == 'SK5') {
        $('#singleDate').hide();
        $('#doubleDate').show();
        $('#mulaiCuti').show();
        $('#akhirCuti').show();
        $('#mulaiSkor').hide();
        $('#akhirSkor').hide();
    } else if ($('#inputSK').val() == 'SK1') {
        $('#singleDate').hide();
        $('#doubleDate').hide();
        $('#mulaiCuti').hide();
        $('#akhirCuti').hide();
        $('#mulaiSkor').hide();
        $('#akhirSkor').hide();
    }
    if ($('#inputSK').val() == 'SK1' && $('#inputSK option:selected').text() == 'AKTIF') {
        $('#ganti').hide();
    } 

    $('#inputSK').on('change', function(){
        if ($('#inputSK').val() == 'SK2') {
            $('#singleDate').show();
            $('#labelResign').show();
            $('#labelPecat').hide();
            $('#labelMati').hide();
            $('#doubleDate').hide();
        } else if ($('#inputSK').val() == 'SK3') {
            $('#singleDate').show();
            $('#labelPecat').show();
            $('#labelResign').hide();
            $('#labelMati').hide();
            $('#doubleDate').hide();
        } else if ($('#inputSK').val() == 'SK6') {
            $('#singleDate').show();
            $('#labelMati').show();
            $('#labelPecat').hide();
            $('#labelResign').hide();
            $('#doubleDate').hide();
        } else if ($('#inputSK').val() == 'SK4') {
            $('#singleDate').hide();
            $('#doubleDate').show();
            $('#mulaiSkor').show();
            $('#akhirSkor').show();
            $('#mulaiCuti').hide();
            $('#akhirCuti').hide();
        } else if ($('#inputSK').val() == 'SK5') {
            $('#singleDate').hide();
            $('#doubleDate').show();
            $('#mulaiCuti').show();
            $('#akhirCuti').show();
            $('#mulaiSkor').hide();
            $('#akhirSkor').hide();
        } else if ($('#inputSK').val() == 'SK1') {
            $('#singleDate').hide();
            $('#doubleDate').hide();
            $('#mulaiCuti').hide();
            $('#akhirCuti').hide();
            $('#mulaiSkor').hide();
            $('#akhirSkor').hide();
        }
        if ($('#inputSK').val() == 'SK1' && $('#inputSK option:selected').text() == 'PENGGANTI') {
            $('#ganti').show();
        } else if ($('#inputSK').val() == 'SK1' && $('#inputSK option:selected').text() == 'AKTIF') {
            $('#ganti').hide();
        }
    });

    $('#cekwa').on('click', function(){
        if ($('#cekwa').is(':checked') ) {
            $('#inputWA').val($('#inputTlp').val());
        } else {
            $('#inputWA').val('');
        }
    });

    $('#cekalamat').on('click', function(){
        if ($('#cekalamat').is(':checked') ) {
            $('#inputAlamatRmh').val($('#inputAlamatKtp').val());
        } else {
            $('#inputAlamatRmh').val('');
        }
    });

    let filebox = document.getElementsByClassName('up-file');
    let filename = document.getElementsByClassName('nama-file');
    let iconplus = document.getElementsByClassName('up-plus');

    for (let j = 0; j < filebox.length; j++) {

        let button = filebox[j];
        let box = filename[j];
        let icon = iconplus[j];

        button.addEventListener( 'change', showFileName, false );

        function showFileName( event ) {
            let filebox = event.target.files;
            let namafile = filebox[0].name;

            box.textContent = ' '+namafile;
            icon.innerHTML = 'check';
        }
    }

    let fileboxD = document.getElementsByClassName('dlt-img');
    let filenameD = document.getElementsByClassName('nama-file');
    let iconplusD = document.getElementsByClassName('up-plus');
    let fileD = document.getElementsByClassName('up-file');
    let nilaiD = document.getElementsByClassName('dlt');

    for (let j = 0; j < fileboxD.length; j++) {

        let buttonD = fileboxD[j];
        let boxD = filenameD[j];
        let iconD = iconplusD[j];
        let hasilD = nilaiD[j];
        let file = fileD[j];

        let kata;
        let sub = document.URL.split('.');
        let dir = sub[2].split('/');

        if (fileboxD.length==1) {
            if (dir[1]=='akta') {
                kata = 'Pilih File Akta';
            } else if (dir[1]=='pks' || dir[1]=='pks-up') {
                kata = 'Pilih File PKS';
            } else if (dir[1]=='izin' || dir[1]=='izin-up') {
                kata = 'Pilih File Perizinan';
            }
        } else {
            if (j==0) {
                kata = 'Pilih Foto';
            } else if (j==1) {
                kata = 'Pilih KTP';
            } else if (j==2) {
                kata = 'Pilih NPWP';
            } else if (j==3) {
                kata = 'Pilih KK';
            } else if (j==4) {
                kata = 'Pilih SKCK';
            } else if (j==5) {
                kata = 'Pilih Ijazah Terakhir';
            } else if (j==6) {
                kata = 'Pilih Lisensi';
            } else if (j==7) {
                kata = 'Pilih Sertifikat';
            } else if (j==8) {
                kata = 'Pilih Pakta Integritas';
            } else if (j==9) {
                kata = 'Pilih Surat Pengangkatan';
            } else if (j==10) {
                kata = 'Pilih Surat Peringatan';
            } else if (j==11) {
                kata = 'Pilih Surat Pemberhentian';
            } else if (j==12) {
                kata = 'Pilih Surat Sehat';
            } else if (j==13) {
                kata = 'Pilih Pernyataan Bebas Org Terlarang';
            } else if (j==14) {
                kata = 'Pilih Surat Pernyataan Referensi';
            } else if (j==15) {
                kata = 'Pilih Surat Terima Karyawan';
            }
        }

        buttonD.addEventListener('click', showFileNameD, false);

        function showFileNameD( event ) {
            iconD.innerHTML = 'add';
            boxD.textContent = kata;
            if (dir[1]=='update') {
                hasilD.value = 'kosong';
            } else {
                file.value = '';
            }
        }
    }
});

//display data
$(document).ready(function(){
    let d = document.getElementsByClassName('detail');
    
    for (let i = 0; i<d.length; i++){
        let btnd = d[i];
        btnd.addEventListener("click", viewAll, false);

        function viewAll(){
        	$('.detailview').eq(i).toggle();
        }
    }

    let btn = document.getElementsByClassName('show');
    let src = document.getElementsByClassName('resource');

    for (let i = 0; i < btn.length; i++) {

        let btnsrc = btn[i];
        let text = src[i];

        btnsrc.addEventListener( 'click', getSrc, false );

        function getSrc( event ) {
            let src = text.value.split('.');
            if (src[3]=='jpg' || src[3]=='jpeg' || src[3]=='png') {
                if ($(window).width() >= 1345) {
                    $('.modal-content').html(`
                        <img src="${text.value}" width="330" height="300">
                        `);
                } else if ($(window).width() >= 977) {
                    $('.modal-content').html(`
                        <img src="${text.value}" width="230" height="300">
                        `);
                } else {
                    $('.modal-content').html(`
                        <img src="${text.value}" width="445" height="350">
                        `);
                }
            } else {
                if ($(window).width() >= 1345) {
                    $('.modal-content').html(`
                    <iframe src="${text.value}" width="450" height="300" frameborder="0"></iframe>
                    `);//330
                } else if ($(window).width() >= 977) {
                    $('.modal-content').html(`
                    <iframe src="${text.value}" width="450" height="300" frameborder="0"></iframe>
                    `);//230
                } else {
                    $('.modal-content').html(`
                    <iframe src="${text.value}" width="450" height="350" frameborder="0"></iframe>
                    `);//445
                }
            }
        }
    }
});

//close modal
$('.modal-close').on('click', function(e){
    e.preventDefault();
});

//button for printing
$(document).ready(function(){
    let all = document.getElementById('cb-all');
    let cb = document.getElementsByClassName('cb');
    let jmlcb = cb.length;
    let jml = '';
    let ar = '';

    for (let i = 0; i < jmlcb; i++) {

        let check = cb[i];

        all.addEventListener('click', getVal, false);
        check.addEventListener( 'click', getValRow, false );

        function getVal( event ) {
            if (all.checked==true) {
                $('.cb').prop('checked', true);
                jml += check.value+'/';
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);

                $('#idgaji').val(jml);

                $('#idlembur').val(jml);

            } else {
                $('.cb').prop('checked', false);
                jml = '';
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);

                $('#idgaji').val(jml);

                $('#idlembur').val(jml);
            }
        }

        function getValRow( event ) {
            if (check.checked==true) {
                jml += check.value+'/';
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);

                $('#idgaji').val(jml);

                $('#idlembur').val(jml);
            } else {
                jml = jml.split(check.value+'/');
                jml += jml;
                ar = jml.split(',');
                jml = ar[1];
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);

                $('#idgaji').val(jml);

                $('#idlembur').val(jml);
            }
        }
    }  
});