<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

//CMS
use App\Models\Plan;

class InvestmentService
{
    public function uploadThumb(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('investment/thumbs/' . $model->file_thumb))) {
                File::delete(public_path('investment/thumbs/' . $model->file_thumb));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->move(public_path('investment/thumbs'), $name);

        $filepath = public_path('investment/thumbs/' . $name);
        Image::make($filepath)
            ->fit(
                config('images.investment.thumb_width'),
                config('images.investment.thumb_height')
            )
            ->save($filepath);

        $model->update(['file_thumb' => $name]);
    }

    public function uploadLogo(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        if ($delete) {
            if (File::isFile(public_path('investment/logo/' . $model->file_logo))) {
                File::delete(public_path('investment/logo/' . $model->file_logo));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->move(public_path('investment/logo'), $name);

        $filepath = public_path('investment/logo/' . $name);
        Image::make($filepath)
            ->fit(
                config('images.investment.logo_width'),
                config('images.investment.logo_height')
            )
            ->save($filepath);

        $model->update(['file_logo' => $name]);
    }

    public function uploadPlan(object $model, UploadedFile $file)
    {

        if ($model->plan()->exists()) {
            if (File::isFile(public_path('investment/plan/' . $model->plan()->first()->file))) {
                File::delete(public_path('investment/plan/' . $model->plan()->first()->file));
            }
        }

        $name = date('His') . '_' . Str::slug($model->name) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('investment/plan'), $name);

        $filepath = public_path('investment/plan/' . $name);
        Image::make($filepath)->resize(
            config('images.plan.width'),
            config('images.plan.height'),
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filepath);

        Plan::updateOrCreate(
            ['investment_id' => $model->id],
            ['file' => $name]
        );
    }

    public function uploadAdvantageImage(string $title, UploadedFile $file, object $model, bool $delete = false)
    {

        $path = 'investment/advantage/';

        $folders = [
            $path
        ];

        foreach ($folders as $folder) {
            $fullPath = public_path($folder);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
            }
        }

        if ($delete) {
            if (File::isFile(public_path($path . $model->file_advantage))) {
                File::delete(public_path($path . $model->file_advantage));
            }
        }

        $name = date('His').'_'.Str::slug($title).'.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $name);
        $filepath = public_path($path . $name);

        Image::make($filepath)
            ->fit(
                config('images.investment.advantage_width'),
                config('images.investment.advantage_height')
            )
            ->save($filepath);

        $model->update(['file_advantage' => $name]);
    }

    public function uploadBrochure(string $title, UploadedFile $file, object $model, bool $delete = false)
    {
        if ($delete && !empty($model->file_brochure)) {
            $brochurePath = public_path('investment/brochure/' . $model->file_brochure);

            if (File::exists($brochurePath) && File::isFile($brochurePath)) {
                File::delete($brochurePath);
            }
        }

        $name = date('His') . '_' . Str::slug($title) . '.' . $file->getClientOriginalExtension();

        // Save file to public/investment/brochure
        $file->move(public_path('investment/brochure'), $name);

        // Update model
        $model->update(['file_brochure' => $name]);
    }
}
