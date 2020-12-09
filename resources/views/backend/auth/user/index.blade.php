@extends('backend.layouts.theme')

@section('title', __('User Management'))

@section('content')
    {{-- Header  --}}
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    @lang('User Management')
                </h2>
            </div>
            <div class="col pr-0">
                <div class="float-right">
                    <x-utils.add-button :href="route('admin.auth.user.create')" text="Add New" />
                </div>
            </div>
        </div>
    </div>

    {{-- Table data  --}}
    <div class="row row-cards">
        <div class="card">
            <div class="card-body">
                <livewire:backend.users-table />
            </div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    @include('backend.includes.theme.delete_modal')
@endsection

{{-- @extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('User Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.auth.user.create')"
                    :text="__('Create User')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.users-table />
        </x-slot>
    </x-backend.card>
@endsection --}}
