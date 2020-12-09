<ul class="list-unstyled ml-3 mt-2 mb-3">
    @foreach($children as $permission)
        <li>
            <input type="checkbox" class="form-check-input mb-2" name="permissions[]" {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->id }}" id="{{ $permission->id }}" />
            <label for="{{ $permission->id }}">{{ $permission->description ?? $permission->name }}</label>

            @if($permission->children->count())
                @include('backend.auth.role.includes.children', ['children' => $permission->children])
            @endif
        </li>
    @endforeach
</ul>
