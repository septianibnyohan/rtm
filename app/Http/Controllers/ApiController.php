<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Suhu;
use App\Models\In;
use App\Models\Out;
use App\Models\Summary;
use App\Models\GlobalEvent;
use App\Events\RtmEvent;
use App\Models\Setting;
use DB;
use DataTables;

class ApiController extends Controller
{
    public function checkEvent()
    {
        $events = DB::table('event')->where(['hasread' => 0])->get();

        return response()->json($events, 201);
    }

    public function getLastSummary()
    {
        $last_suhu = Summary::whereDate('created_at', '=', date("Y-m-d"))->orderBy('id', 'DESC')->first();
        $setting = Setting::where(['code' => 'room_capacity'])->orderBy('id', 'DESC')->first();

        if ($last_suhu != null) $last_suhu->kapasitas_ruangan = $setting->value;
        return response()->json($last_suhu, 201);
    }

    public function listSuhu()
    {
        $list_suhu = Suhu::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->get();

        $updated = GlobalEvent::where(['hasread' => 0])->update(['hasread' => 1]);

        $callback = array(
            'data'=>$list_suhu
        );

        return response()->json($callback, 201);
    }

    public function getLastSuhu(Request $request)
    {
        $last_suhu = Suhu::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->first();
        $updated = GlobalEvent::where(['id' => $request->event_id])->update(['hasread' => 1]);

        return response()->json($last_suhu, 201);
    }

    public function insertSuhu(Request $request)
    {
        $suhu = floatval($request->ldrvalue);
        if ($suhu >= 35 && $suhu <= 42)
        {
            $last_suhu = Suhu::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->first();
            $last_summary = Summary::whereDate('created_at', '=', date('Y-m-d'))->first();
            $setting = Setting::where(['code' => 'room_capacity'])->orderBy('id', 'DESC')->first();

            $last_suhu_normal = $last_summary == null ? 0 : $last_summary->suhu_normal;
            $last_suhu_tinggi = $last_summary == null ? 0 : $last_summary->suhu_tinggi;
            $last_jumlah_masuk = $last_summary == null ? 0 : $last_summary->jumlah_masuk;
            $last_jumlah_keluar = $last_summary == null ? 0 : $last_summary->jumlah_keluar;
            $last_di_dalam_ruangan = $last_summary == null ? 0 : $last_summary->di_dalam_ruangan;
            $last_kapasitas_ruangan = $setting->value;

            if (round(floatval($request->ldrvalue),1) >= 37.5)
            {
                $last_suhu_tinggi = $last_suhu_tinggi + 1;
            }
            else
            {
                $last_suhu_normal = $last_suhu_normal + 1;
            }

            $last_no = $last_suhu == null ? 0 : $last_suhu->no;

            $suhu = new Suhu([
                'no' => $last_no + 1,
                'ldr' => $request->ldrvalue,
                'tanggal' => date("Y-m-d"),
                'waktu' => date("H:i:s")
            ]);
            $suhu->save();

            $event = new GlobalEvent([
                'code' => 'suhu',
                'hasread' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            $event->save();

            if ($last_summary == null)
            {
                $summary = new Summary([
                    // $last_suhu_normal = $last_summary = null ? 0 : $last_summary->suhu_normal;
                    // $last_suhu_tinggi = $last_summary = null ? 0 : $last_summary->suhu_tinggi;
                    // $last_jumlah_masuk = $last_summary = null ? 0 : $last_summary->jumlah_masuk;
                    // $last_jumlah_keluar = $last_summary = null ? 0 : $last_summary->jumlah_keluar;
                    // $last_di_dalam_ruangan = $last_summary = null ? 0 : $last_summary->di_dalam_ruangan;
                    // $last_kapasitas_ruangan = 100;
                    'suhu_normal' => $last_suhu_normal,
                    'suhu_tinggi' => $last_suhu_tinggi,
                    'jumlah_masuk' => $last_jumlah_masuk,
                    'jumlah_keluar' => $last_jumlah_keluar,
                    'di_dalam_ruangan' => $last_di_dalam_ruangan,
                    'kapasitas_ruangan' => $last_kapasitas_ruangan,

                ]);
                $summary->save();
            }
            else
            {
                Summary::whereDate('created_at', '=', date('Y-m-d'))->update(
                [
                    'suhu_normal'       => $last_suhu_normal,
                    'suhu_tinggi'       => $last_suhu_tinggi,
                    'jumlah_masuk'      => $last_jumlah_masuk,
                    'jumlah_keluar'     => $last_jumlah_keluar,
                    'di_dalam_ruangan'  => $last_di_dalam_ruangan,
                    'kapasitas_ruangan' => $last_kapasitas_ruangan,
                    'updated_at'        => date("Y-m-d H:i:s")
                ]);
            }

            return response()->json($suhu, 201);
        }
        else
        {
            return response()->json("nilai suhu harus berada diantara 35 - 42", 201);
        }
        
    }

    public function InsertIn(Request $request)
    {
        $last_in = In::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->first();
        $last_summary = Summary::whereDate('created_at', '=', date('Y-m-d'))->first();
        $setting = Setting::where(['code' => 'room_capacity'])->orderBy('id', 'DESC')->first();

        $last_suhu_normal = $last_summary == null ? 0 : $last_summary->suhu_normal;
        $last_suhu_tinggi = $last_summary == null ? 0 : $last_summary->suhu_tinggi;
        $last_jumlah_masuk = $last_summary == null ? 0 : $last_summary->jumlah_masuk;
        $last_jumlah_keluar = $last_summary == null ? 0 : $last_summary->jumlah_keluar;
        $last_di_dalam_ruangan = $last_summary == null ? 0 : $last_summary->di_dalam_ruangan;
        $last_kapasitas_ruangan = $setting->value;

        $last_jumlah_masuk = $last_jumlah_masuk + 1;
        $last_di_dalam_ruangan = $last_di_dalam_ruangan + 1;
        $last_no = $last_in == null ? 0 : $last_in->no;

        $in = new In([
            'no' => $last_no + 1,
            'tanggal' => date("Y-m-d"),
            'waktu' => date("H:i:s")
        ]);
        $in->save();

        $event = new GlobalEvent([
            'code' => 'in',
            'hasread' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        $event->save();

        if ($last_summary == null)
        {
            $summary = new Summary([
                'suhu_normal' => $last_suhu_normal,
                'suhu_tinggi' => $last_suhu_tinggi,
                'jumlah_masuk' => $last_jumlah_masuk,
                'jumlah_keluar' => $last_jumlah_keluar,
                'di_dalam_ruangan' => $last_di_dalam_ruangan,
                'kapasitas_ruangan' => $last_kapasitas_ruangan,

            ]);
            $summary->save();
        }
        else
        {
            Summary::whereDate('created_at', '=', date('Y-m-d'))->update(
            [
                'suhu_normal'       => $last_suhu_normal,
                'suhu_tinggi'       => $last_suhu_tinggi,
                'jumlah_masuk'      => $last_jumlah_masuk,
                'jumlah_keluar'     => $last_jumlah_keluar,
                'di_dalam_ruangan'  => $last_di_dalam_ruangan,
                'kapasitas_ruangan' => $last_kapasitas_ruangan,
                'updated_at'        => date("Y-m-d H:i:s")
            ]);
        }

        return response()->json($in, 201);
    }

    public function listIn()
    {
        $list_in = In::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->get();

        $updated = GlobalEvent::where(['code' => 'in'])->update(['hasread' => 1]);

        $callback = array(
            'data'=>$list_in
        );

        return response()->json($callback, 201);
    }

    public function getLastIn(Request $request)
    {
        $last_in = In::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->first();
        $updated = GlobalEvent::where(['id' => $request->event_id])->update(['hasread' => 1]);
        

        return response()->json($last_in, 201);
    }

    public function InsertOut(Request $request)
    {
        $last_out = Out::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->first();
        $last_summary = Summary::whereDate('created_at', '=', date('Y-m-d'))->first();
        $setting = Setting::where(['code' => 'room_capacity'])->orderBy('id', 'DESC')->first();

        $last_suhu_normal = $last_summary == null ? 0 : $last_summary->suhu_normal;
        $last_suhu_tinggi = $last_summary == null ? 0 : $last_summary->suhu_tinggi;
        $last_jumlah_masuk = $last_summary == null ? 0 : $last_summary->jumlah_masuk;
        $last_jumlah_keluar = $last_summary == null ? 0 : $last_summary->jumlah_keluar;
        $last_di_dalam_ruangan = $last_summary == null ? 0 : $last_summary->di_dalam_ruangan;
        $last_kapasitas_ruangan = $setting->value;

        $last_jumlah_keluar = $last_jumlah_keluar + 1;
        $last_di_dalam_ruangan = $last_di_dalam_ruangan - 1;
        $last_no = $last_out == null ? 0 : $last_out->no;

        $out = new Out([
            'no' => $last_no + 1,
            'tanggal' => date("Y-m-d"),
            'waktu' => date("H:i:s")
        ]);
        $out->save();

        $event = new GlobalEvent([
            'code' => 'out',
            'hasread' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        $event->save();

        if ($last_summary == null)
        {
            $summary = new Summary([
                'suhu_normal' => $last_suhu_normal,
                'suhu_tinggi' => $last_suhu_tinggi,
                'jumlah_masuk' => $last_jumlah_masuk,
                'jumlah_keluar' => $last_jumlah_keluar,
                'di_dalam_ruangan' => $last_di_dalam_ruangan,
                'kapasitas_ruangan' => $last_kapasitas_ruangan,

            ]);
            $summary->save();
        }
        else
        {
            Summary::whereDate('created_at', '=', date('Y-m-d'))->update(
            [
                'suhu_normal'       => $last_suhu_normal,
                'suhu_tinggi'       => $last_suhu_tinggi,
                'jumlah_masuk'      => $last_jumlah_masuk,
                'jumlah_keluar'     => $last_jumlah_keluar,
                'di_dalam_ruangan'  => $last_di_dalam_ruangan,
                'kapasitas_ruangan' => $last_kapasitas_ruangan,
                'updated_at'        => date("Y-m-d H:i:s")
            ]);
        }

        return response()->json($out, 201);
    }

    public function listOut()
    {
        $list_out = Out::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->get();

        $updated = GlobalEvent::where(['code' => 'out'])->update(['hasread' => 1]);

        $callback = array(
            'data'=>$list_out
        );

        return response()->json($callback, 201);
    }

    public function getLastOut(Request $request)
    {
        $last_out = Out::where(['tanggal' => date("Y-m-d")])->orderBy('id', 'DESC')->first();
        $updated = GlobalEvent::where(['id' => $request->event_id])->update(['hasread' => 1]);

        return response()->json($last_out, 201);
    }
}