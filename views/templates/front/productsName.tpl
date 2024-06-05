<div id="test">
    <p class="header">Nazwy produktów:</p>
    <ul>
        {foreach from=$products item=product}
            <li>{$product.name}</li>
        {/foreach}
    </ul>
</div>

<div id="category-products">
    <p class="header">Produkty z kategorii:</p>
    <ul>
        {foreach from=$categoryProducts item=product}
            <li>{$product.name} - {$product.price} - {$product.i}</li>
        {/foreach}
    </ul>
</div>
