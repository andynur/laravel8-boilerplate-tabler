@extends('backend.layouts.theme', ['is_frontend' => true])

@section('title', __('Verify Your E-mail Address'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Verify Your E-mail Address')
        </x-slot>

        <x-slot name="body">
            @lang('Before proceeding, please check your email for a verification link.')
            @lang('If you did not receive the email')

            <x-forms.post :action="route('frontend.auth.verification.resend')" class="d-inline">
                <button class="btn btn-link p-0 m-0 align-baseline" type="submit">@lang('click here to request another').</button>
            </x-forms.post>
        </x-slot>
    </x-frontend.card>
@endsection
