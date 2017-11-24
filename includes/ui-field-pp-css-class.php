<#

var field = data.field,
    name = data.name,
    value = data.value;

#>
<span class="pp-field-css-class"></span>
<#
    jQuery('.pp-field-css-class').text(value + jQuery('.pp-field-css-class').parents('form.fl-builder-settings').data('node'));
#>
