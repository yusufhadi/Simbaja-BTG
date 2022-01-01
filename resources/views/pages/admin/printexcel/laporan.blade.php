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

<h1>tableToExcel Demo</h1>
<p>Exporting the W3C Example Table</p>

<input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

<table id="testTable" class="customers">
    <tr></tr>
    <tr>
        <td></td>
        <th colspan="7">PEMERINTAH KABUPATEN BANTAENG</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="7">SEKRETARIAT DAERAH</th>
    </tr>
    <tr>
        <td></td>
        <th colspan="7">BAGIAN PENGADAAN BARANG DAN JASA</th>
    </tr>
    <tr></tr>
    <tr>
        <th></th>
        <th style="border: 1px solid #000000;">NO</th>
        <th style="border: 1px solid #000000;">NAMA SKPD</th>
        <th style="border: 1px solid #000000;">TAHUN</th>
        <th style="border: 1px solid #000000;">JUMBLAH PAKET</th>
        <th style="border: 1px solid #000000;">TOTAL PAGU ANGGARAN</th>
        <th style="border: 1px solid #000000;">TOTAL NILAI KONTRAK</th>
        <th style="border: 1px solid #000000;">TOTAL EFISIENSI</th>
    </tr>

    @foreach ($skpd as $key => $item)
        <tr>
            <td></td>
            <td style="border: 1px solid #000000;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #000000;">{{ $item->name }}</td>
            <td style="border: 1px solid #000000;">{{ $tanggal }}</td>
            <td style="border: 1px solid #000000;">{{ $item->inputPakets->count() }}</td>
            <td style="border: 1px solid #000000;">Rp.
                {{ number_format($item->inputPakets->sum('paguAnggaran'), 0, ',', '.') }}</td>
            <td style="border: 1px solid #000000;">Rp.
                {{ number_format($item->inputPakets->sum('nilaiKontrak'), 0, ',', '.') }}</td>
            <td style="border: 1px solid #000000;">Rp.
                {{ number_format($item->inputPakets->sum('efisiensi'), 0, ',', '.') }}</td>
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
