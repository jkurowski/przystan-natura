@props([
    'data' => [
        'investment_name' => null,
        'name' => null,
        'email' => null,
        'phone' => null,
        'message' => null,
        'agreements' => [],
    ],
])

@if ($data['investment_name'])
    INWESTYCJA:<br>
    {{ $data['investment_name'] }} @if ($data['city']) {{ $data['city'] }} @endif
    <br><br>
@else
    @if ($data['city'])
    INWESTYCJA:<br>
    {{ $data['city'] }}
    <br><br>
    @endif
@endif

@if ($data['name'])
    IMIE:<br>
    {{ $data['name'] }}
@endif
<br><br>
@if ($data['email'])
    EMAIL:<br>
    {{ $data['email'] }}
@endif
<br><br>
@if ($data['phone'])
    TELEFON:<br>
    {{ $data['phone'] }}
@endif
<br><br>
@if ($data['message'])
    OPIS:<br>
    {{ $data['message'] }}
@endif
<br><br>
@if (!empty($data['agreements']))
    ZGODY:
    <br>
    @foreach ($data['agreements'] as $item)
        {{ strtoupper(isset($item['title']) ? $item['title'] : 'Brak tytułu') }} &nbsp; ({{ isset($item['description']) ? $item['description'] : 'Brak opisu' }}) <br>
    @endforeach
@endif
@if ($data['area_from'])
    <br><br>
    POWIERZCHNIA_OD:<br>
    {{ $data['area_from'] }}
@endif
<br><br>
@if ($data['area_to'])
    <br><br>
    POWIERZCHNIA_DO:<br>
    {{ $data['area_to'] }}
@endif

