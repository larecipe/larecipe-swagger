<h6 align="center">
    <img src="https://larecipe.binarytorch.com.my/images/logo.svg"/>
</h6>

<h2 align="center">
    LaRecipe Swagger
</h2>


<h3 align="center">
    Let your users tests your APIs directly from the documentation!
</h3>

# LaRecipe 🍪

**LaRecipe** is simply a code-driven package provides an easy way to create beautiful documentation for your product or application inside your Laravel app.

![LaRecipe Screenshot](https://larecipe.binarytorch.com.my/images/packages/swagger.png#)

## Getting Started

1. Install the package via composer.

```bash
composer require binarytorch/larecipe-swagger
```

2. Use the provided VueJs component:

```html
<larecipe-swagger endpoint="/api/v1/users"></larecipe-swagger>
```

3. Test your API:

![LaRecipe Screenshot](https://larecipe.binarytorch.com.my/images/packages/swagger-screenshot.png)

3. Customize your component via props:

| Prop | Type | Default | Example |
| - | - | - | - |
| `base-url` | String | The current location origin | https://example.com |
| `endpoint` | String | - | /api/v1/users |
| `default-headers` | Object | - | { 'Content-Type': 'application/json' } |
| `default-params` | Object | - | { 'name': 'saleem' } |
| `default-method` | String | get | get,post,put,patch,update,delete |
| `has-common-headers` | Boolean | false | { 'Content-Type': 'application/json', 'Accept': 'application/json' } |
| `has-auth-header` | Boolean | false | { 'Authorization': 'Bearer token_here' } |

#### See [full larecipe documentation](https://larecipe.binarytorch.com.my/docs)

## License

This library is licensed under the MIT License - see the [LICENSE.md](LICENSE) file for details.
