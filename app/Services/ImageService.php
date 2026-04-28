<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as ImageManager;

class ImageService
{
    public function upload(UploadedFile $file, object $model, bool $delete = false)
    {

        $path = 'uploads/gallery/images/';

        $folders = [
            $path,
            $path . 'webp/',
            $path . 'thumbs/',
            $path . 'thumbs/webp/'
        ];

        foreach ($folders as $folder) {
            $fullPath = public_path($folder);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }
        }

        if ($delete) {
            if (File::isFile(public_path($path . $model->file))) {
                File::delete(public_path($path . $model->file));
            }
            if (File::isFile(public_path($path.'webp/' . $model->file_webp))) {
                File::delete(public_path($path.'webp/' . $model->file_webp));
            }

            if (File::isFile(public_path($path.'thumbs/' . $model->file))) {
                File::delete(public_path($path.'thumbs/' . $model->file));
            }
            if (File::isFile(public_path($path.'thumbs/webp/' . $model->file_webp))) {
                File::delete(public_path($path.'thumbs/webp/' . $model->file_webp));
            }
        }
        $name_file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $name = date('His') . '_' . Str::slug($name_file) . '.' . $file->getClientOriginalExtension();
        $name_webp = date('His') . '_' . Str::slug($name_file) . '.webp';

        $file->move(public_path($path), $name);

        $filepath = public_path($path . $name);
        $filepath_webp = public_path($path.'webp/' . $name_webp);

        $thumb_filepath = public_path($path.'thumbs/' . $name);
        $thumb_filepath_webp = public_path($path.'thumbs/webp/' . $name_webp);

        ImageManager::make($filepath)
            ->resize(
                config('images.gallery.big_width'),
                config('images.gallery.big_height'),
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($filepath);
        ImageManager::make($filepath)->encode('webp', 90)->save($filepath_webp);

        ImageManager::make($filepath)
            ->fit(
                config('images.gallery.thumb_width'),
                config('images.gallery.thumb_height')
            )->save($thumb_filepath);
        ImageManager::make($thumb_filepath)->encode('webp', 90)->save($thumb_filepath_webp);

        $model->update([
            'file' => $name,
            'file_webp' => $name_webp,
            'name' => $file->getClientOriginalName()
        ]);
    }
}
