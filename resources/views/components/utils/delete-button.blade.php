@props(['href' => '#', 'text' => __('Delete'), 'permission' => false, 'formClass' => 'd-inline', 'buttonClass' => 'btn btn-sm btn-danger btn-delete', 'index' => 0])

<form method="POST" action="{{ $href }}" name="delete-item" class="{{ $formClass }}" id="form-delete-{{ $index }}">
    @csrf
    @method('DELETE')

    <button type="button" class="{{ $buttonClass }}">
        {{-- @if ($icon)<i class="{{ $icon }}"></i> @endif{{ $slot }} --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
        {{ $text }}
    </button>
</form>
