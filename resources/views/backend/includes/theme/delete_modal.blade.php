<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <div class="modal-title">@lang('Are you sure?')</div>
            <div>@lang('If you proceed, you will lose the selected data.')</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">@lang('Cancel')</button>
            <button type="button" class="btn btn-danger" id="confirm-delete">@lang('Yes, delete data')</button>
        </div>
        </div>
    </div>
</div>

@push('after-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        // confirm delete
        const deleteButtons = document.getElementsByClassName("btn-delete");
        for (let i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].addEventListener('click', event => {
                const target = document.getElementById('deleteModal');
                const deleteModal = new bootstrap.Modal(target);
                deleteModal.show();

                target.querySelector('[id=confirm-delete').setAttribute("data-target", event.target.parentNode.id);
            });
        }

        const confirmDeleteButton = document.getElementById('confirm-delete');
        confirmDeleteButton.addEventListener('click', event => {
            const formTarget = event.target.getAttribute("data-target");
            document.getElementById(formTarget).submit();
        });
    });
</script>
@endpush

