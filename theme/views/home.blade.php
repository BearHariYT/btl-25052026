<div>
    <div style="position:relative;height:300px;overflow:hidden;background:linear-gradient(135deg,#1a2547 0%,#141627 100%);">
        <div style="position:absolute;inset:0;background:radial-gradient(600px 400px at 20% 50%,rgba(1,149,244,0.15),transparent 70%),radial-gradient(400px 300px at 80% 20%,rgba(167,94,234,0.10),transparent 70%);pointer-events:none;"></div>
        <div style="position:absolute;inset:0;box-shadow:inset 0 -120px 80px 0 #141627,inset 0 0 10px 0 #141627;pointer-events:none;"></div>
        <div style="position:relative;z-index:2;max-width:1380px;margin:0 auto;padding:0 24px;height:100%;display:flex;flex-direction:column;justify-content:center;">
            <h1 style="font-size:36px;font-weight:700;color:#fff;margin:0 0 10px;letter-spacing:-0.02em;">{{ config('app.name') }}</h1>
            <p style="font-size:16px;color:#cdcfe3;margin:0 0 24px;max-width:480px;">Игровой хостинг нового уровня — Minecraft, RUST, ARK и другие</p>
            @auth
                <a href="{{ route('dashboard') }}" wire:navigate class="btn-bl-primary" style="width:fit-content;">Личный кабинет →</a>
            @else
                <div style="display:flex;gap:12px;">
                    <a href="{{ route('register') }}" wire:navigate class="btn-bl-primary" style="width:fit-content;">Начать</a>
                    <a href="{{ route('login') }}" wire:navigate class="btn-bl-secondary" style="width:fit-content;">Войти</a>
                </div>
            @endauth
        </div>
    </div>

    <div style="max-width:1380px;margin:0 auto;padding:32px 24px 60px;">
        @if(theme('home_page_text'))
            <div class="gc" style="padding:24px;margin-bottom:28px;">
                <article class="prose prose-invert max-w-full">{!! Str::markdown(theme('home_page_text',''),['allow_unsafe_links'=>false,'renderer'=>['soft_break'=>'<br>']]) !!}</article>
            </div>
        @endif
        <h2 style="font-size:20px;font-weight:600;color:#fff;margin:0 0 20px;">Услуги</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:16px;">
            @forelse ($categories as $category)
                <div class="gc bl-cat-card" style="cursor:pointer;">
                    @if ($category->image)
                        <div style="height:130px;overflow:hidden;">
                            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="bl-cat-img" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                    @endif
                    <div style="padding:16px 18px 18px;">
                        <h3 style="font-size:17px;font-weight:700;color:#fff;margin:0 0 6px;">{{ $category->name }}</h3>
                        @if(theme('show_category_description',true) && $category->description)
                            <div style="font-size:13px;color:#6d708a;margin-bottom:14px;line-height:1.4;">{!! $category->description !!}</div>
                        @endif
                        <a href="{{ route('category.show',['category'=>$category->slug]) }}" wire:navigate class="btn-bl-primary">
                            Подробнее →
                        </a>
                    </div>
                </div>
            @empty
                <p style="color:#6d708a;font-size:14px;">Услуги скоро появятся</p>
            @endforelse
        </div>
    </div>
    {!! hook('pages.home') !!}
</div>
