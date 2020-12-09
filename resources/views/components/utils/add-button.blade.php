@props(['href' => '#',  'text' => __('Add'), 'permission' => false])

{{-- <x-utils.link :href="$href" class="btn btn-info btn-sm" :text="__('View')" permission="{{ $permission }}" /> --}}

<a href="{{ $href }}" class="btn btn-success">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
    {{ $text }}
</a>
