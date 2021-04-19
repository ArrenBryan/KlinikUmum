<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Rekam_Medis
{
    public static function get_full($id) {
        $dataRekamMedis = DB::select('
            SELECT
                a.no_medrec AS no_medrec, 
                a.nama AS nama_pasien,
                a.tempat_lahir AS tempat_lahir,
                a.jenis_kelamin AS jenis_kelamin,
                a.alamat AS alamat,
                menghitungumurpasien(?) AS umur_pasien, 
                a.tanggal_lahir AS tanggal_lahir,
                a.no_telp AS no_telp,
                b.tanggal AS tanggal_periksa,
                i.nama AS nama_dokter,
                d.nama AS nama_diagnosa,
                g.nama AS nama_obat, 
                h.keterangan AS dosis, 
                b.catatan AS catatan
        
            FROM pasien a
            JOIN medical_record b
            ON a.no_medrec = b.no_medrec
            JOIN medicalrecord_diagnosa c
            ON b.no_medrec = c.no_medrec
            JOIN diagnosa d
            ON c.id_diagnosa = d.id_diagnosa
            JOIN medicalrecord_resepobat e
            ON b.no_medrec = e.no_medrec
            JOIN resep_obat f
            ON e.id_resepobat = f.id_resepobat
            JOIN obat g
            ON f.id_obat = g.id_obat
            JOIN dosis h
            ON f.id_dosis = h.id_dosis
            JOIN dokter i
            ON b.NIP = i.NIP
            WHERE a.no_medrec = ?
        ', [$id, $id]);

        return $dataRekamMedis[0];
    }

    public static function get($id) {
        $dataRekamMedis = DB::select('SELECT nama as nama_pasien, tempat_lahir, jenis_kelamin, alamat, menghitungUmurPasien(?) AS umur_pasien, tanggal_lahir, no_telp FROM pasien WHERE no_medrec = ?', [$id, $id]);

        return $dataRekamMedis[0];
    }
}
