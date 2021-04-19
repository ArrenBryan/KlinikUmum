function confirmDelete(e) {
    if (confirm("Apakah Anda ingin menghapus baris ini?")) {
        return true;
    }

    e.preventDefault();
    return false;
}

function showModal(id_obat) {
    $('#stokInputModal' + id_obat).modal('show');
}

function setMedicalRecordForm(response) {
    let date = new Date(response.tanggal_lahir).toDateString();
    console.log(date);

    $('#umur_input').val(response.umur_pasien);
    $('#nama_input').val(response.nama_pasien);
    $('#tanggal_lahir_input').val(date);
    $('#tempat_lahir_input').val(response.tempat_lahir);
    $('#jenis_kelamin_input').val(response.jenis_kelamin);
    $('#no_telp_input').val(response.no_telp);
    $('#alamat_input').val(response.alamat);

    let table = $('#rekam_medis_table');
    date = new Date(response.tanggal_periksa).toDateString();
    let tableHTML = '';
    tableHTML += `
        <tr>
            <th scope="row">${date}</th>
            <td>${response.nama_dokter}</td>
            <td>${response.nama_diagnosa}</td>
            <td>${response.nama_obat}</td>
            <td>${response.dosis}</td>
            <td>${response.catatan ? response.catatan : '-'}</td>
        </tr>
    `;
    table.html(tableHTML);
}

function setMedicalRecordFormError() {
    $('#umur_input').val('');
    $('#nama_input').val('');
    $('#tanggal_lahir_input').val('');
    $('#tempat_lahir_input').val('');
    $('#jenis_kelamin_input').val('');
    $('#no_telp_input').val('');
    $('#alamat_input').val('');

    let table = $('#rekam_medis_table');
    let tableHTML = '';
    table.html(tableHTML);
}

function setLaporanDiagnosaForm(response) {
    let table = $('#laporan_diagnosa_table');
    let tableHTML = '';

    for (let data of response) {
        tableHTML += `
        <tr>
            <th scope="row">${data.kode_diagnosa}</th>
            <td>${data.nama_diagnosa}</td>
            <td>${data.jumlah}</td>
        </tr>
        `;
    }
    table.html(tableHTML);
}

function setDataDosis(response) {
    let table = $('#dosis_input');
    let tableHTML = '';
    let isDosisChanged = true;

    for (let data of response) {
        tableHTML += `
            <option value="${data.id_dosis}">${data.keterangan}</option>
        `;
    }
    table.html(tableHTML);
}

function setDataNamaObat(response) {
    let table = $('#nama_obat_input');
    let tableHTML = '';

    for (let data of response) {
        tableHTML += `
            <option value="${data.id_obat}">${data.nama}</option>
        `;
    }
    table.html(tableHTML);
}

function toggleMedicalResponseInputError(show, err) {
    if (!show) {
        $('#no_rekam_medis_input_error').hide();
        $('#no_rekam_medis_input_error').html('');
        return;
    }

    $('#no_rekam_medis_input_error').show();
    $('#no_rekam_medis_input_error').html(err);
}

function toggleDiagnosaResponseInputError(show, err) {
    if (!show) {
        $('#tanggal_diagnosa_input_error').hide();
        $('#tanggal_diagnosa_input_error').html('');
        return;
    }

    $('#tanggal_diagnosa_input_error').show();
    $('#tanggal_diagnosa_input_error').html(err);
    $('#laporan_diagnosa_table').html('');
}

const validateObatInput = () => {
    let id_dosis = $('#dosis_input').val();
    let id_kategoriobat = $('#kategori_obat_input').val();
    let jangka_waktu = $('#jangka_waktu_input').val();

    if (id_dosis == '' | id_kategoriobat == '' | jangka_waktu == '' | +jangka_waktu == NaN) {
        return false;
    }

    return true;
}

const toggleNamaObatEl = () => {
    if (!validateObatInput()) {
        $('#div_obat').hide();
        return;
    }

    $('#div_obat').show();
}

const fetchNamaObat = () => {
    let id_dosis = $('#dosis_input').val();
    let id_kategoriobat = $('#kategori_obat_input').val();
    let jangka_waktu = $('#jangka_waktu_input').val();

    if (!validateObatInput()) {
        return;
    }

    $.ajax({
        url: baseUrl + '/api/pemeriksaan-pasien/data-nama-obat?id_dosis=' + id_dosis + '&id_kategoriobat=' + id_kategoriobat + '&jangka_waktu=' + jangka_waktu,
        success: function (response) {
            setDataNamaObat(response);
        },
    });
}

$(document).ready(function () {
    $("#roles").change(function () {
        if ($(this).val() == "Dokter Umum") {
            $('#dokterField').show();
            $('#namaField').attr('required', '');
            $('#namaField').attr('data-error', 'This field is required.');
            $('#dateField').attr('required', '');
            $('#dateField').attr('data-error', 'This field is required.');
        } else {
            $('#dokterField').hide();
            $('#namaField').removeAttr('required');
            $('#namaField').removeAttr('data-error');
            $('#dateField').removeAttr('required');
            $('#dateField').removeAttr('data-error');
        }
    });
    $("#roles").trigger("change");

    $('#no_rekam_medis_input_full').change(function () {
        let value = $(this).val();

        $.ajax({
            url: baseUrl + '/api/rekam-medis/datafull/' + value,
            success: function (response) {
                setMedicalRecordForm(response);
                toggleMedicalResponseInputError(false);
            },
            error: function (response) {
                setMedicalRecordFormError();
                toggleMedicalResponseInputError(true, response.responseJSON.error_message);
            },
        });
    });
    $('#no_rekam_medis_input_error_full').hide();

    $('#no_rekam_medis_input').change(function () {
        let value = $(this).val();

        $.ajax({
            url: baseUrl + '/api/rekam-medis/data/' + value,
            success: function (response) {
                setMedicalRecordForm(response);
                toggleMedicalResponseInputError(false);
            },
            error: function (response) {
                setMedicalRecordFormError();
                toggleMedicalResponseInputError(true, response.responseJSON.error_message);
            },
        });
    });
    $('#no_rekam_medis_input_errorl').hide();

    $('#tanggal_diagnosa_input').change(function () {
        let value = $(this).val();

        $.ajax({
            url: baseUrl + '/api/laporan-diagnosa/data/' + value,
            success: function (response) {
                setLaporanDiagnosaForm(response);
                toggleDiagnosaResponseInputError(false);
            },
            error: function (response) {
                toggleDiagnosaResponseInputError(true, response.responseJSON.error_message);
            },
        });
    });
    $('#tanggal_diagnosa_input_error').hide();

    $("#kategori_obat_input").change(function () {
        let value = $(this).val();

        $('#dosis_input').val('');
        $('#dosis_input').html('');
        $('#jangka_waktu_input').val('');
        
        $.ajax({
            url: baseUrl + '/api/pemeriksaan-pasien/data-dosis/' + value,
            success: function (response) {
                setDataDosis(response);

                toggleNamaObatEl();
                if (!validateObatInput()) {
                    return;
                }
            
                fetchNamaObat();
            },
        });

    });
    
    $("#dosis_input").change(() => {
        toggleNamaObatEl();
        fetchNamaObat();
    });
    
    $("#jangka_waktu_input").change(() => {
        toggleNamaObatEl();
        fetchNamaObat();
    });

    toggleNamaObatEl();
    $("#kategori_obat_input").trigger("change");
});
