<?php

use App\Models\Floor;
use App\Models\Investment;
use App\Models\Property;

if (! function_exists('parse_text')) {
    function parse_text($string, $json = false)
    {
        if ($json) {
            $locale = app()->getLocale();
            $data = json_decode($string, true);
            $string = $data[$locale] ?? $string;
        }

        $output = preg_replace_callback('/\[galeria=(.+?)](.+?)\[\/galeria\]/s', 'makeGallery', $string);

        $output = preg_replace_callback('/\[surface\s+type="([^"]+)"\s+investment="([^"]+)"\]\[\/surface\]/', 'makeSurfaceList', $output);

        $output = preg_replace_callback('/\[floorSurface\s+type="([^"]+)"\s+floor="([^"]+)"\]\[\/floorSurface\]/', 'makeFloorSurfaceList', $output);

        $output = preg_replace_callback('/\[phone=(.*?)\](.*?)\[\/phone\]/', function($matches) {
            $number = trim($matches[1]);
            $display = trim($matches[2]);
            return <<<HTML
                <a href="tel:$number" class="cta__link d-flex align-items-center justify-content-start gap-2 mt-15"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g id="phone" transform="translate(-546.5 -3478.5)"><path id="Subtraction_13" data-name="Subtraction 13" d="M-7725,3461.5a15.4,15.4,0,0,1-10.959-4.54A15.4,15.4,0,0,1-7740.5,3446a15.4,15.4,0,0,1,4.541-10.96A15.4,15.4,0,0,1-7725,3430.5a15.4,15.4,0,0,1,10.96,4.54,15.4,15.4,0,0,1,4.54,10.96,15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-7725,3461.5Zm0-30a14.405,14.405,0,0,0-10.252,4.247A14.405,14.405,0,0,0-7739.5,3446a14.405,14.405,0,0,0,4.248,10.253A14.4,14.4,0,0,0-7725,3460.5a14.4,14.4,0,0,0,10.253-4.247A14.406,14.406,0,0,0-7710.5,3446a14.406,14.406,0,0,0-4.247-10.253A14.406,14.406,0,0,0-7725,3431.5Zm6.336,22.5a13.851,13.851,0,0,1-13.835-13.835,1.665,1.665,0,0,1,1.664-1.664h2.663a1.665,1.665,0,0,1,1.662,1.664,7.716,7.716,0,0,0,.391,2.432l0,.009a1.677,1.677,0,0,1-.387,1.662l-.982,1.3a8.411,8.411,0,0,0,3.414,3.413l1.347-1.015a1.638,1.638,0,0,1,1.121-.42,1.6,1.6,0,0,1,.518.083,7.687,7.687,0,0,0,2.422.385,1.665,1.665,0,0,1,1.664,1.664v2.656A1.665,1.665,0,0,1-7718.664,3454Zm-12.172-14.5a.664.664,0,0,0-.664.664A12.85,12.85,0,0,0-7718.664,3453a.664.664,0,0,0,.664-.663v-2.656a.664.664,0,0,0-.664-.664,8.691,8.691,0,0,1-2.741-.437.611.611,0,0,0-.2-.031.644.644,0,0,0-.435.148l-.027.028-.031.023-1.886,1.421-.282-.15a9.486,9.486,0,0,1-4.257-4.257l-.149-.281,1.407-1.869.025-.025a.679.679,0,0,0,.167-.681,8.71,8.71,0,0,1-.44-2.742.663.663,0,0,0-.662-.664Z" transform="translate(8287 48)"/></g></svg>$display</a>
            HTML;
        }, $output);

        $output = preg_replace_callback('/\[email=(.*?)\](.*?)\[\/email\]/', function($matches) {
            $email = trim($matches[1]);
            $display = trim($matches[2]);
            return <<<HTML
                <a href="mailto:$email" class="cta__link d-flex align-items-center justify-content-start gap-2 mt-15"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g id="mail" transform="translate(-546.5 -3528.5)"><path id="Subtraction_2" data-name="Subtraction 2" d="M-1975,30.5a15.4,15.4,0,0,1-10.96-4.54A15.4,15.4,0,0,1-1990.5,15a15.4,15.4,0,0,1,4.54-10.96A15.4,15.4,0,0,1-1975-.5a15.4,15.4,0,0,1,10.96,4.54A15.4,15.4,0,0,1-1959.5,15a15.4,15.4,0,0,1-4.54,10.96A15.4,15.4,0,0,1-1975,30.5Zm0-30a14.406,14.406,0,0,0-10.253,4.247A14.406,14.406,0,0,0-1989.5,15a14.4,14.4,0,0,0,4.247,10.252A14.406,14.406,0,0,0-1975,29.5a14.4,14.4,0,0,0,10.253-4.247A14.4,14.4,0,0,0-1960.5,15a14.406,14.406,0,0,0-4.247-10.253A14.4,14.4,0,0,0-1975,.5Zm5.958,21.727h-11.916a3,3,0,0,1-2.995-2.995V11.894l8.7,5.314a.45.45,0,0,0,.239.066.449.449,0,0,0,.233-.063l.006,0,8.724-5.313v7.337A3,3,0,0,1-1969.042,22.227Zm-13.911-8.55v5.556a2,2,0,0,0,1.995,1.995h11.916a2,2,0,0,0,1.995-1.995V13.675l-7.2,4.386a1.455,1.455,0,0,1-.761.214,1.445,1.445,0,0,1-.764-.215Zm7.963,3.248-8.946-5.454.074-.347a2.986,2.986,0,0,1,2.9-2.351h11.916a2.986,2.986,0,0,1,2.9,2.351l.074.347ZM-1982.781,11l7.791,4.75,7.772-4.749a1.982,1.982,0,0,0-1.824-1.231h-11.916A1.982,1.982,0,0,0-1982.781,11Z" transform="translate(2537 3529)"/></g></svg>$display</a>
            HTML;
        }, $output);

        $output = preg_replace(
            [
                '/<p>\s*(<a href="tel:[^"]+".*?<\/a>)\s*<\/p>/is',
                '/<p>\s*(<a href="mailto:[^"]+".*?<\/a>)\s*<\/p>/is'
            ],
            '$1',
            $output
        );

        return str_replace(
            array("</div>\n</p>", "<p><div"),
            array("</div>", "<div"),
            $output
        );
    }
}

if (! function_exists('makeGallery')) {
    function makeGallery($input)
    {
        $photos = \App\Models\Image::where('gallery_id', $input[2])->orderBy("sort")->get();

        if ($input[1] == 'gallery') {
            return view('front.parse.gallery', ['list' => $photos])->render();
        }

        if ($input[1] == 'galeria') {
            return view('front.parse.gallery', ['list' => $photos])->render();
        }

        if ($input[1] == 'carousel') {
            return view('front.parse.slick-carousel', ['list' => $photos])->render();
        }

        if ($input[1] == 'slider') {
            return view('front.parse.slider', ['list' => $photos])->render();
        }
    }
}


if (! function_exists('makeSurfaceList')) {
    function makeSurfaceList($matches)
    {
        $editorId = $matches[1];
        $investmentId = $matches[2];

        $investment = Investment::find($investmentId);

        if (! $investment) {
            return '<!-- brak inwestycji -->';
        }

        $map = [
            '1' => ['5'],
            '2' => ['4'],
            '3' => ['0'],
            '4' => ['3'],
            '5' => ['6'],
            '6' => ['7'],
        ];

        $types = $map[$editorId] ?? [$editorId];

        $properties = Property::whereIn('status', [1, 2])
            ->where('investment_id', $investmentId)
            ->whereIn('type', $types)
            ->whereHas('building', function ($q) {
                $q->where('active', 1);
            })
            ->orderBy('status')
            ->get();

        return view('front.parse.surface-list', [
            'list' => $properties,
            'type' => $editorId
        ])->render();
    }
}

if (! function_exists('makeFloorSurfaceList')) {
    function makeFloorSurfaceList($matches)
    {
        $editorId = $matches[1];
        $floorId = $matches[2];

        $floor = Floor::find($floorId);

        if (! $floor) {
            return '<!-- brak piętra -->';
        }

        $map = [
            '1' => ['2'],
            '2' => ['4'],
            '3' => ['0'],
            '4' => ['3'],
            '5' => ['6'],
            '6' => ['7'],
        ];

        $types = $map[$editorId] ?? [$editorId];

        $properties = Property::whereIn('status', [1, 2])
            ->where('floor_id', $floorId)
            ->whereIn('type', $types)
            ->orderBy('status')
            ->get();

        return view('front.parse.surface-list', [
            'list' => $properties
        ])->render();
    }
}
