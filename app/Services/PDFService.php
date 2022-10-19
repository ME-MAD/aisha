<?php 

namespace App\Services;

use Illuminate\Support\Facades\File;
use Spatie\PdfToImage\Pdf;

class PDFService
{

    public function uploadPdfFile($fileObject, $fileName , $directoryName = null, $filePrefix = null, $fileSuffix = null)
    {
        $ext = $fileObject->getClientOriginalExtension();
        $filePrefix = $filePrefix ? $filePrefix . "_" : ""; 
        $fileSuffix = $fileSuffix ? "_" . $fileSuffix : "";
        $fileName = $filePrefix . $fileName . $fileSuffix . "." . $ext;

        if($directoryName)
        {
            $fileObject->move(public_path('files/'. $directoryName .'/'), $fileName);
        }
        else
        {
            $fileObject->move(public_path('files/'), $fileName);
        }
        return $fileName;
    }

    public function explodePdfToImages($pdfFileName,$createdDirectoryName)
    {
        $pdf = new Pdf(public_path($pdfFileName));
        $numberOfPages = $pdf->getNumberOfPages();
        $path = public_path('files/subjects/' . $createdDirectoryName . "/");

        if(!File::exists($path)) 
        {
            File::makeDirectory($path, 0777, true, true);
        }

        for($i = 1; $i <= $numberOfPages; $i++)
        {
            $pdf->setPage($i)->setOutputFormat('jpg')->saveImage(public_path('files/subjects/' . $createdDirectoryName . "/") . $i . ".jpg");
        }
    }

    public function upload($fileObject)
    {
        $ext = $fileObject->getClientOriginalExtension();
        $book_name = $request->name . "_book" . "." . $ext;
        $pathArray = explode('_',$book_name);
        $directory_name = array_shift($pathArray);

        if(file_exists(public_path($subject->book)))
        {
            unlink(public_path($subject->book));
        }

        if(File::exists(public_path('files/subjects/' . $directory_name . "/")))
        {
            File::deleteDirectory(public_path('files/subjects/' . $directory_name . "/"));
        }
        
        $book->move(public_path('files/subjects/'),$book_name);
    }


}