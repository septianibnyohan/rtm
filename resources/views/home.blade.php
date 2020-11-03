@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="widget-57 card-margin row">

                <div class="col-lg-4 col-12">
                    <div class="widget-57-content m-text-center">
                        <img src="{{ config('app.url') }}{{ $client_logo }}" class="client-logo" alt="Picture" />
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="widget-57-content text-center">
                        <p class="name main-title">Real Time Monitoring</p>
                        <p class="info text-muted second-title">Penerapan Protokol Kesehatan</p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="widget-57-content text-right m-text-center">
                        <!-- <a class="btn btn-soft-base" href="#">View Profile</a> -->
                        <p class="name client-name">{{ $client_name }}</p>
                        <p class="info text-muted client-day" id="current_date">Kamis, 1 Oktober 2020</p>
                        <p class="info text-muted client-time" id="current_time">15:24:37</p>
                    </div>
                </div>
      
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 d-flex align-items-stretch">
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <p class="histori-title text-center">Histori Suhu</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="suhu-table" class="table table-striped table-bordered suhu-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Suhu</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <div class="col-lg-5 d-flex align-items-stretch">
        <div class="card text-center">
            <div class="card-header text-center">
                <div class="col-12">
                    <p class="summary-title">SUMMARY</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered summary-table" style="width:100%">
                        <tbody>
                            <tr>
                                <td>Suhu Normal</td>
                                <td id="suhu_normal">0</td>
                            </tr>
                            <tr>
                                <td>Suhu Tinggi</td>
                                <td id="suhu_tinggi">0</td>
                            </tr>
                            <tr>
                                <td>Jumlah Masuk</td>
                                <td id="jumlah_masuk">0</td>
                            </tr>
                            <tr>
                                <td>Jumlah Keluar</td>
                                <td id="jumlah_keluar">0</td>
                            </tr>
                            <tr>
                                <td>Di dalam Ruangan</td>
                                <td id="di_dalam_ruangan">0</td>
                            </tr>
                            <tr>
                                <td>Kapasitas Ruangan</td>
                                <td id="kapasitas_ruangan">{{ $room_capacity }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12">
                        <p class="name suhu-desc">Suhu Normal : 35 &#8451 ~ 37,4 &#8451</p>
                        <p class="name suhu-desc">Suhu Tinggi : >= 37.5 &#8451</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 widget-56">
                        <p class="suhu-update">Suhu Update</p>
                        <p class="suhu-update-number">
                            <span class="widget-56-icon bg-soft-info text-info" id="current-suhu">---</span>
                        </p>
                        <div class="alert alert-danger text-center suhu-warning d-none" id="suhu-warning" role="alert">
                            <span class="alert-text">Suhu Tinggi Terdeteksi</span>
                        </div>
                        <div class="alert alert-danger text-center suhu-warning d-none" id="in-warning" role="alert">
                            <span class="alert-text">Terlalu Banyak Orang</span>
                        </div>
                        <div class="alert alert-danger text-center suhu-warning d-none" id="measurement-warning" role="alert">
                            <span class="alert-text"><span id="jumlah-not-warning">8</span> Orang Belum Ukur Suhu</span>
                        </div>
                    </div>
                </div>

                <!-- <audio id="alarm01" src="/sound/alarm01.mp3" preload="auto"></audio> -->
            </div>
        </div>
    </div>
    <div class="col-lg-2 d-flex align-items-stretch">
        <div class="card">
            <div class="card-header">
                <div class="col-12 text-center">
                    <p class="histori-title">Histori In</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="in-table" class="table table-striped table-bordered histori-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 d-flex align-items-stretch">
        <div class="card">
            <div class="card-header">
                <div class="col-12 text-center">
                    <p class="histori-title">Histori Out</p>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="out-table" class="table table-striped table-bordered histori-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')

    <script>
    window.addEventListener('load', () => {
        registerSW();
    });

    async function registerSW() {
        if ('serviceWorker' in navigator) {
            try {
                //await navigator.serviceWorker.register('sw.js');
                navigator.serviceWorker.register("{{ config('app.url') }}/sw.js", { scope: "{{ config('app.url') }}/" }).then(() => {
                        console.log("Install succeeded as the max allowed scope was overriden to    '/'.");
                    });
            } catch (e) {
                console.log('SW registration failed');
            }
        }
    }

    $(function() {
        var suhu_table = $('#suhu-table').DataTable({
            createdRow: function ( row, data, index ) {
                var current_suhu = Math.round(parseFloat(data.ldr) * 10) / 10;
                if (current_suhu >= 37.5)
                {
                    $('td', row).eq(0).addClass('text-danger');
                    $('td', row).eq(1).addClass('text-danger');
                    $('td', row).eq(2).addClass('text-danger');
                }
            },
            order : [[ 0, "desc" ]],
            bInfo : false,
            ajax: '{{ config('app.url')}}/api/listSuhu',
            'lengthChange': false,
            columns: [
                { data: 'no', name: 'no' },
                { 
                    data: 'ldr', 
                    render: function ( data, type, row ) {
                        $('td', row).eq(0).addClass('text-danger');
                        $('td', data).eq(1).addClass('text-danger');
                        return Math.round(parseFloat(data) * 10) / 10 + " &#8451";
                    }
                },
                { data: 'waktu', name: 'waktu' }
            ]
        });

        var in_table = $('#in-table').DataTable({
            order : [[ 0, "desc" ]],
            bInfo : false,
            ajax: '{{ config('app.url')}}/api/listIn',
            'lengthChange': false,
            columns: [
                { data: 'no', name: 'no' },
                { data: 'waktu', name: 'waktu' }
            ]
        });

        var out_table = $('#out-table').DataTable({
            order : [[ 0, "desc" ]],
            bInfo : false,
            ajax: '{{ config('app.url')}}/api/listOut',
            'lengthChange': false,
            columns: [
                { data: 'no', name: 'no' },
                { data: 'waktu', name: 'waktu' }
            ]
        });

        $.get( "{{ config('app.url')}}/api/getLastSummary", 
            function( data_summary ) {
                $('#suhu_normal').html(data_summary.suhu_normal);
                $('#suhu_tinggi').html(data_summary.suhu_tinggi);
                $('#jumlah_masuk').html(data_summary.jumlah_masuk);
                $('#jumlah_keluar').html(data_summary.jumlah_keluar);
                $('#di_dalam_ruangan').html(data_summary.di_dalam_ruangan);
                $('#kapasitas_ruangan').html(data_summary.kapasitas_ruangan);
            }
        );

        $.get( "{{ config('app.url')}}/api/getLastSuhu?event_id=1", 
            function( data_last_suhu ) {

                if (jQuery.isEmptyObject(data_last_suhu))
                {
                    return;
                }

                var current_suhu = Math.round(parseFloat(data_last_suhu.ldr) * 10) / 10;
                $('#current-suhu').html(Math.round(parseFloat(data_last_suhu.ldr) * 10) / 10 + ' &#8451');

                if (current_suhu >= 37.5)
                {
                    $('#suhu-warning').removeClass('d-none');
                    $('#current-suhu').removeClass('bg-soft-info');
                    $('#current-suhu').removeClass('text-info');
                    $('#current-suhu').addClass('bg-soft-danger');
                    $('#current-suhu').addClass('text-danger');
                }
                else
                {
                    $('#suhu-warning').removeClass('d-none');
                    $('#suhu-warning').addClass('d-none');
                    $('#current-suhu').removeClass('bg-soft-danger');
                    $('#current-suhu').removeClass('text-danger');
                    $('#current-suhu').addClass('bg-soft-info');
                    $('#current-suhu').addClass('text-info');
                }
            }
        );

        $('#suhu-table_filter').parent().prev().remove();
        $('#in-table_filter').parent().prev().remove();
        $('#out-table_filter').parent().prev().remove();

        setInterval(function(){ 
            var today = new Date();
            var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

            var tanggal = days[today.getDay()] + ", " + today.getDate() + " " + months[today.getMonth()] + " " + today.getFullYear();

            $('#current_date').html(tanggal);
            $("#current_time").html(time);
            $.get( "{{ config('app.url')}}/api/checkEvent", function( data_event ) {
                //console.log(data);
                //console.log(data.length);
                if (data_event.length > 0)
                {
                    switch(data_event[0].code){
                        case 'suhu':
                            $.get( "{{ config('app.url')}}/api/getLastSuhu?event_id=" + data_event[0].id, 
                                function( data_last_suhu ) {
                                    var current_suhu = Math.round(parseFloat(data_last_suhu.ldr) * 10) / 10;
                                    $('#current-suhu').html(Math.round(parseFloat(data_last_suhu.ldr) * 10)/10 + ' &#8451');
                                    suhu_table.row.add( {
                                        'no': data_last_suhu.no,
                                        'ldr': data_last_suhu.ldr,
                                        'waktu': data_last_suhu.waktu
                                    }).order([0, "desc" ]).draw();

                                    if (current_suhu >= 37.5)
                                    {
                                        var audio1 = new Audio('{{ config('app.url') }}/sound/alarm01.mp3');
                                        audio1.play();

                                        $('#suhu-warning').removeClass('d-none');
                                        $('#current-suhu').removeClass('bg-soft-info');
                                        $('#current-suhu').removeClass('text-info');
                                        $('#current-suhu').addClass('bg-soft-danger');
                                        $('#current-suhu').addClass('text-danger');
                                    }
                                    else
                                    {
                                        $('#suhu-warning').removeClass('d-none');
                                        $('#suhu-warning').addClass('d-none');
                                        $('#current-suhu').removeClass('bg-soft-danger');
                                        $('#current-suhu').removeClass('text-danger');
                                        $('#current-suhu').addClass('bg-soft-info');
                                        $('#current-suhu').addClass('text-info');
                                    }
                                }
                            );
                            
                            
                            //datatable suhu
                            //get data suhu current
                            break;
                        case 'in':
                            // datatable histori in
                            $.get( "{{ config('app.url')}}/api/getLastIn?event_id=" + data_event[0].id, 
                                function( data_last_in ) {
                                    in_table.row.add( {
                                        'no': data_last_in.no,
                                        'waktu': data_last_in.waktu
                                    }).order([0, "desc" ]).draw();
                                }
                            );
                            break;
                        case 'out':
                            // datatable histori out
                            $.get( "{{ config('app.url')}}/api/getLastOut?event_id=" + data_event[0].id, 
                                function( data_last_out ) {
                                    out_table.row.add( {
                                        'no': data_last_out.no,
                                        'waktu': data_last_out.waktu
                                    }).order([0, "desc" ]).draw();
                                }
                            );
                            break;
                    }

                    $.get( "{{ config('app.url')}}/api/getLastSummary", 
                        function( data_summary ) {
                           $('#suhu_normal').html(data_summary.suhu_normal);
                           $('#suhu_tinggi').html(data_summary.suhu_tinggi);
                           $('#jumlah_masuk').html(data_summary.jumlah_masuk);
                           $('#jumlah_keluar').html(data_summary.jumlah_keluar);
                           $('#di_dalam_ruangan').html(data_summary.di_dalam_ruangan);
                           $('#kapasitas_ruangan').html(data_summary.kapasitas_ruangan);

                           var di_dalam_ruangan = parseInt(data_summary.di_dalam_ruangan);
                           var kapasitas_ruangan = parseInt(data_summary.kapasitas_ruangan);

                            if (di_dalam_ruangan > kapasitas_ruangan)
                            {
                                if (data_event[0].code == "in")
                                {
                                    var audio2 = new Audio('{{ config('app.url') }}/sound/alarm02.mp3');
                                    audio2.play();
                                }   
                                
                                $('#in-warning').removeClass('d-none');
                            }
                            else
                            {
                                $('#in-warning').removeClass('d-none');
                                $('#in-warning').addClass('d-none');
                            }

                            var jumlah_ukur_suhu = parseInt(data_summary.suhu_normal) + parseInt(data_summary.suhu_tinggi);
                            var jumlah_masuk = parseInt(data_summary.jumlah_masuk);

                            if (jumlah_masuk > jumlah_ukur_suhu)
                            {
                                var audio3 = new Audio('{{ config('app.url') }}/sound/alarm03.mp3');
                                audio3.play();
                                $('#jumlah-not-warning').text(jumlah_masuk - jumlah_ukur_suhu);
                                $('#measurement-warning').removeClass('d-none');
                            }
                            else
                            {
                                $('#measurement-warning').removeClass('d-none');
                                $('#measurement-warning').addClass('d-none');
                            }
                        }
                    );
                }
            }); 
        }, 1000);
    });
    </script>
  <script>

    // setInterval(function(){ 
    //     $.get( "{{ config('app.url')}}/api/checkEvent", function( data ) {
    //         //console.log(data);
    //         //console.log(data.length);
    //         if (data.length > 0)
    //         {
    //             switch(data[0].code){
    //                 case 'suhu':
    //                     //datatable suhu
    //                     //get data suhu current
    //                     break;
    //                 case 'in':
    //                     // datatable histori in
    //                     break;
    //                 case 'out':
    //                     // datatable histori out
    //                     break;
    //             }
    //         }
    //     }); 
    // }, 1000);
  </script>
@endsection