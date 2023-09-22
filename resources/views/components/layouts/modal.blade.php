@props([
    'title' => 'Title',
    'form' => null,
    'footer' => '',
])
<!-- start::booking-create-modal -->
<div {{ $attributes->merge(['class' => 'modal fade', 'id' => 'id-modal', 'role' => 'dialog']) }} >
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <x-forms.form :attr="$form->attributes">
                <div class="modal-header">
                    <h4 class="modal-title"> {{ $title }} </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            </x-forms.form>
        </div>

    </div>
</div>
<!-- end::booking-create-modal -->
