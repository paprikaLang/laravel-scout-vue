<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Search with Laravel Scout and Vue.js!</title>
</head>
<body>
<br>
<div class="container">
    <div class="well well-sm">
        <div class="form-group">
            <div class="input-group input-group-md">
                <div class="icon-addon addon-md">
                    <input type="text" placeholder="What are you looking for?" class="form-control">
                </div>
                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Search!</button>
                        </span>
            </div>
        </div>
    </div>
    <div id="products" class="row list-group">
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>