##  Badge

Documentation and examples for badges, our small count and labeling component.

<hr>
To use the custom badges, import the Badge component

```js
import {Badge} from 'src/components'
```

Global usage

```js
Vue.component(Badge.name, Badge)
```

For local usage
```js
export default {
  components: {
    Badge
  }
}
```

## Badge inside button

Badges can be used as part of links or buttons to provide a counter.

:::demo
```html
<base-button type="primary">
  Notifications &nbsp;<badge type="default">4</badge>
</base-button>
```
:::

## Contextual variations

Add any of the below mentioned modifier `type` to change the appearance of a badge.

:::demo
```html
<badge type="primary">Primary</badge>
<badge type="info">Info</badge>
<badge type="success">Success</badge>
<badge type="danger">Danger</badge>
<badge type="warning">Warning</badge>
<badge type="default">Default</badge>
```
:::

## Badge props
<props-table component-name="badge"/>

## Badge Slots
<slots-table :slots="[
          {name: 'default', description: 'Default content for the badge'}
          ]"/> 
