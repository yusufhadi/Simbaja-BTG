<style>
    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .customers td,
    .customers th {
        border: 3px solid #000000;
        padding: 8px;
    }

    .customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customers tr:hover {
        background-color: #ddd;
    }

    .customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }

</style>
</style>

<input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

<table id="testTable" class="customers">
    <tr></tr>
    <tr>
        <td></td>
        <th colspan="13">PEMERINTAH KABUPATEN BANTAENG</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="13">SEKRETARIAT DAERAH</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="13">{{ $name }}</th>
    </tr>
    <tr></tr>
    <tr>
        <th></th>
        <th style="border: 1px solid #000000;">NO</th>
        <th style="border: 1px solid #000000;">NAMA SKPD</th>
        <th style="border: 1px solid #000000;">NAMA PAKET</th>
        <th style="border: 1px solid #000000;">NAMA PENYEDIA</th>
        <th style="border: 1px solid #000000;">NOMOR KONTRAK</th>
        <th style="border: 1px solid #000000;">MEKANISME PELAKSANAAN</th>
        <th style="border: 1px solid #000000;">TAHUN</th>
        <th style="border: 1px solid #000000;">AWAL PELAKSANAAN</th>
        <th style="border: 1px solid #000000;">AKHIR PELAKSANAAN</th>
        <th style="border: 1px solid #000000;">PAGU ANGGARAN</th>
        <th style="border: 1px solid #000000;">NILAI KONTRAK</th>
        <th style="border: 1px solid #000000;">NILAI HPS</th>
        <th style="border: 1px solid #000000;">TOTAL EFISIENSI</th>
    </tr>
    @foreach ($data as $key => $value)
        <tr>
            <td></td>
            <td style="border: 1px solid #000000;">{{ $key + 1 }}</td>
            <td style="border: 1px solid #000000;">{{ $value->skpd->name }}</td>
            <td style="border: 1px solid #000000;">{{ $value->namaPaket }}</td>
            <td style="border: 1px solid #000000;">{{ $value->namaPenyedia }}</td>
            <td style="border: 1px solid #000000;">{{ $value->nomorKontrak }}</td>
            <td style="border: 1px solid #000000;">{{ $value->pilih }}</td>
            <td style="border: 1px solid #000000;">{{ $value->tahun }}</td>
            <td style="border: 1px solid #000000;">{{ $value->awalPelaksanaan }}</td>
            <td style="border: 1px solid #000000;">{{ $value->akhirPelaksanaan }}</td>
            <td style="border: 1px solid #000000;">Rp.{{ number_format($value->paguAnggaran, 0, ',', '.') }}</td>
            <td style="border: 1px solid #000000;">Rp.{{ number_format($value->nilaiKontrak, 0, ',', '.') }}</td>
            <td style="border: 1px solid #000000;">Rp.{{ number_format($value->nilaiHps, 0, ',', '.') }}</td>
            <td style="border: 1px solid #000000;">Rp.{{ number_format($value->efisiensi, 0, ',', '.') }}</td>
        </tr>
    @endforeach
</table>

</body>
<script type="text/javascript">
    var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,',
            template =
            '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
            base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            }
        return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {
                worksheet: name || 'Worksheet',
                table: table.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
    tableToExcel('testTable', 'W3C Example Table')
</script>

</html>
