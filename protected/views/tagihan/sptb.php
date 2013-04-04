
<table >
    <tr style="vertical-align:top;">
        <td style="width:240px;"> 1. KODE KANTOR/SATUAN KERJA</td>
        <td>:&nbsp;</td>
        <td>675709</td>
    </tr>
    <tr style="vertical-align:top;">
        <td>2. NAMA KANTOR/SATUAN KERJA</td>
        <td>:&nbsp;</td>
        <td><?php echo $dipa->satker; ?></td>
    </tr>
    <tr style="vertical-align:top;">
        <td>3. TGL DAN NOMOR DIPA</td>
        <td>:&nbsp;</td>
        <td><?php echo $dipa->tanggal_dipa; ?>, <?php echo $dipa->nomor_dipa; ?></td>
    </tr>
    <tr style="vertical-align:top;">
        <td>4. KLASIFIKASI ANGGARAN</td>
        <td>:&nbsp;</td>
        <td>01/01/04/<?php echo $dipa->kode_kegiatan; ?>/<?php echo Format::kode($tagihan->kode_output); ?>/<?php echo trim(substr(Format::kode($tagihan->kode_mak), 0, -2)); ?></td>
    </tr>
</table>

<hr style="margin:0px;border-top:1px solid #000;"/>
<br/>
<div style="font-size:12px;">
    YANG BERTANDATANGAN DIBAWAH INI ATAS NAMA KUASA PENGGUNA ANGGARAN SATUAN KERJA PUSAT PENDIDIKAN DAN PELATIHAN PENGEMBANGAN SUMBER DAYA
    MANUSIA - BPPK MENYATAKAN BAHWA SAYA BERTANGGUNG JAWAB SECARA FORMAL DAN MATERIAL DAN KEBENARAN PERHITUNGAN PEMUNGUTAN PAJAK ATAS SEGALA 
    PEMBAYARAN TAGIHAN YANG TELAH KAMI PERINTAHKAN DALAM SPM INI DENGAN PERINCIAN SEBAGAI BERIKUT:
</div>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tagihan-grid',
    'dataProvider' => $dataProvider,
    'summaryText' => '',
    'columns' => array(
        array(
            'header' => 'AKUN',
            'value' => 'Format::kode($data->kode_mak)',
        ),
        array(
            'header' => 'PENERIMA',
            'value' => '$data->pihak_penerima',
        ),
        array(
            'header' => 'URAIAN',
            'value' => '$data->uraian_tagihan',
        ),
        array(
            'header' => 'MATA UANG',
            'value' => '$data->mata_uang',
        ),
        array(
            'header' => 'JUMLAH',
            'value' => 'Format::currency($data->jumlah_tagihan)',
        ),
        array(
            'header' => 'PPN',
            'value' => 'Format::currency($data->ppn)',
        ),
        array(
            'header' => 'PPh 21',
            'value' => ' Format::currency($data->pph_21)',
        ),
        array(
            'header' => 'PPh 22',
            'value' => 'Format::currency($data->pph_22)',
        ),
        array(
            'header' => 'PPh 23',
            'value' => 'Format::currency($data->pph_23)',
        ),
        array(
            'header' => 'PPh 25',
            'value' => 'Format::currency($data->pph_25)',
        ),
    ),
));
?>

<div style="font-size:12px;">
    BUKTI-BUKTI PENGELUARAN ANGGARAN DAN ASLI SETORAN PAJAK (SSP/BPN) TERSEBUT DI ATAS DISIMPAN OLEH PENGGUNA ANGGARAN/KUASA PENGGUNA ANGGARAN UNTUK KELENGKAPAN ADMINISTRASI DAN PEMERIKSAAN PENGAWASAN FUNGSIONAL.

    DEMIKIAN SURAT PERNYATAAN INI DIBUAT DENGAN SEBENARNYA.
</div>
<BR/><BR/>
<div style="150px;margin-top:50px;margin-right:100px;float:right;text-align:center;">
    Jakarta, <?php echo $tagihan->tanggal_sptb; ?><br/>
    PEJABAT PEMBUAT KOMITMEN<br/>
    <br/><br/><br/><br/><br/>
    <?php echo @$tagihan->ppk->nama; ?><br/>
    NIP. <?php echo @$tagihan->ppk->nip; ?>

</div>