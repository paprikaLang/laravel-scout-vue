<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Laravel-Scout</title>
</head>
<body>
<div class="container">
    <br><br>
    <div class="well well-sm">
        <div class="form-group">
            <div class="input-group input-group-md">
                <div class="icon-addon addon-md">
                    <input type="text" placeholder="What are you looking for?" class="form-control" v-model="query">
                </div>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" @click="search" v-if="!loading">Search!</button>
                    <button class="btn btn-default" type="button" disabled="disabled" v-if="loading">Searching...</button>
                </span>
            </div>
        </div>
    </div>
    <div class="alert alert-danger" role="alert" v-if="error">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        @{{ error }}
    </div>
    <div id="products" class="row list-group">
        {{--<li class="list-group-item" v-for="product in products">@{{ product.title }}</li>--}}
        <div class="item col-xs-4 col-lg-4" v-for="product in products">
            <div class="thumbnail">
                <img class="group list-group-image" :src="product.image" alt="@{{ product.title }}" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">@{{ product.title }}</h4>
                    <p class="group inner list-group-item-text">@{{ product.description }}</p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">$@{{ product.price }}</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>--}}
<script src="http://cdn.bootcss.com/vue/1.0.14/vue.js"></script>
<script src="https://cdn.bootcss.com/vue-resource/0.6.1/vue-resource.min.js"></script>
{{--<script src="/js/app.js"></script>--}}
<script>
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
    new Vue({
        el: 'body',
        data: {
            products: [],
            loading: false,
            error: false,
            query: ''
        },
        methods: {
            search: function() {
                this.error = '';
                this.products = [];
                this.loading = true;
                // The `success` method has been deprecated. Use the `then` method instead.
                this.$http.get('/search?q=' + this.query).then(function(response) {
                    console.log(response.data.error);
                    response.data.error ? this.error=response.data.error : this.products = response.data;
                    this.loading = false;
                    this.query = '';
                }.bind(this));
            }
        }
    });
</script>
</body>
</html>