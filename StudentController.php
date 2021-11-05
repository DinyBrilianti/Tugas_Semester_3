<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    function index()
    {
        $response = Student::all();
        return response()->json($response, 200);   
    }

    function create(Request $request)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;
        $student = Student::create([
            "nama" => $nama,
            "nim" => $nim,
            "email" => $email,
            "jurusan" => $jurusan,
        ]);

        $data = [
            "message" => "berhasil menambahkan data",
            "data" => $student
        ];

        return response()->json($data, 201);

    }

    function update(Request $request, $id)
    {
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;
        $student = Student::findOrFail($id);
            $student->nama = $nama;
            $student->nim = $nim;
            $student->email = $email;
            $student->jurusan = $jurusan;

            $student->save();

            $data = [
                "message" => "Berhasil memperbaharui data",
                "data" => $student
            ];

            return response()->json($data, 200);

    }

    function destroy($id)
    {
        $student = Student::find($id);
            $student->delete();
            $data = [
                "message" => "berhasil menghapus data",
                "data" => $student
            ];

            return response()->json($data, 200);
    }
}
