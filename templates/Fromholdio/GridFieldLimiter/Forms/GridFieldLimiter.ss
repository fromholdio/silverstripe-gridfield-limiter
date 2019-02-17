<div class="grid-field__limiter grid-field__limiter--{$TargetFragmentName} <% if $Limit > 0 && $Count >= $Limit %>is-limited<% end_if %>">
    <div class="pull-xs-right">$RightFragment</div>
    <div class="btn-toolbar">$LeftFragment</div>
</div>

<% if $Limit > 0 && $ShowLimitReachedMessage %>
    <% if $Count >= $Limit %>
        <div class="grid-field__limiter-message grid-field__limiter-message--{$TargetFragmentName}">
            <p>You have reached the limit of $Limit. Remove an item to add a new one.</p>
        </div>
    <% end_if %>
<% end_if %>
