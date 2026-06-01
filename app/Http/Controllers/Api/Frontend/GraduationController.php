<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\GraduationRepositoryInterface;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    private GraduationRepositoryInterface $graduationRepository;

    public function __construct(GraduationRepositoryInterface $graduationRepository)
    {
        $this->graduationRepository = $graduationRepository;
    }

    public function show(Request $request)
    {
        $graduation = $this->graduationRepository->getGraduationByTestNumber($request->test_number);

        if (!$graduation) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 200);
        }

        // Verifikasi tanggal lahir jika dikirim dan student punya data birthdate
        if ($request->birthdate && $graduation->student && $graduation->student->birthdate) {
            $inputDate = $request->birthdate;
            $studentDate = $graduation->student->birthdate->format('Y-m-d');
            if ($inputDate !== $studentDate) {
                return response()->json([
                    'message' => 'Data tidak ditemukan',
                ], 200);
            }
        }

        return response()->json([
            'message' => 'Data ditemukan',
            'data' => [
                'name' => $graduation->name,
                'test_number' => $graduation->test_number,
                'status' => $graduation->status,
                'photo' => $graduation->photo ? asset('storage/' . $graduation->photo) : null,
                'skl_file' => $graduation->skl_file ? asset('storage/' . $graduation->skl_file) : null,
                'skn_file' => $graduation->skn_file ? asset('storage/' . $graduation->skn_file) : null,
            ],
        ], 200);
    }
}
