@extends('backend.layouts.theme', ['is_frontend' => true])

@section('title', __('Your password has expired.'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Your password has expired.')
        </x-slot>

        <x-slot name="body">
            <x-forms.patch :action="route('frontend.auth.password.expired.update')">
                <div class="form-group row mb-3">
                    <label for="current_password" class="col-md-4 col-form-label text-md-right">@lang('Current Password')</label>

                    <div class="col-md-6">
                        <input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus />
                    </div>
                </div><!--form-group-->

                <div class="form-group row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('New Password')</label>

                    <div class="col-md-6">
                        <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required autocomplete="password" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation')</label>

                    <div class="col-md-6">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" maxlength="100" placeholder="{{ __('Password Confirmation') }}" required autocomplete="new-password" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <button class="btn btn-primary" type="submit">@lang('Update Password')</button>
                    </div>
                </div><!--form-group-->
            </x-forms.patch>
        </x-slot>
    </x-frontend.card>
@endsection
