$(document).ready(function () {
    $('#inputNama').on('change', function () {
        var nama = $(this).val();
        if (nama) {
            $.ajax({
                type:"post",
                url: "<?php echo base_url('ajax'); ?>",
                data:{ 
                    'nama':nama
                },
                success:function(data){
                    if (data > 0) {
                        alert('Nama Sudah Ada');
                        $('#inputNama').focus();
                    }
                }
            });
        }
    });
});
$(document).ready(function () {
    $('.nav-btn').on('click', function () {
        $('#side-bar').toggleClass('on-side');
        $('#content-bar').toggleClass('on-content');
    });
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
$(document).ready(function () {
    var filebox = document.getElementsByClassName('up-file');
    var filename = document.getElementsByClassName('nama-file');
    var iconplus = document.getElementsByClassName('up-plus');
    var iconcheck = document.getElementById('up-check');

    for (let j = 0; j < filebox.length; j++) {

    	let button = filebox[j];
    	let box = filename[j];
    	let icon = iconplus[j];

    	button.addEventListener( 'change', showFileName, false );

		function showFileName( event ) {
			var filebox = event.target.files;
			var namafile = filebox[0].name;

			box.textContent = ' '+namafile;
			icon.src = iconcheck.src;
		}
    }
});
$(document).ready(function () {
    var fileboxD = document.getElementsByClassName('dlt-img');
    var filenameD = document.getElementsByClassName('nama-file');
    var nilaiD = document.getElementsByClassName('dlt');
    var iconplusD = document.getElementsByClassName('up-plus');
    var iconaddD = document.getElementById('up-add');

    for (let j = 0; j < fileboxD.length; j++) {

        let buttonD = fileboxD[j];
        let boxD = filenameD[j];
        let iconD = iconplusD[j];
        let hasilD = nilaiD[j];
        let kata;
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
            kata = 'Bebas Org Terlarang';
        } else if (j==14) {
            kata = 'Pernyataan Referensi';
        } else if (j==15) {
            kata = 'Surat Terima Karyawan';
        }

        buttonD.addEventListener('click', showFileNameD, false);

        function showFileNameD( event ) {
            var fileboxD = event.target.files;

            boxD.textContent = ' '+kata;
            iconD.src = iconaddD.src;
            hasilD.value = 'kosong';
            console.log(hasilD.value);
        }
    }
});
$(document).ready(function(){
    let d = document.getElementsByClassName('detail');
    
    for (let i = 0; i<d.length; i++){
        let btnd = d[i];
        btnd.addEventListener("click", viewAll, true);

        function viewAll(){
        	$('.detailview').eq(i).toggle();
        }
    }
});
$(document).ready(function () {
    $('#inputNPWP').on('change', function () {
        var npwp = $(this).val();
        var dot = '.';
        var min = '-';
        var char;
        if (npwp) {
            char = npwp[0]+npwp[1]+dot+npwp[2]+npwp[3]+npwp[4]+dot+npwp[5]+npwp[6]+npwp[7]+dot+npwp[8]+min+npwp[9]+npwp[10]+npwp[11]+dot+npwp[12]+npwp[13]+npwp[14];
            $('#tonpwp').val(char);
        }
    });
});
$(document).ready(function(){
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
});
$(document).ready(function() {
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
    });
});
$(document).ready(function(){
    var btn = document.getElementsByClassName('show');
    var src = document.getElementsByClassName('resource');

    for (let i = 0; i < btn.length; i++) {

        let btnsrc = btn[i];
        let text = src[i];

        btnsrc.addEventListener( 'click', getSrc, false );

        function getSrc( event ) {
            let src = text.value.split('.');
            if (src[3]=='jpg' || src[3]=='jpeg' || src[3]=='png') {
                $('.modal-body').html(`
                    <img src="${text.value}" width="465" height="500">
                    `);
            } else {
                $('.modal-body').html(`
                    <iframe src="${text.value}" width="465" height="500" frameborder="0"></iframe>
                    `);
            }
        }
    }  
});
$(document).ready(function(){
    var all = document.getElementById('cb-all');
    var cb = document.getElementsByClassName('cb');
    var jmlcb = cb.length;
    var jml = '';
    var ar = '';

    for (let i = 0; i < jmlcb; i++) {

        let check = cb[i];

        all.addEventListener('click', getVal, false);
        check.addEventListener( 'click', getValRow, false );

        function getVal( event ) {
            if (all.checked==true) {
                $('.cb').attr('checked', true);
                jml += check.value+'/';
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);
            } else {
                $('.cb').attr('checked', false);
                jml = '';
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);
            }
        }

        function getValRow( event ) {
            if (check.checked==true) {
                jml += check.value+'/';
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);
            } else {
                jml = jml.split(check.value+'/');
                jml += jml;
                ar = jml.split(',');
                jml = ar[1];
                $('#pdf').val(jml);
                $('#excel').val(jml);
                $('#cv').val(jml);
            }
        }
    }  
});
$(document).ready(function(){
    $('#cekalamat').on('click', function(){
        if ($('#cekalamat').is(':checked') ) {
            $('#inputAlamatRmh').val($('#inputAlamatKtp').val());
        } else {
            $('#inputAlamatRmh').val('');
        }
    });
});
$(document).ready(function(){
    $('#cekwa').on('click', function(){
        if ($('#cekwa').is(':checked') ) {
            $('#inputWA').val($('#inputTlp').val());
        } else {
            $('#inputWA').val('');
        }
    });
});
/*$(document).ready(function(){
    $('#inputDiv').on('change', function(){
        var div = $(this).val();
        if (div=='avsec') {
            $('#bLisensi').show();
        }
    })
});*/
$(document).ready(function(){
    var all = document.getElementById('cb-all');
    var cb = document.getElementsByClassName('cb');
    var jmlcb = cb.length;
    var jml = '';
    var ar = '';

    for (let i = 0; i < jmlcb; i++) {

        let check = cb[i];

        all.addEventListener('click', getVal, false);
        check.addEventListener( 'click', getValRow, false );

        function getVal( event ) {
            if (all.checked==true) {
                $('.cb').attr('checked', true);
                jml += check.value+'/';
                $('#idgaji').val(jml);
            } else {
                $('.cb').attr('checked', false);
                jml = '';
                $('#idgaji').val(jml);
            }
        }

        function getValRow( event ) {
            if (check.checked==true) {
                jml += check.value+'/';
                $('#idgaji').val(jml);
            } else {
                jml = jml.split(check.value+'/');
                jml += jml;
                ar = jml.split(',');
                jml = ar[1];
                $('#idgaji').val(jml);
            }
        }
    }  
});
$(document).ready(function(){
    var all = document.getElementById('cb-all');
    var cb = document.getElementsByClassName('cb');
    var jmlcb = cb.length;
    var jml = '';
    var ar = '';

    for (let i = 0; i < jmlcb; i++) {

        let check = cb[i];

        all.addEventListener('click', getVal, false);
        check.addEventListener( 'click', getValRow, false );

        function getVal( event ) {
            if (all.checked==true) {
                $('.cb').attr('checked', true);
                jml += check.value+'/';
                $('#idlembur').val(jml);
            } else {
                $('.cb').attr('checked', false);
                jml = '';
                $('#idlembur').val(jml);
            }
        }

        function getValRow( event ) {
            if (check.checked==true) {
                jml += check.value+'/';
                $('#idlembur').val(jml);
            } else {
                jml = jml.split(check.value+'/');
                jml += jml;
                ar = jml.split(',');
                jml = ar[1];
                $('#idlembur').val(jml);
            }
        }
    }  
});