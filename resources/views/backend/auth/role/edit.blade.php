@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.theme')

@section('title', __('Update Role'))

@section('content')
    {{-- Header  --}}
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    @lang('Role Management') &dash; @lang('Update User')
                </h2>
            </div>
            <div class="col pr-0">
                <div class="float-right">
                    <x-utils.back-button :href="route('admin.auth.role.index')" />
                </div>
            </div>
        </div>
    </div>

    <x-forms.patch :action="route('admin.auth.role.update', $role)">
        <div class="row row-cards">
            <div class="card">
                <div class="card-body">
                    <div x-data="{userType : '{{ $role->type }}'}">
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                            <div class="col-md-10">
                                <select name="type" class="form-select" required x-on:change="userType = $event.target.value">
                                    <option value="{{ $model::TYPE_USER }}" {{ $role->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}" {{ $role->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                                </select>
                            </div>
                        </div><!--form-group-->

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                            <div class="col-md-10">
                                <input type="text"  name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $role->name }}" maxlength="100" required />
                            </div>
                        </div><!--form-group-->

                        @include('backend.auth.includes.permissions')
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-lg btn-primary float-right" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        @lang('Update Role')
                    </button>
                </div>
            </div>
        </div>
    </x-forms.patch>
@endsection
