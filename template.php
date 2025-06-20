{* <?php *}

{*//set the doctype *}
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en' class="modern-theme">
<head>
<meta charset='utf-8'>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
<meta name="robots" content="noindex, nofollow, noarchive" />
<meta name="theme-color" content="#2563EB">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="apple-mobile-web-app-title" content="Tathya Technologies - FusionPBX">
<meta name="description" content="Modern FusionPBX Interface by Tathya Technologies Private Limited">

{*//external css files *}
<link rel='stylesheet' type='text/css' href='{$project_path}/resources/bootstrap/css/bootstrap.min.css.php'>
<link rel='stylesheet' type='text/css' href='{$project_path}/resources/bootstrap/css/bootstrap-tempusdominus.min.css.php'>
<link rel='stylesheet' type='text/css' href='{$project_path}/resources/bootstrap/css/bootstrap-colorpicker.min.css.php'>
<link rel='stylesheet' type='text/css' href='{$project_path}/resources/fontawesome/css/all.min.css.php'>
<link rel='stylesheet' type='text/css' href='{$project_path}/themes/default/css.php'>

{*//link to custom css file *}
{if !empty($settings.theme.custom_css)}
    <link rel='stylesheet' type='text/css' href='{$settings.theme.custom_css}'>
{/if}

{*//set favorite icon *}
<link rel='icon' href='{$settings.theme.favicon}'>

{*//document title *}
<title>{$document_title}</title>

{*//remote javascript *}
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/jquery/jquery.min.js.php'></script>
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/jquery/jquery.autosize.input.js.php'></script>
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/momentjs/moment-with-locales.min.js.php'></script>
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/bootstrap/js/bootstrap.min.js.php'></script>
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/bootstrap/js/bootstrap-tempusdominus.min.js.php'></script>
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/bootstrap/js/bootstrap-colorpicker.min.js.php'></script>
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/bootstrap/js/bootstrap-pwstrength.min.js.php'></script>
<script language='JavaScript' type='text/javascript'>{literal}window.FontAwesomeConfig = { autoReplaceSvg: false }{/literal}</script>
<script language='JavaScript' type='text/javascript' src='{$project_path}/resources/fontawesome/js/all.min.js.php' defer></script>

{*//web font loader *}
{if isset($settings.theme.font_loader) && $settings.theme.font_loader == 'true'}
    {if $settings.theme.font_retrieval != 'asynchronous'}
        <script language='JavaScript' type='text/javascript' src='//ajax.googleapis.com/ajax/libs/webfont/{$settings.theme.font_loader_version}/webfont.js'></script>
    {/if}
    <script language='JavaScript' type='text/javascript' src='{$project_path}/resources/fonts/web_font_loader.php?v={$settings.theme.font_loader_version}'></script>
{/if}

<script language='JavaScript' type='text/javascript'>
    // Modern interaction handlers
    document.addEventListener('DOMContentLoaded', function() {
        // Add slide-in animation to panels
        document.querySelectorAll('.glass-panel').forEach(panel => {
            panel.classList.add('slide-in');
        });

        // Smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';

        // Enhanced button feedback
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mousedown', () => {
                button.style.transform = 'scale(0.98)';
            });
            button.addEventListener('mouseup', () => {
                button.style.transform = 'scale(1)';
            });
            button.addEventListener('mouseleave', () => {
                button.style.transform = 'scale(1)';
            });
        });

        // Modernized message display
        window.display_message = function(msg, mood, delay) {
            mood = mood || 'default';
            delay = delay || {$settings.theme.message_delay};
            
            if (msg) {
                const container = document.getElementById('message_container');
                const messageEl = document.createElement('div');
                messageEl.className = `message_text message_mood_${mood} animate-in`;
                messageEl.innerHTML = msg;
                
                messageEl.addEventListener('click', function() {
                    this.style.animation = 'fadeOut 200ms ease-out';
                    setTimeout(() => {
                        container.innerHTML = '';
                        container.style.height = 'auto';
                    }, 200);
                });

                container.innerHTML = '';
                container.appendChild(messageEl);

                setTimeout(() => {
                    messageEl.style.animation = 'fadeOut 200ms ease-out';
                    setTimeout(() => {
                        container.innerHTML = '';
                        container.style.height = 'auto';
                    }, 200);
                }, delay);
            }
        };

        // Enhanced mobile menu
        if (window.innerWidth <= 768) {
            const menu = document.getElementById('menu_container');
            if (menu) {
                let lastScroll = window.pageYOffset;
                
                window.addEventListener('scroll', () => {
                    const currentScroll = window.pageYOffset;
                    if (currentScroll > lastScroll) {
                        menu.style.transform = 'translateY(100%)';
                    } else {
                        menu.style.transform = 'translateY(0)';
                    }
                    lastScroll = currentScroll;
                });
            }
        }
    });

    {* Include all existing JavaScript from the original template *}
    {$messages}

    //message bar hide on hover
    {literal}
    $('#message_container').on('mouseenter',function() {
        $('#message_container div').remove();
        $('#message_container').css({opacity: 0, 'height': 0}).css({'height': 'auto'});
    });
    {/literal}

    //domain selector controls
    {if $domain_selector_enabled}
        {literal}
        $('.domain_selector_domain').on('click', function() { show_domains(); });
        $('#header_domain_selector_domain').on('click', function() { show_domains(); });
        $('#domains_hide').on('click', function() { hide_domains(); });

        function show_domains() {
            search_domains('domains_list');

            $('#domains_visible').val(1);
            var scrollbar_width = (window.innerWidth - $(window).width());
            if (scrollbar_width > 0) {
                $('body').css({'margin-right':scrollbar_width, 'overflow':'hidden'});
                $('.navbar').css('margin-right',scrollbar_width);
                $('#domains_container').css('right',-scrollbar_width);
            }
            $(document).scrollTop(0);
            $('#domains_container').show();
            $('#domains_block').animate({marginRight: '+=300'}, 400, function() {
                $('#domains_search').trigger('focus');
            });
        }

        function hide_domains() {
            $('#domains_visible').val(0);
            $(document).ready(function() {
                $('#domains_block').animate({marginRight: '-=300'}, 400, function() {
                    $('#domains_search').val('');
                    $('.navbar').css('margin-right','0');
                    $('#domains_container').css('right','0');
                    $('#domains_container').hide();
                    $('body').css({'margin-right':'0','overflow':'auto'});
                    document.activeElement.blur();
                });
            });
        }
        {/literal}
    {/if}

    //keyboard shortcut scripts
    {if $settings.theme.keyboard_shortcut_submit_enabled}
        {literal}
        var action_bar_actions, first_form, first_submit, modal_input_class, modal_continue_button;
        action_bar_actions = document.querySelector('div#action_bar.action_bar > div.actions');
        first_form = document.querySelector('form#frm');

        if (action_bar_actions !== null) {
            if (first_form !== null) {
                first_submit = document.createElement('input');
                first_submit.type = 'submit';
                first_submit.id = 'default_submit';
                first_submit.setAttribute('style','position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;');
                first_form.prepend(first_submit);
                window.addEventListener('keydown',function(e){
                    modal_input_class = e.target.className;
                    if (e.which == 13 && (e.target.tagName == 'INPUT' || e.target.tagName == 'SELECT')) {
                        if (modal_input_class.includes('modal-input')) {
                            e.preventDefault();
                            modal_continue_button = document.getElementById(e.target.dataset.continue);
                            if (modal_continue_button) { modal_continue_button.click(); }
                        }
                        else {
                            if (typeof window.submit_form === 'function') { submit_form(); }
                            else { document.getElementById('frm').submit(); }
                        }
                    }
                });
            }
        }
        {/literal}
    {/if}

    //common (used by delete and toggle)
    {if !empty($settings.theme.keyboard_shortcut_delete_enabled) || !empty($settings.theme.keyboard_shortcut_toggle_enabled)}
        var list_checkboxes;
        list_checkboxes = document.querySelectorAll('table.list tr.list-row td.checkbox input[type=checkbox]');
    {/if}

    //keyup event listener
    {literal}
    window.addEventListener('keyup', function(e) {
        {/literal}

        //key: [escape] - close modal window, if open, or toggle domain selector
        {literal}
        if (e.which == 27) {
            e.preventDefault();
            var modals, modal_visible, modal;
            modal_visible = false;
            modals = document.querySelectorAll('div.modal-window');
            if (modals.length !== 0) {
                for (var x = 0, max = modals.length; x < max; x++) {
                    modal = document.getElementById(modals[x].id);
                    if (window.getComputedStyle(modal).getPropertyValue('opacity') == 1) {
                        modal_visible = true;
                    }
                }
            }
            if (modal_visible) {
                modal_close();
            }
            {/literal}
            {if $domain_selector_enabled}
                {literal}
                else {
                    if (document.getElementById('domains_visible').value == 0) {
                        show_domains();
                    }
                    else {
                        hide_domains();
                    }
                }
                {/literal}
            {/if}
            {literal}
        }
        {/literal}

        //key: [insert], list: to add
        {if $settings.theme.keyboard_shortcut_add_enabled}
            {literal}
            if (e.which == 45 && !(e.target.tagName == 'INPUT' && e.target.type == 'text') && e.target.tagName != 'TEXTAREA') {
                e.preventDefault();
                var add_button;
                add_button = document.getElementById('btn_add');
                if (add_button === null || add_button === undefined) {
                    add_button = document.querySelector('button[name=btn_add]');
                }
                if (add_button !== null) { add_button.click(); }
            }
            {/literal}
        {/if}

        //key: [delete], list: to delete checked, edit: to delete
        {if !empty($settings.theme.keyboard_shortcut_delete_enabled)}
            {literal}
            if (e.which == 46 && !(e.target.tagName == 'INPUT' && e.target.type == 'text') && e.target.tagName != 'TEXTAREA') {
                e.preventDefault();
                var delete_button;
                delete_button = document.querySelector('button[name=btn_delete]');
                if (delete_button === null || delete_button === undefined) {
                    delete_button = document.getElementById('btn_delete');
                }
                if (delete_button !== null) { delete_button.click(); }
            }
            {/literal}
        {/if}

        //key: [space], list,edit:prevent default space key behavior when opening toggle confirmation
        {if $settings.theme.keyboard_shortcut_toggle_enabled}
            {literal}
            if (e.which == 32 && e.target.id == 'btn_toggle') {
                e.preventDefault();
            }
            {/literal}
        {/if}

    //keyup end
    {literal}
    });
    {/literal}

    //keydown event listener
    {literal}
    window.addEventListener('keydown', function(e) {
        {/literal}

        //key: [space], list: to toggle checked
        {if $settings.theme.keyboard_shortcut_toggle_enabled}
            {literal}
            if (e.which == 32 && !(e.target.tagName == 'INPUT' && e.target.type == 'text') && e.target.tagName != 'BUTTON' && !(e.target.tagName == 'INPUT' && e.target.type == 'button') && !(e.target.tagName == 'INPUT' && e.target.type == 'submit') && e.target.tagName != 'TEXTAREA' && list_checkboxes.length !== 0) {
                e.preventDefault();
                var toggle_button;
                toggle_button = document.querySelector('button[name=btn_toggle]');
                if (toggle_button === null || toggle_button === undefined) {
                    toggle_button = document.getElementById('btn_toggle');
                }
                if (toggle_button !== null) { toggle_button.click(); }
            }
            {/literal}
        {/if}

        //key: [ctrl]+[a], list,edit: to check all
        {if $settings.theme.keyboard_shortcut_check_all_enabled}
            {literal}
            if ((((e.which == 97 || e.which == 65) && (e.ctrlKey || e.metaKey) && !e.shiftKey) || e.which == 19) && !(e.target.tagName == 'INPUT' && e.target.type == 'text') && e.target.tagName != 'TEXTAREA') {
                var all_checkboxes;
                all_checkboxes = document.querySelectorAll('table.list tr.list-header th.checkbox input[name=checkbox_all]');
                if (typeof all_checkboxes != 'object' || all_checkboxes.length == 0) {
                    all_checkboxes = document.querySelectorAll('td.edit_delete_checkbox_all > span > input[name=checkbox_all]');
                }
                if (typeof all_checkboxes == 'object' && all_checkboxes.length > 0) {
                    e.preventDefault();
                    for (var x = 0, max = all_checkboxes.length; x < max; x++) {
                        all_checkboxes[x].click();
                    }
                }
            }
            {/literal}
        {/if}

        //key: [ctrl]+[s], edit: to save
        {if $settings.theme.keyboard_shortcut_save_enabled}
            {literal}
            if (((e.which == 115 || e.which == 83) && (e.ctrlKey || e.metaKey) && !e.shiftKey) || (e.which == 19)) {
                e.preventDefault();
                var save_button;
                save_button = document.getElementById('btn_save');
                if (save_button === null || save_button === undefined) {
                    save_button = document.querySelector('button[name=btn_save]');
                }
                if (save_button !== null) { save_button.click(); }
            }
            {/literal}
        {/if}

        //key: [ctrl]+[c], list,edit: to copy
        {if $settings.theme.keyboard_shortcut_copy_enabled}
            {if $browser_name_short == 'Safari'}
                {literal}
                if (
                    (e.which == 99 || e.which == 67) &&
                    !(e.target.tagName == 'INPUT' && e.target.type == 'text') &&
                    !(e.target.tagName == 'INPUT' && e.target.type == 'password') &&
                    e.target.tagName != 'TEXTAREA'
                    ) {
                {/literal}
            {else}
                {literal}
                if (
                    (
                        (
                            (e.which == 99 || e.which == 67) &&
                            (e.ctrlKey || e.metaKey) &&
                            !e.shiftKey
                        ) ||
                        e.which == 19
                    ) &&
                    !(e.target.tagName == 'INPUT' && e.target.type == 'text') &&
                    e.target.tagName != 'TEXTAREA'
                    ) {
                {/literal}
            {/if}
            {literal}
                var current_selection, copy_button;
                current_selection = window.getSelection();
                if (current_selection === null || current_selection === undefined || current_selection.toString() == '') {
                    e.preventDefault();
                    copy_button = document.querySelector('button[name=btn_copy]');
                    if (copy_button === null || copy_button === undefined) {
                        copy_button = document.getElementById('btn_copy');
                    }
                    if (copy_button !== null) { copy_button.click(); }
                }
            }
            {/literal}
        {/if}

        //key: [left] / [right], audio playback: rewind / fast-forward
        {literal}
        if (
            e.which == 39 &&
            !(e.target.tagName == 'INPUT' && e.target.type == 'text') &&
            e.target.tagName != 'TEXTAREA'
            ) {
            recording_fast_forward();
        }
        if (
            e.which == 37 &&
            !(e.target.tagName == 'INPUT' && e.target.type == 'text') &&
            e.target.tagName != 'TEXTAREA'
            ) {
            recording_rewind();
        }
        {/literal}

    //keydown end
    {literal}
    });
    {/literal}

    //link list rows
    {literal}
    $('.tr_hover tr,.list tr').each(function(i,e) {
        $(e).children('td:not(.list_control_icon,.list_control_icons,.tr_link_void,.list-row > .no-link,.list-row > .checkbox,.list-row > .button,.list-row > .action-button)').on('click', function() {
            var href = $(this).closest('tr').attr('href');
            var target = $(this).closest('tr').attr('target');
            if (href) {
                if (target) { window.open(href, target); }
                else { window.location = href; }
            }
        });
    });
    {/literal}

    //autosize jquery autosize plugin on applicable input fields
    {literal}
    $('input[type=text].txt.auto-size,input[type=number].txt.auto-size,input[type=password].txt.auto-size,input[type=text].formfld.auto-size,input[type=number].formfld.auto-size,input[type=password].formfld.auto-size').autosizeInput();
    {/literal}

    //initialize bootstrap tempusdominus (calendar/datetime picker) plugin
    {literal}
    $(function() {
        //set defaults
        $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
            buttons: {
                showToday: true,
                showClear: true,
                showClose: true,
            },
            icons: {
                time: 'fa-solid fa-clock',
                date: 'fa-solid fa-calendar-days',
                up: 'fa-solid fa-arrow-up',
                down: 'fa-solid fa-arrow-down',
                previous: 'fa-solid fa-chevron-left',
                next: 'fa-solid fa-chevron-right',
                today: 'fa-solid fa-calendar-check',
                clear: 'fa-solid fa-trash',
                close: 'fa-solid fa-xmark',
            }
        });
        //define formatting of individual classes
        $('.datepicker').datetimepicker({ format: 'YYYY-MM-DD', });
        $('.datetimepicker').datetimepicker({ format: 'YYYY-MM-DD HH:mm', });
        $('.datetimepicker-future').datetimepicker({ format: 'YYYY-MM-DD HH:mm', minDate: new Date(), });
        $('.datetimesecpicker').datetimepicker({ format: 'YYYY-MM-DD HH:mm:ss', });
    });
    {/literal}

    //apply bootstrap colorpicker plugin
    {literal}
    $(function(){
        $('.colorpicker').colorpicker({
            align: 'left',
            customClass: 'colorpicker-2x',
            sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            }
        });
    });
    {/literal}

    //apply bootstrap password strength plugin
    {literal}
    $('#password').pwstrength({
        common: {
            minChar: 8,
            usernameField: '#username',
        },
        ui: {
            colorClasses: ['danger', 'warning', 'warning', 'warning', 'success', 'success'],
            progressBarMinPercentage: 15,
            showVerdicts: false,
            viewports: {
                progress: '#pwstrength_progress'
            }
        }
    });
    {/literal}

    //crossfade menu brand images (if hover version set)
    {if !empty($settings.theme.menu_brand_image) && !empty($settings.theme.menu_brand_image_hover) && isset($settings.theme.menu_style) && $settings.theme.menu_style != 'side'}
        {literal}
        $(function(){
            $('#menu_brand_image').on('mouseover',function(){
                $(this).fadeOut('fast', function(){
                    $('#menu_brand_image_hover').fadeIn('fast');
                });
            });
            $('#menu_brand_image_hover').on('mouseout',function(){
                $(this).fadeOut('fast', function(){
                    $('#menu_brand_image').fadeIn('fast');
                });
            });
        });
        {/literal}
    {/if}

    //generate resizeEnd event after window resize event finishes
    {literal}
    $(window).on('resize', function() {
        if (this.resizeTO) { clearTimeout(this.resizeTO); }
        this.resizeTO = setTimeout(function() { $(this).trigger('resizeEnd'); }, 180);
    });
    {/literal}

    //side menu: adjust content container width after window resize
    {if $settings.theme.menu_style == 'side'}
        {literal}
        $(window).on('resizeEnd', function() {
            if ($(window).width() < 576) {
                if (menu_side_state_current == 'contracted') {
                    $('#menu_side_container').hide();
                }
                if (menu_side_state_current == 'expanded') {
                    {/literal}
                    {if $menu_side_state != 'hidden'}
                        {literal}
                        $('#menu_side_container').show();
                        {/literal}
                    {/if}
                    {literal}
                    $('#menu_side_container').animate({ width: $(window).width() }, 180);
                }
                $('#content_container').animate({ width: $(window).width() }, 100);
            }
            else {
                {/literal}
                {if $menu_side_state == 'hidden'}
                    {literal}
                    $('#menu_side_container').animate({ width: '{/literal}{$settings.theme.menu_side_width_expanded}{literal}px' }, 180);
                    $('#content_container').animate({ width: $(window).width() }, 100);
                    {/literal}
                {else}
                    {literal}
                    $('#menu_side_container').show();
                    if (menu_side_state_current == 'expanded') {
                        $('#menu_side_container').animate({ width: '{/literal}{$settings.theme.menu_side_width_expanded}{literal}px' }, 180, function() {
                            $('#content_container').animate({ width: $(window).width() - $('#menu_side_container').width() }, 100);
                        });
                    }
                    else {
                        $('#content_container').animate({ width: $(window).width() - $('#menu_side_container').width() }, 100);
                    }
                    {/literal}
                {/if}
                {literal}
            }
        });
        {/literal}
    {/if}

    //audio playback functions
    {literal}
    var recording_audio, audio_clock, recording_id_playing;

    function recording_play(player_id, data, audio_type) {
        if (document.getElementById('recording_progress_bar_' + player_id)) {
            document.getElementById('recording_progress_bar_' + player_id).style.display='';
        }
        recording_audio = document.getElementById('recording_audio_' + player_id);

        if (recording_audio.paused) {
            {/literal}
            //create and load waveform image
            {if $settings.theme.audio_player_waveform_enabled == 'true'}
                {literal}
                //list playback
                if (document.getElementById('playback_progress_bar_background_' + player_id)) {
                    document.getElementById('playback_progress_bar_background_' + player_id).style.backgroundImage = "linear-gradient(to bottom, rgba(0,0,0,0.10) 0%, transparent 20%), url('waveform.php?id=" + player_id + (data !== undefined ? '&data=' + data : '') + (audio_type !== undefined ? '&type=' + audio_type : '') + "')";
                }
                //form playback
                else if (document.getElementById('recording_progress_bar_' + player_id)) {
                    document.getElementById('recording_progress_bar_' + player_id).style.backgroundImage = "linear-gradient(to bottom, rgba(0,0,0,0.10) 0%, transparent 20%), url('waveform.php?id=" + player_id + (data !== undefined ? '&data=' + data : '') + (audio_type !== undefined ? '&type=' + audio_type : '') + "')";
                }
                {/literal}
            {/if}
            {literal}
            recording_audio.volume = 1;
            recording_audio.play();
            recording_id_playing = player_id;
            document.getElementById('recording_button_' + player_id).innerHTML = "<span class='{/literal}{$settings.theme.button_icon_pause}{literal} fa-fw'></span>";
            audio_clock = setInterval(function () { update_progress(player_id); }, 20);

            $('[id*=recording_button]').not('[id*=recording_button_' + player_id + ']').html("<span class='{/literal}{$settings.theme.button_icon_play}{literal} fa-fw'></span>");
            $('[id*=recording_button_intro]').not('[id*=recording_button_' + player_id + ']').html("<span class='{/literal}{$settings.theme.button_icon_comment}{literal} fa-fw'></span>");
            $('[id*=recording_progress_bar]').not('[id*=recording_progress_bar_' + player_id + ']').css('display', 'none');

            $('audio').each(function(){
                if ($(this).get(0) != recording_audio) {
                    $(this).get(0).pause();
                    $(this).get(0).currentTime = 0;
                }
            });
        }
        else {
            recording_audio.pause();
            recording_id_playing = '';
            if (player_id.substring(0,6) == 'intro_') {
                document.getElementById('recording_button_' + player_id).innerHTML = "<span class='{/literal}{$settings.theme.button_icon_comment}{literal} fa-fw'></span>";
            }
            else {
                document.getElementById('recording_button_' + player_id).innerHTML = "<span class='{/literal}{$settings.theme.button_icon_play}{literal} fa-fw'></span>";
            }
            clearInterval(audio_clock);
        }
    }

    function recording_stop(player_id) {
        recording_reset(player_id);
        clearInterval(audio_clock);
    }

    function recording_reset(player_id) {
        recording_audio = document.getElementById('recording_audio_' + player_id);
        recording_audio.pause();
        recording_audio.currentTime = 0;
        if (document.getElementById('recording_progress_bar_' + player_id)) {
            document.getElementById('recording_progress_bar_' + player_id).style.display='none';
        }
        if (player_id.substring(0,6) == 'intro_') {
            document.getElementById('recording_button_' + player_id).innerHTML = "<span class='{/literal}{$settings.theme.button_icon_comment}{literal} fa-fw'></span>";
        }
        else {
            document.getElementById('recording_button_' + player_id).innerHTML = "<span class='{/literal}{$settings.theme.button_icon_play}{literal} fa-fw'></span>";
        }
        clearInterval(audio_clock);
    }

    function update_progress(player_id) {
        recording_audio = document.getElementById('recording_audio_' + player_id);
        var recording_progress = document.getElementById('recording_progress_' + player_id);
        var value = 0;
        if (recording_audio != null && recording_audio.currentTime > 0) {
            value = Number(((100 / recording_audio.duration) * recording_audio.currentTime).toFixed(1));
        }
        if (recording_progress) {
            recording_progress.style.marginLeft = value + '%';
        }
        if (recording_audio != null && parseInt(recording_audio.duration) > 30) {
            clearInterval(audio_clock);
        }
    }

    function recording_fast_forward() {
        if (recording_audio) {
            recording_audio.currentTime += {/literal}{if !empty($settings.theme.audio_player_scrub_seconds)}{$settings.theme.audio_player_scrub_seconds}{else}2{/if}{literal};
            update_progress(recording_id_playing);
        }
    }

    function recording_rewind() {
        if (recording_audio) {
            recording_audio.currentTime -= {/literal}{if !empty($settings.theme.audio_player_scrub_seconds)}{$settings.theme.audio_player_scrub_seconds}{else}2{/if}{literal};
            update_progress(recording_id_playing);
        }
    }
    {/literal}

    //handle action bar style on scroll
    {literal}
    window.addEventListener('scroll', function(){
        action_bar_scroll('action_bar', {/literal}{if $settings.theme.menu_style == 'side'}60{else}20{/if}{literal});
    }, false);
    function action_bar_scroll(action_bar_id, scroll_position, function_sticky, function_inline) {
        if (document.getElementById(action_bar_id)) {
            if (this.scrollY > scroll_position) {
                document.getElementById(action_bar_id).classList.add('scroll');
                if (typeof function_sticky === 'function') { function_sticky(); }
            }
            if (this.scrollY < scroll_position) {
                document.getElementById(action_bar_id).classList.remove('scroll');
                if (typeof function_inline === 'function') { function_inline(); }
            }
        }
    }
    {/literal}

    //enable button class button
    {literal}
    function button_enable(button_id) {
        button = document.getElementById(button_id);
        button.disabled = false;
        button.classList.remove('disabled');
        if (button.parentElement.nodeName == 'A') {
            anchor = button.parentElement;
            anchor.classList.remove('disabled');
            anchor.setAttribute('onclick','');
        }
    }
    {/literal}

    //disable button class button
    {literal}
    function button_disable(button_id) {
        button = document.getElementById(button_id);
        button.disabled = true;
        button.classList.add('disabled');
        if (button.parentElement.nodeName == 'A') {
            anchor = button.parentElement;
            anchor.classList.add('disabled');
            anchor.setAttribute('onclick','return false;');
        }
    }
    {/literal}

    //checkbox on change
    {literal}
    function checkbox_on_change(checkbox) {
        checked = false;
        var inputs = document.getElementsByTagName('input');
        for (var i = 0, max = inputs.length; i < max; i++) {
            if (inputs[i].type === 'checkbox' && inputs[i].checked == true) {
                checked = true;
                break;
            }
        }
        btn_copy = document.getElementById("btn_copy");
        btn_toggle = document.getElementById("btn_toggle");
        btn_delete = document.getElementById("btn_delete");
        btn_download = document.getElementById("btn_download");
        btn_transcribe = document.getElementById("btn_transcribe");
        btn_resend = document.getElementById("btn_resend");
        if (checked == true) {
            if (btn_copy) { btn_copy.style.display = "inline"; }
            if (btn_toggle) { btn_toggle.style.display = "inline"; }
            if (btn_delete) { btn_delete.style.display = "inline"; }
            if (btn_download) { btn_download.style.display = "inline"; }
            if (btn_transcribe) { btn_transcribe.style.display = "inline"; }
            if (btn_resend) { btn_resend.style.display = "inline"; }
        }
        else {
            if (btn_copy) { btn_copy.style.display = "none"; }
            if (btn_toggle) { btn_toggle.style.display = "none"; }
            if (btn_delete) { btn_delete.style.display = "none"; }
            if (btn_download) { btn_download.style.display = "none"; }
            if (btn_transcribe) { btn_transcribe.style.display = "none"; }
            if (btn_resend) { btn_resend.style.display = "none"; }
        }
    }
    {/literal}

    //list page functions
    {literal}
    function list_all_toggle(modifier) {
        var checkboxes = (modifier !== undefined) ? document.getElementsByClassName('checkbox_'+modifier) : document.querySelectorAll("input[type='checkbox']");
        var checkbox_checked = document.getElementById('checkbox_all' + (modifier !== undefined ? '_'+modifier : '')).checked;
        for (var i = 0, max = checkboxes.length; i < max; i++) {
            checkboxes[i].checked = checkbox_checked;
        }
        if (document.getElementById('btn_check_all') && document.getElementById('btn_check_none')) {
            if (checkbox_checked) {
                document.getElementById('btn_check_all').style.display = 'none';
                document.getElementById('btn_check_none').style.display = '';
            }
            else {
                document.getElementById('btn_check_all').style.display = '';
                document.getElementById('btn_check_none').style.display = 'none';
            }
        }
    }

    function list_all_check() {
        var inputs = document.getElementsByTagName('input');
        document.getElementById('checkbox_all').checked;
        for (var i = 0, max = inputs.length; i < max; i++) {
            if (inputs[i].type === 'checkbox') {
                inputs[i].checked = true;
            }
        }
    }

    function list_self_check(checkbox_id) {
        var inputs = document.getElementsByTagName('input');
        for (var i = 0, max = inputs.length; i < max; i++) {
            if (inputs[i].type === 'checkbox' && inputs[i].name.search['enabled'] == -1) {
                inputs[i].checked = false;
            }
        }
        document.getElementById(checkbox_id).checked = true;
    }

    function list_action_set(action) {
        document.getElementById('action').value = action;
    }

    function list_form_submit(form_id) {
        document.getElementById(form_id).submit();
    }

    function list_search_reset() {
        document.getElementById('btn_reset').style.display = 'none';
        document.getElementById('btn_search').style.display = '';
    }
    {/literal}

    //edit page functions
    {literal}
    function edit_all_toggle(modifier) {
        var checkboxes = document.getElementsByClassName('checkbox_'+modifier);
        var checkbox_checked = document.getElementById('checkbox_all_'+modifier).checked;
        if (checkboxes.length > 0) {
            for (var i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = checkbox_checked;
            }
            if (document.getElementById('btn_delete')) {
                document.getElementById('btn_delete').value = checkbox_checked ? '' : 'delete';
            }
        }
    }

    function edit_delete_action(modifier) {
        var checkboxes = document.getElementsByClassName('chk_delete');
        if (document.getElementById('btn_delete') && checkboxes.length > 0) {
            var checkbox_checked = false;
            for (var i = 0; i < checkboxes.length; ++i) {
                if (checkboxes[i].checked) {
                    checkbox_checked = true;
                }
                else {
                    if (document.getElementById('checkbox_all'+(modifier !== undefined ? '_'+modifier : ''))) {
                        document.getElementById('checkbox_all'+(modifier !== undefined ? '_'+modifier : '')).checked = false;
                    }
                }
            }
            document.getElementById('btn_delete').value = checkbox_checked ? '' : 'delete';
        }
    }
    {/literal}

    //modal functions
    {literal}
    function modal_open(modal_id, focus_id) {
        var modal = document.getElementById(modal_id);
        modal.style.opacity = '1';
        modal.style.pointerEvents = 'auto';
        if (focus_id !== undefined) {
            document.getElementById(focus_id).focus();
        }
    }

    function modal_close() {
        var modals = document.getElementsByClassName('modal-window');
        if (modals.length > 0) {
            for (var m = 0; m < modals.length; ++m) {
                modals[m].style.opacity = '0';
                modals[m].style.pointerEvents = 'none';
            }
        }
        document.activeElement.blur();
    }
    {/literal}

    //misc functions
    {literal}
    function swap_display(a_id, b_id, display_value) {
        display_value = display_value !== undefined ? display_value : 'inline-block';
        a = document.getElementById(a_id);
        b = document.getElementById(b_id);
        if (window.getComputedStyle(a).display === 'none') {
            a.style.display = display_value;
            b.style.display = 'none';
        }
        else {
            a.style.display = 'none';
            b.style.display = display_value;
        }
    }

    function hide_password_fields() {
        var password_fields = document.querySelectorAll("input[type='password']");
        for (var p = 0, max = password_fields.length; p < max; p++) {
            password_fields[p].style.visibility = 'hidden';
            password_fields[p].type = 'text';
        }
    }

    window.addEventListener('beforeunload', function(e){
        hide_password_fields();
    });
    {/literal}

    {*//session timer *}
    {if !empty($session_timer)}
        {$session_timer}
    {/if}

    {*//domain selector *}
    function search_domains(element_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            document.getElementById(element_id).innerHTML = '';

            if (this.readyState == 4 && this.status == 200) {
                obj = JSON.parse(this.responseText);
                document.getElementById('domain_count').innerText = '('+ obj.length +')';

                for (var i=0; i < obj.length; i++) {
                    domain_uuid = obj[i].domain_uuid;
                    domain_name = obj[i].domain_name;
                    if (obj[i].domain_description != null) {
                    }

                    var div = document.createElement('div');
                    div.title = obj[i].domain_name;
                    div.classList.add("domains_list_item");

                    if(i%2==0) {
                        div.style.background = '{$domain_selector_background_color_1}';
                    }
                    else {
                        div.style.background = '{$domain_selector_background_color_2}';
                    }

                    if ('{$domain_uuid}' == obj[i].domain_uuid) {
                        div.style.background = '{$domain_active_background_color}';
                        div.style.fontWeight = 'bold';
                    }

                    div.setAttribute('onclick',"window.location.href='{$domains_app_path}?domain_uuid=" + obj[i].domain_uuid + "&domain_change=true';");

                    link_label = obj[i].domain_name;
                    if (obj[i].domain_description != null) {
                        link_label += " <span class='domain_list_item_description' title=\"" + obj[i].domain_description + "\">" + obj[i].domain_description + "</span>";
                    }
                    var a_tag = document.createElement('a');
                    a_tag.setAttribute('href','manage:'+obj[i].domain_name);
                    a_tag.setAttribute('onclick','event.preventDefault();');
                    a_tag.innerHTML = link_label;
                    div.appendChild(a_tag);

                    document.getElementById(element_id).appendChild(div);
                }
            }
        };
        search = document.getElementById('domains_search');
        if (search.value) {
            xhttp.open("GET", "/core/domains/domain_json.php?search="+search.value+"&{$domain_json_token_name}={$domain_json_token_hash}", true);
        }
        else {
            xhttp.open("GET", "/core/domains/domain_json.php?{$domain_json_token_name}={$domain_json_token_hash}", true);
        }
        xhttp.send();
    }
</script>

</head>
<body class="animate-in">

{*//video background *}
{if !empty({$background_video})}
    <video id="background-video" autoplay muted poster="" disablePictureInPicture="true" onloadstart="this.playbackRate = 1; this.pause();">
        <source src="{$background_video}" type="video/mp4">
    </video>
{/if}

{*//image background *}
<div id='background-image' class="animate-in"></div>

{*//color background *}
<div id='background-color' class="animate-in"></div>

{*//message container *}
<div id='message_container' class="glass-panel"></div>

{*//domain selector *}
{if $authenticated && $domain_selector_enabled}
    <div id='domains_container' class="glass-panel slide-in">
        <input type='hidden' id='domains_visible' value='0'>
        <div id='domains_block'>
            <div id='domains_header'>
                <input id='domains_hide' type='button' class='btn btn-primary' style='float: right' value="{$text.theme_button_close}">
                <a id='domains_title' href='{$domains_app_path}'>{$text.theme_title_domains} <span id='domain_count' style='font-size: 80%;'></span></a>
                <br><br>
                <input type='text' id='domains_search' class='formfld' style='margin-left: 0; min-width: 100%; width: 100%;' placeholder="{$text.theme_label_search}" onkeyup="search_domains('domains_list');">
            </div>
            <div id='domains_list' class="animate-in"></div>
        </div>
    </div>
{/if}

{*//qr code container for contacts *}
<div id='qr_code_container' style='display: none;' onclick='$(this).fadeOut(400);'>
    <table cellpadding='0' cellspacing='0' border='0' width='100%' height='100%'><tr><td align='center' valign='middle'>
        <span id='qr_code' onclick="$('#qr_code_container').fadeOut(400);"></span>
    </td></tr></table>
</div>

{*//login page *}
{if !empty($login_page)}
    <div id='default_login' class="glass-panel slide-in">
        <a href='{$project_path}/'><img id='login_logo' style='width: {$login_logo_width}; height: {$login_logo_height};' src='{$login_logo_source}'></a><br />
        {$document_body}
    </div>
    <div id='footer_login'>
        <span class='footer'>{$settings.theme.footer}</span>
    </div>

{*//other pages *}
{else}
    {if $settings.theme.menu_style == 'side' || $settings.theme.menu_style == 'inline' || $settings.theme.menu_style == 'static'}
        {$container_open}
        {if $settings.theme.menu_style == 'inline'}{$logo}{/if}
        {$menu}
        {if $settings.theme.menu_style == 'inline' || $settings.theme.menu_style == 'static'}<br />{/if}
        {if $settings.theme.menu_style == 'side'}<input type='hidden' id='menu_side_state_current' value='{if $menu_side_state == "hidden"}expanded{else}{$menu_side_state}{/if}'>{/if}
    {else} {*//default: fixed *}
        {$menu}
        {$container_open}
    {/if}
    <div id='main_content' class="glass-panel slide-in">
        {$document_body}
    </div>
    <div id='footer' class="glass-panel">
        <span class='footer'>{$settings.theme.footer}</span>
    </div>
    {$container_close}
{/if}

</body>
</html>