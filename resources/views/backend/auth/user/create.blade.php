@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.theme')

@section('title', __('Create User'))

@section('content')
    {{-- Header  --}}
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    @lang('User Management') &dash; @lang('Create User')
                </h2>
            </div>
            <div class="col pr-0">
                <div class="float-right">
                    <x-utils.back-button :href="route('admin.auth.user.index')" />
                </div>
            </div>
        </div>
    </div>

    {{-- Table data  --}}
    <x-forms.post :action="route('admin.auth.user.store')">
        <div class="row row-cards">
            <div class="card">
                <div class="card-body">
                    <div x-data="{userType : '{{ $model::TYPE_USER }}'}">
                        <div class="form-group mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                            <div class="col-md-10">
                                <select name="type" class="form-select" required x-on:change="userType = $event.target.value">
                                    <option value="{{ $model::TYPE_USER }}">@lang('User')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}">@lang('Administrator')</option>
                                </select>
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row">
                            <label for="username" class="col-md-2 col-form-label">@lang('Username')</label>

                            <div class="col-md-10">
                                <input type="text" name="username" class="form-control" placeholder="{{ __('Username') }}" value="{{ old('username') }}" maxlength="30" required />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                            <div class="col-md-10">
                                <input type="email" name="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row">
                            <label for="password" class="col-md-2 col-form-label">@lang('Password')</label>

                            <div class="col-md-10">
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password" />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row">
                            <label for="password_confirmation" class="col-md-2 col-form-label">@lang('Password Confirmation')</label>

                            <div class="col-md-10">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row d-none">
                            <label for="active" class="col-md-2 col-form-label">@lang('Active')</label>

                            <div class="col-md-10">
                                <div class="form-check">
                                    <input name="active" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                                </div><!--form-check-->
                            </div>
                        </div><!--form-group-->

                        {{-- <div x-data="{ emailVerified : false }">
                            <div class="form-group mb-3 row">
                                <label for="email_verified" class="col-md-2 col-form-label">@lang('E-mail Verified')</label>

                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="email_verified"
                                            id="email_verified"
                                            value="1"
                                            class="form-check-input"
                                            x-on:click="emailVerified = !emailVerified"
                                            {{ old('email_verified') ? 'checked' : '' }} />
                                    </div><!--form-check-->
                                </div>
                            </div><!--form-group-->

                            <div x-show="!emailVerified">
                                <div class="form-group mb-3 row">
                                    <label for="send_confirmation_email" class="col-md-2 col-form-label">@lang('Send Confirmation E-mail')</label>

                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <input
                                                type="checkbox"
                                                name="send_confirmation_email"
                                                id="send_confirmation_email"
                                                value="1"
                                                class="form-check-input"
                                                {{ old('send_confirmation_email') ? 'checked' : '' }} />
                                        </div><!--form-check-->
                                    </div>
                                </div><!--form-group-->
                            </div>
                        </div>

                        @include('backend.auth.includes.roles')

                        @if (!config('boilerplate.access.user.only_roles'))
                            @include('backend.auth.includes.permissions')
                        @endif --}}
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-lg btn-primary float-right" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        @lang('Create User')
                    </button>
                </div>
            </div>
        </div>
    </x-forms.post>
@endsection

{{-- @extends('backend.layouts.app')

@section('title', __('Create User'))

@section('content')
    <x-forms.post :action="route('admin.auth.user.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $model::TYPE_USER }}'}">
                    <div class="form-group mb-3 row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                        <div class="col-md-10">
                            <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                <option value="{{ $model::TYPE_USER }}">@lang('User')</option>
                                <option value="{{ $model::TYPE_ADMIN }}">@lang('Administrator')</option>
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="username" class="col-md-2 col-form-label">@lang('username')</label>

                        <div class="col-md-10">
                            <input type="text" name="username" class="form-control" placeholder="{{ __('username') }}" value="{{ old('username') }}" maxlength="30" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="password" class="col-md-2 col-form-label">@lang('Password')</label>

                        <div class="col-md-10">
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="new-password" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="password_confirmation" class="col-md-2 col-form-label">@lang('Password Confirmation')</label>

                        <div class="col-md-10">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="new-password" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="active" class="col-md-2 col-form-label">@lang('Active')</label>

                        <div class="col-md-10">
                            <div class="form-check">
                                <input name="active" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </div>
                    </div><!--form-group-->

                    <div x-data="{ emailVerified : false }">
                        <div class="form-group mb-3 row">
                            <label for="email_verified" class="col-md-2 col-form-label">@lang('E-mail Verified')</label>

                            <div class="col-md-10">
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        name="email_verified"
                                        id="email_verified"
                                        value="1"
                                        class="form-check-input"
                                        x-on:click="emailVerified = !emailVerified"
                                        {{ old('email_verified') ? 'checked' : '' }} />
                                </div><!--form-check-->
                            </div>
                        </div><!--form-group-->

                        <div x-show="!emailVerified">
                            <div class="form-group mb-3 row">
                                <label for="send_confirmation_email" class="col-md-2 col-form-label">@lang('Send Confirmation E-mail')</label>

                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="send_confirmation_email"
                                            id="send_confirmation_email"
                                            value="1"
                                            class="form-check-input"
                                            {{ old('send_confirmation_email') ? 'checked' : '' }} />
                                    </div><!--form-check-->
                                </div>
                            </div><!--form-group-->
                        </div>
                    </div>

                    @include('backend.auth.includes.roles')

                    @if (!config('boilerplate.access.user.only_roles'))
                        @include('backend.auth.includes.permissions')
                    @endif
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection --}}
