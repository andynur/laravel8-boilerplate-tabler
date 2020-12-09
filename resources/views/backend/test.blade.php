@extends('backend.layouts.theme')

@section('title', __('Dashboard'))

@section('content')
    <!-- Sample Page -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    @lang('Hello :Name', ['name' => $logged_in_user->name])
                </h2>
                <p class="mt-2">@lang('Welcome to the Dashboard')</p>
            </div>
        </div>
    </div>
@endsection
