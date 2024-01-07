<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Anh;
use Illuminate\Support\Facades\DB;
//use DB;

class ImageController extends Controller
{
    //
    public function list() {
        $listImages = Anh::all();
        $groupedImages = $listImages->groupBy('IDSanPham');
//        dd($groupedImages);

        return view('fileImage.listImage', [
            'title' => 'Danh sach anh',
            'groupedImages' => $groupedImages,
        ]);
    }

//
    public function deleteImages(Request $request) {
        $selectedImageIds = $request->input('selectedImages', []);

        // Perform the deletion based on the selected image IDs
        Anh::whereIn('IDImage', $selectedImageIds)->delete();

//        dd($selectedImageIds);
        return redirect()->route('listImage'); // Redirect to the desired route after deletion
    }

    public function create() {
        $danhsachsanpham = Sanpham::all();
//        dd($danhsachsanpham);
        return view('fileImage.addImage',[
            'title' => "Quanr Ly Anh",
            'danhsachSanphams' => $danhsachsanpham,
        ]);
    }

//    public function addImage(Request $request) {
//        // Check if the formFile is present in the request
//        $request = $request->file();
//        dd($request);
//
//        if ($request->hasFile('formFile')) {
//            // Retrieve the file from the request
//            $requestImage = $request->file('formFile');
//            $fileName ='';
//            $fileName = '/images' . time() . '.' . $request->formFile->extension();
//            $fileNameNow = pathinfo($requestImage->getClientOriginalName(), PATHINFO_FILENAME);
//
//            dd(">>>Check: ", $fileName , $fileNameNow);
////            dd($fileName);
////            dd($fileName);
//            // Perform actions with the file, such as storing it or processing it
//            // For example, you can store the file in the public directory like this:
//            $request->formFile->move(public_path('/images'),$fileName);
//
//            Anh::create([
//                'title' => (string)$fileNameNow,
//                'address' => $fileName,
//            ]);
//
//            Session()->flash('success','Thêm mới ảnh thành công');
////            $path = $requestImage->store('public/images');
//
//            // Display the path (you might want to store this path in your database)
////            dd($path);
//        } else {
//            // Handle the case where no file was uploaded
//            dd('No file uploaded');
//        }
//    }

    public function addImage(Request $request) {
        // Kiểm tra xem có tệp nào được gửi lên không

        if ($request->hasFile('formFile')) {
            $IDSanpham = $request->input('cars');
            $records = [];

//            var_dump(">>> Check File: ", $IDSanpham);

            foreach ($request->file('formFile') as $file) {

                $requestImage = $request->file('formFile');

//                var_dump(">>>Check File: ", $requestImage);
//                dd($requestImage);

                $fileName = "/img/banner_truyen/trangquynh-truyen/". $file->getClientOriginalName();

                var_dump($fileName);

                $fileNameNow = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

//                var_dump($fileNameNow);

                $records[] = ['IDSanPham' => $IDSanpham ,'address' => $fileName, 'title' => (string)$fileNameNow];

//            $file->move(public_path('/images'), $fileName);
            }

            foreach ($records as $record) {
                Anh::create($record);
            }

            $record = [];

//
//            Session()->flash('success','Thêm mới ảnh thành công');
////                $path = $file->store('public/images');
////                $request->requestImage->move(public_path('/images'),$fileName)
//            // Chuyển hướng sau khi thêm dữ liệu thành công
            return redirect()->route('listImage');
        }
        else {
            // Xử lý khi không có tệp nào được gửi lên
            return 'Không có tệp được gửi lên.';
        }
    }
}
