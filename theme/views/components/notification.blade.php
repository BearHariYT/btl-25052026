<div x-data style="position:fixed;top:80px;left:50%;transform:translateX(-50%);z-index:9999;display:flex;flex-direction:column;gap:8px;pointer-events:none;">
    <template x-for="(n, i) in $store.notifications.notifications" :key="n.id">
        <div x-show="n.show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            @click="$store.notifications.removeNotification(n.id)"
            :class="n.type === 'success' ? 'notif-success' : 'notif-error'"
            class="px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer pointer-events-auto shadow-xl backdrop-blur-sm"
            style="backdrop-filter:blur(12px);">
            <p x-text="n.message"></p>
        </div>
    </template>
</div>
