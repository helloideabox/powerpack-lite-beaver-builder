<#

var field   = data.field,
    name    = data.name,
    value   = data.value,
    atts    = '',
    primary = '',
    secondary = '';

if ( '' === value.primary || 'undefined' === typeof value.primary ) {
    primary = ' fl-color-picker-empty';
}

if ( '' === value.secondary || 'undefined' === typeof value.secondary ) {
    secondary = ' fl-color-picker-empty';
}

#>

<div class="pp-color-picker fl-color-picker<# if ( field.className ) { #> {{field.className}}<# } #>">
    <div class="fl-color-picker-color{{primary}}"></div>
    <div class="pp-color-text">{{{field.options.primary}}}</div>
    <# if ( field.show_reset ) { #>
        <div class="fl-color-picker-clear"><div class="fl-color-picker-icon-remove"></div></div>
    <# } #>
    <input name="{{name}}[][primary]" type="hidden" value="<# if ('undefined' !== typeof value.primary) { #>{{value.primary}}<# } #>" class="fl-color-picker-value pp-field-color pp-color-primary" />
</div>
<div class="pp-color-picker fl-color-picker <# if ( field.className ) { #> {{field.className}} <# } #>">
    <div class="fl-color-picker-color{{secondary}}"></div>
    <div class="pp-color-text">{{{field.options.secondary}}}</div>
    <# if ( field.show_reset ) { #>
        <div class="fl-color-picker-clear"><div class="fl-color-picker-icon-remove"></div></div>
    <# } #>
    <input name="{{name}}[][secondary]" type="hidden" value="<# if ('undefined' !== typeof value.secondary) { #>{{value.secondary}}<# } #>" class="fl-color-picker-value pp-field-color pp-color-secondary" />
</div>
