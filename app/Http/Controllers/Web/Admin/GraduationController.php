<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\StoreGraduationRequest;
use App\Interfaces\GraduationRepositoryInterface;
use App\Models\Graduation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class GraduationController extends Controller
{

    private GraduationRepositoryInterface $graduationRepository;

    public function __construct(GraduationRepositoryInterface $graduationRepository)
    {
        $this->graduationRepository = $graduationRepository;
    }

    public function index()
    {
        $graduations = $this->graduationRepository->getAllGraduations();

        return view('pages.admin.graduations.index', compact('graduations'));
    }

    public function create()
    {
        return view('pages.admin.graduations.create');
    }

    public function store(StoreGraduationRequest $request)
    {
        try {
            $data = $request->only(['name', 'test_number', 'status']);

            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file('photo')->store('graduations/photos', 'public');
            }
            if ($request->hasFile('skl_file')) {
                $data['skl_file'] = $request->file('skl_file')->store('graduations/skl', 'public');
            }
            if ($request->hasFile('skn_file')) {
                $data['skn_file'] = $request->file('skn_file')->store('graduations/skn', 'public');
            }

            $this->graduationRepository->createGraduation($data);

            Swal::toast('Berhasil menambahkan data kelulusan', 'success');

            return redirect()->route('admin.graduations.index');
        } catch (\Exception $e) {
            Swal::error('Gagal', 'Gagal menambahkan data kelulusan');

            return redirect()->back()->withInput();
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $graduation = $this->graduationRepository->getGraduationById($id);

        return view('pages.admin.graduations.edit', compact('graduation'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $graduation = Graduation::findOrFail($id);
            $data = $request->only(['name', 'test_number', 'status']);

            if ($request->hasFile('photo')) {
                if ($graduation->photo && file_exists(storage_path('app/public/' . $graduation->photo))) {
                    unlink(storage_path('app/public/' . $graduation->photo));
                }
                $data['photo'] = $request->file('photo')->store('graduations/photos', 'public');
            }
            if ($request->hasFile('skl_file')) {
                if ($graduation->skl_file && file_exists(storage_path('app/public/' . $graduation->skl_file))) {
                    unlink(storage_path('app/public/' . $graduation->skl_file));
                }
                $data['skl_file'] = $request->file('skl_file')->store('graduations/skl', 'public');
            }
            if ($request->hasFile('skn_file')) {
                if ($graduation->skn_file && file_exists(storage_path('app/public/' . $graduation->skn_file))) {
                    unlink(storage_path('app/public/' . $graduation->skn_file));
                }
                $data['skn_file'] = $request->file('skn_file')->store('graduations/skn', 'public');
            }

            $this->graduationRepository->updateGraduation($data, $id);

            Swal::toast('Berhasil mengubah data kelulusan', 'success');

            return redirect()->route('admin.graduations.index');
        } catch (\Exception $e) {
            Swal::error('Gagal', 'Gagal mengubah data kelulusan');

            return redirect()->back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {
            $graduation = Graduation::findOrFail($id);

            foreach (['photo', 'skl_file', 'skn_file'] as $field) {
                if ($graduation->$field && file_exists(storage_path('app/public/' . $graduation->$field))) {
                    unlink(storage_path('app/public/' . $graduation->$field));
                }
            }

            $this->graduationRepository->deleteGraduation($id);

            Swal::toast('Berhasil menghapus data kelulusan', 'success');

            return redirect()->route('admin.graduations.index');
        } catch (\Exception $e) {
            Swal::error('Gagal', 'Gagal menghapus data kelulusan');

            return redirect()->back()->withInput();
        }
    }
}
