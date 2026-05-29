<footer style="width:100%;background:radial-gradient(farthest-corner at bottom left,#252a43,#1c1f37,#1c1f37);border-top:1px solid rgba(255,255,255,0.07);padding:60px 0 24px;">
    <div style="max-width:1380px;margin:0 auto;padding:0 32px;">
        {{-- Top: logo + columns --}}
        <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:48px;margin-bottom:48px;">

            {{-- Brand --}}
            <div>
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:16px;">
                    <img src="/logo.png" alt="byteland" style="width:32px;height:32px;border-radius:7px;">
                    <span style="font-size:24px;font-weight:500;color:#fff;">byte<span style="font-weight:800;color:#0195f4;">land</span></span>
                </div>
                <p style="font-size:14px;color:#6d708a;line-height:1.6;margin:0 0 20px;max-width:260px;">Игровой хостинг с DDoS-защитой. Minecraft, RUST, Hytale, ARK, Palworld и другие игры — от&nbsp;49₽ в месяц.</p>
                <div style="display:flex;gap:12px;">
                    <a href="https://t.me/bytelandnews" target="_blank" style="width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.09);display:flex;align-items:center;justify-content:center;transition:background 0.2s;" onmouseover="this.style.background='rgba(1,149,244,0.15)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="#0195f4"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.17 13.93l-2.968-.923c-.645-.204-.657-.645.136-.953l11.57-4.461c.537-.194 1.006.131.986.628z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Хостинг --}}
            <div>
                <h4 style="font-size:17px;font-weight:500;color:#fff;margin:0 0 24px;position:relative;padding-bottom:10px;">
                    Хостинг
                    <span style="position:absolute;bottom:0;left:0;width:24px;height:2px;background:#0195f4;border-radius:999px;"></span>
                </h4>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:2px;">
                    @foreach(\App\Classes\Navigation::getLinks() as $nav)
                        <li>
                            <a href="{{ $nav['url'] ?? '#' }}" style="font-size:14px;color:#6d708a;text-decoration:none;line-height:2.2;display:block;transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">
                                {{ $nav['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Кабинет --}}
            <div>
                <h4 style="font-size:17px;font-weight:500;color:#fff;margin:0 0 24px;position:relative;padding-bottom:10px;">
                    Кабинет
                    <span style="position:absolute;bottom:0;left:0;width:24px;height:2px;background:#0195f4;border-radius:999px;"></span>
                </h4>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:2px;">
                    @auth
                    @foreach(\App\Classes\Navigation::getDashboardLinks() as $nav)
                        <li>
                            <a href="{{ $nav['url'] ?? '#' }}" wire:navigate style="font-size:14px;color:#6d708a;text-decoration:none;line-height:2.2;display:block;transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">
                                {{ $nav['name'] }}
                            </a>
                        </li>
                    @endforeach
                    @else
                        <li><a href="{{ route('login') }}" wire:navigate style="font-size:14px;color:#6d708a;text-decoration:none;line-height:2.2;display:block;transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">Войти</a></li>
                        <li><a href="{{ route('register') }}" wire:navigate style="font-size:14px;color:#6d708a;text-decoration:none;line-height:2.2;display:block;transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">Регистрация</a></li>
                    @endauth
                </ul>
            </div>

            {{-- Компания --}}
            <div>
                <h4 style="font-size:17px;font-weight:500;color:#fff;margin:0 0 24px;position:relative;padding-bottom:10px;">
                    Компания
                    <span style="position:absolute;bottom:0;left:0;width:24px;height:2px;background:#0195f4;border-radius:999px;"></span>
                </h4>
                <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:2px;">
                    <li><a href="https://byteland.ru" target="_blank" style="font-size:14px;color:#6d708a;text-decoration:none;line-height:2.2;display:block;transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">Главный сайт</a></li>
                    <li><a href="https://t.me/bytelandnews" target="_blank" style="font-size:14px;color:#6d708a;text-decoration:none;line-height:2.2;display:block;transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">Telegram-канал</a></li>
                </ul>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div style="border-top:1px solid rgba(255,255,255,0.06);padding-top:22px;display:flex;align-items:center;justify-content:space-between;">
            <span style="font-size:13px;color:#6d708a;">© {{ date('Y') }} byteland.ru — Все права защищены</span>
            <a href="https://paymenter.org" target="_blank" style="font-size:12px;color:#6d708a;text-decoration:none;opacity:0.5;transition:opacity 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.5'">Powered by Paymenter</a>
        </div>
    </div>
</footer>
