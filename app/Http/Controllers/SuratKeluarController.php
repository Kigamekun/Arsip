<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\{
    Hash,
    Auth,
    Mail,
    Response
};

use Carbon\Carbon;


class SuratKeluarController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.surat_keluar', [
            'data' => DB::table('surat')->where('type',0)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $array_bln	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/file' . '/', $thumbname);
            $data = DB::table('surat')->insertGetId([
                'kode_surat' => 'BOGORSELATAN/'.$array_bln[date('n')].'/'.date('Y'),
                'kepada' => $request->kepada,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'tanggal' => Carbon::now()->toDateString('Y-m-d'),
                'file' => $thumbname,
                'type' => 0,
                'operator' => $request->operator,
            ]);
        }else {
            $data = DB::table('surat')->insertGetId([
                'kode_surat' => 'BOGORSELATAN/'.$array_bln[date('n')].'/'.date('Y'),
                'kepada' => $request->kepada,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'tanggal' => Carbon::now()->toDateString('Y-m-d'),
                'type' => 0,
                'operator' => $request->operator,
            ]);
        }


        DB::table('surat')->where('id',$data)->update([
            'no_urut'=>$data,
            'kode_surat' => $data.'/'.'BOGORSELATAN/'.date('Y'),
        ]);






        return redirect()->back()->with(['message'=>'surat berhasil ditambahkan','status'=>'success']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $array_bln	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");

        if ($request->hasFile('thumb')) {
            $file = $request->file('thumb');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/thumb' . '/', $thumbname);
            DB::table('surat')->where('id',$id)->update([
                'kepada' => $request->kepada,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'tanggal' => Carbon::now()->toDateString('Y-m-d'),
                'file' => $thumbname,

            ]);
        }else {
            DB::table('surat')->where('id',$id)->update([
                'kepada' => $request->kepada,
                'pengirim' => $request->pengirim,
                'perihal' => $request->perihal,
                'tanggal' => Carbon::now()->toDateString('Y-m-d'),

            ]);
        }



        return redirect()->back()->with(['message'=>'surat berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('surat')->where('id',$id)->delete();
        return redirect()->route('admin.surat_keluar.index')->with(['message'=>'surat berhasil di delete','status'=>'success']);
    }

    public function download($id)
    {
        $file_path = public_path('file/'.DB::table('surat')->where('id',$id)->first()->file);
        return response()->download($file_path);

    }
}
