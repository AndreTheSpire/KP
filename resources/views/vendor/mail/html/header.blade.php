<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://cdn.discordapp.com/attachments/755257462092726423/962935260717408266/unknown.png" height="100" width="200" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
