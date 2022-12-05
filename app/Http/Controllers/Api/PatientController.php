<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser; // /Applications/appsWeb/api/app/Traits/ApiResponser.php
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatedPatient;
use App\Models\Patient;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $patients = Patient::orderBy('created_at', 'DESC')->get();

            return $this->apiResponse('success ', Response::HTTP_OK, true, $patients);
        } catch (\Throwable $th) {
            return $this->apiResponse($th->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatedPatient $request)
    {
        try {
            $patient = new Patient();
            $patient->create($request->all());
            $patients = Patient::orderBy('created_at', 'DESC')->get();

            return $this->apiResponse('Paciente creado correctamente', Response::HTTP_CREATED, true, $patients);
        } catch (\Throwable $th) {
            // echo $th->getMessage(); 
            return $this->apiResponse($th->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $patient = Patient::find($id);

            if (is_null($patient)) {
                return $this->apiResponse('Paciente no encontrado', Response::HTTP_NOT_FOUND);
            }

            return $this->apiResponse('Paciente encontrado', Response::HTTP_OK, true, $patient);

        } catch (\Throwable $th) {
            return $this->apiResponse($th->getMessage(), Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatedPatient $request, $id)
    {
        try {
            $patient = Patient::find($id);
            if (is_null($patient)) {
                return $this->apiResponse('Paciente no encontrado', Response::HTTP_NOT_FOUND);
            }

            $patient->update($request->all());
            $patients = Patient::orderBy('created_at', 'DESC')->get();

            // $patient->save();
            return $this->apiResponse('Paciente actualizado correctamente', Response::HTTP_CREATED, true, $patients);
        } catch (\Throwable $th) {
            return $this->apiResponse($th->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::destroy($id);
        if ($patient === 0) {
            return $this->apiResponse('Paciente no encontrado', Response::HTTP_NOT_FOUND);
        }

        $patients = Patient::orderBy('created_at', 'DESC')->get();

        return $this->apiResponse('Paciente eliminado correctamente', Response::HTTP_OK, true, $patients);
    }
}