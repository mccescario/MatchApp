@guest
<p><span style="color: transparent;">Create with ♥ by <a style="color: transparent;"
            href="https://jmdimapilis.webflow.io/" target="_blank">Jose
            Marie Dimapilis</a></span></p>
@else

<div class="text-center user-select-none">
    <p class="small m-0">
        {{ __('The application code is published under the MIT license.') }} 2016 - {{date('Y')}}<br>
        <a href="http://orchid.software" target="_blank" rel="noopener">
            {{ __('Version') }}: {{\Orchid\Platform\Dashboard::VERSION}}
        </a>
    </p>
</div>
@endguest
