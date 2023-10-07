# Breadcrumb

Indicate the current page's location within a navigational hierarchy that automatically adds separators via CSS.

<hr>

```js
import {Breadcrumb, BreadcrumbItem} from 'src/components'
```

Global usage

```js
Vue.component(Breadcrumb.name, Breadcrumb)
Vue.component(BreadcrumbItem.name, BreadcrumbItem)
```

For local usage

```js
export default {
  components: {
    Breadcrumb,
    BreadcrumbItem
  }
}
```

## Example

Separators are automatically added in CSS through ::before and content .

:::demo
```html
<breadcrumb :transparent="false">
  <breadcrumb-item active>
    Home
  </breadcrumb-item>
</breadcrumb>

<breadcrumb :transparent="false">
  <breadcrumb-item>
    <a href="#">Home</a>
  </breadcrumb-item>
  <breadcrumb-item active>
    Library
  </breadcrumb-item>
</breadcrumb>

<breadcrumb :transparent="false">
  <breadcrumb-item>
    <a href="#">Home</a>
  </breadcrumb-item>
  <breadcrumb-item >
    <a href="#">Library</a>
  </breadcrumb-item>
  <breadcrumb-item active>
    Data
  </breadcrumb-item>
</breadcrumb>
```
:::

## Automatic breadcrumb

We also provide a `route-bread-crumb` component which automatically generates breadcrumbs based 
on `routes` declared with Vue Router. The usage is quite simple


```html
<route-bread-crumb/>
```

## Breadcrumb Slots
<slots-table :slots="[
          {name: 'default', description: 'Default content for the breadcrumb'}
          ]"/>

## Breadcrumb item props
<props-table component-name="breadcrumb-item"/>


## Breadcrumb Item Slots
<slots-table :slots="[
          {name: 'default', description: 'Default content for the breadcrumb item'}
          ]"/>
