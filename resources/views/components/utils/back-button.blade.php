@props(['href' => '#',  'text' => __('Back'), 'permission' => false])

{{-- <x-utils.link :href="$href" class="btn btn-info btn-sm" :text="__('View')" permission="{{ $permission }}" /> --}}

<a href="{{ $href }}" class="btn btn-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="5" y1="12" x2="19" y2="12" /><line x1="5" y1="12" x2="9" y2="16" /><line x1="5" y1="12" x2="9" y2="8" /></svg>
    {{ $text }}
</a>
