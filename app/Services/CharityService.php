<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as ImageManager;

class CharityService
{
    public function upload(UploadedFile $file, object $model, bool $delete = false): void
    {
        $path = 'uploads/charity/';

        $folders = [
            $path,
            $path . 'thumbs/',
        ];

        foreach ($folders as $folder) {
            $fullPath = public_path($folder);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }
        }

        if ($delete) {
            if (File::isFile(public_path($path . $model->image))) {
                File::delete(public_path($path . $model->image));
            }

            if (File::isFile(public_path($path.'thumbs/' . $model->image))) {
                File::delete(public_path($path.'thumbs/' . $model->image));
            }
        }

        $name_file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $name = date('His') . '_' . Str::slug($name_file) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $name);
        $filepath = public_path($path . $name);
        $thumb_filepath = public_path($path.'thumbs/' . $name);

        ImageManager::make($filepath)
            ->resize(
                1920,
                1920,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($filepath);

        ImageManager::make($filepath)
            ->fit(
                512,
                512
            )->save($thumb_filepath);

        $model->update([
            'image' => $name
        ]);
    }
}
