@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.theme')

@section('title', __('Update User'))

@section('content')
    {{-- Header  --}}
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    @lang('User Management') &dash; @lang('Update User')
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
    <x-forms.patch :action="route('admin.auth.user.update', $user)">
        <div class="row row-cards">
            <div class="card">
                <div class="card-body">
                    <div x-data="{userType : '{{ $user->type }}'}">
                        @if (!$user->isMasterAdmin())
                            <div class="form-group mb-3 row">
                                <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                                <div class="col-md-10">
                                    <select name="type" class="form-select" required x-on:change="userType = $event.target.value">
                                        <option value="{{ $model::TYPE_USER }}" {{ $user->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                        <option value="{{ $model::TYPE_ADMIN }}" {{ $user->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                                    </select>
                                </div>
                            </div><!--form-group-->
                        @endif

                        <div class="form-group mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $user->name }}" maxlength="100" required />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row">
                            <label for="username" class="col-md-2 col-form-label">Username</label>

                            <div class="col-md-10">
                                <input type="text" name="username" class="form-control" placeholder="{{ __('Username') }}" value="{{ old('username') ?? $user->username }}" maxlength="30" required />
                            </div>
                        </div><!--form-group-->

                        <div class="form-group mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                            <div class="col-md-10">
                                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $user->email }}" maxlength="255" required />
                            </div>
                        </div><!--form-group-->

                        {{-- @if (!$user->isMasterAdmin())
                            @include('backend.auth.includes.roles')

                            @if (!config('boilerplate.access.user.only_roles'))
                                @include('backend.auth.includes.permissions')
                            @endif
                        @endif --}}
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-lg btn-primary float-right" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        @lang('Update User')
                    </button>
                </div>
            </div>
        </div>
    </x-forms.patch>
@endsection


{{-- @extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
    <x-forms.patch :action="route('admin.auth.user.update', $user)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $user->type }}'}">
                    @if (!$user->isMasterAdmin())
                        <div class="form-group mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                            <div class="col-md-10">
                                <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                    <option value="{{ $model::TYPE_USER }}" {{ $user->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}" {{ $user->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                                </select>
                            </div>
                        </div><!--form-group-->
                    @endif

                    <div class="form-group mb-3 row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $user->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="username" class="col-md-2 col-form-label">Username</label>

                        <div class="col-md-10">
                            <input type="text" name="username" class="form-control" placeholder="{{ __('Username') }}" value="{{ old('username') }}" maxlength="30" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group mb-3 row">
                        <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $user->email }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->

                    @if (!$user->isMasterAdmin())
                        @include('backend.auth.includes.roles')

                        @if (!config('boilerplate.access.user.only_roles'))
                            @include('backend.auth.includes.permissions')
                        @endif
                    @endif
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection --}}
