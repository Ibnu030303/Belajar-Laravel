<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $dataStudents = Students::where('students.idstudents', 'like', '%' .$search. '%')
            ->orWhere('students.fullname', 'like', '%' . $search . '%')
            ->paginate(10)->fragment('std');
        } else {
            $dataStudents = Students::paginate(10)->fragment('std');
        }

        return view('students.data')->with([
            'students' => $dataStudents,
            'search' => $search
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $students = new Students;
        $students->idstudents = $request->txtid;
        $students->fullname = $request->txtfullname;
        $students->gender = $request->txtgender;
        $students->address = $request->txtaddress;
        $students->email = $request->txtemail;
        $students->phone = $request->txtphone;

        $students->save();
        return redirect('students')->with('msg', 'Add New Students Seccesully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        return view('students.formedit')->with([
            'txtid' => $idstudents,
            'txtfullname' => $data->fullname,
            'txtgender' => $data->gender,
            'txtaddress' => $data->address,
            'txtemail' => $data->email,
            'txtphone' => $data->phone
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        $data->fullname = $request->txtfullname;
        $data->gender = $request->txtgender;
        $data->address = $request->txtaddress;
        $data->email = $request->txtemail;
        $data->phone = $request->txtphone;

        $data->save();
        return redirect('students')->with('msg', 'Data Dengan Nama Students ' . $data->fullname . ' Berhasil di Update ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        $data->delete();
        return redirect('students')->with('msg', 'Data Dengan Nama Students ' . $data->fullname . ' Berhasil di Delete ');
    }
}
