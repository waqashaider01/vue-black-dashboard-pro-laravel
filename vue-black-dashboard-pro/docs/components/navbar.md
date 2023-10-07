# Navbar

Documentation and examples for Bootstrap's powerful, responsive navigation header, the navbar. Includes support for branding, navigation, and more, including support for our collapse plugin.

```js
import {BaseNav} from 'src/components'
```

Global usage

```js
Vue.component(BaseNav.name, BaseNav)
```

For local usage

```js
export default {
  components: {
    BaseNav
  }
}
```

## How it works

Here’s what you need to know before getting started with the navbar:
<ul>
  <li>Navbars require a wrapping
    <code class="highlighter-rouge">.navbar</code> with
    <code class="highlighter-rouge">.navbar-expand{-sm|-md|-lg|-xl}</code> for responsive collapsing and
    <a href="#color-schemes">color scheme</a> classes.</li>
  <li>Navbars and their contents are fluid by default. Use
    <a href="#containers">optional containers</a> to limit their horizontal width.</li>
  <li>Use our spacing and flex utility classes for controlling spacing and alignment within navbars.</li>
  <li>Navbars are responsive by default, but you can easily modify them to change that. Responsive behavior depends on our Collapse JavaScript plugin.</li>
  <li>Navbars are hidden by default when printing. Force them to be printed by adding
    <code class="highlighter-rouge">.d-print</code> to the
    <code class="highlighter-rouge">.navbar</code>.
  <li>Ensure accessibility by using a
    <code class="highlighter-rouge">&lt;nav&gt;</code> element or, if using a more generic element such as a
    <code class="highlighter-rouge">&lt;div&gt;</code>, add a
    <code class="highlighter-rouge">role="navigation"</code> to every navbar to explicitly identify it as a landmark region for users of assistive technologies.</li>
</ul>

<hr>

## Nav

Navbar navigation links build on our `.nav` options with their own modifier class and require the use of toggler component for proper responsive styling.
Navigation in navbars will also grow to occupy as much horizontal space as possible to keep your navbar contents securely aligned.

Active states—with `.active` —to indicate the current page can be applied directly to `.nav-link`s or their immediate parent `.nav-items`.

:::demo
```html
<base-nav type="primary"
        v-model="showMenu1"
        >
  <a slot="brand" class="navbar-brand" href="#">Navbar</a>

  <ul class="navbar-nav">
     <li class="nav-item active">
       <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">Features</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">Pricing</a>
     </li>
  </ul>
</base-nav>
```
:::

You may also utilize dropdowns in your navbar nav. Dropdown menus require a wrapping element for positioning,
so be sure to use separate and nested elements for `.nav-item` and `.nav-link` as shown below.

:::demo
```html
<base-nav type="primary"
        v-model="showMenu2"
        >
  <a slot="brand" class="navbar-brand" href="#">Navbar</a>

  <ul class="navbar-nav">
     <li class="nav-item active">
       <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">Features</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">Pricing</a>
     </li>
     <base-dropdown tag="li"
                    title="Dropdown link"
                    title-tag="a"
                    title-classes="nav-link"
                    class="nav-item">

      <span slot="title">
        Dropdown link
      </span>             
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
   </base-dropdown>

  </ul>
</base-nav>
```
:::

## Forms

Place various form controls and components within a navbar with `.form-inline`.

:::demo
```html
<base-nav type="primary"
        v-model="showMenu3"
        >
  <a slot="brand" class="navbar-brand" href="#">Navbar</a>

  <ul class="navbar-nav">
     <li class="nav-item active">
         <a href="#pablo" class="nav-link">link</a>
     </li>
     <li class="nav-item">
         <a href="#pablo" class="nav-link">link</a>
     </li>     
  </ul>
  <form class="form-inline ml-auto" @submit.prevent="onSubmit">
      <base-input class="no-border"
                  v-model="form.input"
                  type="text"
                  placeholder="Search"/>
      <base-button type="link" icon round native-type="submit">
        <i class="tim-icons icon-zoom-split"></i>
      </base-button>
  </form>
</base-nav>
```
:::

## Text

Navbars may contain bits of text with the help of `.navbar-text`.
This class adjusts vertical alignment and horizontal spacing for strings of text.

:::demo
```html
<base-nav type="primary"
        >
   <span slot="brand" class="navbar-text">
      Navbar text with an inline element
    </span>
</base-nav>
```
:::

Mix and match with other components and utilities as needed.

:::demo
```html
<base-nav type="primary"
        v-model="showMenu4">
    <a slot="brand" class="navbar-brand" href="#">Navbar w/ text</a>

    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>

    <span class="navbar-text ml-auto">
        Navbar text with an inline element
    </span>
</base-nav>
```
:::

## Color schemes

Theming the navbar has never been easier thanks to the combination of
theming classes and background-color utilities.
Choose from `.navbar-light` for use with light background colors, or `.navbar-dark` for dark background colors.
Then, customize with `type: "*"` prop. You can also add a border top using `data-color` attribute.

:::demo
```html
<div>
<base-nav v-for="type in navbarTypes"
        :type="type"
        :key="type"
        v-model="showMenu5"
        >
  <a slot="brand" class="navbar-brand" href="#">Navbar</a>

  <ul class="navbar-nav">
      <li class="nav-item active">
         <a class="nav-link" href="#">Home
             <span class="sr-only">(current)</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="#">Features</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="#">Pricing</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="#">About</a>
     </li>
  </ul>

  <form  class="form-inline ml-auto" @submit.prevent="">
      <base-input :class="{'no-border': type !== 'white'}"
                  type="text"
                  placeholder="Search"/>
      <base-button :type="type === 'white' ? 'info': 'link'"
                   :class="{'ml-2': type === 'white'}"
                   icon
                   round
                   native-type="submit">
        <i class="tim-icons icon-zoom-split"></i>
      </base-button>
  </form>
</base-nav>
</div>
```
:::

## Containers

When the container is within your navbar, its horizontal padding is removed at breakpoints lower than your
specified `expand="{-sm|-md|-lg|-xl}"` prop.
This ensures we’re not doubling up on padding unnecessarily on lower viewports when your navbar is collapsed.

:::demo
```html
<base-nav type="success"
        expand="lg"
        container-classes="container"
        >
  <a slot="brand" class="navbar-brand" href="#">Navbar</a>
</base-nav>
```
:::


## Placement

Use our position utilities to place navbars in non-static positions.
Choose from fixed to the top, fixed to the bottom,
or stickied to the top (scrolls with the page until it reaches the top, then stays there).
Fixed navbars use `position: fixed`, meaning they’re pulled from the normal flow
 of the DOM and may require custom CSS (e.g., `padding-top` on the `<body>`) to prevent overlap with other elements.

Also note that `.sticky-top` uses `position: sticky`, which isn’t fully supported in every browser.

:::demo
```html
<base-nav type="primary" >
  <a slot="brand" class="navbar-brand" href="#">Default</a>
</base-nav>
```
:::

:::demo
```html
<base-nav type="primary" class="fixed-top" >
  <a slot="brand" class="navbar-brand" href="#">Fixed top</a>
</base-nav>
```
:::

:::demo
```html
<base-nav type="primary" class="fixed-bottom" >
  <a slot="brand" class="navbar-brand" href="#">Fixed bottom</a>
</base-nav>
```
:::

:::demo
```html
<base-nav type="primary" class="sticky-top" >
  <a slot="brand" class="navbar-brand" href="#">Sticky top</a>
</base-nav>
```
:::

## Responsive behaviors
Navbars can utilize `expand="{-sm|-md|-lg|-xl}"` prop to change when their content collapses behind a button.
In combination with other utilities, you can easily choose when to show or hide particular elements.

For navbars that never collapse, add the `.navbar-expand` class on the navbar.
For navbars that always collapse, simply set `expand=""` class.

## Toggler

By default the `base-nav` component contains a toggler that appears on lower breakpoints
based on `expand="{-sm|-md|-lg|-xl}"` prop. For example if `expand="lg"`, the toggler will appear on
screens lower than `lg` breakpoint. The content that appears in the toggled menu is the content within these 3 slots
1. `menu` slot
2. `menu-before` slot
3. `menu-after` slot

Below is an example that doesn't display the brand on smaller viewports
:::demo
```html
<base-nav type="primary" v-model="showMenu6" >
  <a class="navbar-brand" href="#">Hidden brand</a>
  <ul class="navbar-nav">
     <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
  </ul>
</base-nav>
```
:::

With brand name on the left and toggler on the right
:::demo
```html
<base-nav type="primary" v-model="showMenu7" >
  <a slot="brand" class="navbar-brand" href="#">Navbar</a>

  <ul class="navbar-nav">
     <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
  </ul>
</base-nav>
```
:::

<script>
  export default {
  props: ['slot-key'],
    data(){
        return {
            form: {
             input: ''
            },
            showMenu1: false,
            showMenu2: false,
            showMenu3: false,
            showMenu4: false,
            showMenu5: false,
            showMenu6: false,
            showMenu7: false,
            navbarTypes: ['dark', 'success', 'danger', 'warning', 'white', 'primary', 'info']
        }
     },
     methods: {
        onSubmit() {
          alert(`Submitted ${this.form.input}`)
        }
     }
  }
</script>

## BaseNav props

<props-table component-name="base-nav"></props-table>


## BaseNav Slots
<slots-table :slots="[
          {name: 'default', description: 'Default content for navbar. Will appear in navbar menu on small viewports'},
          {name: 'brand', description: 'Navbar brand slot'},
          {name: 'toggle-button', description: 'Navbar toggle button. Note that providing content for this slot means that you manually have to show/hide navbar menu'},
          ]"/>
