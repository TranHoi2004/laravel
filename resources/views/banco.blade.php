<h2>Bàn cờ {{ $n }} x {{ $n }}</h2>

<table border="1" cellpadding="8">
@for ($i = 0; $i < $n; $i++)
    <tr>
    @for ($j = 0; $j < $n; $j++)
        <td style="
            width:30px;
            height:30px;
            background-color: {{ ($i + $j) % 2 == 0 ? 'white' : 'black' }};
        ">
        </td>
    @endfor
    </tr>
@endfor
</table>
