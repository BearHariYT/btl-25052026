<div x-data
    x-show="$store.confirmation.show"
    x-cloak
    style="position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.5);"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100">
    <div style="background:#1c1f37;border:1px solid rgba(255,255,255,0.09);border-radius:16px;padding:28px;max-width:420px;width:90%;">
        <h3 x-text="$store.confirmation.title" style="font-size:18px;font-weight:700;color:#fff;margin:0 0 10px;"></h3>
        <p x-text="$store.confirmation.message" style="font-size:14px;color:#6d708a;margin:0 0 20px;"></p>
        <div style="display:flex;gap:10px;justify-content:flex-end;">
            <button @click="$store.confirmation.close()"
                x-text="$store.confirmation.cancelText"
                style="padding:8px 18px;border-radius:8px;background:#252a43;color:#cdcfe3;border:none;cursor:pointer;font-size:14px;"></button>
            <button @click="$store.confirmation.execute()"
                x-text="$store.confirmation.confirmText"
                style="padding:8px 18px;border-radius:8px;background:#0195f4;color:#fff;border:none;cursor:pointer;font-size:14px;"></button>
        </div>
    </div>
</div>
