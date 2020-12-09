@extends('backend.layouts.theme', ['is_frontend' => true])

@section('title', __('Please confirm your password before continuing.'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Please confirm your password before continuing.')
        </x-slot>

        <x-slot name="body">
            <x-forms.post :action="route('frontend.auth.password.confirm')">
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">@lang('Password')</label>

                    <div class="col-md-6">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                    </div>
                </div><!--form-group-->

                <div class="form-group row mt-3 mb-3">
                    <div class="col-md-6 offset-md-4">
                        <button class="btn btn-primary" type="submit">@lang('Confirm Password')</button>
                    </div>
                </div><!--form-group-->
            </x-forms.post>
        </x-slot>
    </x-frontend.card>
@endsection
