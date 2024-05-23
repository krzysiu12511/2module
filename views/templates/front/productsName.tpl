<div id="test">
    <p class="header">Nazwy produktów:</p>
    <ul>
        {foreach from=$products item=product}
            <li>{$product.name}</li>
        {/foreach}
    </ul>
</div>

