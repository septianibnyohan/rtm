@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ config('app.url') }}/css/datepicker.css">
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 card-margin">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">List Summary</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <br/>
                                <div class="row">
                                    <div class="col-md-5 col-6">
                                        <input type="text" name="start_date" id="start_date" class="form-control" autocomplete="off"/>
                                        <br/>
                                    </div>
                                    <div class="col-md-5 col-6">
                                        <input type="text" name="end_date" id="end_date" class="form-control" autocomplete="off"/>
                                        <br/>
                                    </div>
                                    <div class="col-md-1 col-6">
                                        <button type="button" class="btn btn-primary" style="min-width: 100%" id="btnFilter">Filter</button>
                                    </div>
                                    <div class="col-md-1 col-6 text-right">
                                        <button id="btn-download" class="btn btn-primary" 
                                            style="min-width: 100%">Download</button>
                                    </div>
                                </div>
                                <br/>
                                <table id="summary-table" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th>No</th>
                                            <th>Suhu Normal</th>
                                            <th>Suhu Tinggi</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Di Dalam Ruangan</th>
                                            <th>Kapsitas Ruangan</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{ config('app.url') }}/js/bootstrap-datepicker.js"></script>
<script src="{{ config('app.url') }}/js/jquery.table2excel.min.js"></script>
<script>
$(function() {
    $('#start_date').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $('#end_date').datepicker({
        todayBtn: 'linked',
        format: "yyyy-mm-dd",
        autoclose: true
    });

    var out_table = $('#summary-table').DataTable({
        order : [[ 0, "desc" ]],
        bInfo : false,
        ajax: '{{ config('app.url')}}/listSummary',
        'lengthChange': true,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'suhu_normal', name: 'suhu_normal' },
            { data: 'suhu_tinggi', name: 'suhu_tinggi' },
            { data: 'jumlah_masuk', name: 'jumlah_masuk' },
            { data: 'jumlah_keluar', name: 'jumlah_keluar' },
            { data: 'di_dalam_ruangan', name: 'di_dalam_ruangan' },
            { data: 'kapasitas_ruangan', name: 'kapasitas_ruangan' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });

    $( "#btn-download" ).click(function() {
        location.href = '{{ config('app.url') }}/excel_summary?start_date=' + $('#start_date').val() + "&end_date=" + $('#end_date').val();

    });

    $( "#btnFilter").click(function() {
        $('#summary-table').DataTable().clear().draw();
        $('#summary-table').DataTable().destroy()
        
        $('#summary-table').DataTable({
            order : [[ 0, "desc" ]],
            bInfo : false,
            ajax: '{{ config('app.url')}}/listSummary?start_date=' + $('#start_date').val() + "&end_date=" + $('#end_date').val(),
            'lengthChange': true,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'suhu_normal', name: 'suhu_normal' },
                { data: 'suhu_tinggi', name: 'suhu_tinggi' },
                { data: 'jumlah_masuk', name: 'jumlah_masuk' },
                { data: 'jumlah_keluar', name: 'jumlah_keluar' },
                { data: 'di_dalam_ruangan', name: 'di_dalam_ruangan' },
                { data: 'kapasitas_ruangan', name: 'kapasitas_ruangan' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' }
            ]
        });
    });
});
</script>
@endsection