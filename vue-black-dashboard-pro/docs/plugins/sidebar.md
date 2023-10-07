# Sidebar

We've created a custom Sidebar plugin that let's you dynamically specify it's content through 
`SidebarItem` components

## Basic example

:::demo
```html
<div class="sidebar-wrapper-docs">
   <side-bar title="Sidebar" short-title="S" background-color="vue">
        <template slot-scope="props" slot="links">
          <sidebar-item
                  :link="{
                    name: 'Dashboard',
                    icon: 'tim-icons icon-chart-pie-36',
                    path: '#',
                    isRoute: false, 
                  }">
                        
          </sidebar-item>
        </template>
  </side-bar>        
</div>
```
:::


## Collapsible menus

You can define sidebar menus with items inside simply by using a `sidebar-item` inside another
`sidebar-item`

:::demo
```html
<div class="sidebar-wrapper-docs">
   <side-bar title="Sidebar" short-title="S" background-color="vue">
        <template slot-scope="props" slot="links">
         <sidebar-item :link="{ name: 'Pages', icon: 'tim-icons icon-image-02' }">
                   
         <sidebar-item
           :link="{
             name: 'Pricing',
             path: '#',
             isRoute: false, 
           }"/>
          
           <sidebar-item
              :link="{
                name: 'Components',
                path: '#',
                isRoute: false, 
              }"/>
                    
        </sidebar-item>
        </template>
  </side-bar>        
</div>
```
:::

## Color variations

:::demo
```html
<div class="sidebar-wrapper-docs">
   <side-bar title="Sidebar" short-title="S" background-color="blue">
        <template slot-scope="props" slot="links">
          <sidebar-item
                  :link="{
                    name: 'Dashboard',
                    icon: 'tim-icons icon-chart-pie-36',
                    path: '#',
                    isRoute: false, 
                  }">
                        
          </sidebar-item>
        </template>
  </side-bar>        
</div>
```
:::

:::demo
```html
<div class="sidebar-wrapper-docs">
   <side-bar title="Sidebar" short-title="S" background-color="green">
        <template slot-scope="props" slot="links">
          <sidebar-item
                  :link="{
                    name: 'Dashboard',
                    icon: 'tim-icons icon-chart-pie-36',
                    path: '#',
                    isRoute: false, 
                  }">
                        
          </sidebar-item>
        </template>
  </side-bar>        
</div>
```
:::

:::demo
```html
<div class="sidebar-wrapper-docs">
   <side-bar title="Sidebar" short-title="S" background-color="orange">
        <template slot-scope="props" slot="links">
          <sidebar-item
                  :link="{
                    name: 'Dashboard',
                    icon: 'tim-icons icon-chart-pie-36',
                    path: '#',
                    isRoute: false, 
                  }">
                        
          </sidebar-item>
        </template>
  </side-bar>        
</div>
```
:::


:::demo
```html
<div class="sidebar-wrapper-docs">
   <side-bar title="Sidebar" short-title="S" background-color="red">
        <template slot-scope="props" slot="links">
          <sidebar-item
                  :link="{
                    name: 'Dashboard',
                    icon: 'tim-icons icon-chart-pie-36',
                    path: '#',
                    isRoute: false, 
                  }">
                        
          </sidebar-item>
        </template>
  </side-bar>        
</div>
```
:::

:::demo
```html
<div class="sidebar-wrapper-docs">
   <side-bar title="Sidebar" short-title="S" background-color="primary">
        <template slot-scope="props" slot="links">
          <sidebar-item
                  :link="{
                    name: 'Dashboard',
                    icon: 'tim-icons icon-chart-pie-36',
                    path: '#',
                    isRoute: false, 
                  }">
                        
          </sidebar-item>
        </template>
  </side-bar>        
</div>
```
:::

## Sidebar Props
<props-table component-name="sidebar"/>

## Sidebar Item Props
<props-table component-name="sidebar-item"/>

## Sidebar Slots
<slots-table :slots="[
          {name: 'default', description: 'Content before links'},
          {name: 'links', description: 'Content for links'}
          ]"/>

## Sidebar item Slots
<slots-table :slots="[
          {name: 'default', description: 'Default content. Usually used to add sub menus'},
          {name: 'title', description: 'Custom title content if you want a custom markup for the sidebar item'}
          ]"/>
