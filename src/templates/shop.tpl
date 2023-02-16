<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Technical Assessment</title>
        <!-- Bootstrap core CSS -->
        <link href="http://{$PATH}/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- Logo -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <a href="#" class="btn" id="addItem" >Add Item</a>
                </div>
            </div>
            {foreach $items as $item}
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <h4>{$item->product_name}</h4>
                        <p>{$item->description}</p>
                        <a href="/src/shop.php?id={$item->id}&&action=mark" id="">Mark</a>
                        <a href="/src/shop.php?id={$item->id}&&action=delete">Delete</a>
                    </div>
                </div>
            {/foreach}

        </div>

    </body>

</html>
