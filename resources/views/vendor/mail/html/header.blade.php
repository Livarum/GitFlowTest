@props(['url'])

{{-- <tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('assets/img/LogoHD-NoBg.png') }}" alt="Mogel Fluidos" width="200" height="100" style="display: block; max-width: 100%;">
                <img src="https://fastly.picsum.photos/id/883/200/100.jpg?hmac=cKNQgYpva0xYWF6wpqWM8QXUTupLJwyaujUzUYU2Qbs"
                    class="logo" alt="Laravel Logo">
            @endif
        </a>
    </td>
</tr> --}}
{{-- 
https://fastly.picsum.photos/id/883/200/100.jpg?hmac=cKNQgYpva0xYWF6wpqWM8QXUTupLJwyaujUzUYU2Qbs --}}


<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                <img src="https://erp.mudviewer.com/assets/img/logo.jpg" class="logo" alt="{{ $slot }}"
                    width="250px">
                {{-- <img src="{{ asset('assets/img/LogoHD-NoBg.png') }}" alt="Mogel Fluidos" width="200" height="100" style="display: block; max-width: 100%;"> --}}
{{--                 <img src="https://fastly.picsum.photos/id/883/200/100.jpg?hmac=cKNQgYpva0xYWF6wpqWM8QXUTupLJwyaujUzUYU2Qbs"
                class="logo" alt="Laravel Logo"> --}}
            @endif
        </a>
    </td>
</tr>
