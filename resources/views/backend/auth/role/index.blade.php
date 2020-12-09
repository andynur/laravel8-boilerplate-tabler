@extends('backend.layouts.theme')

@section('title', __('Role Management'))

@section('content')
    {{-- Header  --}}
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    @lang('Role Management')
                </h2>
            </div>
            <div class="col pr-0">
                <div class="float-right">
                    <x-utils.add-button :href="route('admin.auth.role.create')" text="Add New" />
                </div>
            </div>
        </div>
    </div>

    {{-- Table data  --}}
    <div class="row row-cards">
        <div class="card">
            <div class="card-body">
                <livewire:backend.roles-table />
            </div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    @include('backend.includes.theme.delete_modal')
@endsection
