@extends('backend.layouts.theme')

@section('title', __('View User'))

@section('content')
    {{-- Header  --}}
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    @lang('User Management') &dash; User Profile
                </h2>
            </div>
            <div class="col pr-0">
                <div class="float-right">
                    <x-utils.edit-button class="btn btn-primary" :href="route('admin.auth.user.edit', $user)" />
                    <x-utils.back-button :href="route('admin.auth.user.index')" />
                </div>
            </div>
        </div>
    </div>

    {{-- Table data  --}}
    <div class="row row-cards">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <th>@lang('Type')</th>
                        <td>@include('backend.auth.user.includes.type')</td>
                    </tr>

                    <tr>
                        <th>@lang('Avatar')</th>
                        <td><img src="{{ $user->avatar }}" class="user-profile-image" /></td>
                    </tr>

                    <tr>
                        <th>@lang('Name')</th>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <th>Username</th>
                        <td>{{ $user->username }}</td>
                    </tr>

                    <tr>
                        <th>@lang('E-mail Address')</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th>@lang('Status')</th>
                        <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
                    </tr>

                    {{-- <tr>
                        <th>@lang('Verified')</th>
                        <td>@include('backend.auth.user.includes.verified', ['user' => $user])</td>
                    </tr>

                    <tr>
                        <th>@lang('2FA')</th>
                        <td>@include('backend.auth.user.includes.2fa', ['user' => $user])</td>
                    </tr>

                    <tr>
                        <th>@lang('Timezone')</th>
                        <td>{{ $user->timezone ?? __('N/A') }}</td>
                    </tr> --}}

                    <tr>
                        <th>@lang('Last Login At')</th>
                        <td>
                            @if($user->last_login_at)
                                @displayDate($user->last_login_at)
                            @else
                                @lang('N/A')
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>@lang('Last Known IP Address')</th>
                        <td>{{ $user->last_login_ip ?? __('N/A') }}</td>
                    </tr>

                    @if ($user->isSocial())
                        <tr>
                            <th>@lang('Provider')</th>
                            <td>{{ $user->provider ?? __('N/A') }}</td>
                        </tr>

                        <tr>
                            <th>@lang('Provider ID')</th>
                            <td>{{ $user->provider_id ?? __('N/A') }}</td>
                        </tr>
                    @endif

                    <tr>
                        <th>@lang('Roles')</th>
                        <td>{!! $user->roles_label !!}</td>
                    </tr>

                    {{-- <tr>
                        <th>@lang('Additional Permissions')</th>
                        <td>{!! $user->permissions_label !!}</td>
                    </tr> --}}
                </table>
            </div>
            {{-- <div class="card-footer">
                <small class="float-right text-muted">
                    <strong>@lang('Account Created'):</strong> @displayDate($user->created_at) ({{ $user->created_at->diffForHumans() }}),
                    <strong>@lang('Last Updated'):</strong> @displayDate($user->updated_at) ({{ $user->updated_at->diffForHumans() }})

                    @if($user->trashed())
                        <strong>@lang('Account Deleted'):</strong> @displayDate($user->deleted_at) ({{ $user->deleted_at->diffForHumans() }})
                    @endif
                </small>
            </div> --}}
        </div>
    </div>
@endsection

{{-- @extends('backend.layouts.app')

@section('title', __('View User'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View User')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Type')</th>
                    <td>@include('backend.auth.user.includes.type')</td>
                </tr>

                <tr>
                    <th>@lang('Avatar')</th>
                    <td><img src="{{ $user->avatar }}" class="user-profile-image" /></td>
                </tr>

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>

                <tr>
                    <th>@lang('E-mail Address')</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>@lang('Status')</th>
                    <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('Verified')</th>
                    <td>@include('backend.auth.user.includes.verified', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('2FA')</th>
                    <td>@include('backend.auth.user.includes.2fa', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('Timezone')</th>
                    <td>{{ $user->timezone ?? __('N/A') }}</td>
                </tr>

                <tr>
                    <th>@lang('Last Login At')</th>
                    <td>
                        @if($user->last_login_at)
                            @displayDate($user->last_login_at)
                        @else
                            @lang('N/A')
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('Last Known IP Address')</th>
                    <td>{{ $user->last_login_ip ?? __('N/A') }}</td>
                </tr>

                @if ($user->isSocial())
                    <tr>
                        <th>@lang('Provider')</th>
                        <td>{{ $user->provider ?? __('N/A') }}</td>
                    </tr>

                    <tr>
                        <th>@lang('Provider ID')</th>
                        <td>{{ $user->provider_id ?? __('N/A') }}</td>
                    </tr>
                @endif

                <tr>
                    <th>@lang('Roles')</th>
                    <td>{!! $user->roles_label !!}</td>
                </tr>

                <tr>
                    <th>@lang('Additional Permissions')</th>
                    <td>{!! $user->permissions_label !!}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Account Created'):</strong> @displayDate($user->created_at) ({{ $user->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($user->updated_at) ({{ $user->updated_at->diffForHumans() }})

                @if($user->trashed())
                    <strong>@lang('Account Deleted'):</strong> @displayDate($user->deleted_at) ({{ $user->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection --}}
