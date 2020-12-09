@props(['dismissable' => true, 'type' => 'success', 'ariaLabel' => __('Close')])

<div {{ $attributes->merge(['class' => 'alert alert-'.$type. ' alert-dismissible fade show']) }} role="alert">
    @if ($dismissable)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ $ariaLabel }}"></button>
    @endif

    {{ $slot }}
</div>
