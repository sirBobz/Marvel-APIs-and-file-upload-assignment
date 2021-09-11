<div>
    <form wire:submit.prevent="import" enctype="multipart/form-data">
        @csrf
        <input type="file" wire:model="importFile" accept=".csv" required class="@error('import_file') is-invalid @enderror">
        <button class="btn btn-outline-secondary">Import</button>
        @error('import_file')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </form>

    @if($importing && !$importFinished)
        <div wire:poll="updateImportProgress" style="color:#e7b416"> <i class="fas fa-spinner fa-spin"></i> Importing...please wait.</div>
    @endif

    @if($importFinished)
    <div style="color:#2dc937"><i class="fa fa-check" aria-hidden="true"></i>  Finished importing.</div>
    @endif
</div>
